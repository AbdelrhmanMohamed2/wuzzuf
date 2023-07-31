@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Languages')
@section('page_main_title', 'Languages')
@section('page_name', 'Languages')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">Edit Language : {{ $language->name }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <x-form btn='Edit' route='dashboard.languages.update' :model="$language" method='put'>
                <x-form-input name='name' :value="$language->name" placeholder='Enter Language name' type='text' label='Name' ></x-form-input>
            </x-form>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        </div>
    </div>
@endsection

@section('scripts')
@endsection
