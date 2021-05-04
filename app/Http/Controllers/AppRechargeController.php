<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recharge;
use Validator;

class AppRechargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recharge=Recharge::all();
        return response($recharge, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation=Validator::make($request->all(),[
            'name'=>'required|max:30',
            'amount'=>'required|numeric',
            'status'=>'required',  
            ]);
            if($validation->fails()){
                return response()->json($validation->errors(),202);
            }
        $recharge=new Recharge;
      
        $recharge->name=$request->name;
        $recharge->amount=$request->amount;
        $recharge->status=$request->status;
        $result=$recharge->save();
        if($result){
            return response()->json([
                "message" => "recharge record created"
            ], 201);
        }
        else{
            return response()->json([
                "message" => "recharge record not created"
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Recharge::where('id', $id)->exists()) {
            $recharge = Recharge::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($recharge, 200);
          } else {
            return response()->json([
              "message" => "recharge not found"
            ], 404);
          }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        
        $validation=Validator::make($request->all(),[
            'name'=>'required|max:30',
            'amount'=>'required|numeric',
            'status'=>'required',  
            ]);
            if($validation->fails()){
                return response()->json($validation->errors(),202);
            }
       
        if (Recharge::where('id', $id)->exists()) {
            $recharge = Recharge::find($id);
            $recharge->name = is_null($request->name) ? $recharge->name : $request->name;
            $recharge->amount = is_null($request->amount) ? $recharge->amount : $request->amount;
            $recharge->status = is_null($request->status) ? $recharge->status : $request->status;
            $recharge->save();
    
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "recharge not found"
            ], 404);
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Recharge::where('id', $id)->exists()) {
            $recharge = Recharge::find($id);
            $recharge->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "recharge not found"
            ], 404);
          }
    }
}
