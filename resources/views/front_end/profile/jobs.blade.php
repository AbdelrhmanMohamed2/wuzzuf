@extends('front_end.profile.profile-master')

@section('page-title', 'Skills')


@section('profile-content')
    <div class="col-12">

        <ul class="list-group">
            @foreach ($jobs as $job)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ $job->title }}</h5>
                        <div>
                            <span  @class([
                                'badge',
                                'badge-info' => $job->pivot->status == 'pending',
                                'badge-success' => $job->pivot->status == 'accepted',
                                'badge-danger' => $job->pivot->status == 'rejected',
                            ])>{{ $job->pivot->status }}</span>
                            <a href="{{ route('jobs.show', $job) }}" class="btn btn-primary mr-2">Show</a>
                            <a href="{{ route('applications.cancel', $job) }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
