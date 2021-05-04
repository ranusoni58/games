@extends('admin.layout')
@section('content')
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{url('admin/dashboard')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
  </ol>


  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Update Slider
      <a href="{{url('admin/slider')}}" class="float-right btn btn-sm btn-dark">All Data</a>
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
        <form method="post" action="{{url('admin/slider/'.$slider->id)}}" enctype="multipart/form-data">
          @csrf
          @method('put')
          <table class="table table-bordered">
            <tr>

                <tr>
                <th>Image</th>
                <td>
                    <p class="my-2"><img width="80" src="{{ URL::asset('storage/'.$slider->image) }}" /></p>
                    <input type="hidden" value="{{$slider->image}}" name="image" />
                    <input type="file" name="image" />
                  </td>
                </tr>
                <tr>
         
                <td colspan="2">
                    <input type="submit" class="btn btn-primary" />
                </td>
            </tr>
        </table>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

@endsection