<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="@yield('meta_description','')">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('sfc/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sfc/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('sfc/css/style-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('sfc/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sfc/css/vertical-rhythm.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sfc/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('sfc/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('sfc/css/splitting.css') }}">
    <link rel="stylesheet" href="{{ asset('sfc/css/ngo-theme.css') }}">


    <!-- <link rel="stylesheet" href="{{ asset('sfc/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('sfc/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('sfc/rs-plugin/css/settings.css') }}"> -->


    <style>
        :root {
            --lavender: #7D86F3;
            --darkgreen: #19351F;
            --skyblue: #E0EBF4;
            --pistachio: #E1F7C8;
            --crystal: #FFFFFF;
        }

        a {
            color: var(--lavender);
        }

        .btn-primary {
            background: var(--lavender);
            border-color: var(--lavender);
        }

        .btn-primary:hover {
            background: var(--darkgreen);
            border-color: var(--darkgreen);
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: var(--darkgreen);
        }
    </style>
</head>
<script>
    document.addEventListener('scroll', function() {
        const nav = document.querySelector('.navbar-custom');
        if (window.scrollY > 50) {
            nav.classList.add('navbar-scrolled');
        } else {
            nav.classList.remove('navbar-scrolled');
        }
    });
</script>

<body class="appear-animate">
    <!-- Page Loader -->
    <div class="page-loader">
        <div class="loader">Loading...</div>
    </div>
    <!-- End Page Loader -->
    {{-- Navigation --}}
    <nav class="main-nav transparent stick-fixed wow-menubar js-stick navbar-custom">
        <div class="full-wrapper relative clearfix">
            <div class="nav-logo-wrap local-scroll">
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('sfc/images/clients-logos/logo2.png') }}" alt="logo" width="120">
                </a>
            </div>
            <div class="mobile-nav"><i class="fa fa-bars"></i></div>
            <div class="inner-nav desktop-nav">
                <ul class="clearlist scroll-nav local-scroll">
                    <li><a href="{{ url('/') }}">الرئيسية</a></li>
                    <li><a href="#about">عن المؤسسة</a></li>
                    <li><a href="#vision">الرؤية والرسالة</a></li>
                    <li><a href="#goals">الأهداف</a></li>
                    <li><a href="#initiatives">المبادرات</a></li>
                    <li><a href="#contact">تواصل</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main id="main">
        {{-- Content --}}
        @yield('content')

        {{-- Footer --}}
    </main>
    <footer class="page-section bg-gray-lighter">
        <div class="container text-center">
            <p class="mb-0">© {{ date('Y') }} مؤسسة غرف الأهلية - جميع الحقوق محفوظة</p>
        </div>
    </footer>

    <!-- Rhythm Evolution JS -->
    <script src="{{ asset('sfc/js/jquery.min.js') }}"></script>
    <script src="{{ asset('sfc/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('sfc/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sfc/js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('sfc/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('sfc/js/jquery.localScroll.min.js') }}"></script>
    <script src="{{ asset('sfc/js/jquery.viewport.mini.js') }}"></script>
    <script src="{{ asset('sfc/js/jquery.parallax-1.1.3.js') }}"></script>
    <script src="{{ asset('sfc/js/jquery.fitvids.js') }}"></script>
    <script src="{{ asset('sfc/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('sfc/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('sfc/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('sfc/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('sfc/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('sfc/js/jquery.lazyload.min.js') }}"></script>
    <script src="{{ asset('sfc/js/wow.min.js') }}"></script>
    <script src="{{ asset('sfc/js/morphext.js') }}"></script>
    <script src="{{ asset('sfc/js/typed.min.js') }}"></script>
    <script src="{{ asset('sfc/js/all.js') }}"></script>
    <script src="{{ asset('sfc/js/contact-form.js') }}"></script>
    <script src="{{ asset('sfc/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('sfc/js/objectFitPolyfill.min.js') }}"></script>
    <script src="{{ asset('sfc/js/splitting.min.js') }}"></script>

</body>

</html>