<template>
    <div>
        <div class="jaliana">
            <div class="fixed-footer">
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
                                                {{ resource.title }}
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
                                                            <span>{{
                                                                resource.title
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
                            id="shopify-section-product-template"
                            class="shopify-section"
                        >
                            <!-- Start Product Details -->

                            <section
                                class="
                                    htc__product__details
                                    pt--120
                                    pb--100
                                    bg__white
                                "
                            >
                                <div class="container">
                                    <div class="row">
                                        <div
                                            class="col-md-7 col-sm-12 col-xs-12"
                                        >
                                            <div
                                                class="
                                                    product__details__container
                                                "
                                            >
                                                <!-- Start Small images -->

                                                <ul
                                                    class="
                                                        product__small__images
                                                    "
                                                    id="ProductThumbs"
                                                >
                                                    <li
                                                        role="presentation"
                                                        class="
                                                            pot-small-img
                                                            active
                                                        "
                                                        v-for="image in resource.images"
                                                        :key="image.id"
                                                    >
                                                        <a
                                                            class="
                                                                product-single__thumbnail
                                                            "
                                                            :href="image.url"
                                                            @click.prevent="
                                                                selImg(image)
                                                            "
                                                        >
                                                            <img
                                                                :src="image.url"
                                                                alt=""
                                                            />
                                                        </a>
                                                    </li>
                                                </ul>

                                                <!-- End Small images -->
                                                <div
                                                    class="product__big__images"
                                                >
                                                    <div
                                                        class="
                                                            portfolio-full-image
                                                            tab-content
                                                        "
                                                    >
                                                        <div
                                                            role="tabpanel"
                                                            class="
                                                                tab-pane
                                                                fade
                                                                in
                                                                active
                                                            "
                                                            id="img-tab-1"
                                                        >
                                                            <zoom-on-hover
                                                                :img-normal="
                                                                    image.url
                                                                "
                                                                :scale="2"
                                                            ></zoom-on-hover>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="
                                                col-md-5 col-sm-12 col-xs-12
                                                smt-30
                                                xmt-30
                                            "
                                        >
                                            <div
                                                class="
                                                    htc__product__details__inner
                                                "
                                            >
                                                <div class="pro__detl__title">
                                                    <h2>{{ product.title }}</h2>
                                                </div>
                                                <div class="pro__dtl__rating">
                                                    <div class="pro__rating">
                                                        <span
                                                            class="
                                                                shopify-product-reviews-badge
                                                            "
                                                            data-id="349115940899"
                                                        ></span>
                                                    </div>
                                                </div>
                                                <div class="pro__details">
                                                    <p>
                                                        {{
                                                            synopsis(
                                                                resource.desc,
                                                                60
                                                            )
                                                        }}
                                                    </p>
                                                </div>
                                                <ul class="pro__dtl__prize">
                                                    <li>
                                                        <span id="ProductPrice"
                                                            ><span v-if="resource.promotionals"><span
                                                                class="money"
                                                                v-if="resource.promotionals.length > 0"
                                                                >&#8358;{{discount(resource.promotionals[0].discount, resource.amount)}}.00</span
                                                            ></span>
                                                            <span class="money" v-else
                                                                >&#8358;{{
                                                                    formatPrice(resource.amount)
                                                                }}.00</span
                                                            ></span
                                                        >
                                                    </li>
                                                </ul>
                                                <form
                                                    enctype="multipart/form-data"
                                                    id="add-item-form"
                                                    @submit.prevent="addToCartRes"
                                                >
                                                    <div
                                                        class="pro__dtl__color"
                                                    >
                                                        <template v-if="resource.sizes">
                                                            <div
                                                                class="
                                                                    swatch
                                                                    clearfix
                                                                    Size
                                                                "
                                                                data-option-index="0"
                                                                v-if="resource.sizes.length > 0"
                                                            >
                                                                <div class="header">
                                                                    Size :
                                                                    <p
                                                                        class="
                                                                            field__message
                                                                            field__message--error
                                                                        "
                                                                        v-if="sizeInvalid"
                                                                    >
                                                                        Pick a size
                                                                    </p>
                                                                </div>
                                                                <div v-if="!inputOn" class="blocked">
                                                                    <div
                                                                        :data-value="size.name"
                                                                        class="
                                                                            swatch-element
                                                                            x
                                                                            available
                                                                        "
                                                                        :class="resource.sizes[0].name"
                                                                        v-for="size in resource.sizes" :key="size.id"
                                                                       
                                                                    >
                                                                        <input
                                                                            :id="'swatch-0-'+size.name"
                                                                            type="radio"
                                                                            name="size"
                                                                            :value="size"
                                                                            v-model="selectedSize"
                                                                        />

                                                                        <label
                                                                            :for="'swatch-0-'+size.name"
                                                                        >
                                                                        {{size.name}}
                                                                        </label>
                                                                    </div>
                                                                    <div
                                                                        data-value="custom"
                                                                        class="
                                                                            swatch-element
                                                                            
                                                                            available
                                                                        "
                                                                        @click="updateSize(
                                                                                $event
                                                                            )"   
                                                                    >
                                                                        <input
                                                                            :id="'swatch-0-'+'custom'"
                                                                            type="radio"
                                                                            name="size"
                                                                            value="custom"
                                                                            v-model="selectedSize"
                                                                            
                                                                        />

                                                                        <label
                                                                            :for="'swatch-0-'+'custom'"
                                                                        >
                                                                            Custom Size
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="
                                                                        selector-wrapper
                                                                    "
                                                                    v-if="inputOn
                                                                    "
                                                                    style="display: block;"
                                                                ><input
                                                                        type="number"
                                                                        class="
                                                                            single-option-selector
                                                                            select--wd
                                                                        "
                                                                        v-model="selectedSize"
                                                                        min="20"
                                                                        required
                                                                        autofocus
                                                                    >
                                                                    <button data-v-0841b95d="" type="button" aria-label="Close" @click="closeInput"><span data-v-0841b95d="" aria-hidden="true">×</span></button>
                                                                    <p><small>Custom sizes are pre-orders, and will be produced to meet desired size, thus takes time.</small></p>
                                                                </div>
                                                                
                                                            </div>
                                                        </template>
                                                        <template v-if="resource.colors">
                                                            <div
                                                                class="
                                                                    swatch
                                                                    clearfix
                                                                    Color
                                                                "
                                                                v-if="resource.colors.length > 0"
                                                                data-option-index="2"
                                                            >
                                                                <div class="header">
                                                                    Color :
                                                                    <p
                                                                        class="
                                                                            field__message
                                                                            field__message--error
                                                                        "
                                                                        v-if="colorInvalid"
                                                                    >
                                                                        Pick a color
                                                                    </p>
                                                                </div>

                                                                <div
                                                                    :data-value="color.name"
                                                                    class="
                                                                        swatch-element
                                                                        color
                                                                        brown
                                                                        available
                                                                    "
                                                                    v-for="color in resource.colors" :key="color.id"
                                                                >
                                                                    <input
                                                                        :id="color.id"
                                                                        type="radio"
                                                                        name="color"
                                                                        :value="color"
                                                                        v-model="selectedColor"
                                                                    />

                                                                    <label
                                                                        :for="color.id"
                                                                        :style="{
                                                                            'background-color': color.name
                                                                        }
                                                                        "
                                                                    >
                                                                    </label>
                                                                </div>
                                                                
                                                            </div>
                                                        </template>
                                                    </div>
                                                    <div
                                                        class="
                                                            product-action-wrap
                                                        "
                                                    >
                                                        <div
                                                            class="
                                                                prodict-statas
                                                            "
                                                        >
                                                            <span
                                                                >Quantity
                                                                :</span
                                                            >
                                                        </div>
                                                        <div
                                                            class="
                                                                product-quantity
                                                            "
                                                        >
                                                            <div
                                                                class="
                                                                    product-quantity
                                                                "
                                                            >
                                                                <div
                                                                    class="
                                                                        cart-plus-minus
                                                                    "
                                                                >
                                                                    <input
                                                                        class="
                                                                            cart-plus-minus-box
                                                                        "
                                                                        type="text"
                                                                        name="quantity"
                                                                        value="1"
                                                                        id="resourceQty"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="pro__dtl__btn">
                                                        <li
                                                            class="
                                                                buy__now__btn
                                                            "
                                                        >
                                                            <button
                                                                type="submit"
                                                                id="prd__add"
                                                                class="
                                                                    addtocart
                                                                    cart__menu
                                                                "
                                                                
                                                            >
                                                                add to cart
                                                            </button>
                                                        </li>

                                                        <li>
                                                            <a class="action--wishlist tile-actions--btn flex wishlist-btn wishlist" :class="{'is-active': checkWishlist(resource)}" href="#!" :data-product-handle="resource.title" @click="addRemoveWishList(resource)">
                                                                <span data-toggle="tooltip" title="" class="ti-heart" data-original-title="Add Wishlist" v-if="!checkWishlist(resource)"></span>
                                                                <span data-toggle="tooltip" title="" class="ti-heart-broken" data-original-title="Remove Wishlist" v-else></span>
                                                            </a>

                                                            <a class="go-to-wishlist" v-if="checkWishlist(resource)" href="/dashboard?wishlist">go to wishlist</a>

                                                        </li>

                                                        <li>
                                                            <div
                                                                class="
                                                                    email-print
                                                                "
                                                            >
                                                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                                                <div
                                                                    class="
                                                                        addthis_inline_share_toolbox_umwz
                                                                    "
                                                                ></div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div
                                                        class="
                                                            shopify-payment-button
                                                        "
                                                    >
                                                        <button
                                                            type="button"
                                                            class="
                                                                shopify-payment-button__button
                                                                shopify-payment-button__button--unbranded
                                                                _2ogcW-Q9I-rgsSkNbRiJzA
                                                                _2EiMjnumZ6FVtlC7RViKtj
                                                                _2-dUletcCZ2ZL1aaH0GXxT
                                                            "
                                                            data-testid="Checkout-button"
                                                            @click="checkout(resource)"
                                                        >
                                                            Buy it now
                                                        </button>
                                                    </div>
                                                </form>

                                                <div class="pro__social__share">
                                                    <h2>Share :</h2>

                                                    <ul
                                                        class="
                                                            pro__soaial__link
                                                        "
                                                    >
                                                        <li>
                                                            <a
                                                                target="_blank"
                                                                :href="
                                                                    'http://www.facebook.com/sharer.php?u=https://colorsofus.dev/products/' +
                                                                    resource.title
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
                                                                    resource.title +
                                                                    '&amp;url=https://colorsofus.dev/products/' +
                                                                    resource.title +
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
                                                                target="_blank"
                                                                :href="
                                                                    'http://plus.google.com/share?url=https://colorsofus.dev/products/' +
                                                                    resource.title
                                                                "
                                                                title="Share on Google+"
                                                                tabindex="0"
                                                                ><i
                                                                    class="
                                                                        zmdi
                                                                        zmdi-instagram
                                                                    "
                                                                ></i
                                                            ></a>
                                                        </li>

                                                        <li>
                                                            <a
                                                                target="_blank"
                                                                :href="
                                                                    'https://colorsofus.dev/products/' +
                                                                    resource.title +
                                                                    '&amp;media=http://' +
                                                                    image +
                                                                    '&amp;description=' +
                                                                    resource.desc
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
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- End Product Details -->
                        </div>
                        <div
                            id="shopify-section-product-tab"
                            class="shopify-section"
                        >
                            <!-- Start Product tab -->

                            <section
                                class="
                                    htc__product__details__tab
                                    bg__white
                                    pb--120
                                "
                            >
                                <div class="container">
                                    <div class="row">
                                        <div
                                            class="
                                                col-md-12
                                                col-lg-12
                                                col-sm-12
                                                col-xs-12
                                            "
                                        >
                                            <ul
                                                class="
                                                    product__deatils__tab
                                                    mb--60
                                                "
                                                role="tablist"
                                            >
                                                <li
                                                    role="presentation"
                                                    class="active"
                                                >
                                                    <a
                                                        href="#description"
                                                        role="tab"
                                                        data-toggle="tab"
                                                        >More Info</a
                                                    >
                                                </li>

                                                <li role="presentation">
                                                    <a
                                                        href="#policy"
                                                        role="tab"
                                                        data-toggle="tab"
                                                        >Shipping policy</a
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div
                                                class="
                                                    product__details__tab__content
                                                "
                                            >
                                                <!-- Start Single Content -->

                                                <div
                                                    role="tabpanel"
                                                    id="description"
                                                    class="
                                                        product__tab__content
                                                        fade
                                                        in
                                                        active
                                                    "
                                                >
                                                    <div
                                                        class="
                                                            product__description__wrap
                                                        "
                                                    >
                                                        <div
                                                            class="
                                                                product__desc
                                                            "
                                                        >
                                                            <h2
                                                                class="title__6"
                                                            >
                                                                Details
                                                            </h2>

                                                            <div
                                                                v-html="
                                                                    resource.desc
                                                                "
                                                            ></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- End Single Content -->

                                                <!-- Start Single Content -->

                                                <div
                                                    role="tabpanel"
                                                    id="policy"
                                                    class="
                                                        product__tab__content
                                                        fade
                                                        custom_tab
                                                    "
                                                >
                                                    <h2>
                                                        Shipping policy for our
                                                        store
                                                    </h2>
                                                    <p>
                                                        Lorem ipsum dolor sit
                                                        amet, consectetuer
                                                        adipiscing elit, sed
                                                        diam nonummy nibh
                                                        euismod tincidunt ut
                                                        laoreet dolore magna
                                                        aliquam erat volutpat.
                                                        Ut wisi enim ad minim
                                                        veniam, quis nostrud
                                                        exerci tation
                                                        ullamcorper suscipit
                                                        lobortis nisl ut aliquip
                                                        ex ea commodo consequat.
                                                        Duis autem vel eum
                                                        iriure dolor in
                                                        hendrerit in vulputate
                                                    </p>
                                                    <ul>
                                                        <li>
                                                            1-2 business days
                                                            (Typically by end of
                                                            day)
                                                        </li>
                                                        <li>
                                                            30 days money back
                                                            guaranty
                                                        </li>
                                                        <li>
                                                            24/7 live support
                                                        </li>
                                                        <li>
                                                            odio dignissim qui
                                                            blandit praesent
                                                        </li>
                                                        <li>
                                                            luptatum zzril
                                                            delenit augue duis
                                                            dolore
                                                        </li>
                                                        <li>
                                                            te feugait nulla
                                                            facilisi.
                                                        </li>
                                                    </ul>
                                                    <p>
                                                        &nbsp;Nam liber tempor
                                                        cum soluta nobis
                                                        eleifend option congue
                                                        nihil imperdiet doming
                                                        id quod mazim placerat
                                                        facer possim assum. Typi
                                                        non habent claritatem
                                                        insitam; est usus
                                                        legentis in iis qui
                                                        facit eorum
                                                    </p>
                                                    <p>
                                                        claritatem.
                                                        Investigationes
                                                        demonstraverunt lectores
                                                        legere me lius quod ii
                                                        legunt saepius. Claritas
                                                        est etiam processus
                                                        dynamicus, qui sequitur
                                                        mutationem consuetudium
                                                        lectorum. Mirum est
                                                        notare quam littera
                                                        gothica, quam nunc
                                                        putamus parum claram,
                                                        anteposuerit litterarum
                                                        formas humanitatis per
                                                    </p>
                                                    <p>
                                                        seacula quarta decima et
                                                        quinta decima. Eodem
                                                        modo typi, qui nunc
                                                        nobis videntur parum
                                                        clari, fiant sollemnes
                                                        in futurum.
                                                    </p>
                                                </div>

                                                <!-- End Single Content -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- End Product tab -->
                        </div>
                        <!-- Related Product -->
                        <div
                            id="shopify-section-related-products"
                            class="shopify-section"
                        >
                            <!-- PRODUCT SECTION START -->

                            <section
                                class="htc__choose__us__ares bg__white pb--120"
                                v-if="relatedProducts.length > 0"
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
                                                    Related Product
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
                                                                :href="
                                                                    related.title
                                                                "
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
                                                                                related
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
                                                                        related
                                                                            .colors
                                                                            .length ==
                                                                            0 &&
                                                                        related
                                                                            .sizes
                                                                            .length ==
                                                                            0
                                                                    "
                                                                >
                                                                    <a
                                                                        class="
                                                                            cart__menu
                                                                        "
                                                                        href="javascript:void(0);"
                                                                        @click="
                                                                            addToCart(
                                                                                related
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
      
                                                            <a class="action--wishlist tile-actions--btn flex wishlist-btn wishlist" :class="{'is-active' : checkWishlist(related)}" href="#!" :data-product-handle="related.title" @click.prevent="addRemoveWishList(related)" tabindex="0">
                                                            <span data-toggle="tooltip" title="Add Wishlist" class="ti-heart" data-original-title="Add Wishlist" v-if="!checkWishlist(related)"></span>
                                                            <span data-toggle="tooltip" title="Remove Wishlist" class="ti-heart-broken" data-original-title="Remove Wishlist" v-else></span>
                                                            </a>

                                                            <a class="go-to-wishlist" href="/dashboard?wishlist" tabindex="0" v-if="checkWishlist(resource)">go to wishlist</a>


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
                                                                    v-if="related.promotionals.length > 0"
                                                                >
                                                                    <span
                                                                        class="
                                                                            money
                                                                        "
                                                                        >&#8358;{{
                                                                            formatPrice(
                                                                                related.amount
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
                                                                        v-if="related.promotionals.length > 0"
                                                                        >&#8358;{{discount(related.promotionals[0].discount, related.amount)}}.00</span
                                                                    >
                                                                    <span
                                                                        class="
                                                                            money
                                                                        "
                                                                        v-else
                                                                        >&#8358;{{
                                                                            formatPrice(
                                                                                related.amount
                                                                            )
                                                                        }}.00</span
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
        <quickview-component
            :product="product"
            :formatPrice="formatPrice"
            :synopsis="synopsis"
            :discount="discount"
        />
    </div>
</template>

<script>
    import Slick from "vue-slick";
    import "slick-carousel/slick/slick.css";
    import FooterComponent from "./FooterComponent.vue";
    import HeaderComponent from "./HeaderComponent.vue";
    import QuickviewComponent from "./QuickviewComponent.vue";
    
    export default {
        beforeUpdate() {
            if (this.$refs.slick) {
                this.$refs.slick.destroy();
            }
        },
        components: {
            HeaderComponent,
            FooterComponent,
            Slick,
            QuickviewComponent,
            zoomOnHover: zoomOnHover,
        },
        data() {
            return {
                colorInvalid: false,
                image: {},
                inputOn: false,
                product: {},
                relatedProducts: [],
                resource: {},
                selectedColor: {},
                selectedSize: {},
                sizeInvalid: false,
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
                zoomerOptions: {
                    zoomFactor: 3, // scale for zoomer
                    pane: "pane", // three type of pane ['pane', 'container-round', 'container']
                    hoverDelay: 300, // how long after the zoomer take effect
                    namespace: "zoomer", // add a namespace for zoomer component, useful when on page have mutiple zoomer
                    move_by_click: false, // move image by click thumb image or by mouseover
                    scroll_items: 5, // thumbs for scroll
                    choosed_thumb_border_color: "#bbdefb", // choosed thumb border color
                    scroller_button_style: "line",
                    scroller_position: "left",
                    zoomer_pane_position: "right",
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
            addToCartRes() {
                this.resource.colors.length > 0 ? 
                    Object.entries(this.selectedColor).length == 0 ? this.colorInvalid = true : this.colorInvalid = false 
                    : null;

                this.resource.sizes.length > 0 ? 
                    Object.entries(this.selectedSize).length == 0 ? this.sizeInvalid = true : this.sizeInvalid = false 
                : null;
                
                if (!this.sizeInvalid && !this.colorInvalid)  {
                    let color, size;
                    let input = parseInt(document.getElementById("resourceQty").value);
                    let customized = '0'; // If customer enters his own size
                    this.resource.colors.length > 0 ?  color = this.selectedColor : null;
                    this.resource.sizes.length > 0 ?  size = this.selectedSize : null;
                    this.inputOn ? customized = '1' : null; 
                    this.$store.commit("addToCart", {...this.resource, color: color, size: size, input: input, customized: customized});
                    document.getElementById("resourceQty").value = 1;
                }
            },
            checkout(res) {
                console.log(res);
            },
            checkWishlist(product){
                let wished = this.$store.state.wishlist.find(el => product.id == el.product_id);
                return wished;
            },
            closeInput() {
                this.inputOn = false;
                this.selectedSize = {};
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
            getProduct() {
                let code = window.location.href.split("/").pop();
                axios.get("/api/product/" + code).then((res) => {
                    if (res.data.status == 1) {
                        this.resource = res.data.product;
                        this.relatedProducts = res.data.related.filter(
                            (product) => product.id != this.resource.id
                        );
                        this.selImg();
                    }
                });
            },
            quickView(product) {
                this.product = product;
            },
            selImg(img) {
                this.image = img == undefined ? this.resource.images[0] : img;
            },
            synopsis(inputString, len) {
                var div = document.createElement("div");
                div.innerHTML = inputString;
                return div.textContent.slice(0, len);
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
            updateSize(e) {
                this.selectedSize = e.target.value;
                if (this.selectedSize == 'custom') {
                    this.inputOn = true;
                }
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
            this.getProduct();
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
    .blocked {
        display: block;
    }
    .field__message{line-height:1.3em;margin:0.5714285714em 0 0.2857142857em}.field__message--error{color:#ff6d6d}.field__message__icon{margin-right:0.25em;vertical-align:-3px}
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
    .shopify-payment-button__button--unbranded {
        background-color: #f599f5 !important;
        border-radius: 0 !important;
        max-width: 295px;
    }
    .shopify-payment-button__button {
        border-radius: 4px;
        border: none;
        box-shadow: 0 0 0 0 transparent;
        color: white;
        cursor: pointer;
        display: block;
        font-size: 1em;
        font-weight: 500;
        line-height: 1;
        text-align: center;
        width: 100%;
        transition: background 0.2s ease-in-out;
    }
    .shopify-payment-button__button--unbranded {
        background-color: #1990c6;
        padding: 1em 2em;
    }
    ._2ogcW-Q9I-rgsSkNbRiJzA {
        -webkit-animation: _1UiPBn7_kvwWk2eMbG90wa 300ms
            cubic-bezier(0.1, 0.79, 1, 1);
        animation: _1UiPBn7_kvwWk2eMbG90wa 300ms cubic-bezier(0.1, 0.79, 1, 1);
    }
    .pro__dtl__btn {
        margin-bottom: 30px;
    }
</style>