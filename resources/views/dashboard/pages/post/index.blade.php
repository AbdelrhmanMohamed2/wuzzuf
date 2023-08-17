@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Posts')
@section('page_main_title', 'Posts')
@section('page_name', 'Posts')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">All Posts : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <x-table :numberOfColumns="['#', 'title', 'actions']">
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $posts->firstItem() + $loop->index }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <a href="{{ route('dashboard.posts.show', $post) }}" class="btn btn-info"><i
                                class="fa-solid fa-eye"></i> Show Details</a>

                            <a href="{{ route('dashboard.posts.edit', $post) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <button class="btn btn-danger" form="delete-form-{{ $loop->index }}" post="submit"><i
                                    class="fa-solid fa-trash"></i> Delete</button>
                            <form action="{{ route('dashboard.posts.destroy', $post) }}" method="post"
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
            {{ $posts->links('pagination::custom') }}
        </div>
    </div>
@endsection

@section('scripts')
@endsection
