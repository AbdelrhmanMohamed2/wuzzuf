@extends('front_end.profile.profile-master')

@section('css')
@endsection


@section('page-title', 'Jobs')


@section('profile-content')


    <div class="row">
        @forelse ($employees as $employee)
            {{-- @dump($job) --}}
            <div class="col-md-12 ftco-animate">
                <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                    <div class="one-third mb-4 mb-md-0">
                        <div class="job-post-item-header align-items-center">
                            <span class="subadge">{{ $employee->title }}</span>
                            <h2 class="mr-3 text-black"><a href="#">{{ $employee->user->full_name }}</a></h2>

                        </div>
                        <div class="job-post-item-body d-block d-md-flex">
                            <div class="mr-3"><span class="icon-layers"></span> <a
                                    href="#">{{ $employee->user->email }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <span @class([
                            'badge',
                            'badge-info' => $employee->pivot->status == 'pending',
                            'badge-success' => $employee->pivot->status == 'accepted',
                            'badge-danger' => $employee->pivot->status == 'rejected',
                        ])>{{ $employee->pivot->status }}</span>
                    </div>
                    <div class="col">
                        <a href="{{ route('profile.jobs.candidate.profile', ['employee' => $employee, 'job' => $job]) }}"
                            class="btn btn-primary py-2 ">Profile</a>
                    </div>
                    @if ($employee->pivot->status == 'pending')
                        <div class="col">
                            <a href="{{ route('profile.jobs.candidates.accept', ['employee' => $employee, 'job' => $job]) }}"
                                class="btn btn-success py-2">Accept</a>
                        </div>


                        <div class=" col-3">
                            <a href="{{ route('profile.jobs.candidates.reject', ['employee' => $employee, 'job' => $job]) }}"
                                class="btn btn-danger py-2">Reject</a>
                        </div>
                    @endif

                    <div class="col">
                        {{-- <form action="{{ route('profile.jobs.destroy', $job) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger py-2" type="submit">Delete</button>
                        </form> --}}
                        {{-- <a href="{{ route('jobs.show', $job) }}" class="btn btn-danger py-2">Delete</a> --}}
                    </div>
                </div>
            </div>

        @empty
            <p class="m-5 text-danger small col-md-12 ftco-animate">No Candidates applaied Yet.</p>
        @endforelse
    </div>

@endsection

@section('scripts')
@endsection
