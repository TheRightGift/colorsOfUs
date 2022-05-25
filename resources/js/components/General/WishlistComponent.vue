<template>
    <div>
        <div id="wishlist">
            <div class="">
                <!-- BREADCRUMBS SETCTION START -->

                <div class="ht__bradcaump__area">
                    <div class="ht__bradcaump__wrap">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="bradcaump__inner text-center">
                                        <h2 class="bradcaump-title">
                                            wishlist
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
                                                            >{{$store.state.user.firstname}}</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <span>wishlist</span>
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
                    <div class="wishlist-section fix ptb--120">
                        <div class="container">
                            <div class="customer-login fix account-page">
                                <div
                                    class="
                                        full-width-container
                                        wishlist-container
                                    "
                                >
                                    <!-- Hero Banner -->
                                    <div class="wishlist-hero is_visible">
                                        <h1 class="wishlist-hero--title">
                                            wishlist
                                        </h1>
                                    </div>
                                    <!-- Product Tile Grid -->
                                    <div class="wishlist-grid flex is_visible">
                                        <div
                                            class="
                                                product-tile-container
                                                wishlist-tile-container
                                            "
                                            v-for="wishlist in wishlists" :key="wishlist.id"
                                        >
                                            <div
                                                class="
                                                    product-tile
                                                    wishlist-tile
                                                "
                                            >
                                                <div
                                                    class="
                                                        product-tile--tile-media
                                                    "
                                                >
                                                    <a
                                                        class="
                                                            tile-media--media-link
                                                        "
                                                        :href="'/products/'+wishlist.product.title"
                                                    >
                                                        <div
                                                            class="
                                                                media-link--image
                                                            "
                                                        >
                                                            <img
                                                                class="
                                                                    image--main
                                                                "
                                                                :src="wishlist.product.images[0].url"
                                                                :alt="wishlist.product.title"
                                                            />
                                                        </div>
                                                    </a>
                                                </div>
                                                <div
                                                    class="
                                                        product-tile--tile-content
                                                        flex
                                                    "
                                                >
                                                    <div
                                                        class="
                                                            tile-content--text
                                                        "
                                                    >
                                                        <h4 class="post-title">
                                                            <a
                                                                :href="'/products/'+wishlist.product.title"
                                                                >{{wishlist.product.title}}</a
                                                            >
                                                        </h4>

                                                        <p
                                                            class="
                                                                text--price
                                                                pro-price
                                                            "
                                                        >
                                                            <span
                                                                class="money"
                                                                >&#8358;
                                                                {{formatPrice(wishlist.product.amount)}}</span
                                                            >
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="
                                                            product-tile--tile-actions
                                                            flex
                                                        "
                                                    >
                                                        <a
                                                            class="
                                                                action--wishlist
                                                                tile-actions--btn
                                                                flex
                                                                wishlist-btn
                                                                wishlist
                                                                is-active
                                                            "
                                                            href="#!"
                                                            @click.prevent="wishlisted(wishlist)"
                                                        >
                                                            <span
                                                                data-toggle="tooltip"
                                                                title="Remove Wishlist"
                                                                class="
                                                                    ti-heart-broken
                                                                "
                                                                data-original-title="Remove Wishlist"
                                                            ></span>
                                                        </a>

                                                        <a
                                                            class="
                                                                action--quick-cart
                                                                tile-actions--btn
                                                                flex
                                                                cart-btn
                                                                cart__menu
                                                            "
                                                            href="#!"
                                                            @click.prevent="addToCart(wishlist.product)"
                                                            ><span
                                                                class="
                                                                    ti-shopping-cart
                                                                "
                                                            ></span
                                                        ></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Empty Wishlist -->
                                        <div
                                            class="
                                                wishlist-grid--empty-list
                                                flex
                                            "
                                            v-if="$store.state.wishlist.length == 0"
                                        >
                                            <div
                                                class="
                                                    empty-list--info
                                                    empty-cart-page
                                                "
                                            >
                                                <h2
                                                    class="
                                                        empty-list--text
                                                        black
                                                    "
                                                >
                                                    Your wishlist is currently
                                                    empty!
                                                </h2>
                                                <p>
                                                    Continue browsing
                                                    <a href="/products"
                                                        >here</a
                                                    >.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="row mt--60"
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
                                                    @click="loadMore"
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
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>
<script>
    import moment from "moment";
    export default {
        name: "Wishlists",
        data() {
            return {
                loading: false,
                page: 1,
                wishlists: [],
            };
        },
        methods: {
            addToCart(res) {
                let size, color;
                res.sizes.length > 0 ? size = res.sizes[0] : null;
                res.colors.length > 0 ? color = res.colors[0] : null;
                this.$store.commit("addToCart", {...res, color: color, size: size});
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
            moment(arg) {
                return moment(arg);
            },
            formatPrice(value) {
                let val = value / 1;
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            },
            getWishList() {
                let userId = this.$store.state.user.id;
                axios
                    .get(`api/wishlist/${userId}?page=${this.page++}`)
                    .then((res) => {
                        this.wishlists = [...this.wishlists, ...res.data.wishlists.data];
                        this.loading = false;
                        if (this.wishlists.length == res.data.wishlists.total) {
                            $("#loadmore-area").fadeOut(1000);
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            loadMore() {
                this.loading = true;
                this.getWishList();
                let b = 46;
                $(".load-more:lt(" + b + ")").slideDown(1000);
            },
            wishlisted(prd) {
                let data = {
                    user_id: this.$store.state.user.id,
                    product_id: prd.product.id,
                };
                axios
                    .post("api/wishlist", data)
                    .then((res) => {
                        if (res.status === 204) {
                            this.$toasted.show("Removed from Wishlist!", {
                                duration: 2000,
                                position: "top-right",
                            });
                            this.$store.commit("removeFromWishList", prd.product);
                        }
                        this.wishlists.splice(
                            this.wishlists.findIndex(
                                (rol) => rol.id === prd.id
                            ),
                            1
                        );
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
        },
        mounted() {
            this.getWishList();
        },
    };
</script>
<style scoped>
    .media-link--image img {
        height: 270px;
    }
    div.new__product__thumb a img {
        height: 290px;
    }
</style>