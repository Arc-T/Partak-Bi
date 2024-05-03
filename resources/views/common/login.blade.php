<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به سامانه</title>
    <link rel="stylesheet" href={{ asset('assets/css/main/app.css') }} />
    <link rel="stylesheet" href={{ asset('assets/css/pages/auth.rtl.css') }} />
    <link rel="stylesheet" href={{ asset('assets/css/font.css') }}>
    <link rel="shortcut icon" href={{ asset('assets/images/logo/favicon.svg') }} type="image/x-icon" />
    <link rel="shortcut icon" href={{ asset('assets/images/logo/favicon.png') }} type="image/png" />
    @isset($subdomain)
       @include('company.layouts.partials.login-theme')
    @endisset
</head>

<body>

    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img
                                src=@isset($subdomain)
                            {{ asset('assets/images/logo/' . $company->Logo) }}
                            @else
                            {{ asset('assets/images/logo/logo.svg') }}
                            @endisset
                                alt="Logo" /></a>
                    </div>
                    <h1 class="auth-title">ورود به سامانه
                        @isset($subdomain) {{ $company->name }} @else  ‌پارتاک BI @endisset
                    </h1>
                    <p class="auth-subtitle mb-5">
                        اطلاعات ورود به سامانه را از شرکت پارتاک دریافت نمایید
                    </p>
                    
                    @include('company.layouts.partials.messages')

                    <form
                        action=@isset($subdomain)
                    {{ @route('company.auth', ['subdomain' => $subdomain]) }}
                    @else
                    {{ @route('partak.auth') }}
                    @endisset
                        method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-2">
                            <input type="text" class="form-control form-control-xl" placeholder="نام کاربری"
                                name="username" required />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="پسورد"
                                name="password" required />
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">
                            ورود
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>
</body>

</html>