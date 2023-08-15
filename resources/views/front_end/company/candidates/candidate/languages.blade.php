@extends('front_end.company.candidates.candidate.master')

@section('candiate-content')
    <h5>Languages</h5>
    <ul class="list-group ">
        @forelse ($employee->languages as $language)
            <li class="list-group-item">{{ $language->name }}</li>

        @empty
            <p class="text-danger small">No Language Added Yet.</p>
        @endforelse

    </ul>
@endsection
