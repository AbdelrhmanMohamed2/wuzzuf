@extends('front_end.profile.profile-master')

@section('page-title', 'Education')


@section('profile-content')
    <x-frontend.form :file=false :action="route('profile.education.update')" value='Add' method='PUT'>

        <x-frontend.text-input :value="$education->university->name ?? ''" id='university' name='university' type='text' label='University'
            placeholder='University'></x-frontend.text-input>

        <x-frontend.text-input :value="$education->field ?? ''" id='degree' name='field' type='text' label='Field'
            placeholder='Field'></x-frontend.text-input>
        <div class="row m-2">
            <div class="col-6">
                <x-select-box col=6 label='Degree' name='degree_id'>
                    <option>-- Select Your Degree --</option>
                    @foreach ($degrees as $degree)
                        <option @selected(old('degree_id') == $degree->id || ($education->degree_id ?? 0) == $degree->id) value="{{ $degree->id }}">{{ $degree->name }}</option>
                    @endforeach
                </x-select-box>

            </div>
            <div class="col-6">
                <x-select-box col=6 label='Grade' name='grade_id'>
                    <option>-- Select Your Grade --</option>
                    @foreach ($grades as $grade)
                        <option @selected(old('grade_id') == $grade->id || ($education->grade_id ?? 0) == $grade->id) value="{{ $grade->id }}">{{ $grade->name }}</option>
                    @endforeach
                </x-select-box>

            </div>
        </div>

    </x-frontend.form>
@endsection
