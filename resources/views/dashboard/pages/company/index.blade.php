@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Companies')
@section('page_main_title', 'Companies')
@section('page_name', 'Companies')

@section('css')
@endsection

@section('content')
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
                            <a href="{{ route('dashboard.jobs.index', $company) }}" class="btn btn-info"><i
                                class="fa-solid fa-briefcase"></i> Jobs</a>

                            <a href="{{ route('dashboard.companies.show', $company) }}" class="btn btn-info"><i
                                    class="fa-solid fa-eye"></i> Show Details</a>

                            <a href="{{ route('dashboard.companies.edit', $company) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <button class="btn btn-danger" form="delete-form" type="submit"><i
                                    class="fa-solid fa-trash"></i> Delete</button>
                            <form action="{{ route('dashboard.companies.destroy', $company) }}" method="post"
                                id="delete-form">
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
@endsection
