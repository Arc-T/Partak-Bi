<!DOCTYPE html>
<html lang="fa" dir="rtl">

{{--
/**
* ! it's better to use @stack with push for CSS & JS files
*/
--}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'داشبورد')</title>
    @yield('css_files')
    <link rel="stylesheet" href={{ asset('assets/css/main/app.rtl.css') }}>
    <link rel="stylesheet" href={{ asset('assets/css/main/app-dark.css') }}>
    <link rel="stylesheet" href={{ asset('assets/css/font.css') }}>
    <link rel="stylesheet" href={{ asset('assets/vendors/iconly/bold.css') }}>
    <link rel="stylesheet" href={{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}>
    <link rel="stylesheet" href={{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}>
    @yield('inline_css')
    @include('company.layouts.partials.theme')
</head>

<body>
    <script src={{ asset('assets/js/initTheme.js') }}></script>
    <div id="app">
        <div id="sidebar" class="active">
            @include('company.layouts.sidebar')
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @yield('main_content')
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-end">
                        <p>Created </span> by <a href="http://spadanait.ir/">Partak Group</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src={{ asset('assets/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('assets/js/app.js') }}></script>
    <script src={{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}></script>
    <script src={{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}></script>
    {{-- <script src={{ asset('assets/js/main.js') }}></script> --}}
    <!-- {% block js %}{% endblock %} -->
    @yield('js_files')
</body>

</html>
