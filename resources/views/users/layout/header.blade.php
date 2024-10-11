<!-- header -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header__content">
                    <!-- header logo -->
                    <a href="index.html" class="header__logo">
                        <img src="{{ asset('assets_user/img/logo2.svg') }}" alt="">
                    </a>
                    <!-- end header logo -->

                    <!-- header nav -->
                    <ul class="header__nav">
                        <!-- dropdown -->
                        <li class="header__nav-item">
                            <a class="header__nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">Home <i class="ti ti-chevron-down"></i></a>

                            <ul class="dropdown-menu header__dropdown-menu">
                                <li><a href="index.html">Home style 1</a></li>
                                <li><a href="index2.html">Home style 2</a></li>
                                <li><a href="index3.html">Home style 3</a></li>
                            </ul>
                        </li>
                        <!-- end dropdown -->

                        <!-- dropdown -->
                        <li class="header__nav-item">
                            <a class="header__nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">Catalog <i class="ti ti-chevron-down"></i></a>

                            <ul class="dropdown-menu header__dropdown-menu">
                                <li><a href="catalog.html">Catalog style 1</a></li>
                                <li><a href="catalog2.html">Catalog style 2</a></li>
                                <li><a href="details.html">Details Movie</a></li>
                                <li><a href="details2.html">Details TV Series</a></li>
                            </ul>
                        </li>
                        <!-- end dropdown -->

                        <li class="header__nav-item">
                            <a href="pricing.html" class="header__nav-link">Pricing plan</a>
                        </li>

                        <!-- dropdown -->
                        <li class="header__nav-item">
                            <a class="header__nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">Pages <i class="ti ti-chevron-down"></i></a>

                            <ul class="dropdown-menu header__dropdown-menu">
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="actor.html">Actor</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="faq.html">Help center</a></li>
                                <li><a href="privacy.html">Privacy policy</a></li>
                                <li><a href="../admin/index.html" target="_blank">Admin pages</a></li>
                            </ul>
                        </li>
                        <!-- end dropdown -->

                        <!-- dropdown -->
                        <li class="header__nav-item">
                            <a class="header__nav-link header__nav-link--more" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots"></i></a>

                            <ul class="dropdown-menu header__dropdown-menu">
                                <li><a href="signin.html">Sign in</a></li>
                                <li><a href="signup.html">Sign up</a></li>
                                <li><a href="forgot.html">Forgot password</a></li>
                                <li><a href="404.html">404 Page</a></li>
                            </ul>
                        </li>
                        <!-- end dropdown -->
                    </ul>
                    <!-- end header nav -->

                    <!-- header auth -->
                    <div class="header__auth">
                        <form action="#" class="header__search">
                            <input class="header__search-input" type="text" placeholder="Search...">
                            <button class="header__search-button" type="button">
                                <i class="ti ti-search"></i>
                            </button>
                            <button class="header__search-close" type="button">
                                <i class="ti ti-x"></i>
                            </button>
                        </form>

                        <button class="header__search-btn" type="button">
                            <i class="ti ti-search"></i>
                        </button>

                        <!-- dropdown -->
                        <div class="header__lang">
                            <a class="header__nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">EN <i class="ti ti-chevron-down"></i></a>

                            <ul class="dropdown-menu header__dropdown-menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">Spanish</a></li>
                                <li><a href="#">French</a></li>
                            </ul>
                        </div>
                        <!-- end dropdown -->

                        <!-- dropdown -->
                        <div class="header__profile">
                            <a class="header__sign-in header__sign-in--user" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-user"></i>
                                <span>Nickname</span>
                            </a>

                            <ul
                                class="dropdown-menu dropdown-menu-end header__dropdown-menu header__dropdown-menu--user">
                                <li><a href="profile.html"><i class="ti ti-ghost"></i>Profile</a></li>
                                <li><a href="profile.html"><i class="ti ti-stereo-glasses"></i>Subscription</a>
                                </li>
                                <li><a href="profile.html"><i class="ti ti-bookmark"></i>Favorites</a></li>
                                <li><a href="profile.html"><i class="ti ti-settings"></i>Settings</a></li>
                                <li><a href="#"><i class="ti ti-logout"></i>Logout</a></li>
                            </ul>
                        </div>
                        <!-- end dropdown -->
                    </div>
                    <!-- end header auth -->

                    <!-- header menu btn -->
                    <button class="header__btn" type="button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <!-- end header menu btn -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header -->

<!-- home -->
<section class="home home--hero">
    <div class="container">
        <div class="row">
            <!-- hero carousel -->
            <div class="col-12">
                <div class="hero splide splide--hero">
                    <div class="splide__arrows">
                        <button class="splide__arrow splide__arrow--prev" type="button">
                            <i class="ti ti-chevron-left"></i>
                        </button>
                        <button class="splide__arrow splide__arrow--next" type="button">
                            <i class="ti ti-chevron-right"></i>
                        </button>
                    </div>
                    
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <div class="hero__slide" data-bg="{{asset('assets_user/img/bg/slide__bg-1.jpg')}}">
                                    <div class="hero__content">
                                        <h2 class="hero__title">Savage Beauty <sub class="green">9.8</sub></h2>
                                        <p class="hero__text">A brilliant scientist discovers a way to harness the power of the ocean's currents to create a new, renewable energy source. But when her groundbreaking technology falls into the wrong hands, she must race against time to stop it from being used for evil.</p>
                                        <p class="hero__category">
                                            <a href="#">Action</a>
                                            <a href="#">Drama</a>
                                            <a href="#">Comedy</a>
                                        </p>
                                        <div class="hero__actions">
                                            <a href="details.html" class="hero__btn">
                                                <span>Watch now</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="splide__slide">
                                <div class="hero__slide" data-bg="{{asset('assets_user/img/bg/slide__bg-2.jpg')}}">
                                    <div class="hero__content">
                                        <h2 class="hero__title">From the Other Side <sub class="yellow">6.9</sub></h2>
                                        <p class="hero__text">In a world where magic is outlawed and hunted, a young witch must use her powers to fight back against the corrupt authorities who seek to destroy her kind.</p>
                                        <p class="hero__category">
                                            <a href="#">Adventure</a>
                                            <a href="#">Triler</a>
                                        </p>
                                        <div class="hero__actions">
                                            <a href="details.html" class="hero__btn">
                                                <span>Watch now</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="splide__slide">
                                <div class="hero__slide" data-bg="{{asset('assets_user/img/bg/slide__bg-3.jpg')}}">
                                    <div class="hero__content">
                                        <h2 class="hero__title">Endless Horizon <sub class="red">6.2</sub></h2>
                                        <p class="hero__text">When a renowned archaeologist goes missing, his daughter sets out on a perilous journey to the heart of the Amazon rainforest to find him. Along the way, she discovers a hidden city and a dangerous conspiracy that threatens the very balance of power in the world.</p>
                                        <p class="hero__category">
                                            <a href="#">Action</a>
                                            <a href="#">Drama</a>
                                            <a href="#">Triler</a>
                                        </p>
                                        <div class="hero__actions">
                                            <a href="details.html" class="hero__btn">
                                                <span>Watch now</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- hero carousel -->
        </div>
    </div>
</section>
<!-- end home -->