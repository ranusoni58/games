<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Validator;

class AppGameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $game=Game::all();
        return response($game, 200);
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
      $validation=Validator::make($request->all(),[   
        'name'=>'required|max:50',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        'status'=>'required',
        'desc'=>'required',
        'sorting'=>'required|numeric',
       
        ]);
        if($validation->fails()){
          return response()->json($validation->errors(),202);
      }
        $game = new Game();

        $game->name=$request->name;
        $game->status=$request->status;
        $game->desc=$request->desc;
        $game->sorting=$request->sorting;
     
        if(!$request->hasFile('image')) {
          return response()->json(['upload_file_not_found'], 400);
      }
     
      $file = $request->file('image');
      if(!$file->isValid()) {
          return response()->json(['invalid_file_upload'], 400);
      }
          
      $filename = md5(uniqid(rand(), true)) . '.' . $file->getClientOriginalExtension();
      $file->storeAs('', $filename, ['disk' => 'public']);
      $game->image = $filename;
      $game->status=$request->status;
      $result=$game->save();
      if($result){
          return response()->json([
              "message" => "game record created"
          ], 201);
      }
      else{
          return response()->json([
              "message" => "game record not created"
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
        if (Game::where('id', $id)->exists()) {
            $game = Game::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($game, 200);
          } else {
            return response()->json([
              "message" => "game not found"
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
      $game = Game::find($id);
      if (!$game) {
          return Response::json(['message' => 'Id not found'], 404);
      }
      $validation=Validator::make($request->all(),[   
        'name'=>'required|max:50',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        'status'=>'required',
        'desc'=>'required',
        'sorting'=>'required|numeric',
       
        ]);
        if($validation->fails()){
          return response()->json($validation->errors(),202);
      }
      $game->name = is_null($request->name) ? $game->name : $request->name;
      $game->status = is_null($request->status) ? $game->status : $request->status;
      $game->desc = is_null($request->desc) ? $game->desc : $request->desc;
      $game->sorting = is_null($request->sorting) ? $game->sorting : $request->sorting;
      $game->save();
      $file = $request->file('image');
      if(!$request->hasFile('image')) {
           return response()->json(['upload_file_not_found'], 400);
          }
      if(!$file->isValid()) {
          return response()->json(['invalid_file_upload'], 400);
          }
         
          $filename = md5(uniqid(rand(), true)) . '.' . $file->getClientOriginalExtension();
          $file->storeAs('', $filename, ['disk' => 'public']);
          $game['image'] = $filename;
          $result=$game->update($request->except('image'));
          if($result){
                    return response()->json([
                        "message" => "game record updated"
                    ], 201);
                }
          else{
            return response()->json([
                "message" => "game record not updated"
            ], 201);
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
        if(Game::where('id', $id)->exists()) {
            $game = Game::find($id);
            $game->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "game not found"
            ], 404);
          }
    
    }
    public function sort(Request $request){
        // dd($request->all());
         $sort=Game::when(isset($request->sorting),function($q) use($request){
                      $q->orderBy('sorting',$request->sorting);
        })->get();
        return response()->json($sort);
    }
}
