<?php

namespace App\Http\Controllers;

use App\CustomerLevel;
use Illuminate\Http\Request;
use Stripe\Customer;

class CustomerLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('preference.addlevel');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $levels=CustomerLevel::all();
     return view('preference.customerlevel',compact(['levels']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $levels= new CustomerLevel();
        $levels->name =$request->name;
        $levels->amount =$request->amount;
        $levels->status=isset($request->status) ? 1 : 0;
        $levels->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $levels= CustomerLevel::findOrFail($id);
        return view('preference.editlevel',compact(['levels']));
    }
    public function edit($id,Request $request)
    {
         $levels = CustomerLevel::findOrFail($id);
         $levels->name=$request->name;
         $levels->amount=$request->amount;
         $levels->save();
        return redirect(route('offers'));
     
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
