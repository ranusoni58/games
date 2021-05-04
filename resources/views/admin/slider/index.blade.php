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
      <i class="fas fa-table"></i> Slider
      <a href="{{url('admin/slider/create')}}" class="float-right btn btn-sm btn-dark">Add Data</a>
    </div>
    <div class="card-body">
    <!-- <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
    <div class="row">
    <div class="col-sm-12 col-md-6">
    <div class="dt-buttons btn-group flex-wrap">              
     <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Copy</span></button> 
     <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>CSV</span></button>
      <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Excel</span></button> 
      <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>PDF</span></button> 
      <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button"><span>Print</span></button> <div class="btn-group">
      <button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="example1" type="button" aria-haspopup="true" aria-expanded="false"><span>Column visibility</span></button>
      </div> 
      </div>
      </div> -->
     
      <div class="table-responsive mt-5">
      
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
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
               
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
           <tbody>
           
            @foreach($sliders as $slider)
                <tr>
                    <td><img class="img-fluid" src="{{ URL::asset('storage/'.$slider->image) }}" width="100px" height="100px" alt="Image"> </td>
                   
                    <td>
                    <a class="btn btn-info btn-sm my-3" href="{{url('admin/slider/'.$slider->id.'/view')}}" > <i class="fas fa-eye"></i></a>
                    <a class="btn btn-secondary btn-sm my-3" href="{{url('admin/slider/'.$slider->id.'/edit')}}"> <i class="fas fa-edit"></i></a>
                    <a href="/admin/slider/delete/{{$slider->id}}" class="btn btn-sm btn-danger delete-confirm"> <i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>

      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@push('scripts')
<!-- /.container-fluid -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>
<script>
$('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush
@push('styles')
<!-- <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}"> -->
@endpush
@endsection