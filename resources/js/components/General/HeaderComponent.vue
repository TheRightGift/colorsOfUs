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
                    <div class="container container-no-width-on-small">
                        <div class="row">
                            <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                                <div class="logo">
                                    <a
                                        href="/"
                                       
                                    >
                                        <img
                                            src="/img/logo.png"
                                            alt="logo"
                                            v-if="home"
                                    />
                                    <img
                                            src="/img/logo2.png"
                                            alt="logo"
                                            v-if="!home"
                                    />
                                        <!-- COLORSOFUS
                                         style="
                                            font-size: 1.6em;
                                            color: black;
                                            font-weight: 900;
                                        " -->
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
                                                        :key="category.id"
                                                        class="megamenu-li"
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
                                                        <a class=""
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
                                            <li>
                                                <a href="/search">Search</a>
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
                                                        :href="'/'+
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
                                                        >Hi {{
                                                            $store.state.user
                                                                .firstname
                                                        }}</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="/dashboard?settings"
                                                        ><i
                                                            class="
                                                                fa
                                                                fa-cog
                                                                pr-2
                                                            "
                                                            aria-hidden="true"
                                                        ></i
                                                        >Settings</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        href="#!"
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
                                                
                                            </ul>
                                        </div>
                                    </li>
                                    <li v-else>
                                        <a href="/auth" title="Log In"
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
                                        role="search"
                                        @submit.prevent="search"
                                    >
                                        <input
                                            type="search"
                                            v-model="query"
                                            placeholder="Search our store"
                                            class=""
                                            aria-label="Search our store"
                                            required
                                        />
                                        <button type="submit" v-if="query != ''"></button>
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
                                    ><img src="/img/logo2.png" alt="logo"
                                /></a>
                            </div>

                            <p v-if="$store.state.token">Good Day! {{$store.state.user.firstname +' '+ $store.state.user.lastname}}</p>
                        </div>

                        <ul class="sidebar__thumd">
                            <div id="instafeed"></div>
                        </ul>

                        <div class="offset__widget">
                            <div class="offset__single offset-currency-picker">
                                <div class="sidebar-wrapper" v-if="$store.state.token">
                                <!--  && $store.state.user.user_type == 0 -->
                                <div class="sidebar-content">
                                <!-- sidebar-search  -->
                                <div class="sidebar-menu">
                                    <ul>
                                        <li class="sidebar-dropdown">
                                            <a href="#!" @click="openSidebar">
                                                <i class="fa fa-book"></i>
                                                <span>Orders</span>
                                            </a>
                                            <div class="sidebar-submenu" :style="{'display': sidebarMunu}">
                                                <ul>
                                                    <li>
                                                        <a
                                                            href="dashboard?orders"
                                                            >General</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="dashboard?ordersinprocessing"
                                                            >Processing
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="dashboard?ordersintransit"
                                                            >In transit</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="dashboard?orderscompleted"
                                                            >Completed</a
                                                        >
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="/cart">
                                                <i
                                                    class="fa fa-shopping-cart"
                                                ></i>
                                                <span>Cart</span>
                                                <span
                                                    class="
                                                        badge
                                                        badge-pill
                                                        badge-danger
                                                    "
                                                    >{{
                                                        $store.state.cartCount
                                                    }}</span
                                                >
                                            </a>
                                        </li>
                                        <li>
                                            <a href="dashboard?wishlist">
                                                <i class="fa fa-folder"></i>
                                                <span>Wishlists</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="dashboard?address">
                                                <i class="fa fa-truck"></i>
                                                <span>Shipping Details</span>
                                            </a>
                                        </li>
                                        <!-- <li>
                                            <a href="dashboard?profile">
                                                <i class="fa fa-user-o"></i>
                                                <span>Profile</span>
                                            </a>
                                        </li> -->
                                    </ul>
                                </div>
                                <!-- sidebar-menu  -->
                                </div>

                                </div>

                            </div>
                        </div>

                        <div class="offset__sosial__share">
                            <h4 class="offset__title">Follow Us</h4>
                            <ul class="off__soaial__link">
                                <li>
                                    <a
                                        class="bg--facebook"
                                        href="https://www.facebook.com/coloursofus05" target="_blank"
                                        title="Facebook"
                                        ><i class="zmdi zmdi-facebook"></i
                                    ></a>
                                </li>

                                <!-- <li>
                                    <a
                                        class="bg--google-plus"
                                        href="https://www.googleplus.com/coloursofus05" target="_blank"
                                        title="Google-plus"
                                        ><i class="zmdi zmdi-google-plus"></i
                                    ></a>
                                </li>

                                <li>
                                    <a
                                        class="bg--twitter"
                                        href="https://www.twitter.com/coloursofus05" target="_blank"
                                        title="Twitter"
                                        ><i class="zmdi zmdi-twitter"></i
                                    ></a>
                                </li> -->

                                <li>
                                    <a
                                        class="bg--instagram"
                                        href="https://www.instagram.com/coloursofus05" target="_blank"
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
                                        v-for="(item, index) in carts"
                                        :key="index"
                                    >
                                        <div class="shp__single__product">
                                            <div class="shp__pro__thumb">
                                                <a
                                                    :href="
                                                        '/products/' +
                                                        item.title
                                                    "
                                                    ><img
                                                        :src="
                                                            item.images[0].url
                                                        "
                                                        :alt="item.title"
                                                /></a>
                                            </div>
                                            <div class="shp__pro__details">
                                                <h2>
                                                    <a
                                                        :href="
                                                            '/products/' +
                                                            item.title
                                                        "
                                                        >{{ item.title }}
                                                        <span
                                                            v-if="
                                                                item.color ||
                                                                item.size
                                                            "
                                                        >
                                                            <span> - </span>
                                                        </span>
                                                        <span
                                                            v-if="
                                                                item.size
                                                            "
                                                            >{{
                                                                item
                                                                    .size
                                                                    .name || item.size
                                                            }}
                                                            /
                                                        </span>
                                                        <span
                                                            v-if="
                                                                item.color
                                                            "
                                                            >{{
                                                                item
                                                                    .color
                                                                    .name
                                                            }}</span
                                                        ></a
                                                    >
                                                </h2>
                                                <span class="shp__price"
                                                    >{{ item.quantity }} x
                                                    <span class="money" v-if="item.promotionals.length > 0">
                                                        &#8358;
                                                        
                                                            {{discount(item.promotionals[0].discount, item.amount)}}.00
                                                    </span
                                                    ><span class="money" v-else>
                                                        &#8358;
                                                        {{
                                                            formatPrice(
                                                                item.amount
                                                            )
                                                        }}</span
                                                    ></span
                                                >
                                            </div>
                                            <div class="remove__btn">
                                                <a
                                                    href="javascript:void(0);"
                                                    @click="
                                                        removeFromCart(item)
                                                    "
                                                    title="Remove this item"
                                                    ><i
                                                        class="zmdi zmdi-close"
                                                    ></i
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
                                <li><a href="/cart">View Cart</a></li>
                                <li class="shp__checkout">
                                    <a href="/cart">Checkout</a>
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
<style scoped>
    @media (max-width: 767px) {
        header .container {
            width: 360px;
        }
    }
</style>
<script>
    export default {
        name: "Header",
        data() {
            return {
                categories: [],
                home: false,
                products: [],
                query: '',
                sidebarMunu: 'none',
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

            carts() {
                return {...this.$store.state.cart}
            }
        },
        methods: {
            checkHome() {
                location.pathname === "/" ? (this.home = !this.home) : this.home;
            },
            discount(disc, e) {
                let discount = (disc / 100) * e;
                let newPrice = e - Math.round(discount);
                return this.formatPrice(Math.round(newPrice));
            },
            getCategories() {
                axios
                    .get(`/api/category`)
                    .then((res) => {
                        this.categories = res.data.untrashed.reverse().slice(0, 3);
                        this.$emit("categorize", res.data.untrashed);
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
                        this.$emit("produce", res.data.products);
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
                            meanMenuOpen: "<i class='fa fa-bars' aria-hidden='true'></i>",
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
            openSidebar() {
                this.sidebarMunu = this.sidebarMunu == 'none' ? 'block' : 'none';
            },
            removeFromCart(res) {
                this.$store.commit("removeFromCart", res);
            },
            search() {
                window.location.href = location.origin+'/search?q='+this.query;
            },
            
        },
        mounted() {
            this.checkHome();
            this.mobileMenu();
            this.getCategories();
            this.getProducts();
            this.$store.state.token != null ? this.$store.dispatch("fetchUserWishlists") : null;
            this.home ? $('.mean-container a.meanmenu-reveal').css('top', '-10px') : null;
        },
    };
</script>
<style>
    .mean-container a.meanmenu-reveal {
        text-align: center;
        text-indent: 0px;
        font-size: 18px;
    }
    
    .logo img {
        /* font-size: 1em !important; */
        width: 105px;    height: 57px;
    }
    @media (max-width: 767px) {
        .logo img {
            /* font-size: 1em !important; */
            width: 79px;    height: 57px;
        }
    }
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
    .sidebar-wrapper .sidebar-menu {
        padding-bottom: 10px;
    }

    .sidebar-wrapper .sidebar-menu .header-menu span {
        font-weight: bold;
        font-size: 14px;
        padding: 15px 20px 5px 20px;
        display: inline-block;
    }

    .sidebar-wrapper .sidebar-menu ul li a {
        display: inline-block;
        width: 100%;
        text-decoration: none;
        position: relative;
        padding: 8px 30px 8px 20px;
    }

    .sidebar-wrapper .sidebar-menu ul li a i {
        margin-right: 10px;
        font-size: 12px;
        width: 30px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        border-radius: 4px;
    }

    .sidebar-wrapper .sidebar-menu ul li a:hover > i::before {
        display: inline-block;
        animation: swing ease-in-out 0.5s 1 alternate;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown > a:after {
        font-family: "FontAwesome";
        font-weight: 900;
        content: "\f105";
        font-style: normal;
        display: inline-block;
        font-style: normal;
        font-variant: normal;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        background: 0 0;
        position: absolute;
        right: 115px;
        top: 10px;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu ul {
        padding: 5px 0;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li {
        padding-left: 25px;
        font-size: 13px;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a:before {
        content: "\f111";
        font-family: "FontAwesome";
        font-weight: 400;
        font-style: normal;
        display: inline-block;
        text-align: center;
        text-decoration: none;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        margin-right: 10px;
        font-size: 8px;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a .badge,
    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a .label {
        float: right;
        margin-top: 0px;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-submenu {
        display: none;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active > a:after {
        transform: rotate(90deg);
        right: 17px;
    }

    /*--------------------------side-footer------------------------------*/

    .sidebar-footer {
        position: absolute;
        width: 100%;
        bottom: 0;
        display: flex;
    }

    .sidebar-footer > a {
        flex-grow: 1;
        text-align: center;
        height: 30px;
        line-height: 30px;
        position: relative;
    }

    .sidebar-footer > a .notification {
        position: absolute;
        top: 0;
    }

    .badge-sonar {
        display: inline-block;
        background: #f2b8c9;
        border-radius: 50%;
        height: 8px;
        width: 8px;
        position: absolute;
        top: 0;
    }

    .badge-sonar:after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        border: 2px solid #f2b8c9;
        opacity: 0;
        border-radius: 50%;
        width: 100%;
        height: 100%;
        animation: sonar 1.5s infinite;
    }

    /*--------------------------page-content-----------------------------*/

    .page-wrapper .page-content {
        display: inline-block;
        width: 100%;
        padding-left: 0px;
        /* padding-top: 20px; */
    }

    .page-wrapper .page-content > div {
        /* padding: 20px 40px; */
    }

    .page-wrapper .page-content {
        overflow-x: hidden;
    }

    /*------scroll bar---------------------*/

    ::-webkit-scrollbar {
        width: 5px;
        height: 7px;
    }
    ::-webkit-scrollbar-button {
        width: 0px;
        height: 0px;
    }
    ::-webkit-scrollbar-thumb {
        background: #525965;
        border: 0px none #ffffff;
        border-radius: 0px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #525965;
    }
    ::-webkit-scrollbar-thumb:active {
        background: #525965;
    }
    ::-webkit-scrollbar-track {
        background: transparent;
        border: 0px none #ffffff;
        border-radius: 50px;
    }
    ::-webkit-scrollbar-track:hover {
        background: transparent;
    }
    ::-webkit-scrollbar-track:active {
        background: transparent;
    }
    ::-webkit-scrollbar-corner {
        background: transparent;
    }

    /*-----------------------------chiller-theme-------------------------------------------------*/

    .chiller-theme .sidebar-wrapper {
        background: #31353d;
    }

    .chiller-theme .sidebar-wrapper .sidebar-header,
    .chiller-theme .sidebar-wrapper .sidebar-search,
    .chiller-theme .sidebar-wrapper .sidebar-menu {
        border-top: 1px solid #3a3f48;
    }

    .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
    .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
        border-color: transparent;
        box-shadow: none;
    }

    .chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-role,
    .chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-status,
    .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
    .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text,
    .chiller-theme .sidebar-wrapper .sidebar-brand > a,
    .chiller-theme .sidebar-wrapper .sidebar-menu ul li a,
    .chiller-theme .sidebar-footer > a {
        color: #818896;
    }

    .chiller-theme .sidebar-wrapper .sidebar-menu ul li:hover > a,
    .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active > a,
    .chiller-theme .sidebar-wrapper .sidebar-header .user-info,
    .chiller-theme .sidebar-wrapper .sidebar-brand > a:hover,
    .chiller-theme .sidebar-footer > a:hover i {
        color: #b8bfce;
    }

    .page-wrapper.chiller-theme.toggled #close-sidebar {
        color: #bdbdbd;
    }

    .page-wrapper.chiller-theme.toggled #close-sidebar:hover {
        color: #ffffff;
    }

    .chiller-theme .sidebar-wrapper ul li:hover a i,
    .chiller-theme
        .sidebar-wrapper
        .sidebar-dropdown
        .sidebar-submenu
        li
        a:hover:before,
    .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu:focus + span,
    .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active a i {
        color: #16c7ff;
        text-shadow: 0px 0px 10px rgba(22, 199, 255, 0.5);
    }

    .chiller-theme .sidebar-wrapper .sidebar-menu ul li a i,
    .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown div,
    .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
    .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
        background: #3a3f48;
    }

    .chiller-theme .sidebar-wrapper .sidebar-menu .header-menu span {
        color: #6c7b88;
    }

    .chiller-theme .sidebar-footer {
        background: #3a3f48;
        box-shadow: 0px -1px 5px #282c33;
        border-top: 1px solid #464a52;
    }

    .chiller-theme .sidebar-footer > a:first-child {
        border-left: none;
    }

    .chiller-theme .sidebar-footer > a:last-child {
        border-right: none;
    }
    .sidebar-wrapper {
        width: 260px;
        height: 100%;
        max-height: 100%;
    }

    .sidebar-wrapper ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-wrapper a {
        text-decoration: none;
    }
</style>