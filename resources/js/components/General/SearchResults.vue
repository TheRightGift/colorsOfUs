<template>
    <div>
        <div class="jalaina">
            <div class="" style="">
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
                                                Search:
                                                {{ prdLen == 0 ? 0 : prdLen }}
                                                results found for "{{ query }}
                                                "
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
                                                                >Search:
                                                                {{
                                                                    prdLen == 0
                                                                        ? 0
                                                                        : prdLen
                                                                }}
                                                                results found
                                                                for "{{
                                                                    query
                                                                }}
                                                                "</span
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
                        <div class="ptb--100 search-page">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 col-md-push-2">
                                        <h4 class="text-center search-title">
                                            Your search for "{{ query }}"{{
                                                prdLen == 0
                                                    ? " did not yield any results."
                                                    : " revealed the following:"
                                            }}
                                        </h4>
                                        <div class="hidden-xl">
                                            <form class="form-inline" @submit.prevent="searchVal">
                                                <input
                                                    class="form-control mr-sm-2"
                                                    type="search"
                                                    placeholder="Search"
                                                    aria-label="Search"
                                                    v-model="searchValue"
                                                />
                                                <button
                                                    class="
                                                        btn btn-outline-success
                                                        my-2 my-sm-0
                                                    "
                                                    type="submit"
                                                >
                                                    Search
                                                </button>
                                            </form>
                                        </div>
                                        <hr class="hr--clear mb-50" />
                                        <div
                                            class="search-item"
                                            v-if="!nextPrev"
                                        >
                                            <div class="row">
                                                <div
                                                    class="
                                                        single__list__content
                                                        clearfix
                                                    "
                                                    v-for="item in products.data"
                                                    :key="item.id"
                                                >
                                                    <div
                                                        class="
                                                            col-md-4
                                                            col-sm-4
                                                            col-xs-12
                                                        "
                                                        v-if="!item.body"
                                                    >
                                                        <div
                                                            class="list__thumb"
                                                        >
                                                            <a
                                                                class=""
                                                                :href="
                                                                    '/products/' +
                                                                    item.title
                                                                "
                                                                ><img
                                                                    v-if="
                                                                        !item.body
                                                                    "
                                                                    :src="
                                                                        item
                                                                            .images[0]
                                                                            .url
                                                                    "
                                                                    :alt="
                                                                        item.title
                                                                    "
                                                            /></a>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="
                                                            col-md-8
                                                            col-sm-8
                                                            col-xs-12
                                                        "
                                                        v-if="!item.body"
                                                    >
                                                        <div
                                                            class="
                                                                list__details__inner
                                                            "
                                                        >
                                                            <h2>
                                                                <a
                                                                    :href="
                                                                        '/products/' +
                                                                        item.title
                                                                    "
                                                                    >{{
                                                                        item.title
                                                                    }}</a
                                                                >
                                                            </h2>

                                                            <div
                                                                class="
                                                                    search-description
                                                                "
                                                            >
                                                                <p>
                                                                    {{
                                                                        synopsis(
                                                                            item.desc,
                                                                            120
                                                                        )
                                                                    }}
                                                                </p>
                                                            </div>

                                                            <span
                                                                class="
                                                                    product__price
                                                                "
                                                                ><span
                                                                    class="
                                                                        money
                                                                    "
                                                                    >&#8358;{{
                                                                        item.amount
                                                                    }}</span
                                                                ></span
                                                            >
                                                            <div
                                                                class="
                                                                    shop__btn
                                                                "
                                                            >
                                                                <a
                                                                    class="
                                                                        htc__btn
                                                                        cart__menu
                                                                    "
                                                                    href="#!"
                                                                    @click.prevent="
                                                                        addToCart(
                                                                            item
                                                                        )
                                                                    "
                                                                    ><span
                                                                        class="
                                                                            ti-shopping-cart
                                                                        "
                                                                    ></span
                                                                    >Add to
                                                                    Cart</a
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="
                                                            col-md-12
                                                            col-sm-12
                                                            col-xs-12
                                                        "
                                                        v-else
                                                    >
                                                        <div
                                                            class="
                                                                list__details__inner
                                                            "
                                                        >
                                                            <h2>
                                                                <a
                                                                    :href="
                                                                        '/blog/' +
                                                                        item.title
                                                                    "
                                                                    v-html="
                                                                        synopsis(
                                                                            item.body,
                                                                            80
                                                                        )
                                                                    "
                                                                ></a>
                                                            </h2>

                                                            <div
                                                                class="
                                                                    search-description
                                                                "
                                                            ></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            id="loading-center-absolute"
                                            v-else
                                        >
                                            <div
                                                class="object"
                                                id="object_four"
                                            ></div>
                                            <div
                                                class="object"
                                                id="object_three"
                                            ></div>
                                            <div
                                                class="object"
                                                id="object_two"
                                            ></div>
                                            <div
                                                class="object"
                                                id="object_one"
                                            ></div>
                                        </div>
                                        <div
                                            class="
                                                pagination-box
                                                text-center
                                                mt--60
                                            "
                                            :class="{ 'mt--60--add': nextPrev }"
                                        >
                                            <div class="pagination-ineer">
                                                <div
                                                    class="
                                                        page-pagination
                                                        text-center
                                                        col-xs-12
                                                        fix
                                                    "
                                                >
                                                    <nav class="pagination">
                                                        <ul class="">
                                                            <li
                                                                class="prev"
                                                                :class="{
                                                                    disabled:
                                                                        prevPage ==
                                                                        null,
                                                                }"
                                                            >
                                                                <a
                                                                    href=""
                                                                    @click.prevent="
                                                                        prev
                                                                    "
                                                                >
                                                                    <span
                                                                        ><i
                                                                            class="
                                                                                zmdi
                                                                                zmdi-chevron-left
                                                                            "
                                                                        ></i
                                                                    ></span>
                                                                </a>
                                                            </li>

                                                            <li
                                                                :class="{
                                                                    active: link.active,
                                                                }"
                                                                v-for="(
                                                                    link, index
                                                                ) in links"
                                                                :key="index"
                                                            >
                                                                <a
                                                                    href="#!"
                                                                    @click.prevent="
                                                                        page(
                                                                            link.url
                                                                        )
                                                                    "
                                                                    >{{
                                                                        link.label
                                                                    }}</a
                                                                >
                                                            </li>

                                                            <li
                                                                class="next"
                                                                :class="{
                                                                    disabled:
                                                                        nextPage ==
                                                                        null,
                                                                }"
                                                            >
                                                                <a
                                                                    href="#!"
                                                                    title="Next »"
                                                                    @click.prevent="
                                                                        next
                                                                    "
                                                                    ><span
                                                                        aria-hidden="true"
                                                                        ><i
                                                                            class="
                                                                                zmdi
                                                                                zmdi-chevron-right
                                                                            "
                                                                        ></i></span
                                                                ></a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    export default {
        components: { FooterComponent, HeaderComponent },
        data() {
            return {
                initial: 0,
                links: [],
                nextPrev: false,
                pageClickedUrl: "",
                prdLen: 0,
                prevPage: "",
                products: [],
                nextPage: "",
                query: "",
                searchValue: "",
            };
        },
        methods: {
            addToCart(item) {
                item.colors ? (item.color = item.colors[0]) : null;
                item.sizes ? (item.size = item.sizes[0]) : null;

                this.$store.commit("addToCart", item);
                $(".cart__menu").on("click", function () {
                    $(".shopping__cart").addClass("shopping__cart__on"),
                        $(".body__overlay").addClass("is-visible");
                });
            },
            next() {
                this.nextPrev = true;
                this.initial = 1;
                this.search();
            },
            page(e) {
                this.nextPrev = true;
                this.pageClickedUrl = e;
                this.initial = 3;
                this.search();
            },
            prev() {
                this.nextPrev = true;
                this.initial = 2;
                this.search();
            },
            searchVal() {
                window.location.href = location.origin+'/search?q='+this.searchValue;
            },
            search() {
                let path = new URLSearchParams(window.location.search);
                if (path.has("q")) {
                    this.query = path.get("q");
                    let url;
                    switch (this.initial) {
                        case 0:
                            url = `api/search/${this.query}`;
                            break;
                        case 1:
                            url = this.nextPage;
                            break;
                        case 2:
                            url = this.prevPage;
                            break;
                        case 3:
                            url = this.pageClickedUrl;
                            break;
                        default:
                            console.log();
                    }
                    axios
                        .get(url)
                        .then((res) => {
                            this.products = res.data.results;
                            this.prdLen = res.data.results.total;
                            let linksLen = res.data.results.links.length;
                            this.prevPage = res.data.results.prev_page_url;
                            this.nextPage = res.data.results.next_page_url;
                            let linksNumber = res.data.results.links.splice(
                                1,
                                linksLen - 2
                            );
                            this.links = linksNumber;
                            this.nextPrev = false;
                        })
                        .catch((err) => {
                            console.log(err);
                        });
                }
            },
            synopsis(inputString, len) {
                var div = document.createElement("div");
                div.innerHTML = inputString;
                return div.textContent.slice(0, len);
            },
        },
        mounted() {
            this.initial = 0;
            this.search();
        },
    };
</script>
<style>
    .mt--60--add {
        margin-top: 150px !important;
    }
</style>
<style scoped>
    .form-inline {
        display: flex;
        margin-top: 10px;
    }
    @media (max-width: 767px) {
        .hidden-xl {
            display: block;
        }
    }
    @media (min-width: 1200px) {
        .hidden-xl {
            display: none;
        }
    }
    .btn:hover {
        color: rgb(243, 240, 240);
        background-color: rgb(247, 173, 185) !important;
    }
</style>