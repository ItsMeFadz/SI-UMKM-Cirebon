<div class="page-header">
    <div class="header-wrapper row m-0">
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="index.html"> <img class="img-fluid for-light"
                        style="width: 200px; height: 45px;" src="{{ asset('assets/images/logo/banner-dark.png') }}"
                        alt=""><img class="img-fluid for-dark"
                        src="{{ asset('assets/images/logo/banner-light.png') }}" style="width: 200px; height: 45px;"
                        alt=""></a>
            </div>
            <div class="toggle-sidebar">
                <svg class="sidebar-toggle">
                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-animation') }}"></use>
                </svg>
            </div>
        </div>
        <form class="col-sm-4 form-inline search-full d-none d-xl-block" action="#" method="get">
            <div class="form-group">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                            placeholder="Type to Search .." name="q" title="" autofocus>
                        <svg class="search-bg svg-color">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#search') }}"></use>
                        </svg>
                    </div>
                </div>
            </div>
        </form>
        <div class="nav-right col-xl-8 col-lg-12 col-auto pull-right right-header p-0">
            <ul class="nav-menus">
                <li class="serchinput">
                    <div class="serchbox">
                        <svg>
                            <use href="{{ asset('assets/svg/icon-sprite.svg#search') }}"></use>
                        </svg>
                    </div>
                    <div class="form-group search-form">
                        <input type="text" placeholder="Search here...">
                    </div>
                </li>

                <li>
                    <div class="mode">
                        <svg class="for-dark">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#moon') }}"></use>
                        </svg>
                        <svg class="for-light">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#Sun') }}"></use>
                        </svg>
                    </div>
                </li>
                <li class="profile-nav onhover-dropdown pe-0 py-0">
                    @if (Auth::check())
                        <div class="d-flex align-items-center profile-media">
                            @if (Auth::user()->umkm && Auth::user()->umkm->foto_profil_umkm)
                                <img class="b-r-25" src="{{ asset('storage/' . Auth::user()->umkm->foto_profil_umkm) }}"
                                    alt="">
                            @else
                                <img class="b-r-25" src="{{ asset('assets/images/default-profile.jpg') }}"
                                    alt="">
                            @endif
                            <div class="flex-grow-1 user">
                                <span>{{ Auth::user()->name }}</span>
                                <p class="mb-0 font-nunito">
                                    {{ Auth::user()->role == 0 ? 'Admin' : 'Penjual' }}
                                    <svg>
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#header-arrow-down') }}"></use>
                                    </svg>
                                </p>
                            </div>
                        </div>
                    @endif
                    <ul class="profile-dropdown onhover-show-div">
                        <li><a href="user-profile.html"><i data-feather="user"></i><span>Account </span></a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                @csrf
                                <a href="#" onclick="document.getElementById('logout-form').submit();">
                                    <i data-feather="log-out"></i><span>Log Out</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">
                <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
                <div class="ProfileCard-details">
                    <div class="ProfileCard-realName">name</div>
                </div>
            </div>
        </script>
        <script class="empty-template" type="text/x-handlebars-template">
            <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div>
        </script>
    </div>
</div>
