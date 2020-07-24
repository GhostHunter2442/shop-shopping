<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--<link rel="stylesheet" href="{{ asset('css/backend/bootstrap.min.css') }}"> --}}
   {{-- <link rel="stylesheet" href="{{ asset('css/backend/all.min.css') }}"> --}}
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


   <link rel="stylesheet" href="{{ asset('css/backend/switchery.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/backend/sweetalert2.min.css') }}">


    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
   {{-- <link rel="stylesheet" href="{{ asset('css/backend/select2.min.css') }}">--}}
   {{-- <link rel="stylesheet" href="{{ asset('css/backend/select2-bootstrap4.min.css') }}"> --}}
   {{-- <link rel="stylesheet" href="{{ asset('css/backend/daterangepicker.css') }}"> --}}


   <link rel="stylesheet" href="{{ asset('css/app.css') }}">

   <link rel="stylesheet" href="{{ asset('css/backend/dataTables.bootstrap4.css') }}">




 {{-- <link rel="stylesheet" href="{{ asset('css/backend/adminlte.min.css') }}"> --}}


 {{-- <link rel="stylesheet" href="{{ asset('css/backend/summernote-bs4.css') }}"> --}}
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/backend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/tempusdominus-bootstrap-4.min.css') }}">


    <link rel="stylesheet" href="{{ asset('css/toastr.css')}}">

    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('http://localhost/shopping/public/backend')) !!}
        var APP_LINK = {!! json_encode(Storage::url('images')) !!}
        var APP_IMG = {!! json_encode(url('http://localhost/shopping/public/storage/images/resize/')) !!}
        var APP_IMG_SLIP = {!! json_encode(url('http://localhost/shopping/public/storage/images/slipbank/')) !!}
        var APP_IMG_BANK = {!! json_encode(url('http://localhost/shopping/public/storage/images/bank/')) !!}
        var APP_USERID = {!! json_encode(Auth::id()) !!}
        var APP_LANG = {!! json_encode(asset('js/backend/datatables-th.lang')) !!}
    </script>

</head>

<body class="hold-transition sidebar-mini">
    <div id="app" class="wrapper">

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
        {{-- <nav class="main-header navbar navbar-expand navbar-blue navbar-dark"> --}}
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>

              </li>
              @can('viewSales')
              <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('welcome') }}" class="nav-link">ซื้อสินค้า</a>
              </li>
              @endcan

          </ul>
        <ul class="navbar-nav ml-auto">



          <li class="nav-item d-none d-sm-inline-block ">
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
          <i class="fa fa-sign-out" aria-hidden="true"></i>
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
         </form>
        </li>

        </ul>

        <!-- SEARCH FORM -->



        {{-- <ul class="navbar-nav ml-auto">



          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fa fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li>

        </ul> --}}
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <img src="{{ asset('img/logo.png') }}" alt="AdminLTE Logo"
               style="opacity: .5"  class="brand-image img">

          <span class="brand-text font-weight-light">{{ config('app.name')}}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar ">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
               {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
            </div>
            <div class="info">
           <a href="#" class="d-block">ยินดีต้อนรับ : {{ optional(auth()->user())->name }}</a>

            <small class="text-light">อีเมล : {{ optional(auth()->user())->email}}</small><br>
            <small class="text-light">ระดับ : {{ auth()->user()->getRoleNames()[0] }} </small>
            {{-- <br>
                  <small class="text-light">เบอรโทร : {{ optional(auth()->user()->profile)->phonenumber}}</small><br>
            <small class="text-light">: {{ App\Profile::where('user_id',auth()->user()->id)->first()->user->email}}</small> --}}
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2 ">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
               {{-- @if (auth()->user()->userrole== 'admin') --}}


               <li class="nav-header">ข้อมูลหลัก</li>
               <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' :''  }}">
                  <i class="nav-icon fa fa-home"></i>
                  <p>
                    หน้าหลัก
                  </p>
                </a>
              </li>

              @can('viewCategory')
               <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link {{ request()->routeIs('category.index') ? 'active' :''  }}">
                  <i class="nav-icon fa fa-calendar-plus-o"></i>
                  <p>
                    หมวดสินค้า
                  </p>
                </a>
              </li>
              @endcan
              @can('viewProduct')
             <li class="nav-item">
            <a href="{{ route('product.index') }}" class="nav-link {{ request()->routeIs('product.index') ? 'active' :''  }}">
              <i class="nav-icon fa fa-th"></i>
              <p>
                สินค้า

              </p>
            </a>
          </li>
          @endcan

          @if(Gate::check('viewPreOrder') || Gate::check('viewPreOrder') || Gate::check('viewSentOrder'))
            <li class="nav-header">ข้อมูลการขาย</li>
          @endif
          @can('viewAcceptOrder')
          <li class="nav-item">
            <a href="{{ route('invoice.index') }}" class="nav-link {{ request()->routeIs('invoice.index') ? 'active' :''  }}">
              <i class="nav-icon fa fa-first-order"></i>
              <p>
             รับการการสั่งซื้อ
              </p>
            </a>
          </li>
          @endcan
          @can('viewPreOrder')
          <li class="nav-item">
            <a href="{{ route('invoice.preorder') }}" class="nav-link {{ request()->routeIs('invoice.preorder') ? 'active' :''  }}">
              <i class="nav-icon fa fa-bookmark-o"></i>
              <p>
             เตรียมจัดส่ง
              </p>
            </a>
          </li>
          @endcan
          @can('viewSentOrder')
          <li class="nav-item">
            <a href="{{ route('invoice.order') }}" class="nav-link {{ request()->routeIs('invoice.order') ? 'active' :''  }}">
              <i class="nav-icon fa fa-check-square-o"></i>
              <p>
             รายการจัดส่งสินค้า

              </p>
            </a>
          </li>
          @endcan
          <li class="nav-header">รายงายการขาย</li>

          <li class="nav-item has-treeview {{ request()->routeIs('report.index') ? 'menu-open' : request()->routeIs('reportdetail.index') ? 'menu-open' :''  }}">
            <a href="#" class="nav-link {{ request()->routeIs('report.index') ? 'active' : request()->routeIs('reportdetail.index') ? 'active' :''  }}">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                รายงาน
                <i class="right fa fa-angle-left"></i>

              </p>
            </a>

            <ul class="nav nav-treeview">
                @can('viewDashboardReport')
              <li class="nav-item">
                <a href="{{ route('report.index') }}" class="nav-link {{ request()->routeIs('report.index') ? 'active' :''  }}">
                  <i class="fa fa-dashboard nav-icon" style="font-size:13px"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              @endcan
              <li class="nav-item">
                <a href="{{ route('reportdetail.index') }}" class="nav-link {{ request()->routeIs('reportdetail.index') ? 'active' :''  }}">
                    <i class="fa fa-bar-chart nav-icon" style="font-size:13px"></i>
                  <p>ยอดขายตามธนาคาร</p>
                </a>
              </li>
            </ul>

          </li>
            @role('admin')
          <li class="nav-header">จัดการทั่วไป</li>
          <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link {{ request()->routeIs('user.index') ? 'active' :''  }}">
                <i class="fa fa-user nav-icon" ></i>
                <p>ผู้ใช้งาน</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('bank.index') }}" class="nav-link {{ request()->routeIs('bank.index') ? 'active' :''  }}">
                <i class="fa fa-university nav-icon" ></i>
                <p>ธนาคาร</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('renderForm.index') }}" class="nav-link {{ request()->routeIs('renderForm.index') ? 'active' :''  }}">
                <i class="fa fa-cogs nav-icon" ></i>
                <p>ข้อมูลเวป</p>
              </a>
          </li>
            @endrole

               {{-- @endif --}}


            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">

                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h3 class="m-0 text-dark">@yield('title')</h3>
                        </div>

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าหลัก</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
         <!-- /.content-header -->
         @yield('content')
      </div>
      <!-- /.content-wrapper -->
      {{-- <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.0.4
        </div>
      </footer> --}}

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <script src="{{ asset('js/backend/vue.min.js') }}"></script>
    <script src="{{ asset('js/backend/axios.min.js') }}"></script>
    <script src="{{ asset('js/backend/modernizr.min.js') }}"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> --}}
     <script src="{{ asset('js/backend/jquery.min.js') }}"></script>
     <script src="{{ asset('js/backend/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/backend/moment.min.js') }}"></script>
    <script src="{{ asset('js/backend/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('js/backend/Chart.min.js') }}"></script>
    <script src="{{ asset('js/backend/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/backend/tempusdominus-bootstrap-4.min.js') }}"></script>




    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('js/backend/popper.min.js') }}"></script>
    <script src="{{ asset('js/backend/bootstrap.min.js') }}"></script>
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>

    {{-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> --}}
    <script src="{{ asset('js/backend/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/backend/dataTables.bootstrap4.js') }}"></script>
  {{-- <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> --}}

    <script src="{{ asset('js/backend/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/backend/messages_th.js') }}"></script>

    <script src="{{ asset('js/backend/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js')}}"></script>
    <script src="{{ asset('js/select2.full.min.js') }}"></script>

    {{-- <script src="{{ asset('js/backend/bootstrap-datepicker.min.js') }}"></script> --}}


    <script src="{{ asset('js/backend/detect.js') }}"></script>
    <script src="{{ asset('js/backend/fastclick.js') }}"></script>
    <script src="{{ asset('js/backend/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('js/backend/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/backend/jquery-scrollTo.min.js') }}"></script>
    <script src="{{ asset('js/backend/switchery.min.js') }}"></script>


    <script src="{{ asset('js/backend/loadingoverlay.min.js') }}"></script>
    <script src="{{ asset('js/backend/adminlte.min.js') }}"></script>


    <script src="{{ asset('js/backend/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('js/backend/custom.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"> --}}




    {{-- <script>
        $(function () {
          //Initialize Select2 Elements
          $('.select2').select2()

        })
      </script> --}}

      @yield('script')
      @yield('footerscript')
    </body>

</html>
