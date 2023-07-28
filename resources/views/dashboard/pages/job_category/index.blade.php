@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Job Categories')
@section('page_main_title', 'Job Categories')
@section('page_name', 'Job Categories')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">All Job Categories : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <x-table :numberOfColumns="['#', 'name', 'industry', 'actions']">
                @foreach ($job_categories as $job_category)
                    <tr>

                        <td>{{ $job_categories->firstItem() + $loop->index }}</td>
                        <td>{{ $job_category->name }}</td>
                        <td>{{ $job_category->industry->name }}</td>
                        <td>
                            <a href="{{ route('dashboard.jobCategories.edit', $job_category) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <button class="btn btn-danger" form="delete-form-{{ $loop->index }}" job_category="submit"><i
                                    class="fa-solid fa-trash"></i> Delete</button>
                            <form action="{{ route('dashboard.jobCategories.destroy', $job_category) }}" method="post"
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
            {{ $job_categories->links('pagination::custom') }}
        </div>
    </div>
@endsection

@section('scripts')
@endsection
