<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
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
        $pages=Page::orderBy('id','desc')->get();
        
        return view('admin.page.index',['pages'=>$pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.addpage');
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
            'name'=>'required',
            'sorting'=>'required|numeric',
            'content'=>'required',
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'status'=>'required',
            
            ]);
            $page = new Page();
          
          
            $page->name=$request->name;
            $page->sorting=$request->sorting;
            $page->content=$request->content;
            if($request->hasfile('image')){
                $file = $request->file('image');
                $filename = md5(uniqid(rand(), true)) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('', $filename, ['disk' => 'public']);
                $page->image = $filename;
                //return 'storage/'. $filename;
            }
            $page->status=$request->status;
        
            $page -> save();
            return redirect('admin/page')->with('success','Data has been added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pages = Page::find($id);
        return view('admin.page.view',['pages'=>$pages]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pages = Page::find($id);
        return view('admin.page.update',['page'=>$pages]);
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
            'name'=>'required',
            'sorting'=>'required|numeric',
            'content'=>'required',
          
            'status'=>'required',
            
            ]);
            //dd($request->all());
            $page = Page::find($id);
           
            $page->name=$request->name;
            $page->sorting=$request->sorting;
            $page->content=$request->content;
            
            if($request->hasfile('image')){
                $request -> validate([
                      'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
                    ]);
                $file = $request->file('image');
                $filename = md5(uniqid(rand(), true)) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('', $filename, ['disk' => 'public']);
                $page->image = $filename;
                //return 'storage/'. $filename;
            }
            $page->status=$request->status;
        
            $page -> save();
            return redirect('admin/page')->with('success','Data has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page -> delete();
     
        return redirect('admin/page')->with('success','Data has been deleted successfully');
    }


    public function sort(Request $request){
        // dd($request->all());
         $sort=Page::when(isset($request->sorting),function($q) use($request){
                      $q->orderBy('sorting',$request->sorting);
        })->get();
        return response()->json($sort);
    }
}
