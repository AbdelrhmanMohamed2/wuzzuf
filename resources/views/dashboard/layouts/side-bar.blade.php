<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('uploads/images') }}/{{ $settings->site_logo }}" alt="website logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $settings->site_name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('uploads/images/default.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block">{{ auth()->user()->full_name }}</a>
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
                <x-sidebar.main-item route='dashboard.employees.*' icon='fa-solid fa-user-shield' title='Employees'>
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
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa-school-flag"></i>
                        <p>
                            Universities
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-school"></i>
                                <p> All Universities</p>
                            </a>
                        </li>

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-plus"></i>
                                <p>Add New University</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Degree Levels --}}
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa-user-graduate"></i>
                        <p>
                            Degree Levels
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-graduation-cap"></i>
                                <p> All Degree Levels</p>
                            </a>
                        </li>

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-plus"></i>
                                <p>Add New Degree Level</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Grades --}}
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa-book-open-reader"></i>
                        <p>
                            Grades
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-book-open"></i>
                                <p> All Grades</p>
                            </a>
                        </li>

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-plus"></i>
                                <p>Add New Grade</p>
                            </a>
                        </li>

                    </ul>
                </li>

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
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-paper-plane"></i>
                                <p>All Posts</p>
                            </a>
                        </li>

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-plus"></i>
                                <p>Add New Post</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-header">OTHER</li>

                {{-- Skills --}}
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa-hammer"></i>
                        <p>
                            Skills
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-helmet-safety"></i>
                                <p>All Skills</p>
                            </a>
                        </li>

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-plus"></i>
                                <p>Add New Skill</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Locations --}}
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa-compass"></i>
                        <p>
                            Locations
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-globe"></i>
                                <p>All Locations</p>
                            </a>
                        </li>

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-plus"></i>
                                <p>Add New Location</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Languages --}}
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa-language"></i>
                        <p>
                            Languages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-earth-africa"></i>
                                <p>All Languages</p>
                            </a>
                        </li>

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-plus"></i>
                                <p>Add New Language</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <hr>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
