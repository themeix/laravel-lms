/*
=====================
JS Table of Conttent
=====================
01. Preloader
02. Sticky Header
03. Mobile Menu
04. AOS Animation
05. Current Date
06. Magnific Popup
07. Slick Slider
08. InfiniteScroll
09. Masonry Grid
09. Scroll to Top
10. Tab
*/
(function ($) {
    "use strict";





    $(".search-close").on("click", function (e) {
        e.preventDefault();
        $("body").toggleClass("search-opened");

    });
    $(".author-profile-img").on("click", function (b) {
        b.preventDefault();
        $(" .author-profile").toggleClass("dropdown-opened");

    });
    $(".cart-box-close").on("click", function (c) {
        c.preventDefault();
        $(".cart-box ").toggleClass("card-opened");

    });

    $(".notification-box-close").on("click", function (c) {
        c.preventDefault();
        $(".notification-box ").toggleClass("card-opened");

    });




    $("#search-toggle, .search-close").click(function () {
        $("#search-content").slideToggle("slow", function () {
            // Animation complete.
        });
    });

    let navLinks = $("#nav-content");

    // Toggle navigation links on mobile
    $("#nav-toggle").click(function () {
        $("#nav-content").slideToggle("slow", function () {
            // Animation complete.
        });
    });

    // Reset navigation link visibility on window resize
    $(window).on("resize", function () {
        if (!$(".toggle").is(":visible") && !navLinks.is(":visible")) {
            navLinks.css({ display: "" });
        }
    });




    /*
  ------------------------
  01. Preloader
  --------------------------
  */
    $(window).on('load', function () {
        var preLoder = $(".preloader");
        preLoder.fadeOut(10);
    });




    /*
    ------------------------
     Mobile Menu
    --------------------------
    */
    $(".mobile-toggle").on("click", function() {
        $(this).toggleClass("open");
        $(".toggle-menu-class").slideToggle();
    });
    $(".toggle").on("click", function() {
        if ($(this).text().includes("-")) {
            $(this).text("+")
        } else {
            $(this).text("-")
        }
        $(this).parent().siblings(".submenu").slideToggle();
    });


    /*
    ------------------------
    04. AOS Animation
    --------------------------
    */
    AOS.init({
        offset: 50,
        delay: 0,
        duration: 800,
        easing: 'ease-in-out',
        debounceDelay: 20,
        throttleDelay: 50,
        once: true,
        mirror: false,
        anchorPlacement: 'top-bottom',
    });
    /*
    ------------------------
    05. Current Date
    --------------------------
    */
    $('#spanYear').html(new Date().getFullYear());
    /*
    ------------------------
    06. Magnific Popup
    --------------------------
    */
    $('.popup-with-form').magnificPopup({
        type: 'inline',
        fixedContentPos: false,
        alignTop: true,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-slide-bottom',
        callbacks: {
            open: function () {
                $('body').addClass('my-mfp-slide-main');
            },
            close: function () {
                setTimeout(function () {
                    $('body').removeClass('my-mfp-slide-main');
                }, 100)
            }
        }
    });
    $('.video-popup').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    $('.popup-youtube').magnificPopup({
        type: 'iframe'
    });
    $('.counter-numbers').counterUp({
        delay: 10,
        time: 1000
    });

    /*
    ------------------------
  . Our Expert Instructors
    --------------------------
    */
    $('.author-slider').slick({
        autoplay:false,
        autoplaySpeed: 2000,
        infinite: true,
        speed: 1000,
        slidesToShow: 4,
        arrows: true,
        dots: true,


        prevArrow: $('.slider-next-1'),
        nextArrow: $('.slider-prev-1'),
        draggable: true,
        focusOnSelect:false,
        responsive: [{
            breakpoint: 1280,
            settings: {
                slidesToShow: 3
            }
        },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

    /*
    ------------------------
  . Testimonial
    --------------------------
    */
    $('.testimonial-slider-box').slick({
        autoplay:false,
        autoplaySpeed: 2000,
        infinite: true,
        speed: 1000,
        slidesToShow: 2,
        arrows: true,
        dots: true,

        prevArrow: $('.slider-next-2'),
        nextArrow: $('.slider-prev-2'),
        draggable: true,
        focusOnSelect:false,
        responsive: [{
            breakpoint: 1280,
            settings: {
                slidesToShow: 2
            }
        },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
    /*
  ------------------------
. Blog Slider
  --------------------------
  */
    $('.blog-slider-box').slick({
        autoplay:false,
        autoplaySpeed: 2000,
        speed: 1000,
        slidesToShow: 3,
        arrows: true,
        dots: true,

        prevArrow: $('.slider-prev-3'),
        nextArrow: $('.slider-next-3'),
        draggable: true,
        focusOnSelect:false,
        responsive: [{
            breakpoint: 1280,
            settings: {
                slidesToShow: 2
            }
        },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });


    /*
------------------------
. Courses Slider
--------------------------
*/
    $('.courses-slider-box').slick({
        autoplay:false,
        autoplaySpeed: 2000,
        infinite: true,
        speed: 1000,
        slidesToShow: 3,
        arrows: true,
        dots: false,

        prevArrow: $('.slider-prev'),
        nextArrow: $('.slider-next'),
        draggable: true,
        focusOnSelect:false,
        responsive: [{
            breakpoint: 1280,
            settings: {
                slidesToShow: 2
            }
        },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                    dots: true,

                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    dots: true,
                }
            }
        ]
    });




    /*
    ------------------------
     08. InfiniteScroll
    --------------------------
    */
    $('.topics-loading').infiniteScroll({
        // options
        path: function () {
            // no value returned after 4th loaded page
            if (this.loadCount < 4) {
                let nextIndex = this.loadCount + 2;
                return `topics/topics-${nextIndex}.html`;
            }
        },
        append: '.topic-item',
        button: '.load-more-btn',
        checkLastPage: false,
        scrollThreshold: false,
        status: '.page-load-status',
        history: false,
    });
    /*
  ------------------------
   08. Nice select
  --------------------------
  */

    $('select').niceSelect();



    /*
    ------------------------
     09. Scroll to Top
    --------------------------
    */
    function scrolltop() {
        var wind = $(window);
        wind.on("scroll", function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop >= 500) {
                $(".scroll-top-button").fadeIn("slow");
            } else {
                $(".scroll-top-button").fadeOut("slow");
            }
        });
    }
    scrolltop();
    /*
    ------------------------
     10. Tab
    --------------------------
    */
    $("document").ready(function(){
        $(".tab-slider--body").hide();
        $(".tab-slider--body:first").show();
    });

    $(".tab-slider--nav li").click(function() {
        $(".tab-slider--body").hide();
        var activeTab = $(this).attr("rel");
        $("#"+activeTab).fadeIn();
        $(".tab-slider--nav li").removeClass("active");
        $(this).addClass("active");
    });

    /*
    ------------------------
     11. Chart
    --------------------------
    */

    const labels = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
    ];
    const data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: '#0052D4',
            borderColor: '#0052D4',
            data: [0, 10, 5, 2, 20, 30, 45],
        }]
    };
    const config = {
        type: 'line',
        data: data,
        options: {}
    };
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );



    /*
  ------------------------
  12. Sticky Header
  --------------------------
  */

    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 8) {
            $(".header-area").addClass("header-sticky");
        } else {
            $(".header-area").removeClass("header-sticky");
        }
    });

    $("#sidebar-btn, .nav-cover, .nav-close").on("click", function (e) {
        e.preventDefault();
        $("body").toggleClass("nav-opened nav-closed");
        $("#sidebar").toggleClass("visible");
    });

// Accordion

    (() => {

        function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }


        function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

        function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

        function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

        function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

        function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

        function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }

        function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

        function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

        function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

        function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

        var Default = {
            alwaysOpen: false,
            activeClasses: 'bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white',
            inactiveClasses: 'text-gray-500 dark:text-gray-400',
            onOpen: function onOpen() {},
            onClose: function onClose() {},
            onToggle: function onToggle() {}
        };

        var Accordion = /*#__PURE__*/function () {
            function Accordion() {
                var items = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
                var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

                _classCallCheck(this, Accordion);

                this._items = items;
                this._options = _objectSpread(_objectSpread({}, Default), options);

                this._init();
            }

            _createClass(Accordion, [{
                key: "_init",
                value: function _init() {
                    var _this = this;

                    if (this._items.length) {
                        // show accordion item based on click
                        this._items.map(function (item) {
                            if (item.active) {
                                _this.open(item.id);
                            }

                            item.triggerEl.addEventListener('click', function () {
                                _this.toggle(item.id);
                            });
                        });
                    }
                }
            }, {
                key: "getItem",
                value: function getItem(id) {
                    return this._items.filter(function (item) {
                        return item.id === id;
                    })[0];
                }
            }, {
                key: "open",
                value: function open(id) {
                    var _this2 = this,
                        _item$triggerEl$class,
                        _item$triggerEl$class2;

                    var item = this.getItem(id); // don't hide other accordions if always open

                    if (!this._options.alwaysOpen) {
                        this._items.map(function (i) {
                            if (i !== item) {
                                var _i$triggerEl$classLis, _i$triggerEl$classLis2;

                                (_i$triggerEl$classLis = i.triggerEl.classList).remove.apply(_i$triggerEl$classLis, _toConsumableArray(_this2._options.activeClasses.split(" ")));

                                (_i$triggerEl$classLis2 = i.triggerEl.classList).add.apply(_i$triggerEl$classLis2, _toConsumableArray(_this2._options.inactiveClasses.split(" ")));

                                i.targetEl.classList.add('hidden');
                                i.triggerEl.setAttribute('aria-expanded', false);
                                i.active = false; // rotate icon if set

                                if (i.iconEl) {
                                    i.iconEl.classList.remove('rotate-180');
                                }
                            }
                        });
                    } // show active item


                    (_item$triggerEl$class = item.triggerEl.classList).add.apply(_item$triggerEl$class, _toConsumableArray(this._options.activeClasses.split(" ")));

                    (_item$triggerEl$class2 = item.triggerEl.classList).remove.apply(_item$triggerEl$class2, _toConsumableArray(this._options.inactiveClasses.split(" ")));

                    item.triggerEl.setAttribute('aria-expanded', true);
                    item.targetEl.classList.remove('hidden');
                    item.active = true; // rotate icon if set

                    if (item.iconEl) {
                        item.iconEl.classList.add('rotate-180');
                    } // callback function


                    this._options.onOpen(this, item);
                }
            }, {
                key: "toggle",
                value: function toggle(id) {
                    var item = this.getItem(id);

                    if (item.active) {
                        this.close(id);
                    } else {
                        this.open(id);
                    } // callback function


                    this._options.onToggle(this, item);
                }
            }, {
                key: "close",
                value: function close(id) {
                    var _item$triggerEl$class3, _item$triggerEl$class4;

                    var item = this.getItem(id);

                    (_item$triggerEl$class3 = item.triggerEl.classList).remove.apply(_item$triggerEl$class3, _toConsumableArray(this._options.activeClasses.split(" ")));

                    (_item$triggerEl$class4 = item.triggerEl.classList).add.apply(_item$triggerEl$class4, _toConsumableArray(this._options.inactiveClasses.split(" ")));

                    item.targetEl.classList.add('hidden');
                    item.triggerEl.setAttribute('aria-expanded', false);
                    item.active = false; // rotate icon if set

                    if (item.iconEl) {
                        item.iconEl.classList.remove('rotate-180');
                    } // callback function


                    this._options.onClose(this, item);
                }
            }]);

            return Accordion;
        }();



        function initAccordion() {
            document.querySelectorAll('[data-accordion]').forEach(function (accordionEl) {
                var alwaysOpen = accordionEl.getAttribute('data-accordion');
                var activeClasses = accordionEl.getAttribute('data-active-classes');
                var inactiveClasses = accordionEl.getAttribute('data-inactive-classes');
                var items = [];
                accordionEl.querySelectorAll('[data-accordion-target]').forEach(function (el) {
                    var item = {
                        id: el.getAttribute('data-accordion-target'),
                        triggerEl: el,
                        targetEl: document.querySelector(el.getAttribute('data-accordion-target')),
                        iconEl: el.querySelector('[data-accordion-icon]'),
                        active: el.getAttribute('aria-expanded') === 'true' ? true : false
                    };
                    items.push(item);
                });
                new Accordion(items, {
                    alwaysOpen: alwaysOpen === 'open' ? true : false,
                    activeClasses: activeClasses ? activeClasses : Default.activeClasses,
                    inactiveClasses: inactiveClasses ? inactiveClasses : Default.inactiveClasses
                });
            });
        }

        if (document.readyState !== 'loading') {

            initAccordion();
        } else {
            document.addEventListener('DOMContentLoaded', initAccordion);
        }
    })()




    var nav_sections = $('section');
    var main_nav = $('.navbar-nav');

    $(window).on('scroll', function() {
        var cur_pos = $(this).scrollTop() + 200;

        nav_sections.each(function() {
            var top = $(this).offset().top,
                bottom = top + $(this).outerHeight();

            if (cur_pos >= top && cur_pos <= bottom) {
                if (cur_pos <= bottom) {
                    main_nav.find('li').removeClass('active');
                }
                main_nav.find('a[href="#' + $(this).attr('id') + '"]').parent('li').addClass('active');
            }
            if (cur_pos < 300) {
                $(".navbar-nav li:first").addClass('active');
            }
        });
    });
    function tabs(){
        const tabs = document.querySelectorAll(".tabs");
        const tab = document.querySelectorAll(".tab");
        const panel = document.querySelectorAll(".tab-content");

        function onTabClick(event) {

            // deactivate existing active tabs and panel

            for (let i = 0; i < tab.length; i++) {
                tab[i].classList.remove("active");
            }

            for (let i = 0; i < panel.length; i++) {
                panel[i].classList.remove("active");
            }


            // activate new tabs and panel
            event.target.classList.add('active');
            let classString = event.target.getAttribute('data-target');
            console.log(classString);
            document.getElementById('panels').getElementsByClassName(classString)[0].classList.add("active");
        }

        for (let i = 0; i < tab.length; i++) {
            tab[i].addEventListener('click', onTabClick, false);
        }
    }

    tabs()






    (function () {
        const second = 1000,
            minute = second * 60,
            hour = minute * 60,
            day = hour * 24;

        let today = new Date(),
            dd = String(today.getDate()).padStart(2, "0"),
            mm = String(today.getMonth() + 1).padStart(2, "0"),
            yyyy = today.getFullYear(),
            nextYear = yyyy + 1,
            dayMonth = "09/30/",
            birthday = dayMonth + yyyy;

        today = mm + "/" + dd + "/" + yyyy;
        if (today > birthday) {
            birthday = dayMonth + nextYear;
        }
        //end

        const countDown = new Date(birthday).getTime(),
            x = setInterval(function() {

                const now = new Date().getTime(),
                    distance = countDown - now;

                document.getElementById("days").innerText = Math.floor(distance / (day)),
                    document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                    document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                    document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

                //do something later when date is reached

                //seconds
            }, 0)
    }());































}(jQuery));
