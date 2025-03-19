@include('layouts.head')

<body>
    @include('layouts.partials.loader')
    <!-- login page start-->
    @include('component.SweetAlert')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div class="login-main">
                            <form class="theme-form" action="{{ route('login_proses') }}" method="POST">
                                @csrf
                                <h3>Sign in to account</h3>
                                <p>Enter your email & password to login</p>
                                <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input class="form-control" type="email" name="email" required=""
                                        placeholder="Test@gmail.com" value="{{ old('email') }}">
                                    @error('email')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input id="password-input" class="form-control" type="password" required=""
                                            placeholder="*********" name="password">
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                        <div class="show-hide" onclick="togglePassword()">
                                            <span class="show"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox">
                                        <label class="text-muted" for="checkbox1">Remember password</label>
                                    </div><a class="link" href="forget-password.html">Forgot password?</a>
                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                                    </div>
                                </div>
                                {{-- <h6 class="text-muted mt-4 or">Or Sign in with</h6>
                                <div class="social mt-4">
                                    <div class="btn-showcase"><a class="btn btn-light"
                                            href="https://www.linkedin.com/login" target="_blank"><i
                                                class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a
                                            class="btn btn-light" href="https://twitter.com/login?lang=en"
                                            target="_blank"><i class="txt-twitter"
                                                data-feather="twitter"></i>twitter</a><a class="btn btn-light"
                                            href="https://www.facebook.com/" target="_blank"><i class="txt-fb"
                                                data-feather="facebook"></i>facebook</a></div>
                                </div> --}}
                                <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2"
                                        href="/registrasi">Create Account</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ 'assets/js/jquery.min.js' }}"></script>
        <script src="{{ 'assets/js/bootstrap/bootstrap.bundle.min.js' }}"></script>
        <script src="{{ 'assets/js/icons/feather-icon/feather.min.js' }}"></script>
        <script src="{{ 'assets/js/icons/feather-icon/feather-icon.js' }}"></script>
        <script src="{{ 'assets/js/config.js' }}"></script>
        <script>
            function togglePassword() {
                let passwordInput = document.getElementById("password-input");
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                } else {
                    passwordInput.type = "password";
                }
            }
        </script>
        <script src="{{ 'assets/js/script.js' }}"></script>
    </div>
</body>
