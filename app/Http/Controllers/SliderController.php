<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
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
        $sliders = Slider::orderBy('id','desc')->get();
        return view('admin.slider.index',['sliders'=>$sliders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.addslider');
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
           
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
            ]);


            $slider = new Slider();
          
            if($request->hasfile('image')){
                $file = $request->file('image');
                $filename = md5(uniqid(rand(), true)) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('', $filename, ['disk' => 'public']);
                $slider->image = $filename;
                //return 'storage/'. $filename;
            }
            $slider -> save();
            return redirect('admin/slider')->with('success','Data has been added successfully');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sliders = Slider::find($id);
        return view('admin.slider.view',['sliders'=>$sliders]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.update',['slider'=>$slider]);
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
           

            $slider = Slider::find($id);
          
            if($request->hasfile('image')){
                $request -> validate([
           
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
                    ]);
        
                $file = $request->file('image');
                $filename = md5(uniqid(rand(), true)) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('', $filename, ['disk' => 'public']);
                $slider->image = $filename;
                //return 'storage/'. $filename;
            }
          
            $slider -> save();
            return redirect('admin/slider')->with('success','Data has been updated successfully');
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $slider = Slider::find($id);
        $slider -> delete();
     
        return redirect('admin/slider')->with('success','Data has been deleted successfully');
    }
}
