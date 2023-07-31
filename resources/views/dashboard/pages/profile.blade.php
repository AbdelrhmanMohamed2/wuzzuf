@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Profile')
@section('page_main_title', 'Profile')
@section('page_name', 'Profile')

@section('css')
@endsection

@section('content')


    <div class="row justify-content-left">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h4>Admin Profile</h4>
                </div>
                <div class="card-body">

                        <x-form route='dashboard.profile.update' btn='Update Profile' method='put'>

                        <div class="row">

                            <x-form-input col=6 name='first_name' type='text' :value="$user->first_name" label='First Name'
                                placeholder='Enter First Name'>
                            </x-form-input>
                            <x-form-input col=6 name='last_name' type='text' :value="$user->last_name" label='Last Name'
                                placeholder='Enter Last Name'>
                            </x-form-input>
                        </div>
                        <div class="row">

                            <x-form-input col=6 name='email' type='email' label='Email' :value="$user->email"
                                placeholder='Enter Email'>
                            </x-form-input>
                            <x-form-input col=6 name='phone' type='text' label='Phone' :value="$user->phone"
                                placeholder='Enter Phone'>
                            </x-form-input>
                        </div>
                        <div class="row">

                            <x-form-input col=6 name='password' type='password' label='Password'
                                placeholder='Enter Password'>
                            </x-form-input>
                            <x-form-input col=6 name='password_confirmation' type='password' label='Confirm Password'
                                placeholder='Enter Confirm Password'></x-form-input>

                        </div>
                    </x-form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
