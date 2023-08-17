@extends('front_end.layouts.master')

@section('content')
    <div class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('front_end') }}/images/bg_1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start">
                <div class="col-md-12 ftco-animate text-center mb-5 fadeInUp ftco-animated">
                    <p class="breadcrumbs mb-0"><span class="mr-3"><a href="{{ route('home') }}">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span class="mr-3"><a
                                href="{{ route('blog.index') }}">Blog <i class="ion-ios-arrow-forward"></i></a></span>
                        <span>Blog Single</span>
                    </p>
                    <h1 class="mb-3 bread">Single Blog</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col ftco-animate fadeInUp ftco-animated">
                    <h1>{{ $post->title }}</h1>
                    <img src="{{ asset($post::UPLOADED_IMAGE . $post->image) }}" height="200" class="img-fluid mb-3"
                        alt="Post Image">

                    {!! $post->body !!}


                    <div class="pt-5 mt-5">
                        <h3 class="mb-5">Comments</h3>
                        <ul class="comment-list">
                            @forelse ($post->comments as $comment)
                                <div class="row">

                                    <li class="comment col">
                                        <div class="vcard bio">
                                            <img src="{{ asset($comment->user::UPLOADED_IMAGE . $comment->user->image) }}"
                                                alt="Image placeholder">
                                        </div>
                                        <div class="comment-body">
                                            <h3>{{ $comment->user->full_name }}</h3>
                                            <div class="meta">{{ $comment->created_at->diffForHumans() }}</div>
                                            <p class="comment-{{ $comment->id }}">{{ $comment->body }}</p>
                                        </div>
                                    </li>

                                    @if ($comment->user_id == auth()->id())
                                        <div class="col-6">
                                            <div class="row">
                                                <p class="btn btn-info edit" id="{{ $comment->id }}">Edit</p>
                                                <form class="col"
                                                    action="{{ route('comments.destroy', ['post' => $post, 'comment' => $comment]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fas fa-trash"></i>
                                                        Delete Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @empty
                                <p class="text-danger small">No comments in this blog post yet.</p>
                            @endforelse



                        </ul>

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>
                            @auth

                                <form id="comment-form" action="{{ route('comments.store', $post) }}" method="post" class="p-5 bg-light">
                                    @csrf
                                    <x-frontend.text-area-input id='body' name='body' label='Comment'
                                        value=''></x-frontend.text-area-input>
                                    <div class="form-group">
                                        <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                                    </div>
                                </form>
                            @endauth
                            @guest
                                <p class="text-danger small">You must Login To leave a comment.</p>
                            @endguest
                        </div>


                    </div>

                </div> <!-- .col-md-8 -->
                <div class="col-md-4 pl-md-5 sidebar ftco-animate fadeInUp ftco-animated">

                    <div class="mb-5">
                        <span class=""><i class="far fa-clock"></i> {{ $post->reading_time }} minutes</span>
                        <span class="ml-3"><i class="fas fa-tag"></i> {{ $post->post_category->name }}</span>
                    </div>

                    <div class="d-flex align-items-center mt-5">
                        <span class="m-1">Owner : </span>
                        <span>{{ $post->admin->user->full_name }}</span>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script src="{{ asset('front_end/custom/edit_comment_btn.js') }}"></script>
@endsection
