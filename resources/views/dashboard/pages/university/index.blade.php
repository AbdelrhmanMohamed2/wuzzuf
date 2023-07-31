@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Universities')
@section('page_main_title', 'Universities')
@section('page_name', 'Universities')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">All Universities : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <x-table :numberOfColumns="['#', 'name', 'actions']">
                @foreach ($universities as $university)
                    <tr>

                        <td>{{ $universities->firstItem() + $loop->index }}</td>
                        <td>{{ $university->name }}</td>
                        <td>
                            <a href="{{ route('dashboard.universities.edit', $university) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <button class="btn btn-danger" form="delete-form-{{ $loop->index }}" university="submit"><i
                                    class="fa-solid fa-trash"></i> Delete</button>
                            <form action="{{ route('dashboard.universities.destroy', $university) }}" method="post"
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
            {{ $universities->links('pagination::custom') }}
        </div>
    </div>
@endsection

@section('scripts')
@endsection
