@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Employees')
@section('page_main_title', 'Employees')
@section('page_name', 'Employees')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

@endsection

@section('content')
    @include('dashboard.pages.employee.filter')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">All Employees</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <x-table :numberOfColumns="['#', 'First Name', 'Last Name', 'Email', 'Phone', 'Actions']">
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employees->firstItem() + $loop->index }}</td>
                        <td>{{ $employee->user->first_name }}</td>
                        <td>{{ $employee->user->last_name }}</td>
                        <td>{{ $employee->user->email }}</td>
                        <td>{{ $employee->user->phone }}</td>
                        <td>
                            <a href="{{ route('dashboard.employees.show', $employee) }}" class="btn btn-info"><i
                                    class="fa-solid fa-eye"></i> Show</a>

                            <a href="{{ route('dashboard.employees.edit', $employee) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <button class="btn btn-danger" form="delete-form-{{ $loop->index }}" type="submit"><i
                                    class="fa-solid fa-trash"></i> Delete</button>
                            <form action="{{ route('dashboard.employees.destroy', $employee) }}" method="post"
                                id="delete-form-{{ $loop->index }}">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-table>
            {{-- <table class="table table-bordered table-hover table-striped">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>


                </tbody>
            </table> --}}

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $employees->links('pagination::custom') }}
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function removeOldData() {
            table_body = document.getElementById('table-body');
            table_body.textContent = '';
        }

        function addNewData(employee, token) {
            // console.log(employee);
            var newRow = document.createElement("tr");
            var i = document.createElement("td");
            i.textContent = employee.user.id;
            newRow.appendChild(i);

            var titleCell = document.createElement("td");
            titleCell.textContent = employee.user.first_name;
            newRow.appendChild(titleCell);

            var titleCell = document.createElement("td");
            titleCell.textContent = employee.user.last_name;
            newRow.appendChild(titleCell);

            var titleCell = document.createElement("td");
            titleCell.textContent = employee.user.email;
            newRow.appendChild(titleCell);

            var titleCell = document.createElement("td");
            titleCell.textContent = employee.user.phone;
            newRow.appendChild(titleCell);


            var action = document.createElement("td");
            action.innerHTML = `
            <a href="/dashboard/employees/${employee.id}" class="btn btn-info"><i
                                    class="fa-solid fa-eye"></i> Show</a>
                                    <a href="/dashboard/employees/${employee.id}/edit" class="btn btn-primary"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <button class="btn btn-danger" form="delete-form-${employee.id}" type="submit"><i
                                    class="fa-solid fa-trash"></i> Delete</button>
                            <form action="/dashboard/employees/${employee.id}" method="post"
                                id="delete-form-${employee.id}">

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

        degree = document.getElementById('degree_id');
        grade = document.getElementById('grade_id');
        language = document.getElementById('language_id');
        skill = document.getElementById('skill');
        university = document.getElementById('university');

        degree.addEventListener('change', function() {
            updateFilterValue('degree_id', degree.value);
            makeAjaxRequest();
        });

        grade.addEventListener('change', function() {
            updateFilterValue('grade_id', grade.value);
            makeAjaxRequest();
        });

        language.addEventListener('change', function() {
            updateFilterValue('language_id', language.value);
            makeAjaxRequest();
        });

        skill.addEventListener('keyup', function() {
            updateFilterValue('skill', skill.value);
            makeAjaxRequest();
        });

        university.addEventListener('keyup', function() {
            updateFilterValue('university', university.value);
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
            var url = '{{ route('dashboard.search.employees.filter') }}';
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
                        for (key in responseData.data) {
                            addNewData(responseData.data[key], responseData.message);
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

@endsection
