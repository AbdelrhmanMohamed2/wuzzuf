<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Job Categories</span>
                <h2 class="mb-0">Top Categories</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($job_categories as $cateogry)
            {{-- @dump($cateogry) --}}
                <div class="col-md-3 ftco-animate">
                    <ul class="category text-center">
                        <li><a href="#">{{ $cateogry->name }} <br><span class="number">{{ $cateogry->jobs_count }}</span> <span>Available</span><i class="ion-ios-arrow-forward"></i></a></li>
                    </ul>
                </div>
            @endforeach



        </div>
    </div>
</section>
