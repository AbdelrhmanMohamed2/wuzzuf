@extends('front_end.layouts.master')

@section('css')
@endsection


@section('content')
    <div class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('front_end') }}/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start">
                <div class="col-md-12 ftco-animate text-center mb-5">
                    <p class="breadcrumbs mb-0"><span class="mr-3"><a href="{{ route('home') }}">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Companies</span></p>
                    <h1 class="mb-3 bread">Company Jobs</h1>
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
                                        @foreach ($company->jobs as $job)
                                            {{-- @dump($job) --}}
                                            <div class="col-md-12 ftco-animate">
                                                <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                                                    <div class="one-third mb-4 mb-md-0">
                                                        <div class="job-post-item-header align-items-center">
                                                            <span class="subadge">{{ $job->job_type->name }}</span>
                                                            <h2 class="mr-3 text-black"><a
                                                                    href="#">{{ $job->title }}</a></h2>
                                                        </div>
                                                        <div class="job-post-item-body d-block d-md-flex">
                                                            <div class="mr-3"><span class="icon-layers"></span> <a
                                                                    href="#">{{ $company->name }}</a></div>
                                                            <div><span class="icon-my_location"></span>
                                                                <span>{{ $job->location->name }},
                                                                    {{ $job->location->city->name }},
                                                                    {{ $job->location->city->country->name }}</span></div>
                                                        </div>
                                                    </div>

                                                    <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                                                        <a href="{{ route('jobs.show', $job) }}"
                                                            class="btn btn-primary py-2">Show Job Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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
