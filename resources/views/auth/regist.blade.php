@include('layouts.head')

<body>
    @include('layouts.partials.loader')
    <!-- login page start-->
    @include('component.SweetAlert')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="login-card login-dark">
                    <div class="col-xl-8">
                        <div class="card height-equal">
                            <div class="card-header">
                                <h4 class="text-center mb-3">Register</h4>
                            </div>
                            <div class="card-body basic-wizard important-validation">
                                <div class="stepper-horizontal custom-scrollbar" id="stepper1">
                                    <div class="stepper-one stepper step editing active">
                                        <div class="step-circle"><span>1</span></div>
                                        <div class="step-title">Account Info</div>
                                        <div class="step-bar-left"></div>
                                        <div class="step-bar-right"></div>
                                    </div>
                                    <div class="stepper-two step">
                                        <div class="step-circle"><span>2</span></div>
                                        <div class="step-title">Profil Info</div>
                                        <div class="step-bar-left"></div>
                                        <div class="step-bar-right"></div>
                                    </div>
                                    <div class="stepper-three step">
                                        <div class="step-circle"><span>3</span></div>
                                        <div class="step-title">Contact Info</div>
                                        <div class="step-bar-left"></div>
                                        <div class="step-bar-right"></div>
                                    </div>
                                    <div class="stepper-four step">
                                        <div class="step-circle"><span>4</span></div>
                                        <div class="step-title">Finish</div>
                                        <div class="step-bar-left"></div>
                                        <div class="step-bar-right"></div>
                                    </div>
                                </div>
                                <div id="msform">
                                    <form class="needs-validation" novalidate="" action="/registrasi/proses"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        {{-- Form Step 1 --}}
                                        <div class="step-content stepper-one-content row g-3">
                                            <div class="col-sm-6">
                                                <label class="form-label" for="email-basic-wizard">Email<span
                                                        class="txt-danger">*</span></label>
                                                <input class="form-control" id="email-basic-wizard" type="email"
                                                    required="" placeholder="Zono@gmail.com" name="email"
                                                    value="{{ old('email') }}">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label" for="firstnamewizard">Nama Lengkap<span
                                                        class="txt-danger">*</span></label>
                                                <input class="form-control" id="firstnamewizard" type="text"
                                                    required="" placeholder="Enter your name" name="name"
                                                    value="{{ old('name') }}">
                                            </div>
                                            <div class="col-xxl-4 col-sm-6">
                                                <label class="col-sm-6 form-label" for="passwordwizard">Password<span
                                                        class="txt-danger">*</span></label>
                                                <input class="form-control" id="passwordwizard" type="password"
                                                    placeholder="Enter password" required="" name="password"
                                                    value="{{ old('password') }}">
                                            </div>
                                            <div class="col-xxl-4 col-sm-6">
                                                <label class="col-sm-6 form-label" for="confirmpasswordwizard">Confirm
                                                    Password<span class="txt-danger">*</span></label>
                                                <input class="form-control" id="confirmpasswordwizard" type="password"
                                                    placeholder="Enter confirm password" required=""
                                                    name="password_confirmation"
                                                    value="{{ old('password_confirmation') }}">
                                            </div>
                                            <div class="col-xxl-4">
                                                <label class="form-label" for="firstnamewizard">Role<span
                                                        class="txt-danger">*</span></label>
                                                <select class="form-select" name="role">
                                                    <option selected disabled>--- Pilih Role ---</option>
                                                    <option value="0" {{ old('role') == '0' ? 'selected' : '' }}>
                                                        Admin</option>
                                                    <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>
                                                        Penjual</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" id="terms-step1" type="checkbox"
                                                        name="terms_step1">
                                                    <label class="form-check-label mb-0" for="terms-step1">
                                                        Agree to terms and conditions
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Form Step 2 --}}
                                        <div class="step-content stepper-two-content row g-3">
                                            <div class="col-md-12">
                                                <label class="form-label" for="placeholdername1">Nama UMKM<span
                                                        class="txt-danger">*</span></label>
                                                <input class="form-control" id="placeholdername1" type="text"
                                                    required="" placeholder="Placeholder name" name="nama_umkm"
                                                    value="{{ old('nama_umkm') }}">
                                            </div>
                                            <div class="col-xxl-4 col-sm-6">
                                                <label class="form-label" for="cardNumber01">Kategori UMKM<span
                                                        class="txt-danger">*</span></label>
                                                <select class="form-select" name="id_kategori" required>
                                                    <option selected disabled>--- Pilih Kategori ---</option>
                                                    @foreach ($kat as $item)
                                                        <option value="{{ $item->id_kategori }}"
                                                            {{ old('id_kategori') == $item->id_kategori ? 'selected' : '' }}>
                                                            {{ ucfirst($item->nama_kategori) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xxl-4 col-sm-6">
                                                <label class="form-label" for="expirationDates01">Kabupaten<span
                                                        class="txt-danger">*</span></label>
                                                <select class="form-select" name="id_kabupaten" required>
                                                    <option selected disabled>--- Pilih Kabupaten ---</option>
                                                    @foreach ($kab as $item)
                                                        <option value="{{ $item->id_kabupaten }}"
                                                            {{ old('id_kabupaten') == $item->id_kabupaten ? 'selected' : '' }}>
                                                            {{ ucfirst($item->nama_kabupaten) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xxl-4">
                                                <label class="form-label" for="cvvNumber-a">Kecamatan<span
                                                        class="txt-danger">*</span></label>
                                                <select class="form-select" name="id_kecamatan" required>
                                                    <option selected disabled>--- Pilih Kecamatan ---</option>
                                                    @foreach ($kec as $item)
                                                        <option value="{{ $item->id_kecamatan }}"
                                                            {{ old('id_kecamatan') == $item->id_kecamatan ? 'selected' : '' }}>
                                                            {{ ucfirst($item->nama_kecamatan) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label" for="givefeedback">Alamat Lengkap<span
                                                        class="txt-danger">*</span></label>
                                                <textarea class="form-control" id="givefeedback" required="" name="alamat">{{ old('alamat') }}</textarea>
                                                <div class="invalid-feedback">Please enter a message in the textarea.
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="info-correct-step2"
                                                            type="checkbox" name="info_correct_step2">
                                                        <label class="form-check-label" for="info-correct-step2">
                                                            All the above information is correct
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Form Step 3 --}}
                                        <div class="step-content stepper-three-content row g-3">
                                            <div class="col-6">
                                                <label class="form-label" for="formFileDocument">Foto Profil UMKM<span
                                                        class="txt-danger">*</span></label>
                                                <input class="form-control" id="formFileDocument" type="file"
                                                    aria-label="file example" required="" name="foto_profil_umkm">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label" for="email-basic">Link WhatsApp<span
                                                        class="txt-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text">+62</span>
                                                    <input type="text" class="form-control"
                                                        name="link_wa" value="{{ old('link_wa') }}" pattern="[0-9]*"
                                                        inputmode="numeric">
                                                </div>
                                                <div class="invalid-feedback">Please enter your WhatsApp link</div>
                                                <div class="valid-feedback">Looks Good!</div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label" for="marketplace-link">Link Eccomerce
                                                    (Opsional)</label>
                                                <input class="form-control" id="marketplace-link" type="text"
                                                    placeholder="https://shoope" name="link_marketplace"
                                                    value="{{ old('link_marketplace') }}">
                                                <div class="invalid-feedback">Please enter a valid link</div>
                                                <div class="valid-feedback">Looks Good!</div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label" for="gmaps-link">Lokasi UMKM
                                                    (Gmaps)</label>
                                                <input class="form-control" id="gmaps-link" type="text"
                                                    placeholder="https://gmaps" name="link_gmaps"
                                                    value="{{ old('link_gmaps') }}">
                                                <div class="invalid-feedback">Please enter a valid link</div>
                                                <div class="valid-feedback">Looks Good!</div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" id="terms-step3" type="checkbox"
                                                        name="terms_step3">
                                                    <label class="form-check-label mb-0" for="terms-step3">
                                                        Agree to terms and conditions
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Form Step 4 --}}
                                        <div class="step-content stepper-four-content row g-3">
                                            <div class="col-12 m-0">
                                                <div class="successful-form"><img class="img-fluid"
                                                        src="{{ asset('assets/images/gif/dashboard-8/successful.gif') }}"
                                                        alt="successful">
                                                    <h3>Congratulations </h3>
                                                    <p>Well done! You have successfully completed. </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wizard-footer d-flex gap-2 justify-content-end">
                                            <button class="btn alert-light-primary" id="backbtn"
                                                onclick="backStep()">
                                                Back</button>
                                            <button class="btn btn-primary" id="nextbtn"
                                                onclick="nextStep()">Next</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <!-- Bootstrap js-->
        <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/form-wizard/form-wizard.js') }}"></script>
        <script src="{{ asset('assets/js/form-wizard/image-upload.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>
    </div>
</body>
