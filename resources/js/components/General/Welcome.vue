<template>
    <div>
        <div class="jalaina">
            <div class="fixed__footer">
                <!-- Header -->
                <header-component @produce="produce($event)" @categorize="categorize($event)"/>

                <div class="">
                    <main role="main" class="main_class">
                        <!-- BEGIN content_for_index -->
                        <div
                            id="shopify-section-1509611507122"
                            class="shopify-section"
                        >
                            <!-- Start Slider Area -->
                            <div
                                class="slider__container slider--two"
                                style="padding-bottom: 100px"
                            >
                                <div class="slider__activation__wrap--2">
                                    <!-- Start Single Slide -->
                                    <div
                                        class="
                                            slider__full--screen slider__bg--2
                                        "
                                    >
                                        <!-- :style="{'background': 'url('+homeBgImg+') no-repeat scroll center center / cover' }" -->
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div
                                                        class="
                                                            slider__content--2
                                                            text-center
                                                        "
                                                    >
                                                        <div
                                                            class="
                                                                slider__inner--2
                                                                text-center
                                                            "
                                                        >
                                                            <h1>
                                                                New Product
                                                                Collection
                                                            </h1>

                                                            <div
                                                                class="
                                                                    slider__btn
                                                                "
                                                            >
                                                                <a
                                                                    class="
                                                                        htc__btn
                                                                    "
                                                                    href="/products"
                                                                    >Shop Now</a
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Slide -->
                                </div>
                            </div>
                            <!-- Start Slider Area -->
                        </div>
                        <div
                            id="shopify-section-1509612143086"
                            class="shopify-section"
                        >
                            <!-- Start Slider Area -->
                            <section
                                class="htc__new__product bg__white mlt_banner"
                                style="padding-bottom: 70px"
                            >
                                <div class="container">
                                    <div class="row">
                                        <div
                                            class="new__product__wrap clearfix"
                                        >
                                            <div
                                                class="
                                                    col-md-6 col-sm-12 col-xs-12
                                                    pb--30
                                                "
                                                v-for="category in categories" :key="category.id"
                                            >
                                                <div class="new__product foo">
                                                    <div
                                                        class="
                                                            new__product__thumb
                                                        "
                                                    >
                                                        <a
                                                            :href="'products?category='+category.name"
                                                        >
                                                            <img
                                                                :src="category.image"
                                                                alt="banner"
                                                            />
                                                        </a>
                                                    </div>

                                                    <div
                                                        class="
                                                            new__product__details
                                                        "
                                                    >
                                                        <h2>
                                                            <a
                                                                :href="'products?category='+category.name"
                                                                >{{category.name}}</a
                                                            >
                                                        </h2>

                                                        <div
                                                            class="
                                                                new__product__btn
                                                            "
                                                        >
                                                            <a
                                                                class="
                                                                    htc__btn
                                                                    shop__now__btn
                                                                "
                                                                :href="'products?category='+category.name"
                                                                >Shop Now</a
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End New Product -->
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Start Our Product Area -->
                        </div>
                        <div
                            id="shopify-section-1509612365061"
                            class="shopify-section"
                        >
                            <!-- Start Our Product Area -->
                            <section
                                class="htc__best__product__area bg__white"
                                style="padding-bottom: 70px"
                            >
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div
                                                class="
                                                    section__title
                                                    section__title--2
                                                    text-center
                                                "
                                            >
                                                <h2 class="title__line">
                                                    Best Products
                                                </h2>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- End Product MEnu -->
                                    <div class="row">
                                        <div
                                            class="
                                                best__product__list
                                                clearfix
                                                mt--60
                                            "
                                        >
                                            <div>
                                                <div
                                                    class="
                                                        col-md-3
                                                        col-sm-6
                                                        col-xs-12
                                                        cards
                                                    "
                                                    v-for="product in products"
                                                    :key="product.id"
                                                >
                                                    <div class="product foo">
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
                                                                    target="_blank"
                                                                    :href="
                                                                        'products/' +
                                                                        product.title
                                                                    "
                                                                    >
                                                                    <h4 v-if="product.promotionals.length > 0" class="righted">{{product.promotionals[0].type}}</h4>
                                                                    <img
                                                                        :src="
                                                                            product
                                                                                .images[0]
                                                                                .url
                                                                        "
                                                                        alt=""
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
                                                                    "
                                                                >
                                                                    <li>
                                                                        <a
                                                                            data-toggle="modal"
                                                                            data-target="#productModal"
                                                                            href="#!"
                                                                            @click="quickView(product)"
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

                                                                    <li v-if="product.colors.length == 0 && product.sizes.length == 0">
                                                                        <a
                                                                            class="
                                                                                cart__menu
                                                                            "
                                                                            href="javascript:void(0);"
                                                                            @click="
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
                                                            <div
                                                                class="
                                                                    add__to__wishlist
                                                                "
                                                            >
                                                                <a
                                                                    class="
                                                                        wishlist
                                                                    "
                                                                    href="#!"
                                                                    @click.prevent="addRemoveWishList(product)"
                                                                    :class="{'is-active': checkWishlist(product)}"
                                                                >
                                                                    <span data-toggle="tooltip" title="Remove Wishlist" data-original-title="Remove Wishlist" class="ti-heart-broken"
                                                                        v-if="checkWishlist(product)"></span>
                                                                    <span
                                                                        data-toggle="tooltip"
                                                                        title="Add Wishlist"
                                                                        class="
                                                                            ti-heart
                                                                        "
                                                                        v-else
                                                                    ></span>
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
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Start Load More BTn -->

                                    <!-- End Load More BTn -->
                                </div>
                            </section>
                            <!-- End Our Product Area -->
                        </div>
                        <div
                            id="shopify-section-1509612805385"
                            class="shopify-section"
                        >
                            <!-- Start Blog Area -->
                            <section
                                class="htc__blog__area bg__white"
                                style="padding-bottom: 70px"
                            >
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div
                                                class="
                                                    section__title
                                                    section__title--2
                                                    text-center
                                                "
                                            >
                                                <h2 class="title__line">
                                                    Recent Posts
                                                </h2>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div
                                            class="
                                                blog__wrap
                                                latest-blog
                                                clearfix
                                                mt--60
                                                xmt-30
                                            "
                                        >
                                            <!-- Start Single Blog -->

                                            <div
                                                class="
                                                    col-md-4 col-sm-4 col-xs-12
                                                    mb--30
                                                "
                                                v-for="blog in blogs"
                                                :key="blog.id"
                                            >
                                                <div class="blog foo">
                                                    <div class="blog__inner">
                                                        <div
                                                            class="blog__thumb"
                                                        >
                                                            <a
                                                                :href="
                                                                    'blog/' +
                                                                    blog.title
                                                                "
                                                                target="_blank"
                                                            >
                                                                <img
                                                                    :src="
                                                                        blog
                                                                            .images[0]
                                                                            .url
                                                                    "
                                                                    alt=""
                                                                />
                                                            </a>
                                                            <div
                                                                class="
                                                                    blog__post__time
                                                                "
                                                            >
                                                                <div
                                                                    class="
                                                                        post__time--inner
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            date
                                                                        "
                                                                        >{{
                                                                            moment(
                                                                                blog.created_at
                                                                            ).format(
                                                                                "D"
                                                                            )
                                                                        }}</span
                                                                    >
                                                                    <span
                                                                        class="
                                                                            month
                                                                        "
                                                                        >{{
                                                                            moment(
                                                                                blog.created_at
                                                                            ).format(
                                                                                "MMM"
                                                                            )
                                                                        }}</span
                                                                    >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="
                                                                blog__hover__info
                                                            "
                                                        >
                                                            <div
                                                                class="
                                                                    blog__hover__action
                                                                "
                                                            >
                                                                <ul
                                                                    class="
                                                                        bl__meta
                                                                    "
                                                                >
                                                                    <li>
                                                                        By :
                                                                        Admin
                                                                    </li>
                                                                </ul>
                                                                <h2
                                                                    class="
                                                                        blog__des
                                                                    "
                                                                >
                                                                    <a
                                                                        :href="
                                                                            'blog/' +
                                                                            blog.title
                                                                        "
                                                                        target="_blank"
                                                                        >{{
                                                                            synopsis(
                                                                                blog.body,
                                                                                80
                                                                            )
                                                                        }}</a
                                                                    >
                                                                </h2>
                                                                <div
                                                                    class="
                                                                        blog__btn
                                                                    "
                                                                >
                                                                    <a
                                                                        class="
                                                                            read__more__btn
                                                                        "
                                                                        :href="
                                                                            'blog/' +
                                                                            blog.title
                                                                        "
                                                                        >Read
                                                                        more</a
                                                                    >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End Single Blog -->
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- End Blog Area -->
                        </div>
                        <!-- END content_for_index -->
                    </main>

                    <!-- Footer -->
                    <footer-component />
                </div>
            </div>
        </div>
        <quickview-component :product="product" :formatPrice="formatPrice" :synopsis="synopsis" :discount="discount" :modalOpened="quickViewOpened"/>
    </div>
</template>

<script>
    import FooterComponent from "./FooterComponent.vue";
    import HeaderComponent from "./HeaderComponent.vue";
    import moment from "moment";
    import QuickviewComponent from './QuickviewComponent.vue';
    export default {
        components: { HeaderComponent, FooterComponent, QuickviewComponent },
        data() {
            return {
                blogs: [],
                categories: [],
                homeBgImg: "",
                product: {},
                products: [],
            };
        },
        computed: {
            
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
                this.categories = e.reverse().slice(0, 2);
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
            formatPrice(value) {
                let val = value / 1;
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            },
            getBlogs() {
                axios
                    .get(`api/blog-published`)
                    .then((res) => {
                        this.blogs = res.data.blogposts.data.slice(0, 3);
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            produce(e) {
                this.products = e.data
                    .reverse()
                    .slice(0, 20);
                let rand = Math.floor(Math.random() * this.products.length);
                this.homeBgImg = this.products[rand].images[0].url;
            },
            moment(arg) {
                return moment(arg);
            },
            quickView(product) {
                this.product = product;
            },
            quickViewOpened () {
                console.log('modal opened');
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
                    .post("api/wishlist", data)
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
        },
        mounted() {
            this.getBlogs();
        },
    };
</script>
<style scoped>
    a.image img {
        height: 270px;
    }
    div.new__product__thumb a img {
        height: 290px;
    }
</style>
<style>
    .righted {
        position: absolute;
        top: 8px;
        right: 0;
        background-color: #f2b8c9;
        padding: 5px;
        color: white;
        font-size: 0.8rem;
        border-bottom-left-radius: 20px;
        border-top-left-radius: 20px
    }
</style>