@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Languages')
@section('page_main_title', 'Languages')
@section('page_name', 'Languages')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">All Languages : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <x-table :numberOfColumns="['#', 'name', 'actions']">
                @foreach ($languages as $language)
                    <tr>

                        <td>{{ $languages->firstItem() + $loop->index }}</td>
                        <td>{{ $language->name }}</td>
                        <td>
                            <a href="{{ route('dashboard.languages.edit', $language) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <button class="btn btn-danger" form="delete-form-{{ $loop->index }}" language="submit"><i
                                    class="fa-solid fa-trash"></i> Delete</button>
                            <form action="{{ route('dashboard.languages.destroy', $language) }}" method="post"
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
            {{ $languages->links('pagination::custom') }}
        </div>
    </div>
@endsection

@section('scripts')
@endsection
