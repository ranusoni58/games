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
      <i class="fas fa-table"></i> View Games  
      <a href="{{url('admin/game')}}" class="float-right btn btn-sm btn-dark">All Data</a>
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

       
                <form method="post" action="{{url('admin/game')}}" enctype="multipart/form-data">
                  @csrf
                  <table class="table table-bordered">
                 
                       <tr>
                       <tr>
                          <th>Name :</th>
                          <td><input type="text" value="{{$games -> name}}" readonly class="form-control col-md-6" /></td>
                        </tr> 
                     
                        <tr>
                        <th>Status :</th>
                        <td>

                        <select type="text"   readonly class="form-control col-md-6" >
                      <option value="{{$games->status}}">{{$games->status}}</option>
                        </select>
                        </td>
                       
                        </tr> 

                        <tr>
                        <th>Recharges :</th>
                        <td>

                       
                        {{optional(App\Models\Recharge::findMany(explode(',',$games->recharge)))->pluck('name')->implode(',')}} ,
                  
                        </td>
                       
                        </tr> 
                      
                        <tr>
                          <th>Description :</th>
                          <td>
                          {!!  $games->desc !!}
                          </td>
                        </tr> 
                        <tr>
                          <th>Sorting :</th>
                          <td><input type="text" value="{{$games -> sorting}}" readonly class="form-control  col-md-6" /></td>
                        </tr> 
                      </tr>
                      <tr>
                          <th>Images:</th>
                          <td>
                           <img class="img-fluid mr-3" src="{{ URL::asset('storage/'.$games->image) }}" width="100px" height="200px" alt="Image">
                         
                           </td>
                      </tr>
                     
                  </table>
                 
                </form>
      </div>
    </div>
  </div>

</div>


@endsection