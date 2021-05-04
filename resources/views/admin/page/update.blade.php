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
      <i class="fas fa-table"></i> Update Pages
          <a href="{{url('admin/page')}}" class="float-right btn btn-sm btn-dark">All Data</a>
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
        <form method="post" action="{{url('admin/page/'.$page->id)}}" enctype="multipart/form-data">
          @csrf
          @method('put')
          <table class="table table-bordered">
            <tr>
                       <tr>
                          <th>PageName <span class="text-danger">*</span></th>
                          <td><input type="text" name="name"  value="{{$page->name}}" class="form-control" /></td>
                        </tr> 
                        <tr>
                        
                        <tr>
                          <th>Sorting <span class="text-danger">*</span></th>
                          <td><input type="text" name="sorting"  value="{{$page->sorting}}" class="form-control" /></td>
                        </tr> 
                        <tr>
                          <th>Description <span class="text-danger">*</span></th>
                          <td>
                            <textarea name="content" id="content" class="form-control content" >{{$page->content}}</textarea>
                          </td>

                        </tr> 
                        <th>BannerImage</th>
                        <td>
                            <p class="my-2"><img width="80" src="{{ URL::asset('storage/'.$page->image) }}" /></p>
                            <input type="hidden" value="{{$page->image}}" name="image" />
                            <input type="file" name="image" />
                        </td>
                        </tr>
                       {{old('status')=='1'?'selected':''}}
                        <tr>
                        <th>Status  <span class="text-danger">*</span></th>
                        <td>

                          <select type="text"  value="" name="status" class="form-control" >
                         
                            <option {{($page->status) =="active"? 'selected':''}} value="active" >Active</option>
                            <option {{($page->status) =="inactive"? 'selected':''}} value="inactive" >Inactive</option>
                          </select>
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
@push('scripts')
<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>

  <script>
    tinymce.init({
        selector:'textarea.content',
        width: 900,
        height: 300
    });
</script>

   
@endpush

@endsection