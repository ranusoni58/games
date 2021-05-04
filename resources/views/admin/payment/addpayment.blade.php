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
              <i class="fas fa-table"></i> Add Player
              <a href="{{url('admin/player')}}" class="float-right btn btn-sm btn-dark">All Data</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">


                <form method="post" action="{{url('admin/player')}}" enctype="multipart/form-data">
                  @csrf
                  <table class="table table-bordered">
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
                        <tr>
                        <th>Status <span class="text-danger">*</span></th>
                        <td>

                          <select type="text" name="status" class="form-control" >
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                          </select>
                        </td>
                        </tr> 
                        <tr>
                        <tr>
                        <tr>
                          <th>Remark <span class="text-danger">*</span></th>
                          <td><input type="text" name="remark" class="form-control" /></td>
                        </tr> 
                      
                          <th>Email <span class="text-danger">*</span></th>
                          <td><input type="email" name="email" class="form-control" /></td>
                        </tr> 
                        <tr>
                          <th>Recharge <span class="text-danger">*</span></th>
                          <td><input type="text" name="recharge" class="form-control" /></td>
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