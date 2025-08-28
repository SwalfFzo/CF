<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title','لوحة التحكم')</title>
    <x-alerts />
    {{-- كل الأنماط والسكربتات عبر Vite (admin.js يحتوي Tabler + Icons + admin.css) --}}
    @vite(['resources/js/admin.js'])
    @stack('styles')
</head>

<body class="layout-fluid">
    <div class="page">

        {{-- Sidebar عمودية بطول الصفحة --}}
        <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="light">
            <div class="container-fluid">

                {{-- زر إظهار/إخفاء السايدبار في الشاشات الصغيرة --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                {{-- الشعار (خلفية موف + شعار غرف) --}}
                <h1 class="navbar-brand navbar-brand-autodark">
                    <a href="{{ route('admin.dashboard') }}" class="brand-block">
                        <img src="{{ asset('sfc/img/ghorf-logo.svg') }}" alt="غرف" class="brand-logo">
                    </a>
                </h1>

                <div class="collapse navbar-collapse" id="sidebar-menu">
                    <ul class="navbar-nav pt-lg-3">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                                href="{{ route('admin.dashboard') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-home"></i></span>
                                <span class="nav-link-title">الرئيسية</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}"
                                href="{{ route('admin.news.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-news"></i></span>
                                <span class="nav-link-title">إدارة الأخبار</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}"
                                href="{{ route('admin.news.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-news"></i></span>
                                <span class="nav-link-title">إدارة البريد</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}"
                                href="{{ route('admin.news.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-news"></i></span>
                                <span class="nav-link-title">اختبار البريد</span>
                            </a>
                        </li>

                        {{-- أضف روابطك الأخرى هنا --}}
                    </ul>
                </div>
            </div>
        </aside>

        {{-- محتوى الصفحة --}}
        <div class="page-wrapper">

            {{-- هيدر أبيض رسمي --}}
            <header class="navbar navbar-expand-md navbar-light bg-white border-bottom shadow-sm d-print-none">
                <div class="container-fluid">

                    {{-- عنوان الصفحة (اختياري) --}}
                    <div class="navbar-nav">
                        <div class="nav-item">
                            <span class="nav-link fw-semibold">@yield('title','')</span>
                        </div>
                    </div>

                    {{-- عناصر يمين الهيدر --}}
                    <div class="navbar-nav flex-row order-md-last">
                        {{-- زر تبديل الثيم --}}
                        <button id="theme-toggle" class="nav-link px-2 btn btn-link" type="button" aria-label="الوضع الداكن">
                            <i id="theme-toggle-icon" class="ti ti-moon"></i>
                        </button>

                        {{-- قائمة المستخدم مع تسجيل الخروج --}}
                        @auth
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link d-flex lh-1 align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="avatar avatar-sm" style="background-image:url('https://tabler.io/img/avatars/000m.jpg')"></span>
                                <div class="d-none d-xl-block ps-2">
                                    <div class="fw-medium">{{ auth()->user()->name }}</div>
                                    <div class="small text-secondary">{{ auth()->user()->email }}</div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                @if (Route::has('profile.edit'))
                                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                    <i class="ti ti-user me-1"></i> الملف الشخصي
                                </a>
                                <div class="dropdown-divider"></div>
                                @endif
                                <form method="POST" action="{{ route('logout') }}" class="px-2 my-1">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger w-100">
                                        <i class="ti ti-logout me-1"></i> تسجيل الخروج
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endauth
                    </div>
                </div>
            </header>

            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>

            <footer class="footer footer-transparent">
                <div class="container-xl text-center py-3">
                    <small>© {{ date('Y') }} مؤسسة غرف الأهلية</small>
                </div>
            </footer>
        </div>

    </div>

    {{-- تطبيق/تبديل الثيم (فاتح/داكن) --}}
    <script>
        (function() {
            const root = document.documentElement;
            const key = 'theme';
            const btn = document.getElementById('theme-toggle');
            const ico = document.getElementById('theme-toggle-icon');

            function apply(v) {
                if (v === 'dark') {
                    root.setAttribute('data-bs-theme', 'dark');
                    ico?.classList.remove('ti-moon');
                    ico?.classList.add('ti-sun');
                } else {
                    root.setAttribute('data-bs-theme', 'light');
                    ico?.classList.remove('ti-sun');
                    ico?.classList.add('ti-moon');
                }
            }
            let cur = localStorage.getItem(key) || 'light';
            apply(cur);
            btn?.addEventListener('click', () => {
                cur = (cur === 'dark' ? 'light' : 'dark');
                localStorage.setItem(key, cur);
                apply(cur);
            });
        })();
    </script>

    @stack('scripts')
</body>

</html>