<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recharge;

class RechargeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recharges = Recharge::orderBy('id','desc')->get();
        return view('admin.recharge.index',['recharges'=>$recharges]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.recharge.addrecharge');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name'=>'required|max:30',
            'amount'=>'required|numeric',
            'status'=>'required',  
            ]);
            $recharge = new Recharge();
            $recharge->name=$request->name;
            $recharge->amount=$request->amount;
            $recharge->status=$request->status;
            $recharge->recharge_type=$request->recharge_type;
        
            $recharge -> save();
            return redirect('admin/recharge')->with('success','Data has been added successfully');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recharges = Recharge::find($id);
        return view('admin.recharge.view',['recharges'=>$recharges]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recharge = Recharge::find($id);
        return view('admin.recharge.update',['recharge'=>$recharge]);
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
        $request -> validate([
            'name'=>'required|max:30',
            'amount'=>'required|numeric',
            'status'=>'required',  
        ]);

        $recharge = Recharge::find($id);
      
        $recharge->name=$request->name;
        $recharge->amount=$request->amount;
        $recharge->status=$request->status;
    
        $recharge -> save();
      
        return redirect('admin/recharge')->with('success','Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recharge = Recharge::find($id);
        $recharge -> delete();
     
        return redirect('admin/recharge')->with('success','Data has been deleted successfully');
    }
}
