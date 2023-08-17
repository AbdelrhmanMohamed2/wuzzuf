@extends('front_end.layouts.master')

@section('content')
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start">
                <div class="col-md-12 ftco-animate text-center mb-5">
                    <p class="breadcrumbs mb-0"><span class="mr-3"><a href="{{ route('home') }}">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Jobs</span></p>
                    <h1 class="mb-3 bread">Browse Jobs</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-12 tab-wrap">

                    <div class="tab-content p-4" id="v-pills-tabContent">

                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                            aria-labelledby="v-pills-nextgen-tab">
                            <form action="{{ route('jobs.index') }}" method="get" class="search-job">
                                <div class="row no-gutters">
                                    <div class="col-md mr-md-2">
                                        <div class="form-group">
                                            <div class="form-field">
                                                <div class="icon"><span class="icon-briefcase"></span>
                                                </div>
                                                <input type="text" name='search' class="form-control"
                                                    placeholder="eg. Garphic. Web Developer"
                                                    value='{{ request()->search }}'>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-field">
                                                <button type="submit" class="form-control btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 pr-lg-4">
                    <div class="row">

                        @forelse ($jobs as $job)
                            <div class="col-md-12 ftco-animate">
                                <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                                    <div class="one-third mb-4 mb-md-0">
                                        <div class="job-post-item-header align-items-center">
                                            <span class="subadge">{{ $job->job_type->name }}</span>
                                            <h2 class="mr-3 text-black"><a href="#">{{ $job->title }}</a>
                                            </h2>
                                        </div>
                                        <div class="job-post-item-body d-block d-md-flex">
                                            <div class="mr-3"><span class="icon-layers"></span> <a
                                                    href="#">{{ $job->company->name }}</a></div>
                                            <div><span class="icon-my_location"></span>
                                                <span>{{ $job->location->name }},
                                                    {{ $job->location->city->name }},
                                                    {{ $job->location->city->country->name }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                                        <a href="{{ route('jobs.show', $job) }}" class="btn btn-primary py-2">Show Job
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="row m-5">

                                <div class="alert alert-danger">
                                    No Job Found.
                                </div>
                            </div>
                        @endforelse


                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <div class="block-27">
                                {{ $jobs->links('pagination::custom-frontend-pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 sidebar">
                    {{-- @dump(request()->job_category) --}}
                    <form action="{{ route('jobs.index') }}" method="get">


                        <div class="sidebar-box bg-white p-4 ftco-animate">
                            <x-frontend.select-box name='job_category' id='job_category' label='Job Category'>
                                <option value="">-- Job Category --</option>
                                @foreach ($job_categories as $option)
                                    <option value="{{ $option->id }}" @selected($option->id == old('job_category') || $option->id == request()->job_category)>
                                        {{ $option->name }}</option>
                                @endforeach
                            </x-frontend.select-box>
                        </div>

                        <div class="sidebar-box bg-white p-4 ftco-animate">
                            <x-frontend.select-box name='job_type' id='job_type' label='Job Type'>
                                <option value="">-- Job Type --</option>
                                @foreach ($job_types as $option)
                                    <option value="{{ $option->id }}" @selected($option->id == old('job_type') || $option->id == request()->job_type)>
                                        {{ $option->name }}</option>
                                @endforeach
                            </x-frontend.select-box>
                        </div>

                        <div class="sidebar-box bg-white p-4 ftco-animate">
                            <x-frontend.select-box name='career_level' id='career_level' label='Career Level'>
                                <option value="">-- Career Level --</option>
                                @foreach ($career_levels as $option)
                                    <option value="{{ $option->id }}" @selected($option->id == old('career_level') || $option->id == request()->career_level)>
                                        {{ $option->name }}</option>
                                @endforeach
                            </x-frontend.select-box>
                        </div>

                        <div class="sidebar-box bg-white p-4 ftco-animate">
                            <x-frontend.text-input :value="request()->location" id='location' name='location' type='text'
                                label='Location' placeholder='Enter Location'></x-frontend.text-input>
                        </div>
                        <button class="btn btn-info col" type="submit">Filter</button>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
