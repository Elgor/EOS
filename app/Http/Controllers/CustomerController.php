<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($customerId)
    {
        $customer = User::findOrFail($customerId);
        return view('customer.profile_detail', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($customerId)
    {
        $customer = User::findOrFail($customerId);
        return view('customer.edit_profile', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customerId)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:12',
            'address' => 'required|min:15',
            'image' => ['mimes:jpg,jpeg,png'],
        ]);

        DB::table('users')
        ->where('id',$customerId)
        ->update([
            'name' => $request['name'],  
            'password' => Hash::make($request['password']),
            'phone_number' => $request['phone_number'],
            'address' => $request['address'],
        ]);

        if (!is_null($request->image)) {
            DB::table('users')
            ->where('id',$customerId)
            ->update([
                'image' => $request['image']->store('avatar', 'public'),
            ]);
        }
        $customer = User::findOrFail($customerId);
        return view('customer.profile_detail', compact('customer'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
