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
              <i class="fas fa-table"></i> Add Pages
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

                <form method="post" action="{{url('admin/page')}}" enctype="multipart/form-data">
                  @csrf
                  <table class="table table-bordered">
                       <tr>
                       <tr>
                          <th>PageName <span class="text-danger">*</span></th>
                          <td><input type="text" name="name" class="form-control" /></td>
                        </tr> 
                        <tr>
                          <th>Sorting <span class="text-danger">*</span></th>
                          <td><input type="text" name="sorting" class="form-control" /></td>
                        </tr> 
                        <tr>
                          <th>Description <span class="text-danger">*</span></th>
                          <td>
                            <textarea name="content"  class="form-control content"  id="content" ></textarea>
                          </td>

                        </tr> 
                        <tr>
                          <th>BannerImage <span class="text-danger">*</span></th>
                          <td><input type="file" name="image" /></td>
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
 @push('styles')
        <!-- <link href="{{ asset('assets/plugins/quill/quill.snow.css') }}" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css" /> -->
    <!-- <link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.core.css"> -->
    <!-- <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css" /> --> 
@endpush

@push('scripts')
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.tiny.cloud/1/60abxjgp8oxppenp567ygzvxcpajn0a273e7hdeep8ht5hwz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->

<!-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script> -->
<!-- <script src="{{ asset('assets/plugins/quill/quill.js') }}"></script> -->
<!-- <script src="{{ asset('assets/plugins/quill/kensnyder/image-drop.min.js') }}"></script>
<script src="{{ asset('assets/plugins/quill/kensnyder/image-resize.min.js') }}"></script> -->
<!-- <script>
$(function () {
var quill = new Quill('#quill-editor-content_hi', {
theme: 'snow',
modules: {
imageDrop: true,
imageResize: {
displaySize: true
},
toolbar: {
container: [
[{header: [1, 2, 3, 4, 5, 6, false]}],
[{font: []}],
[{size: ["small", false, "large", "huge"]}],
[{color: []}, {background: []}],
[
{align: ""},
{align: "center"},
{align: "right"},
{align: "justify"}
],
//[{ header: 1 }, { header: 2 }],
["bold", "italic", "underline", "strike"],

[{list: "ordered"}, {list: "bullet"}],

[{indent: "-1"}, {indent: "+1"}],
[{direction: "rtl"}],

//[{ script: "sub" }, { script: "super" }],

["link", "image", "clean", "blockquote", "code-block"]
],
handlers: {
// image: imageHandler
}
}
},
placeholder: 'Type Something..',
readOnly: false
});

quill.on('text-change', function (delta, oldDelta, source) {
$(".quill-textarea-content_hi").html(quill.root.innerHTML);
});
});
</script>  -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
     <script src="{{asset('js/quill-custom.js')}}"></script>  -->
    
  <!-- <script>
     tinymce.init({
        selector:'#content'
     });
  </script> -->
  
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
