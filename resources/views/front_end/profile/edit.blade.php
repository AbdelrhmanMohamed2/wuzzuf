@extends('front_end.profile.profile-master')

@section('page-title', 'Edit Profile')


@section('profile-content')

    <x-frontend.form :file=true :action="route('profile.update')" value='Update' method='PUT'>

        @employee
            <x-frontend.text-input :value="$user->employee->title" id='title' name='title' type='text' label='Title'
                placeholder='Please Enter Your Title'></x-frontend.text-input>
        @endemployee

        <div class="row">
            <div class="col">

                <x-frontend.text-input :value="$user->email" id='email' name='email' type='email' label='Email Address'
                    placeholder='Please Enter Your Email'></x-frontend.text-input>
            </div>

            <div class="col">

                <x-frontend.text-input :value="$user->phone" id='phone' name='phone' type='text' label='Phone Number'
                    placeholder='Please Enter Your Phone'></x-frontend.text-input>

            </div>
        </div>


        <div class="row">
            <div class="col">
                <x-frontend.text-input value='' id='password' name='password' type='password'
                    label='Enter your password' placeholder='Please Enter Your Password'></x-frontend.text-input>

            </div>
            <div class="col">

                <x-frontend.text-input value='' id='password_confirmation' name='password_confirmation'
                    type='password' label='Confirm Password' placeholder='Confirm Password'></x-frontend.text-input>
            </div>
        </div>

        <div class="row">
            <div class="col">
                @employee
                    <x-frontend.file-input id='cv' name='cv_file' label='CV'></x-frontend.file-input>
                @endemployee
            </div>

            <div class="col">

                <x-frontend.file-input id='image' name='image' label='Image'></x-frontend.file-input>
            </div>
        </div>

    </x-frontend.form>

@endsection
