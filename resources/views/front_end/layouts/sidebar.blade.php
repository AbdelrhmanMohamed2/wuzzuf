<nav class="col bg-light sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.index') }}">
                    <i class="fas fa-user"></i> Profile
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.edit') }}">
                    <i class="fas fa-user-gear"></i> Edit Profile
                </a>
            </li>
            @employee
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('applications.index') }}">
                        <i class="fas fa-list"></i> Applied Jobs
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.skills') }}">
                        <i class="fas fa-code"></i> Skills
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.education.index') }}">
                        <i class="fas fa-graduation-cap"></i> Education
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.language.index') }}">
                        <i class="fas fa-language"></i> Languages
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.experiences.index') }}">
                        <i class="fas fa-briefcase"></i> Work Experience
                    </a>
                </li>
            @endemployee

            @company
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.jobs.create') }}">
                        <i class="fas fa-plus"></i> Post a Job
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.jobs.index') }}">
                        <i class="fas fa-list"></i> Jobs
                    </a>
                </li>
            @endcompany
        </ul>
    </div>
</nav>
