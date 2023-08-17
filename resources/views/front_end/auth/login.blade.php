@extends('front_end.layouts.master')

@section('css')
@endsection


@section('content')
    <div class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('front_end') }}/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start">
                <div class="col-md-12 ftco-animate text-center mb-5">
                    <p class="breadcrumbs mb-0"><span class="mr-3"><a href="{{
route('home') }}">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Login</span></p>
                    <h1 class="mb-3 bread">Login</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-10 mx-auto">

                    <x-frontend.form :action="route('login')" value='Login' method='POST' :file=false>
                        <x-frontend.text-input value='' id='email' name='email' type='email' label='Email Address'
                            placeholder='Please Enter Your Email'></x-frontend.text-input>
                        <x-frontend.text-input value='' id='password' name='password' type='password' label='Password'
                            placeholder='Please Enter Your Password'></x-frontend.text-input>
                    </x-frontend.form>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
