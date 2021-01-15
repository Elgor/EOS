<?php

namespace App\Http\Controllers;

use App\Order;
use App\Rating;
use App\Seller;
use DB;
use Auth;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sellerId,$orderId)
    {
        $seller = Seller::findOrFail($sellerId);
        $order = Order::findOrFail($orderId);

        return view('rating.index', compact('seller','order'));
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
    public function store(Request $request, $sellerId, $orderId)
    {
        $ratingCount = DB::table('ratings')->where('seller_id', $sellerId)->count();

        if ($ratingCount > 0) {
            $ratingSum = DB::table('ratings')
            ->where('seller_id', $sellerId)
            ->sum('rating');

            $ratingSum += $request->rating;
            $ratingFinal = $ratingSum/($ratingCount+1);
        } else {
            $ratingFinal = $request->rating;
        }

        DB::table('sellers')
        ->where('id', $sellerId)
        ->update([
                'final_rating'=> (double)$ratingFinal
        ]);


        $rating = new Rating;

        $rating->create([
            'comment'=>$request->comment,
            'order_id' => $orderId,
            'seller_id' => $sellerId,
            'user_id' => Auth::user()->id,
            'rating' => $request->rating,
            'commentable_id' => $sellerId,
            'commentable_type' => 'App\Seller',
            ]);
        return redirect('/order')->with('message', 'Successfully Rate Seller !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
