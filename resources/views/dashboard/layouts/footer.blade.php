<footer class="main-footer">
    <strong>Copyright &copy; {{ now()->year }} {{ $settings->where('key', 'site_name')->first()->value}}.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> {{ $settings->where('key', 'site_version')->first()->value }}
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
