<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Validator;
use Illuminate\Support\Facades\Response;

class AppSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider=Slider::all();
        return response($slider, 200);
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
            ]);
            if($validation->fails()){
                return response()->json($validation->errors(),202);
            }
        $slider=new Slider;
      
        if(!$request->hasFile('image')) {
            return response()->json(['upload_file_not_found'], 400);
        }
        $file = $request->file('image');
        //dd($file);
        if(!$file->isValid()) {
            return response()->json(['invalid_file_upload'], 400);
        }
        $filename = md5(uniqid(rand(), true)) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('', $filename, ['disk' => 'public']);
        $slider->image = $filename;
        $result=$slider->save();
        if($result){
            return response()->json([
                "message" => "slider record created"
            ], 201);
        }
        else{
            return response()->json([
                "message" => "slider record not created"
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
        if (Slider::where('id', $id)->exists()) {
            $slider = Slider::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($slider, 200);
          } else {
            return response()->json([
              "message" => "slider not found"
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
       
  
        $found = Slider::find($id);
        if (!$found) {
            return Response::json(['message' => 'Id not found'], 404);
        }
        $validation=Validator::make($request->all(),[ 
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
            ]);
           if($validation->fails()){
              return response()->json($validation->errors(),202);
              }
              $file = $request->file('image');
              if(!$request->hasFile('image')) {
                   return response()->json(['upload_file_not_found'], 400);
                  }
              if(!$file->isValid()) {
                  return response()->json(['invalid_file_upload'], 400);
                  }
                 
                  $filename = md5(uniqid(rand(), true)) . '.' . $file->getClientOriginalExtension();
                  $file->storeAs('', $filename, ['disk' => 'public']);
                  $found['image'] = $filename;
                  $result=$found->update($request->except('image'));
                  if($result){
                            return response()->json([
                                "message" => "slider record updated"
                            ], 201);
                        }
                  else{
                    return response()->json([
                        "message" => "slider record not updated"
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
        if(Slider::where('id', $id)->exists()) {
            $slider = Slider::find($id);
            $slider->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "slider not found"
            ], 404);
          }
    }
}
