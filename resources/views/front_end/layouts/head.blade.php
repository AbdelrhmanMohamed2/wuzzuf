<head>
    <title>{{ $settings->where('key', 'site_name')->first()->value }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front_end') }}/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('front_end') }}/css/animate.css">

    <link rel="stylesheet" href="{{ asset('front_end') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('front_end') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('front_end') }}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{ asset('front_end') }}/css/aos.css">

    <link rel="stylesheet" href="{{ asset('front_end') }}/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('front_end') }}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ asset('front_end') }}/css/jquery.timepicker.css">


    <link rel="stylesheet" href="{{ asset('front_end') }}/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('front_end') }}/css/icomoon.css">
    <link rel="stylesheet" href="{{ asset('front_end') }}/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon"
        href="{{ asset('uploads/images') }}/{{ $settings->where('key', 'site_logo')->first()->value }}"
        type="image/x-icon">

    @auth
        <style>
            .dropdown-menu-lg {
                min-width: max-content;
            }

            .notification-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
        </style>
    @endauth
    @yield('css')
</head>
