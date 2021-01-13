<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderItems = Order::where('user_id', '=', Auth::id())->get();
        return view('order.index', compact('orderItems'));
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
        $order = new Order;
        $order->date = Carbon::now();
        $order->negotiation_price = $request->input('negotiation_price');
        $order->product_id = $request->input('product_id');
        $order->seller_id = $request->input('seller_id');
        $order->user_id = Auth::id();
        $order->save();

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $order = Order::findOrFail($itemId);
        return view('order.order_detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($orderId)
    {
        $order = Order::find($orderId);
        $order->delete();
        return back();
    }

    public function sellerOrders()
    {
        return view('seller.my_order');
    }


    public function requestAllOrder($userId)
    {
        $requestCount = DB::table('orders')
            ->where('user_id', $userId)
            ->where('status', 'Waiting')
            ->count();

        if ($requestCount > 0) {
            DB::table('orders')
                ->where('user_id', $userId)
                ->where('status', 'Waiting')
                ->update([
                    'status' => 'Requested'
                ]);
            return redirect('/order')->with('message', 'Successfully Request All Order !');
        } else {
            return redirect('/order')->with('message', 'No Order to Request !');
        }
    }
}
