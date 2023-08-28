<script src="{{ asset('front_end') }}/js/jquery.min.js"></script>
<script src="{{ asset('front_end') }}/js/jquery-migrate-3.0.1.min.js"></script>
<script src="{{ asset('front_end') }}/js/popper.min.js"></script>
<script src="{{ asset('front_end') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('front_end') }}/js/jquery.easing.1.3.js"></script>
<script src="{{ asset('front_end') }}/js/jquery.waypoints.min.js"></script>
<script src="{{ asset('front_end') }}/js/jquery.stellar.min.js"></script>
<script src="{{ asset('front_end') }}/js/owl.carousel.min.js"></script>
<script src="{{ asset('front_end') }}/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('front_end') }}/js/aos.js"></script>
<script src="{{ asset('front_end') }}/js/jquery.animateNumber.min.js"></script>
<script src="{{ asset('front_end') }}/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('front_end') }}/js/google-map.js"></script>
<script src="{{ asset('front_end') }}/js/main.js"></script>
@include('sweetalert::alert')

@yield('scripts')

@auth
    <script>
        // var user_id = '13'
        // console.log(user_id);
         user_id = '{{ auth()->id() }}'
        // console.log(user_id);
        var all_notifications_url = '{{ route('notifications.index') }}'
        var mark_read_url = '{{ route('notifications.mark_read') }}'
    </script>

    <script src="{{ asset('board/dist/js/notification.js') }}"></script>
    @vite(['resources/js/pusher-notification.js'])

@endauth
