<?php

namespace App\Http\Controllers;

use App\MessageDetail;
use Illuminate\Http\Request;

class MessageDetailController extends Controller
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
        $messageDetail = new MessageDetail;
        $messageDetail->text = $request->input('text');
        $messageDetail->sender = $request->input('sender');
        $messageDetail->message_id = $request->input('message_id');
        $messageDetail->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MessageDetail  $messageDetail
     * @return \Illuminate\Http\Response
     */
    public function show(MessageDetail $messageDetail, $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MessageDetail  $messageDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MessageDetail  $messageDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MessageDetail $messageDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MessageDetail  $messageDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(MessageDetail $messageDetail)
    {
        //
    }
}
