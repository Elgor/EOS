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
        $seller->category_id = $request->input('category_id');
        $seller->city_id = $request->input('city_id');
        $seller->description = $request->input('description');
        $seller->address = $request->input('address');
        $seller->profile_picture = $request->file('profile_picture')->store('avatar', 'public');
        $seller->phone_number = $request->input('phone_number');
        $seller->save();
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
        $seller = Seller::findOrFail($sellerId);
        return view('seller.seller_detail',$seller);
    }

    public function showSellerLoginForm(){
        return view('auth.seller.login');
    }

    public function showSellerRegisterForm(){
        return view('auth.seller.register');
    }

    public function authenticate(Request $request)
    {
        //$findUser = Seller::select('select * from sellers where email = ')
        $findSeller = Seller::where('email', $request->email)->first();
        if ($findSeller) {
            // Authentication passed...
            Auth::login($findSeller, true);

            $products = Product::paginate(4);
            return view('home', ['products' => $products]);
        }
        else{
            return view('welcome');
        }
    }
}
