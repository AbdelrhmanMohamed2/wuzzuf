@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Companies')
@section('page_main_title', 'Companies')
@section('page_name', 'Companies')

@section('css')
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-header ">
            <h3 class="card-title">Add new Company</h3>
        </div>
        <x-form route='dashboard.companies.store' btn='Create' files=true>
            <div class="row">

                <x-form-input col=6 name='name' type='text' placeholder='Enter Company Name' label='Company Name'>
                </x-form-input>
                <x-form-input col=6 name='website' type='text' placeholder='Enter Company Website'
                    label='Company Website'>
                </x-form-input>
                <x-form-input col=6 name='founded_at' type='date' label='Founded at' placeholder='Company Founded at'>
                </x-form-input>


                <x-select-box col=6 label='Company Size' name='company_size_id'>
                    <option value="">-- Select Company Size --</option>
                    @foreach ($company_sizes as $option)
                        <option value="{{ $option['value'] }}" @selected($option['value'] == old('company_size_id'))>{{ $option['label'] }}</option>
                    @endforeach
                </x-select-box>

                <x-select-box col=6 label='Industry' name='industry_id'>
                    <option value="">-- Select Industry --</option>
                    @foreach ($industries as $option)
                        <option value="{{ $option['value'] }}" @selected($option['value'] == old('industry_id'))>{{ $option['label'] }}</option>
                    @endforeach
                </x-select-box>
                <div class="col-6">

                    <div class="row">

                        <div class="col">
                            <label>Country</label>
                            <select class="form-control" id="country_id" name="country_id" @class([
                                'form-control',
                                'is-invalid' => $errors->has('country_id'),
                                'is-valid' => !$errors->has('country_id') && old('country_id'),
                            ])>
                                <option value="">-- Select Country --</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->value }}">{{ $country->label }}</option>
                                @endforeach

                            </select>
                            @error('country_id')
                                <span id="country_id-error" class="error text-danger"
                                    style=" font-size:80%">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="col">
                            <label>City</label>
                            <select class="form-control" id="city_id" name="city_id" @class([
                                'form-control',
                                'is-invalid' => $errors->has('city_id'),
                                'is-valid' => !$errors->has('city_id') && old('city_id'),
                            ])>
                                <option value="">-- Select City --</option>

                            </select>
                            @error('city_id')
                                <span id="city_id-error" class="error text-danger"
                                    style=" font-size:80%">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label>Area</label>
                            <select class="form-control" id="area_id" name="area_id" @class([
                                'form-control',
                                'is-invalid' => $errors->has('area_id'),
                                'is-valid' => !$errors->has('area_id') && old('area_id'),
                            ])>
                                <option value="">-- Select Area --</option>

                            </select>
                            @error('area_id')
                                <span id="area_id-error" class="error text-danger"
                                    style=" font-size:80%">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>


                <x-form-input col=6 name='first_name' type='text' label='First Name' placeholder='Enter First Name'>
                </x-form-input>
                <x-form-input col=6 name='last_name' type='text' label='Last Name' placeholder='Enter Last Name'>
                </x-form-input>
                <x-form-input col=6 name='email' type='email' label='Email' placeholder='Enter Email'>
                </x-form-input>
                <x-form-input col=6 name='phone' type='text' label='Phone' placeholder='Enter Phone'>
                </x-form-input>
                <x-form-input col=6 name='password' type='password' label='Password' placeholder='Enter Password'>
                </x-form-input>
                <x-form-input col=6 name='password_confirmation' type='password' label='Confirm Password'
                    placeholder='Enter Confirm Password'></x-form-input>
                <x-file-input col=6 name='image' label='Image'></x-file-input>


                <x-text-area col=6 :value="old('description')" name='description' placeholder='Company Description' rows=3
                    label='Company Description'>
                </x-text-area>
            </div>
        </x-form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('front_end/custom/handle_location.js') }}"></script>

@endsection
