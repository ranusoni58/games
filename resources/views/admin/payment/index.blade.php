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
      <i class="fas fa-table"></i> Payments
      <!-- <a href="{{url('admin/player/create')}}" class="float-right btn btn-sm btn-dark">Add Data</a> -->
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
               <th>Sno.</th>
               <th>PlayerId</th>
               <th>GameId</th>
               <th>RechargeId</th>
               <th>Recharge</th>
               <th>Email</th>
               <th>Mobile</th>
                <th>Status</th>
                <th>OrderId</th>
                <th>TransactionId</th>
                <th>Action</th>
            </tr>
            </thead>
           <tbody>
           
            @foreach($payments as $payment)
                <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$payment -> player_id}}</td>
                <td>{{$payment -> game_id}}</td>
                <td>{{$payment -> recharge_id}}</td>
                <td>{{$payment -> recharge}}</td>
                <td>{{$payment -> email}}</td>
                <td>{{$payment -> mobile}}</td>
                <td>Completed</td>
                <td>{{$payment -> order_id}}</td>
                <td>{{$payment -> transaction_id}}</td>
               
                   
                    <td>
                    <a class="btn btn-info btn-sm my-3" href="{{url('admin/payment/'.$payment->id.'/view')}}" > <i class="fas fa-eye"></i></a>
              
                    <a href="/admin/payment/delete/{{$payment->id}}" class="btn btn-danger btn-sm delete-confirm"> <i class="fas fa-trash"></i></a>
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