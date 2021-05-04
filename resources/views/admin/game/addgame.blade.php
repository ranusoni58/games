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
              <i class="fas fa-table"></i> Add Games
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
                          <th>Name <span class="text-danger">*</span></th>
                          <td><input type="text" name="name" class="form-control" /></td>
                        </tr> 
                      <tr>
                          <th>Image <span class="text-danger">*</span></th>
                          <td><input type="file"  name="image" /></td>
                        </tr>
                      
                        <tr>
                        <th>Status <span class="text-danger">*</span></th>
                        <td>

                          <select type="text" name="status" class="form-control" >
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                          </select>
                        </td>
                        </tr>

                         <tr>
                        <th>Select Recharges <span class="text-danger">*</span></th>
                        <td>

                          <select  multiple class="js-example-basic-multiple form-control" name="recharge[]"  >
                              @foreach($recharges as  $recharge)
                                <option value="{{ $recharge->id }}">{{ $recharge->name }} Type - {{$recharge->recharge_type}}</option>
                            @endforeach
                           
                          </select>
                        </td>
                        </tr> 
                      
                        <th>Description <span class="text-danger">*</span></th>
                          <td>
                            <textarea name="desc"  class="form-control desc"  id="desc" ></textarea>
                          </td>
                        <tr>
                          <th>Sorting <span class="text-danger">*</span></th>
                          <td><input type="text" name="sorting" class="form-control" /></td>
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
@push('scripts')
        <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    tinymce.init({
        selector:'textarea.desc',
        width: 900,
        height: 300
    });
    $('#desc').on('paste', function(e) {
    $(this).children().attr('background-color', 'transparent');
});

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

@endpush 
@endsection
