@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Grades')
@section('page_main_title', 'Grades')
@section('page_name', 'Grades')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">Edit Grade : {{ $grade->name }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <x-form btn='Edit' route='dashboard.grades.update' :model="$grade" method='put'>
                <x-form-input name='name' :value="$grade->name" placeholder='Enter Grade name' type='text' label='Name' ></x-form-input>
            </x-form>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        </div>
    </div>
@endsection

@section('scripts')
@endsection
