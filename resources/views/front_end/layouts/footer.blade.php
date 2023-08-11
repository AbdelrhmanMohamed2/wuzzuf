<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{ $settings->where('key', 'site_name')->first()->value }}</h2>
                    <p>{{ $settings->where('key', 'description')->first()->value }}</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                        @foreach ($settings->where('category', 'social_links') as $social)
                            @php
                                $social = json_decode($social->value, false);
                            @endphp
                            <li class="ftco-animate">
                                <a href="{{ $social->link }}"><i class="{{ $social->icon }} pl-3 pt-3"
                                        style="color: #005eff;"></i></a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Employers</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="pb-1 d-block">Browse Candidates</a></li>
                        <li><a href="#" class="pb-1 d-block">Post a Job</a></li>
                        <li><a href="#" class="pb-1 d-block">Employer Listing</a></li>
                        <li><a href="#" class="pb-1 d-block">Resume Page</a></li>
                        <li><a href="#" class="pb-1 d-block">Dashboard</a></li>
                        <li><a href="#" class="pb-1 d-block">Job Packages</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Candidate</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="pb-1 d-block">Browse Jobs</a></li>
                        <li><a href="#" class="pb-1 d-block">Submit Resume</a></li>
                        <li><a href="#" class="pb-1 d-block">Dashboard</a></li>
                        <li><a href="#" class="pb-1 d-block">Browse Categories</a></li>
                        <li><a href="#" class="pb-1 d-block">My Bookmarks</a></li>
                        <li><a href="#" class="pb-1 d-block">Candidate Listing</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Account</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="pb-1 d-block">My Account</a></li>
                        <li><a href="#" class="pb-1 d-block">Sign In</a></li>
                        <li><a href="#" class="pb-1 d-block">Create Account</a></li>
                        <li><a href="#" class="pb-1 d-block">Checkout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span
                                    class="text">{{ $settings->where('key', 'address')->first()->value }}</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span
                                        class="text">{{ $settings->where('key', 'phone')->first()->value }}</span></a>
                            </li>

                            <li><a href="#"><span class="icon icon-envelope"> </span> <span class="text">
                                        {{ $settings->where('key', 'email')->first()->value }}</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>{{ $settings->where('key', 'copyright')->first()->value }}</p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>
