@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Posts')
@section('page_main_title', 'Posts')
@section('page_name', 'Posts')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">Show Post : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <img src="{{ asset($post::UPLOADED_IMAGE . $post->image) }}" class="img-fluid mb-3" alt="Post Image">
            <h1>{{ $post->title }}</h1>
            <div class="mb-5">
                <span class=""><i class="far fa-clock"></i> {{ $post->reading_time }} minutes</span>
                <span class="ml-3"><i class="fas fa-tag"></i> {{ $post->post_category->name }}</span>
            </div>
            {!! $post->body !!}
            <div class="d-flex align-items-center mt-5">
                <span class="m-1">Owner : </span>
                <img src="{{ asset($post->admin->user::UPLOADED_IMAGE . $post->admin->user->image) }}"
                    class="rounded-circle mr-2" alt="User Avatar" style="width: 30px; height: 30px;">
                <span>{{ $post->admin->user->full_name }}</span>
            </div>
            <hr>

            <h2>Comments</h2>
            @forelse ($post->comments as $comment)
                <div class="row">
                    <div class="col">
                        <div class="media my-5">
                            <img src="{{ asset($comment->user::UPLOADED_IMAGE . $comment->user->image) }}"
                                class="mr-3 rounded-circle" alt="Comment User" style="width: 50px; height: 50px;">
                            <div class="media-body">
                                <h5 class="mt-0">{{ $comment->user->full_name }}</h5>
                                {{ $comment->body }}
                            </div>
                        </div>

                    </div>
                    <div class="col-2">
                        <form action="{{ route('dashboard.comments.destroy', ['post' => $post, 'comment' => $comment]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete Comment</button>
                        </form>
                    </div>
                </div>


                <hr>
            @empty
                <div class="media mt-3">
                    <p class="text-danger">No Comments added to this post yet.</p>
                </div>
            @endforelse


        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        </div>
    </div>
@endsection

@section('scripts')

@endsection
