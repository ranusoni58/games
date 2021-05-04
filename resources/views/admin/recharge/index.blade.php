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
      <i class="fas fa-table"></i> Recharges
      <a href="{{url('admin/recharge/create')}}" class="float-right btn btn-sm btn-dark">Add Data</a>
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
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>S.no</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Status</th>
                <th>RechargeType</th>
                <th>Action</th>
            </tr>
            </thead>
           <tbody>
           
            @foreach($recharges as $recharge)
                <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$recharge -> name}}</td>
                    <td>{{$recharge -> amount}}</td>
                    <td>{{$recharge -> status}}</td>
                    <td>{{$recharge -> recharge_type}}</td>
                   
                    <td>
                    <a class="btn btn-info btn-sm my-3" href="{{url('admin/recharge/'.$recharge->id.'/view')}}" > <i class="fas fa-eye"></i></a>
                    <a class="btn btn-secondary btn-sm my-3" href="{{url('admin/recharge/'.$recharge->id.'/edit')}}"> <i class="fas fa-edit"></i></a>
                    <a href="/admin/recharge/delete/{{$recharge->id}}" class="btn btn-sm btn-danger delete-confirm"> <i class="fas fa-trash"></i></a>
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
@endpush
@endsection