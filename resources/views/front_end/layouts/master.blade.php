<!DOCTYPE html>
<html lang="en">

@include('front_end.layouts.head')

<body>

    @include('front_end.layouts.nav')

    @yield('content')

    @include('front_end.layouts.footer')

    @include('front_end.layouts.scripts')

</body>

</html>
