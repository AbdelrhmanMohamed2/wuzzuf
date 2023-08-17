<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container-fluid px-md-4	">
        <a class="navbar-brand" href="{{ route('home') }}">{{ $settings->where('key', 'site_name')->first()->value }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <x-frontend.nav-item route="home" label='Home'></x-frontend.nav-item>
                <x-frontend.nav-item route="blog.index" label='Blog'></x-frontend.nav-item>
                {{-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> --}}

                <x-frontend.nav-item route="jobs.index" label='Browse Jobs'></x-frontend.nav-item>
                @admin
                    <x-frontend.nav-item route="dashboard.index" label='Dashboard'></x-frontend.nav-item>
                @endadmin

                @company
                    <x-frontend.nav-item route="profile.index" label='Profile'></x-frontend.nav-item>
                @endcompany

                @employee
                <x-frontend.nav-item route="jobs.recommended_jobs" label='Recommended Jobs'></x-frontend.nav-item>
                    <x-frontend.nav-item route="profile.index" label='Profile'></x-frontend.nav-item>
                @endemployee

                @guest
                    <x-frontend.nav-item route="login" label='Login'></x-frontend.nav-item>
                    <x-frontend.nav-item route="register.employee" label='Register'></x-frontend.nav-item>
                @endguest

                @auth
                    <li class="nav-item pt-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
