@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Employees')
@section('page_main_title', 'Employees')
@section('page_name', 'Employees')

@section('css')
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-header ">
            <h3 class="card-title">Show Employee : {{ $employee->user->full_name }}</h3>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset($employee->user::UPLOADED_IMAGE . $employee->user->image) }}" width="650"
                        height="650" alt="Employee Image" class="img-fluid rounded-circle">
                </div>
                <div class="col-md-9">
                    <h1>{{ $employee->user->full_name }}</h1>
                    <div class="ml-5">

                        <h5><i class="fas fa-briefcase"></i> Title: {{ $employee->title }}</h5>
                        <p><i class="fas fa-envelope"></i> <strong>Email:</strong> {{ $employee->user->email }}</p>
                        <p><i class="fas fa-phone"></i> <strong>Phone:</strong> {{ $employee->user->phone }}</p>
                        <p><i class="fas fa-venus-mars"></i> <strong>Gender:</strong> {{ $employee->gender }}</p>
                        <p><i class="fas fa-birthday-cake"></i> <strong>Birthdate:</strong> {{ $employee->birth_date }}</p>
                        <p><i class="fas fa-calendar-alt"></i> <strong>Age:</strong> {{ $employee->age }}</p>
                        <p>
                            <i class="fas fa-file-download"></i>
                            <a href="{{ route('dashboard.employees.download-cv', $employee) }}" download
                                class="btn btn-primary">
                                Download CV
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
