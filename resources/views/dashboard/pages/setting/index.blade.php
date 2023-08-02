@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Settings')
@section('page_main_title', 'Settings')
@section('page_name', 'Settings')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">Settings : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @includeWhen($type == 'general', 'dashboard.pages.setting.show.general')
            @includeWhen($type == 'hero', 'dashboard.pages.setting.show.hero')
            @includeWhen($type == 'services', 'dashboard.pages.setting.show.services')
            @includeWhen($type == 'footer', 'dashboard.pages.setting.show.footer')
            @includeWhen($type == 'social_links', 'dashboard.pages.setting.show.links')
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        </div>
    </div>
@endsection

@section('scripts')
@endsection
