@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Jobs')
@section('page_main_title', 'Jobs')
@section('page_name', 'Jobs')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">All Jobs for : {{ $company->name }} </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <x-table :numberOfColumns="['#', 'title', 'actions']">
                @foreach ($company->jobs as $job)
                    <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $job->title }}</td>
                        <td>
                            <a href="{{ route('dashboard.jobs.show', [$company, $job]) }}" class="btn btn-info"><i
                                    class="fa-solid fa-eye"></i> Show Details</a>
                        </td>
                    </tr>
                @endforeach
            </x-table>

        </div>

    </div>
@endsection

@section('scripts')
@endsection
