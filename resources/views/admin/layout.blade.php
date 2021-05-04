<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>@yield('title','Admin Dashboard')</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <!-- Bootstrap core CSS-->
    <link href="{{asset('backend')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{asset('backend')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{asset('backend')}}/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('backend')}}/css/sb-admin.css" rel="stylesheet">
    @stack('styles')
  </head>

  <body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <a class="navbar-brand mr-1" href="{{url('/admin/dashboard')}}">Games</a>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>
    </nav>

    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item {{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
          <a class="nav-link" href="{{url('/admin/dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
       
        <!-- Slider -->
        <li class="nav-item {{ (request()->is('admin/slider*')) ? 'active' : '' }} dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-address-card"></i>
            <span>Slider</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{url('admin/slider')}}">View All</a>
            <a class="dropdown-item" href="{{url('admin/slider/create')}}">Add New</a>
          </div>
        </li>
       
        <!-- Games -->
        <li class="nav-item {{ (request()->is('admin/game*')) ? 'active' : '' }} dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-gamepad" aria-hidden="true"></i>
            <span>Games</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{url('admin/game')}}">View All</a>
            <a class="dropdown-item" href="{{url('admin/game/create')}}">Add New</a>
          </div>
        </li>
        <!-- Recharges -->
        <li class="nav-item {{ (request()->is('admin/recharge*')) ? 'active' : '' }} dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-mobile" aria-hidden="true"></i>
            <span>Recharges</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{url('admin/recharge')}}">View All</a>
            <a class="dropdown-item" href="{{url('admin/recharge/create')}}">Add New</a>
          </div>
        </li>

        <!-- Payments -->
        <li class="nav-item  {{ (request()->is('admin/payment*')) ? 'active' : '' }} dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-file" aria-hidden="true"></i>
            <span>Payments</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="{{url('admin/payment')}}">View All</a>
            <!-- <a class="dropdown-item" href="{{url('admin/player/create')}}">Add New</a> -->
          </div>
        </li>

          <!-- Pages -->
          <li class="nav-item  {{ (request()->is('admin/page*')) ? 'active' : '' }} dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-file" aria-hidden="true"></i>
            <span>Pages</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{url('admin/page')}}">View All</a>
            <a class="dropdown-item" href="{{url('admin/page/create')}}">Add New</a>
          </div>
        </li>
      
        <!-- Logout -->
        <li class="nav-item {{ (request()->is('logout*')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('logout') }}">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
          </a>
        </li>

      </ul>

      <!-- Content -->
      <div id="content-wrapper">
      @yield('content')
     </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('backend')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('backend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('backend')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="{{asset('backend')}}/vendor/chart.js/Chart.min.js"></script>
    <script src="{{asset('backend')}}/vendor/datatables/jquery.dataTables.js"></script>
    <script src="{{asset('backend')}}/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('backend')}}/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="{{asset('backend')}}/js/demo/datatables-demo.js"></script>
    <script src="{{asset('backend')}}/js/demo/chart-area-demo.js"></script>
    
   @stack('scripts')
  </body>

</html>