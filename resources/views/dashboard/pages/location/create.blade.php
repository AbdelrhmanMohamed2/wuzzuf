@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Locations')
@section('page_main_title', 'Locations')
@section('page_name', 'Locations')

@section('css')
@endsection

@section('content')

    <div class="card card-lightblue">
        <div class="card-header ">
            @if (Route::currentRouteName() === 'dashboard.locations.create.city')
                <h3 class="card-title">Create City : </h3>
                @php
                    $route = 'dashboard.locations.store.city';
                @endphp
            @elseif(Route::currentRouteName() === 'dashboard.locations.create.area')
                <h3 class="card-title">Create Area : </h3>
                @php
                    $route = 'dashboard.locations.store.area';
                @endphp
            @else
                <h3 class="card-title">Create Country : </h3>
                @php
                    $route = 'dashboard.locations.store.country';
                @endphp
            @endif
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <x-form btn='Create' :route="$route">
                @if (Route::currentRouteName() === 'dashboard.locations.create.city' ||
                        Route::currentRouteName() === 'dashboard.locations.create.area')
                    <x-select-box col=6 label='Country' name='parent_id'>
                        <option value="">-- Select Country --</option>
                    </x-select-box>
                @endif
                @if (Route::currentRouteName() === 'dashboard.locations.create.area')
                    <x-select-box col=6 label='Country' name='city_id'>
                        <option value="">-- Select city --</option>
                    </x-select-box>
                @endif

                <x-form-input name='name' placeholder='Enter Location name' type='text' label='Name'></x-form-input>
            </x-form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        </div>
    </div>
@endsection

@section('scripts')
    @if (Route::currentRouteName() === 'dashboard.locations.create.city' ||
            Route::currentRouteName() === 'dashboard.locations.create.area')
        <script>
            country = document.getElementById('parent_id');
            xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        for (const key in response.data) {
                            const option = document.createElement('option');
                            option.value = response.data[key].id;
                            option.text = response.data[key].name;
                            country.add(option);
                        }

                    } else {
                        console.error('Error fetching search results');
                    }
                }
            };
            xhr.open('GET', `{{ route('dashboard.locations.countries') }}`);
            xhr.send();
        </script>
    @endif

    @if (Route::currentRouteName() === 'dashboard.locations.create.area')
        <script>
            country.addEventListener('change', function() {

                city_id = document.getElementById('city_id');
                xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            const response = JSON.parse(xhr.responseText);
                            for (const key in response.data) {
                                const option = document.createElement('option');
                                option.value = response.data[key].id;
                                option.text = response.data[key].name;
                                city_id.add(option);
                            }

                        } else {
                            console.error('Error fetching search results');
                        }
                    }
                };
                xhr.open('GET', `/dashboard/locations/${country.value}/cities`);
                xhr.send();
            })
        </script>
    @endif
@endsection
