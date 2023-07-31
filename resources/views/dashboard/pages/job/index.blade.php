@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Jobs')
@section('page_main_title', 'Jobs')
@section('page_name', 'Jobs')

@section('css')
    @include('dashboard.layouts.search-input-style')
@endsection

@section('content')

    @include('dashboard.layouts.search-input')
    @include('dashboard.layouts.filters')

    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">All Jobs</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <x-table :numberOfColumns="['#', 'title', 'company', 'actions']">
                @foreach ($jobs as $job)
                    <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $job->title }}</td>
                        <td>{{ $job->company->name }}</td>
                        <td>
                            <a href="{{ route('dashboard.jobs.show', [$job->company, $job]) }}" class="btn btn-info"><i
                                    class="fa-solid fa-eye"></i> Show Details</a>
                        </td>
                    </tr>
                @endforeach
            </x-table>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $jobs->links('pagination::custom') }}
        </div>

    </div>
@endsection

@section('scripts')
    @include('dashboard.layouts.xhr', [
        'route' => route('dashboard.search.jobs'),
        'link' => '`/dashboard/jobs/${response.data[key].company_id}/jobs/${response.data[key].id}`',
        'label' => '`${response.data[key].title}`',
    ])
    <script>
        function removeOldData()
        {
            table_body = document.getElementById('table-body');
            table_body.textContent = '';
        }
        function addNewData(job)
        {
            var newRow = document.createElement("tr");
            var i = document.createElement("td");
            i.textContent = job.id;
            newRow.appendChild(i);

            var titleCell = document.createElement("td");
            titleCell.textContent = job.title;
            newRow.appendChild(titleCell);

            var company_name = document.createElement("td");
            company_name.textContent = job.company.name;
            newRow.appendChild(company_name);

            var action = document.createElement("td");
            action.innerHTML = `<a href="/dashboard/jobs/${job.company.id}/jobs/${job.id}" class="btn btn-info"><i
                                    class="fa-solid fa-eye"></i> Show Details</a>`;
            newRow.appendChild(action);
            table_body = document.getElementById('table-body');
            table_body.appendChild(newRow);

        }
    </script>
    @include('dashboard.layouts.filter-xhr')
@endsection
