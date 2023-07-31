@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Job Types')
@section('page_main_title', 'Job Types')
@section('page_name', 'Job Types')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">All Job Types : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <x-table :numberOfColumns="['#', 'name', 'actions']">
                @foreach ($job_types as $type)
                    <tr>

                        <td>{{ $job_types->firstItem() + $loop->index }}</td>
                        <td>{{ $type->name }}</td>
                        <td>

                            <a href="{{ route('dashboard.jobTypes.edit', $type) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <button class="btn btn-danger" form="delete-form-{{ $loop->index }}" type="submit"><i
                                    class="fa-solid fa-trash"></i> Delete</button>
                            <form action="{{ route('dashboard.jobTypes.destroy', $type) }}" method="post"
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
            {{ $job_types->links('pagination::custom') }}
        </div>
    </div>
@endsection

@section('scripts')
@endsection
