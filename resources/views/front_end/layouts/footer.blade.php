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
            @company
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Companies</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('profile.jobs.index') }}" class="pb-1 d-block">Your Jobs</a></li>
                            <li><a href="{{ route('profile.jobs.create') }}" class="pb-1 d-block">Post a Job</a></li>
                        </ul>
                    </div>
                </div>
            @endcompany
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Candidate</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('jobs.index') }}" class="pb-1 d-block">Jobs</a></li>
                        @employee
                            <li><a href="{{ route('jobs.recommended_jobs') }}" class="pb-1 d-block">Recommenrd Jobs</a></li>
                            {{-- <li><a href="{{ route('profile.ap') }}" class="pb-1 d-block">Applied Jobs</a></li> --}}
                        @endemployee
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Account</h2>
                    <ul class="list-unstyled">

                        @guest
                            <li><a href="{{ route('login') }}" class="pb-1 d-block">Login</a></li>
                            <li><a href="{{ route('register.employee') }}" class="pb-1 d-block">Register as Employee</a>
                            </li>
                            <li><a href="{{ route('register.company') }}" class="pb-1 d-block">Register as Company</a></li>

                        @endguest

                        @auth

                            <li><a href="{{ route('profile.index') }}" class="pb-1 d-block">Profile</a></li>
                            <li><a href="{{ route('profile.edit') }}" class="pb-1 d-block">Edit Profile</a></li>
                            @admin
                                <li><a href="{{ route('dashboard.index') }}" class="pb-1 d-block">Dashboard</a></li>
                            @endadmin
                        @endauth
                        <li><a href="{{ route('blog.index') }}" class="pb-1 d-block">Blog</a></li>
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
