@extends('front_end.profile.profile-master')

@section('page-title', 'Profile')

@section('profile-content')

    <div class="col-md-10 offset-md-1">
        <div class="text-center mb-4">
            <img src="{{ asset($user::UPLOADED_IMAGE . $user->image) }}" width="400" height="400" alt="Company Logo"
                class="img-fluid">
        </div>
        @company
            <h1 class="text-center">{{ $user->company->name }}</h1>
            <p class="text-center">{{ $user->company->description }}</p>
        @endcompany
        @employee
            <h1 class="text-center">{{ $user->employee->title }}</h1>
        @endemployee
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <h5>Contact Information</h5>
                <p><i class="fas fa-user"></i> <strong>First Name:</strong>
                    {{ $user->first_name }}</p>
                <p><i class="fas fa-user"></i> <strong>Last Name:</strong>
                    {{ $user->last_name }}</p>
                <p><i class="fas fa-envelope"></i> <strong>Email:</strong> {{ $user->email }}
                </p>
                <p><i class="fas fa-phone"></i> <strong>Phone:</strong> {{ $user->phone }}</p>
            </div>
            <div class="col-sm-6">
                @company
                    <h5>Company Details</h5>
                    <p><i class="fas fa-calendar-alt"></i> <strong>Founded at:</strong>
                        {{ $user->company->founded_at }}
                    </p>
                    <p><i class="fas fa-globe"></i> <strong>Website:</strong> <a href="{{ $user->company->website }}"
                            target="_blank">{{ $user->company->website }}</a></p>
                    <p><i class="fas fa-map-marker-alt"></i> <strong>Location:</strong>
                        {{ $user->company->location->name }},
                        {{ $user->company->location->city->name }},
                        {{ $user->company->location->city->country->name }}</p>
                    <p><i class="fas fa-users"></i> <strong>Company Size:</strong>
                        {{ $user->company->company_size->name }}</p>
                    <p><i class="fas fa-industry"></i> <strong>Industry:</strong>
                        {{ $user->company->industry->name }}
                    </p>
                @endcompany

                @employee
                    <h5>More Details</h5>

                    <p><i class="fas fa-venus-mars"></i> <strong>Gender:</strong>
                        {{ $user->employee->gender }}</p>
                    <p><i class="fas fa-birthday-cake"></i> <strong>Birthdate:</strong>
                        {{ $user->employee->birth_date }}</p>
                    <p><i class="fas fa-calendar-alt"></i> <strong>Age:</strong>
                        {{ $user->employee->age }}</p>
                    <p>
                        <i class="fas fa-file-download"></i>
                        <a href="{{ route('profile.download_cv') }}" download class="btn btn-primary">
                            Download CV
                        </a>
                    </p>
                @endemployee

            </div>
        </div>
    </div>

@endsection
