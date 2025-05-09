!(function (e) {
    "use strict";
    if (
        (e(window).on("load", function () {
            e(".preloader").fadeOut(), e(".slick-slider").slick("refresh");
        }),
        e(".preloader").length > 0 &&
            e(".preloaderCls").each(function () {
                e(this).on("click", function (t) {
                    t.preventDefault(), e(".preloader").css("display", "none");
                });
            }),
        (e.fn.thmobilemenu = function (t) {
            var a = e.extend(
                {
                    menuToggleBtn: ".th-menu-toggle",
                    bodyToggleClass: "th-body-visible",
                    subMenuClass: "th-submenu",
                    subMenuParent: "th-item-has-children",
                    subMenuParentToggle: "th-active",
                    meanExpandClass: "th-mean-expand",
                    appendElement: '<span class="th-mean-expand"></span>',
                    subMenuToggleClass: "th-open",
                    toggleSpeed: 400,
                },
                t
            );
            return this.each(function () {
                var t = e(this);
                function s() {
                    t.toggleClass(a.bodyToggleClass);
                    var s = "." + a.subMenuClass;
                    e(s).each(function () {
                        e(this).hasClass(a.subMenuToggleClass) && (e(this).removeClass(a.subMenuToggleClass), e(this).css("display", "none"), e(this).parent().removeClass(a.subMenuParentToggle));
                    });
                }
                t.find("li").each(function () {
                    var t = e(this).find("ul");
                    t.addClass(a.subMenuClass), t.css("display", "none"), t.parent().addClass(a.subMenuParent), t.prev("a").append(a.appendElement), t.next("a").append(a.appendElement);
                });
                var n = "." + a.meanExpandClass;
                e(n).each(function () {
                    e(this).on("click", function (t) {
                        var s;
                        t.preventDefault(),
                            (s = e(this).parent()),
                            e(s).next("ul").length > 0
                                ? (e(s).parent().toggleClass(a.subMenuParentToggle), e(s).next("ul").slideToggle(a.toggleSpeed), e(s).next("ul").toggleClass(a.subMenuToggleClass))
                                : e(s).prev("ul").length > 0 && (e(s).parent().toggleClass(a.subMenuParentToggle), e(s).prev("ul").slideToggle(a.toggleSpeed), e(s).prev("ul").toggleClass(a.subMenuToggleClass));
                    });
                }),
                    e(a.menuToggleBtn).each(function () {
                        e(this).on("click", function () {
                            s();
                        });
                    }),
                    t.on("click", function (e) {
                        e.stopPropagation(), s();
                    }),
                    t.find("div").on("click", function (e) {
                        e.stopPropagation();
                    });
            });
        }),
        e(".th-menu-wrapper").thmobilemenu(),
        e(window).on("scroll", function () {
            e(this).scrollTop() > 500 ? e(".sticky-wrapper").addClass("sticky") : e(".sticky-wrapper").removeClass("sticky");
        }),
        e(".scroll-top").length > 0)
    ) {
        var t = document.querySelector(".scroll-top"),
            a = document.querySelector(".scroll-top path"),
            s = a.getTotalLength();
        (a.style.transition = a.style.WebkitTransition = "none"),
            (a.style.strokeDasharray = s + " " + s),
            (a.style.strokeDashoffset = s),
            a.getBoundingClientRect(),
            (a.style.transition = a.style.WebkitTransition = "stroke-dashoffset 10ms linear");
        var n = function () {
            var t = e(window).scrollTop(),
                n = e(document).height() - e(window).height(),
                o = s - (t * s) / n;
            a.style.strokeDashoffset = o;
        };
        n(), e(window).scroll(n);
        jQuery(window).on("scroll", function () {
            jQuery(this).scrollTop() > 50 ? jQuery(t).addClass("show") : jQuery(t).removeClass("show");
        }),
            jQuery(t).on("click", function (e) {
                return e.preventDefault(), jQuery("html, body").animate({ scrollTop: 0 }, 750), !1;
            });
    }
    e("[data-bg-src]").length > 0 &&
        e("[data-bg-src]").each(function () {
            var t = e(this).attr("data-bg-src");
            e(this).css("background-image", "url(" + t + ")"), e(this).removeAttr("data-bg-src").addClass("background-image");
        }),
        e("[data-bg-color]").length > 0 &&
            e("[data-bg-color]").each(function () {
                var t = e(this).attr("data-bg-color");
                e(this).css("background-color", t), e(this).removeAttr("data-bg-color");
            }),
        e(".th-carousel").each(function () {
            var t = e(this);
            function a(e) {
                return t.data(e);
            }
            var s = '<button type="button" class="slick-prev"><i class="' + a("prev-arrow") + '"></i></button>',
                n = '<button type="button" class="slick-next"><i class="' + a("next-arrow") + '"></i></button>';
            e("[data-slick-next]").each(function () {
                e(this).on("click", function (t) {
                    t.preventDefault(), e(e(this).data("slick-next")).slick("slickNext");
                });
            }),
                e("[data-slick-prev]").each(function () {
                    e(this).on("click", function (t) {
                        t.preventDefault(), e(e(this).data("slick-prev")).slick("slickPrev");
                    });
                }),
                1 == a("arrows") && (t.closest(".arrow-wrap").length || t.closest(".container").parent().addClass("arrow-wrap")),
                t.slick({
                    dots: !!a("dots"),
                    fade: !!a("fade"),
                    arrows: !!a("arrows"),
                    speed: a("speed") ? a("speed") : 1e3,
                    asNavFor: !!a("asnavfor") && a("asnavfor"),
                    autoplay: 0 != a("autoplay"),
                    infinite: 0 != a("infinite"),
                    slidesToShow: a("slide-show") ? a("slide-show") : 1,
                    adaptiveHeight: !!a("adaptive-height"),
                    centerMode: !!a("center-mode"),
                    autoplaySpeed: a("autoplay-speed") ? a("autoplay-speed") : 8e3,
                    centerPadding: a("center-padding") ? a("center-padding") : "0",
                    focusOnSelect: 0 != a("focuson-select"),
                    pauseOnFocus: !!a("pauseon-focus"),
                    pauseOnHover: !!a("pauseon-hover"),
                    variableWidth: !!a("variable-width"),
                    vertical: !!a("vertical"),
                    verticalSwiping: !!a("vertical"),
                    prevArrow: a("prev-arrow") ? s : '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                    nextArrow: a("next-arrow") ? n : '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                    rtl: "rtl" == e("html").attr("dir"),
                    responsive: [
                        { breakpoint: 1600, settings: { arrows: !!a("xl-arrows"), dots: !!a("xl-dots"), slidesToShow: a("xl-slide-show") ? a("xl-slide-show") : a("slide-show"), centerMode: !!a("xl-center-mode"), centerPadding: "0" } },
                        { breakpoint: 1400, settings: { arrows: !!a("ml-arrows"), dots: !!a("ml-dots"), slidesToShow: a("ml-slide-show") ? a("ml-slide-show") : a("slide-show"), centerMode: !!a("ml-center-mode"), centerPadding: 0 } },
                        {
                            breakpoint: 1200,
                            settings: { arrows: !!a("lg-arrows"), dots: !!a("lg-dots"), slidesToShow: a("lg-slide-show") ? a("lg-slide-show") : a("slide-show"), centerMode: !!a("lg-center-mode") && a("lg-center-mode"), centerPadding: 0 },
                        },
                        {
                            breakpoint: 992,
                            settings: { arrows: !!a("md-arrows"), dots: !!a("md-dots"), slidesToShow: a("md-slide-show") ? a("md-slide-show") : 1, centerMode: !!a("md-center-mode") && a("md-center-mode"), centerPadding: 0 },
                        },
                        {
                            breakpoint: 768,
                            settings: { arrows: !!a("sm-arrows"), dots: !!a("sm-dots"), slidesToShow: a("sm-slide-show") ? a("sm-slide-show") : 1, centerMode: !!a("sm-center-mode") && a("sm-center-mode"), centerPadding: 0 },
                        },
                        {
                            breakpoint: 576,
                            settings: { arrows: !!a("xs-arrows"), dots: !!a("xs-dots"), slidesToShow: a("xs-slide-show") ? a("xs-slide-show") : 1, centerMode: !!a("xs-center-mode") && a("xs-center-mode"), centerPadding: 0 },
                        },
                    ],
                });
        }),
        e("[data-ani-duration]").each(function () {
            var t = e(this).data("ani-duration");
            e(this).css("animation-duration", t);
        }),
        e("[data-ani-delay]").each(function () {
            var t = e(this).data("ani-delay");
            e(this).css("animation-delay", t);
        }),
        e("[data-ani]").each(function () {
            var t = e(this).data("ani");
            e(this).addClass(t), e(".slick-current [data-ani]").addClass("th-animated");
        }),
        e(".th-carousel").on("afterChange", function (t, a, s, n) {
            e(a.$slides).find("[data-ani]").removeClass("th-animated"), e(a.$slides[s]).find("[data-ani]").addClass("th-animated");
        });
    var o,
        i,
        r,
        l = ".ajax-contact",
        c = "is-invalid",
        d = '[name="email"]',
        u = '[name="name"],[name="email"],[name="subject"],[name="number"],[name="message"]',
        p = e(".form-messages");
    function h() {
        var t = e(l).serialize();
        f() &&
            jQuery
                .ajax({ url: e(l).attr("action"), data: t, type: "POST" })
                .done(function (t) {
                    p.removeClass("error"), p.addClass("success"), p.text(t), e(l + ' input:not([type="submit"]),' + l + " textarea").val("");
                })
                .fail(function (e) {
                    p.removeClass("success"), p.addClass("error"), "" !== e.responseText ? p.html(e.responseText) : p.html("Oops! An error occured and your message could not be sent.");
                });
    }
    function f() {
        var t,
            a = !0;
        return (
            (function (s) {
                s = s.split(",");
                for (var n = 0; n < s.length; n++) (t = l + " " + s[n]), e(t).val() ? (e(t).removeClass(c), (a = !0)) : (e(t).addClass(c), (a = !1));
            })(u),
            e(d).val() &&
            e(d)
                .val()
                .match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)
                ? (e(d).removeClass(c), (a = !0))
                : (e(d).addClass(c), (a = !1)),
            a
        );
    }
    if (
        (e(l).on("submit", function (e) {
            e.preventDefault(), h();
        }),
        e(".ajax-reserve").length > 0)
    ) {
        (l = ".ajax-reserve"), (c = "is-invalid"), (d = '[name="email"]'), (u = '[name="name"],[name="email"],[name="number"],[name="date"],[name="time"],[name="guest"],[name="message"]'), (p = e(".form-messages"));
        function h() {
            var t = e(l).serialize();
            f() &&
                jQuery
                    .ajax({ url: e(l).attr("action"), data: t, type: "POST" })
                    .done(function (t) {
                        p.removeClass("error"), p.addClass("success"), p.text(t), e(l + ' input:not([type="submit"]),' + l + " textarea").val("");
                    })
                    .fail(function (e) {
                        p.removeClass("success"), p.addClass("error"), "" !== e.responseText ? p.html(e.responseText) : p.html("Oops! An error occured and your message could not be sent.");
                    });
        }
        function f() {
            var t,
                a = !0;
            return (
                (function (s) {
                    s = s.split(",");
                    for (var n = 0; n < s.length; n++) (t = l + " " + s[n]), e(t).val() ? (e(t).removeClass(c), (a = !0)) : (e(t).addClass(c), (a = !1));
                })(u),
                e(d).val() &&
                e(d)
                    .val()
                    .match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)
                    ? (e(d).removeClass(c), (a = !0))
                    : (e(d).addClass(c), (a = !1)),
                a
            );
        }
        e(l).on("submit", function (e) {
            e.preventDefault(), h();
        });
    }
    function m(e) {
        return parseInt(e, 10);
    }
    (o = ".popup-search-box"),
        (i = ".searchClose"),
        (r = "show"),
        e(".searchBoxToggler").on("click", function (t) {
            t.preventDefault(), e(o).addClass(r);
        }),
        e(o).on("click", function (t) {
            t.stopPropagation(), e(o).removeClass(r);
        }),
        e(o)
            .find("form")
            .on("click", function (t) {
                t.stopPropagation(), e(o).addClass(r);
            }),
        e(i).on("click", function (t) {
            t.preventDefault(), t.stopPropagation(), e(o).removeClass(r);
        }),
        (function (t, a, s, n) {
            e(a).on("click", function (a) {
                a.preventDefault(), e(t).addClass(n);
            }),
                e(t).on("click", function (a) {
                    a.stopPropagation(), e(t).removeClass(n);
                }),
                e(t + " > div").on("click", function (a) {
                    a.stopPropagation(), e(t).addClass(n);
                }),
                e(s).on("click", function (a) {
                    a.preventDefault(), a.stopPropagation(), e(t).removeClass(n);
                });
        })(".sidemenu-wrapper", ".sideMenuToggler", ".sideMenuCls", "show"),
        e(".popup-image").magnificPopup({ type: "image", mainClass: "mfp-zoom-in", removalDelay: 260, gallery: { enabled: !0 } }),
        e(".popup-video").magnificPopup({ type: "iframe" }),
        e(".popup-content").magnificPopup({ type: "inline", midClick: !0 }),
        (e.fn.sectionPosition = function (t, a) {
            e(this).each(function () {
                var s,
                    n,
                    o,
                    i,
                    r,
                    l = e(this);
                (s = Math.floor(l.height() / 2)),
                    (n = l.attr(t)),
                    (o = l.attr(a)),
                    (i = m(e(o).css("padding-top"))),
                    (r = m(e(o).css("padding-bottom"))),
                    "top-half" === n ? (e(o).css("padding-bottom", r + s + "px"), l.css("margin-top", "-" + s + "px")) : "bottom-half" === n && (e(o).css("padding-top", i + s + "px"), l.css("margin-bottom", "-" + s + "px"));
            });
        });
    e("[data-sec-pos]").length &&
        e("[data-sec-pos]").imagesLoaded(function () {
            e("[data-sec-pos]").sectionPosition("data-sec-pos", "data-pos-for");
        }),
        (e.fn.sectionSpace = function (t, a) {
            e(this).each(function () {
                var s,
                    n,
                    o,
                    i,
                    r,
                    l,
                    c = e(this);
                (s = c.attr(t)),
                    (n = c.attr(a)),
                    (o = c.data("margin-top")),
                    (i = c.data("margin-bottom")),
                    (r = m(e(n).css("padding-top"))),
                    (l = m(e(n).css("padding-bottom"))),
                    "margin-top" === s
                        ? (e(n).css("padding-bottom", l + m(o) + "px"), c.css("margin-top", "-" + m(o) + "px").css({ position: "relative", "z-index": "3" }))
                        : "margin-bottom" === s && (e(n).css("padding-top", r + m(i) + "px"), c.css("margin-bottom", "-" + m(i) + "px").css({ position: "relative", "z-index": "3" }));
            });
        });
    e("[data-sec-space]").length &&
        e("[data-sec-space]").imagesLoaded(function () {
            e("[data-sec-space]").sectionSpace("data-sec-space", "data-pos-space");
        }),
        e(".filter-active").imagesLoaded(function () {
            var t = ".filter-active";
            if (e(t).length > 0) {
                var a = e(t).isotope({ itemSelector: ".filter-item", filter: "*", masonry: { columnWidth: 1 } });
                e(".filter-menu-active").on("click", "button", function () {
                    var t = e(this).attr("data-filter");
                    a.isotope({ filter: t });
                }),
                    e(".filter-menu-active").on("click", "button", function (t) {
                        t.preventDefault(), e(this).addClass("active"), e(this).siblings(".active").removeClass("active");
                    });
            }
            e('[data-bs-toggle="tab"]').on("shown.bs.tab", function (a) {
                e(t).isotope({ filter: "*" }), e(".filter-menu-active button:first-child").addClass("active").siblings().removeClass("active");
            });
        }),
        e(".masonary-active").imagesLoaded(function () {
            if (e(".masonary-active").length > 0) e(".masonary-active").isotope({ itemSelector: ".filter-item", filter: "*", masonry: { columnWidth: 1 } });
        }),
        e(".filter-active-cat1").imagesLoaded(function () {
            if (e(".filter-active-cat1").length > 0) {
                var t = e(".filter-active-cat1").isotope({ itemSelector: ".filter-item", filter: ".cat1", masonry: { columnWidth: 1 } });
                e(".filter-menu-active").on("click", "button", function () {
                    var a = e(this).attr("data-filter");
                    t.isotope({ filter: a });
                }),
                    e(".filter-menu-active").on("click", "button", function (t) {
                        t.preventDefault(), e(this).addClass("active"), e(this).siblings(".active").removeClass("active");
                    });
            }
        }),
        e(".counter-number").counterUp({ delay: 10, time: 1e3 }),
        (e.fn.indicator = function () {
            var t = e(this),
                a = t.find("a"),
                s = t.find("button");
            t.append('<span class="indicator"></span>');
            var n = t.find(".indicator");
            if (a.length) var o = a;
            else if (s.length) o = s;
            function i() {
                var e = t.find(".active"),
                    a = e.css("height"),
                    s = e.css("width"),
                    o = e.position().top + "px",
                    i = e.position().left + "px";
                n.css({ top: o, left: i, width: s, height: a });
            }
            o.on("click", function (t) {
                t.preventDefault(), e(this).addClass("active"), e(this).siblings(".active").removeClass("active"), i();
            }),
                i(),
                e(window).on("resize", function () {
                    i();
                });
        }),
        e(".food-menu-tab").length && e(".food-menu-tab").indicator(),
        (e.fn.asTab = function (t) {
            var a = e.extend({ sliderTab: !1, tabButton: "button" }, t);
            e(this).each(function () {
                var t = e(this),
                    s = t.find(a.tabButton);
                t.append('<span class="indicator"></span>');
                var n = t.find(".indicator");
                if (
                    (s.on("click", function (t) {
                        t.preventDefault();
                        var s = e(this);
                        s.addClass("active").siblings().removeClass("active"), a.sliderTab ? e(o).slick("slickGoTo", s.data("slide-go-to")) : r();
                    }),
                    a.sliderTab)
                ) {
                    var o = t.data("asnavfor"),
                        i = 0;
                    s.each(function () {
                        var s = e(this);
                        s.attr("data-slide-go-to", i),
                            i++,
                            s.hasClass("active") && e(o).slick("slickGoTo", s.data("slide-go-to")),
                            e(o).on("beforeChange", function (e, s, n, o) {
                                t
                                    .find(a.tabButton + '[data-slide-go-to="' + o + '"]')
                                    .addClass("active")
                                    .siblings()
                                    .removeClass("active"),
                                    r();
                            });
                    });
                }
                function r() {
                    var o = t.find(a.tabButton + ".active"),
                        i = o.css("height"),
                        r = o.css("width"),
                        l = o.position().top + "px",
                        c = o.position().left + "px";
                    n.get(0).style.setProperty("--height-set", i),
                        n.get(0).style.setProperty("--width-set", r),
                        n.get(0).style.setProperty("--pos-y", l),
                        n.get(0).style.setProperty("--pos-x", c),
                        e(s).first().position().left == o.position().left
                            ? n.addClass("start").removeClass("center").removeClass("end")
                            : e(s).last().position().left == o.position().left
                            ? n.addClass("end").removeClass("center").removeClass("start")
                            : n.addClass("center").removeClass("start").removeClass("end");
                }
                r();
            });
        }),
        e(".product-thumb-tab").length && e(".product-thumb-tab").asTab({ sliderTab: !0, tabButton: ".tab-btn" }),
        (e.fn.shapeMockup = function () {
            e(this).each(function () {
                var t = e(this),
                    a = t.data("top"),
                    s = t.data("right"),
                    n = t.data("bottom"),
                    o = t.data("left");
                t.css({ top: a, right: s, bottom: n, left: o }).removeAttr("data-top").removeAttr("data-right").removeAttr("data-bottom").removeAttr("data-left").parent().addClass("shape-mockup-wrap");
            });
        }),
        e(".shape-mockup") && e(".shape-mockup").shapeMockup(),
        (e.fn.countdown = function () {
            e(this).each(function () {
                var t = e(this),
                    a = new Date(t.data("offer-date")).getTime();
                function s(e) {
                    return t.find(e);
                }
                var n = setInterval(function () {
                    var e = new Date().getTime(),
                        o = a - e,
                        i = Math.floor(o / 864e5),
                        r = Math.floor((o % 864e5) / 36e5),
                        l = Math.floor((o % 36e5) / 6e4),
                        c = Math.floor((o % 6e4) / 1e3);
                    i < 10 && (i = "0" + i),
                        r < 10 && (r = "0" + r),
                        l < 10 && (l = "0" + l),
                        c < 10 && (c = "0" + c),
                        o < 0 ? (clearInterval(n), t.addClass("expired"), t.find(".message").css("display", "block")) : (s(".day").html(i), s(".hour").html(r), s(".minute").html(l), s(".seconds").html(c));
                }, 1e3);
            });
        }),
        e(".counter-list").length && e(".counter-list").countdown(),
        e(".date-pick").datetimepicker({ timepicker: !1, datepicker: !0, format: "d-m-y", step: 10 }),
        e(".time-pick").datetimepicker({ datepicker: !1, format: "H:i", step: 30 }),
        e(".th-hero-carousel").each(function () {
            var t = e(this);
            function a(e) {
                return t.data(e);
            }
            t.find("[data-ls-go]").each(function () {
                e(this).on("click", function (a) {
                    a.preventDefault();
                    var s = e(this).data("ls-go");
                    t.layerSlider(s);
                });
            }),
                t.layerSlider({
                    createdWith: "7.0.6",
                    sliderVersion: "7.0.6",
                    skin: "v6",
                    allowRestartOnResize: !0,
                    maxRatio: a("maxratio") ? a("maxratio") : 1,
                    type: a("slidertype") ? a("slidertype") : "responsive",
                    pauseOnHover: !!a("pauseonhover"),
                    navPrevNext: !!a("navprevnext"),
                    hoverPrevNext: !!a("hoverprevnext"),
                    hoverBottomNav: !!a("hoverbottomnav"),
                    navStartStop: !!a("navstartstop"),
                    navButtons: !!a("navbuttons"),
                    loop: !1 !== a("loop"),
                    autostart: !!a("autostart"),
                    responsiveUnder: a("responsiveunder") ? a("responsiveunder") : 1220,
                    layersContainer: a("container") ? a("container") : 1220,
                    showCircleTimer: !!a("showcircletimer"),
                    skinsPath: "layerslider/skins/",
                    thumbnailNavigation: !1 !== a("thumbnailnavigation"),
                });
        }),
        e(".progress-bar").waypoint(
            function () {
                e(".progress-bar").css({ animation: "animate-positive 1.8s", opacity: "1" });
            },
            { offset: "75%" }
        ),
        e("#ship-to-different-address-checkbox").on("change", function () {
            e(this).is(":checked") ? e("#ship-to-different-address").next(".shipping_address").slideDown() : e("#ship-to-different-address").next(".shipping_address").slideUp();
        }),
        e(".woocommerce-form-login-toggle a").on("click", function (t) {
            t.preventDefault(), e(".woocommerce-form-login").slideToggle();
        }),
        e(".woocommerce-form-coupon-toggle a").on("click", function (t) {
            t.preventDefault(), e(".woocommerce-form-coupon").slideToggle();
        }),
        e(".shipping-calculator-button").on("click", function (t) {
            t.preventDefault(), e(this).next(".shipping-calculator-form").slideToggle();
        }),
        e('.wc_payment_methods input[type="radio"]:checked').siblings(".payment_box").show(),
        e('.wc_payment_methods input[type="radio"]').each(function () {
            e(this).on("change", function () {
                e(".payment_box").slideUp(), e(this).siblings(".payment_box").slideDown();
            });
        }),
        e(".rating-select .stars a").each(function () {
            e(this).on("click", function (t) {
                t.preventDefault(), e(this).siblings().removeClass("active"), e(this).parent().parent().addClass("selected"), e(this).addClass("active");
            });
        }),
        e(".quantity-plus").each(function () {
            e(this).on("click", function (t) {
                t.preventDefault();
                var a = e(this).siblings(".qty-input"),
                    s = parseInt(a.val(), 10);
                isNaN(s) || a.val(s + 1);
            });
        }),
        e(".quantity-minus").each(function () {
            e(this).on("click", function (t) {
                t.preventDefault();
                var a = e(this).siblings(".qty-input"),
                    s = parseInt(a.val(), 10);
                !isNaN(s) && s > 1 && a.val(s - 1);
            });
        }),
        // window.addEventListener(
        //     "contextmenu",
        //     function (e) {
        //         e.preventDefault();
        //     },
        //     !1
        // ),
        (document.onkeydown = function (e) {
            return (
                123 != event.keyCode &&
                (!e.ctrlKey || !e.shiftKey || e.keyCode != "I".charCodeAt(0)) &&
                (!e.ctrlKey || !e.shiftKey || e.keyCode != "C".charCodeAt(0)) &&
                (!e.ctrlKey || !e.shiftKey || e.keyCode != "J".charCodeAt(0)) &&
                (!e.ctrlKey || e.keyCode != "U".charCodeAt(0)) &&
                void 0
            );
        });
})(jQuery);
