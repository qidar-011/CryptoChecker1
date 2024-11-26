<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CryptoChecker - @yield('title', 'Home')</title>
    <!-- الروابط الخارجية -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- رابط Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- خط جوجل -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- الأنماط -->
    <link rel="stylesheet" href="{{ asset('website/css/style.css') }}">
    @yield('styles')
</head>

<body>
    <!-- شريط العملات الرئيسية الثابت في جميع الصفحات -->
    @include('website.partials.currency-bar')

    <!-- شريط التنقل العلوي الثابت في جميع الصفحات -->
    @include('website.partials.navbar')

    <!-- الشعار الرئيسي الفيديو الثابت في جميع الصفحات -->
    @include('website.partials.main-logo')

    <!-- محتوى الصفحة -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- الفوتر الثابت في جميع الصفحات -->
    @include('website.partials.footer')

    <!-- سكريبت Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- سكريبت الجافاسكريبت -->
    <script src="{{ asset('website/js/main.js') }}"></script>
    @yield('scripts')
</body>

</html>



{{-- <!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CryptoChecker - @yield('title', 'Home')</title>
    <!-- الروابط الخارجية -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- رابط Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- خط جوجل -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- الأنماط -->
    <link rel="stylesheet" href="{{ asset('website/css/style.css') }}">
    @yield('styles')
</head>

<body>
    <!-- شريط العملات الرئيسية الثابت في جميع الصفحات -->
    @include('website.partials.currency-bar')

    <!-- شريط التنقل العلوي الثابت في جميع الصفحات -->
    @include('website.partials.navbar')

    <!-- الشعار الرئيسي الفيديو الثابت في جميع الصفحات -->
    @include('website.partials.main-logo')

    <!-- محتوى الصفحة -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- الفوتر الثابت في جميع الصفحات -->
    @include('website.partials.footer')

    <!-- سكريبت Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- سكريبت الجافاسكريبت -->
    <script src="{{ asset('website/js/main.js') }}"></script>
    @yield('scripts')
</body>

</html> --}}



{{-- <!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CryptoChecker')</title>
    <!-- روابط CSS -->
    <link rel="stylesheet" href="{{ asset('website/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/custom.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- خط جوجل -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    @stack('styles') <!-- لإضافة أنماط إضافية من الصفحات الفرعية -->
</head>
<body>
    <!-- شريط العملات الرئيسية -->
    @include('website.partials.currency-bar')

    <!-- شريط التنقل العلوي -->
    @include('website.partials.navbar')

    <!-- الشعار الرئيسي الفيديو الثابت -->
    <div class="container-fluid p-0">
        @yield('main-logo')
    </div>

    <!-- محتوى الصفحة -->
    <div class="container">
        @yield('content')
    </div>

    <!-- الفوتر -->
    @include('website.partials.footer')

    <!-- سكريبت Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- سكريبت تحديث أسعار العملات -->
    <script src="{{ asset('website/js/custom.js') }}"></script>
    @stack('scripts') <!-- لإضافة سكريبتات إضافية من الصفحات الفرعية -->
</body>
</html> --}}


{{-- <!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- الروابط الخارجية -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body>
    @include('website.layouts.navbar')
    @yield('content')
    @include('website.layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
 --}}

 