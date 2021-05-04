@extends('admin.layout')
@section('content')
<div class="container-fluid ">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{url('/admin/dashboard')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
  </ol>

  <!-- Icon Cards-->
  
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
          <i class="fa fa-gamepad" aria-hidden="true"></i>
          </div>
          <div class="mr-5">{{\App\Models\Game::count()}} Game</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{url('admin/game')}}">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
          <i class="fa fa-trophy" aria-hidden="true"></i>
          </div>
          <div class="mr-5"> {{\App\Models\Payment::where('status',2)->get()->count()}} Payments</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{url('admin/payment')}}">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
          <i class="fa fa-mobile" aria-hidden="true"></i>
          </div>
          <div class="mr-5">{{\App\Models\Recharge::count()}} Recharges</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{url('admin/recharge')}}">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-danger o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
          <i class="fa fa-file" aria-hidden="true"></i>
          </div>
          <div class="mr-5">{{\App\Models\Page::count()}} Pages</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{url('admin/page')}}">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    
  </div>
</div>

@endsection