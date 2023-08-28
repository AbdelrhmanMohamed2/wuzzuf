@extends('front_end.profile.profile-master')

@section('css')
@endsection


@section('page-title', 'Jobs')


@section('profile-content')


    <div class="col">

        <h3>Send Email to Employee Name</h3>
        <form method="POST"
            action="{{ route('profile.jobs.candidates.accept.store', ['employee' => $employee, 'job' => $job]) }}">
            @csrf
            <div class="form-group col">
                <label for="emailTextarea">Email Content</label>
                <textarea class="form-control" id="emailTextarea" name="email" rows="6" placeholder="Write your email here"></textarea>
                @error('email')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i> Send
            </button>
        </form>
    </div>

@endsection

@section('scripts')
@endsection
