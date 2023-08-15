@extends('front_end.company.candidates.candidate.master')

@section('candiate-content')
    <h5>Skills</h5>
    <ul class="list-group ">
        @forelse ($employee->skills as $skill)
            <li class="list-group-item">{{ $skill->name }}</li>

        @empty
            <p class="text-danger small">No Skill Added Yet.</p>
        @endforelse

    </ul>
@endsection
