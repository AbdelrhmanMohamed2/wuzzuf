 <!-- jQuery -->
 <script src="{{ asset('front-end/plugins') }}/jquery/jquery.min.js"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="{{ asset('front-end/plugins') }}/jquery-ui/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
     $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="{{ asset('front-end/plugins') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- ChartJS -->
 <script src="{{ asset('front-end/plugins') }}/chart.js/Chart.min.js"></script>
 <!-- Sparkline -->
 <script src="{{ asset('front-end/plugins') }}/sparklines/sparkline.js"></script>
 <!-- JQVMap -->
 <script src="{{ asset('front-end/plugins') }}/jqvmap/jquery.vmap.min.js"></script>
 <script src="{{ asset('front-end/plugins') }}/jqvmap/maps/jquery.vmap.usa.js"></script>
 <!-- jQuery Knob Chart -->
 <script src="{{ asset('front-end/plugins') }}/jquery-knob/jquery.knob.min.js"></script>
 <!-- daterangepicker -->
 <script src="{{ asset('front-end/plugins') }}/moment/moment.min.js"></script>
 <script src="{{ asset('front-end/plugins') }}/daterangepicker/daterangepicker.js"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="{{ asset('front-end/plugins') }}/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
 <!-- Summernote -->
 <script src="{{ asset('front-end/plugins') }}/summernote/summernote-bs4.min.js"></script>
 <!-- overlayScrollbars -->
 <script src="{{ asset('front-end/plugins') }}/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
 <!-- AdminLTE App -->
 <script src="{{ asset('front-end/dist') }}/js/adminlte.js"></script>
 <!-- AdminLTE for demo purposes -->
 {{-- <script src="{{asset('front-end/dist')}}/js/demo.js"></script> --}}
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="{{ asset('front-end/dist') }}/js/pages/dashboard.js"></script>
 @include('sweetalert::alert')
 @yield('scripts')
