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
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Companies</span></p>
                    <h1 class="mb-3 bread">Company Profile</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row ">
                <nav class="col-md-3 bg-light sidebar">
                    <div class="position-sticky">
                        <ul class="nav flex-column">

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('companies.show', $company) }}">
                                    <i class="fas fa-user"></i> Profile
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('companies.jobs', $company) }}">
                                    <i class="fas fa-list"></i> Show Jobs
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>


                <div class="col-md-9 mx-auto">

                    <div class="card card-info">

                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <div class="text-center mb-4">
                                        <img src="{{ asset($company->user::UPLOADED_IMAGE . $company->user->image) }}"
                                            width="400" height="400" alt="Company Logo" class="img-fluid">
                                    </div>
                                    <h1 class="text-center">{{ $company->name }}</h1>
                                    <p class="text-center">{{ $company->description }}</p>

                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h5>Contact Information</h5>
                                            <p><i class="fas fa-user"></i> <strong>First Name:</strong>
                                                {{ $company->user->first_name }}</p>
                                            <p><i class="fas fa-user"></i> <strong>Last Name:</strong>
                                                {{ $company->user->last_name }}</p>
                                            <p><i class="fas fa-envelope"></i> <strong>Email:</strong>
                                                {{ $company->user->email }}
                                            </p>
                                            <p><i class="fas fa-phone"></i> <strong>Phone:</strong>
                                                {{ $company->user->phone }}</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <h5>Company Details</h5>
                                            <p><i class="fas fa-calendar-alt"></i> <strong>Founded at:</strong>
                                                {{ $company->founded_at }}
                                            </p>
                                            <p><i class="fas fa-globe"></i> <strong>Website:</strong> <a
                                                    href="{{ $company->website }}"
                                                    target="_blank">{{ $company->website }}</a></p>
                                            <p><i class="fas fa-map-marker-alt"></i> <strong>Location:</strong>
                                                {{ $company->location->name }},
                                                {{ $company->location->city->name }},
                                                {{ $company->location->city->country->name }}</p>
                                            <p><i class="fas fa-users"></i> <strong>Company Size:</strong>
                                                {{ $company->company_size->name }}</p>
                                            <p><i class="fas fa-industry"></i> <strong>Industry:</strong>
                                                {{ $company->industry->name }}
                                            </p>



                                        </div>
                                    </div>
                                </div>
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
