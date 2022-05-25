<template>
    <div>
        <div class="jaliana">
            <div class="fixed-footer">
                <header-component @categorize="categorize($event)"/>
                <div class="">
                    <!-- BREADCRUMBS SETCTION START -->

                    <div class="ht__bradcaump__area">
                        <div class="ht__bradcaump__wrap">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div
                                            class="bradcaump__inner text-center"
                                        >
                                            <h2 class="bradcaump-title">
                                                {{
                                                    filterName != "" &&
                                                    filterType == "categories"
                                                        ? filterName
                                                        : "Products"
                                                }}
                                            </h2>
                                            <nav class="bradcaump-inner">
                                                <nav
                                                    class=""
                                                    role="navigation"
                                                    aria-label="breadcrumbs"
                                                >
                                                    <ul class="breadcrumb-list">
                                                        <li>
                                                            <a
                                                                href="/"
                                                                title="Back to the home page"
                                                                >Home</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="/products"
                                                                title="Back to all products"
                                                                v-if="
                                                                    filterType !=
                                                                        'categories' &&
                                                                    filterType !=
                                                                        ''
                                                                "
                                                                >{{
                                                                    filterType ==
                                                                    "categories"
                                                                        ? filterName
                                                                        : "Products"
                                                                }}</a
                                                            >
                                                            <span>
                                                                {{
                                                                    filterType !=
                                                                    ""
                                                                        ? filterName
                                                                        : "Products"
                                                                }}
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BREADCRUMBS SETCTION END -->

                    <main role="main">
                        <div
                            id="shopify-section-collection-template"
                            class="shopify-section"
                        >
                            <!-- Start Our Product Area -->
                            <section
                                class="
                                    htc__product__area
                                    shop__page
                                    ptb--130
                                    bg__white
                                "
                            >
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div
                                                class="htc__product__container"
                                            >
                                                <!-- Start Product MEnu -->

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div
                                                            class="
                                                                filter__menu__container
                                                            "
                                                        >
                                                            <div
                                                                class="
                                                                    product__menu
                                                                "
                                                            >
                                                                <div
                                                                    class="
                                                                        product__list__option
                                                                    "
                                                                >
                                                                    <label
                                                                        for="SortBy"
                                                                        >Sort
                                                                        by</label
                                                                    >
                                                                    <div
                                                                        class="
                                                                            order-single-btn
                                                                        "
                                                                    >
                                                                        <select
                                                                            class="
                                                                                select-color
                                                                                selectpicker
                                                                            "
                                                                            name="SortBy"
                                                                            id="SortBy"
                                                                            v-model="
                                                                                sortBy
                                                                            "
                                                                            @change="
                                                                                sort(
                                                                                    $event
                                                                                )
                                                                            "
                                                                        >
                                                                            <option
                                                                                value="RM"
                                                                            >
                                                                                Recommended
                                                                            </option>
                                                                            <!-- <option
                                                                                value="best-selling"
                                                                            >
                                                                                Best
                                                                                Selling
                                                                            </option> -->
                                                                            <option
                                                                                value="AZ"
                                                                            >
                                                                                Alphabetically,
                                                                                A-Z
                                                                            </option>
                                                                            <option
                                                                                value="ZA"
                                                                            >
                                                                                Alphabetically,
                                                                                Z-A
                                                                            </option>
                                                                            <option
                                                                                value="0"
                                                                            >
                                                                                Price,
                                                                                low
                                                                                to
                                                                                high
                                                                            </option>
                                                                            <option
                                                                                value="1"
                                                                            >
                                                                                Price,
                                                                                high
                                                                                to
                                                                                low
                                                                            </option>
                                                                            <option
                                                                                value="D01"
                                                                            >
                                                                                Date,
                                                                                new
                                                                                to
                                                                                old
                                                                            </option>
                                                                            <option
                                                                                value="D10"
                                                                            >
                                                                                Date,
                                                                                old
                                                                                to
                                                                                new
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="
                                                                    filter__box
                                                                "
                                                            >
                                                                <a
                                                                    class="
                                                                        filter__menu
                                                                    "
                                                                    href="#"
                                                                    >filter</a
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Start Filter Menu -->
                                                <div class="filter__wrap">
                                                    <div class="filter__cart">
                                                        <div
                                                            class="
                                                                filter__cart__inner
                                                            "
                                                        >
                                                            <div
                                                                class="
                                                                    filter__menu__close__btn
                                                                "
                                                            >
                                                                <a href="#"
                                                                    ><i
                                                                        class="
                                                                            zmdi
                                                                            zmdi-close
                                                                        "
                                                                    ></i
                                                                ></a>
                                                            </div>
                                                            <div
                                                                class="
                                                                    filter__content
                                                                "
                                                            >
                                                                <!-- Start Single Content -->
                                                                <div
                                                                    class="
                                                                        fiter__content__inner
                                                                    "
                                                                >
                                                                    <div
                                                                        class="
                                                                            single__filter
                                                                        "
                                                                    >
                                                                        <h2>
                                                                            Categories
                                                                        </h2>

                                                                        <ul
                                                                            class="
                                                                                filter__list
                                                                            "
                                                                        >
                                                                            <li
                                                                                class=""
                                                                                v-for="category in categories"
                                                                                :key="
                                                                                    category.id
                                                                                "
                                                                            >
                                                                                <a
                                                                                    href="#!"
                                                                                    @click="
                                                                                        filterClicked(
                                                                                            category.id,
                                                                                            'categories',
                                                                                            category.name
                                                                                        )
                                                                                    "
                                                                                    >{{
                                                                                        category.name
                                                                                    }}</a
                                                                                >
                                                                            </li>
                                                                        </ul>
                                                                    </div>

                                                                    <div
                                                                        class="
                                                                            single__filter
                                                                        "
                                                                    >
                                                                        <h2>
                                                                            Size
                                                                        </h2>

                                                                        <ul
                                                                            class="
                                                                                filter__list
                                                                            "
                                                                        >
                                                                            <li
                                                                                class=""
                                                                                v-for="size in sizes"
                                                                                :key="
                                                                                    size.id
                                                                                "
                                                                            >
                                                                                <a
                                                                                    @click="
                                                                                        filterClicked(
                                                                                            size.id,
                                                                                            'sizes',
                                                                                            size.name
                                                                                        )
                                                                                    "
                                                                                    href="#!"
                                                                                    >{{
                                                                                        size.name
                                                                                    }}</a
                                                                                >
                                                                            </li>
                                                                        </ul>
                                                                    </div>

                                                                    <div
                                                                        class="
                                                                            single__filter
                                                                        "
                                                                    >
                                                                        <h2>
                                                                            Color
                                                                        </h2>

                                                                        <ul
                                                                            class="
                                                                                filter__list
                                                                                sidebar__list
                                                                            "
                                                                        >
                                                                            <li
                                                                                :class="
                                                                                    color.name
                                                                                "
                                                                                v-for="color in colors"
                                                                                :key="
                                                                                    color.id
                                                                                "
                                                                            >
                                                                                <a
                                                                                    href="#!"
                                                                                    @click="
                                                                                        filterClicked(
                                                                                            color.id,
                                                                                            'colors',
                                                                                            color.name
                                                                                        )
                                                                                    "
                                                                                    ><i
                                                                                        class="
                                                                                            zmdi
                                                                                            zmdi-circle
                                                                                        "
                                                                                        :style="{
                                                                                            color: color.name,
                                                                                        }"
                                                                                    ></i
                                                                                    >{{
                                                                                        color.name
                                                                                    }}</a
                                                                                >
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <!-- End Single Content -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Filter Menu -->
                                                <!-- End Product MEnu -->
                                                <div class="row">
                                                    <div
                                                        class="
                                                            product__list
                                                            single-grid-view
                                                        "
                                                    >
                                                        <!-- Start Single Product -->

                                                        <div
                                                            class="
                                                                col-md-3
                                                                single__pro
                                                                cat--1
                                                                col-sm-6
                                                                col-xs-12
                                                                load-more
                                                            "
                                                            v-for="product in products"
                                                            :key="product.id"
                                                        >
                                                            <div
                                                                class="
                                                                    product
                                                                    foo
                                                                "
                                                            >
                                                                <div
                                                                    class="
                                                                        product__inner
                                                                    "
                                                                >
                                                                    <div
                                                                        class="
                                                                            pro__thumb
                                                                        "
                                                                    >
                                                                        <a
                                                                            class="
                                                                                image
                                                                            "
                                                                            :href="
                                                                                'products/' +
                                                                                product.title
                                                                            "
                                                                            target="_blank"
                                                                            >
                                                                            <h4 v-if="product.promotionals.length > 0" class="righted">{{product.promotionals[0].type}}</h4>
                                                                            <img
                                                                                :src="
                                                                                    product
                                                                                        .images[0]
                                                                                        .url
                                                                                "
                                                                                :alt="
                                                                                    product.title
                                                                                "
                                                                        /></a>
                                                                    </div>

                                                                    <div
                                                                        class="
                                                                            product__hover__info
                                                                        "
                                                                    >
                                                                        <ul
                                                                            class="
                                                                                product__action
                                                                                product__action__2
                                                                            "
                                                                        >
                                                                            <li>
                                                                                <a
                                                                                    data-toggle="modal"
                                                                                    data-target="#productModal"
                                                                                    href="#!"
                                                                                    @click.prevent="
                                                                                        quickView(
                                                                                            product
                                                                                        )
                                                                                    "
                                                                                    title="Quick View"
                                                                                    class="
                                                                                        quick-view
                                                                                        modal-view
                                                                                        detail-link
                                                                                    "
                                                                                    ><span
                                                                                        class="
                                                                                            ti-plus
                                                                                        "
                                                                                    ></span
                                                                                ></a>
                                                                            </li>
                                                                            <li
                                                                                v-if="
                                                                                    product
                                                                                        .colors
                                                                                        .length ==
                                                                                        0 &&
                                                                                    product
                                                                                        .sizes
                                                                                        .length ==
                                                                                        0
                                                                                "
                                                                            >
                                                                                <a
                                                                                    class="
                                                                                        cart__menu
                                                                                    "
                                                                                    @click.prevent="
                                                                                        addToCart(
                                                                                            product
                                                                                        )
                                                                                    "
                                                                                    title="Add to Cart"
                                                                                    ><span
                                                                                        class="
                                                                                            ti-shopping-cart
                                                                                        "
                                                                                    ></span
                                                                                ></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="add__to__wishlist">
                                                                        <a class="action--wishlist tile-actions--btn flex wishlist-btn wishlist" :class="{'is-active' : checkWishlist(product)}" href="#!" :data-product-handle="product.title" @click.prevent="addRemoveWishList(product)" tabindex="0">
                                                                        <span data-toggle="tooltip" title="Add Wishlist" class="ti-heart" data-original-title="Add Wishlist" v-if="!checkWishlist(product)"></span>
                                                                        <span data-toggle="tooltip" title="Remove Wishlist" class="ti-heart-broken" data-original-title="Remove Wishlist" v-else></span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="
                                                                        product__details
                                                                    "
                                                                >
                                                                    <h2>
                                                                        <a
                                                                            :href="
                                                                                'products/' +
                                                                                product.title
                                                                            "
                                                                            target="_blank"
                                                                            >{{
                                                                                product.title
                                                                            }}</a
                                                                        >
                                                                    </h2>
                                                                    <ul
                                                                class="
                                                                    product__price
                                                                "
                                                            >
                                                                <li
                                                                    class="
                                                                        old__price
                                                                    "
                                                                    v-if="product.promotionals.length > 0"
                                                                >
                                                                    <span
                                                                        class="
                                                                            money
                                                                        "
                                                                        >&#8358;{{
                                                                            formatPrice(
                                                                                product.amount
                                                                            )
                                                                        }}.00</span
                                                                    >
                                                                </li>

                                                                <li
                                                                    class="
                                                                        new__price
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            money
                                                                        "
                                                                        v-if="product.promotionals.length > 0"
                                                                        >&#8358;{{discount(product.promotionals[0].discount, product.amount)}}.00</span
                                                                    >
                                                                    <span
                                                                        class="
                                                                            money
                                                                        "
                                                                        v-else
                                                                        >&#8358;{{
                                                                            formatPrice(
                                                                                product.amount
                                                                            )
                                                                        }}.00</span
                                                                    >
                                                                </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            v-if="
                                                                products.length ==
                                                                0
                                                            "
                                                            class="centered"
                                                        >
                                                            <div
                                                                id="preloader_active"
                                                                v-if="
                                                                    sorFilting
                                                                "
                                                            >
                                                                <div
                                                                    id="loading-center"
                                                                >
                                                                    <div
                                                                        id="loading-center-absolute"
                                                                    >
                                                                        <div
                                                                            class="
                                                                                object
                                                                            "
                                                                            id="object_four"
                                                                        ></div>
                                                                        <div
                                                                            class="
                                                                                object
                                                                            "
                                                                            id="object_three"
                                                                        ></div>
                                                                        <div
                                                                            class="
                                                                                object
                                                                            "
                                                                            id="object_two"
                                                                        ></div>
                                                                        <div
                                                                            class="
                                                                                object
                                                                            "
                                                                            id="object_one"
                                                                        ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p v-else>
                                                                No Product found
                                                            </p>
                                                        </div>
                                                        <!-- End Single Product -->
                                                    </div>
                                                </div>
                                                <!-- Start Load More BTn -->
                                                <div
                                                    class="
                                                        row
                                                        pagination-type-margin
                                                    "
                                                    id="loadmore-area"
                                                >
                                                    <div class="col-md-12">
                                                        <div
                                                            class="
                                                                htc__loadmore__btn
                                                            "
                                                        >
                                                            <button
                                                                type="button"
                                                                id="loadMore"
                                                                @click.prevent="
                                                                    loadMore
                                                                "
                                                            >
                                                                Load More
                                                                <i
                                                                    v-if="
                                                                        loading
                                                                    "
                                                                    class="
                                                                        fa
                                                                        fa-circle-o-notch
                                                                        fa-spin
                                                                        fa-fw
                                                                    "
                                                                ></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Load More BTn -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- End Our Product Area -->
                        </div>
                    </main>
                    <footer-component />
                </div>
            </div>
        </div>
        <quickview-component
            :product="product"
            :formatPrice="formatPrice"
            :synopsis="synopsis"
            :discount="discount"
        />
    </div>
</template>
<script>
    import FooterComponent from "./FooterComponent.vue";
    import HeaderComponent from "./HeaderComponent.vue";
    import QuickviewComponent from "./QuickviewComponent.vue";

    let size = "/api/size";
    let color = "/api/color";
    const requestSize = axios.get(size);
    const requestColor = axios.get(color);

    export default {
        components: { HeaderComponent, FooterComponent, QuickviewComponent },
        data() {
            return {
                categories: [],
                categoryID: null,
                colors: [],
                filter: false,
                filterAttr: "",
                filterType: "",
                filterName: "",
                inComingCategory: false,
                loading: false,
                page: 1,
                product: {},
                products: [],
                sizes: [],
                sorFilting: false,
                sortBy: "AZ",
            };
        },
        methods: {     
            addRemoveWishList(res) {
                if (this.$store.state.token) {
                    this.wishlist(res);
                } else if (!this.$store.state.token) {
                    this.$toasted.show("Hello, Please", {
                        duration: 9000,
                        position: "top-right",
                        action: {
                            text: "Login",
                            onClick: (e, toastObject) => {
                                // toastObject.goAway(0);
                                window.location.href = `/auth`;
                            },
                        },
                    });
                }
                // Get the logged in user, or force user to login.
                // Track user webpage to be able to navigate back;
                // Make call to db and check if user_id, resource_id exist, if yes;
                // Delete the column and return 1
                // Else Add the column;
                // If wishlisting is succesful, emit bac success and color or decolor the heart
            },
            addToCart(res) {
                this.$store.commit("addToCart", res);
                $(".cart__menu").on("click", function () {
                    $(".shopping__cart").addClass("shopping__cart__on"),
                        $(".body__overlay").addClass("is-visible");
                });
                this.$toasted.show("Product added to cart!", {
                    duration: 3000,
                    position: "top-right",
                    action: {
                        text: "View Cart",
                        onClick: (e, toastObject) => {
                            // toastObject.goAway(0);
                            window.location.href = `/cart`;
                        },
                    },
                });
            },
            categorize(e) {
                this.categories = e;
            },
            checkIfHasCategory() {
                let params = new URLSearchParams(window.location.search);

                if (params.has("category")) {
                    let categoryID = params.get("category");
                    this.inComingCategory = true;
                    this.categoryID = categoryID;
                    this.filterType = "categories";
                    this.filterName = categoryID;
                }
            },
            checkWishlist(product){
                let wished = this.$store.state.wishlist.find(el => product.id == el.product_id);
                return wished;
            },
            discount(disc, e) {
                let discount = (disc / 100) * e;
                let newPrice = e - Math.round(discount);
                return this.formatPrice(Math.round(newPrice));
            },
            loadFilter() {
                this.page != 1 ? (this.loading = true) : null;
                axios
                    .post(`api/product-filter?page=${this.page++}`, {
                        filter: this.filterAttr,
                        type: this.filterType,
                        sortBy: this.sortBy,
                    })
                    .then((res) => {
                        this.products = [
                            ...this.products,
                            ...res.data.products.data,
                        ];
                        this.sorFilting = false;
                        this.loading = false;
                        if (this.products.length == res.data.products.total) {
                            $("#loadmore-area").fadeOut(1000);
                        } else {
                            $("#loadmore-area").fadeIn(1000);
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            filterClicked(attr, type, name) {
                this.windowHistoryReplace();
                this.fliterClicked = true;
                this.filterAttr = attr;
                this.filterType = type;
                this.filterName = name;
                this.categoryID = null;
                this.inComingCategory = false;
                this.page = 1;
                this.products = [];
                this.page == 1 ? (this.sorFilting = true) : null;
                this.filter = true;
                this.loadFilter(attr, name);
            },
            formatPrice(value) {
                let val = value / 1;
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            },
            getProducts() {
                this.filter = false;
                this.page != 1 ? (this.loading = true) : null;
                axios
                    .get(
                        `api/product/${this.sortBy}/${this.categoryID}?page=${this
                            .page++}`
                    )
                    .then((res) => {
                        this.products = [
                            ...this.products,
                            ...res.data.products.data,
                        ];
                        this.loading = false;
                        if (this.products.length == res.data.products.total) {
                            $("#loadmore-area").fadeOut(1000);
                        }
                    });
            },
            getColorSize() {
                axios
                    .all([requestSize, requestColor])
                    .then(
                        axios.spread((...responses) => {
                            this.sizes = responses[0].data.untrashed;
                            this.colors = responses[1].data.untrashed;
                        })
                    )
                    .catch((errors) => {
                        console.log(errors);
                    });
            },
            loadMore() {
                var b;
                this.filter
                    ? this.loadFilter(this.filterAttr, this.filterType)
                    : this.getProducts();
                $(".load-more:lt(" + b + ")").slideDown(1000);
            },
            quickView(product) {
                this.product = product;
            },
            sort(e) {
                // this.filter = false;
                this.sorFilting = true;
                this.page = 1;
                this.products = [];
                this.loadMore();
                $("#loadmore-area").fadeIn(1000);
                setTimeout(() => {
                    this.sorFilting = false;
                }, 1000);
            },
            synopsis(inputString, len) {
                var div = document.createElement("div");
                div.innerHTML = inputString;
                return div.textContent.slice(0, len);
            },
            wishlist(prd) {
                let data = {
                    user_id: this.$store.state.user.id,
                    product_id: prd.id,
                };
                axios
                    .post("/api/wishlist", data)
                    .then((res) => {
                        if (res.status === 201) {
                            this.$store.commit("addToWishList", res.data.wishlist);
                            this.$toasted.show("Added to Wishlist!", {
                                duration: 2000,
                                position: "top-right",
                            });
                        } else if (res.status === 204) {
                            this.$toasted.show("Removed from Wishlist!", {
                                duration: 2000,
                                position: "top-right",
                            });
                            this.$store.commit("removeFromWishList", prd);
                        }
                        this.checkWishlist(prd);
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            windowHistoryReplace() {
                window.history.replaceState({}, document.title, "/" + "products");
            },
        },
        mounted() {
            this.checkIfHasCategory();
            this.getColorSize();
            this.getProducts();
        },
    };
</script>
<style scoped>
    a.image img {
        height: 270px;
    }
    .filter__menu__container {
        margin-bottom: 50px;
    }
    .product__list.single-grid-view .product,
    .product__list.single-grid-view .best__product {
        margin-top: 0;
        margin-bottom: 50px;
    }
    .pagination-type-margin {
        margin-top: 30px;
    }
    .htc__loadmore__btn button {
        border: 1px solid #eeeeee;
    }
    .page-pagination ul li a {
        background-color: #f6f6f6;
    }
</style>