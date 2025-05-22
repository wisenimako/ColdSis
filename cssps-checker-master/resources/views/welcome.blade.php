<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- required meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- #title -->
    <title>CSSPS</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Edu+VIC+WA+NT+Beginner:wght@400..700&family=Hubot+Sans:ital,wght@0,200..900;1,200..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css'])
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('js/landing/bootstrap/css/bootstrap.min.css') }}">
    
    @vite([
         'resources/css/landing/aos.css',
         'resources/css/landing/magnific-popup.css',
         'resources/css/landing/nice-select.css',
         'resources/css/landing/swiper-bundle.min.css',
         'resources/css/landing/main.css',
         'resources/css/landing/responsive.css',
         'resources/css/landing/yellow-theme.css',
         'resources/css/landing/sticky-header.css',
         'resources/css/landing/box-layout.css',
         'resources/css/landing/dark-mode.css',
         'resources/css/landing/rtl.css'
     ])

    {{--    font awesome--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

</head>

<body>
<!--[if lt IE 9]>
<p class="browserupgrade">
    You are using an <strong>outdated</strong> browser. Please
    <a href="https://browsehappy.com/">upgrade your browser</a> to improve
    your experience and security.
</p>
<![endif]-->
<div class="page-wrapper pg-four">
    <!-- ==== preloader start ==== -->
    <div class="preloader">
        <p>CSSPS</p>
    </div>
    <!-- ==== / preloader end ==== -->

    <!-- ==== topbar start ==== -->
    <div class="topbar topbar--secondary topbar--quaternary topbar-five d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="topbar__inner">
                        <div class="row align-items-center gutter-12">
                            <div class="col-12 col-lg-9 col-xxl-7">
                                <div class="topbar__list-wrapper">
                                    <ul class="topbar__list justify-content-center justify-content-xxl-start">
                                        <li><i class="fa-solid fa-comment-dots"></i> Helpline: <a
                                                href="tel:2305-587-3407">+2(305)
                                                587-3407</a>
                                        </li>

                                        <li><span class="divider"></span></li>
                                        <li><a href="mailto:example@info.com">example@info.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 col-xxl-5">
                                <div class="topbar-five-extra justify-content-end">
                                    <div
                                        class="topbar__extra text-center justify-content-center justify-content-xxl-end d-none d-xxl-flex">
                                        <p>Updates: School selections now open
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==== / topbar end ==== -->


    <!-- ==== header start ==== -->
    <header class="header header-secondary header-five">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main-header__menu-box">
                        <nav class="navbar p-0">
                            <div class="navbar-logo">
                                <a href="{{ url("/") }}">
                                    <img src="{{ asset('images/landing/logo.png') }}" alt="Image"/>
                                </a>
                            </div>
                            <div class="navbar__menu-wrapper">
                                <div class="navbar__menu d-none d-xl-block">
                                    <ul class="navbar__list">
                                        <li class="navbar__item nav-fade">
                                            <a href="#" class="">Home</a>
                                        </li>

                                        <li class="navbar__item nav-fade">
                                            <a href="#">About CSSPS</a>
                                        </li>

                                        <li class="navbar__item nav-fade">
                                            <a href="#">FAQs</a>
                                        </li>

                                        <li class="navbar__item nav-fade">
                                            <a href="/hub">Check Placement</a>
                                        </li>

                                        <li class="navbar__item nav-fade">
                                            <a href="#">Support Centre</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <div class="navbar__options">
                                <div class="navbar__mobile-options ">

                                    <a href="/hub" class="btn--primary d-none d-md-flex">Check Placement</a>
                                </div>
                                <button class="open-offcanvas-nav d-flex d-xl-none" aria-label="toggle mobile menu"
                                        title="open offcanvas menu">
                                    <span class="icon-bar top-bar"></span>
                                    <span class="icon-bar middle-bar"></span>
                                    <span class="icon-bar bottom-bar"></span>
                                </button>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ==== / header end ==== -->
    <!-- ==== mobile menu start ==== -->
    <div class="mobile-menu mobile-menu--primary d-block d-xxl-none">
        <nav class="mobile-menu__wrapper">
            <div class="mobile-menu__header nav-fade">
                <div class="logo">
                    <a href="{{ url("/") }}" aria-label="home page" title="logo">
                        <img src="{{ asset('images/landing/logo.png') }}" alt="Image">
                    </a>
                </div>
                <button aria-label="close mobile menu" class="close-mobile-menu">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="mobile-menu__list"></div>

        </nav>
    </div>
    <div class="mobile-menu__backdrop"></div>
    <!-- ==== / mobile menu end ==== -->


    <!-- ==== banner section start ==== -->
    <section class="banner-five commit"
             data-background="{{ asset('images/landing/Ghanaian_Senior_High_School_students_in_class_01.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-five__content">
                        <h1 class="title-animation fw-7"> Welcome to <span class="bottom-line">CSSPS</span></h1>
                        <p>Smart, Fair & Transparent School Placement</p>
                        <div class="mt-40">
                            <a href="/hub" title="Check Placement"
                               class="btn--primary">Check your Placement
                            </a>
                        </div>
                        <div class="commmit-tab-single mt-40">
                            <div class="commit-tab-inner">
                                <div class="thumb">
                                    <i class="fa fa-check"></i>
                                </div>
                                <div class="content">
                                    <p class="text-lg fw-7">Trusted by Parents</p>
                                    <p>Parents across the country rely on CSSPS for accurate and fair school
                                        placements.</p>
                                </div>
                            </div>
                            <span class="divider d-none d-xxl-block"></span>
                            <div class="commit-tab-inner">
                                <div class="thumb">
                                    <i class="fa fa-check"></i>
                                </div>
                                <div class="content">
                                    <p class="text-lg fw-7">Transparent Processes</p>
                                    <p>Our placement system follows clear criteria to ensure fairness for all.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== / banner section end ==== -->


    <!-- ==== service section start ==== -->
    <section class="ff-service pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-7">
                    <div class="section__header text-center" data-aos="fade-up" data-aos-duration="1000">
                        <h2 class="title-animation mt-0 fw-6 text-white"> User Guide </h2>
                    </div>
                </div>
            </div>
            <div class="row gutter-30">
                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                    <div class="ff-service__single">

                        <div class="content mt-15">
                            <p class="txt-lg fw-7">Step 1</p>
                            <p class="mt-20">lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
                                efficitur, nunc et bibendum facilisis, nisi nunc aliquet nunc, eget
                                tincidunt nunc nunc eget nunc. Donec efficitur, nunc et bibendum </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                    <div class="ff-service__single">
                        <div class="content mt-15">
                            <p class="txt-lg fw-7">Step 2</p>
                            <p class="mt-20">lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
                                efficitur, nunc et bibendum facilisis, nisi nunc aliquet nunc, eget
                                tincidunt nunc nunc eget nunc. Donec efficitur, nunc et bibendum </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                    <div class="ff-service__single">
                        <div class="content mt-15">
                            <p class="txt-lg fw-7">Step 3</p>
                            <p class="mt-20">
                                lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
                                efficitur, nunc et bibendum facilisis, nisi nunc aliquet nunc, eget
                                tincidunt nunc nunc eget nunc. Donec efficitur, nunc et bibendum
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                    <div class="ff-service__single">
                        <div class="content mt-15">
                            <p class="txt-lg fw-7">Step 4</p>
                            <p class="mt-20">lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
                                efficitur, nunc et bibendum facilisis, nisi nunc aliquet nunc, eget
                                tincidunt nunc nunc eget nunc. Donec efficitur, nunc et bibendum </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- ==== / service section end ==== -->

    <!-- ==== footer start ==== -->
    <footer class="footer-two ff-footer">
        <div class="container">

            <div class="row gutter-60">
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="footer-two__widget" data-aos="fade-up" data-aos-duration="1000">
                        <div class="footer-two__widget-logo">
                            <a href="{{ url("/")  }}">
                                <img src="{{ asset("images/landing/logo.png") }}" alt="Logo" style="max-width: 200px">
                            </a>
                        </div>
                        <div class="footer-two__widget-content">
                            <p>
                                CSSPS is a computerized platform designed to match graduating
                                junior high school students with senior high schools based on
                                their academic performance, program preferences, and available
                                vacancies.

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-2 offset-xl-1">
                    <div class="footer-two__widget" data-aos="fade-up" data-aos-duration="1000"
                         data-aos-delay="200">
                        <div class="footer-two__widget-intro">
                            <h5>Quick Links</h5>
                            <div class="line">
                                <span class="large-line"></span>
                                <span class="small-line"></span>
                                <span class="small-line"></span>
                            </div>
                        </div>
                        <div class="footer-two__widget-content">
                            <ul>
                                <li><a href="about-us.html"><i class="fa-solid fa-arrow-right"></i>About Us</a>
                                </li>
                                <li><a href="blog-list.html"><i class="fa-solid fa-arrow-right"></i>Mews & Updates</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="footer-two__widget footer-two__widget--alternate" data-aos="fade-up"
                         data-aos-duration="1000" data-aos-delay="400">
                        <div class="footer-two__widget-intro">
                            <h5>Resources</h5>
                            <div class="line">
                                <span class="large-line"></span>
                                <span class="small-line"></span>
                                <span class="small-line"></span>
                            </div>
                        </div>
                        <div class="footer-two__widget-content">
                            <ul>
                                <li><a href="#"><i class="fa-solid fa-arrow-right"></i>Ghana Education Services</a>
                                </li>
                                <li><a href="events.html"><i class="fa-solid fa-arrow-right"></i>Education
                                        Support</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="footer-two__widget footer-two__widget--alternate" data-aos="fade-up"
                         data-aos-duration="1000" data-aos-delay="600">
                        <div class="footer-two__widget-intro">
                            <h5>Help Centre</h5>
                            <div class="line">
                                <span class="large-line"></span>
                                <span class="small-line"></span>
                                <span class="small-line"></span>
                            </div>
                        </div>
                        <div class="footer-two__widget-content footer-two__widget-content--contact">
                            <ul>
                                <li><a href="#" target="_blank"><i
                                            class="fa-solid fa-location-dot"></i> Accra</a>
                                </li>
                                <li><a href="tel:2305-587-3407"><i class="fa-solid fa-phone"></i>024 000 0000</a>
                                </li>
                                <li><a href="mailto:support@example.com"><i
                                            class="fa-regular fa-envelope"></i>example@email.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-two__copyright">
            <div class="container">
                <div class="row align-items-center gutter-12">
                    <div class="col-12 col-lg-6">
                        <div class="footer-two__copyright-inner text-center text-lg-start">
                            <p>Copyright &copy; <span id="copyrightYear"></span> <a href="index.html">CSSPS</a>.
                                All rights
                                reserved.
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="footer__bottom-left">
                            <ul class="footer__bottom-list justify-content-center justify-content-lg-end">
                                <li><a href="terms-conditions.html">Terms & Conditions</a></li>
                                <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- ==== / footer end ==== -->


    <!-- ==== custom cursor start ==== -->
    <div class="mouseCursor cursor-outer"></div>
    <div class="mouseCursor cursor-inner"></div>
    <!-- ==== / custom cursor end ==== -->
    <!-- ==== scroll to top start ==== -->
    <button class="progress-wrap" aria-label="scroll indicator" title="back to top">
        <span></span>
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
        </svg>
    </button>
    <!-- ==== / scroll to top end ==== -->
</div>
<!-- ==== js dependencies start ==== -->
<script src="{{ asset('js/landing/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('js/landing/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/landing/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/landing/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/landing/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('js/landing/viewport.jquery.js') }}"></script>
<script src="{{ asset('js/landing/odometer.min.js') }}"></script>
<script src="{{ asset('js/landing/vanilla-tilt.min.js') }}"></script>
<script src="{{ asset('js/landing/aos.js') }}"></script>
<script src="{{ asset('js/landing/SplitText.min.js') }}"></script>
<script src="{{ asset('js/landing/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('js/landing/ScrollTrigger.min.js') }}"></script>
<script src="{{ asset('js/landing/gsap.min.js') }}"></script>
<script src="{{ asset('js/landing/custom.js') }}"></script>

</body>

</html>
