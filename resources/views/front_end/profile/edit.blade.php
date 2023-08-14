@extends('front_end.profile.profile-master')

@section('page-title', 'Edit Profile')


@section('profile-content')

    @php
        $route = '';
        if (
            auth()
                ->user()
                ->IsEmployee()
        ) {
            $route = route('profile.update');
        } elseif (
            auth()
                ->user()
                ->IsCompany()
        ) {
            $route = route('profile.company.update');
        }

    @endphp
    <x-frontend.form :file=true :action="$route" value='Update' method='PUT'>

        @employee
            <x-frontend.text-input :value="$user->employee->title" id='title' name='title' type='text' label='Title'
                placeholder='Please Enter Your Title'></x-frontend.text-input>
        @endemployee

        @company
            <div class="row">
                <div class="col">

                    <x-frontend.text-input :value="$user->company->name" id='name' name='name' type='text' label='Name'
                        placeholder='Please Enter Your Comapny Name'></x-frontend.text-input>
                </div>

                <div class="col">

                    <x-frontend.text-input :value="$user->company->website" id='website' name='website' type='text' label='Website'
                        placeholder='Please Enter Your Company Website'></x-frontend.text-input>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <x-frontend.text-area-input :value="$user->company->description" id='company_description' name='description'
                        label='Company Description'></x-frontend.text-area-input>
                </div>
            </div>
            <div class="row">

                <div class="col">
                    <x-frontend.select-box name='country_id' id='country_id' label='Country'>
                        <option value="">-- Select Country --</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" @selected($country->id == old('country_id') || $country->id == $user->company->location->city->country->id)>
                                {{ $country->name }}</option>
                        @endforeach
                    </x-frontend.select-box>
                </div>
                <div class="col">

                    <x-frontend.select-box name='city_id' id='city_id' label='City'>
                        <option value="">-- Select City --</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}" @selected($city->id == old('city_id') || $city->id == $user->company->location->city->id)>
                                {{ $city->name }}</option>
                        @endforeach
                    </x-frontend.select-box>
                </div>
                <div class="col">

                    <x-frontend.select-box name='area_id' id='area_id' label='Area'>
                        <option value="">-- Select Area --</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}" @selected($area->id == old('area_id') || $area->id == $user->company->area_id)>
                                {{ $area->name }}</option>
                        @endforeach
                    </x-frontend.select-box>
                </div>
            </div>
        @endcompany

        <div class="row">
            <div class="col">

                <x-frontend.text-input :value="$user->email" id='email' name='email' type='email' label='Email Address'
                    placeholder='Please Enter Your Email'></x-frontend.text-input>
            </div>

            <div class="col">

                <x-frontend.text-input :value="$user->phone" id='phone' name='phone' type='text' label='Phone Number'
                    placeholder='Please Enter Your Phone'></x-frontend.text-input>

            </div>
        </div>


        <div class="row">
            <div class="col">
                <x-frontend.text-input value='' id='password' name='password' type='password'
                    label='Enter your password' placeholder='Please Enter Your Password'></x-frontend.text-input>

            </div>
            <div class="col">

                <x-frontend.text-input value='' id='password_confirmation' name='password_confirmation'
                    type='password' label='Confirm Password' placeholder='Confirm Password'></x-frontend.text-input>
            </div>
        </div>

        <div class="row">
            @employee
                <div class="col">
                    <x-frontend.file-input id='cv' name='cv_file' label='CV'></x-frontend.file-input>
                </div>
            @endemployee

            @company
                <div class="col">
                    <x-frontend.select-box name='company_size_id' id='company_size' label='Company Size'>
                        <option value="">-- Select Your Company Size --</option>
                        @foreach ($company_sizes as $option)
                            <option value="{{ $option->id }}" @selected($option->id == old('company_size_id') || $option->id == $user->company->company_size_id)>
                                {{ $option->name }}</option>
                        @endforeach
                    </x-frontend.select-box>
                </div>
            @endcompany

            <div class="col">

                <x-frontend.file-input id='image' name='image' label='Image'></x-frontend.file-input>
            </div>
        </div>

    </x-frontend.form>

@endsection


@section('scripts')
    <script>
        country_input = document.getElementById('country_id');
        city_input = document.getElementById('city_id');
        country_input.addEventListener('change', function() {
            xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    data = JSON.parse(xhr.responseText);
                    city_input.innerHTML = '';
                    data.data.forEach(city => {
                        opt = document.createElement('option');
                        opt.value = city.id;
                        opt.innerHTML = city.name;
                        city_input.appendChild(opt);
                    });
                }
            };
            xhr.open("GET", `http://127.0.0.1:8000/dashboard/locations/${country_input.value}/cities`);
            xhr.send();
        })
    </script>

    <script>
        area_input = document.getElementById('area_id');
        city_input.addEventListener('change', function() {
            xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    data = JSON.parse(xhr.responseText);
                    area_input.innerHTML = '';
                    data.data.forEach(city => {
                        opt = document.createElement('option');
                        opt.value = city.id;
                        opt.innerHTML = city.name;
                        area_input.appendChild(opt);
                    });
                }
            };
            xhr.open("GET", `http://127.0.0.1:8000/dashboard/locations/${city_input.value}/areas`);
            xhr.send();
        })
    </script>
@endsection
