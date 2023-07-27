@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Admins')
@section('page_main_title', 'Admins')
@section('page_name', 'Admins')

@section('css')
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-header ">
            <h3 class="card-title">Add new Admin</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('dashboard.admins.store') }}" method="post">
            @csrf
            <div class="card-body">
                {{-- <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" value="{{ old('first_name') }}" name="first_name" @class([
                        'form-control',
                        'is-invalid' => $errors->has('first_name'),
                        'is-valid' => !$errors->has('first_name') && old('first_name'),
                    ])
                        id="first_name" placeholder="Enter First Name .. ">
                    @error('first_name')
                        <span id="email-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div> --}}
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
                        placeholder='Enter Confirm Password'></x-form-input>
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
