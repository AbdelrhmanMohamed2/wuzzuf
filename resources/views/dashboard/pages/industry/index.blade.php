@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Industries')
@section('page_main_title', 'Industries')
@section('page_name', 'Industries')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">All Industries : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <x-table :numberOfColumns="['#', 'name', 'actions']">
                @foreach ($industries as $industry)
                    <tr>

                        <td>{{ $industries->firstItem() + $loop->index }}</td>
                        <td>{{ $industry->name }}</td>
                        <td>
                            <a href="{{ route('dashboard.industries.edit', $industry) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <button class="btn btn-danger" form="delete-form-{{ $loop->index }}" industry="submit"><i
                                    class="fa-solid fa-trash"></i> Delete</button>
                            <form action="{{ route('dashboard.industries.destroy', $industry) }}" method="post"
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
            {{ $industries->links('pagination::custom') }}
        </div>
    </div>
@endsection

@section('scripts')
@endsection
