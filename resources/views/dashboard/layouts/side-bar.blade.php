<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('uploads/images') }}/{{ $settings->where('key', 'site_logo')->first()->value }}" alt="website logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $settings->where('key', 'site_name')->first()->value }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('uploads/images/default.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('dashboard.profile') }}" class="d-block">{{ auth()->user()->full_name }}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->

                <li class="nav-header">USER</li>

                {{-- Admins --}}
                <x-sidebar.main-item route='dashboard.admins.*' icon='fa-solid fa-user-shield' title='Admins'>
                    <x-sidebar.sub-item route='dashboard.admins.index' icon='fa-solid fa-users' title='All Admins'>
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item route='dashboard.admins.create' icon='fa-solid fa-plus' title='Add New Admin'>
                    </x-sidebar.sub-item>
                </x-sidebar.main-item>

                {{-- Employees --}}
                <x-sidebar.main-item route='dashboard.employees.*' icon='fa-solid fa-user-tie' title='Employees'>
                    <x-sidebar.sub-item route='dashboard.employees.index' icon='fa-solid fa-users'
                        title='All Employees'>
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item route='dashboard.employees.create' icon='fa-solid fa-plus'
                        title='Add New Employee'>
                    </x-sidebar.sub-item>
                </x-sidebar.main-item>

                {{-- Companies --}}
                <x-sidebar.main-item route='dashboard.companies.*' icon='fa-solid fa-building' title='Companies'>
                    <x-sidebar.sub-item route='dashboard.companies.index' icon='fa-solid fa-users'
                        title='All Companies'>
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item route='dashboard.companies.create' icon='fa-solid fa-plus'
                        title='Add New Company'>
                    </x-sidebar.sub-item>
                </x-sidebar.main-item>

                <li class="nav-header">JOB</li>

                {{-- Jobs --}}
                <x-sidebar.sub-item :padding="false" route='dashboard.jobs.index' icon='fa-solid fa-handshake'
                    title='Jobs'>
                </x-sidebar.sub-item>

                {{-- Job Types --}}
                <x-sidebar.main-item route='dashboard.jobTypes.*' icon='fa-solid fa-table-list' title='Job Types'>
                    <x-sidebar.sub-item route='dashboard.jobTypes.index' icon='fa-solid fa-list' title='All Job Types'>
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item route='dashboard.jobTypes.create' icon='fa-solid fa-plus'
                        title='Add New Job Type'>
                    </x-sidebar.sub-item>
                </x-sidebar.main-item>

                {{-- Career Levels --}}
                <x-sidebar.main-item route='dashboard.careerLevels.*' icon='fa-solid fa-layer-group'
                    title='Career Levels'>
                    <x-sidebar.sub-item route='dashboard.careerLevels.index' icon='fa-solid fa-briefcase'
                        title='All Career Levels'>
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item route='dashboard.careerLevels.create' icon='fa-solid fa-plus'
                        title='Add New Career Level'>
                    </x-sidebar.sub-item>
                </x-sidebar.main-item>

                {{-- Industries --}}
                <x-sidebar.main-item route='dashboard.industries.*' icon='fa-solid fa-industry' title='Industries'>
                    <x-sidebar.sub-item route='dashboard.industries.index' icon='fa-solid fa-leaf'
                        title='All Industries'>
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item route='dashboard.industries.create' icon='fa-solid fa-plus'
                        title='Add New Industry'>
                    </x-sidebar.sub-item>
                </x-sidebar.main-item>

                {{-- Job Categories --}}
                <x-sidebar.main-item route='dashboard.jobCategories.*' icon='fa-solid fa-users-gear'
                    title='Job Categories'>
                    <x-sidebar.sub-item route='dashboard.jobCategories.index' icon='fa-solid fa-list'
                        title='All Job Categories'>
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item route='dashboard.jobCategories.create' icon='fa-solid fa-plus'
                        title='Add New Job Category'>
                    </x-sidebar.sub-item>
                </x-sidebar.main-item>

                {{-- Company Sizes --}}
                <x-sidebar.main-item route='dashboard.companySizes.*' icon='fa-solid fa-sack-dollar'
                    title='Company Sizes'>
                    <x-sidebar.sub-item route='dashboard.companySizes.index' icon='fa-solid fa-building'
                        title='All Company Sizes'>
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item route='dashboard.companySizes.create' icon='fa-solid fa-plus'
                        title='Add New Company Size'>
                    </x-sidebar.sub-item>
                </x-sidebar.main-item>

                <li class="nav-header">EDUCATION</li>

                {{-- Universities --}}
                <x-sidebar.main-item route='dashboard.universities.*' icon='fa-solid fa-school-flag'
                    title='Universities'>
                    <x-sidebar.sub-item route='dashboard.universities.index' icon='fa-solid fa-school'
                        title='All Universities'>
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item route='dashboard.universities.create' icon='fa-solid fa-plus'
                        title='Add New University'>
                    </x-sidebar.sub-item>
                </x-sidebar.main-item>

                {{-- Degree Levels --}}
                <x-sidebar.main-item route='dashboard.degrees.*' icon='fa-solid fa-user-graduate'
                    title='Degree Levels'>
                    <x-sidebar.sub-item route='dashboard.degrees.index' icon='fa-solid fa-graduation-cap'
                        title='All Degree Levels'>
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item route='dashboard.degrees.create' icon='fa-solid fa-plus'
                        title='Add New Degree Level'>
                    </x-sidebar.sub-item>
                </x-sidebar.main-item>

                {{-- Grades --}}
                <x-sidebar.main-item route='dashboard.grades.*' icon='fa-solid fa-book-open-reader' title='Grades'>
                    <x-sidebar.sub-item route='dashboard.grades.index' icon='fa-solid fa-book-open'
                        title='All Grades'>
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item route='dashboard.grades.create' icon='fa-solid fa-plus'
                        title='Add New Grade'>
                    </x-sidebar.sub-item>
                </x-sidebar.main-item>

                <li class="nav-header">POST</li>

                {{-- Posts Categories --}}
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa-file-alt"></i>
                        <p>
                            Posts Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-quote-left"></i>
                                <p>All Posts Categories</p>
                            </a>
                        </li>

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-plus"></i>
                                <p>Add New Posts Category</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Posts --}}
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa-newspaper"></i>
                        <p>
                            Posts
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="pl-2 nav-item">
                            <a href="{{ route('dashboard.posts.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-paper-plane"></i>
                                <p>All Posts</p>
                            </a>
                        </li>

                        <li class="pl-2 nav-item">
                            <a href="{{ route('dashboard.posts.create') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-plus"></i>
                                <p>Add New Post</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-header">OTHER</li>

                {{-- Settings --}}
                <x-sidebar.main-item route='dashboard.settings.*' icon='fa-solid fa-gears' title='Settings'>
                    <x-sidebar.sub-item route='dashboard.settings.show' param="general"
                        icon='fa-solid fa-helmet-safety' title='General'>
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item route='dashboard.settings.show' param="hero" icon='fa-solid fa-feather'
                        title='Hero'>
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item route='dashboard.settings.show' param="social_links"
                        icon='fa-brands fa-facebook' title='Social Links'>
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item route='dashboard.settings.show' param="services" icon='fa-solid fa-gear'
                        title='Services'>
                    </x-sidebar.sub-item>

                    <x-sidebar.sub-item route='dashboard.settings.show' param="footer" icon='fa-solid fa-shoe-prints'
                        title='Footer'>
                    </x-sidebar.sub-item>

                </x-sidebar.main-item>


                {{-- Skills --}}
                <x-sidebar.main-item route='dashboard.skills.*' icon='fa-solid fa-hammer' title='Skills'>
                    <x-sidebar.sub-item route='dashboard.skills.index' icon='fa-solid fa-helmet-safety'
                        title='All Skills'>
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item route='dashboard.skills.create' icon='fa-solid fa-plus'
                        title='Add New Skill'>
                    </x-sidebar.sub-item>
                </x-sidebar.main-item>


                {{-- Locations --}}
                <x-sidebar.main-item route='dashboard.locations.*' icon='fa-solid fa-compass' title='Locations'>
                    <x-sidebar.sub-item route='dashboard.locations.index' icon='fa-solid fa-globe'
                        title='All Locations'>
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item route='dashboard.locations.create.country' icon='fa-solid fa-plus'
                        title='Add New Country'>
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item route='dashboard.locations.create.city' icon='fa-solid fa-plus'
                        title='Add New City'>
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item route='dashboard.locations.create.area' icon='fa-solid fa-plus'
                        title='Add New Area'>
                    </x-sidebar.sub-item>
                </x-sidebar.main-item>


                {{-- Languages --}}
                <x-sidebar.main-item route='dashboard.languages.*' icon='fa-solid fa-language' title='Languages'>
                    <x-sidebar.sub-item route='dashboard.languages.index' icon='fa-solid fa-earth-africa'
                        title='All Languages'>
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item route='dashboard.languages.create' icon='fa-solid fa-plus'
                        title='Add New Language'>
                    </x-sidebar.sub-item>
                </x-sidebar.main-item>


                <hr>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
