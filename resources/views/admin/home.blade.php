<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Title -->
        <title>Admin Panel | Dashboard | EU MediCare</title>

        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="csrf" value="{{ csrf_token() }}">

        <!-- Styles -->
        <link href="{{ asset('public/backend/plugins/pace-master/themes/blue/pace-theme-flash.css') }}" rel="stylesheet"/>
        <link href="{{ asset('public/backend/plugins/uniform/css/default.css') }}" rel="stylesheet"/>
        <link href="{{ asset('public/backend/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('public/backend/plugins/fontawesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('public/backend/plugins/line-icons/simple-line-icons.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('public/backend/plugins/offcanvasmenueffects/css/menu_cornerbox.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('public/backend/plugins/waves/waves.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('public/backend/plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('public/backend/plugins/3d-bold-navigation/css/style.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('public/backend/plugins/slidepushmenus/css/component.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('public/backend/plugins/weather-icons-master/css/weather-icons.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('public/backend/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('public/backend/plugins/slidepushmenus/css/component.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('public/backend/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>


        <!-- Theme Styles -->
        <link href="{{ asset('public/backend/css/meteor.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('public/backend/css/layers/dark-layer.css') }}" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('public/backend/css/custom.css') }}" rel="stylesheet" type="text/css"/>

        <!-- Toastr Style -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

        <script src="{{ asset('public/backend/plugins/3d-bold-navigation/js/modernizr.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/offcanvasmenueffects/js/snap.svg-min.js') }}"></script>


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body class="compact-menu">
        @php
            $admin = DB::table('admins')->where('id', Auth::guard()->id())->first();
        @endphp

        <div class="overlay"></div>

        <form class="search-form" action="#" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control search-input" placeholder="Type something...">
                <span class="input-group-btn">
                    <button class="btn btn-default close-search" type="button"><i class="icon-close"></i></button>
                </span>
            </div><!-- Input Group -->
        </form><!-- Search Form -->

        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button push-sidebar">
                            <i class="icon-arrow-right"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                    <a href="{{ route('admin.dashboard') }}" class="logo-text"><span>Admin Panel</span></a>
                    </div><!-- Logo Box -->
                    <div class="search-button">
                        <a href="javascript:void(0);" class="show-search"><i class="icon-magnifier"></i></a>
                    </div>
                    <div class="topmenu-outer">
                        <div class="top-menu">
                            <ul class="nav navbar-nav navbar-left">
                                <li>
                                    <a href="javascript:void(0);" class="sidebar-toggle"><i class="icon-arrow-left"></i></a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="javascript:void(0);" class="show-search"><i class="icon-magnifier"></i></a>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="user-name">{{ $admin->full_name }}<i class="fa fa-angle-down"></i></span>
                                        <img class="img-circle avatar" src="{{ asset('public/backend/images/avatar1.png') }}" width="40" height="40" alt="">
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="#"><i class="icon-user"></i>Profile</a></li>
                                        <li role="presentation"><a href="#"><i class="icon-eye"></i>Edit Profile</a></li>
                                        <li role="presentation"><a href="#"><i class="icon-settings"></i>Change Password</a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation"><a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i class="icon-key m-r-xs"></i>Log out</a></li>
                                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                    </ul>
                                </li>
                            </ul><!-- Nav -->
                        </div><!-- Top Menu -->
                    </div>
                </div>
            </div><!-- Navbar -->


            <div class="page-sidebar sidebar">
                <div class="page-sidebar-inner slimscroll">
                    <ul class="menu accordion-menu">
                    <li class="active"><a href="{{ route('admin.dashboard') }}" class="waves-effect waves-button"><span class="menu-icon icon-home"></span><p>Dashboard</p><span class="active-page"></span></a></li>

                    <li><a href="profile.html" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>Profile</p></a></li>

                    <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-envelope-open"></span><p>Members</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('pending.users') }}">Pending Users</a></li>
                            <li><a href="{{ route('approved.users') }}">All Members</a></li>
                            <!-- <li><a href="#">Manage Patients</a></li> -->
                        </ul>
                    </li>

                    <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-puzzle"></span>Doctor<p></p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('all.specialize') }}">Specializes</a></li>
                            <li><a href="{{ route('add.doctor') }}">Add Doctor</a></li>
                            <li><a href="{{ route('all.doctors') }}">All Doctors</a></li>
                        </ul>
                    </li>

                    <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-layers"></span><p>Appointmennts</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('admin.manage.appointments') }}">Manage Appointmennts</a></li>
                        </ul>
                    </li>

                    <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-grid"></span><p>Blood Donate</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('requested.donors') }}">Requested Donors</a></li>
                            <!-- <li><a href="table-data.html">Data Tables</a></li> -->
                        </ul>
                    </li>

                    <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-grid"></span><p>Settings</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="#">Static Tables</a></li>
                            <li><a href="#">Responsive Tables</a></li>
                            <li><a href="#">Data Tables</a></li>
                        </ul>
                    </li>
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->

            <div class="page-inner">
                <!-- Start Content Area -->



                    @yield('content')


                <!-- End Content Area -->
                <div class="page-footer">
                    <p class="no-s">Developer &copy; </i> Abu Horaira Mobin</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->

        <div class="cd-overlay"></div>


        <!-- Javascripts -->
        <script src="{{ asset('public/backend/plugins/jquery/jquery-3.1.0.min.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/pace-master/pace.min.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/jquery-blockui/jquery.blockui.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/switchery/switchery.min.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/uniform/js/jquery.uniform.standalone.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/offcanvasmenueffects/js/classie.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/waves/waves.min.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/3d-bold-navigation/js/main.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/flot/jquery.flot.min.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/flot/jquery.flot.time.min.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/flot/jquery.flot.symbol.min.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/flot/jquery.flot.resize.min.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/curvedlines/curvedLines.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/chartjs/Chart.bundle.min.js') }}"></script>
        <script src="{{ asset('public/backend/js/meteor.min.js') }}"></script>
        <script src="{{ asset('public/backend/js/pages/dashboard.js') }}"></script>
        <script src="{{ asset('public/backend/js/pages/form-select2.js') }}"></script>
        <script src="{{ asset('public/backend/plugins/select2/js/select2.min.js') }}"></script>




    {{-- For toastr sweet alert message --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>

    <script>
            @if(Session::has('messege'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('messege') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
        @endif
    </script>

    <script>
        $(document).on("click", "#delete", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                title: "Are you Want to delete?",
                text: "Once Delete, This will be Permanently Delete!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Safe Data!");
                    }
                });
        });
    </script>

</body>

</html>
