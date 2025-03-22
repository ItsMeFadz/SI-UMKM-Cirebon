(function($) {
    "use strict";

    var windowOn = $(window);


    ///////////////////////////////////////////////////
    // 01.  z-index to top
    var democol = $('.tpproduct__shop-item .col');
    democol.on({
        mouseenter: function() {
            $(this).siblings().stop().css('z-index', '-1');
        },
        mouseleave: function() {
            $(this).siblings().stop().css('z-index', '1');
        }
    });


    ///////////////////////////////////////////////////
    // 02.  z-index to top
    var democol = $('.sidebar-product-hover .tpproduct');
    democol.on({
        mouseenter: function() {
            $(this).siblings().stop().css('z-index', '-1');
        },
        mouseleave: function() {
            $(this).siblings().stop().css('z-index', '1');
        }
    });


    ////////////////////////////////////////////////////
    // 03. Swiper Js
    $('.cart-minus').on('click', function() {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });

    $('.cart-plus').on('click', function() {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });


    ////////////////////////////////////////////////////
    // 04. Show Login Toggle Js
    $('#showlogin').on('click', function() {
        $('#checkout-login').slideToggle(900);
    });

    ////////////////////////////////////////////////////
    // 05. Show Coupon Toggle Js
    $('#showcoupon').on('click', function() {
        $('#checkout_coupon').slideToggle(900);
    });

    ////////////////////////////////////////////////////
    // 06. Create An Account Toggle Js
    $('#cbox').on('click', function() {
        $('#cbox_info').slideToggle(900);
    });

    ////////////////////////////////////////////////////
    // 07. Shipping Box Toggle Js
    $('#ship-box').on('click', function() {
        $('#ship-box-info').slideToggle(1000);
    });


    ///////////////////////////////////////////////////
    // 08.  Scroll to top
    windowOn.on('scroll', function() {
        var scroll = windowOn.scrollTop();
        if (scroll < 245) {
            $('.scroll-to-target').removeClass('open');

        } else {
            $('.scroll-to-target').addClass('open');
        }
    });


    ///////////////////////////////////////////////////
    // 09. Scroll Up Js
    if ($('.scroll-to-target').length) {
        $(".scroll-to-target").on('click', function() {
            var target = $(this).attr('data-target');
            // animate
            $('html, body').animate({
                scrollTop: $(target).offset().top
            }, 1000);

        });
    }


    ////////////////////////////////////////////////////
    // 10. Nice Select Js
    $('select').niceSelect();


    ////////////////////////////////////////////////////
    // 11. Data CSS Js
    $("[data-background").each(function() {
        $(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
    });


    ///////////////////////////////////////////////////
    // 12. Sticky Header Js
    windowOn.on('scroll', function() {
        var scroll = windowOn.scrollTop();
        if (scroll < 250) {
            $("#header-sticky").removeClass("header-sticky");
        } else {
            $("#header-sticky").addClass("header-sticky");
        }
    });


    ///////////////////////////////////////////////////
    // 13. Sticky Header Js
    windowOn.on('scroll', function() {
        var scroll = windowOn.scrollTop();
        if (scroll < 250) {
            $("#header-sticky-2").removeClass("header-sticky");
        } else {
            $("#header-sticky-2").addClass("header-sticky");
        }
    });


    ////////////////////////////////////////////////////
    // 14. Parallax pera
    if ($(".pera").length) {
        var pera = $('.pera').get(0);
        var parallaxInstance = new Parallax(pera);
    }
    if ($(".pera2").length) {
        var pera = $('.pera2').get(0);
        var parallaxInstance = new Parallax(pera);
    }
    if ($(".pera3").length) {
        var pera = $('.pera3').get(0);
        var parallaxInstance = new Parallax(pera);
    }
    if ($(".pera4").length) {
        var pera = $('.pera4').get(0);
        var parallaxInstance = new Parallax(pera);
    }
    if ($(".pera5").length) {
        var pera = $('.pera5').get(0);
        var parallaxInstance = new Parallax(pera);
    }
    if ($(".pera6").length) {
        var pera = $('.pera6').get(0);
        var parallaxInstance = new Parallax(pera);
    }


    ////////////////////////////////////////////////////
    // 15. Header Search
    $(".header-search").on('click', function() {
        $(".search-popup-wrap").slideToggle();
        return false;
    });

    $(".search-close").on('click', function() {
        $(".search-popup-wrap").slideUp(500);
    });


    ////////////////////////////////////////////////////
    // 16. Sidebar Js
    $(".tp-search-toggle").on("click", function() {
        $(".tp-sidebar-area").addClass("tp-searchbar-opened");
        $(".search-body-overlay").addClass("opened");
    });
    $(".tpsearchbar__close").on("click", function() {
        $(".tp-sidebar-area").removeClass("tp-searchbar-opened");
        $(".search-body-overlay").removeClass("opened");
    });
    $(".search-body-overlay").on("click", function() {
        $(".tp-sidebar-area").removeClass("tp-searchbar-opened");
        $(".search-body-overlay").removeClass("opened");
    });


    ////////////////////////////////////////////////////
    // 17. Sidebar Js
    $(".tp-cart-toggle").on("click", function() {
        $(".tp-cart-info-area").addClass("tp-sidebar-opened");
        $(".cartbody-overlay").addClass("opened");
    });
    $(".tpcart__close").on("click", function() {
        $(".tp-cart-info-area").removeClass("tp-sidebar-opened");
        $(".cartbody-overlay").removeClass("opened");
    });
    $(".cartbody-overlay").on("click", function() {
        $(".tp-cart-info-area").removeClass("tp-sidebar-opened");
        $(".cartbody-overlay").removeClass("opened");
    });


    ////////////////////////////////////////////////////
    // 18. Mobile Menu Js
    $('#mobile-menu').meanmenu({
        meanMenuContainer: '.mobile-menu',
        meanScreenWidth: "1199",
        meanExpand: ['<i class="fal fa-plus"></i>'],
    });


    ////////////////////////////////////////////////////
    // 19. Sidebar Js
    $(".tp-menu-toggle").on("click", function() {
        $(".tpsideinfo").addClass("tp-sidebar-opened");
        $(".body-overlay").addClass("opened");
    });
    $(".tpsideinfo__close").on("click", function() {
        $(".tpsideinfo").removeClass("tp-sidebar-opened");
        $(".body-overlay").removeClass("opened");
    });
    $(".body-overlay").on("click", function() {
        $(".tpsideinfo").removeClass("tp-sidebar-opened");
        $(".body-overlay").removeClass("opened");
    });


    ////////////////////////////////////////////////////
    // 20. Data Countdown Js
    $('[data-countdown]').each(function() {
        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('<span class="cdown days"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hour</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Minute</p></span> <span class="cdown second"> <span><span class="time-count">%S</span> <p>Second</p></span>'));
        });
    });

    ///////////////////////////////////////////////////
    // 21. Magnific Js
    $(".popup-video").magnificPopup({
        type: "iframe",
    });


    ////////////////////////////////////////////////////
    // 22. magnificPopup Js
    $('.popup-image').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    ////////////////////////////////////////////////////
    // 23. Slider Js
    var categoryswiper = new Swiper('.category-active', {
        // Optional parameters
        loop: false,
        slidesPerView: 8,
        spaceBetween: 20,
        autoplay: {
            delay: 3500,
            disableOnInteraction: true,
        },
        breakpoints: {
            '1400': {
                slidesPerView: 8,
            },
            '1200': {
                slidesPerView: 6,
            },
            '992': {
                slidesPerView: 5,
            },
            '768': {
                slidesPerView: 4,
            },
            '576': {
                slidesPerView: 3,
            },
            '0': {
                slidesPerView: 2,
            },
        },
    });


    ////////////////////////////////////////////////////
    // 24. Slider Js
    var categoryswiper = new Swiper('.inner-category-active', {
        // Optional parameters
        loop: false,
        slidesPerView: 7,
        spaceBetween: 20,
        autoplay: {
            delay: 3500,
            disableOnInteraction: true,
        },
        breakpoints: {
            '1400': {
                slidesPerView: 7,
            },
            '1200': {
                slidesPerView: 6,
            },
            '992': {
                slidesPerView: 5,
            },
            '768': {
                slidesPerView: 4,
            },
            '576': {
                slidesPerView: 3,
            },
            '0': {
                slidesPerView: 2,
            },
        },
    });



    ////////////////////////////////////////////////////
    // 25. Slider Js
    var categoryswiper = new Swiper('.inner-category-two', {
        // Optional parameters
        loop: false,
        slidesPerView: 9,
        spaceBetween: 20,
        autoplay: {
            delay: 3500,
            disableOnInteraction: true,
        },
        breakpoints: {
            '1400': {
                slidesPerView: 9,
            },
            '1200': {
                slidesPerView: 6,
            },
            '992': {
                slidesPerView: 5,
            },
            '768': {
                slidesPerView: 4,
            },
            '576': {
                slidesPerView: 3,
            },
            '0': {
                slidesPerView: 2,
            },
        },
    });


    ////////////////////////////////////////////////////
    // 26. Slider Js
    var categoryswiper = new Swiper('.inner-category-three', {
        // Optional parameters
        loop: false,
        slidesPerView: 9,
        spaceBetween: 20,
        autoplay: {
            delay: 3500,
            disableOnInteraction: true,
        },
        breakpoints: {
            '1400': {
                slidesPerView: 9,
            },
            '1200': {
                slidesPerView: 6,
            },
            '992': {
                slidesPerView: 5,
            },
            '768': {
                slidesPerView: 4,
            },
            '576': {
                slidesPerView: 3,
            },
            '0': {
                slidesPerView: 2,
            },
        },
    });


    ////////////////////////////////////////////////////
    // 27. Slider Js
    var tpproductswiper = new Swiper('.tpproduct-active', {
        // Optional parameters
        loop: true,
        slidesPerView: 6,
        spaceBetween: 20,
        observer: true,
        observeParents: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: true,
        },
        breakpoints: {
            '1200': {
                slidesPerView: 6,
            },
            '992': {
                slidesPerView: 4,
            },
            '768': {
                slidesPerView: 3,
            },
            '576': {
                slidesPerView: 1,
            },
            '0': {
                slidesPerView: 1,
            },
        },
        // Navigation arrows
        navigation: {
            nextEl: '.tpproduct-btn__nxt',
            prevEl: '.tpproduct-btn__prv',
        },
    });


    ////////////////////////////////////////////////////
    // 28. Slider Js
    var tpblogswiper = new Swiper('.tpblog-active', {
        // Optional parameters
        loop: false,
        slidesPerView: 4,
        spaceBetween: 20,
        autoplay: {
            delay: 5000,
            disableOnInteraction: true,
        },
        breakpoints: {
            '1200': {
                slidesPerView: 4,
            },
            '992': {
                slidesPerView: 3,
            },
            '768': {
                slidesPerView: 2,
            },
            '576': {
                slidesPerView: 2,
            },
            '0': {
                slidesPerView: 1,
            },
        },
    });


    ////////////////////////////////////////////////////
    // 29. Slider Js
    var tpblogswiper = new Swiper('.tpblog-active-2', {
        // Optional parameters
        loop: false,
        slidesPerView: 3,
        spaceBetween: 20,
        autoplay: {
            delay: 5000,
            disableOnInteraction: true,
        },
        breakpoints: {
            '1200': {
                slidesPerView: 3,
            },
            '992': {
                slidesPerView: 3,
            },
            '768': {
                slidesPerView: 2,
            },
            '576': {
                slidesPerView: 2,
            },
            '0': {
                slidesPerView: 1,
            },
        },
    });



    ////////////////////////////////////////////////////
    // 30. Slider Js
    var categoryswiper = new Swiper('.blog-active-3', {
        // Optional parameters
        loop: false,
        slidesPerView: 3,
        spaceBetween: 30,
        autoplay: {
            delay: 3500,
            disableOnInteraction: true,
        },
        breakpoints: {
            '1400': {
                slidesPerView: 3,
            },
            '1200': {
                slidesPerView: 3,
            },
            '992': {
                slidesPerView: 3,
            },
            '768': {
                slidesPerView: 2,
            },
            '576': {
                slidesPerView: 2,
            },
            '0': {
                slidesPerView: 1,
            },
        },
    });


    ////////////////////////////////////////////////////
    // 31. Slider Js
    var sliderswiper = new Swiper('.slider-active', {
        // Optional parameters
        loop: true,
        slidesPerView: 1,
        fade: true,
        effect: "fade",
        autoplay: {
            delay: 3500,
            disableOnInteraction: true,
        },
        // Navigation arrows
        navigation: {
            nextEl: '.tpslider__arrow-prv',
            prevEl: '.tpslider__arrow-nxt',
        },
        pagination: {
            el: ".slider-pagination",
            clickable: true,
        },
    });


    ////////////////////////////////////////////////////
    // 32. Slider Js
    var tpproductswiper = new Swiper('.tpproduct-active-2', {
        // Optional parameters
        loop: false,
        slidesPerView: 5,
        spaceBetween: 20,
        observer: true,
        observeParents: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: true,
        },
        breakpoints: {
            '1200': {
                slidesPerView: 5,
            },
            '992': {
                slidesPerView: 4,
            },
            '768': {
                slidesPerView: 2,
            },
            '576': {
                slidesPerView: 1,
            },
            '0': {
                slidesPerView: 1,
            },
        },
        // Navigation arrows
        navigation: {
            nextEl: '.tpproduct-arrow-left',
            prevEl: '.tpproduct-arrow-right',
        },
    });


    ////////////////////////////////////////////////////
    // 33. Slider Js
    var tpproductswiper = new Swiper('.tpproduct-active-3', {
        // Optional parameters
        loop: false,
        slidesPerView: 5,
        spaceBetween: 20,
        observer: true,
        observeParents: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: true,
        },
        breakpoints: {
            '1200': {
                slidesPerView: 5,
            },
            '992': {
                slidesPerView: 4,
            },
            '768': {
                slidesPerView: 2,
            },
            '576': {
                slidesPerView: 1,
            },
            '0': {
                slidesPerView: 1,
            },
        },
        // Navigation arrows
        navigation: {
            nextEl: '.tpproduct-arrow-left-2',
            prevEl: '.tpproduct-arrow-right-2',
        },
    });

    ////////////////////////////////////////////////////
    // 34. Slider Js
    var tpproductswiper = new Swiper('.tpproduct-active-4', {
        // Optional parameters
        loop: true,
        slidesPerView: 7,
        spaceBetween: 20,
        observer: true,
        observeParents: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: true,
        },
        breakpoints: {
            '1600': {
                slidesPerView: 7,
            },
            '1400': {
                slidesPerView: 5,
            },
            '1200': {
                slidesPerView: 5,
            },
            '992': {
                slidesPerView: 4,
            },
            '768': {
                slidesPerView: 2,
            },
            '576': {
                slidesPerView: 1,
            },
            '0': {
                slidesPerView: 1,
            },
        },
        // Navigation arrows
        navigation: {
            nextEl: '.tpproduct-btn__nxt4',
            prevEl: '.tpproduct-btn__prv4',
        },
    });

    ////////////////////////////////////////////////////
    // 35. Slider Js
    var tpproductswiper = new Swiper('.tpproduct-active-5', {
        // Optional parameters
        loop: true,
        slidesPerView: 4,
        spaceBetween: 20,
        observer: true,
        observeParents: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: true,
        },
        breakpoints: {
            '1600': {
                slidesPerView: 4,
            },
            '1400': {
                slidesPerView: 4,
            },
            '1200': {
                slidesPerView: 4,
            },
            '992': {
                slidesPerView: 4,
            },
            '768': {
                slidesPerView: 3,
            },
            '576': {
                slidesPerView: 1,
            },
            '0': {
                slidesPerView: 1,
            },
        },
    });


    ////////////////////////////////////////////////////
    // 36. Slider Js
    var tpproductswiper = new Swiper('.tpproduct-active-6', {
        // Optional parameters
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        observer: true,
        observeParents: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: true,
        },
        breakpoints: {
            '1600': {
                slidesPerView: 1,
            },
            '1400': {
                slidesPerView: 1,
            },
            '1200': {
                slidesPerView: 1,
            },
            '992': {
                slidesPerView: 2,
            },
            '768': {
                slidesPerView: 2,
            },
            '576': {
                slidesPerView: 1,
            },
            '0': {
                slidesPerView: 1,
            },
        },
    });


    ////////////////////////////////////////////////////
    // 37. Slider Js
    var tpproductswiper = new Swiper('.highlights-active', {
        // Optional parameters
        loop: true,
        slidesPerView: 3,
        spaceBetween: 20,
        observer: true,
        observeParents: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: true,
        },
        breakpoints: {
            '1200': {
                slidesPerView: 3,
            },
            '992': {
                slidesPerView: 2,
            },
            '768': {
                slidesPerView: 2,
            },
            '576': {
                slidesPerView: 1,
            },
            '0': {
                slidesPerView: 1,
            },
        },
    });


    ////////////////////////////////////////////////////
    // 38. Slider Js
    var tptestimonial = new Swiper('.tptestimonial-active', {
        // Optional parameters
        loop: true,
        slidesPerView: 1,
        observer: true,
        observeParents: true,
        fade: true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: true,
        },
        breakpoints: {
            '1200': {
                slidesPerView: 1,
            },
            '992': {
                slidesPerView: 1,
            },
            '768': {
                slidesPerView: 1,
            },
            '576': {
                slidesPerView: 1,
            },
            '0': {
                slidesPerView: 1,
            },
        },
        // Navigation arrows
        navigation: {
            nextEl: '.tptestimonial-arrow-right',
            prevEl: '.tptestimonial-arrow-left',
        },
    });


    ////////////////////////////////////////////////////
    // 39. Slider Js
    var tptestimonial = new Swiper('.product-details-active', {
        // Optional parameters
        loop: false,
        slidesPerView: 6,
        observer: true,
        observeParents: true,
        spaceBetween: 40,
        autoplay: {
            delay: 3500,
            disableOnInteraction: true,
        },
        breakpoints: {
            '1200': {
                slidesPerView: 6,
            },
            '992': {
                slidesPerView: 4,
            },
            '768': {
                slidesPerView: 3,
            },
            '576': {
                slidesPerView: 1,
            },
            '0': {
                slidesPerView: 1,
            },
        },
        // Navigation arrows
        navigation: {
            nextEl: '.tptestimonial-arrow-right',
            prevEl: '.tptestimonial-arrow-left',
        },
    });


    ////////////////////////////////////////////////////
    // 40. Slider Js
    var tptestimonial = new Swiper('.tptestimonial-active2', {
        // Optional parameters
        loop: true,
        slidesPerView: 3,
        observer: true,
        observeParents: true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: true,
        },
        breakpoints: {
            '1400': {
                slidesPerView: 3,
            },
            '1200': {
                slidesPerView: 3,
            },
            '992': {
                slidesPerView: 1,
            },
            '768': {
                slidesPerView: 1,
            },
            '576': {
                slidesPerView: 1,
            },
            '0': {
                slidesPerView: 1,
            },
        },
        // Navigation arrows
        navigation: {
            nextEl: '.tptestimonial__nxt',
            prevEl: '.tptestimonial__prv',
        },
    });


    ////////////////////////////////////////////////////
    // 41. Slider Js
    var tptestimonial = new Swiper('.tptestimonial-active3', {
        // Optional parameters
        loop: true,
        slidesPerView: 3,
        observer: true,
        observeParents: true,
        spaceBetween: 30,
        autoplay: {
            delay: 3500,
            disableOnInteraction: true,
        },
        breakpoints: {
            '1400': {
                slidesPerView: 3,
            },
            '1200': {
                slidesPerView: 3,
            },
            '992': {
                slidesPerView: 2,
            },
            '768': {
                slidesPerView: 1,
            },
            '576': {
                slidesPerView: 1,
            },
            '0': {
                slidesPerView: 1,
            },
        },
        // Navigation arrows
        navigation: {
            nextEl: '.tptestimonial__nxt',
            prevEl: '.tptestimonial__prv',
        },
    });


    ////////////////////////////////////////////////////
    // 42. Slider Js
    var tptestimonial = new Swiper('.tpinsta-active', {
        // Optional parameters
        loop: false,
        slidesPerView: 6,
        spaceBetween: 10,
        observer: true,
        observeParents: true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: true,
        },
        breakpoints: {
            '1400': {
                slidesPerView: 6,
            },
            '1200': {
                slidesPerView: 5,
            },
            '992': {
                slidesPerView: 4,
            },
            '768': {
                slidesPerView: 3,
            },
            '576': {
                slidesPerView: 2,
            },
            '0': {
                slidesPerView: 1,
            },
        },
    });


    ////////////////////////////////////////////////////
    // 43. Slider Js
    var tptestimonial = new Swiper('.tp-slider6', {
        // Optional parameters
        loop: true,
        slidesPerView: 1,
        observer: true,
        observeParents: true,
        fade: true,
        effect: "fade",
        autoplay: {
            delay: 3500,
            disableOnInteraction: true,
        },
        // Navigation arrows
        navigation: {
            nextEl: '.tpslider__nxt6',
            prevEl: '.tpslider__prv6',
        },
        pagination: {
            el: ".slider-pagination-6",
            clickable: true,
        },
    });


    ////////////////////////////////////////////////////
    // 44. Price Filter Js
    if ($("#slider-range").length) {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 1000000, // Ganti batas maksimum sesuai kebutuhan
            step: 20000,
            values: [0, 500000], // Sesuaikan dengan batas harga default
            slide: function(event, ui) {
                $("#amount").val("Rp " + ui.values[0].toLocaleString('id-ID') + " - Rp " + ui.values[1].toLocaleString('id-ID'));
            }
        });

        $("#amount").val(
            "Rp " + $("#slider-range").slider("values", 0).toLocaleString('id-ID') +
            " - Rp " + $("#slider-range").slider("values", 1).toLocaleString('id-ID')
        );

        $('#filter-btn').on('click', function() {
            $('.filter-widget').slideToggle(1000);
        });
    }
    

})(jQuery);


// Pag
document.addEventListener('DOMContentLoaded', function() {
    // Configuration
    const itemsPerPage = 8;
    let currentPage = 1;

    // Get all product elements
    const initPagination = function(tabId) {
        let products = [];

        // Handle different product container structures for different tabs
        if (tabId === 'nav-product') {
            // For list view, products are direct children of the tab pane
            const productTab = document.getElementById(tabId);
            if (!productTab) return;

            // Get all row elements that contain products
            products = Array.from(productTab.querySelectorAll('.row'));
        } else {
            // For grid views, products are in the shop-item container
            const productContainer = document.querySelector(`#${tabId} .tpproduct__shop-item`);
            if (!productContainer) return;

            products = Array.from(productContainer.querySelectorAll('.col'));
        }

        const totalPages = Math.ceil(products.length / itemsPerPage);

        // Create pagination
        updatePagination(tabId, totalPages);

        // Show initial page
        showPage(products, currentPage, itemsPerPage);

        // Add event listeners to pagination
        const paginationContainer = document.querySelector(`#${tabId} .basic-pagination`);
        if (paginationContainer) {
            paginationContainer.addEventListener('click', function(e) {
                e.preventDefault();
                if (e.target.tagName === 'A' || e.target.tagName === 'I') {
                    const pageLink = e.target.closest('a');
                    if (pageLink) {
                        // Next page button
                        if (pageLink.querySelector('.icon-chevrons-right') || e.target.classList
                            .contains('icon-chevrons-right')) {
                            if (currentPage < totalPages) {
                                currentPage++;
                            }
                        } else {
                            // Number page button
                            const pageNum = parseInt(pageLink.textContent);
                            if (!isNaN(pageNum)) {
                                currentPage = pageNum;
                            }
                        }

                        showPage(products, currentPage, itemsPerPage);
                        updateActivePage(tabId, currentPage);
                        updateProductCount(tabId, products.length);
                    }
                }
            });
        }

        // Update product count on initial load
        updateProductCount(tabId, products.length);
    };

    // Function to display products for current page
    const showPage = function(products, page, itemsPerPage) {
        const startIndex = (page - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;

        products.forEach((product, index) => {
            if (index >= startIndex && index < endIndex) {
                product.style.display = '';
            } else {
                product.style.display = 'none';
            }
        });
    };

    // Function to update pagination links
    const updatePagination = function(tabId, totalPages) {
        const paginationContainer = document.querySelector(`#${tabId} .basic-pagination ul`);
        if (!paginationContainer) return;

        let paginationHTML = '';

        // First page (always active initially)
        paginationHTML += `<li><span class="current">1</span></li>`;

        // Middle pages
        for (let i = 2; i <= totalPages; i++) {
            paginationHTML += `<li><a href="#">${i}</a></li>`;
        }

        // Next button (if more than one page)
        if (totalPages > 1) {
            paginationHTML += `
        <li>
            <a href="#">
                <i class="icon-chevrons-right"></i>
            </a>
        </li>
    `;
        }

        paginationContainer.innerHTML = paginationHTML;
    };

    // Function to update active page
    const updateActivePage = function(tabId, page) {
        const paginationContainer = document.querySelector(`#${tabId} .basic-pagination ul`);
        if (!paginationContainer) return;

        const pageItems = paginationContainer.querySelectorAll('li');
        pageItems.forEach((item, index) => {
            if (index === page - 1) {
                item.innerHTML = `<span class="current">${page}</span>`;
            } else if (index < pageItems.length - 1) {
                const pageNum = index + 1;
                item.innerHTML = `<a href="#">${pageNum}</a>`;
            }
        });
    };

    // Update product count in the header
    const updateProductCount = function(tabId, totalProducts) {
        const productCountElement = document.querySelector('.product__item-count span');
        if (productCountElement) {
            const startItem = (currentPage - 1) * itemsPerPage + 1;
            const endItem = Math.min(startItem + itemsPerPage - 1, totalProducts);

            productCountElement.textContent =
                `Showing ${startItem} - ${endItem} of ${totalProducts} Products`;
        }
    };

    // Initialize pagination for all tabs
    initPagination('nav-all');
    initPagination('nav-popular');
    initPagination('nav-product');

    // Handle tab switching to maintain pagination
    document.querySelectorAll('[data-bs-toggle="tab"]').forEach(tab => {
        tab.addEventListener('click', function(e) {
            const targetId = e.target.getAttribute('data-bs-target').substring(1);
            currentPage = 1; // Reset to first page when switching tabs
            setTimeout(() => {
                initPagination(targetId);
            }, 100); // Small delay to ensure the tab is fully displayed
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Add transition styles for smooth filtering
    const styleElement = document.createElement('style');
    styleElement.textContent = `
        .col, .row {
            transition: opacity 0.4s ease-in-out, transform 0.4s ease-in-out;
        }
        .product-hidden {
            opacity: 0;
            transform: scale(0.9);
            pointer-events: none;
            position: absolute;
        }
        .product-visible {
            opacity: 1;
            transform: scale(1);
        }
    `;
    document.head.appendChild(styleElement);

    // Price range slider
    if ($("#slider-range").length) {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 5000000, // Adjust max price as needed
            values: [0, 5000000],
            slide: function(event, ui) {
                $("#amount").val("Rp " + ui.values[0].toLocaleString() + " - Rp " + ui.values[1].toLocaleString());
                filterProducts();
            }
        });
        $("#amount").val("Rp " + $("#slider-range").slider("values", 0).toLocaleString() +
            " - Rp " + $("#slider-range").slider("values", 1).toLocaleString());
    }

    // Category checkboxes
    const categoryCheckboxes = document.querySelectorAll('.tpshop__widget .form-check-input');
    categoryCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            filterProducts();
        });
    });

    // Initialize all products with visible class
    document.querySelectorAll('.col, .row').forEach(item => {
        if (item.querySelector('.tpproduct, .tplist__product')) {
            item.classList.add('product-visible');
        }
    });

    // Function to filter products
    function filterProducts() {
        // Get selected categories
        const selectedCategories = [];
        categoryCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                // Get the category name from the label
                const categoryName = checkbox.nextElementSibling.textContent.trim();
                selectedCategories.push(categoryName);
            }
        });

        // Get price range
        const priceRange = $("#slider-range").slider("values");
        const minPrice = priceRange[0];
        const maxPrice = priceRange[1];

        // Get all products
        const productCards = document.querySelectorAll('.tpproduct');

        // Filter products
        productCards.forEach(card => {
            let showProduct = true;
            
            // Check category filter
            if (selectedCategories.length > 0) {
                const categoryElement = card.querySelector('.tpproduct__content-weight a');
                const productCategory = categoryElement ? categoryElement.textContent.trim() : '';
                
                if (!selectedCategories.includes(productCategory)) {
                    showProduct = false;
                }
            }
            
            // Check price filter
            if (showProduct) {
                const priceElement = card.querySelector('.tpproduct__price span');
                if (priceElement) {
                    // Extract price from string "Rp 125.000"
                    const priceText = priceElement.textContent.replace('Rp ', '').replace(/\./g, '');
                    const productPrice = parseInt(priceText, 10);
                    
                    if (productPrice < minPrice || productPrice > maxPrice) {
                        showProduct = false;
                    }
                }
            }
            
            // Show or hide the product with animation
            const container = card.closest('.col');
            if (showProduct) {
                container.classList.remove('product-hidden');
                container.classList.add('product-visible');
            } else {
                container.classList.remove('product-visible');
                container.classList.add('product-hidden');
            }
        });
        
        // Handle list view products
        const listProducts = document.querySelectorAll('.tplist__product');
        listProducts.forEach(product => {
            let showProduct = true;
            
            // Check category filter
            if (selectedCategories.length > 0) {
                const categoryElement = product.querySelector('.tplist__content span');
                const productCategory = categoryElement ? categoryElement.textContent.trim() : '';
                
                if (!selectedCategories.includes(productCategory)) {
                    showProduct = false;
                }
            }
            
            // Check price filter
            if (showProduct) {
                const priceElement = product.querySelector('.tplist__count');
                if (priceElement) {
                    // Extract price from string "Rp 125.000"
                    const priceText = priceElement.textContent.replace('Rp ', '').replace(/\./g, '');
                    const productPrice = parseInt(priceText, 10);
                    
                    if (productPrice < minPrice || productPrice > maxPrice) {
                        showProduct = false;
                    }
                }
            }
            
            // Show or hide the product with animation
            const container = product.closest('.row');
            if (showProduct) {
                container.classList.remove('product-hidden');
                container.classList.add('product-visible');
            } else {
                container.classList.remove('product-visible');
                container.classList.add('product-hidden');
            }
        });
        
        // Update product count after a short delay to allow animations to complete
        setTimeout(updateProductCount, 400);
    }
    
    // Function to update product count
    function updateProductCount() {
        const visibleProducts = document.querySelectorAll('.tpproduct').length - 
                               document.querySelectorAll('.product-hidden .tpproduct').length +
                               document.querySelectorAll('.tplist__product').length - 
                               document.querySelectorAll('.product-hidden .tplist__product').length;
        
        const countElement = document.querySelector('.product__item-count span');
        if (countElement) {
            countElement.textContent = `Showing 1 - ${visibleProducts} of ${visibleProducts} Products`;
        }
    }
});