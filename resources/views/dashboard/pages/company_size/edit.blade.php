@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Company Sizes')
@section('page_main_title', 'Company Sizes')
@section('page_name', 'Company Sizes')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">Edit Company Size : {{ $companySize->name }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <x-form btn='Edit' route='dashboard.companySizes.update' :model="$companySize" method='put'>
                <x-form-input name='range_of_employees' :value="$companySize->range_of_employees" placeholder='Enter Company Size Range Of Employees ex: 10 - 20' type='text' label='Range Of Employees' ></x-form-input>
                <x-form-input name='name' :value="$companySize->name" placeholder='Enter Company Size name' type='text' label='Name' ></x-form-input>
            </x-form>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        </div>
    </div>
@endsection

@section('scripts')
@endsection
