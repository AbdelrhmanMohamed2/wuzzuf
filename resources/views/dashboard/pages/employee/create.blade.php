@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Employees')
@section('page_main_title', 'Employees')
@section('page_name', 'Employees')

@section('css')
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-header ">
            <h3 class="card-title">Add new Employee</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('dashboard.employees.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <x-form-input col=6 name='title' type='text' label='Title' placeholder='Enter Title'>
                    </x-form-input>
                    <x-select-box col=6 label='Gender' name='gender'>
                        <option>-- Select Employee Gender --</option>
                        <option @selected(old('gender') == 'male') value="male">Male</option>
                        <option @selected(old('gender') == 'female') value="female">Female</option>
                    </x-select-box>
                </div>
                <div class="row">
                    <x-form-input col=6 name='first_name' type='text' label='First Name' placeholder='Enter First Name'>
                    </x-form-input>
                    <x-form-input col=6 name='last_name' type='text' label='Last Name' placeholder='Enter Last Name'>
                    </x-form-input>
                    <x-form-input col=6 name='email' type='email' label='Email' placeholder='Enter Email'>
                    </x-form-input>
                    <x-form-input col=6 name='phone' type='text' label='Phone' placeholder='Enter Phone'>
                    </x-form-input>
                    <x-form-input col=6 name='password' type='password' label='Password' placeholder='Enter Password'>
                    </x-form-input>
                    <x-form-input col=6 name='password_confirmation' type='password' label='Confirm Password'
                        placeholder='Enter Confirm Password'>
                    </x-form-input>
                    <x-form-input col=6 name='birth_date' type='date' label='Birthdate' placeholder='Enter Birthdate'>
                    </x-form-input>
                </div>
                <div class="row">
                    <x-file-input col=6 name='cv_file' label='CV'></x-file-input>
                    <x-file-input col=6 name='image' label='Image'></x-file-input>

                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Create</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
@endsection
