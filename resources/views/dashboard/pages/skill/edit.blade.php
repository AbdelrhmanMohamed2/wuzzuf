@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Skills')
@section('page_main_title', 'Skills')
@section('page_name', 'Skills')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">Edit Skill : {{ $skill->name }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <x-form btn='Edit' route='dashboard.skills.update' :model="$skill" method='put'>
                <x-form-input name='name' :value="$skill->name" placeholder='Enter Skill name' type='text' label='Name' ></x-form-input>
            </x-form>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        </div>
    </div>
@endsection

@section('scripts')
@endsection
