@extends('front_end.profile.profile-master')

@section('css')
    <style>
        .list {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }
    </style>
@endsection


@section('page-title', 'Jobs')


@section('profile-content')



    <x-frontend.form :file=true :action="route('profile.jobs.update', $job)" value='Update' method='PUT'>

        <x-frontend.text-input :value="$job->title" id='title' name='title' type='text' label='Job Title'
            placeholder='Please Enter Job Title'></x-frontend.text-input>
        <div class="row">
            <div class="col">
                <x-frontend.text-input :value="$job->years_of_experience" id='years_of_experience' name='years_of_experience' type='number'
                    label='Years of Experience' placeholder='Years of Experience needed'></x-frontend.text-input>

            </div>
            <div class="col">
                <x-frontend.text-input :value="$job->opened_positions" id='opened_positions' name='opened_positions' type='number'
                    label='Opened Positions' placeholder='Avilable Positions number'></x-frontend.text-input>

            </div>
        </div>

        <div class="row">
            <div class="col">
                <x-frontend.text-area-input id='description' name='description' label='Job Description'
                    :value="$job->description"></x-frontend.text-area-input>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <x-frontend.text-area-input id='requirements' name='requirements' label='Job Requirements'
                    :value="$job->requirements"></x-frontend.text-area-input>
            </div>
        </div>



        <div class="row">

            <div class="col">
                <div class="row">

                    <div class="col">
                        <x-frontend.select-box name='country_id' id='country_id' label='Country'>
                            <option value="">-- Select Country --</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @selected($country->id == old('country_id') || $country->id == $job->location->city->country->id)>
                                    {{ $country->name }}</option>
                            @endforeach
                        </x-frontend.select-box>
                    </div>
                    <div class="col">

                        <x-frontend.select-box name='city_id' id='city_id' label='City'>
                            <option value="">-- Select City --</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}" @selected($city->id == old('city_id') || $city->id == $job->location->city->id)>
                                    {{ $city->name }}</option>
                            @endforeach
                        </x-frontend.select-box>
                    </div>
                    <div class="col">

                        <x-frontend.select-box name='area_id' id='area_id' label='Area'>
                            <option value="">-- Select Area --</option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}" @selected($area->id == old('area_id') || $area->id == $job->location_id)>
                                    {{ $area->name }}</option>
                            @endforeach
                        </x-frontend.select-box>
                    </div>
                </div>

            </div>
        </div>

        <x-frontend.text-input :value="$job->salary" id='salary' name='salary' type='number' label='Salary'
            placeholder='Job salary'></x-frontend.text-input>

        <div class="row">
            <div class="col">

                <div class="input-group mb-3">
                    <input type="text" id="skillInput" class="form-control" placeholder="Enter a skill">
                    <div class="input-group-append">
                        <a class="btn btn-primary" id="addSkillBtn">Add Skill</a>
                    </div>
                </div>
                <ul id="skillList" class="list-group list-group-horizontal skills list">
                    @foreach ($job->skills as $skill)
                        <li class="list-group-item">{{ $skill->name }} <i class="fa-solid fa-trash text-danger skill"
                                id="{{ $skill->name }}"></i></li>
                    @endforeach
                </ul>
                @error('skills')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror

            </div>

        </div>
        <div class="row">
            <div class="col">


                <div class="input-group mb-3">
                    <input type="text" id="languageInput" class="form-control" placeholder="Enter a language">
                    <div class="input-group-append">
                        <a class="btn btn-primary" id="addLanguageBtn" type="button">Add Language</a>
                    </div>
                </div>
                <ul id="languageList" class="list-group list-group-horizontal languages list">
                    @foreach ($job->languages as $language)
                        <li class="list-group-item">{{ $language->name }} <i class="fa-solid fa-trash text-danger language"
                                id="{{ $language->name }}"></i></li>
                    @endforeach
                </ul>
                @error('languages')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row">


            <div class="col">
                <div class="row">

                    <div class="col">

                        <x-frontend.select-box name='job_type_id' id='job_type_id' label='Job Type'>
                            <option value="">-- Select Job Type --</option>
                            @foreach ($job_types as $type)
                                <option value="{{ $type->id }}" @selected($type->id == old('job_type_id') || $type->id == $job->job_type_id)>
                                    {{ $type->name }}</option>
                            @endforeach
                        </x-frontend.select-box>
                    </div>
                    <div class="col">

                        <x-frontend.select-box name='job_category_id' id='job_category_id' label='Job Category'>
                            <option value="">-- Select Job Category --</option>
                            @foreach ($job_categories as $category)
                                <option value="{{ $category->id }}" @selected($category->id == old('job_category_id') || $category->id == $job->job_category_id)>
                                    {{ $category->name }}</option>
                            @endforeach
                        </x-frontend.select-box>
                    </div>
                    <div class="col">

                        <x-frontend.select-box name='career_level_id' id='career_level_id' label='Career Level'>
                            <option value="">-- Select Career Level --</option>
                            @foreach ($career_levels as $level)
                                <option value="{{ $level->id }}" @selected($level->id == old('career_level_id') || $level->id == $job->career_level_id)>
                                    {{ $level->name }}</option>
                            @endforeach
                        </x-frontend.select-box>
                    </div>
                </div>

            </div>
        </div>



    </x-frontend.form>

@endsection

@section('scripts')
    <script src="{{ asset('front_end/custom/handle_location.js') }}"></script>
    <script src="{{ asset('front_end/custom/handel_list.js') }}"></script>
@endsection
