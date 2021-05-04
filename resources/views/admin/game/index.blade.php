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
      <i class="fas fa-table"></i> Games  
      <a href="{{url('admin/game/create')}}" class="float-right btn btn-sm btn-dark">Add Data</a>
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
                <th>Image</th>
                <th>Status</th>
                <th>Recharges</th>
                <th>Description</th>
                <th>Sorting</th>

                <th>Action</th>
            </tr>
            </thead>
           <tbody>
           
            @foreach($games as $game)
            
                <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$game -> name}}</td>
                   <td>
                    <img class="img-fluid mr-3" src="{{ URL::asset('storage/'.$game->image) }}" width="100px" height="200px" alt="Image">
                  
                   </td>
                    <td>{{$game -> status}}</td>
                    <td>
                    {{optional(App\Models\Recharge::findMany(explode(',',$game->recharge)))->pluck('name')->implode(',')}} ,
                    </td>
                    <td>{!! $game -> desc !!}</td>
                    <td>{{$game ->sorting }}</td>
                   
                    <td>
                    <a class="btn btn-info btn-sm my-3" href="{{url('admin/game/'.$game->id.'/view')}}" > <i class="fas fa-eye"></i></a>
                    <a class="btn btn-secondary btn-sm my-3" href="{{url('admin/game/'.$game->id.'/edit')}}" > <i class="fas fa-edit"></i></a>
                    <!-- <button class="btn btn-danger btn-sm remove-game" data-id="{{ $game->id }}"> <i class="fas fa-trash"></i></button> -->
                    <!-- <button onclick="deleteItem(this)"  class="btn btn-danger " data-id="{{ $game->id }}"><i class="fas fa-trash"></i></button> -->
                    <a href="/admin/game/delete/{{$game->id}}" class="btn btn-danger btn-sm delete-confirm"> <i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

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
@push('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js">
@endpush


@endsection