@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Career Levels')
@section('page_main_title', 'Career Levels')
@section('page_name', 'Career Levels')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">Create Career Level : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <x-form btn='Create' route='dashboard.careerLevels.store'>
                <x-form-input name='name' placeholder='Enter Career Level name' type='text' label='Name' ></x-form-input>
            </x-form>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        </div>
    </div>
@endsection

@section('scripts')
@endsection
