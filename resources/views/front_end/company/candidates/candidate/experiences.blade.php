@extends('front_end.company.candidates.candidate.master')

@section('candiate-content')
    <h5>Experiences</h5>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Company</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employee->experiences as $experince)
            <tr>
                <td>{{ $experince->title }}</td>
                <td>{{ $experince->company }}</td>
                <td>{{ $experince->from }}</td>
                <td>{{ $experince->to }}</td>
            </tr>

            @empty
                <p class="text-danger small">No Experince Added Yet.</p>
            @endforelse
            <!-- Add more rows as needed -->
        </tbody>
    </table>
@endsection
