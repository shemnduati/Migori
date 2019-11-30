<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/img/logo.jpg"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Baza</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
</head>
@can('isAllowed')
    <body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">


        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
            </ul>

            <!-- SEARCH FORM -->

            <div class="input-group input-group-sm col-md-4">
                <input class="form-control form-control-navbar" @keyup="searchit" v-model="search" type="search"
                       placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" @click="searchit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light">Baza</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                             alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                        <p>
                            <a href="#" class="d-block">{{ Auth::user()->role }}</a>
                        </p>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            @can('isAccepted')
                                <router-link to="/dashboard" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt blue"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </router-link>
                        </li>
                        @endcan
                        @can('isOfficial')
                            <li class="nav-item">
                                <router-link to="/configuration" class="nav-link">
                                    <i class="fas fa-cog orange"></i>
                                    <p>
                                        Configuration
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/subadmin" class="nav-link">
                                    <i class="nav-icon fas fa-user-plus green"></i>
                                    <p>
                                        Add sub-Admin
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/budget" class="nav-link">
                                    <i class="nav-icon fas fa-funnel-dollar indigo"></i>
                                    <p>
                                        Budgets
                                    </p>
                                </router-link>
                            </li>
                        @endcan
                        @can('isSubadminOrOfficial')
                            <li class="nav-item">
                                <router-link to="/Information" class="nav-link">
                                    <i class="nav-icon fas fa-clipboard-list green"></i>
                                    <p>
                                        County Information
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/scholarship-admin" class="nav-link">
                                    <i class="nav-icon fas fa-clipboard-list cyan"></i>
                                    <p>
                                        Scholarship Information
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/Applicants" class="nav-link">
                                    <i class="nav-icon fas fa-user-graduate teal"></i>
                                    <p>
                                        County Applicants
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/ScholarApplicants" class="nav-link">
                                    <i class="nav-icon fas fa-user-graduate pink"></i>
                                    <p>
                                        Scholarship Applicants
                                    </p>
                                </router-link>
                            </li>
                        @endcan
                        @can('isAdmin')
                            <li class="nav-item">
                                <router-link to="/county" class="nav-link">
                                    <i class="nav-icon fas fa-globe-africa blue"></i>
                                    <p>
                                        County
                                    </p>
                                </router-link>
                            </li>
                            </li>
                            <li class="nav-item">
                                <router-link to="/Ward" class="nav-link">
                                    <i class="nav-icon fas fa-map-marker-alt teal"></i>
                                    <p>
                                        Ward
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/subadmin" class="nav-link">
                                    <i class="nav-icon fas fa-user-plus green"></i>
                                    <p>
                                        Add sub-Admin
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/OfficialUser" class="nav-link">
                                    <i class="nav-icon fas fa-user-tie orange"></i>
                                    <p>
                                        Add OfficialUser
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/accountant" class="nav-link">
                                    <i class="nav-icon fas fa-user-plus yellow"></i>
                                    <p>
                                        Add Sub-Official
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/users" class="nav-link ">
                                    <i class="fa fa-users nav-icon indigo"></i>
                                    <p>
                                        Users
                                    </p>
                                </router-link>

                                @endcan
                                <li class="nav-item">
                                <router-link to="/profile" class="nav-link">
                                    <i class="nav-icon fa fa-user orange"></i>
                                    <p>
                                        My Profile
                                    </p>
                                </router-link>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="nav-icon fa fa-power-off red"></i>
                                    <p>
                                        {{ __('Logout') }}
                                    </p>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
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

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <vue-progress-bar></vue-progress-bar>
                    <router-view :user="{{auth()->user()}}"></router-view>
                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">

            </div>
            <!-- Default to the left -->
            <strong>Developed by <a href="https://twtechnologies.africa">TransOnline Web Technologies</a>.</strong> All
            rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->

    <!-- AdminLTE App -->


    <!-- Scripts -->
    @auth
        <script>
            window.user = @json(auth()->user())
        </script>
    @endauth
    <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
@endcan
</html>
