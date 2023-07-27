@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Admins')
@section('page_main_title', 'Admins')
@section('page_name', 'Admins')

@section('css')
@endsection

@section('content')
    <div class="card card-warning">
        <div class="card-header ">
            <h3 class="card-title">Edit Admin : {{ $admin->user->full_name }}</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('dashboard.admins.update', $admin) }}" method="post">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="row">
                    <x-form-input col=6 :value="$admin->user->first_name" name='first_name' type='text' label='First Name'
                        placeholder='Enter First Name'>
                    </x-form-input>
                    <x-form-input col=6 :value="$admin->user->last_name" name='last_name' type='text' label='Last Name'
                        placeholder='Enter Last Name'>
                    </x-form-input>
                    <x-form-input col=6 :value="$admin->user->email" name='email' type='email' label='Email'
                        placeholder='Enter Email'>
                    </x-form-input>
                    <x-form-input col=6 :value="$admin->user->phone" name='phone' type='text' label='Phone'
                        placeholder='Enter Phone'>
                    </x-form-input>
                    <x-form-input col=6 name='password' type='password' label='Password' placeholder='Enter Password'>
                    </x-form-input>
                    <x-form-input col=6 name='password_confirmation' type='password' label='Confirm Password'
                        placeholder='Enter Confirm Password'></x-form-input>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
@endsection
