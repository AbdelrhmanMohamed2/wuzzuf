@extends('front_end.company.candidates.candidate.master')

@section('candiate-content')
    <h5>Education</h5>
    <div class="list-group list-group-flush">
        <div class="list-group-item">
            <h5 class="mb-1">University</h5>
            <p class="mb-0">{{ $employee->education->university->name}}</p>
        </div>
        <div class="list-group-item">
            <h5 class="mb-1">Field</h5>
            <p class="mb-0">{{ $employee->education->field}}</p>
        </div>
        <div class="list-group-item">
            <h5 class="mb-1">Degree</h5>
            <p class="mb-0">{{ $employee->education->degree->name}}</p>
        </div>
        <div class="list-group-item">
            <h5 class="mb-1">Grade</h5>
            <p class="mb-0">{{ $employee->education->grade->name}}</p>
        </div>


    </div>
@endsection
