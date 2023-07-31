@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Grades')
@section('page_main_title', 'Grades')
@section('page_name', 'Grades')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">All Grades : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <x-table :numberOfColumns="['#', 'name', 'actions']">
                @foreach ($grades as $grade)
                    <tr>

                        <td>{{ $grades->firstItem() + $loop->index }}</td>
                        <td>{{ $grade->name }}</td>
                        <td>
                            <a href="{{ route('dashboard.grades.edit', $grade) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <button class="btn btn-danger" form="delete-form-{{ $loop->index }}" grade="submit"><i
                                    class="fa-solid fa-trash"></i> Delete</button>
                            <form action="{{ route('dashboard.grades.destroy', $grade) }}" method="post"
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
            {{ $grades->links('pagination::custom') }}
        </div>
    </div>
@endsection

@section('scripts')
@endsection
