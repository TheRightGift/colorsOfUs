<template>
    <div>
        <div class="jaliana">
            <div class="">
                <header-component />
                <!-- BREADCRUMBS SETCTION START -->

                <div class="ht__bradcaump__area">
                    <div class="ht__bradcaump__wrap">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="bradcaump__inner text-center">
                                        <h2 class="bradcaump-title">News</h2>
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
                                                        <span>My Blogspot</span>
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
                        id="shopify-section-blog-template"
                        class="shopify-section"
                    >
                        <!-- Start BLog Area -->
                        <div class="htc__blog__area bg__white ptb--120">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div
                                            class="
                                                blog__wrap blog--page
                                                clearfix
                                            "
                                        >
                                            <div class="row">
                                                <!-- Start Single Blog -->

                                                <div
                                                    class="
                                                        col-md-4
                                                        col-sm-4
                                                        col-xs-12
                                                    "
                                                    v-for="blog in blogs"
                                                    :key="blog.id"
                                                >
                                                    <div class="blog foo">
                                                        <div
                                                            class="blog__inner"
                                                        >
                                                            <div
                                                                class="
                                                                    blog__thumb
                                                                "
                                                            >
                                                                <a
                                                                    :href="
                                                                        '/blog/' +
                                                                        blog.title
                                                                    "
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
                                                                            ColorsOfUs
                                                                            Admin
                                                                        </li>

                                                                        <!-- <li>
                                                                            <a
                                                                                href="news/lipsum-dolor-sit-amet-consectetu-adipisicing-elit-sed-do-eius-8.html#comments"
                                                                                >1
                                                                                comment</a
                                                                            >
                                                                        </li> -->
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
                                                                            href="news/lipsum-dolor-sit-amet-consectetu-adipisicing-elit-sed-do-eius-8.html"
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
                                    <!-- End Load More BTn -->
                                </div>
                            </div>
                        </div>
                        <!-- End BLog Area -->
                    </div>
                </main>

                <footer-component />
            </div>
        </div>
    </div>
</template>
<script>
    import FooterComponent from "./FooterComponent.vue";
    import HeaderComponent from "./HeaderComponent.vue";
    import moment from "moment";

    export default {
        components: { HeaderComponent, FooterComponent },
        data() {
            return {
                blogs: [],
                loading: false,
                page: 1,
            };
        },
        methods: {
            getBlogs() {
                axios
                    .get(`api/blog-published?page=${this.page++}`)
                    .then((res) => {
                        this.blogs = [...this.blogs, ...res.data.blogposts.data];
                        this.loading = false;
                        if (this.blogs.length == res.data.blogposts.total) {
                            $("#loadmore-area").fadeOut(1000);
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            loadMore() {
                this.loading = true;
                this.getBlogs();
                let b = 46;
                $(".load-more:lt(" + b + ")").slideDown(1000);
            },
            moment(arg) {
                return moment(arg);
            },
            synopsis(inputString, len) {
                var div = document.createElement("div");
                div.innerHTML = inputString;
                return div.textContent.slice(0, len);
            },
        },
        mounted() {
            this.getBlogs();
        },
    };
</script>