<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html class="no-js">
    <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" href="favicon.ico">
        <title>@yield('title' , env('APP_NAME'))</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- theme meta -->
        <meta name="theme-name" content="timer" />


        <!-- Template CSS Files
        ================================================== -->
        <!-- Twitter Bootstrs CSS -->
        <link rel="stylesheet" href="{{ asset('webSite/plugins/bootstrap/bootstrap.min.css') }}">
        <!-- Ionicons Fonts Css -->
        <link rel="stylesheet" href="{{ asset('webSite/plugins/ionicons/ionicons.min.css') }}">
        <!-- animate css -->
        <link rel="stylesheet" href="{{ asset('webSite/plugins/animate-css/animate.css') }}">
        <!-- Hero area slider css-->
        <link rel="stylesheet" href="{{ asset('webSite/plugins/slider/slider.css') }}">
        <!-- slick slider -->
        <link rel="stylesheet" href="{{ asset('webSite/plugins/slick/slick.css') }}">
        <!-- Fancybox -->
        <link rel="stylesheet" href="{{ asset('webSite/plugins/facncybox/jquery.fancybox.css') }}">
        <!-- hover -->
        <link rel="stylesheet" href="{{ asset('webSite/plugins/hover/hover-min.css') }}">
        <!-- template main css file -->
        <link rel="stylesheet" href="{{ asset('webSite/css/style.css') }}">

        @yield('style')

    </head>
    <body>

<!--
        ==================================================
        Header Section Start
        ================================================== -->
<section class="top-bar animated-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{ asset('../webSite/images/logo.png') }}" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.html">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="service.html">Service</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="service.html"  role="button"
                                    aria-expanded="false">
                                    Blog 
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>

@yield('content')
            <!--
            ==================================================
            Call To Action Section Start
            ================================================== -->
            <section id="call-to-action">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">SO WHAT YOU THINK ?</h1>
                                <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis,<br>possimus commodi, fugiat magnam temporibus vero magni recusandae? Dolore, maxime praesentium.</p>
                                <a href="contact.html" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">Contact With Me</a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!--
            ==================================================
            Footer Section Start
            ================================================== -->
            <footer id="footer">
                <div class="container">
                    <div class="row content-justify-between">
                        <div class="col-md-8 col-12 text-center text-lg-left text-md-left">
                            <p class="copyright">Copyright: Design and Developed by <a href="http://www.Themefisher.com" target="_blank">Themefisher</a>. <br>
                                Get More Bootstrap Template From Our
                                <a href="https://themefisher.com/free-bootstrap-templates/" target="_blank">Store</a>
                            </p>
                        </div>
                        <div class="col-md-4 col-12">
                            <!-- Social Media -->
                            <ul class="social text-center text-md-right text-lg-right">
                                <li>
                                    <a href="http://wwww.fb.com/themefisher" class="Facebook">
                                        <i class="ion-social-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://wwww.twitter.com/themefisher" class="Twitter">
                                        <i class="ion-social-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="Linkedin">
                                        <i class="ion-social-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://wwww.fb.com/themefisher" class="Google Plus">
                                        <i class="ion-social-googleplus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer> <!-- /#footer -->

	<!-- Template Javascript Files
	================================================== -->
	<!-- jquery -->
	<script src="{{ asset('webSite/plugins/jQurey/jquery.min.js') }}"></script>
	<!-- Form Validation -->
    <script src="{{ asset('webSite/plugins/form-validation/jquery.form.js') }}"></script>
    <script src="{{ asset('webSite/plugins/form-validation/jquery.validate.min.js') }}"></script>
	<!-- slick slider -->
	<script src="{{ asset('webSite/plugins/slick/slick.min.js') }}"></script>
	<!-- bootstrap js -->
	<script src="{{ asset('webSite/plugins/bootstrap/bootstrap.min.js') }}"></script>
	<!-- wow js -->
	<script src="{{ asset('webSite/plugins/wow-js/wow.min.js') }}"></script>
	<!-- slider js -->
	<script src="{{ asset('webSite/plugins/slider/slider.js') }}"></script>
	<!-- Fancybox -->
	<script src="{{ asset('webSite/plugins/facncybox/jquery.fancybox.js') }}"></script>
	<!-- template main js -->
	<script src="{{ asset('webSite/js/main.js') }}"></script>

    @yield('script')
 	</body>
</html>
