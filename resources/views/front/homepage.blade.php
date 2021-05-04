@extends('front.frontpage')

@section('content')

<div class="main-page">
       <div class="my-0 py-4"
 style="background-color: #e2703a;" >
        <div id="carouselExampleIndicators" class="carousel displaystyle  slide" data-ride="carousel">
            <ol class="carousel-indicators">
            @foreach($sliders as $key => $slider)
                       <li data-target="#main-page" data-slide-to="{{$key}}" class="carousel-1">
                       </li>
             @endforeach
              </ol>
           <div class="carousel-inner">
               
            @foreach ($sliders as $key => $slider)
                <div class="carousel-item  {{ $key == 0 ? ' active' : '' }} ">
                    <img src="{{url('storage/'. $slider->image)}} " class="d-block w-100">
                </div>
            @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>    

<div class='my-3 displaystyle'>
<h4 class="text-light titles">Direct Top-Up</h4>

<div class="row">
@foreach($games as $game)
     <div class="col-md-3 col-4">
        <div class="card c1" >
        <a href="{{url('front/'.$game->id.'/gamedesc')}}"><img src="{{url('storage/'. $game->image)}}" class="card-img-top" alt="..."></a>
          </div>
          <a style="text-decoration:none" href="{{url('front/'.$game->id.'/gamedesc')}}"><p class="text-center c1-text text-light">{{$game->name}}</p></a>
    </div>
@endforeach
</div>

</div>

</div>  


<div class="whytopups displaystyle" >
    <div class="">
<h4 class="font-weight-bold">What top up games</h4>
<!-- <p style="font-size: 15px;" class="text-justify"> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p> -->
</div>
<div class="row px-2">
@foreach($pages as $page)
     <div class="col-md-6 col-12 my-2">
        <div class="row">
            <div class='col-md-3 col-3 text-center'>
                <img src="{{url('storage/'. $page->image)}}" width='90%' alt='img' />
            </div>
            <div class="col-md-9 col-9 px-1">
                 <h4>{{$page->name}}</h4>
                <p style="font-size: 13px;" class="text-justify">{!! $page->content !!}</p>
            </div>
        </div>
    </div>
@endforeach
   
</div>
</div>


<div class="newssection " style="background-color: #e2703a;">
<div class="displaystyle py-3">
<h4 class="text-light titles">News</h4>
<div class="news_img_div">
    <img src="{{asset('front/images/free4.jpg')}}" class="w-100 " alt='img'/>
</div>
</div>
</div>
</div>

@endsection