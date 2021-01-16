<?php

namespace App\Http\Controllers;

use App\Product;
use App\Seller;
use Auth;
use App\ImageList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $allProducts=Product::all();
        $products = Product::paginate(4);
        // foreach ($allProducts as $pro) {
        //     $seller = Seller::all()->where('id', '=', $pro->seller_id);
        // }
        // dd($sellerName);
        return view('home', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->input('packageName');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->image = $request->file('image')->store('product', 'public');
        $product->features = $request->input('features');
        $product->seller_id = Auth::guard('seller')->id();
        $product->save();

        $files = $request->file('imageList');
        foreach ($files as $file) {
            $file = ImageList::create([
                'path' => $file->store('imageList', 'public'),
                'image' => $file->getClientOriginalName(),
                'product_id' => $product->id,
            ]);
        }

        // $products = Product::where('seller_id', '=', Auth::guard('seller')->id())->get();
        return redirect()->route('products.seller');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId)
    {
        $product = Product::find($productId);
        $product->delete();
        return back();
    }

    public function detail($productId)
    {
        $product = Product::findOrFail($productId);
        return view('product.product_detail', compact('product'));
    }

    private function noDataSearch()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'No Searched Package');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::where('name', 'like', '%' . $search . '%')->paginate(4);
        // dd($products);
        if ($products->isEmpty()) {
            return $this->noDataSearch();
        } else {
            return view('home', compact('products'));
        }
    }

    public function sellerProducts()
    {
        $products = Product::where('seller_id', '=', Auth::guard('seller')->id())->get();
        // dd($products->count());
        return view('seller.my_package', compact('products'));
    }

    public function filter(Request $request)
    {
        $min = $request->min;
        $max = $request->max;

        if (is_null($min) && !is_null($max)) {
            $min = 0;
            $max += 1;

            $products = Product::where('price', '<', $max)->orderBy('price', 'asc')->paginate(8);
        } elseif (is_null($max) && !is_null($min)) {
            $min -= 1;
            $max = 0;

            $products = Product::where('price', '>', $min)->orderBy('price', 'asc')->paginate(8);
        } elseif (!is_null($min) && !is_null($max)) {
            $min -= 1;
            $max += 1;

            $products = Product::where([['price', '>', $min], ['price', '<', $max]])->orderBy('price', 'asc')->paginate(8);
        } else {
            return $this->noDataSearch();
        }



        // $products = DB::table('products')
        // ->where('price','>',$min)
        // ->where('price','<',$max)->paginate(4);


        if ($products->isEmpty()) {
            return $this->noDataSearch();
        } else {
            return view('home', compact('products'));
        }
    }

    public function addToCompare($productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            abort(404);
        }
        $compare = session()->get('compare');

        if (!$compare) {
            $compare = [
                $productId => [
                    'product_id'=>$product->id,
                    'seller_id'=>$product->seller->id,
                    'completed_transaction'=>$product->order->transaction->count(),
                    'image'=> $product->image,
                    "name" => $product->name,
                    "seller_name" => $product->seller->business_name,
                    "price" => $product->price,
                    "feature" => $product->features,
                    "city"=>$product->seller->city,
                    "rating"=>$product->seller->final_rating,
                    "transaction"=>$product->seller->orders
                ]
        ];
            session()->put('compare', $compare);
            // dd(session()->get('compare'));
            return redirect()->back()->with('message', 'Product added to compare successfully!');
        }

        if (isset($compare[$productId])) {
            return redirect()->back()->with('error', 'Product already exist in compare tab!');
        }
        if (count($compare) < 3) {
            $compare[$productId] = [
            'product_id'=>$product->id,
            'seller_id'=>$product->seller->id,
            'image'=> $product->image,
            "name" => $product->name,
            "seller_name" => $product->seller->business_name,
            "price" => $product->price,
            "feature" => $product->features,
            "city"=>$product->seller->city,
            "rating"=>$product->seller->final_rating
        ];


            // dd($compare);
            session()->put('compare', $compare);

            return redirect()->back()->with('message', 'Product added to compare successfully!');
        }
        return redirect()->back()->with('error', 'Reach maximum product to compare!');
    }

    public function remove($productId)
    {
        if ($productId) {
            $compare = session()->get('compare');
            if (isset($compare[$productId])) {
                unset($compare[$productId]);
                session()->put('compare', $compare);
            }
        }
        return redirect()->back()->with('message', 'Product removed successfully');
    }
}
