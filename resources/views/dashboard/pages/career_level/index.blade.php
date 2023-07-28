@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Career Levels')
@section('page_main_title', 'Career Levels')
@section('page_name', 'Career Levels')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">All Career Levels : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <x-table :numberOfColumns="['#', 'name', 'actions']">
                @foreach ($career_levels as $level)
                    <tr>

                        <td>{{ $career_levels->firstItem() + $loop->index }}</td>
                        <td>{{ $level->name }}</td>
                        <td>
                            {{-- <a href="{{ route('dashboard.jobs.index', $company) }}" class="btn btn-info"><i
                                    class="fa-solid fa-briefcase"></i> Jobs</a> --}}


                            <a href="{{ route('dashboard.careerLevels.edit', $level) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <button class="btn btn-danger" form="delete-form-{{ $loop->index }}" level="submit"><i
                                    class="fa-solid fa-trash"></i> Delete</button>
                            <form action="{{ route('dashboard.careerLevels.destroy', $level) }}" method="post"
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
            {{ $career_levels->links('pagination::custom') }}
        </div>
    </div>
@endsection

@section('scripts')
@endsection
