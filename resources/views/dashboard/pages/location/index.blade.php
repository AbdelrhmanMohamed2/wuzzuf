@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Locations')
@section('page_main_title', 'Locations')
@section('page_name', 'Locations')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css"
        integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">All Locations : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="accordion accordion-flush" id="countries">

                @foreach ($locations as $location)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-{{ $location->name }}" aria-expanded="false"
                                aria-controls="flush-{{ $location->name }}">
                                {{ $location->name }}
                            </button>
                        </h2>
                        <div id="flush-{{ $location->name }}" class="accordion-collapse collapse"
                            data-bs-parent="#countries">
                            <div class="accordion-body">
                                <div class="accordion accordion-flush" id="cities">
                                    @foreach ($location->cities as $city)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-{{ $city->name }}"
                                                    aria-expanded="false" aria-controls="flush-{{ $city->name }}">
                                                    {{ $city->name }}
                                                </button>
                                            </h2>
                                            <div id="flush-{{ $city->name }}" class="accordion-collapse collapse"
                                                data-bs-parent="#cities">
                                                <div class="accordion-body">
                                                    <ul class="list-group">
                                                        @foreach ($city->areas as $area)
                                                            <li class="list-group-item">{{ $area->name }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $locations->links('pagination::custom') }}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js"
        integrity="sha512-ToL6UYWePxjhDQKNioSi4AyJ5KkRxY+F1+Fi7Jgh0Hp5Kk2/s8FD7zusJDdonfe5B00Qw+B8taXxF6CFLnqNCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
