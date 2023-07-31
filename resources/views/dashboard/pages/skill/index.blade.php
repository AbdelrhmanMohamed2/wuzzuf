@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Skills')
@section('page_main_title', 'Skills')
@section('page_name', 'Skills')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">All Skills : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <x-table :numberOfColumns="['#', 'name', 'actions']">
                @foreach ($skills as $skill)
                    <tr>

                        <td>{{ $skills->firstItem() + $loop->index }}</td>
                        <td>{{ $skill->name }}</td>
                        <td>
                            <a href="{{ route('dashboard.skills.edit', $skill) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <button class="btn btn-danger" form="delete-form-{{ $loop->index }}" skill="submit"><i
                                    class="fa-solid fa-trash"></i> Delete</button>
                            <form action="{{ route('dashboard.skills.destroy', $skill) }}" method="post"
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
            {{ $skills->links('pagination::custom') }}
        </div>
    </div>
@endsection

@section('scripts')
@endsection
