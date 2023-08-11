@extends('front_end.profile.profile-master')

@section('page-title', 'Add Experience')


@section('profile-content')
    <div class="col-12">

        <x-frontend.form :file=false :action="route('profile.experiences.store')" value='Add' method='POST'>

            <div class="row">
                <div class="col">
                    <x-frontend.text-input value='' id='title' name='title' type='text' label='Title'
                        placeholder='Please Enter Your Title'></x-frontend.text-input>
                </div>
                <div class="col">
                    <x-frontend.text-input value='' id='company' name='company' type='text' label='Company'
                        placeholder='Please Enter Company Name'></x-frontend.text-input>
                </div>
            </div>

            <div class="row">
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
                    <x-frontend.select-box name='job_type_id' id='job_type_id' label='Job Type'>
                        <option value="">-- Select Job Type --</option>
                        @foreach ($job_types as $type)
                            <option value="{{ $type->id }}" @selected($type->id == old('job_type_id'))>
                                {{ $type->name }}</option>
                        @endforeach
                    </x-frontend.select-box>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <x-frontend.text-input value='' id='from' name='from' type='date' label='From'
                        placeholder='From'></x-frontend.text-input>
                </div>
                <div class="col">
                    <x-frontend.text-input value='' id='to' name='to' type='date' label='To'
                        placeholder='To'></x-frontend.text-input>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="row form-group">


                        <div class="col-md-12 mb-3 mb-md-0">
                            <label for="option-job-type-1">
                                <input type="checkbox" id="option-job-type-1" value="1" name="status"> Still in This
                                Posision
                            </label>
                        </div>
                    </div>

                </div>
            </div>


        </x-frontend.form>

    </div>
@endsection
