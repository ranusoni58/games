<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Recharge;

class GameController extends Controller
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
        $games = Game::orderBy('id','desc')->get();
        return view('admin.game.index',['games'=>$games]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recharges=Recharge::all();
        
        return view('admin.game.addgame',['recharges'=>$recharges]);
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
            'name'=>'required|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg',
          
            'status'=>'required',
            'recharge'=>'required',
            'desc'=>'required',
            'sorting'=>'required|numeric',
           
            ]);
            

            $game = new Game();
            $game->name=$request->name;
          
            $game->status=$request->status;
            $game->desc=$request->desc;
            $game->sorting=$request->sorting;
            $game->recharge=implode(',',$request->recharge);
         
          if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = md5(uniqid(rand(), true)) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('', $filename, ['disk' => 'public']);
            $game->image = $filename;
            //return 'storage/'. $filename;
        }
             $game -> save();
                return redirect('admin/game')->with('success','Data has been added successfully');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $games = Game::find($id);
        return view('admin.game.view',['games'=>$games]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $games = Game::find($id);
        $recharges=Recharge::all();
       
        // dd($games->recharge);
        return view('admin.game.update',['games'=>$games,'recharges'=>$recharges]);
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
            'name'=>'required|max:50',
            // 'images' => 'required',
            // 'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'status'=>'required',
            'recharge'=>'required',
            'desc'=>'required',
            'sorting'=>'required|numeric',
           
            ]);
            

            $game = Game::find($id);
            $game->name=$request->name;
            $game->status=$request->status;
            $game->desc=$request->desc;
            $game->sorting=$request->sorting;
            $game->recharge=implode(',',$request->recharge);
         
            
            if($request->hasfile('image')){
                $request -> validate([
                    'image' => 'image|mimes:jpeg,png,jpg,svg'
                  ]);
                $file = $request->file('image');
                $filename = md5(uniqid(rand(), true)) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('', $filename, ['disk' => 'public']);
                $game->image = $filename;
                //return 'storage/'. $filename;
            }
            $game -> save();
    
         
            return redirect('admin/game')->with('success','Data has been updated successfully');
             
    }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = Game::find($id);
        $game -> delete();
     
        return redirect('admin/game')->with('success','Data has been deleted successfully');
    }
}
