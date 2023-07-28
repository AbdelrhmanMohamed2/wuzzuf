@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Industries')
@section('page_main_title', 'Industries')
@section('page_name', 'Industries')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">Edit Industry : {{ $industry->name }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <x-form btn='Edit' route='dashboard.industries.update' :model="$industry" method='put'>
                <x-form-input name='name' :value="$industry->name" placeholder='Enter Industry name' type='text' label='Name' ></x-form-input>
            </x-form>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        </div>
    </div>
@endsection

@section('scripts')
@endsection
