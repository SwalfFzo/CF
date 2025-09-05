<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="@yield('meta_description','')">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Doran:wght@400;600;700&display=swap" rel="stylesheet">
    
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
            --mov: #4B006E; /* الموف */
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

        /* Ensure navbar is always above hero overlays */
        .navbar-custom {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 2000;
            background: rgba(0, 0, 0, 0) !important; /* شفاف */
            transition: background-color .3s ease, box-shadow .3s ease, padding .3s ease;
            padding: 15px 0;
        }

        /* White links on transparent header */
        .navbar-custom .inner-nav a,
        .navbar-custom .mobile-nav {
            color: #fff !important;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }
        .navbar-custom .inner-nav a:hover { 
            color: #FFD700 !important; 
            text-shadow: 1px 1px 2px rgba(0,0,0,0.7);
        }

        /* Solid purple when scrolled */
        .navbar-custom.navbar-scrolled {
            background: var(--mov) !important;
            box-shadow: 0 6px 20px rgba(0,0,0,.25);
            padding: 10px 0;
        }

        /* Keep nav text white after scroll */
        .navbar-custom.navbar-scrolled .inner-nav a { 
            color: #fff !important; 
            text-shadow: none;
        }
        .navbar-custom.navbar-scrolled .inner-nav a:hover { 
            color: #FFD700 !important; 
        }

        /* الحالة الافتراضية: شفاف فوق البانر */
.main-nav.navbar-custom,
.main-nav.navbar-custom.transparent,
.main-nav.navbar-custom.js-transparent {
  position: fixed;
  top: 0; left: 0; right: 0;
  z-index: 2000;
  background: transparent !important;
  box-shadow: none !important;
  padding: 15px 0;
  transition: background-color .3s ease, box-shadow .3s ease, padding .3s ease;
}

/* الروابط بيضاء فوق الخلفية الشفافة */
.main-nav.navbar-custom .inner-nav a,
.main-nav.navbar-custom .mobile-nav {
  color: #fff !important;
  text-shadow: 1px 1px 2px rgba(0,0,0,.5);
}
.main-nav.navbar-custom .inner-nav a:hover { color: #FFD700 !important; }

/* بعد التمرير: موف + ظل */
.main-nav.navbar-custom.navbar-scrolled {
  background: #4B006E !important; /* الموف */
  box-shadow: 0 6px 20px rgba(0,0,0,.25) !important;
  padding: 10px 0;
}

/* نحافظ على لون النص أبيض بعد التمرير */
.main-nav.navbar-custom.navbar-scrolled .inner-nav a { color: #fff !important; text-shadow: none; }
.main-nav.navbar-custom.navbar-scrolled .inner-nav a:hover { color: #FFD700 !important; }

    </style>
</head>


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
                <img src="{{ asset('sfc/images/R/MainLogo.png') }}" alt="logo" width="120">
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
   <script>
  (function () {
    const nav = document.querySelector('.main-nav.navbar-custom');
    if (!nav) return;

    function applyState() {
      const scrolled = window.scrollY > 50;

      // نثبّت كلاسنا
      nav.classList.toggle('navbar-scrolled', scrolled);

      // نلغي أي خلفية أو ظل حقنها القالب (أولوية inline أعلى من CSS)
      if (!scrolled) {
        nav.style.background = 'transparent';
        nav.style.boxShadow  = 'none';
      } else {
        nav.style.background = '#4B006E';
        nav.style.boxShadow  = '0 6px 20px rgba(0,0,0,.25)';
      }
    }

    // طبّق الحالة عند التحميل وأثناء التمرير وتغيير المقاس
    document.addEventListener('DOMContentLoaded', applyState);
    window.addEventListener('load', applyState);
    window.addEventListener('scroll', applyState, { passive: true });
    window.addEventListener('resize', applyState);
  })();
</script>

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