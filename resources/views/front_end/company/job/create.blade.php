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



    <x-frontend.form :file=true :action="route('profile.jobs.store')" value='Add' method='POST'>

        <x-frontend.text-input value='' id='title' name='title' type='text' label='Job Title'
            placeholder='Please Enter Job Title'></x-frontend.text-input>
        <div class="row">
            <div class="col">
                <x-frontend.text-input value='' id='years_of_experience' name='years_of_experience' type='number'
                    label='Years of Experience' placeholder='Years of Experience needed'></x-frontend.text-input>

            </div>
            <div class="col">
                <x-frontend.text-input value='' id='opened_positions' name='opened_positions' type='number'
                    label='Opened Positions' placeholder='Avilable Positions number'></x-frontend.text-input>

            </div>
        </div>

        <div class="row">
            <div class="col">
                <x-frontend.text-area-input id='description' name='description' label='Job Description'
                    :value=null></x-frontend.text-area-input>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <x-frontend.text-area-input id='requirements' name='requirements' label='Job Requirements'
                    :value=null></x-frontend.text-area-input>
            </div>
        </div>



        <div class="row">

            <div class="col">
                <div class="row">

                    <div class="col">

                        <x-frontend.select-box name='country_id' id='country_id' label='Country'>
                            <option value="">-- Select Country --</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @selected($country->id == old('country_id'))>
                                    {{ $country->name }}</option>
                            @endforeach
                        </x-frontend.select-box>
                    </div>
                    <div class="col">

                        <x-frontend.select-box name='city_id' id='city_id' label='City'>
                            <option value="">-- Select City --</option>
                        </x-frontend.select-box>
                    </div>
                    <div class="col">

                        <x-frontend.select-box name='area_id' id='area_id' label='Area'>
                            <option value="">-- Select Area --</option>
                        </x-frontend.select-box>
                    </div>
                </div>

            </div>
        </div>

        <x-frontend.text-input value='' id='salary' name='salary' type='number' label='Salary'
            placeholder='Job salary'></x-frontend.text-input>

        <div class="row">
            <div class="col">

                <div class="input-group mb-3">
                    <input type="text" id="skillInput" class="form-control" placeholder="Enter a skill">
                    <div class="input-group-append">
                        <a class="btn btn-primary pt-2" id="addSkillBtn">Add Skill</a>
                    </div>
                </div>
                <ul id="skillList" class="list-group list-group-horizontal skills m-2 list">
                    <!-- skills added here -->
                    @if (old('skills'))
                        {{-- @dump(old('skills')) --}}
                        @foreach (json_decode(old('skills'), true) as $skill)
                            <li class="list-group-item">{{ $skill }} <i class="fa-solid fa-trash text-danger skill"
                                    id="{{ $skill }}"></i></li>
                        @endforeach
                    @endif
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
                        <a class="btn btn-primary pt-2" id="addLanguageBtn" type="button">Add Language</a>
                    </div>
                </div>
                <ul id="languageList" class="list-group list-group-horizontal languages m-2 list">
                    @if (old('languages'))
                        {{-- @dump(old('skills')) --}}
                        @foreach (json_decode(old('languages'), true) as $language)
                            <li class="list-group-item">{{ $language }} <i
                                    class="fa-solid fa-trash text-danger language" id="{{ $language }}"></i></li>
                        @endforeach
                    @endif
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
                                <option value="{{ $type->id }}" @selected($type->id == old('job_type_id'))>
                                    {{ $type->name }}</option>
                            @endforeach
                        </x-frontend.select-box>
                    </div>
                    <div class="col">

                        <x-frontend.select-box name='job_category_id' id='job_category_id' label='Job Category'>
                            <option value="">-- Select Job Category --</option>
                            @foreach ($job_categories as $category)
                                <option value="{{ $category->id }}" @selected($category->id == old('job_category_id'))>
                                    {{ $category->name }}</option>
                            @endforeach
                        </x-frontend.select-box>
                    </div>
                    <div class="col">

                        <x-frontend.select-box name='career_level_id' id='career_level_id' label='Career Level'>
                            <option value="">-- Select Career Level --</option>
                            @foreach ($career_levels as $level)
                                <option value="{{ $level->id }}" @selected($level->id == old('career_level_id'))>
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
