@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Settings')
@section('page_main_title', 'Settings')
@section('page_name', 'Settings')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">Create Setting {{ $type }} : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @includeWhen($type == 'services', 'dashboard.pages.setting.create.services')
            @includeWhen($type == 'hero', 'dashboard.pages.setting.create.hero')
            @includeWhen($type == 'social_links', 'dashboard.pages.setting.create.links')
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        </div>
    </div>
@endsection

@section('scripts')
@endsection
