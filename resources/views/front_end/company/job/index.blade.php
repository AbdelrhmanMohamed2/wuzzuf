@extends('front_end.profile.profile-master')

@section('css')
@endsection


@section('page-title', 'Jobs')


@section('profile-content')


    <div class="row">
        @forelse ($jobs as $job)
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
                                    href="#">{{ $job->company->name }}</a>
                            </div>
                            <div><span class="icon-my_location"></span>
                                <span>{{ $job->location->name }},
                                    {{ $job->location->city->name }},
                                    {{ $job->location->city->country->name }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <a href="{{ route('profile.jobs.candidates.index', $job) }}" class="btn btn-warning py-2">Candidates</a>
                    </div>

                    <div class="col">
                        <a href="{{ route('profile.jobs.edit', $job) }}" class="btn btn-info py-2">Edit</a>
                    </div>


                    <div class=" col-3">
                        <a href="{{ route('jobs.show', $job) }}" class="btn btn-primary py-2 ">Show Job Details</a>
                    </div>


                    <div class="col">
                        <form action="{{ route('profile.jobs.destroy', $job) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger py-2" type="submit">Delete</button>
                        </form>
                        {{-- <a href="{{ route('jobs.show', $job) }}" class="btn btn-danger py-2">Delete</a> --}}
                    </div>
                </div>
            </div>

        @empty
            <p class="m-5 text-danger small col-md-12 ftco-animate">No Job Posted Yet.</p>
        @endforelse
    </div>

@endsection

@section('scripts')
@endsection
