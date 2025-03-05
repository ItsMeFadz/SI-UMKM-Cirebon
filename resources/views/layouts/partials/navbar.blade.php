<div class="page-header">
    <div class="header-wrapper row m-0">
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="index.html"> <img class="img-fluid for-light"
                        src="{{ asset('assets/images/logo/logo.png') }}" alt=""><img class="img-fluid for-dark"
                        src="{{ asset('assets/images/logo/logo_dark.png') }}" alt=""></a></div>
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
                <li class="onhover-dropdown">
                    <div class="notification-box">
                        <svg>
                            <use href="{{ asset('assets/svg/icon-sprite.svg#Bell') }}"></use>
                        </svg>
                    </div>
                    <div class="onhover-show-div notification-dropdown">
                        <h6 class="f-18 mb-0 dropdown-title">Notifications</h6>
                        <div class="notification-card">
                            <ul>
                                <li>
                                    <div class="user-notification">
                                        <div><img src="{{ asset('assets/images/avtar/2.jpg') }}" alt="avatar"></div>
                                        <div class="user-description">
                                            <a href="letter-box.html">
                                                <h4>You have new finical page design.</h4>
                                            </a><span>Today 11:45pm</span>
                                        </div>
                                    </div>
                                    <div class="notification-btn">
                                        <button class="btn btn-pill btn-primary" type="button"
                                            title="btn btn-pill btn-primary">Accpet</button>
                                        <button class="btn btn-pill btn-secondary" type="button"
                                            title="btn btn-pill btn-primary">Decline</button>
                                    </div>
                                    <div class="show-btn"><a href="index.html"> <span>Show</span></a></div>
                                </li>
                                <li>
                                    <div class="user-notification">
                                        <div><img src="{{ asset('assets/images/avtar/17.jpg') }}" alt="avatar"></div>
                                        <div class="user-description">
                                            <a href="letter-box.html">
                                                <h4>Congrats! you all task for today.</h4>
                                            </a><span>Today 01:05pm</span>
                                        </div>
                                    </div>
                                    <div class="notification-btn">
                                        <button class="btn btn-pill btn-primary" type="button"
                                            title="btn btn-pill btn-primary">Accpet</button>
                                        <button class="btn btn-pill btn-secondary" type="button"
                                            title="btn btn-pill btn-primary">Decline</button>
                                    </div>
                                    <div class="show-btn"><a href="index.html"> <span>Show</span></a></div>
                                </li>
                                <li>
                                    <div class="user-notification">
                                        <div> <img src="{{ asset('assets/images/avtar/18.jpg') }}" alt="avatar"></div>
                                        <div class="user-description">
                                            <a href="letter-box.html">
                                                <h4>You have new in landing page design.</h4>
                                            </a><span>Today 06:55pm</span>
                                        </div>
                                    </div>
                                    <div class="notification-btn">
                                        <button class="btn btn-pill btn-primary" type="button"
                                            title="btn btn-pill btn-primary">Accpet</button>
                                        <button class="btn btn-pill btn-secondary" type="button"
                                            title="btn btn-pill btn-primary">Decline</button>
                                    </div>
                                    <div class="show-btn"><a href="index.html"> <span>Show</span></a></div>
                                </li>
                                <li>
                                    <div class="user-notification">
                                        <div><img src="{{ asset('assets/images/avtar/19.jpg') }}" alt="avatar"></div>
                                        <div class="user-description">
                                            <a href="letter-box.html">
                                                <h4>Congrats! you all task for today.</h4>
                                            </a><span>Today 06:55pm</span>
                                        </div>
                                    </div>
                                    <div class="notification-btn">
                                        <button class="btn btn-pill btn-primary" type="button"
                                            title="btn btn-pill btn-primary">Accpet</button>
                                        <button class="btn btn-pill btn-secondary" type="button"
                                            title="btn btn-pill btn-primary">Decline</button>
                                    </div>
                                    <div class="show-btn"> <a href="index.html"> <span>Show</span></a></div>
                                </li>
                                <li> <a class="f-w-700" href="letter-box.html">Check all </a></li>
                            </ul>
                        </div>
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
                    <div class="d-flex align-items-center profile-media"><img class="b-r-25"
                            src="{{ asset('assets/images/dashboard/profile.png') }}" alt="">
                        <div class="flex-grow-1 user"><span>Helen Walter</span>
                            <p class="mb-0 font-nunito">Admin
                                <svg>
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#header-arrow-down') }}"></use>
                                </svg>
                            </p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li><a href="user-profile.html"><i data-feather="user"></i><span>Account </span></a>
                        </li>
                        <li><a href="letter-box.html"><i data-feather="mail"></i><span>Inbox</span></a></li>
                        <li><a href="task.html"><i data-feather="file-text"></i><span>Taskboard</span></a>
                        </li>
                        <li><a href="edit-profile.html"><i data-feather="settings"></i><span>Settings</span></a></li>
                        <li><a href="login.html"> <i data-feather="log-in"></i><span>Log Out</span></a></li>
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
