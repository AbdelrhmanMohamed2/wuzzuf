@extends('front_end.layouts.master')

@section('css')
@endsection


@section('content')
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start">
                <div class="col-md-12 ftco-animate text-center mb-5">
                    <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Register</span></p>
                    <h1 class="mb-3 bread">Register</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-10 mx-auto">

                    <x-frontend.form :file=true :action="route('register.company.store')" value='Register' method='POST'>

                        <div class="row">
                            <div class="col">
                                <x-frontend.text-input value='' id='name' name='name' type='text' label='Company Name'
                                    placeholder='Please Enter Your company Name'></x-frontend.text-input>
                            </div>
                            <div class="col">
                                <x-frontend.text-input value='' id='website' name='website' type='text' label='Company Website'
                                    placeholder='Please Enter Your Company Website'></x-frontend.text-input>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <x-frontend.file-input id='image' name='image' label='Image'></x-frontend.file-input>
                            </div>
                            <div class="col">
                                <x-frontend.select-box name='company_size_id' id='company_size' label='Company Size'>
                                    <option value="">-- Select Your Company Size --</option>
                                    @foreach ($company_sizes as $option)
                                        <option value="{{ $option->id }}" @selected($option->id == old('company_size_id'))>
                                            {{ $option->name }}</option>
                                    @endforeach
                                </x-frontend.select-box>
                            </div>
                            <div class="col">
                                <x-frontend.text-input value='' id='founded_at' name='founded_at' type='date' label='Founded At'
                                    placeholder='Founded At'></x-frontend.text-input>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <x-frontend.select-box name='industry_id' id='industry_id' label='Industry'>
                                    <option value="">-- Select Your Industry --</option>
                                    @foreach ($industries as $option)
                                        <option value="{{ $option->id }}" @selected($option->id == old('industry_id'))>
                                            {{ $option->name }}</option>
                                    @endforeach
                                </x-frontend.select-box>
                            </div>
                            <div class="col">
                                <div class="row">

                                    <div class="col">

                                        <x-frontend.select-box name='country_id' id='country_id' label='Country'>
                                            <option value="">-- Select Country --</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}" @selected($option->id == old('country_id'))>
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

                        <div class="row">
                            <div class="col">
                                <x-frontend.text-input value='' id='first_name' name='first_name' type='text' label='First Name'
                                    placeholder='Please Enter Your First Name'></x-frontend.text-input>
                            </div>
                            <div class="col">
                                <x-frontend.text-input value='' id='last_name' name='last_name' type='text' label='Last Name'
                                    placeholder='Please Enter Your Last Name'></x-frontend.text-input>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                <x-frontend.text-input value='' id='email' name='email' type='email' label='Email Address'
                                    placeholder='Please Enter Your Email'></x-frontend.text-input>
                            </div>

                            <div class="col">
                                <x-frontend.text-input value='' id='phone' name='phone' type='text' label='Phone Number'
                                    placeholder='Please Enter Your Phone'></x-frontend.text-input>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                <x-frontend.text-input value='' id='password' name='password' type='password'
                                    label='Enter your password'
                                    placeholder='Please Enter Your Password'></x-frontend.text-input>
                            </div>
                            <div class="col">
                                <x-frontend.text-input value='' id='password_confirmation' name='password_confirmation'
                                    type='password' label='Confirm Password'
                                    placeholder='Confirm Password'></x-frontend.text-input>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <x-frontend.text-area-input id='company_description' name='description'
                                    label='Company Description' :value=null></x-frontend.text-area-input>
                            </div>
                        </div>

                    </x-frontend.form>

                </div>
            </div>
        </div>
    </section>
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
