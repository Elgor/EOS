<?php

namespace App\Http\Controllers;

use App\Seller;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::paginate(4);
        return view('seller.index', ['sellers' => $sellers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.seller.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seller = new Seller;
        $seller->business_name = $request->input('business_name');
        $seller->email = $request->input('email');
        $seller->password = Hash::make($request->input('password'));
        $seller->category = $request->input('category');
        $seller->city = $request->input('city');
        $seller->description = $request->input('description');
        $seller->phone_number = $request->input('phone_number');
        $seller->no_rekening = $request->input('no_rekening');
        $seller->address = $request->input('address');
        $seller->profile_picture = $request->file('profile_picture')->store('avatar', 'public');
        $seller->phone_number = $request->input('phone_number');
        $seller->save();

        Auth::guard('seller')->login($seller);

        $products = Product::find(Auth::guard('seller')->id());
        if ($products===null) {
            return redirect('/product');
        } else {
            return view('seller.my_package', compact('products'));
        }
        // return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        //
    }

    public function detail($sellerId)
    {
        $seller = Seller::find($sellerId);
        $comments = $seller->comments()->paginate(5);
        $starAll = DB::table('ratings')
            ->where('seller_id', $sellerId)
            ->count();
        $star5 = DB::table('ratings')
            ->where('seller_id', $sellerId)
            ->where('rating', 5)->count();
        $star4 = DB::table('ratings')
            ->where('seller_id', $sellerId)
            ->where('rating', 4)->count();
        $star3 = DB::table('ratings')
            ->where('seller_id', $sellerId)
            ->where('rating', 3)->count();
        $star2 = DB::table('ratings')
            ->where('seller_id', $sellerId)
            ->where('rating', 2)->count();
        $star1 = DB::table('ratings')
            ->where('seller_id', $sellerId)
            ->where('rating', 1)->count();
        if ($starAll == 0) {
            $starAll = 1;
            $reviews = 0;
        } else {
            $reviews = $starAll;
        }
        return view('seller.seller_detail', compact('seller', 'comments', 'starAll', 'star5', 'star4', 'star3', 'star2', 'star1', 'reviews'));
    }



    public function showSellerLoginForm()
    {
        return view('auth.seller.login');
    }

    public function showSellerRegisterForm()
    {
        return view('auth.seller.register');
    }

    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Login failed, please try again!');
    }

    public function authenticate(Request $request)
    {
        $findSeller = Seller::where('email', $request->email)->first();
        if ($findSeller) {
            // Authentication passed...
            Auth::guard('seller')->login($findSeller);

            $products = Product::where('seller_id', $findSeller->id)->get();
            if ($products===null) {
                return redirect('/product');
            } else {
                return redirect()->route('products.seller');
            }
        } else {
            return $this->loginFailed();
        }
    }

    private function noDataSearch()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'No Searched Seller');
    }

    public function search(Request $request)
    {
        $search= $request->search;
        $sellers= Seller::where('business_name', 'like', '%'.$search.'%')->paginate(4);
        if ($sellers->isEmpty()) {
            return $this->noDataSearch();
        } else {
            return view('seller.index', compact('sellers'));
        }
    }
}
