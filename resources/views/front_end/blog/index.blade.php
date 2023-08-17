@extends('front_end.layouts.master')

@section('content')
    <div class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('front_end') }}/images/bg_1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start">
                <div class="col-md-12 ftco-animate text-center mb-5">
                    <p class="breadcrumbs mb-0"><span class="mr-3"><a href="{{ route('home') }}">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Blog</span></p>
                    <h1 class="mb-3 bread">Our Blog</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section">
        <div class="container">
            <div class="row d-flex">
                @forelse ($posts as $post)
                    <div class="col-md-3 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a href="{{ route('blog.show', $post) }}" class="block-20"
                                style="background-image: url('{{ asset($post::UPLOADED_IMAGE . $post->image) }}');">
                            </a>
                            <div class="text mt-3">
                                <div class="meta mb-2">
                                    <div><a
                                            href="{{ route('blog.show', $post) }}">{{ $post->created_at->diffForHumans() }}</a>
                                    </div>
                                    <div><a href="{{ route('blog.show', $post) }}" class="meta-chat"><span
                                                class="icon-chat"></span> {{ $post->comments_count }}</a></div>
                                </div>
                                <h3 class="heading"><a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a></h3>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-3 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <p class="text-danger">No Posts Added Yet.</p>
                        </div>
                    </div>
                @endforelse


            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        {{ $posts->links('pagination::custom-frontend-pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
