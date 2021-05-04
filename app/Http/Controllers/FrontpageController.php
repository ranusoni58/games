<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Game;
use App\Models\Page;
use App\Models\Recharge;
use App\Models\Payment;

use PaytmWallet;

class FrontpageController extends Controller
{
    //

    function index(){
        $sliders=Slider::orderBy('id','desc')->get();
        $games=Game::orderBy('sorting','desc')->where('status','active')->get();
        $pages=Page::orderBy('id','asc')->where('status','active')->get();
      
        return view('front.homepage',['sliders'=>$sliders,'games'=>$games,'pages'=>$pages]);
       // return view('front.homepage');
    }

    

    function Description($id){
        $games=Game::find($id);
        $recharges=Recharge::whereIn('id',explode(',',$games->recharge))->get();  

        return view('front.gamesdesc',['games'=>$games,'recharges'=>$recharges]);
    }

    // function gamesdesc(){
       
    //     $games=Game::all();
    //     return view('front.gamesdesc',['games'=>$games]);
    // }
    public function save_game_data(Request $request)
    {
        //dd($request->all());
        $request -> validate([
            'player_id'=>'required',
            'recharge'=>'required',
            'mobile' => 'required|numeric|digits:10',
            'email'=>'required|email',
            ]);
           
        //     $player = new Player();
        
        //     $player->player_id=$request->player_id;
        //     $player->mobile=$request->mobile;
        //     $player->email=$request->email;
        //     $player->recharge=$request->recharge;
        
        //     $player -> save();
           $input = $request->all();
             $input['order_id'] = $request->mobile.rand(100,1000);
         $input['recharge_id'] = $request->recharge_id;
        // $input['recharge'] = $request->game_id;

          
        Payment::create($input);


        $payment = PaytmWallet::with('receive');
        $payment->prepare([
          'order' => $input['order_id'],
          'user' => 'admin',
          'mobile_number'=>$input['mobile'],
          'email' => $input['email'],
          'game_id'=>$input['game_id'],
          'recharge_id'=>$input['recharge_id'],
          'amount' => $input['recharge'],
          'callback_url' => url('api/payment/status')
        ]);
        return $payment->receive();
        // dd($transaction);
       

       
        
  
    }
    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');

         
        $response = $transaction->response();
        $order_id = $transaction->getOrderId();
        // $game_id=$transaction->getGameId();


        if($transaction->isSuccessful()){
          Payment::where('order_id',$order_id)->update(['status'=>2, 'transaction_id'=>$transaction->getTransactionId()]);
         // $payment=Payment::where('transaction_id',$transaction->getTransactionId())->first();
         //return redirect()->route('game', ['id' => $payment->game_id])->with('success','Recharge has been successfully completed');

        return redirect()->back()->with('success', 'successfully');
        //return true;
             


         // dd('Payment Successfully Paid.');
        }else if($transaction->isFailed()){
          Payment::where('order_id',$order_id)->update(['status'=>1, 'transaction_id'=>$transaction->getTransactionId()]);
        //  $payment=Payment::where('transaction_id',$transaction->getTransactionId())->first();
          //return redirect()->route('game', ['id' => $payment->game_id])->with('success','Recharge has been successfully completed'); 
          
        return redirect('/');
          //dd('Payment Failed.');
          return false;
        }
    }    

  
}
