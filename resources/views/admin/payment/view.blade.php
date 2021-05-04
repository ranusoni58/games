@extends('admin.layout')

@section('content')
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{url('/admin/dashboard')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
  </ol>


  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> View Payments  
      <a href="{{url('admin/payment')}}" class="float-right btn btn-sm btn-dark">All Data</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
       
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

       
                <form method="post" action="{{url('admin/payment')}}" enctype="multipart/form-data">
                  @csrf
                  <table class="table table-bordered">
                 
                       <tr>
                     
                       <th>PlayerId :</th>
                        
                        <td><input type="text" value="{{$payments -> player_id}}" readonly class="form-control  col-md-6" /></td>
                      
                        <tr>
                          <th>Recharge :</th>
                          <td><input type="text" value="{{$payments -> recharge}}" readonly class="form-control  col-md-6" /></td>
                        </tr> 
                        <tr>
                          <th>Game_id :</th>
                          <td><input type="text" value="{{$payments -> game_id}}" readonly class="form-control  col-md-6" /></td>
                        </tr> 
                        <tr>
                          <th>Recharge_id :</th>
                          <td><input type="text" value="{{$payments -> recharge_id}}" readonly class="form-control  col-md-6" /></td>
                        </tr> 
                        <tr>
                          <th>Email :</th>
                          <td><input type="text" value="{{$payments -> email}}" readonly class="form-control  col-md-6" /></td>
                        </tr> 
                        <tr>
                          <th>Mobile :</th>
                          <td><input type="text" value="{{$payments -> mobile}}" readonly class="form-control  col-md-6" /></td>
                        </tr> 
                        </tr>
                        <th>Status :</th>
                        <td>

                        <select type="text"   readonly class="form-control col-md-6" >
                      <option value="{{$payments->status}}">Completed</option>
                        </select>
                        </td>
                       
                        </tr> 
                        <tr>
                          <th>OrderId :</th>
                          <td><input type="text" value="{{$payments -> order_id}}" readonly class="form-control  col-md-6" /></td>
                        </tr> 
                    
                        <tr>
                          <th>TransactionId :</th>
                          <td><input type="text" value="{{$payments -> transaction_id}}" readonly class="form-control  col-md-6" /></td>
                        </tr> 
                      
                        
                       
                  </table>
                 
                </form>
      </div>
    </div>
  </div>

</div>


@endsection