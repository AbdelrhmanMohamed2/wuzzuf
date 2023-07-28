@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Company Sizes')
@section('page_main_title', 'Company Sizes')
@section('page_name', 'Company Sizes')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">Create Company Size : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <x-form btn='Create' route='dashboard.companySizes.store'>
                <x-form-input name='range_of_employees' placeholder='Enter Company Size Range Of Employees ex: 10 - 20' type='text' label='Range Of Employees' ></x-form-input>
                <x-form-input name='name' placeholder='Enter Company Size name' type='text' label='Name' ></x-form-input>
            </x-form>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        </div>
    </div>
@endsection

@section('scripts')
@endsection
