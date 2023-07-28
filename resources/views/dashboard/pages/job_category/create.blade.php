@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Job Categories')
@section('page_main_title', 'Job Categories')
@section('page_name', 'Job Categories')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">Create Job Category : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <x-form btn='Create' route='dashboard.jobCategories.store'>

                <x-select-box col=6 label='Industry' name='industry_id'>
                    <option value="">-- Select Industry --</option>
                    @foreach ($industries as $option)
                        <option value="{{ $option['id'] }}" @selected($option['id'] == old('industry_id'))>{{ $option['name'] }}</option>
                    @endforeach
                </x-select-box>

                <x-form-input name='name' placeholder='Enter Job Category name' type='text' label='Name' ></x-form-input>
            </x-form>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        </div>
    </div>
@endsection

@section('scripts')
@endsection
