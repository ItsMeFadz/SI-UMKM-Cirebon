@include('landing.head')

<body>

    <!-- Scroll-top -->
    @include('landing.layouts.partials.scroll')
    <!-- Scroll-top-end-->

    <!-- header-area-start -->
    @include('landing.layouts.partials.navbar')
    <!-- header-area-end -->

    <main>

        {{-- <div class="breadcrumb__area pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-breadcrumb__content">
                            <div class="tp-breadcrumb__list">
                                <span class="tp-breadcrumb__active"><a href="index.html">Home</a></span>
                                <span class="dvdr">/</span>
                                <span>Contact Us</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- choose-area-start -->
       
        <!-- contact-area-end -->

        <!-- map-area-start -->
        <section class="map-area tpmap__box mt-30">
            <div class="container">
                <div class="row gx-0">
                    <div class="col-lg-6 col-md-6 order-2 order-md-1">
                        <div class="tpmap__wrapper">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126791.07733283179!2d108.47163598342038!3d-6.742855690648015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee2649e6e5bbb%3A0x70a07638a7fe12fe!2sCirebon%2C%20Kota%20Cirebon%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1742298685558!5m2!1sid!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 order-1 order-md-2">
                        <div class="tpform__wrapper pt-60 pb-80 ml-60">
                            <h4 class="tpform__title">Tinggalkan Pesan</h4>
                            <p>Kami akan sangat berterimakasih dan menerima masukan yang diberikan oleh anda</p>
                            <div class="tpform__box">
                                <form action="{{ route('send.message') }}" method="POST">
                                    @csrf
                                    <div class="row gx-7">
                                        <div class="col-lg-6">
                                            <div class="tpform__input mb-20">
                                                <input type="text" name="name" placeholder="Your Name *" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="tpform__input mb-20">
                                                <input type="email" name="email" placeholder="Your Email *" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="tpform__input mb-20">
                                                <input type="text" name="subject" placeholder="Subject *" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="tpform__input mb-20">
                                                <input type="text" name="phone" placeholder="Phone">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="tpform__textarea">
                                                <textarea name="message" placeholder="Message" required></textarea>
                                                <button type="submit">Send message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('landing.layouts.partials.footer')
    <!-- footer-area-end -->

    <!-- JS here -->
    @include('landing.layouts.partials.script')
</body>

</html>
