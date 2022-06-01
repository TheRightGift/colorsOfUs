<template>
    <div>
        <div class="jaliana">
            <div class="">
                <header-component />
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
                                                {{ blog.title }}
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
                                                                href="/blogs"
                                                                title=""
                                                                >Blog Posts</a
                                                            >

                                                            <span>{{
                                                                blog.title
                                                            }}</span>
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
                            id="shopify-section-article-template"
                            class="shopify-section"
                        >
                            <!-- Start Our Blog Area -->
                            <section
                                class="blog-details-wrap ptb--120 bg__white"
                            >
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-9 col-sm-12">
                                            <div
                                                class="
                                                    blog-details-left-sidebar
                                                "
                                            >
                                                <div class="blog-details-top">
                                                    <!--Start Blog Thumb -->
                                                    <div
                                                        class="
                                                            blog-details-thumb-wrap
                                                        "
                                                    >
                                                        <div
                                                            class="
                                                                blog-details-thumb
                                                            "
                                                        >
                                                            <img
                                                                v-if="
                                                                    blog.images
                                                                "
                                                                :src="
                                                                    blog
                                                                        .images[0]
                                                                        .url
                                                                "
                                                                :alt="
                                                                    blog.title
                                                                "
                                                            />
                                                        </div>
                                                        <div
                                                            class="
                                                                upcoming-date
                                                            "
                                                        >
                                                            {{
                                                                moment(
                                                                    blog.created_at
                                                                ).format("D")
                                                            }}<span
                                                                class="upc-mth"
                                                                >{{
                                                                    moment(
                                                                        blog.created_at
                                                                    ).format(
                                                                        "MMM,YYYY"
                                                                    )
                                                                }}</span
                                                            >
                                                        </div>
                                                    </div>
                                                    <!--End Blog Thumb -->
                                                    <h2>
                                                        {{ blog.title }}
                                                    </h2>
                                                    <div
                                                        class="
                                                            blog-admin-and-comment
                                                        "
                                                    >
                                                        <p>
                                                            BY :
                                                            {{
                                                                blog.postedBy !=
                                                                null
                                                                    ? blog.postedBy
                                                                    : "ColorsOfUs Admin"
                                                            }}
                                                        </p>
                                                    </div>
                                                    <!-- Start Blog Pra -->
                                                    <div
                                                        class="blog-details-pra"
                                                        v-html="blog.body"
                                                    ></div>
                                                    <!-- End Blog Pra -->
                                                    <!-- Start Blog Tags -->
                                                    <div class="postandshare">
                                                        <!-- <div class="post">
                                                            <p>Tags :</p>
                                                            <ul>
                                                                <li>
                                                                    <a
                                                                        href="tagged/bed.html"
                                                                        title="Show articles tagged bed"
                                                                        >bed</a
                                                                    >,
                                                                </li>

                                                                <li>
                                                                    <a
                                                                        href="tagged/black.html"
                                                                        title="Show articles tagged black"
                                                                        >black</a
                                                                    >,
                                                                </li>

                                                                <li>
                                                                    <a
                                                                        href="tagged/chair.html"
                                                                        title="Show articles tagged chair"
                                                                        >chair</a
                                                                    >,
                                                                </li>

                                                                <li>
                                                                    <a
                                                                        href="tagged/clock.html"
                                                                        title="Show articles tagged clock"
                                                                        >clock</a
                                                                    >,
                                                                </li>

                                                                <li>
                                                                    <a
                                                                        href="tagged/glass.html"
                                                                        title="Show articles tagged glass"
                                                                        >glass</a
                                                                    >
                                                                </li>
                                                            </ul>
                                                        </div> -->

                                                        <div
                                                            class="
                                                                blog-social-icon
                                                            "
                                                        >
                                                            <ul
                                                                class="
                                                                    action-button
                                                                    share-button
                                                                    f-left
                                                                "
                                                                :data-permalink="
                                                                    location.href
                                                                "
                                                            >
                                                                <li>
                                                                    <a
                                                                        target="_blank"
                                                                        :href="
                                                                            'http://www.facebook.com/sharer.php?u=' +
                                                                            location.href
                                                                        "
                                                                        title="Share on Facebook"
                                                                        tabindex="0"
                                                                        ><i
                                                                            class="
                                                                                zmdi
                                                                                zmdi-facebook
                                                                            "
                                                                        ></i
                                                                    ></a>
                                                                </li>
                                                                <li>
                                                                    <a
                                                                        target="_blank"
                                                                        :href="
                                                                            'http://twitter.com/share?text=' +
                                                                            blog.title +
                                                                            '&amp;url=' +
                                                                            location.href +
                                                                            ';source=webclient'
                                                                        "
                                                                        title="Share on Twitter"
                                                                        tabindex="0"
                                                                        ><i
                                                                            class="
                                                                                zmdi
                                                                                zmdi-twitter
                                                                            "
                                                                        ></i
                                                                    ></a>
                                                                </li>

                                                                <li>
                                                                    <a
                                                                        v-if="
                                                                            blog.images
                                                                        "
                                                                        target="_blank"
                                                                        :href="
                                                                            'https://pinterest.com/pin/create/button/indexbdc4.html?url=' +
                                                                            location.href +
                                                                            '&amp;media=' +
                                                                            location.origin +
                                                                            '/' +
                                                                            blog
                                                                                .images[0]
                                                                                .url +
                                                                            '&amp;description=' +
                                                                            blog.title
                                                                        "
                                                                        title="Share on Pinterest"
                                                                        tabindex="0"
                                                                        ><i
                                                                            class="
                                                                                zmdi
                                                                                zmdi-pinterest
                                                                            "
                                                                        ></i
                                                                    ></a>
                                                                </li>

                                                                <li>
                                                                    <a
                                                                        target="_blank"
                                                                        :href="
                                                                            'http://plus.google.com/share?url=' +
                                                                            location.href
                                                                        "
                                                                        title="Share on Google+"
                                                                        tabindex="0"
                                                                        ><i
                                                                            class="
                                                                                zmdi
                                                                                zmdi-google-plus
                                                                            "
                                                                        ></i
                                                                    ></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- End Blog Tags -->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-12">
                                            <div
                                                class="
                                                    blod-details-right-sidebar
                                                "
                                            >
                                                <!-- Search store -->
                                                <div
                                                    class="category-search-area"
                                                >
                                                    <form
                                                        class="
                                                            input-group
                                                            search-bar
                                                        "
                                                        role="search"
                                                        @submit.prevent="search"
                                                    >
                                                        <input
                                                            type="search"
                                                            v-model="query"
                                                            placeholder="Search our store"
                                                            class=""
                                                            aria-label="Search our store"
                                                        />
                                                        <button
                                                            type="submit"
                                                            class="srch-btn"
                                                            href="#"
                                                            v-if="query != ''"
                                                        >
                                                            <i
                                                                class="
                                                                    zmdi
                                                                    zmdi-search
                                                                "
                                                            ></i>
                                                        </button>
                                                    </form>
                                                </div>

                                                <!-- Recent Posts -->
                                                <div
                                                    class="
                                                        our-recent-post
                                                        mt--60
                                                    "
                                                    v-if="recents.length > 0"
                                                >
                                                    <h2 class="section-title-2">
                                                        Recent Posts
                                                    </h2>

                                                    <div
                                                        class="
                                                            our-recent-post-wrap
                                                        "
                                                    >
                                                        <!-- Start Single Post -->
                                                        <div
                                                            class="
                                                                single-recent-post
                                                            "
                                                            v-for="recent in recents"
                                                            :key="recent.id"
                                                        >
                                                            <div
                                                                class="
                                                                    recent-thumb
                                                                "
                                                            >
                                                                <a
                                                                    :href="
                                                                        recent.title
                                                                    "
                                                                    v-if="
                                                                        recent.images
                                                                    "
                                                                    ><img
                                                                        :src="
                                                                            recent
                                                                                .images[0]
                                                                                .url
                                                                        "
                                                                        :alt="
                                                                            recent.title
                                                                        "
                                                                /></a>
                                                            </div>
                                                            <div
                                                                class="
                                                                    recent-details
                                                                "
                                                            >
                                                                <div
                                                                    class="
                                                                        recent-post-dtl
                                                                    "
                                                                >
                                                                    <h6>
                                                                        <a
                                                                            :href="
                                                                                recent.title
                                                                            "
                                                                            >{{
                                                                                recent.title
                                                                            }}</a
                                                                        >
                                                                    </h6>
                                                                </div>
                                                                <div
                                                                    class="
                                                                        recent-post-time
                                                                    "
                                                                >
                                                                    <p>
                                                                        {{
                                                                            moment(
                                                                                recent.created_at
                                                                            ).format(
                                                                                "D MMM YYYY"
                                                                            )
                                                                        }}
                                                                    </p>
                                                                    <p
                                                                        class="
                                                                            separator
                                                                        "
                                                                    >
                                                                        |
                                                                    </p>
                                                                    <p>
                                                                        {{
                                                                            moment(
                                                                                recent.created_at
                                                                            ).format(
                                                                                "hh:mm"
                                                                            )
                                                                        }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single Post -->
                                                    </div>
                                                </div>

                                                <!-- Archives -->
                                                <div
                                                    class="
                                                        single-sidebar
                                                        archive-article
                                                        mt--60
                                                    "
                                                >
                                                    <h2 class="section-title-2">
                                                        Archive
                                                    </h2>
                                                    <dl>
                                                        <dt>
                                                            {{
                                                                moment(
                                                                    archiveDate.created_at
                                                                ).format(
                                                                    "MMMM YYYY"
                                                                )
                                                            }}
                                                        </dt>
                                                        <dd>
                                                            <ul
                                                                class="
                                                                    archive-sidebar
                                                                "
                                                            >
                                                                <li
                                                                    v-for="archive in archives"
                                                                    :key="
                                                                        archive.id
                                                                    "
                                                                >
                                                                    <a
                                                                        :href="
                                                                            archive.title
                                                                        "
                                                                        title=""
                                                                        >{{
                                                                            archive.title
                                                                        }}</a
                                                                    >
                                                                </li>
                                                            </ul>
                                                        </dd>
                                                    </dl>
                                                </div>

                                                <!-- Start Tag -->

                                                <!-- <div
                                                    class="our-blog-tag mt--60"
                                                >
                                                    <h2 class="section-title-2">
                                                        Tags
                                                    </h2>

                                                    <ul class="tag-menu mt-40">
                                                        <li>
                                                            <a
                                                                class=""
                                                                href="tagged/bed.html"
                                                                >bed</a
                                                            >
                                                        </li>

                                                        <li>
                                                            <a
                                                                class=""
                                                                href="tagged/black.html"
                                                                >black</a
                                                            >
                                                        </li>

                                                        <li>
                                                            <a
                                                                class=""
                                                                href="tagged/box.html"
                                                                >box</a
                                                            >
                                                        </li>

                                                        <li>
                                                            <a
                                                                class=""
                                                                href="tagged/camera.html"
                                                                >camera</a
                                                            >
                                                        </li>

                                                        <li>
                                                            <a
                                                                class=""
                                                                href="tagged/chair.html"
                                                                >chair</a
                                                            >
                                                        </li>

                                                        <li>
                                                            <a
                                                                class=""
                                                                href="tagged/clock.html"
                                                                >clock</a
                                                            >
                                                        </li>

                                                        <li>
                                                            <a
                                                                class=""
                                                                href="tagged/cool.html"
                                                                >cool</a
                                                            >
                                                        </li>

                                                        <li>
                                                            <a
                                                                class=""
                                                                href="tagged/flower.html"
                                                                >flower</a
                                                            >
                                                        </li>

                                                        <li>
                                                            <a
                                                                class=""
                                                                href="tagged/glass.html"
                                                                >glass</a
                                                            >
                                                        </li>

                                                        <li>
                                                            <a
                                                                class=""
                                                                href="tagged/hand.html"
                                                                >hand</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </div> -->

                                                <!-- End Tag -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- End Our Blog Area -->
                        </div>

                        <!-- Related Product -->
                        <div
                            id="shopify-section-related-products"
                            class="shopify-section"
                            v-if="relatedProducts.length > 0"
                        >
                            <!-- PRODUCT SECTION START -->

                            <section
                                class="htc__choose__us__ares bg__white pb--120"
                            >
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div
                                                class="
                                                    section__title
                                                    section__title--2
                                                    text-center
                                                "
                                            >
                                                <h2 class="title__line">
                                                    Products Related to Blog
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <slick
                                            ref="slick"
                                            :options="slickOptions"
                                            @afterChange="handleAfterChange"
                                            @beforeChange="handleBeforeChange"
                                            @breakpoint="handleBreakpoint"
                                            @destroy="handleDestroy"
                                            @edge="handleEdge"
                                            @init="handleInit"
                                            @reInit="handleReInit"
                                            @setPosition="handleSetPosition"
                                            @swipe="handleSwipe"
                                            @lazyLoaded="handleLazyLoaded"
                                            @lazyLoadError="handleLazeLoadError"
                                            class="
                                                related-product-slider
                                                popular__product__wrap
                                            "
                                        >
                                            <div
                                                class="col-xs-4"
                                                v-for="related in relatedProducts"
                                                :key="related.id"
                                            >
                                                <div class="product">
                                                    <div class="product__inner">
                                                        <div class="pro__thumb">
                                                            <a
                                                                class="image"
                                                                :href="'/products/'+related.title"
                                                                ><img
                                                                    v-if="
                                                                        related.images
                                                                    "
                                                                    :src="
                                                                        related
                                                                            .images[0]
                                                                            .url
                                                                    "
                                                                    alt=""
                                                            /></a>
                                                        </div>

                                                        <div
                                                            class="
                                                                add__to__wishlist
                                                            "
                                                        >
                                                            <a
                                                                class="wishlist"
                                                                href="#!"
                                                                @click.prevent="addRemoveWishList(related)"
                                                                :class="{'is-active': checkWishlist(related)}"
                                                            >
                                                                <span data-toggle="tooltip" title="Remove Wishlist" data-original-title="Remove Wishlist" class="ti-heart-broken"
                                                                    v-if="checkWishlist(related)">
                                                                </span>
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
                                                        class="product__details"
                                                    >
                                                        <h2>
                                                            <a :href="'/products/'+related.title">{{
                                                                related.title
                                                            }}</a>
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
                                                            >
                                                                <span
                                                                    class="
                                                                        money
                                                                    "
                                                                    >&#8358;{{
                                                                        formatPrice(
                                                                            related.amount
                                                                        )
                                                                    }}</span
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
                                                                    >&#8358;{{
                                                                        formatPrice(
                                                                            related.amount
                                                                        )
                                                                    }}</span
                                                                >
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </slick>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </main>
                    <footer-component />
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import FooterComponent from "./FooterComponent.vue";
    import HeaderComponent from "./HeaderComponent.vue";
    import moment from "moment";
    import Slick from "vue-slick";
    import "slick-carousel/slick/slick.css";

    export default {
        beforeUpdate() {
            if (this.$refs.slick) {
                this.$refs.slick.destroy();
            }
        },
        components: { HeaderComponent, FooterComponent, Slick },
        data() {
            return {
                archives: [],
                archiveDate: "",
                blog: {},
                location: window.location,
                query: '',
                recents: [],
                relatedProducts: [],
                slickOptions: {
                    speed: 700,
                    arrows: true,
                    dots: false,

                    slidesToShow: 3,
                    slidesToScroll: 1,
                    prevArrow: '<i class="zmdi zmdi-chevron-left"></i>',
                    nextArrow: '<i class="zmdi zmdi-chevron-right"></i>',
                    responsive: [
                        { breakpoint: 991, settings: { slidesToShow: 2 } },
                        { breakpoint: 767, settings: { slidesToShow: 2 } },
                        { breakpoint: 479, settings: { slidesToShow: 1 } },
                    ],
                    // Any other options that can be got from plugin documentation
                },
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
            checkWishlist(product){
                let wished = this.$store.state.wishlist.find(el => product.id == el.product_id);
                return wished;
            },
            formatPrice(value) {
                let val = value / 1;
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            },
            getBlog() {
                let code = window.location.href.split("/").pop();
                axios.get("/api/blog/" + code).then((res) => {
                    if (res.status == 200) {
                        this.blog = res.data.blogpost;
                        this.relatedProducts = res.data.product;
                        this.recents = res.data.recent.filter(recent => recent.id != this.blog.id);
                        this.archives = res.data.archives;
                        this.archiveDate = res.data.archives[0];
                    }
                });
            },
            // Slick events
            next() {
                this.$refs.slick.next();
            },
            prev() {
                this.$refs.slick.prev();
            },
            reInit() {
                // Helpful if you have to deal with v-for to update dynamic lists
                this.$nextTick(() => {
                    this.$refs.slick.reSlick();
                });
            },
            // Events listeners
            handleAfterChange(event, slick, currentSlide) {
                console.log("handleAfterChange", event, slick, currentSlide);
            },
            handleBeforeChange(event, slick, currentSlide, nextSlide) {
                console.log(
                    "handleBeforeChange",
                    event,
                    slick,
                    currentSlide,
                    nextSlide
                );
            },
            handleBreakpoint(event, slick, breakpoint) {
                console.log("handleBreakpoint", event, slick, breakpoint);
            },
            handleDestroy(event, slick) {
                console.log("handleDestroy", event, slick);
            },
            handleEdge(event, slick, direction) {
                console.log("handleEdge", event, slick, direction);
            },
            handleInit(event, slick) {
                console.log("handleInit", event, slick);
            },
            handleReInit(event, slick) {
                console.log("handleReInit", event, slick);
            },
            handleSetPosition(event, slick) {
                console.log("handleSetPosition", event, slick);
            },
            handleSwipe(event, slick, direction) {
                console.log("handleSwipe", event, slick, direction);
            },
            handleLazyLoaded(event, slick, image, imageSource) {
                console.log("handleLazyLoaded", event, slick, image, imageSource);
            },
            handleLazeLoadError(event, slick, image, imageSource) {
                console.log(
                    "handleLazeLoadError",
                    event,
                    slick,
                    image,
                    imageSource
                );
            },
            moment(arg) {
                return moment(arg);
            },
            search() {
                window.location.href = location.origin+'/search?q='+this.query;
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
        },
        mounted() {
            this.getBlog();
        },
        updated() {
            this.$nextTick(function () {
                if (this.$refs.slick) {
                    this.$refs.slick.create(this.slickOptions);
                }
            });
        },
    };
</script>
<style scoped>
    @media (min-width: 1366px) {
        a.image img {
            height: 370px;
        }
    }
    @media (max-width: 767px) {
        a.image img {
            height: 270px;
        }
    }
</style>