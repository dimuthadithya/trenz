"use strict";

(function ($) {
    /*------------------
        Preloader
    --------------------*/
    $(window).on("load", function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");

        /*------------------
            Product filter
        --------------------*/
        $(".filter__controls li").on("click", function () {
            $(".filter__controls li").removeClass("active");
            $(this).addClass("active");
        });
        if ($(".property__gallery").length > 0) {
            var containerEl = document.querySelector(".property__gallery");
            var mixer = mixitup(containerEl);
        }
    });

    /*------------------
        Background Set
    --------------------*/
    $(".set-bg").each(function () {
        var bg = $(this).data("setbg");
        $(this).css("background-image", "url(" + bg + ")");
    });

    //Search Switch
    $(".search-switch").on("click", function () {
        $(".search-model").fadeIn(400);
    });

    $(".search-close-switch").on("click", function () {
        $(".search-model").fadeOut(400, function () {
            $("#search-input").val("");
        });
    });

    //Canvas Menu
    $(".canvas__open").on("click", function () {
        $(".offcanvas-menu-wrapper").addClass("active");
        $(".offcanvas-menu-overlay").addClass("active");
    });

    $(".offcanvas-menu-overlay, .offcanvas__close").on("click", function () {
        $(".offcanvas-menu-wrapper").removeClass("active");
        $(".offcanvas-menu-overlay").removeClass("active");
    });

    /*------------------
		Navigation
	--------------------*/
    $(".header__menu").slicknav({
        prependTo: "#mobile-menu-wrap",
        allowParentLinks: true,
    });

    /*------------------
        Accordin Active
    --------------------*/
    $(".collapse").on("shown.bs.collapse", function () {
        $(this).prev().addClass("active");
    });

    $(".collapse").on("hidden.bs.collapse", function () {
        $(this).prev().removeClass("active");
    });

    /*--------------------------
        Banner Slider
    ----------------------------*/
    $(".banner__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });

    /*--------------------------
        Product Details Slider
    ----------------------------*/
    $(".product__details__pic__slider")
        .owlCarousel({
            loop: false,
            margin: 0,
            items: 1,
            dots: false,
            nav: true,
            navText: [
                "<i class='arrow_carrot-left'></i>",
                "<i class='arrow_carrot-right'></i>",
            ],
            smartSpeed: 1200,
            autoHeight: false,
            autoplay: false,
            mouseDrag: false,
            startPosition: "URLHash",
        })
        .on("changed.owl.carousel", function (event) {
            var indexNum = event.item.index + 1;
            product_thumbs(indexNum);
        });

    function product_thumbs(num) {
        var thumbs = document.querySelectorAll(".product__thumb a");
        thumbs.forEach(function (e) {
            e.classList.remove("active");
            if (e.hash.split("-")[1] == num) {
                e.classList.add("active");
            }
        });
    }

    /*------------------
		Magnific
    --------------------*/
    $(".image-popup").magnificPopup({
        type: "image",
    });

    $(".nice-scroll").niceScroll({
        cursorborder: "",
        cursorcolor: "#dddddd",
        boxzoom: false,
        cursorwidth: 5,
        background: "rgba(0, 0, 0, 0.2)",
        cursorborderradius: 50,
        horizrailenabled: false,
    });

    /*------------------
        CountDown
    --------------------*/
    // For demo preview start
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, "0");
    var mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
    var yyyy = today.getFullYear();

    if (mm == 12) {
        mm = "01";
        yyyy = yyyy + 1;
    } else {
        mm = parseInt(mm) + 1;
        mm = String(mm).padStart(2, "0");
    }
    var timerdate = mm + "/" + dd + "/" + yyyy;
    // For demo preview end

    // Uncomment below and use your date //

    /* var timerdate = "2020/12/30" */

    $("#countdown-time").countdown(timerdate, function (event) {
        $(this).html(
            event.strftime(
                "<div class='countdown__item'><span>%D</span> <p>Day</p> </div>" +
                    "<div class='countdown__item'><span>%H</span> <p>Hour</p> </div>" +
                    "<div class='countdown__item'><span>%M</span> <p>Min</p> </div>" +
                    "<div class='countdown__item'><span>%S</span> <p>Sec</p> </div>"
            )
        );
    });

    /*-------------------
		Range Slider
	--------------------- */
    var rangeSlider = $(".price-range"),
        minamount = $("#minamount"),
        maxamount = $("#maxamount"),
        minPrice = rangeSlider.data("min"),
        maxPrice = rangeSlider.data("max");
    rangeSlider.slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [minPrice, maxPrice],
        slide: function (event, ui) {
            minamount.val("$" + ui.values[0]);
            maxamount.val("$" + ui.values[1]);
        },
    });
    minamount.val("$" + rangeSlider.slider("values", 0));
    maxamount.val("$" + rangeSlider.slider("values", 1));

    /*------------------
		Single Product
	--------------------*/
    $(".product__thumb .pt").on("click", function () {
        var imgurl = $(this).data("imgbigurl");
        var bigImg = $(".product__big__img").attr("src");
        if (imgurl != bigImg) {
            $(".product__big__img").attr({ src: imgurl });
        }
    });

    // Cart totals are now handled by PHP

    /*------------------
        Submit Cart Forms
    --------------------*/
    $("#updateCart").on("click", function (e) {
        e.preventDefault();

        $(".update-cart-form").each(function () {
            const form = $(this);
            const action = form.attr("action");
            const data = form.serialize();

            $.ajax({
                url: action,
                method: "POST",
                data: data,
                success: function (response) {},
                error: function (error) {},
            });
        });
    });

    /*------------------
    update cartSubTotal and cartTotal
    --------------------*/
    updateCartTotal();

    // Cart totals are now handled by PHP

    /*-------------------
		Radio Btn
	--------------------- */
    $(".size__btn label").on("click", function () {
        $(".size__btn label").removeClass("active");
        $(this).addClass("active");
    });
})(jQuery);
