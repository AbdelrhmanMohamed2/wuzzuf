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
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Profile</span></p>
                    <h1 class="mb-3 bread">Job Candidate</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row ">
                @include('front_end.layouts.sidebar')

                <div class="col-md-6 mx-auto">

                    <div class="card card-info">
                        <div class="card-body">
                            <h4 class="card-title">
                                {{-- @dd($employee) --}}
                                {{ $employee->user->full_name}}
                            </h4>
                            <div class="row">
                                <div class="col-md-12">
                                    @yield('candiate-content')
                                </div>
                            </div>

                        </div>
                    </div>

                </div>


                <nav class="col-md-3 bg-light sidebar">
                    <div class="position-sticky">
                        <ul class="nav flex-column">

                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('profile.jobs.candidate.profile', ['employee' => $employee, 'job' => $job]) }}">
                                    <i class="fas fa-user"></i> Profile
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('profile.jobs.candidate.skills', ['employee' => $employee, 'job' => $job]) }}">
                                    <i class="fas fa-code"></i> Skills
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('profile.jobs.candidate.education', ['employee' => $employee, 'job' => $job]) }}">
                                    <i class="fas fa-graduation-cap"></i> Education
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('profile.jobs.candidate.languages', ['employee' => $employee, 'job' => $job]) }}">
                                    <i class="fas fa-language"></i> Languages
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('profile.jobs.candidate.experiences', ['employee' => $employee, 'job' => $job]) }}">
                                    <i class="fas fa-briefcase"></i> Work Experience
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

            </div>

        </div>
    </section>
@endsection

@section('scripts')
@endsection
