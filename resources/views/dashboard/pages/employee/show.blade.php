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
            <!-- Education Row -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <!-- University Information -->
                    <h3><i class="fas fa-graduation-cap"></i> Education</h3>
                    @if ($employee->education)
                        <ul>
                            <li><i class="fas fa-certificate"></i> Degree: {{ $employee->education->degree->name }}</li>
                            <li><i class="fas fa-university"></i> In: {{ $employee->education->university->name }}</li>
                            <li><i class="fas fa-star"></i> Grade: {{ $employee->education->grade->name }}</li>
                            <li><i class="fas fa-book"></i> Field of Study: {{ $employee->education->field }}</li>
                        </ul>
                    @else
                        <p class="text-danger">No Education Added Yet </p>
                    @endif
                </div>
                <div class="col-md-6">
                    <!-- Skills and Languages -->
                    <h3><i class="fas fa-tasks"></i> Skills</h3>
                    <ul>
                        @forelse($employee->skills as $skill)
                            <li><i class="fas fa-check"></i> {{ $skill->name }}</li>
                        @empty
                            <p class="text-danger">No Skills Added Yet </p>
                        @endforelse

                        {{-- @foreach ($employee->skills as $skill)
                        @endforeach --}}
                    </ul>

                    <h3><i class="fas fa-language"></i> Languages</h3>
                    <ul>
                        @forelse ($employee->languages as $language)
                            <li><i class="fas fa-globe"></i> {{ $language->name }}</li>
                        @empty
                            <p class="text-danger">No Languages Added Yet </p>
                        @endforelse
                    </ul>
                </div>
            </div>
            <!-- Experiences Row -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <h3><i class="fas fa-briefcase"></i> Work Experiences</h3>
                    <x-table :numberOfColumns="['#', 'Job Type', 'Job Category', 'Title', 'Company', 'From', 'To', 'Status']">
                        @forelse ($employee->experiences as $experience)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $experience->job_type->name }}</td>
                                <td>{{ $experience->job_category->name }}</td>
                                <td>{{ $experience->title }}</td>
                                <td>{{ $experience->company }}</td>
                                <td>{{ $experience->from }}</td>
                                <td>{{ $experience->to }}</td>
                                <td>{{ $experience->status ? 'still in that possition' : 'left it' }}</td>
                            </tr>
                        @empty
                            <p class="text-danger">No Experiences Added Yet </p>
                        @endforelse
                    </x-table>

                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
@endsection
