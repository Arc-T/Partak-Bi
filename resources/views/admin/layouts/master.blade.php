<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>پنل پارتاک - ساخت کاربر</title>
    <link rel="stylesheet" href="{{ asset('css/main/app.rtl.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main/app-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.svg') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.png') }}" type="image/png" />
    @yield('css_files')
</head>

<body>
    <script src={{ asset('js/initTheme.js') }}></script>
    <div id="app">
        <div id="main" class="layout-horizontal">
            @include('admin.layouts.navbar')
            @yield('main_content')
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/pages/horizontal-layout.js') }}"></script>
    {{--
    <script src="{{ asset('js/pages/dashboard.js') }}"></script> --}}
    @yield('js_files')
</body>

</html>