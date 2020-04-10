<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@lang("OptimasyonX")</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
  @include('include.css')


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/home" class="nav-link">@lang("Home")</a>
            </li>
        </ul>
    @include('sweetalert::alert')
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link ">
            <i class="fas fa-sign-out-alt">@lang("Logout")</i>
                </a>
            </li>




            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="/dist/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">@lang("OptimasyonX")</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{Auth::user()->image}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="/profile" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt "></i>
                            <p>
                               @lang("Users")
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/users" class="nav-link ">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>@lang("Users")</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/roles" class="nav-link">
                                <i class="fas fa-user-shield"></i>
                                    <p>@lang("Roles")</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/permissions" class="nav-link">
                                    <i class="fas fa-key nav-icon"></i>
                                    <p>@lang("Permissions")</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="post" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang("Posts")</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="crud" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang("Cruds")</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="image" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang("Image")</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="staff" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang("Staff")</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="company" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang("Company")</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="profile" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang("Profile")</p>
                        </a>
                    </li>





                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@yield('header')</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                @yield('content')

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>@lang("Copyright") &copy; 2014-2019 <a href="/">@lang("OptimasyoX")</a>.</strong>
        @lang("All rights reserved.")
        <div class="float-right d-none d-sm-inline-block">
            <b>@lang("Version")</b> 1.0.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('include.script')
<script>
/*menu handler*/
var url = window.location;
// Will only work if string in href matches with location
$('ul.navbar-nav a[href="'+ url +'"]').parent().addClass('active');

// Will also work for relative and absolute hrefs
$('ul.navbar-nav a').filter(function() {
    return this.href == url;
}).parent().addClass('active');
</script>
</body>
</html>
