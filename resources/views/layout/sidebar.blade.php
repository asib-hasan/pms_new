<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="images/logo.svg" class="mr-2" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="icon-bell mx-0 font-weight-bold"> Sign out</i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                @if (Auth::user()->admin_type != 2)
                    <li class="nav-item" id="settings">
                        <a class="nav-link" href="{{ url('system/settings') }}">
                            <i class="fa fa-cog menu-icon"></i>
                            <span class="menu-title">Settings</span>
                        </a>
                    </li>
                    <li class="nav-item" id="users">
                        <a class="nav-link" href="{{ url('user') }}">
                            <i class="fa fa-user menu-icon"></i>
                            <span class="menu-title">Users</span>
                        </a>
                    </li>
                @endif
                <li class="nav-item" id="categories">
                    <a class="nav-link" href="{{ url('categories') }}">
                        <i class="fa fa-archive menu-icon"></i>
                        <span class="menu-title">Categories</span>
                    </a>
                </li>
                <li class="nav-item" id="companies">
                    <a class="nav-link" href="{{ url('companies') }}">
                        <i class="fa fa-building menu-icon"></i>
                        <span class="menu-title">Companies</span>
                    </a>
                </li>
                <li class="nav-item" id="items">
                    <a class="nav-link" href="{{ url('item') }}">
                        <i class="fa fa-list-alt menu-icon"></i>
                        <span class="menu-title">Items</span>
                    </a>
                </li>
                <li class="nav-item" id="sales_corner">
                    <a class="nav-link" href="{{ url('pos') }}">
                        <i class="fa fa-cart-plus menu-icon"></i>
                        <span class="menu-title">Sales Corner</span>
                    </a>
                </li>
                <li class="nav-item" id="customers">
                    <a class="nav-link" href="{{ url('customer') }}">
                        <i class="fa fa-user-secret menu-icon"></i>
                        <span class="menu-title">Customers</span>
                    </a>
                </li>
                <li class="nav-item" id="expenses">
                    <a class="nav-link" href="{{ url('expense') }}">
                        <i class="fa fa-bullseye menu-icon"></i>
                        <span class="menu-title">Expenses</span>
                    </a>
                </li>
                @if (Auth::user()->admin_type != 2)
                    <li class="nav-item" id="reports">
                        <a class="nav-link" href="{{ url('report') }}">
                            <i class="fa fa-bars menu-icon"></i>
                            <span class="menu-title">Reports</span>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('logout') }}">
                        <i class="fa fa-sign-out menu-icon"></i>
                        <span class="menu-title">Logout</span>
                    </a>
                </li>

            </ul>
        </nav>
        @yield('content')
{{--        <div class="main-panel">--}}
{{--            <div class="content-wrapper">--}}
{{--                <div class="row">--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('js/off-canvas.js') }}"></script>
<script src="{{ asset('js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('js/template.js') }}"></script>
<script src="{{ asset('js/settings.js') }}"></script>
<script src="{{ asset('js/todolist.js') }}"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
</body>
</html>
