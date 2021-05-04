<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Validator;
use Illuminate\Support\Facades\Response;

class AppPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page=Page::all();
        return response($page, 200);
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
            'name'=>'required',
            'sorting'=>'required|numeric',
            'content'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'status'=>'required',
            
            ]);
            if($validation->fails()){
                return response()->json($validation->errors(),202);
            }
            $page=new Page;
            $page->name=$request->name;
            $page->sorting=$request->sorting;
            $page->content=$request->content;
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
            $page->image = $filename;
            $page->status=$request->status;
            $result=$page->save();
            if($result){
                return response()->json([
                    "message" => "page record created"
                ], 201);
            }
            else{
                return response()->json([
                    "message" => "page record not created"
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
        if (Page::where('id', $id)->exists()) {
            $page = Page::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($page, 200);
          } else {
            return response()->json([
              "message" => "page not found"
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
        
        $page = Page::find($id);
        if (!$page) {
            return Response::json(['message' => 'Id not found'], 404);
        }
        $validation=Validator::make($request->all(),[
            'name'=>'required|max:30',
            'sorting'=>'required|numeric',
            'content'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'status'=>'required|sometimes',
            
            ]);
            if($validation->fails()){
                return response()->json($validation->errors(),202);
            }
            $page->name = is_null($request->name) ? $page->name : $request->name;
            $page->sorting = is_null($request->sorting) ? $page->sorting : $request->sorting;
            $page->content = is_null($request->content) ? $page->content : $request->content;
            $page->status = is_null($request->status) ? $page->status : $request->status;
            $page->save();
            $file = $request->file('image');
            if(!$request->hasFile('image')) {
                 return response()->json(['upload_file_not_found'], 400);
                }
            if(!$file->isValid()) {
                return response()->json(['invalid_file_upload'], 400);
                }
               
                $filename = md5(uniqid(rand(), true)) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('', $filename, ['disk' => 'public']);
                $page['image'] = $filename;
                $result=$page->update($request->except('image'));
                if($result){
                          return response()->json([
                              "message" => "page record updated"
                          ], 201);
                      }
                else{
                  return response()->json([
                      "message" => "page record not updated"
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
        if(Page::where('id', $id)->exists()) {
            $page = Page::find($id);
            $page->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "page not found"
            ], 404);
          }
    
    }
    public function sort(Request $request){
        // dd($request->all());
         $sort=Page::when(isset($request->sorting),function($q) use($request){
                      $q->orderBy('sorting',$request->sorting);
        })->get();
        return response()->json($sort);
    }
}
