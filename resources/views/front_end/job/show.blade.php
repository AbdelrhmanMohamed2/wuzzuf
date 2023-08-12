@extends('front_end.layouts.master')

@section('css')
@endsection


@section('content')
    {{-- @dump($job) --}}
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start">
                <div class="col-md-12 ftco-animate text-center mb-5">
                    <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Jobs</span></p>
                    <h1 class="mb-3 bread">{{ $job->title }}</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row ">

                <div class="col-md-9 mx-auto">
                    <div class="job_details_area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="job_details_header">
                                        <div class="single_jobs white-bg d-flex justify-content-between">
                                            <div class="jobs_left d-flex align-items-center">
                                                <div class="thumb">
                                                    <img src="{{ asset($job->company->user::UPLOADED_IMAGE . $job->company->user->image) }}"
                                                        alt="">
                                                </div>
                                                <div class="jobs_conetent">
                                                    <a href="{{ route('companies.show', $job->company) }}">
                                                        <h4>{{ $job->company->name }}</h4>
                                                    </a>
                                                    <div class="links_locat d-flex align-items-center">
                                                        <div class="location">
                                                            <p> <i class="fa fa-map-marker"></i>
                                                                {{ $job->company->location->name }},
                                                                {{ $job->company->location->city->name }},
                                                                {{ $job->company->location->city->country->name }}</p>
                                                        </div>
                                                        <div class="location">
                                                            <p> <i class="fa fa-clock-o"></i> {{ $job->job_type->name }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jobs_right">
                                                <div class="apply_now">
                                                    <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="descript_wrap white-bg">
                                        <div class="single_wrap">
                                            <h4>Job description</h4>
                                            <p>{{ $job->description }}</p>
                                        </div>
                                        <div class="single_wrap">
                                            <h4>Requirements</h4>
                                            <p>{{ $job->requirements }}</p>
                                        </div>
                                        <div class="single_wrap">
                                            <h4>Skills</h4>
                                            <ul>
                                                @foreach ($job->skills as $skill)
                                                    <li>{{ $skill->name }}</li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="single_wrap">
                                            <h4>Languages</h4>
                                            <ul>
                                                @foreach ($job->languages as $language)
                                                    <li>{{ $language->name }}</li>
                                                @endforeach
                                            </ul>
                                        </div>


                                    </div>
                                    @employee
                                        <div class="apply_job_form white-bg">
                                            <h4>Apply for the job</h4>
                                            @if ($applied_before)
                                                <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                                                    <a href="{{ route('applications.cancel', $job) }}"
                                                        class="btn btn-danger py-2">Cancel</a>
                                                </div>
                                            @else
                                                <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                                                    <a href="{{ route('applications.apply', $job) }}"
                                                        class="btn btn-primary py-2">Apply Now</a>
                                                </div>
                                            @endif

                                        </div>
                                    @endemployee
                                </div>
                                <div class="col-lg-4">
                                    <div class="job_sumary">
                                        <div class="summery_header">
                                            <h3>Job Summery</h3>
                                        </div>
                                        <div class="job_content">
                                            <ul>
                                                <li>Published: <span>{{ $job->created_at->diffForHumans() }}</span></li>
                                                <li>Job Category: <span> {{ $job->job_category->name }}</span></li>
                                                <li>Vacancy: <span>{{ $job->opened_positions }} Position</span></li>
                                                <li>Salary: <span>{{ $job->salary }} k/y</span></li>
                                                <li>Location: <span>{{ $job->location->name }},
                                                        {{ $job->location->city->name }},
                                                        {{ $job->location->city->country->name }}</span></li>
                                                <li>Job Nature: <span> {{ $job->job_type->name }}</span></li>
                                                <li>Career Level: <span> {{ $job->career_level->name }}</span></li>
                                                <li>Years of experience: <span> {{ $job->years_of_experience }} Year</span>
                                                </li>
                                            </ul>
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
