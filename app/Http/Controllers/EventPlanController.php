<?php

namespace App\Http\Controllers;

use App\EventPlan;
use Illuminate\Http\Request;

class EventPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('eventPlan.index');
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
        $eventPlan= new Eventplan;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventPlan  $eventPlan
     * @return \Illuminate\Http\Response
     */
    public function show(EventPlan $eventPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventPlan  $eventPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(EventPlan $eventPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventPlan  $eventPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventPlan $eventPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventPlan  $eventPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventPlan $eventPlan)
    {
        //
    }
}
