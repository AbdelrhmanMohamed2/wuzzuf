@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Universities')
@section('page_main_title', 'Universities')
@section('page_name', 'Universities')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">Edit University : {{ $university->name }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <x-form btn='Edit' route='dashboard.universities.update' :model="$university" method='put'>
                <x-form-input name='name' :value="$university->name" placeholder='Enter University name' type='text' label='Name' ></x-form-input>
            </x-form>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        </div>
    </div>
@endsection

@section('scripts')
@endsection
