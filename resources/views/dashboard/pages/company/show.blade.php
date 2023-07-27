@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Companies')
@section('page_main_title', 'Companies')
@section('page_name', 'Companies')

@section('css')
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-header ">
            <h3 class="card-title">Show Company : {{ $company->user->full_name }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="text-center mb-4">
                        <img src="{{ asset($company->user::UPLOADED_IMAGE . $company->user->image) }}" width="400"
                            height="400" alt="Company Logo" class="img-fluid">
                    </div>
                    <h1 class="text-center">{{ $company->name }}</h1>
                    <p class="text-center">{{ $company->description }}</p>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <h5>Contact Information</h5>
                            <p><i class="fas fa-user"></i> <strong>First Name:</strong> {{ $company->user->first_name }}</p>
                            <p><i class="fas fa-user"></i> <strong>Last Name:</strong> {{ $company->user->last_name }}</p>
                            <p><i class="fas fa-envelope"></i> <strong>Email:</strong> {{ $company->user->email }}</p>
                            <p><i class="fas fa-phone"></i> <strong>Phone:</strong> {{ $company->user->phone }}</p>
                        </div>
                        <div class="col-sm-6">
                            <h5>Company Details</h5>
                            <p><i class="fas fa-calendar-alt"></i> <strong>Founded at:</strong> {{ $company->founded_at }}
                            </p>
                            <p><i class="fas fa-globe"></i> <strong>Website:</strong> <a href="{{ $company->website }}"
                                    target="_blank">{{ $company->website }}</a></p>
                            <p><i class="fas fa-map-marker-alt"></i> <strong>Location:</strong>
                                {{ $company->location->name }}, {{ $company->location->city->name }},
                                {{ $company->location->city->country->name }}</p>
                            <p><i class="fas fa-users"></i> <strong>Company Size:</strong>
                                {{ $company->company_size->name }}</p>
                            <p><i class="fas fa-industry"></i> <strong>Industry:</strong> {{ $company->industry->name }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row mt-4">
                <div class="col-3">
                    <h5>Roles In Company : </h5>
                    <x-table :numberOfColumns="['#', 'Role Name']">
                        @foreach ($company->company_roles as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                        </tr>
                        @endforeach
                    </x-table>
                </div>
                <div class="col-9">
                    <h5>Company Jobs : </h5>
                    <x-table :numberOfColumns="[
                        '#',
                        'title',
                        'description',
                        'opened_positions',
                        'years_of_experience',

                        'job_type_id',

                    ]" ></x-table>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

@section('scripts')
@endsection
