@extends('front_end.layouts.master')

@section('css')
@endsection


@section('content')
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start">
                <div class="col-md-12 ftco-animate text-center mb-5">
                    <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Profile</span></p>
                    <h1 class="mb-3 bread">@yield('page-title')</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row ">
                @include('front_end.layouts.sidebar')

                <div class="col-md-9 mx-auto">

                    <div class="card card-info">
                        <div class="card-header ">
                            <h3 class="card-title">{{ $user->full_name }}</h3>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                @yield('profile-content')
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
