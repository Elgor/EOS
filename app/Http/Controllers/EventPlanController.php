<?php

namespace App\Http\Controllers;

use App\EventPlan;
use Auth;
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
        $eventPlans = EventPlan::where('user_id', '=', Auth::id())->get();
        return view('eventPlan.index', compact('eventPlans'));
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
        // dd($request);
        $eventPlan= new Eventplan;
        $eventPlan->eventname=$request->input('eventName');
        $eventPlan->eventType=$request->input('eventType');
        $eventPlan->date=$request->input('date');
        $eventPlan->startTime=$request->input('startTime');
        $eventPlan->endTime=$request->input('endTime');
        $eventPlan->city=$request->input('city');
        $eventPlan->buildingAddress=$request->input('buildingAddress');
        $eventPlan->description=$request->input('description');
        $eventPlan->user_id=Auth::id();
        $eventPlan->save();

        $eventPlans = EventPlan::where('user_id', '=', Auth::id())->get();
        // dd($eventPlans);
        return view('eventPlan.index', compact('eventPlans'));
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
    public function destroy($eventPlanId)
    {
        $eventPlan = EventPlan::find($eventPlanId);
        $eventPlan->delete();
        return back();
    }
}
