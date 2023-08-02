 <!-- jQuery -->
 <script src="{{ asset('board/plugins') }}/jquery/jquery.min.js"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="{{ asset('board/plugins') }}/jquery-ui/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
     $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="{{ asset('board/plugins') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- ChartJS -->
 <script src="{{ asset('board/plugins') }}/chart.js/Chart.min.js"></script>
 <!-- Sparkline -->
 <script src="{{ asset('board/plugins') }}/sparklines/sparkline.js"></script>
 <!-- JQVMap -->
 <script src="{{ asset('board/plugins') }}/jqvmap/jquery.vmap.min.js"></script>
 <script src="{{ asset('board/plugins') }}/jqvmap/maps/jquery.vmap.usa.js"></script>
 <!-- jQuery Knob Chart -->
 <script src="{{ asset('board/plugins') }}/jquery-knob/jquery.knob.min.js"></script>
 <!-- daterangepicker -->
 <script src="{{ asset('board/plugins') }}/moment/moment.min.js"></script>
 <script src="{{ asset('board/plugins') }}/daterangepicker/daterangepicker.js"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="{{ asset('board/plugins') }}/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
 <!-- Summernote -->
 <script src="{{ asset('board/plugins') }}/summernote/summernote-bs4.min.js"></script>
 <!-- overlayScrollbars -->
 <script src="{{ asset('board/plugins') }}/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
 <!-- AdminLTE App -->
 <script src="{{ asset('board/dist') }}/js/adminlte.js"></script>
 <!-- AdminLTE for demo purposes -->
 {{-- <script src="{{asset('board/dist')}}/js/demo.js"></script> --}}
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="{{ asset('board/dist') }}/js/pages/dashboard.js"></script>
 @include('sweetalert::alert')
 @yield('scripts')
