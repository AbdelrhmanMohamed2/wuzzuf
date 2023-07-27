@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Employees')
@section('page_main_title', 'Employees')
@section('page_name', 'Employees')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">All Employees</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped">
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

                                <button class="btn btn-danger" form="delete-form" type="submit"><i
                                        class="fa-solid fa-trash"></i> Delete</button>
                                <form action="{{ route('dashboard.employees.destroy', $employee) }}" method="post"
                                    id="delete-form">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $employees->links('pagination::custom') }}
        </div>
    </div>
@endsection

@section('scripts')
@endsection
