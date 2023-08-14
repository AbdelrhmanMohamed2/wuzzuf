@extends('front_end.layouts.master')

@section('css')
@endsection


@section('content')
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start">
                <div class="col-md-12 ftco-animate text-center mb-5">
                    <p class="breadcrumbs mb-0"><span class="mr-3"><a href="{{
route('home') }}">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Register</span></p>
                    <h1 class="mb-3 bread">Register</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-10 mx-auto">

                    <x-frontend.form :file=true :action="route('register.employee.store')" value='Register' method='POST'>

                        <x-frontend.text-input value='' id='title' name='title' type='text' label='Title'
                            placeholder='Please Enter Your Title'></x-frontend.text-input>

                        <div class="row">
                            <div class="col">

                                <x-frontend.text-input value='' id='first_name' name='first_name' type='text' label='First Name'
                                    placeholder='Please Enter Your First Name'></x-frontend.text-input>
                            </div>
                            <div class="col">

                                <x-frontend.text-input value='' id='last_name' name='last_name' type='text' label='Last Name'
                                    placeholder='Please Enter Your Last Name'></x-frontend.text-input>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col">

                                <x-frontend.text-input value='' id='email' name='email' type='email' label='Email Address'
                                    placeholder='Please Enter Your Email'></x-frontend.text-input>
                            </div>

                            <div class="col">

                                <x-frontend.text-input value='' id='phone' name='phone' type='text' label='Phone Number'
                                    placeholder='Please Enter Your Phone'></x-frontend.text-input>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                <x-frontend.text-input value='' id='password' name='password' type='password'
                                    label='Enter your password'
                                    placeholder='Please Enter Your Password'></x-frontend.text-input>

                            </div>
                            <div class="col">

                                <x-frontend.text-input value='' id='password_confirmation' name='password_confirmation'
                                    type='password' label='Confirm Password'
                                    placeholder='Confirm Password'></x-frontend.text-input>
                            </div>
                        </div>

                        <x-frontend.text-input value='' id='birth_date' name='birth_date' type='date' label='Birth Date'
                            placeholder='Confirm Password'></x-frontend.text-input>

                        <div class="row">
                            <div class="col">

                                <x-frontend.file-input id='cv' name='cv_file' label='CV'></x-frontend.file-input>
                            </div>

                            <div class="col">

                                <x-frontend.file-input id='image' name='image' label='Image'></x-frontend.file-input>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">

                                <x-frontend.select-box name='gender' id='gender' label='Gender'>
                                    <option value="">-- Select Your Gender --</option>
                                    <option value="male" @selected(old('gender') == 'male')>Male</option>
                                    <option value="female" @selected(old('gender') == 'female')>Female</option>
                                </x-frontend.select-box>
                            </div>

                        </div>

                    </x-frontend.form>
                    <div class="co">

                        <a href="{{ route('register.company') }}" class="link-primary">Register as a Company</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
