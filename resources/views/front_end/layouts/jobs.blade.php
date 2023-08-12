<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 pr-lg-5">
                <div class="row justify-content-center pb-3">
                    <div class="col-md-12 heading-section ftco-animate">
                        <span class="subheading">Recently Added Jobs</span>
                        <h2 class="mb-4">Recently Added Jobs</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach ($jobs as $job)
                        {{-- @dump($job) --}}
                        <div class="col-md-12 ftco-animate">
                            <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                                <div class="one-third mb-4 mb-md-0">
                                    <div class="job-post-item-header align-items-center">
                                        <span class="subadge">{{ $job->job_type->name }}</span>
                                        <h2 class="mr-3 text-black"><a href="#">{{ $job->title }}</a></h2>
                                    </div>
                                    <div class="job-post-item-body d-block d-md-flex">
                                        <div class="mr-3"><span class="icon-layers"></span> <a
                                                href="#">{{ $job->company->name }}</a></div>
                                        <div><span class="icon-my_location"></span> <span>{{ $job->location->name }},
                                                {{ $job->location->city->name }},
                                                {{ $job->location->city->country->name }}</span></div>
                                    </div>
                                </div>

                                <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                                    <a href="{{ route('jobs.show', $job) }}" class="btn btn-primary py-2">Show Job Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="col-lg-3 sidebar">
                <div class="row justify-content-center pb-3">
                    <div class="col-md-12 heading-section ftco-animate">
                        <h2 class="mb-4">Top Recruitments</h2>
                    </div>
                </div>
                @foreach ($companies as $company)
                    <div class="sidebar-box ftco-animate">
                        <div class="">
                            <a href="{{ route('companies.show', $company) }}" class="company-wrap"><img
                                    src="{{ asset($company->user::UPLOADED_IMAGE . $company->user->image) }}"
                                    class="img-fluid" alt="Colorlib Free Template"></a>
                            <div class="text p-3">
                                <h3><a href="{{ route('companies.show', $company) }}">{{ $company->name }}</a></h3>
                                <p><span class="number">{{ $company->jobs_count }}</span> <span>Jobs</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
</section>
