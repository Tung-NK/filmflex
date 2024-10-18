<!-- header -->
<header class="header">
    <div class="header__content">
        <!-- header logo -->
        <a href="index.html" class="header__logo">
            <img src="{{ asset('assets_admin/img/logo2.svg') }}" alt="">
        </a>
        <!-- end header logo -->

        <!-- header menu btn -->
        <button class="header__btn" type="button">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <!-- end header menu btn -->
    </div>
</header>
<!-- end header -->

<!-- sidebar -->
<div class="sidebar">
    <!-- sidebar logo -->
    <a href="index.html" class="sidebar__logo">
        <img src="{{ asset('assets_admin/img/logo2.svg') }}" alt="">
    </a>
    <!-- end sidebar logo -->

    <!-- sidebar user -->
    <div class="sidebar__user">
        <div class="sidebar__user-img">
            <img src="{{ asset('assets_admin/img/user.svg') }}" alt="">
        </div>

        <div class="sidebar__user-title">
            <span>Admin</span>
            <p>{{ session('loggedInUserName') }}</p>
        </div>

        <a class="sidebar__user-btn" href="{{ route('logout') }}">
            <i class="ti ti-logout"></i>
        </a>
    </div>
    <!-- end sidebar user -->

    <!-- sidebar nav -->
    <div class="sidebar__nav-wrap">
        <ul class="sidebar__nav">
            <li class="sidebar__nav-item">
                <a href="{{route('dashboard.indexDashboard')}}" class="sidebar__nav-link sidebar__nav-link--active"><i
                        class="ti ti-layout-grid"></i> <span>Dashboard</span></a>
            </li>

            <li class="sidebar__nav-item">
                <a href="{{ route('movie.catalog.index') }}" class="sidebar__nav-link"><i class="ti ti-movie"></i>
                    <span>Movie</span></a>
            </li>
            <li class="sidebar__nav-item">
            <a href="{{ route('actors.index') }}" class="sidebar__nav-link"><i class="ti ti-user"></i>
                <span>Actor</span></a> 
            </li>
            <li class="sidebar__nav-item">
                <a href="users.html" class="sidebar__nav-link"><i class="ti ti-users"></i> <span>Users</span></a>
            </li>

            <li class="sidebar__nav-item">
                <a href="{{ route('directors.index') }}" class="sidebar__nav-link"><i class="ti ti-users"></i> <span>Director</span></a>
            </li>

            <li class="sidebar__nav-item">
                <a href="comments.html" class="sidebar__nav-link"><i class="ti ti-message"></i>
                    <span>Comments</span></a>
            </li>

            <li class="sidebar__nav-item">
                <a href="reviews.html" class="sidebar__nav-link"><i class="ti ti-star-half-filled"></i>
                    <span>Reviews</span></a>
            </li>

            <li class="sidebar__nav-item">
                <a href="settings.html" class="sidebar__nav-link"><i class="ti ti-settings"></i>
                    <span>Settings</span></a>
            </li>

            <!-- dropdown -->
            <li class="sidebar__nav-item">
                <a class="sidebar__nav-link" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="ti ti-files"></i> <span>Pages</span> <i
                        class="ti ti-chevron-down"></i></a>

                <ul class="dropdown-menu sidebar__dropdown-menu">
                    <li><a href="add-item.html">Add item</a></li>
                    <li><a href="edit-user.html">Edit user</a></li>
                    <li><a href="signin.html">Sign In</a></li>
                    <li><a href="signup.html">Sign Up</a></li>
                    <li><a href="forgot.html">Forgot password</a></li>
                    <li><a href="404.html">404 Page</a></li>
                </ul>
            </li>
            <!-- end dropdown -->

            <li class="sidebar__nav-item">
                <a href="../main/index.html" class="sidebar__nav-link"><i class="ti ti-arrow-left"></i> <span>Back
                        to FilmFlex</span></a>
            </li>
        </ul>
    </div>
    <!-- end sidebar nav -->

    <!-- sidebar copyright -->
    <div class="sidebar__copyright">© FILMFLEX, 2024—2025. <br>Create by <a
            href="https://themeforest.net/user/dmitryvolkov/portfolio" target="_blank">WD-47</a></div>
    <!-- end sidebar copyright -->
</div>
<!-- end sidebar -->
