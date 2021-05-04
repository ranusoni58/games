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
      <i class="fas fa-table"></i> Update Games 
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
        <form method="post" action="{{url('admin/game/'.$games->id)}}" enctype="multipart/form-data">
          @csrf
          @method('put')
          <table class="table table-bordered">
          
                    <tr>
                       <tr>
                          <th>Name <span class="text-danger">*</span></th>
                          <td><input type="text" name="name"  value="{{$games->name}}" class="form-control" /></td>
                        </tr> 

                        <tr>
                          <th>Images:</th>
                          <td>
                          <p class="my-2"><img width="80" src="{{ URL::asset('storage/'.$games->image) }}" /></p>
                          <input type="hidden" value="{{$games->image}}" name="image" />
                          <input type="file" name="image" />
                        </td>
                      </tr>
                      
                       {{old('status')=='1'?'selected':''}}
                        <tr>
                        <th>Status  <span class="text-danger">*</span></th>
                        <td>

                          <select type="text"  value="" name="status" class="form-control" >
                      
                            <option {{($games->status) =="active"? 'selected':''}} value="active" >Active</option>
                            <option {{($games->status) =="inactive"? 'selected':''}} value="inactive" >Inactive</option>
                          </select>
                        </td>
                        </tr> 

                        <tr>
                        <th>Recharges  <span class="text-danger">*</span></th>
                        <td>
                         
                          <select  multiple class="js-example-basic-multiple form-control" name="recharge[]"  >

                          @foreach($recharges as $key => $recharge)
                            @if(in_array($recharge->id, old('recharge') ?? explode(',', $games->recharge??'' )))
                            <option value="{{ $recharge->id }}" selected>{{ $recharge->name }}</option>
                            @else
                            <option value="{{ $recharge->id }}"
                            >{{ $recharge->name }}</option>
                            @endif
                            @endforeach
                            </select>
                        </td>
                        </tr> 
                      
                        <tr>
                          <th>Description <span class="text-danger">*</span></th>
                          <td>
                            <textarea name="desc" id="desc" value="{{$games->desc}}" class="form-control desc" >{{$games->desc}}</textarea>
                          </td>

                        </tr> 
                        <tr>
                          <th>Sorting <span class="text-danger">*</span></th>
                          <td><input type="text" name="sorting"  value="{{$games->sorting}}" class="form-control" /></td>
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