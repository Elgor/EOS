<?php

namespace App\Http\Controllers;

use App\Order;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::where('user_id', '=', Auth::id())->get();
        return view('transaction.index', compact('transactions'));
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
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function payment(Request $request, $orderId, $type)
    {
        $status = Order::where('id', '=', $orderId)
            ->first();

        if ($status->status == 'Accepted') {
            //Pay down payment when accepted status
            if ($type == 'Down Payment') {
                Transaction::create([
                    'order_id' => $orderId,
                    'user_id' => Auth::user()->id,
                    'invoice' => 'INV/' . Carbon::now()->toDateString() . '/' . $orderId . '/' . Auth::user()->id,
                    'name' => $request->name,
                    'bank' => $request->bank,
                    'receipt_downPayment' => $request->file('image')->store('payment', 'public'),
                    'type'=>'Down Payment'
                ]);

                DB::table('orders')
                ->where('id', $orderId)
                ->update([
                'status' => $type
            ]);
            } elseif ($type == 'Full Payment') {
                // dd($request);

                //Pay full payment when accepted status
                Transaction::create([
                    'order_id' => $orderId,
                    'user_id' => Auth::user()->id,
                    'invoice' => 'INV/' . Carbon::now()->toDateString() . '/' . $orderId . '/' . Auth::user()->id,
                    'name' => $request->name,
                    'bank' => $request->bank,
                    'receipt_fullPayment' => $request->file('image')->store('payment', 'public'),
                    'type'=>"Full Payment"
                ]);
                DB::table('orders')
                    ->where('id', $orderId)
                    ->update([
                        'status' => 'Completed'
                    ]);
            }
        } elseif ($status->status == 'Down Payment') {
            // Pay Full Payment
            DB::table('orders')
                ->where('id', $orderId)
                ->update([
                    'status' => 'Completed'
                ]);

            DB::table('transactions')
                ->where('order_id', $orderId)
                ->update([
                    'receipt_fullPayment' => $request->file('image')->store('payment', 'public'),
                    'bank' => $request->bank,
                    'name' => $request->name,
                    'type'=> "Full Payment"
                ]);
        }

        return redirect('/order')->with('message', 'Successfully Pay Order !');
    }
}
