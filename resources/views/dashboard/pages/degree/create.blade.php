@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Degrees')
@section('page_main_title', 'Degrees')
@section('page_name', 'Degrees')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">Create Degree : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <x-form btn='Create' route='dashboard.degrees.store'>
                <x-form-input name='name' placeholder='Enter Degree name' type='text' label='Name' ></x-form-input>
            </x-form>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        </div>
    </div>
@endsection

@section('scripts')
@endsection
