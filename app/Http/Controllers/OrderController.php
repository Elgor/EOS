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
        // dd($orderItems);
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
        if ($request->negotiation_price) {
            $this->validate($request, [
                'event_plan_id' => 'required',
                'negotiation_price' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:4',
            ], [
                'event_plan_id.required' => 'Please Select Event Plan or Create Event Plan First !',
            ]);
        } else {
            $this->validate($request, [
                'event_plan_id' => 'required',

            ], [
                'event_plan_id.required' => 'Please Select Event Plan or Create Event Plan First !',
            ]);
        }

        $order = new Order;
        $order->date = Carbon::now();
        $order->negotiation_price = $request->input('negotiation_price');
        $order->product_id = $request->input('product_id');
        $order->event_plan_id = $request->input('event_plan_id');
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
    public function show($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('order.order_detail', compact('order'));
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
        $orderItems = Order::where('seller_id', '=', Auth::guard('seller')->id())
            ->where('status', '!=', 'Waiting')
            ->get();
        return view('seller.my_order', compact('orderItems'));
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
            return redirect('/order')->with('error', 'No Order to Request !');
        }
    }

    public function rejectOrder($orderId)
    {
        $order = Order::find($orderId);
        $order->status = 'Rejected';
        $order->save();
        return back();
    }

    public function acceptOrder($orderId)
    {
        $order = Order::find($orderId);
        if ($order->status == 'Requested') {
            $order->status = 'Accepted';
        } else {
            return back();
        }
        $order->save();
        return back();
    }

    public function downPayment($orderId)
    {
        $order = Order::find($orderId);
        if ($order->status == 'Accepted') {
            $order->status = 'Down Payment';
        } else {
            return back();
        }
        $order->save();
        return back();
    }

    public function fullPayment($orderId)
    {
        $order = Order::find($orderId);
        if ($order->status == 'Down Payment') {
            $order->status = 'Full Payment';
        } else {
            return back();
        }
        $order->save();
        return back();
    }

    public function acceptDownPayment($orderId)
    {
        $order = Order::find($orderId);
        if ($order->status == 'Down Payment') {
            $order->status = 'Accepted Down Payment';
        } else {
            return back();
        }
        $order->save();
        return back();
    }

    public function acceptFullPayment($orderId)
    {
        $order = Order::find($orderId);
        if ($order->status == 'Full Payment') {
            $order->status = 'Completed';
        } else {
            return back();
        }
        $order->save();
        return back();
    }

    public function sellerShow($orderId)
    {
        $order = Order::findOrFail($orderId);
        // dd($order);
        return view('seller.event_plan_detail', compact('order'));
    }
}
