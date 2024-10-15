<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from hotflix.volkovdesign.com/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Sep 2024 03:13:51 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->php ac
    <link rel="stylesheet" href="{{ asset('assets_admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_admin/css/slimselect.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_admin/css/admin.css') }}">

    <!-- Icon font -->
    <link rel="stylesheet" href="{{ asset('assets_admin/webfont/tabler-icons.min.css') }}">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('assets_admin/icon/fil.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('assets_admin/icon/fil.png') }}">

    <meta name="description" content="Online Movies, TV Shows & Cinema HTML Template">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>
        @section('title')
            FilmFlex |
        @show
    </title>

    @stack('style') {{-- chèn css riêng vào vị trí có tên style --}}
</head>

<body>

    @yield('content')

    <!-- JS -->
    <script src="{{ asset('assets_admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets_admin/js/slimselect.min.js') }}"></script>
    <script src="{{ asset('assets_admin/js/smooth-scrollbar.js') }}"></script>
    <script src="{{ asset('assets_admin/js/admin.js') }}"></script>
    <script src="{{ asset('assets_admin/js/showError.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @yield('script')
</body>

<!-- Mirrored from hotflix.volkovdesign.com/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Sep 2024 03:14:07 GMT -->

</html>
