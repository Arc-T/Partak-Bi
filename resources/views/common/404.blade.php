<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>صفحه مورد نظر یافت نشد !</title>
  <link rel="stylesheet" href={{ asset('assets/css/main/app.rtl.css') }} />
  <link rel="stylesheet" href={{ asset('assets/css/pages/error.css') }} />
  <link rel="stylesheet" href={{ asset('assets/css/font.css') }}>
  <link rel="shortcut icon" href={{ asset('assets/images/logo/favicon.svg') }} type="image/x-icon" />
  <link rel="shortcut icon" href={{ asset('assets/images/logo/favicon.png') }} type="image/png" />
</head>

<body>
  <div id="error">
    <div class="error-page container">
      <div class="col-md-8 col-12 offset-md-2">
        <div class="text-center">
          <img class="img-error" src={{ asset('assets/images/samples/error-404.svg') }} alt="Not Found" />
          <h1 class="error-title">خطا در یافتن آدرس !</h1>
          <p class="fs-5 text-gray-600">
            صفحه ی مورد نظر شما یافت نشد.
          </p>
          <a href={{ route('admin.login') }} class="btn btn-lg btn-outline-primary mt-3">بازگشت به صفحه اصلی</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>