@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Degrees')
@section('page_main_title', 'Degrees')
@section('page_name', 'Degrees')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">All Degrees : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <x-table :numberOfColumns="['#', 'name', 'actions']">
                @foreach ($degrees as $degree)
                    <tr>

                        <td>{{ $degrees->firstItem() + $loop->index }}</td>
                        <td>{{ $degree->name }}</td>
                        <td>
                            <a href="{{ route('dashboard.degrees.edit', $degree) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <button class="btn btn-danger" form="delete-form-{{ $loop->index }}" degree="submit"><i
                                    class="fa-solid fa-trash"></i> Delete</button>
                            <form action="{{ route('dashboard.degrees.destroy', $degree) }}" method="post"
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
            {{ $degrees->links('pagination::custom') }}
        </div>
    </div>
@endsection

@section('scripts')
@endsection
