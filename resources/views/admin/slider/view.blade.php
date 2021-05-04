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
      <i class="fas fa-table"></i> View Sliders  
      <a href="{{url('admin/slider')}}" class="float-right btn btn-sm btn-dark">All Data</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
       
                <form method="post" action="{{url('admin/slider')}}" enctype="multipart/form-data">
                  @csrf
                  <table class="table table-bordered">
                 
                    
                          <th>Images:</th>
                          <td>
                           <img class="img-fluid mr-3" src="{{ URL::asset('storage/'.$sliders->image) }}" width="100px" height="200px" alt="Image">
                       
                           </td>
                      </tr>
                     
                  </table>
                 
                </form>
      </div>
    </div>
  </div>

</div>


@endsection