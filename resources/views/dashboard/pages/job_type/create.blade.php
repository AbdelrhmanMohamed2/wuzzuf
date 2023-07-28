@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Job Types')
@section('page_main_title', 'Job Types')
@section('page_name', 'Job Types')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">Create Job Type : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <x-form btn='Create' route='dashboard.jobTypes.store'>
                <x-form-input name='name' placeholder='Enter Job Type name' type='text' label='Name' ></x-form-input>
            </x-form>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        </div>
    </div>
@endsection

@section('scripts')
@endsection
