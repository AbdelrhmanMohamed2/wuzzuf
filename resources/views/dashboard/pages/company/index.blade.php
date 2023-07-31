@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Companies')
@section('page_main_title', 'Companies')
@section('page_name', 'Companies')

@section('css')
    @include('dashboard.layouts.search-input-style')
@endsection

@section('content')
    {{-- <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="companySize">Company Size:</label>
                <select class="form-control" id="companySize">
                    <option value="">All</option>
                    <option value="small">Small</option>
                    <option value="medium">Medium</option>
                    <option value="large">Large</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="industry">Industry:</label>
                <select class="form-control" id="industry">
                    <option value="">All</option>
                    <option value="it">IT</option>
                    <option value="finance">Finance</option>
                    <option value="healthcare">Healthcare</option>
                    <!-- Add more industry options here -->
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" class="form-control" id="location" placeholder="Enter location">
            </div>
        </div>

    </div> --}}

    @include('dashboard.pages.company.filter')

    @include('dashboard.layouts.search-input')

    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">All Companies</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <x-table :numberOfColumns="['#', 'name', 'actions']">
                @foreach ($companies as $company)
                    <tr>

                        <td>{{ $companies->firstItem() + $loop->index }}</td>
                        <td>{{ $company->name }}</td>
                        <td>
                            <a href="{{ route('dashboard.jobs.company_jobs', $company) }}" class="btn btn-info"><i
                                    class="fa-solid fa-briefcase"></i> Jobs</a>

                            <a href="{{ route('dashboard.companies.show', $company) }}" class="btn btn-info"><i
                                    class="fa-solid fa-eye"></i> Show Details</a>

                            <a href="{{ route('dashboard.companies.edit', $company) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <button class="btn btn-danger" form="delete-form-{{ $loop->index }}" type="submit"><i
                                    class="fa-solid fa-trash"></i> Delete</button>
                            <form action="{{ route('dashboard.companies.destroy', $company) }}" method="post"
                                id="delete-form-{{ $loop->index }}">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-table>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $companies->links('pagination::custom') }}
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function removeOldData() {
            table_body = document.getElementById('table-body');
            table_body.textContent = '';
        }

        function addNewData(company, token) {
            // console.log(company);
            var newRow = document.createElement("tr");
            var i = document.createElement("td");
            i.textContent = company.id;
            newRow.appendChild(i);

            var titleCell = document.createElement("td");
            titleCell.textContent = company.name;
            newRow.appendChild(titleCell);


            var action = document.createElement("td");
            action.innerHTML = `<a href="/dashboard/jobs/companies/${company.id}/jobs" class="btn btn-info"><i
                                    class="fa-solid fa-briefcase"></i> Jobs</a>
                                     <a href="/dashboard/companies/${company.id}" class="btn btn-info"><i
                                    class="fa-solid fa-eye"></i> Show Details</a>
                                    <a href="/dashboard/companies/${company.id}/edit" class="btn btn-primary"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    <button class="btn btn-danger" form="delete-form-${company.id}" type="submit"><i
                                    class="fa-solid fa-trash"></i> Delete</button>

                                    <form action="/dashboard/companies/${company.id}" method="post"
                                id="delete-form-${company.id}">

                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="${token}">
                            </form>

                                    `;
            newRow.appendChild(action);


            table_body = document.getElementById('table-body');
            table_body.appendChild(newRow);

        }
    </script>
    <script>
        filters = {};

        company_size = document.getElementById('company_size');
        industry = document.getElementById('industry');
        location_input = document.getElementById('location');

        company_size.addEventListener('change', function() {
            updateFilterValue('company_size', company_size.value);
            makeAjaxRequest();
        });

        industry.addEventListener('change', function() {
            updateFilterValue('industry', industry.value);
            makeAjaxRequest();
        });

        location_input.addEventListener('keyup', function() {
            updateFilterValue('location', location_input.value);
            makeAjaxRequest();
        });


        // Function to update filter values in the filters object
        function updateFilterValue(paramName, paramValue) {
            if (paramValue === "") {
                delete filters[paramName]; // If paramValue is empty, remove the parameter from the filters object
            } else {
                filters[paramName] = paramValue; // Otherwise, update the parameter value in the filters object
            }
        }

        // Function to convert the filters object to a query string
        function getQueryString() {
            var queryString = Object.keys(filters)
                .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(filters[key]))
                .join('&');
            return queryString;
        }

        // Function to make the AJAX request
        function makeAjaxRequest() {
            var xhr = new XMLHttpRequest();

            // Construct the URL with the query string
            var url = '{{ route('dashboard.search.companies.filter') }}';
            var queryString = getQueryString();
            if (queryString !== "") {
                url += '?' + queryString;
            }

            xhr.open('GET', url, true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Request was successful, handle the response
                        var responseData = JSON.parse(xhr.responseText);

                        removeOldData()
                        // console.log(responseData);
                        for (key in responseData.data) {
                            addNewData(responseData.data[key], responseData.message);
                            // console.log(removeOldData[key]);
                        }
                    } else {
                        // Request failed, handle the error
                        console.error("Error: " + xhr.status);
                    }
                }
            };

            xhr.send();
        }
    </script>
    @include('dashboard.layouts.xhr', [
        'route' => route('dashboard.search.companies'),
        'link' => '`/dashboard/companies/${response.data[key].id}`',
        'label' => '`${response.data[key].name}`',
    ])

@endsection
