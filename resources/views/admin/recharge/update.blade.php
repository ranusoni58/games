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
      <i class="fas fa-table"></i> Update Recharge
      <a href="{{url('admin/recharge')}}" class="float-right btn btn-sm btn-dark">All Data</a>
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

        <form method="post" action="{{url('admin/recharge/'.$recharge->id)}}" enctype="multipart/form-data">
          @csrf
          @method('put')
          <table class="table table-bordered">
                <tr>
                <tr>
                    <th>Name <span class="text-danger">*</span></th>
                    <td><input type="text" name="name"  value="{{$recharge->name}}" class="form-control" /></td>
                </tr> 
                <tr>
                    <th>Amount <span class="text-danger">*</span></th>
                    <td><input type="text" name="amount" value="{{$recharge->amount}}" class="form-control" /></td>
                </tr> 
                
                {{old('status')=='1'?'selected':''}}
                        <tr>
                        <th>Status <span class="text-danger">*</span></th>
                        <td>

                          <select type="text"  value="" name="status" class="form-control" >
                            <option {{($recharge->status) =="active"? 'selected':''}} value="active" >Active</option>
                            <option {{($recharge->status) =="inactive"? 'selected':''}} value="inactive" >Inactive</option>
                          </select>
                        </td>
                        </tr> 
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