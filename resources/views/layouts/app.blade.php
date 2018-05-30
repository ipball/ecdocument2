<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>itOffside - @yield('title')</title>
    <meta name="description" content="electronic document | itOffside">
    <meta name="author" content="Tawatsak - https://www.itoffside.com">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}">

    <!-- Switchery css -->
    <link href="{{ URL::asset('css/switchery.min.css') }}" rel="stylesheet" />

    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('font-awesome/css/fontawesome-all.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('css/select2-bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    
    <!-- Custom CSS -->
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    <!-- BEGIN CSS for this page -->

    <!-- END CSS for this page -->

    @yield('style')

    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
        var APP_LINK = {!! json_encode(Storage::url('/')) !!}
    </script>
</head>

<body class="adminbody">

    <div id="main">

        <!-- top bar navigation -->
        <div class="headerbar">

            <!-- LOGO -->
            <div class="headerbar-left">
                <a href="index.html" class="logo">
                    <img alt="logo" src="{{ URL::asset('img/logo.png') }}" />
                    <span>Admin</span>
                </a>
            </div>

            <nav class="navbar-custom">

                <ul class="list-inline float-right mb-0">

                    <li class="list-inline-item dropdown notif">
                        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fa fa-fw fa-question-circle"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5>
                                    <small>ถามตอบ</small>
                                </h5>
                            </div>

                            <!-- item-->
                            <a href="#" class="dropdown-item notify-item">
                                <p class="notify-details ml-0">
                                    <b>ระบบจัดการเอกสาร ecDocument ฟรี?</b>
                                    <span>- ฟรีใช้งานและยังสามารถนำไปแจกจ่ายได้</span>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="#" class="dropdown-item notify-item">
                                <p class="notify-details ml-0">
                                    <b>สามารถนำไปจำหน่ายได้หรือไม่?</b>
                                    <span>- ไม่สามารถนำไปจำหน่ายได้ยกเว้นแต่</span>
                                    <span>พัฒนาระบบให้มีฟีเจอร์นอกเหนือ</span>
                                    <span>เวอร์ชั่นแจกฟรี จึงสามารถจำหน่ายได้</span>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="#" class="dropdown-item notify-item">
                                <p class="notify-details ml-0">
                                    <b>ระบบใช้เครื่องมือใดพัฒนา?</b>
                                    <span>- PHP 7.2</span>
                                    <span>- ฐานข้อมูล MariaDB</span>
                                    <span>- Laravel Framework 5.6</span>
                                    <span>- Bootstrap 4.1</span>
                                    <span>- Template pikeadmin</span>                                    
                                </p>
                            </a>

                            <!-- All-->
                            <a title="Clcik to visit Pike Admin Website" target="_blank" href="https://www.itoffside.com" class="dropdown-item notify-item notify-all">
                                <i class="fa fa-link"></i> เยี่ยมชมเว็บไซต์ผู้พัฒนา
                            </a>

                        </div>
                    </li>

                   

                    <li class="list-inline-item dropdown notif">
                        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ URL::asset('img/avatars/admin.png') }}" alt="Profile image" class="avatar-rounded">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="text-overflow">
                                    <small>Hello, admin</small>
                                </h5>
                            </div>

                            <!-- item-->
                            <a href="pro-profile.html" class="dropdown-item notify-item">
                                <i class="fa fa-user"></i>
                                <span>Profile</span>
                            </a>

                            <!-- item-->
                            <a href="#" class="dropdown-item notify-item">
                                <i class="fa fa-power-off"></i>
                                <span>Logout</span>
                            </a>

                            <!-- item-->
                            <a target="_blank" href="https://www.itoffside.com" class="dropdown-item notify-item">
                                <i class="fa fa-external-link"></i>
                                <span>Pike Admin</span>
                            </a>
                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </li>
                </ul>

            </nav>

        </div>
        <!-- End Navigation -->


        <!-- Left Sidebar -->
        <div class="left main-sidebar">

            <div class="sidebar-inner leftscroll">

                <div id="sidebar-menu">

                    <ul>

                        <li class="submenu">
                            <a href="{{ url('/') }}">
                                <i class="fa fa-fw fa-chart-line"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li class="submenu">
                            <a href="{{ url('/user') }}">
                                <i class="fa fa-fw fa-user"></i>
                                <span> ผู้ใช้งาน </span>
                            </a>
                        </li>

                        <li class="submenu">
                            <a href="{{ url('/categorie') }}">
                                <i class="fa fa-fw fa-briefcase"></i>
                                <span> หมวดหมู่เอกสาร </span>
                            </a>
                        </li>

                        <li class="submenu">
                            <a href="{{ url('/document') }}">
                                <i class="fa fa-fw fa-file-alt"></i>
                                <span> เอกสาร </span>
                            </a>
                        </li>

                    </ul>

                    <div class="clearfix"></div>

                </div>

                <div class="clearfix"></div>

            </div>

        </div>
        <!-- End Sidebar -->


        <div class="content-page">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">


                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">@yield('title')</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">&nbsp;</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="row">
                        <div class="col-xl-12">
                            @yield('content')
                        </div>
                    </div>



                </div>
                <!-- END container-fluid -->

            </div>
            <!-- END content -->

        </div>
        <!-- END content-page -->

        <footer class="footer">
            <span class="text-right">
                Copyright
                <a target="_blank" href="#">itoffside.com</a>
            </span>
            <span class="float-right">
                Powered by
                <a target="_blank" href="https://www.itoffside.com">
                    <b>Bahtsoft TEAM</b>
                </a>
            </span>
        </footer>

    </div>    
    <!-- END main -->
    <script src="{{ URL::asset('js/vue.min.js') }}"></script>
    <script src="{{ URL::asset('js/axios.min.js') }}"></script>
    <script src="{{ URL::asset('js/modernizr.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/moment.min.js') }}"></script>

    <script src="{{ URL::asset('js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    
    <script src="{{ URL::asset('js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('js/messages_th.js') }}"></script>
    <script src="{{ URL::asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ URL::asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

    <script src="{{ URL::asset('js/detect.js') }}"></script>
    <script src="{{ URL::asset('js/fastclick.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.blockUI.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ URL::asset('js/switchery.min.js') }}"></script>
    <script src="{{ URL::asset('js/loadingoverlay.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::asset('js/pikeadmin.min.js') }}"></script>
    <script src="{{ URL::asset('js/custom.min.js') }}"></script>
    <!-- BEGIN Java Script for this page -->

    <!-- END Java Script for this page -->
    
    @yield('script')

</body>

</html>

