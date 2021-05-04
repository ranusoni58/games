<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
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
        $payments = Payment::select("*")
        ->where("status", "=", 2)->orderBy('created_at','desc')
        ->get();
       // dd($payments);
        return view('admin.payment.index',['payments'=>$payments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.player.addplayer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request -> validate([
        //     'remark'=>'required',
        //     'status'=>'required',
        //     'email'=>'required|email',
        //     'recharge'=>'required|numeric',  
        //     ]);
        //     $player = new Player();
          
        //     $player->status=$request->status;
        //     $player->remark=$request->remark;
        //     $player->email=$request->email;
        //     $player->recharge=$request->recharge;
        
        //     $player -> save();
        //     return redirect('admin/player')->with('success','Data has been added successfully');

    }
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payments = Payment::find($id);
        return view('admin.payment.view',['payments'=>$payments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $payment = Payment::find($id);
        // return view('admin.payment.update',['payment'=>$payment]);
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
        // $request -> validate([
        //     'remark'=>'required',
        //     'status'=>'required', 
        //     ]);
        //     $player = Player::find($id);
           
        //     $player->status=$request->status;
        //     $player->remark=$request->remark;
        
        //     $player -> save();
        //     return redirect('admin/player')->with('success','Data has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment -> delete();
     
        return redirect('admin/payment')->with('success','Data has been deleted successfully');
    }
}
