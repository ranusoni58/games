@extends('front.frontpage')

@section('content')

<div>
            <div style="background-color: #e2703a; margin: auto">
                <div class="paymentpage">
                    <div class="row py-4">
                        <div class="col-md-4 px-1">
                            <div class="py-3">
                                <img src="{{url('storage/'. $games->image)}}" height="200px"
                                    width="100%"
                                    alt="img" />

                                <div class="terms text-light my-3">
                                    <h4 class="title_text">{{$games->name}}</h4>
                                    <p>Terms & Conditions:</p>
                                    <ul class="list-unstyled">
                                        <li class="text-justify">
                                        {!! $games->desc !!}
                                        </li>
                                   
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 py-3">
                        @if($errors)
                  @foreach($errors->all() as $error)
                  <div class="alert alert-danger" role="alert">
                        {{$error}}
                  </div>
                
                  @endforeach
                @endif

                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                {{session('success')}}   
                </div>
                @endif
                            <form method="post" action="{{ url('/front/{id}/gamesdesc') }}">
                                @csrf
                                <div class="form_div py-1">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="form_no text-center">
                                                <h4 class="text-light pt-1">1</h4>
                                            </div>
                                            <div class="pl-4">
                                                <label for="exampleInputEmail1"
                                                    class="inputlable">Enter
                                                    Player
                                                    ID &
                                                    Mobile No.</label>
                                            </div>

                                        </div>
                                        <input
                                            type="text" id="player_id" name="player_id"
                                            placeholder="Enter Player ID" value="{{old('player_id')}}"
                                            class="form-control form-input"
                                            />
                                        <small id="emailHelp" class="form-text
                                            text-muted">Your player ID is shown
                                            on
                                            the
                                            profile page in your game.
                                            Example: “5363266446".</small>
                                        <input type="tel" class="form-control
                                            my-2
                                            form-input" name="mobile"
                                            id="mobile" value="{{old('mobile')}}"
                                            placeholder="Enter Mobile Number">
                                    </div>
                                </div>

                                <div class="form_div my-4 py-1">
                                    <div class="form-group">
                                        <div class="row py-0">
                                            <div class="form_no text-center">
                                                <h4 class="text-light pt-1">2</h4>
                                            </div>
                                            <div class="pl-4">
                                                <label for="recharge" 
                                                    class="inputlable">Select
                                                    Recharge</label> <small class="form-text
                                            text-muted">Please select diamonds for recharge.</small>
                                            </div>
                                        </div>
                                        <div class="row">
                                        @foreach($recharges as $recharge)
                                            <div class="col-md-4 col-6 mb-4 mt-3">
                                                <div class="text-center
                                                    diamonds_div" onclick="change({{$recharge->amount}},{{$recharge->id}})"  id="topup">
                                                    <h6 class="pt-3">{{$recharge->name}}</h6>
                                                </div>
                                            </div>
                                            @endforeach
                                           
                                        </div> 
                                    </div>
                                </div>

                                <div class="form_div my-4 py-1">
                                    <div class="form-group">
                                        <div class="row py-0">
                                            <div class="form_no text-center">
                                                <h4 class="text-light pt-1">3</h4>
                                            </div>
                                            <div class="pl-4">
                                                <label for="exampleInputEmail1"
                                                    class="inputlable">Select
                                                    Payment
                                                </label>
                                            </div>
                                        </div>
                                        <div class="payment_div">
                                            <div class="row">
                                                <div class="col-md-8 col-6">
                                                    <img
                                                        src="{{asset('front/images/paytm.png')}}"
                                                        class="paytmImg"
                                                        alt="paymentimg"
                                                        />
                                                        
                                                </div>
                                              
                                                <div class="col-md-4 col-6">
                                                Price: &nbsp; ₹
                                                <input type="hidden"  name="recharge_id" id="recharge_id" value="{{old('recharge_id')}}">
                                                <input type="hidden"  name="game_id" id="game_id" value={{Request::segment(2)}}>
                                                <input 
                                                        type="text" 
                                                        class="form-control
                                                        inputfield" 
                                                        readonly 
                                                        name="recharge" value="{{old('recharge')}}"
                                                        id="recharge"
                                                        />
                                                           
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form_div my-4 py-1">
                                    <div class="form-group">
                                        <div class="row py-0">
                                            <div class="form_no text-center">
                                                <h4 class="text-light pt-1">4</h4>
                                            </div>
                                            <div class="pl-4">
                                                <label for="exampleInputEmail1"
                                                    class="inputlable">Buy</label>
                                            </div>
                                        </div>

                                        <input
                                            type="email"
                                            placeholder="Enter E-mail"
                                            style="height: 50px"
                                            class="form-control" value="{{old('email')}}"
                                            id="email" name="email"
                                            aria-describedby="emailHelp"
                                            />

                                        <small id="emailHelp" class="form-text
                                            text-muted">We'll never share your
                                            email
                                            with anyone else.</small>
                                        <button
                                            type="submit"
                                            class="btn mt-3 py-2 px-5 btn-lg
                                            btn-outline-success">
                                            Buy Now
                                        </button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="aboutsection container text-center my-5">

                <h4 class="font-weight-bold">About {{$games->name}}</h4>
                <p class="text-justify" style="font-size: 15px;">{{$games->name}} is a
                    battle royale ultimate
                    survival shooter game
                    on mobile. Each 10-minute game places you on a remote island
                    where you are pitted against 49 other players, fighting for
                    survival. Players can choose their starting point using
                    their parachute, and stay in the safe zone for as long as
                    possible. Drive vehicles to explore the vast map, hide in
                    trenches, or become invisible by proning under grass.
                    Ambush, snipe, survive, there is only one goal: to survive
                    and become the apex of them all.</p>

            </div>
        </div>
<script>
  function change(value,id){
    document.getElementById("recharge").value= value ;
    document.getElementById("recharge_id").value= id ;
   // document.getElementById("recharge").innerHTML= "Total price:" + 20*value +"$";

  }
</script>
@endsection