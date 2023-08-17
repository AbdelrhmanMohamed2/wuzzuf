<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Our Blog</span>
                <h2><span>Recent</span> Blog</h2>
            </div>
        </div>
        <div class="row d-flex">
            @foreach ($posts as $post)
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="{{ route('blog.show', $post) }}" class="block-20"
                            style="background-image: url('{{ asset($post::UPLOADED_IMAGE . $post->image) }}');">
                        </a>
                        <div class="text mt-3">
                            <div class="meta mb-2">
                                <div><a href="{{ route('blog.show', $post) }}">{{ $post->created_at->diffForHumans() }}</a></div>
                                <div><a href="{{ route('blog.show', $post) }}" class="meta-chat"><span class="icon-chat"></span>
                                        {{ $post->comments_count }}</a></div>
                            </div>
                            <h3 class="heading"><a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a></h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
