<template>
    <div>
        <div class="jaliana">
            <div class="">
                <header-component @categorize="getCategories($event)" />
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
                                                Categories
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
                                                            <span
                                                                >Categories</span
                                                            >
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
                            id="shopify-section-list-collection-template"
                            class="shopify-section"
                        >
                            <section class="ptb--120 bg__white">
                                <div class="list-collection-template container">
                                    <div
                                        v-for="category in categories"
                                        :key="category.id"
                                    >
                                        <div
                                            class="row"
                                            v-if="category.products.length > 0"
                                        >
                                            <div class="col-md-12">
                                                <div
                                                    class="
                                                        section__title
                                                        section__title--2
                                                        text-center
                                                    "
                                                >
                                                    <h2 class="title__line">
                                                        {{ category.name }}
                                                    </h2>
                                                    <a
                                                        :href="
                                                            '/products?category=' +
                                                            category.name
                                                        "
                                                        :title="
                                                            'Browse our ' +
                                                            category.name +
                                                            ' collection'
                                                        "
                                                        >More
                                                        {{
                                                            category.name
                                                        }}
                                                        &rsaquo;</a
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="row"
                                            v-if="category.products.length > 0"
                                        >
                                            <div
                                                class="
                                                    col-md-3 col-sm-6 col-xs-12
                                                "
                                                v-for="product in category.products.slice(
                                                    0,
                                                    4
                                                )"
                                                :key="product.id"
                                            >
                                                <div class="product foo">
                                                    <div class="product__inner">
                                                        <div class="pro__thumb">
                                                            <a
                                                                class="image"
                                                                :href="
                                                                    '/products/' +
                                                                    product.title
                                                                "
                                                                v-if="
                                                                    product.images
                                                                "
                                                                ><img
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

                                                                <li>
                                                                    <a
                                                                        class="
                                                                            cart__menu
                                                                        "
                                                                        href="#!"
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
      
                                                            <a class="action--wishlist tile-actions--btn flex wishlist-btn wishlist" :class="{'is-active' : checkWishlist(product)}" href="#!" :data-product-handle="product.title" @click.prevent="wishlist(product)" tabindex="0">
                                                            <span data-toggle="tooltip" title="Add Wishlist" class="ti-heart" data-original-title="Add Wishlist" v-if="!checkWishlist(product)"></span>
                                                            <span data-toggle="tooltip" title="Remove Wishlist" class="ti-heart-broken" data-original-title="Remove Wishlist" v-else></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="product__details"
                                                    >
                                                        <h2>
                                                            <a
                                                                :href="
                                                                    '/products/' +
                                                                    product.title
                                                                "
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
                                        <hr
                                            class="mtb--50"
                                            v-if="category.products.length > 0"
                                        />
                                    </div>
                                </div>
                            </section>
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
        />
    </div>
</template>
<script>
    import FooterComponent from "./FooterComponent.vue";
    import HeaderComponent from "./HeaderComponent.vue";
    import QuickviewComponent from "./QuickviewComponent.vue";
    export default {
        components: { HeaderComponent, FooterComponent, QuickviewComponent },
        data() {
            return {
                categories: [],
                product: {},
            };
        },
        methods: {
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
            getCategories(e) {
                this.categories = e;
            },
            synopsis(inputString, len) {
                var div = document.createElement("div");
                div.innerHTML = inputString;
                return div.textContent.slice(0, len);
            },
            quickView(product) {
                this.product = product;
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
        },
        mounted() {},
    };
</script>
<style scoped>
    a.image img {
        height: 270px;
    }
</style>