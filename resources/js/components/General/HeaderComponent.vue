<template>
    <div>
        <!-- Start Header Style -->
        <div id="shopify-section-header" class="shopify-section">
            <header
                id="header"
                :class="{
                    'header--3 bg__white': !home,
                    'htc-header header--2': home,
                }"
            >
                <!-- Start Mainmenu Area -->
                <div
                    id="sticky-header-with-topbar"
                    class="mainmenu__area sticky__header"
                    :class="{ 'header--2': home }"
                >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                                <div class="logo">
                                    <a href="/"
                                    style="font-size:1.6em; color: black; font-weight: 900"
                                        >
                                        <!-- <img
                                            src="/img/2_medium.png"
                                            alt="logo"
                                    /> -->
                                        COLORSOFUS
                                    </a>
                                </div>
                            </div>
                            <!-- Start MAinmenu Ares -->
                            <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                                <nav class="mainmenu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li>
                                            <a href="/">Home</a>
                                        </li>

                                        <li class="drop">
                                            <a href="/products">Shop</a>
                                            <ul class="dropdown">
                                                <li class="megamenu-li">
                                                    <a
                                                        class="mega__title"
                                                        href="#!"
                                                        >Recommended</a
                                                    >
                                                    <ul class="mega__item">
                                                        <li
                                                            v-for="product in products"
                                                            :key="product.id"
                                                        >
                                                            <a
                                                                :href="
                                                                    '/products/' +
                                                                    product.title
                                                                "
                                                                >{{
                                                                    product.title
                                                                }}</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </li>

                                                <li class="megamenu-li">
                                                    <a
                                                        class="mega__title"
                                                        href="categories"
                                                        >Best Selling</a
                                                    >
                                                    <ul class="mega__item">
                                                        <li
                                                            v-for="women in womens"
                                                            :key="women.id"
                                                        >
                                                            <a
                                                                :href="
                                                                    '/products/' +
                                                                    women.title
                                                                "
                                                                >{{
                                                                    women.title
                                                                }}</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </li>

                                                <li
                                                    class="
                                                        megamenu-li
                                                        image-menu
                                                    "
                                                >
                                                    <a
                                                        v-for="img in products.slice(
                                                            0,
                                                            1
                                                        )"
                                                        :key="img.id"
                                                        :href="
                                                            '/products/' +
                                                            img.title
                                                        "
                                                        ><img
                                                            :src="
                                                                img.images[0]
                                                                    .url
                                                            "
                                                            alt=""
                                                    /></a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="drop mega-menu-drop">
                                            <a href="/categories">Categories</a>
                                            <ul class="dropdown mega_dropdown">
                                                <template
                                                    v-for="category in categories"
                                                >
                                                    <li
                                                        class="megamenu-li"
                                                        :key="category.id"
                                                    >
                                                        <a
                                                            class="mega__title"
                                                            :href="
                                                                '/products?category=' +
                                                                category.name
                                                            "
                                                            >{{
                                                                category.name
                                                            }}</a
                                                        >
                                                        <ul class="mega__item">
                                                            <!-- <template >                                                             -->
                                                            <li
                                                                v-for="product in category.products.slice(
                                                                    0,
                                                                    5
                                                                )"
                                                                :key="
                                                                    product.id
                                                                "
                                                            >
                                                                <a
                                                                    :href="
                                                                        '/product/' +
                                                                        product.title
                                                                    "
                                                                    >{{
                                                                        product.title
                                                                    }}</a
                                                                >
                                                            </li>
                                                            <!-- </template> -->
                                                        </ul>
                                                    </li>
                                                </template>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="/blogs">Blog</a>
                                        </li>

                                        <li>
                                            <a href="/about-us">About</a>
                                        </li>

                                        <li>
                                            <a href="/contact">Contact</a>
                                        </li>
                                    </ul>
                                </nav>
                                <div class="mobile-menu clearfix hidden">
                                    <nav id="mobile_dropdown">
                                        <ul class="">
                                            <li class="">
                                                <a href="/">Home</a>
                                            </li>

                                            <li class="">
                                                <a href="/products">Shop</a>
                                                <ul class="">
                                                    <li class="">
                                                        <a class="" href="#!"
                                                            >Recommended</a
                                                        >
                                                        <ul class="">
                                                            <li
                                                                v-for="product in products"
                                                                :key="
                                                                    product.id
                                                                "
                                                            >
                                                                <a
                                                                    :href="
                                                                        '/products/' +
                                                                        product.title
                                                                    "
                                                                    >{{
                                                                        product.title
                                                                    }}</a
                                                                >
                                                            </li>
                                                        </ul>
                                                    </li>

                                                    <li class="">
                                                        <a
                                                            class=""
                                                            >Women's Fashion</a
                                                        >
                                                            <!-- :href="'collections/fashion'" -->
                                                        <ul class="">
                                                            <li
                                                                v-for="women in womens"
                                                                :key="women.id"
                                                            >
                                                                <a
                                                                    :href="
                                                                        '/products/' +
                                                                        women.title
                                                                    "
                                                                    >{{
                                                                        women.title
                                                                    }}</a
                                                                >
                                                            </li>
                                                        </ul>
                                                    </li>

                                                    <li class="">
                                                        <a
                                                            v-for="img in products.slice(
                                                                0,
                                                                1
                                                            )"
                                                            :key="img.id"
                                                            :href="
                                                                '/products/' +
                                                                img.title
                                                            "
                                                            ><img
                                                                :src="
                                                                    img
                                                                        .images[0]
                                                                        .url
                                                                "
                                                                alt=""
                                                        /></a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="">
                                                <a href="/categories"
                                                    >Categories</a
                                                >
                                                <ul class="">
                                                    <li
                                                        class=""
                                                        v-for="category in categories"
                                                        :key="category.id"
                                                    >
                                                        <a
                                                            class=""
                                                            :href="
                                                                '/products/?category' +
                                                                category.name
                                                            "
                                                            >{{
                                                                category.name
                                                            }}</a
                                                        >
                                                        <ul class="">
                                                            <template
                                                                v-for="product in category.products.slice(
                                                                    0,
                                                                    5
                                                                )"
                                                            >
                                                                <li
                                                                    :key="
                                                                        product.id
                                                                    "
                                                                >
                                                                    <a
                                                                        :href="
                                                                            '/products/' +
                                                                            product.title
                                                                        "
                                                                        >{{
                                                                            product.title
                                                                        }}</a
                                                                    >
                                                                </li>
                                                            </template>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li>
                                                <a href="/blogs">Blog</a>
                                            </li>

                                            <li>
                                                <a href="/about-us">About</a>
                                            </li>

                                            <li>
                                                <a href="/contact">Contact</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!-- End MAinmenu Ares -->
                            <div class="col-md-2 col-sm-4 col-xs-3">
                                <ul class="menu-extra">
                                    <li class="search search__open hidden-xs">
                                        <span class="ti-search"></span>
                                    </li>

                                    <!-- Logged In Show -->
                                    <li class="" v-if="$store.state.token">
                                        <!-- <a 
                                            ><span class="ti-user"></span
                                        ></a> -->
                                        <div class="dropdown">
                                            <a
                                                id="dLabel"
                                                :title="
                                                    $store.state.user.firstname
                                                "
                                                data-target="#"
                                                data-toggle="dropdown"
                                                role="button"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                            >
                                                <span class="ti-user"></span>
                                            </a>
                                            <ul
                                                class="dropdown-menu"
                                                aria-labelledby="dLabel"
                                            >
                                                <li>
                                                    <a
                                                        :href="
                                                            $store.state
                                                                .intended
                                                        "
                                                        ><i
                                                            class="
                                                                fa fa-user
                                                                pr-2
                                                            "
                                                            aria-hidden="true"
                                                        ></i
                                                        >{{
                                                            $store.state.user
                                                                .firstname
                                                        }}</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        href="#"
                                                        @click.prevent="logout"
                                                        ><i
                                                            class="
                                                                fa fa-power-off
                                                                pr-2
                                                            "
                                                            aria-hidden="true"
                                                        ></i
                                                        >Logout</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        ><i
                                                            class="
                                                                fa
                                                                fa-first-order
                                                                pr-2
                                                            "
                                                            aria-hidden="true"
                                                        ></i
                                                        >View Orders</a
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li v-else>
                                        <a href="auth" title="Log In"
                                            ><span class="ti-user"></span
                                        ></a>
                                    </li>

                                    <li class="cart__menu">
                                        <span class="ti-shopping-cart"></span>
                                        <span class="cart-badge bigcounter">{{
                                            $store.state.cartCount
                                        }}</span>
                                    </li>

                                    <li class="toggle__menu hidden-xs">
                                        <span class="ti-menu"></span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="mobile-menu-area"></div>
                    </div>
                </div>
                <!-- End Mainmenu Area -->
            </header>

            <div class="body__overlay"></div>
            <!-- Start Offset Wrapper -->
            <div class="offset__wrapper">
                <!-- Start Search Popap -->
                <div class="search__area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="search__inner">
                                    <form
                                        action="https://uniqlo-2.myshopify.com/search"
                                        method="get"
                                        class=""
                                        role="search"
                                    >
                                        <input
                                            type="search"
                                            name="q"
                                            value=""
                                            placeholder="Search our store"
                                            class=""
                                            aria-label="Search our store"
                                        />
                                        <button type="submit"></button>
                                    </form>
                                    <div class="search__close__btn">
                                        <span class="search__close__btn_icon"
                                            ><i class="zmdi zmdi-close"></i
                                        ></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Search Popap -->
                <!-- Start Offset MEnu -->

                <div class="offsetmenu">
                    <div class="offsetmenu__inner">
                        <div class="offsetmenu__close__btn">
                            <a href="#"><i class="zmdi zmdi-close"></i></a>
                        </div>
                        <div class="off__contact">
                            <div class="logo">
                                <a href="/"
                                    ><img src="/img/2_medium.png" alt="logo"
                                /></a>
                            </div>

                            <p>
                                Lorem ipsum dolor sit amet consectetu
                                adipisicing elit sed do eiusmod tempor
                                incididunt ut labore.
                            </p>
                        </div>

                        <ul class="sidebar__thumd">
                            <div id="instafeed"></div>
                        </ul>

                        <div class="offset__widget">
                            <div class="offset__single offset-currency-picker">
                                <h4 class="offset__title">Currencies</h4>
                                <div
                                    class="
                                        common-currency-picker
                                        currency
                                        dropdown
                                    "
                                >
                                    <a
                                        class="dropdown-toggle"
                                        data-toggle="dropdown"
                                        ><span class="current-currency"
                                            >USD</span
                                        ><span class="ti-angle-down"></span
                                    ></a>

                                    <ul
                                        class="
                                            dropdown-menu dropdown-menu--xs-full
                                        "
                                    >
                                        <li
                                            data-currency="USD"
                                            class="currency__item"
                                        >
                                            <a style="cursor: pointer"
                                                >USD - US Dollar</a
                                            >
                                        </li>

                                        <li
                                            data-currency="EUR"
                                            class="currency__item"
                                        >
                                            <a style="cursor: pointer"
                                                >EUR - Euro</a
                                            >
                                        </li>

                                        <li
                                            data-currency="GBP"
                                            class="currency__item"
                                        >
                                            <a style="cursor: pointer"
                                                >GBP - British Pound</a
                                            >
                                        </li>

                                        <li
                                            data-currency="INR"
                                            class="currency__item"
                                        >
                                            <a style="cursor: pointer"
                                                >INR - Indian Rupee</a
                                            >
                                        </li>

                                        <li
                                            data-currency="BDT"
                                            class="currency__item"
                                        >
                                            <a style="cursor: pointer"
                                                >BDT - Bangladesh Taka</a
                                            >
                                        </li>

                                        <li
                                            data-currency="JPY"
                                            class="currency__item"
                                        >
                                            <a style="cursor: pointer"
                                                >JPY - Japan Yen</a
                                            >
                                        </li>

                                        <li
                                            data-currency="CAD"
                                            class="currency__item"
                                        >
                                            <a style="cursor: pointer"
                                                >CAD - Canada Dollar</a
                                            >
                                        </li>

                                        <li
                                            data-currency="AUD"
                                            class="currency__item"
                                        >
                                            <a style="cursor: pointer"
                                                >AUD - Australian Dollar</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="offset__sosial__share">
                            <h4 class="offset__title">Follow Us</h4>
                            <ul class="off__soaial__link">
                                <li>
                                    <a
                                        class="bg--facebook"
                                        href="#"
                                        title="Facebook"
                                        ><i class="zmdi zmdi-facebook"></i
                                    ></a>
                                </li>

                                <li>
                                    <a
                                        class="bg--google-plus"
                                        href="#"
                                        title="Google-plus"
                                        ><i class="zmdi zmdi-google-plus"></i
                                    ></a>
                                </li>

                                <li>
                                    <a
                                        class="bg--twitter"
                                        href="#"
                                        title="Twitter"
                                        ><i class="zmdi zmdi-twitter"></i
                                    ></a>
                                </li>

                                <li>
                                    <a
                                        class="bg--instagram"
                                        href="#"
                                        title="Instagram"
                                        ><i class="zmdi zmdi-instagram"></i
                                    ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- End Offset MEnu -->
                <!-- Start Cart Panel -->
                <div class="shopping__cart">
                    <div class="shopping__cart__inner">
                        <div class="offsetmenu__close__btn">
                            <a href="#"><i class="zmdi zmdi-close"></i></a>
                        </div>
                        <div
                            class="cart_empty_title"
                            v-if="$store.state.cart.length == 0"
                        >
                            <h2>Your cart is currently empty.</h2>
                        </div>
                        <div v-else>
                            <div class="shp__cart__wrap">
                                <ul>
                                    <li
                                        v-for="(item, index) in $store.state.cart"
                                        :key="index"
                                    >
                                        <div class="shp__single__product">
                                            <div class="shp__pro__thumb">
                                                <a
                                                    :href="'/products/'+item.title"
                                                    ><img
                                                        :src="item.images[0].url"
                                                        :alt="item.title"
                                                /></a>
                                            </div>
                                            <div class="shp__pro__details">
                                                <h2>
                                                    <a
                                                        :href="'/products/'+item.title"
                                                        >{{item.title}} 
                                                        <span v-if="item.selectedColor || item.selectedSize">
                                                            <span>
                                                                -
                                                            </span>
                                                        </span>
                                                        <span v-if="item.selectedSize">{{item.selectedSize.name}} / </span>
                                                        <span v-if="item.selectedColor">{{item.selectedColor.name}}</span></a
                                                    >
                                                </h2>
                                                <span class="shp__price"
                                                    >{{item.quantity}} x
                                                    <span
                                                        class="money"
                                                    >
                                                        &#8358; {{formatPrice(item.amount)}}</span
                                                    ></span
                                                >
                                            </div>
                                            <div class="remove__btn">
                                                <a
                                                    href="javascript:void(0);"
                                                    @click="removeFromCart(item)"
                                                    title="Remove this item"
                                                    ><i class="zmdi zmdi-close"></i
                                                ></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <ul class="shoping__total">
                                <li class="subtotal">Total:</li>
                                <li class="total__price shopping-cart__total">
                                    <span class="money">
                                        &#8358;{{ totalPrice }}</span
                                    >
                                </li>
                            </ul>
                            <ul class="shopping__btn">
                                <li><a href="cart">View Cart</a></li>
                                <li class="shp__checkout">
                                    <a href="cart">Checkout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Cart Panel -->
            </div>
        </div>
        <!-- End Header Style -->
    </div>
</template>
<script>
    export default {
        name: "Header",
        data() {
            return {
                categories: [],
                home: false,
                products: [],
                womens: [],
            };
        },
        computed: {
            totalPrice() {
                let total = 0;

                for (let item of this.$store.state.cart) {
                    total += item.totalPrice;
                }
                this.total = total;
                return total.toLocaleString("en-US", {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2,
                });
            },
        },
        methods: {
            checkHome() {
                location.pathname === "/" ? (this.home = !this.home) : this.home;
            },
            getCategories() {
                axios
                    .get(`/api/category`)
                    .then((res) => {
                        this.categories = res.data.untrashed.reverse().slice(0, 3);
                        this.$emit('categories', res.data.untrashed);
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getProducts() {
                axios
                    .get(`/api/product`)
                    .then((res) => {
                        let products = res.data.products.data.reverse().slice(0, 5);
                        this.womens = products.filter((el) => el.recommended == 0); //Search through description for women, and pull out the ones for it
                        this.products = products.filter(
                            (el) => el.recommended == 1
                        );
                        this.$emit('products', res.data.products)
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            formatPrice(value) {
                let val = value / 1;
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            },
            logout() {
                axios
                    .post("logout")
                    .then((res) => {
                        if (res.data.status == 401) {
                            this.$store.commit("logout");
                            window.location.replace("/");
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            mobileMenu() {
                (function (i) {
                    "use strict";
                    i.fn.meanmenu = function (y) {
                        var b = {
                            meanMenuTarget: jQuery(this),
                            meanMenuContainer: ".mobile-menu-area .container",
                            meanMenuClose: "X",
                            meanMenuCloseSize: "18px",
                            meanMenuOpen: "<span /><span /><span />",
                            meanRevealPosition: "right",
                            meanRevealPositionDistance: "0",
                            meanRevealColour: "",
                            meanScreenWidth: "767",
                            meanNavPush: "",
                            meanShowChildren: !0,
                            meanExpandableChildren: !0,
                            meanExpand: "+",
                            meanContract: "-",
                            meanRemoveAttrs: !1,
                            onePage: !1,
                            meanDisplay: "block",
                            removeElements: "",
                        };
                        y = i.extend(b, y);
                        var r =
                            window.innerWidth ||
                            document.documentElement.clientWidth;
                        return this.each(function () {
                            var l = y.meanMenuTarget,
                                h = y.meanMenuContainer,
                                e = y.meanMenuClose,
                                t = y.meanMenuCloseSize,
                                o = y.meanMenuOpen,
                                s = y.meanRevealPosition,
                                u = y.meanRevealPositionDistance,
                                f = y.meanRevealColour,
                                a = y.meanScreenWidth,
                                n = y.meanNavPush,
                                p = ".meanmenu-reveal",
                                c = y.meanShowChildren,
                                v = y.meanExpandableChildren,
                                _ = y.meanExpand,
                                z = y.meanContract,
                                L = y.meanRemoveAttrs,
                                C = y.onePage,
                                E = y.meanDisplay,
                                O = y.removeElements,
                                P = !1;
                            (navigator.userAgent.match(/iPhone/i) ||
                                navigator.userAgent.match(/iPod/i) ||
                                navigator.userAgent.match(/iPad/i) ||
                                navigator.userAgent.match(/Android/i) ||
                                navigator.userAgent.match(/Blackberry/i) ||
                                navigator.userAgent.match(/Windows Phone/i)) &&
                                (P = !0),
                                (navigator.userAgent.match(/MSIE 8/i) ||
                                    navigator.userAgent.match(/MSIE 7/i)) &&
                                    jQuery("html").css("overflow-y", "scroll");
                            var x = "",
                                H = function () {
                                    if (s === "center") {
                                        var j =
                                                window.innerWidth ||
                                                document.documentElement
                                                    .clientWidth,
                                            q = j / 2 - 22 + "px";
                                        (x = "left:" + q + ";right:auto;"),
                                            P
                                                ? jQuery(
                                                      ".meanmenu-reveal"
                                                  ).animate({ left: q })
                                                : jQuery(".meanmenu-reveal").css(
                                                      "left",
                                                      q
                                                  );
                                    }
                                },
                                m = !1,
                                w = !1;
                            s === "right" && (x = "right:" + u + ";left:auto;"),
                                s === "left" && (x = "left:" + u + ";right:auto;"),
                                H();
                            var S = "",
                                k = function () {
                                    jQuery(S).is(".meanmenu-reveal.meanclose")
                                        ? S.html(e)
                                        : S.html(o);
                                },
                                A = function () {
                                    jQuery(".mean-bar,.mean-push").remove(),
                                        jQuery(h).removeClass("mean-container"),
                                        jQuery(l).css("display", E),
                                        (m = !1),
                                        (w = !1),
                                        jQuery(O).removeClass("mean-remove");
                                },
                                N = function () {
                                    var j =
                                        "background:" + f + ";color:" + f + ";" + x;
                                    if (r <= a) {
                                        jQuery(O).addClass("mean-remove"),
                                            (w = !0),
                                            jQuery(h).addClass("mean-container"),
                                            jQuery(".mean-container").prepend(
                                                '<div class="mean-bar"><a href="#nav" class="meanmenu-reveal" style="' +
                                                    j +
                                                    '">Show Navigation</a><nav class="mean-nav"></nav></div>'
                                            );
                                        var q = jQuery(l).html();
                                        jQuery(".mean-nav").html(q),
                                            L &&
                                                jQuery(
                                                    "nav.mean-nav ul, nav.mean-nav ul *"
                                                ).each(function () {
                                                    jQuery(this).is(".mean-remove")
                                                        ? jQuery(this).attr(
                                                              "class",
                                                              "mean-remove"
                                                          )
                                                        : jQuery(this).removeAttr(
                                                              "class"
                                                          ),
                                                        jQuery(this).removeAttr(
                                                            "id"
                                                        );
                                                }),
                                            jQuery(l).before(
                                                '<div class="mean-push" />'
                                            ),
                                            jQuery(".mean-push").css(
                                                "margin-top",
                                                n
                                            ),
                                            jQuery(l).hide(),
                                            jQuery(".meanmenu-reveal").show(),
                                            jQuery(p).html(o),
                                            (S = jQuery(p)),
                                            jQuery(".mean-nav ul").hide(),
                                            c
                                                ? v
                                                    ? (jQuery(
                                                          ".mean-nav ul ul"
                                                      ).each(function () {
                                                          jQuery(this).children()
                                                              .length &&
                                                              jQuery(
                                                                  this,
                                                                  "li:first"
                                                              )
                                                                  .parent()
                                                                  .append(
                                                                      '<a class="mean-expand" href="#" style="font-size: ' +
                                                                          t +
                                                                          '">' +
                                                                          _ +
                                                                          "</a>"
                                                                  );
                                                      }),
                                                      jQuery(".mean-expand").on(
                                                          "click",
                                                          function (F) {
                                                              F.preventDefault(),
                                                                  jQuery(
                                                                      this
                                                                  ).hasClass(
                                                                      "mean-clicked"
                                                                  )
                                                                      ? (jQuery(
                                                                            this
                                                                        ).text(_),
                                                                        jQuery(this)
                                                                            .prev(
                                                                                "ul"
                                                                            )
                                                                            .slideUp(
                                                                                300,
                                                                                function () {}
                                                                            ))
                                                                      : (jQuery(
                                                                            this
                                                                        ).text(z),
                                                                        jQuery(this)
                                                                            .prev(
                                                                                "ul"
                                                                            )
                                                                            .slideDown(
                                                                                300,
                                                                                function () {}
                                                                            )),
                                                                  jQuery(
                                                                      this
                                                                  ).toggleClass(
                                                                      "mean-clicked"
                                                                  );
                                                          }
                                                      ))
                                                    : jQuery(
                                                          ".mean-nav ul ul"
                                                      ).show()
                                                : jQuery(".mean-nav ul ul").hide(),
                                            jQuery(".mean-nav ul li")
                                                .last()
                                                .addClass("mean-last"),
                                            S.removeClass("meanclose"),
                                            jQuery(S).click(function (F) {
                                                F.preventDefault(),
                                                    m === !1
                                                        ? (S.css(
                                                              "text-align",
                                                              "center"
                                                          ),
                                                          S.css("text-indent", "0"),
                                                          S.css("font-size", t),
                                                          jQuery(
                                                              ".mean-nav ul:first"
                                                          ).slideDown(),
                                                          (m = !0))
                                                        : (jQuery(
                                                              ".mean-nav ul:first"
                                                          ).slideUp(),
                                                          (m = !1)),
                                                    S.toggleClass("meanclose"),
                                                    k(),
                                                    jQuery(O).addClass(
                                                        "mean-remove"
                                                    );
                                            }),
                                            C &&
                                                jQuery(
                                                    ".mean-nav ul > li > a:first-child"
                                                ).on("click", function () {
                                                    jQuery(
                                                        ".mean-nav ul:first"
                                                    ).slideUp(),
                                                        (m = !1),
                                                        jQuery(S)
                                                            .toggleClass(
                                                                "meanclose"
                                                            )
                                                            .html(o);
                                                });
                                    } else A();
                                };
                            P ||
                                jQuery(window).resize(function () {
                                    (r =
                                        window.innerWidth ||
                                        document.documentElement.clientWidth),
                                        r > a,
                                        A(),
                                        r <= a ? (N(), H()) : A();
                                }),
                                jQuery(window).resize(function () {
                                    (r =
                                        window.innerWidth ||
                                        document.documentElement.clientWidth),
                                        P
                                            ? (H(), r <= a ? w === !1 && N() : A())
                                            : (A(), r <= a && (N(), H()));
                                }),
                                N();
                        });
                    };
                })(jQuery);
                $(".mobile-menu nav").meanmenu({
                    meanMenuContainer: ".mobile-menu-area",
                    meanScreenWidth: "991",
                    meanRevealPosition: "right",
                });
            },
            removeFromCart(res) {
                this.$store.commit("removeFromCart", res);
            },
        },
        mounted() {
            this.checkHome();
            this.mobileMenu();
            this.getCategories();
            this.getProducts();
        },
    };
</script>
<style>
    .pr-2 {
        padding-right: 1em;
    }
    ul.dropdown-menu > li:first-child {
        padding: 0 15px;
    }
    li.megamenu-li.image-menu img {
        width: 270px;
        height: 270px;
    }
</style>