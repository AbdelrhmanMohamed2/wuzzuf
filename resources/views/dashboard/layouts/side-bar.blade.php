<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('uploads') }}/{{ $settings->site_logo }}" alt="website logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $settings->site_name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('front-end/dist') }}/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block">{{ auth()->user()->full_name}}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->

                <li class="nav-header">USERS</li>

                {{-- Admins --}}
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa-user-shield"></i>
                        <p>
                            Admins
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-users"></i>
                                <p> All Admins</p>
                            </a>
                        </li>

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-plus"></i>
                                <p>Add New Admin</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Employees --}}
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa-user-tie"></i>
                        <p>
                            Employees
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-users"></i>
                                <p> All Employees</p>
                            </a>
                        </li>

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-plus"></i>
                                <p>Add New Employee</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Companies --}}
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa-building"></i>
                        <p>
                            Companies
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-users"></i>
                                <p> All Companies</p>
                            </a>
                        </li>

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-plus"></i>
                                <p>Add New Company</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-header">JOBS</li>

                {{-- Jobs --}}
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa-briefcase"></i>
                        <p>
                            All Jobs
                        </p>
                    </a>
                </li>

                {{-- Job Types --}}
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa-table-list"></i>
                        <p>
                            Job Types
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-list"></i>
                                <p> All Job Types</p>
                            </a>
                        </li>

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-plus"></i>
                                <p>Add New Job Type</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Career Levels --}}
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa-layer-group"></i>
                        <p>
                            Career Levels
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-briefcase"></i>
                                <p> All Career Levels</p>
                            </a>
                        </li>

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-plus"></i>
                                <p>Add New Career Level</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Industries --}}
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa-industry"></i>
                        <p>
                            Industries
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-leaf"></i>
                                <p> All Industries</p>
                            </a>
                        </li>

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-plus"></i>
                                <p>Add New Industry</p>
                            </a>
                        </li>

                    </ul>
                </li>


                {{-- Job Categories --}}
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa-users-gear"></i>
                        <p>
                            Job Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-list"></i>
                                <p> All Job Categories</p>
                            </a>
                        </li>

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-plus"></i>
                                <p>Add New Job Category</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-header">EDUCATIONS</li>

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

                <li class="nav-header">POSTS</li>

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


                <li class="nav-header">OTHERS</li>

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

                {{-- Company Sizes --}}
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa-sack-dollar"></i>
                        <p>
                            Company Sizes
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-building"></i>
                                <p>All Company Sizes</p>
                            </a>
                        </li>

                        <li class="pl-2 nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-plus"></i>
                                <p>Add New Company Size</p>
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
