<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>EU MediCare - A Hospital Management System Project</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/template/images/favicon.ico') }}">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">


    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{ asset('public/template/css/bootstrap.min.css') }}">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="public/template/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('public/template/css/owl.theme.default.min.css') }}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{ asset('public/template/css/core.css') }}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{ asset('public/template/css/shortcode/shortcodes.css') }}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('public/template/css/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('public/template/css/responsive.css') }}">
    <!-- User style -->
    <link rel="stylesheet" href="{{ asset('public/template/css/custom.css') }}">
    <!-- Extra style -->
    <link rel="stylesheet" href="{{ asset('public/template/css/extra.css') }}">
    <!-- Toastr Style -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">


    <style>
        .header_background video {
            width: 100%;
            max-height: 80vh;
            background-size: cover;
            position: relative;
            object-fit: cover;
            box-sizing: border-box;
            pointer-events: none;
        }

        .dept_search{
            position: absolute;
            top: 35%;
            left: 8%;
        }
        .home_text{
            text-transform: uppercase;
            /* color: white; */
            font-weight: 500;
            background: #fff;
            opacity: 0.6;
            padding: 10px;
        }
        .home_text h2, p{
            color: black;
            line-height: 2rem;
            margin-top: 0;
        }
        .search i{
            font-size: 1.4rem;

        }
        .search{
            margin-right: 10%;
        }

        .patient_btn{
            margin-right: 10%;
        }
        .doctor_btn{
            margin-right: 20%;
        }

        .pat_btn{
            border-radius: 10%;
            padding: 0 20px;
            background-color: maroon;
        }
        .doc_btn{
            border-radius: 10%;
            padding: 0 20px;
            background-color: darkgreen;
        }
        .prf_btn{
            border-radius: 10%;
            padding: 0 20px;
            background-color: blue;
        }
        .inner_cont{
            margin-top: 100px;
        }

        .priority__sec{
            position: relative;
        }

        .priority__sec::after{
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            background: rgba(0, 0, 0, 0.01);
            box-shadow: inset 120px 100px 250px #000000, inset -120px -100px 250px #000000;
        }

        .inner_cont > h2{
            color: maroon;
        }
        .inner_cont > h3{
            color: black;
        }

        .serv_cont{
            color: #313131;
            font-size: 1.2rem;
            font-family: Arial;
            font-weight: normal;
            line-height: 1.6rem;
            margin-left: 50px;
        }

        .heading{
            color: #313131;
            font-size: 1.5rem;
            font-weight: 500;
            margin-top: 20px;
            padding-bottom: 10px;

        }

        .serv_icon{
            background-color: lightgray;
            padding: 10px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .serv_icon i{
            color: black;
            height: 40px;
            width: 40px;
            text-align: center;
        }
        .search-field{
            padding: 0;
        }

        .dept_img{
            height: 150px;
        }

        .doc_img{
            height: 220px;
            widows: 90%;
        }

        .app_doc{
            height: 80px;
        }
        .blog_pic{
            height: 200px;
        }

        .doctor{
            position: relative;
        }
        .doctor_des{
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            background: lightblue;
            padding: 10px;
            display: none;
            overflow: hidden;
	        transition: .10s;
        }
        .doctor:hover .doctor_des{
            display: block;
        }

        .emg_blood{
            margin-top: 15px;
            margin-left: 40%;
            /* margin-right: 50%; */
            /* transform: translate(-50%); */
        }
        .emg_btn{
            background-color: maroon;
            width: 210px;
            text-align: center;
            border: none;
        }

    </style>


    <!-- Modernizr JS -->
    <script src="{{ asset('public/template/js/vendor/modernizr-3.5.0.min.js') }}"></script>

</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


<!-- Body main wrapper start -->
<div class="wrapper">
    <!-- Start Header Style -->
    <header id="htc__header" class="htc__header__area header--one">
        <!-- Start Mainmenu Area -->
        <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
            <div class="container">
                <div class="row">
                    <div class="menumenu__container clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                            <div class="logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('public/template/images/EU-logo.jpg') }}" alt="" height="50" width="70"></a>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                            <nav class="main__menu__nav hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    <!-- <li class="drop"><a href="index.html">Home</a></li> -->
                                    <!-- <li class="drop"><a href="#about">about</a> -->
                                    <li class="drop"><a href="#departments">departments</a></li>
                                    <li class="drop"><a href="#doctors">doctors</a></li>
                                    <li class="drop"><a href="#services">services</a></li>
                                    <li><a href="#donations">Blood Donate</a></li>
                                    <li><a href="#blogs">Blog</a></li>
                                    <!-- <li class="drop"><a href="#">contact</a></li> -->
                                </ul>
                            </nav>

                            <div class="mobile-menu clearfix visible-xs visible-sm">
                                <nav id="mobile_dropdown">
                                    <ul>
                                        <!-- <li><a href="#">about</a></li> -->
                                        <li><a href="#departments">departments</a></li>
                                        <li><a href="#doctors">doctors</a></li>
                                        <li><a href="#services">services</a></li>
                                        <li><a href="#donations">Blood Donate</a></li>
                                        <li><a href="#blogs">Blog</a></li>
                                        <!-- <li><a href="#">contact</a></li> -->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                            <div class="header__right">
                                <!-- <div class="header__search search search__open">
                                    <a href="#"><i class="icon-magnifier icons"></i></a>
                                </div> -->
                                @if (Route::has('login'))
                                    @auth
                                        <div class="doctor_btn">
                                            <a href="{{ route('home') }}">Profile</a>
                                            {{-- <a href="{{ url('/home') }}" class="fr__btn prf_btn">Profile</a> --}}
                                        </div>
                                        @else
                                        <div class="patient_btn">
                                            {{-- <a href="{{ route('login') }}" class="fr__btn pat_btn">Login</a> --}}
                                            <a href="{{ route('login') }}">Login</a>
                                        </div>

                                        @if (Route::has('register'))
                                        <div class="doctor_btn">
                                            <a href="{{ route('register') }}">Registration</a>
                                            {{-- <a href="{{ route('register') }}" class="fr__btn doc_btn">Registration</a> --}}
                                        </div>
                                        @endif
                                    @endauth
                                @endif
                        </div>

                    </div>
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
</div>
<!-- End Mainmenu Area -->
</header>
<!-- End Header Area -->

<div class="body__overlay"></div>
<!-- Start Offset Wrapper -->

<!-- Start Header Background Video -->
<section class="header_background">
    <video autoplay muted loop class="header_video">
        <source src="{{ asset('public/template/video/vid.mp4') }}" type="video/mp4">
    </video>
    <div class="dept_search">
        <div class="container">
            <div class="row ">
                <div class="col-md-11 col-lg-11 col-sm-10">
                    <div class="text-center text-light home_text">
                        <h2 style="color:#000;">we care our future leaders at eu-medicare</h2>
                        <p style="color:#000;">Eastern University Medicare gives confidence to the well-being of all university members. And it has many experienced specialized doctors</p>
                    </div>
                    <div class="emg_blood">
                        <!-- <a class="fr__btn emg_btn" href="#">Emergency Blood</a> -->
                        <!-- <button type="button" class="fr__btn emg_btn" data-toggle="modal" data-target="#exampleModalCenter">Emergency Blood</button> -->
                        <a href="" class="fr__btn emg_btn" data-toggle="modal" data-target="#modaldemo3">Emergency Blood</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- add-new button model -->
        <div id="modaldemo3" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Brand Add</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('emergency.blood') }}" method="post">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-group">
                                <label for="requestedBlood">Request For Blood Group</label>
                                <input type="text" name="req_blood_group" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber">Your Phone Number</label>
                                <input type="text" name="req_from_number" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber">Location</label>
                                <input type="text" name="patient_location" class="form-control">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info pd-x-20">Request</button>
                        </div>
                    </form>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->

<!-- Modal -->
<!--
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Request Emergency Blood</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        All Fields Are Required.
            <form action="{{ route('emergency.blood') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="requestedBlood">Request For Blood Group</label>
                    <input type="text" name="req_blood_group" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Your Phone Number</label>
                    <input type="text" name="req_from_number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Location</label>
                    <input type="text" name="patient_location" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" class="form-control">Request</button>
                </div>
                <!- <button type="submit" class="btn btn-primary">Request</button> -->
            <!-- </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div> - - >
</div> -->

        <!-- <form action="#" method="post">
            <div class="container">
                <div class="row m-auto no-gutters">
                    <div class="col-md-6 col-lg-10 col-sm-8 search-field m-auto">
                        <input type="text" class="form-control"  placeholder="Search Department . . .">
                    </div>
                    <div class="col-md-4 col-sm-2 col-lg-2 search-field mr-auto">
                        <button type="submit" class="btn btn-info info-rad">Search</button>
                    </div>
                </div>
            </div>
        </form> -->
    </div>
</section>
<!-- End Header Background Video -->



<!-- Start Category Area -->
<section class="htc__category__area ptb--100" id="departments">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Our Departments</h2>
                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor.</p> --}}
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row">
                <div class="product__list clearfix mt--30" style="margin-left: 60px; margin-right: 60px;">
                    <!-- Start Single Category -->
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                        <div class="category">
                            <div class="ht__cat__thumb">
                                <a href="#">
                                    <img class="dept_img img-fluid" src="{{ asset('public/template/images/department/Medicine.jpg') }}" alt="product images">
                                </a>
                            </div>
                            <div class="fr__product__inner">
                                <h4><a href="#">Medicine</a></h4>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Category -->
                    <!-- Start Single Category -->
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                        <div class="category">
                            <div class="ht__cat__thumb">
                                <a href="#">
                                    <img class="dept_img img-fluid" src="{{ asset('public/template/images/department/maxresdefault2.jpeg') }}" alt="product images">
                                </a>
                            </div>
                            <div class="fr__hover__info">

                            </div>
                            <div class="fr__product__inner">
                                <h4><a href="#">Psychology</a></h4>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Category -->
                    <!-- Start Single Category -->
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                        <div class="category">
                            <div class="ht__cat__thumb">
                                <a href="#">
                                    <img class="dept_img img-fluid" src="{{ asset('public/template/images/department/physiotherapy.jpeg') }}" alt="product images">
                                </a>
                            </div>

                            <div class="fr__product__inner">
                                <h4><a href="#">Physiotherapy</a></h4>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Category -->

                    <!-- Start Single Category -->
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                        <div class="category">
                            <div class="ht__cat__thumb">
                                <a href="#">
                                    <img class="dept_img" src="{{ asset('public/template/images/department/image.axd.jpg') }}" alt="product images">
                                </a>
                            </div>

                            <div class="fr__product__inner">
                                <h4><a href="#">Gynecology</a></h4>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Category -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Category Area -->

<!-- Start Prize Good Area -->
<section style="background: url('public/template/images/prio.JPG'); background-size: cover;
height: 60vh;
background-position: center center;" class="priority__sec">
    <div class="container">
        <div class="row">
            {{-- <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12"> --}}
                <div class="fr__prize__inner inner_cont text-center">
                    <h2>Your Health is Our Priority.</h2>
                    <h3>We can manage your dream building A small river named Duden flows by their place.</h3>
                    <!-- <a class="fr__btn" href="#">Read More</a> -->
                </div>
            {{-- </div> --}}
            {{-- <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12"> --}}
                {{-- <div class="prize__inner"> --}}
                    {{-- <div class="prize__thumb"> --}}
                        {{-- <img src="{{ asset('public/template/images/prio.JPG') }}" alt="banner images" height="350px"> --}}
                    {{-- </div> --}}
                {{-- </div> --}}
            </div>
        </div>
    </div>
</section>
<!-- End Prize Good Area -->



<!-- Start Product Area -->
<section class="ftr__product__area ptb--100" id="doctors">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Our Qualified Doctors</h2>
                    <p>We do not compromise for our specialized doctor</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product__wrap clearfix" >
                <!-- Start Single Category -->
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    <div class="category doctor">
                        <div class="ht__cat__thumb">
                            <a href="#">
                                <img class="doc_img img-fluid" src="{{ asset('public/template/images/doctors/DR.-ZIAUL-KARIM.jpg') }}" alt="product images">
                            </a>
                        </div>

                        <div class="fr__product__inner doctor_des">
                            <h4><a href="">Dr. Ziaul Karim</a></h4>
                            <p style="color:#313131">Medicine</p>

                        </div>
                    </div>
                </div>
                <!-- End Single Category -->
                <!-- Start Single Category -->
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    <div class="category doctor">
                        <div class="ht__cat__thumb">
                            <a href="#">
                                <img class="doc_img img-fluid" src="{{ asset('public/template/images/doctors/nawshin-nahar.jpg') }}" alt="product images">
                            </a>
                        </div>

                        <div class="fr__product__inner doctor_des">
                            <h4><a href="#">Dr. Md Abdul Mohit Kamal</a></h4>
                            {{-- <p style="color:#313131">B.Sc in Psychology</p> --}}
                            <p style="color:#313131">M.Sc & M.Phil (Part-1) in <br> Applied Counselling Psychology (DU)</p>
                            <p style="color:#313131"><em>Senior Counsellor</em></p>

                        </div>
                    </div>
                </div>
                <!-- End Single Category -->
                <!-- Start Single Category -->
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    <div class="category doctor">
                        <div class="ht__cat__thumb">
                            <a href="#">
                                <img class="doc_img img-fluid" src="{{ asset('public/template/images/doctors/nurul-ashraf.JPG') }}" alt="product images">
                            </a>
                        </div>

                        <div class="fr__product__inner doctor_des">
                            <h4><a href="">Dr. Mohammad Nurul Ashraf</a></h4>
                            <p style="color:#313131">Experienced Physician</p>
                            <p style="color:#313131"><em>Senior Medical Officer</em></p>
                            <p style="color:#313131"><em>MBBS (DMC)</em></p>

                        </div>
                    </div>
                </div>
                <!-- End Single Category -->

                <!-- Start Single Category -->
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    <div class="category doctor">
                        <div class="ht__cat__thumb">
                            <a href="#">
                                <img class="doc_img" src="{{ asset('public/template/images/doctors/Nasrin-Zulfikar.jpg') }}" alt="product images">
                            </a>
                        </div>

                        <div class="fr__product__inner doctor_des">
                            <h4><a href="#">Dr. Nasrin Zulfikar</a></h4>
                            <p style="color:#313131">Gynecologist</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Category -->

            </div>
        </div>
    </div>
</section>
<!-- End Product Area -->


    <!-- Start Doctors Appointments Area -->
    <section class="htc__testimonial__area bg__cat--4 pt--20 pb--30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__title--2 text-center">
                        <h2 class="title__line">Doctors Appointments</h2>
                        {{-- <p>But I must explain to you</p> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ht__testimonial__activation clearfix">
                    <!-- Start Single Testimonial -->
                    <div class="col-lg-6 col-md-6 single__tes">
                        <div class="testimonial">
                            <div class="testimonial__thumb">
                                <img class="app_doc" style="width: 90px" src="{{ asset('public/template/images/doctors/nawshin-nahar.jpg') }}" alt="testimonial images">
                            </div>
                            <div class="testimonial__details">
                                <h4><a href="#">Nowshin Nahar</a></h4>
                                <p class="text--black">Psychologist</p>
                                <p class="text--black">MONDAY 12PM to 3PM</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial -->
                    <!-- Start Single Testimonial -->
                    <div class="col-lg-6 col-md-6 single__tes">
                        <div class="testimonial">
                            <div class="testimonial__thumb">
                                <img class="app_doc" style="width: 90px" src="{{ asset('public/template/images/doctors/Nasrin-Zulfikar.jpg') }}" alt="testimonial images">
                            </div>
                            <div class="testimonial__details">
                                <h4><a href="#">Dr. Nasrin Zulfikar</a></h4>
                                <p class="text--black">Gynecologist</p>
                                <p class="text--black">Tuesday 12PM to 3PM</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial -->
                    <!-- Start Single Testimonial -->
                    <div class="col-lg-6 col-md-6 single__tes">
                        <div class="testimonial">
                            <div class="testimonial__thumb">
                                <img class="app_doc" style="width: 90px" src="{{ asset('public/template/images/doctors/DR.-ZIAUL-KARIM.jpg') }}" alt="testimonial images">
                            </div>
                            <div class="testimonial__details">
                                <h4><a href="#">Dr. Ziaul Karim</a></h4>
                                <p class="text--black">Medicine</p>
                                <p class="text--black">SUNDAY 12PM to 3PM</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial -->
                    <!-- Start Single Testimonial -->
                    <div class="col-lg-6 col-md-6 single__tes">
                        <div class="testimonial">
                            <div class="testimonial__thumb">
                                <img class="app_doc" style="width: 90px" src="{{ asset('public/template/images/doctors/nurul-ashraf.JPG') }}" alt="testimonial images">
                            </div>
                            <div class="testimonial__details">
                                <h4><a href="#">Dr. Mohammad Nurul Ashraf</a></h4>
                                <p class="text--black">Physician</p>
                                <p class="text--black">Thursday 12PM to 3PM</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Doctor Appointments Area -->

<!-- Start Top Rated Area -->
<section class="top__rated__area bg__white pt--30 pb--50" id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Our Services</h2>
                    {{-- <p>We Try To Care Our Members Better</p> --}}
                </div>
            </div>
        </div>
        <div class="row mt--20">

            <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-flex">
                    <div class="media-body pl-md-4">
                        <h3 class="heading"><span class="serv_icon"><i class="fa fa-ambulance"></i></span>Emergency Services</h3>
                        <p class="serv_cont">We are here for your critical moment.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-flex">
                    <div class="media-body pl-md-4">
                        <h3 class="heading mb-3"><span class="serv_icon"><i class="fa fa-user-md"></i></span>Qualified Doctors</h3>
                        <p class="serv_cont">Our doctor's are qualified and have proper experience to take care your health.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-flex">
                    <div class="media-body pl-md-4">
                    <h3 class="heading mb-3"><span class="serv_icon"><img src="{{ asset('public/template/images/icons/brain-solid.svg') }}" alt="" height="35" width="35"></span>Mental Health</h3>
                        <p class="serv_cont">We not just care about you physical health but also mental health.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-flex">
                    <div class="media-body pl-md-4">
                        <h3 class="heading mb-3"><span class="serv_icon"><i class="fa fa-female"></i></span>Special Women Care</h3>
                        <p class="serv_cont">All femaleas member can have their healh Check up with utmost secrecy.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Top Rated Area -->


<!-- Start Blood Donation Area -->
<section id="donations" style="background: url('{{ asset("public/template/images/blood-donor.jpg") }}');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                <div class="fr__prize__inner inner_cont">
                    <h2>DO YOU WANT TO DONATE BLOOD?</h2>
                    <h3>Registration Here!! We Will Arrange A Blood Donation Campaign In EU Campus.</h3>
                    <!-- <a class="fr__btn" href="#">Read More</a> -->
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                {{-- <div class="prize__inner"> --}}
                    <div class="ft__inner" style="margin-top:60px; margin-bottom: 30px;">
                        <div class="news__input">
                            <form action="{{ route('blood.donation') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="donor_id" placeholder="Your ID*" class="@error('donor_id') is-invalid @enderror" value="{{ old('donor_id') }}" required autocomplete="donor_id" autofocus>
                                    @error('donor_id')
                                    <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="donor_name" placeholder="Your Name*" class="@error('donor_name') is-invalid @enderror" value="{{ old('donor_name') }}" required autocomplete="donor_name" autofocus>
                                            @error('donor_name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="donor_email" placeholder="Your Email Address*" class="@error('donor_email') is-invalid @enderror" value="{{ old('donor_email') }}" required autocomplete="donor_email" autofocus>
                                            @error('donor_email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="donor_phone" placeholder="Your Phone Number*" class="@error('donor_phone') is-invalid @enderror" value="{{ old('donor_phone') }}" required autocomplete="donor_phone" autofocus>
                                            @error('donor_phone')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="blood_group" placeholder="Your Blood Group*" class="@error('blood_group') is-invalid @enderror" value="{{ old('blood_group') }}" required autocomplete="blood_group" autofocus>
                                            @error('blood_group')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="send__btn">
                                    <button type="submit" class="fr__btn" style="border:none;">Interested</button>
                                </div>
                            </form>
                        </div>
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</section>
<!-- End Blood Donation Area -->

{{--<!-- Start Brand Area -->--}}
{{--<div class="htc__brand__area bg__cat--4">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="ht__brand__inner">--}}
{{--                    <ul class="brand__list owl-carousel clearfix">--}}
{{--                        <li><a href="#"><img src="{{ asset('public/template/images/brand/1.png') }}" alt="brand images"></a></li>--}}
{{--                        <li><a href="#"><img src="{{ asset('public/template/images/brand/2.png') }}" alt="brand images"></a></li>--}}
{{--                        <li><a href="#"><img src="{{ asset('public/template/images/brand/3.png') }}" alt="brand images"></a></li>--}}
{{--                        <li><a href="#"><img src="{{ asset('public/template/images/brand/4.png') }}" alt="brand images"></a></li>--}}
{{--                        <li><a href="#"><img src="{{ asset('public/template/images/brand/5.png') }}" alt="brand images"></a></li>--}}
{{--                        <li><a href="#"><img src="{{ asset('public/template/images/brand/5.png') }}" alt="brand images"></a></li>--}}
{{--                        <li><a href="#"><img src="{{ asset('public/template/images/brand/1.png') }}" alt="brand images"></a></li>--}}
{{--                        <li><a href="#"><img src="{{ asset('public/template/images/brand/2.png') }}" alt="brand images"></a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- End Brand Area -->--}}

<!-- Start Blog Area -->
<section class="htc__blog__area bg__white ptb--100" id="blogs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Our Blogs</h2>
                    {{-- <p>But I must explain to you how all this mistaken idea</p> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="ht__blog__wrap clearfix">
                <!-- Start Single Blog -->
                <div class="col-md-6 col-lg-4 col-sm-6 col-xs-12">
                    <div class="blog">
                        <div class="blog__thumb">
                            <a href="#">
                                <img class="blog_pic" src="{{ asset('public/template/images/blog/what-is-mental-health.png') }}" alt="blog images">
                            </a>
                        </div>
                        <div class="blog__details">
                            <div class="bl__date">
                                <span>January 06, 2020</span>
                            </div>
                            <h2><a href="#">What is mental health?</a></h2>
                            <p>Mental health refers to our cognitive, behavioral, and emotional wellbeing - it is all about how we think, feel, and behave. The term 'mental health' is sometimes used to mean an absence of a mental disorder.</p>
                            <div class="blog__btn">
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
                <!-- Start Single Blog -->
                <div class="col-md-6 col-lg-4 col-sm-6 col-xs-12">
                    <div class="blog">
                        <div class="blog__thumb">
                            <a href="#">
                                <img class="blog_pic" src="{{ asset('public/template/images/blog/maxresdefault.jpg') }}" alt="blog images">
                            </a>
                        </div>
                        <div class="blog__details">
                            <div class="bl__date">
                                <span>January 06, 2020</span>
                            </div>
                            <h2><a href="#">10 top tips for good mental health</a></h2>
                            <p>An important part of keeping fit and healthy is to take care of your own mental health. There are plenty of things you can do to help make sure you keep yourself mentally healthy.</p>
                            <div class="blog__btn">
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->

                <!-- Start Single Blog -->
                <div class="col-md-6 col-lg-4 col-sm-6 col-xs-12">
                    <div class="blog">
                        <div class="blog__thumb">
                            <a href="#">
                                <img class="blog_pic" src="{{ asset('public/template/images/blog/20180404145419_ZH.jpg') }}" alt="blog images">
                            </a>
                        </div>
                        <div class="blog__details">
                            <div class="bl__date">
                                <span>January 08, 2020</span>
                            </div>
                            <h2><a href="#">Why should we do exercise daily?</a></h2>
                            <p>Regular physical activity can improve your muscle strength and boost your endurance. Exercise delivers oxygen and nutrients to your tissues and helps your cardiovascular system work more efficiently.</p>
                            <div class="blog__btn">
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->

            </div>
        </div>
    </div>
</section>
<!-- End Blog Area -->
<!-- End Banner Area -->
<!-- Start Footer Area -->
<footer id="htc__footer">
    <!-- Start Footer Widget -->
    <div class="footer__container bg__cat--1" style="background-color:#313">
        <div class="container">
            <div class="row">
                <!-- Start Single Footer Widget -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer">
                        <h2 class="title__line--2">ABOUT US</h2>
                        <div class="ft__details">
                            <p>EU MediCare is an online health care system for Eastern University members.</p>
                            <div class="ft__social__link">
                                <ul class="social__link">
                                    <li><a href="#"><i class="icon-social-twitter icons"></i></a></li>

                                    <li><a href="#"><i class="icon-social-instagram icons"></i></a></li>

                                    <li><a href="#"><i class="icon-social-facebook icons"></i></a></li>

                                    <li><a href="#"><i class="icon-social-google icons"></i></a></li>

                                    <li><a href="#"><i class="icon-social-linkedin icons"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Footer Widget -->
                <!-- Start Single Footer Widget -->
                <div class="col-md-2 col-sm-6 col-xs-12 xmt-40">
                    <div class="footer">
                        <h2 class="title__line--2">information</h2>
                        <div class="ft__inner">
                            <ul class="ft__list">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Our Doctores</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">Privacy & Policy</a></li>
                                <li><a href="#">Terms  & Condition</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Footer Widget -->

                <!-- Start Single Footer Widget -->
                <div class="col-md-2 col-sm-6 col-xs-12 xmt-40 smt-40">
                    <!-- <div class="footer">
                        <h2 class="title__line--2">Our service</h2>
                        <div class="ft__inner">
                            <ul class="ft__list">
                                <li><a href="#">My Account</a></li>
                                <li><a href="cart.html">My Cart</a></li>
                                <li><a href="#">Login</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                            </ul>
                        </div>
                    </div> -->
                </div>
                <!-- End Single Footer Widget -->
                <!-- Start Single Footer Widget -->
                <div class="col-md-3 col-sm-6 col-xs-12 xmt-40 smt-40">
                    <div class="footer">
                        <h2 class="title__line--2">Newsletter</h2>
                        <div class="ft__inner">
                            <div class="news__input">
                                <form action="#" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" placeholder="Your Email*">
                                    </div>
                                    <div class="send__btn">
                                        <a class="fr__btn" href="#">Send Mail</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Footer Widget -->
            </div>
        </div>
    </div>
    <!-- End Footer Widget -->
    <!-- Start Copyright Area -->
    <div class="htc__copyright bg__cat--5">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="copyright__inner">
                        <p>Copyright © <a href="#">EU MediCare</a> <script>document.write(new Date().getFullYear());</script>. All right reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Area -->
</footer>
<!-- End Footer Style -->
</div>
<!-- Body main wrapper end -->

<!-- Placed js at the end of the document so the pages load faster -->

<!-- jquery latest version -->
<script src="{{ asset('public/template/js/vendor/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap framework js -->
<script src="{{ asset('public/template/js/bootstrap.min.js') }}"></script>
<!-- All js plugins included in this file. -->
<script src="{{ asset('public/template/js/plugins.js') }}"></script>
<script src="{{ asset('public/template/js/slick.min.js') }}"></script>
<script src="{{ asset('public/template/js/owl.carousel.min.js') }}"></script>
<!-- Waypoints.min.js. -->
<script src="{{ asset('public/template/js/waypoints.min.js') }}"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="{{ asset('public/template/js/main.js') }}"></script>

<!-- For toastr sweet alert message -->
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
