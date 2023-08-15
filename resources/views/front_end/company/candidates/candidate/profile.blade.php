@extends('front_end.company.candidates.candidate.master')

@section('candiate-content')
    <h5>Profile</h5>
        <img src="{{ asset($employee->user::UPLOADED_IMAGE . $employee->user->image) }}" width="200"  class="card-img-top p-5" alt="Employee Image">
        <div class="card-body">
            <h5 class="card-title">Title : {{ $employee->title }}</h5>
            <p class="card-text"><i class="fas fa-user"></i> First Name: {{ $employee->user->first_name }}</p>
            <p class="card-text"><i class="fas fa-user"></i> Last Name: {{ $employee->user->last_name }}</p>
            <p class="card-text"><i class="fas fa-envelope"></i> Email: {{ $employee->user->email }}</p>
            <p class="card-text"><i class="fas fa-phone"></i> Phone: {{ $employee->user->phone }}</p>
            <p class="card-text"><i class="fas fa-venus-mars"></i> Gender: {{ $employee->gender}}</p>
            <p class="card-text"><i class="fas fa-birthday-cake"></i> Age: {{ $employee->age }}</p>
            <a href="{{ route('profile.jobs.candidate.download_cv', ['employee' => $employee, 'job' => $job]) }}" class="btn btn-primary"><i class="fas fa-download"></i> Download CV</a>
        </div>
@endsection
