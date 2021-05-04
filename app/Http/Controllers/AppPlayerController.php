<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use Validator;

class AppPlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $player=Player::all();
        return response($player, 200);
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
    //     $validation=Validator::make($request->all(),[
    //         'remark'=>'required',
    //         'status'=>'required',
    //         'email'=>'required|email',
    //         'recharge'=>'required|numeric',  
    //         ]);
    //         if($validation->fails()){
    //             return response()->json($validation->errors(),202);
    //         }
    //     $player=new Player;
      
    //     $player->status=$request->status;
    //     $player->remark=$request->remark;
    //     $player->email=$request->email;
    //     $player->recharge=$request->recharge;
    //     $result=$player->save();
    //     if($result){
    //         return response()->json([
    //             "message" => "player record created"
    //         ], 201);
    //     }
    //     else{
    //         return response()->json([
    //             "message" => "player record not created"
    //         ], 201);
    //     }
    // }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        if (Player::where('id', $id)->exists()) {
            $player = Player::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($player, 200);
          } else {
            return response()->json([
              "message" => "Player not found"
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
            'remark'=>'required',
            'status'=>'required',
            ]);
            if($validation->fails()){
                return response()->json($validation->errors(),202);
            }
       
        if (Player::where('id', $id)->exists()) {
            $player = Player::find($id);
            $player->status = is_null($request->status) ? $player->status : $request->status;
            $player->remark = is_null($request->remark) ? $player->remark : $request->remark;
            $player->save();
    
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Player not found"
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
        if(Player::where('id', $id)->exists()) {
            $player = Player::find($id);
            $player->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "player not found"
            ], 404);
          }
    }
}
