@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Admins')
@section('page_main_title', 'Admins')
@section('page_name', 'Admins')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">All Admins</h3>
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
                    @foreach ($admins as $admin)
                        <tr>
                            <td>{{ $admins->firstItem() + $loop->index }}</td>
                            <td>{{ $admin->user->first_name }}</td>
                            <td>{{ $admin->user->last_name }}</td>
                            <td>{{ $admin->user->email }}</td>
                            <td>{{ $admin->user->phone }}</td>
                            <td>
                                <a href="{{ route('dashboard.admins.edit', $admin) }}" class="btn btn-info"><i
                                        class="fa-solid fa-pen-to-square"></i> Edit</a>
                                <button class="btn btn-danger" form="delete-form" type="submit"><i
                                        class="fa-solid fa-trash"></i> Delete</button>
                                <form action="{{ route('dashboard.admins.destroy', $admin) }}" method="post"
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
            {{ $admins->links('pagination::custom') }}
        </div>
    </div>
@endsection

@section('scripts')
@endsection
