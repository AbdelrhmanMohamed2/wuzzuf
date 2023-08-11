@extends('front_end.profile.profile-master')

@section('page-title', 'Experience')


@section('profile-content')
    <div class="col-12">
        <a href="{{ route('profile.experiences.create') }}" class="btn btn-primary mb-3">Add Experience</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Job Type</th>
                    <th>Job Category</th>
                    <th>Title</th>
                    <th>Company</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($experiences as $experience)
                    <tr>
                        <td>{{ $experience->job_type->name }}</td>
                        <td>{{ $experience->job_category->name }}</td>
                        <td>{{ $experience->title }}</td>
                        <td>{{ $experience->company }}</td>
                        <td>{{ $experience->from }}</td>
                        <td>{{ $experience->to }}</td>
                        <td>{{ $experience->status ? 'still in that possition' : 'left it' }}</td>
                        <td>
                            <a href="{{ route('profile.experiences.edit', $experience) }}" class="btn btn-info">Edit</a>
                            <form action="{{ route('profile.experiences.destroy', $experience) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button text-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <p class="text-danger small">no experiences add yet.</p>
                @endforelse
            </tbody>
        </table>


    </div>
@endsection
