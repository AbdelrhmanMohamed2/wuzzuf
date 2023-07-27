@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Employees')
@section('page_main_title', 'Employees')
@section('page_name', 'Employees')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">All Employees</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 ">
                  <!-- Job Title -->
                  <h1 class="mb-4">{{ $job->title }}</h1>

                  <!-- Job Description -->
                  <h4>Description:</h4>
                  <p>{{ $job->description }}</p>

                  <!-- Job Requirements -->
                  <h4>Requirements:</h4>
                  <p>{{ $job->requirements }}</p>

                  <!-- Other Job Details -->
                  <h4>Details:</h4>
                  <p><i class="fas fa-user"></i> <strong>Opened Positions:</strong> {{ $job->opened_positions}}</p>
                  <p><i class="fas fa-clock"></i> <strong>Years of Experience:</strong> {{ $job->years_of_experience }} years</p>
                  <p><i class="fas fa-money-bill-alt"></i> <strong>Salary:</strong> ${{ $job->salary }} per month</p>
                  <p><i class="fas fa-tags"></i> <strong>Job Category:</strong> {{ $job->job_category->name }}</p>
                  <p><i class="fas fa-briefcase"></i> <strong>Job Type:</strong> {{ $job->job_type->name }}</p>
                  <p><i class="fas fa-level-up-alt"></i> <strong>Career Level:</strong> {{ $job->career_level->name }}</p>
                  <p><i class="fas fa-map-marker-alt"></i> <strong>Location:</strong> {{ $company->location->name }}, {{ $company->location->city->name }},
                    {{ $company->location->city->country->name }}</p>
                  <p><i class="fas fa-building"></i> <strong>Company:</strong> {{ $company->name }}</p>
                </div>
              </div>
        </div>

    </div>
@endsection

@section('scripts')
@endsection
