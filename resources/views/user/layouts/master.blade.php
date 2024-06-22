<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'داشبورد')</title>
    @yield('css_files')
    <link rel="stylesheet" href={{ asset('css/main/app.rtl.css') }}>
    <link rel="stylesheet" href={{ asset('css/main/app-dark.css') }}>
    <link rel="stylesheet" href={{ asset('css/font.css') }}>
    <link rel="stylesheet" href={{ asset('vendors/iconly/bold.css') }}>
    <link rel="stylesheet" href={{ asset('vendors/bootstrap-icons/bootstrap-icons.css') }}>
    <link rel="stylesheet" href={{ asset('vendors/perfect-scrollbar/perfect-scrollbar.css') }}>
    @yield('inline_css')
    @include('user.layouts.partials.theme')
</head>

<body>
    <script src={{ asset('js/initTheme.js') }}></script>
    <div id="app">
        <div id="sidebar" class="active">
            @include('user.layouts.sidebar')
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @include('user.layouts.partials.messages')
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
    <script src={{ asset('js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('js/app.js') }}></script>
    <script src={{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}></script>
    <script src={{ asset('extensions/apexcharts/apexcharts.min.js') }}></script>
    {{-- <script src={{ asset('assets/js/main.js') }}></script> --}}
    <!-- {% block js %}{% endblock %} -->
    @yield('js_files')
</body>

</html>
