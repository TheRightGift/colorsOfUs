<template>
    <div>
        <a href="#main-header" class="skip-to-content"> Skip to content </a>

        <header class="banner" data-header="" role="banner">
            <div class="wrap">
                <a class="logo logo--left" href="/">
                    <!-- <img
                            alt="uniqlo-minimal"
                            class="logo__image logo__image--medium"
                            src="//cdn.shopify.com/s/files/1/2300/9895/files/uniqlo.png?2045"
                    /> -->
                    COLOURSOFUS
                </a>

                <h1 class="visually-hidden">Error - Payment</h1>
            </div>
        </header>

        <aside role="complementary">
            <button
                class="
                    order-summary-toggle order-summary-toggle--show
                    shown-if-js
                "
                aria-expanded="false"
                aria-controls="order-summary"
                data-drawer-toggle="[data-order-summary]"
            >
                <span class="wrap">
                    <span class="order-summary-toggle__inner">
                        <span class="order-summary-toggle__icon-wrapper">
                            <svg
                                width="20"
                                height="19"
                                xmlns="http://www.w3.org/2000/svg"
                                class="order-summary-toggle__icon"
                            >
                                <path
                                    d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z"
                                ></path>
                            </svg>
                        </span>
                        <span
                            class="
                                order-summary-toggle__text
                                order-summary-toggle__text--show
                            "
                        >
                            <span>Show order summary</span>
                            <svg
                                width="11"
                                height="6"
                                xmlns="http://www.w3.org/2000/svg"
                                class="order-summary-toggle__dropdown"
                                fill="#000"
                            >
                                <path
                                    d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z"
                                ></path>
                            </svg>
                        </span>
                        <span
                            class="
                                order-summary-toggle__text
                                order-summary-toggle__text--hide
                            "
                        >
                            <span>Hide order summary</span>
                            <svg
                                width="11"
                                height="7"
                                xmlns="http://www.w3.org/2000/svg"
                                class="order-summary-toggle__dropdown"
                                fill="#000"
                            >
                                <path
                                    d="M6.138.876L5.642.438l-.496.438L.504 4.972l.992 1.124L6.138 2l-.496.436 3.862 3.408.992-1.122L6.138.876z"
                                ></path>
                            </svg>
                        </span>
                        <dl
                            class="
                                order-summary-toggle__total-recap
                                total-recap
                            "
                            data-order-summary-section="toggle-total-recap"
                        >
                            <dt class="visually-hidden">
                                <span>Sale price</span>
                            </dt>
                            <dd>
                                <span
                                    class="
                                        order-summary__emphasis
                                        total-recap__final-price
                                        skeleton-while-loading
                                    "
                                    data-checkout-payment-due-target="101400"
                                    >$1,014.00</span
                                >
                            </dd>
                        </dl>
                    </span></span
                >
            </button>
        </aside>

        <div class="content" data-content="">
            <div class="wrap">
                <div class="main">
                    <header class="main__header" role="banner">
                        <a class="logo logo--left" href="/"> COLOURSOFUS </a>

                        <h1 class="visually-hidden">Error - Payment</h1>

                        <nav aria-label="Breadcrumb">
                            <ol class="breadcrumb" role="list">
                                <li
                                    class="
                                        breadcrumb__item
                                        breadcrumb__item--completed
                                    "
                                >
                                    <a class="breadcrumb__link" href="/cart"
                                        >Cart</a
                                    >
                                    <svg
                                        class="
                                            icon-svg
                                            icon-svg--color-adaptive-light
                                            icon-svg--size-10
                                            breadcrumb__chevron-icon
                                        "
                                        aria-hidden="true"
                                        focusable="false"
                                    >
                                        <use xlink:href="#chevron-right"></use>
                                    </svg>
                                </li>

                                <li
                                    class="
                                        breadcrumb__item
                                        breadcrumb__item--completed
                                    "
                                >
                                    <a class="breadcrumb__link" href="#!"
                                        >Information</a
                                    >
                                    <svg
                                        class="
                                            icon-svg
                                            icon-svg--color-adaptive-light
                                            icon-svg--size-10
                                            breadcrumb__chevron-icon
                                        "
                                        aria-hidden="true"
                                        focusable="false"
                                    >
                                        <use xlink:href="#chevron-right"></use>
                                    </svg>
                                </li>
                                <li
                                    class="
                                        breadcrumb__item
                                        breadcrumb__item--completed
                                    "
                                >
                                    <a
                                        class="breadcrumb__link"
                                        href="/dashboard?shipping"
                                        >Shipping</a
                                    >
                                    <svg
                                        class="
                                            icon-svg
                                            icon-svg--color-adaptive-light
                                            icon-svg--size-10
                                            breadcrumb__chevron-icon
                                        "
                                        aria-hidden="true"
                                        focusable="false"
                                    >
                                        <use xlink:href="#chevron-right"></use>
                                    </svg>
                                </li>
                                <li
                                    class="
                                        breadcrumb__item
                                        breadcrumb__item--current
                                    "
                                    aria-current="step"
                                >
                                    <span class="breadcrumb__text"
                                        >Payment</span
                                    >
                                </li>
                            </ol>
                        </nav>

                        <div
                            class="shown-if-js"
                            data-alternative-payments=""
                        ></div>
                    </header>
                    <main class="main__content" role="main">
                        <div
                            class="step"
                            data-step="contact_information"
                            data-last-step="false"
                            v-if="nextStep.info"
                        >
                            <form
                                data-customer-information-form="true"
                                data-email-or-phone="false"
                                class="edit_checkout animate-floating-labels"
                                novalidate="novalidate"
                                autocomplete="off"
                                @submit.prevent="shippingInfo"
                            >
                                <div class="step__sections">
                                    <div
                                        class="
                                            section section--contact-information
                                        "
                                    >
                                        <div class="section__header">
                                            <div
                                                class="
                                                    layout-flex
                                                    layout-flex--tight-vertical
                                                    layout-flex--loose-horizontal
                                                    layout-flex--wrap
                                                "
                                            >
                                                <h2
                                                    class="
                                                        section__title
                                                        layout-flex__item
                                                        layout-flex__item--stretch
                                                    "
                                                    id="main-header"
                                                    tabindex="-1"
                                                >
                                                    Contact information
                                                </h2>
                                            </div>
                                        </div>
                                        <div
                                            class="section__content"
                                            data-section="customer-information"
                                            data-shopify-pay-validate-on-load="false"
                                        >
                                            <div
                                                class="
                                                    logged-in-customer-information
                                                    flexed
                                                "
                                            >
                                                <div
                                                    class="
                                                        logged-in-customer-information__avatar-wrapper
                                                    "
                                                >
                                                    <div
                                                        class="
                                                            logged-in-customer-information__avatar
                                                            gravatar
                                                        "
                                                        role="img"
                                                        aria-label="Avatar"
                                                    ></div>
                                                </div>

                                                <p
                                                    class="
                                                        logged-in-customer-information__paragraph
                                                    "
                                                >
                                                    <span
                                                        class="
                                                            page-main__emphasis
                                                        "
                                                        >{{
                                                            $store.state.user
                                                                .firstname
                                                        }}</span
                                                    >
                                                    <span data-rtl-ensure=""
                                                        >({{
                                                            user.email
                                                        }})</span
                                                    >
                                                    <br />
                                                </p>
                                            </div>

                                            <!-- <div
                                                class="
                                                    logged-in-customer-newsletter
                                                "
                                                data-buyer-accepts-marketing=""
                                                aria-hidden="false"
                                            >
                                                <div class="checkbox-wrapper">
                                                    <div
                                                        class="
                                                            checkout-buyer-accepts-marketing-wrapper
                                                        "
                                                    >
                                                        <div
                                                            class="
                                                                checkbox__input
                                                            "
                                                        >
                                                            <input
                                                                name="checkout"
                                                                type="hidden"
                                                                value="0"
                                                                autocomplete="off"
                                                            /><input
                                                                class="
                                                                    input-checkbox
                                                                "
                                                                data-email-marketing="true"
                                                                data-backup="buyer_accepts_marketing"
                                                                type="checkbox"
                                                                value="1"
                                                                name="checkout"
                                                                id="checkout_buyer_accepts_marketing"
                                                                data-slug-id="email-me-with-news-and-offers-checkbox"
                                                                data-category="user-data"
                                                            />
                                                        </div>
                                                        <label
                                                            class="
                                                                checkbox__label
                                                            "
                                                            for="checkout_buyer_accepts_marketing"
                                                        >
                                                            Email me with news
                                                            and offers
                                                        </label>
                                                    </div>
                                                    <p
                                                        :style="{
                                                            display: 'none',
                                                        }"
                                                        class="
                                                            checkout-sms-info
                                                        "
                                                    >
                                                        We’ll send you an order
                                                        receipt and recurring
                                                        shipping updates via
                                                        text message. Reply STOP
                                                        to unsubscribe. Reply
                                                        HELP for help. Message
                                                        frequency varies. Msg
                                                        &amp; data rates may
                                                        apply. View our
                                                        <a
                                                            href="/policies/privacy-policy"
                                                            target="_blank"
                                                            >Privacy Policy</a
                                                        >
                                                        and
                                                        <a
                                                            href="/policies/terms-of-service"
                                                            target="_blank"
                                                            >Terms of Service</a
                                                        >.
                                                    </p>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>

                                    <div
                                        class="
                                            section section--shipping-address
                                        "
                                        data-shipping-address=""
                                    >
                                        <div class="section__header">
                                            <h2
                                                class="section__title"
                                                id="section-delivery-title"
                                            >
                                                Shipping address
                                            </h2>
                                        </div>

                                        <div class="section__content">
                                            <div class="fieldset">
                                                <div
                                                    class="address-fields"
                                                    data-address-fields=""
                                                >
                                                    <div
                                                        class="
                                                            field
                                                            field--required
                                                            field--show-floating-label
                                                        "
                                                        v-if="selected != ''"
                                                    >
                                                        <div
                                                            class="
                                                                field__input-wrapper
                                                                field__input-wrapper--select
                                                            "
                                                        >
                                                            <label
                                                                class="
                                                                    field__label
                                                                    field__label--visible
                                                                "
                                                                for="checkout_shipping_address_id"
                                                                >Saved
                                                                addresses</label
                                                            >
                                                            <select
                                                                data-address-selector=""
                                                                data-field-name-format="checkout[shipping_address][%s]"
                                                                data-backup="contact_stored_addresses"
                                                                class="
                                                                    field__input
                                                                    field__input--select
                                                                "
                                                                aria-required="true"
                                                                @change="
                                                                    evalutae(
                                                                        $event
                                                                    )
                                                                "
                                                            >
                                                                <option
                                                                    v-for="shipping in shippingInfos"
                                                                    :key="
                                                                        shipping.id
                                                                    "
                                                                    :value="
                                                                        shipping.id
                                                                    "
                                                                    :selected="
                                                                        shipping.id ==
                                                                        selected.id
                                                                    "
                                                                    @select="
                                                                        getAddress(
                                                                            shipping
                                                                        )
                                                                    "
                                                                >
                                                                    {{
                                                                        shipping.address
                                                                    }}
                                                                </option>
                                                                <option
                                                                    selected="selected"
                                                                    value=""
                                                                >
                                                                    Use a new
                                                                    address
                                                                </option>
                                                            </select>
                                                            <div
                                                                class="
                                                                    field__caret
                                                                "
                                                            >
                                                                <svg
                                                                    class="
                                                                        icon-svg
                                                                        icon-svg--color-adaptive-lighter
                                                                        icon-svg--size-10
                                                                        field__caret-svg
                                                                    "
                                                                    role="presentation"
                                                                    aria-hidden="true"
                                                                    focusable="false"
                                                                >
                                                                    <use
                                                                        xlink:href="#caret-down"
                                                                    ></use>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div v-if="newAddress">
                                                        <div
                                                            class="
                                                                field
                                                                field--optional
                                                                field--half
                                                                field--show-floating-label
                                                            "
                                                            data-address-field="first_name"
                                                        >
                                                            <div
                                                                class="
                                                                    field__input-wrapper
                                                                "
                                                            >
                                                                <label
                                                                    class="
                                                                        field__label
                                                                        field__label--visible
                                                                    "
                                                                    for="checkout_shipping_address_first_name"
                                                                    >First name
                                                                    (optional)</label
                                                                >
                                                                <input
                                                                    placeholder="First name (optional)"
                                                                    autocorrect="off"
                                                                    data-backup="first_name"
                                                                    class="
                                                                        field__input
                                                                    "
                                                                    size="30"
                                                                    type="text"
                                                                    autofocus
                                                                    v-model="
                                                                        user.firstname
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="
                                                                field
                                                                field--required
                                                                field--half
                                                                field--show-floating-label
                                                            "
                                                            data-address-field="last_name"
                                                        >
                                                            <div
                                                                class="
                                                                    field__input-wrapper
                                                                "
                                                            >
                                                                <label
                                                                    class="
                                                                        field__label
                                                                        field__label--visible
                                                                    "
                                                                    for="checkout_shipping_address_last_name"
                                                                    >Last
                                                                    name</label
                                                                >
                                                                <input
                                                                    placeholder="Last name"
                                                                    autocomplete="shipping family-name"
                                                                    autocorrect="off"
                                                                    data-backup="last_name"
                                                                    class="
                                                                        field__input
                                                                    "
                                                                    aria-required="true"
                                                                    size="30"
                                                                    type="text"
                                                                    v-model="
                                                                        user.lastname
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            data-address-field="address1"
                                                            data-autocomplete-field-container="true"
                                                            class="
                                                                field
                                                                field--required
                                                                field--show-floating-label
                                                            "
                                                        >
                                                            <div
                                                                class="
                                                                    field__input-wrapper
                                                                "
                                                            >
                                                                <label
                                                                    class="
                                                                        field__label
                                                                        field__label--visible
                                                                    "
                                                                    for="checkout_shipping_address_address1"
                                                                    >Address</label
                                                                >
                                                                <input
                                                                    placeholder="Address"
                                                                    autocomplete="none"
                                                                    autocorrect="off"
                                                                    role="combobox"
                                                                    class="
                                                                        field__input
                                                                    "
                                                                    size="30"
                                                                    type="text"
                                                                    v-model="
                                                                        user.address
                                                                    "
                                                                />

                                                                <p
                                                                    class="
                                                                        field__additional-info
                                                                        visually-hidden
                                                                    "
                                                                    data-address-civic-number-warning=""
                                                                >
                                                                    <svg
                                                                        class="
                                                                            icon-svg
                                                                            icon-svg--size-16
                                                                            field__message__icon
                                                                        "
                                                                        aria-hidden="true"
                                                                        focusable="false"
                                                                    >
                                                                        <use
                                                                            xlink:href="#info"
                                                                        ></use>
                                                                    </svg>
                                                                    Add a house
                                                                    number if
                                                                    you have one
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div
                                                            data-address-field="address2"
                                                            data-autocomplete-field-container="true"
                                                            class="
                                                                field
                                                                field--optional
                                                            "
                                                        >
                                                            <div
                                                                class="
                                                                    field__input-wrapper
                                                                "
                                                            >
                                                                <label
                                                                    class="
                                                                        field__label
                                                                        field__label--visible
                                                                    "
                                                                    for="checkout_shipping_address_address2"
                                                                    >Apartment,
                                                                    suite, etc.
                                                                    (optional)</label
                                                                >
                                                                <input
                                                                    placeholder="Apartment, suite, etc. (optional)"
                                                                    autocomplete="shipping address-line2"
                                                                    autocorrect="off"
                                                                    data-backup="address2"
                                                                    class="
                                                                        field__input
                                                                    "
                                                                    size="30"
                                                                    type="text"
                                                                    v-model="
                                                                        user.adddress2
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            data-address-field="city"
                                                            data-autocomplete-field-container="true"
                                                            class="
                                                                field
                                                                field--required
                                                            "
                                                        >
                                                            <div
                                                                class="
                                                                    field__input-wrapper
                                                                "
                                                            >
                                                                <label
                                                                    class="
                                                                        field__label
                                                                        field__label--visible
                                                                    "
                                                                    for="checkout_shipping_address_city"
                                                                    >City</label
                                                                >
                                                                <input
                                                                    placeholder="City"
                                                                    autocomplete="shipping address-level2"
                                                                    autocorrect="off"
                                                                    data-backup="city"
                                                                    class="
                                                                        field__input
                                                                    "
                                                                    aria-required="true"
                                                                    size="30"
                                                                    type="text"
                                                                    v-model="
                                                                        user.city
                                                                    "
                                                                />
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="
                                                                field
                                                                field--required
                                                                field--show-floating-label
                                                                field--third
                                                            "
                                                            data-address-field="country"
                                                            data-autocomplete-field-container="true"
                                                        >
                                                            <div
                                                                class="
                                                                    field__input-wrapper
                                                                    field__input-wrapper--select
                                                                "
                                                            >
                                                                <label
                                                                    class="
                                                                        field__label
                                                                        field__label--visible
                                                                    "
                                                                    for="checkout_shipping_address_country"
                                                                    >State/region</label
                                                                >
                                                                <select
                                                                    size="1"
                                                                    class="
                                                                        field__input
                                                                        field__input--select
                                                                    "
                                                                    aria-required="true"
                                                                    placeholder="State/region"
                                                                    @change="
                                                                        sortLgas
                                                                    "
                                                                    v-model="
                                                                        user.state
                                                                    "
                                                                >
                                                                    <option
                                                                        v-for="state in states"
                                                                        :key="
                                                                            state.id
                                                                        "
                                                                        :value="
                                                                            state.id
                                                                        "
                                                                    >
                                                                        {{
                                                                            state.name
                                                                        }}
                                                                    </option>
                                                                </select>
                                                                <div
                                                                    class="
                                                                        field__caret
                                                                    "
                                                                >
                                                                    <svg
                                                                        class="
                                                                            icon-svg
                                                                            icon-svg--color-adaptive-lighter
                                                                            icon-svg--size-10
                                                                            field__caret-svg
                                                                        "
                                                                        role="presentation"
                                                                        aria-hidden="true"
                                                                        focusable="false"
                                                                    >
                                                                        <use
                                                                            xlink:href="#caret-down"
                                                                        ></use>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="
                                                                field
                                                                field--required
                                                                field--show-floating-label
                                                                field--third
                                                            "
                                                            :class="{
                                                                'field--error':
                                                                    sorted,
                                                            }"
                                                            data-address-field="province"
                                                            data-autocomplete-field-container="true"
                                                        >
                                                            <div
                                                                class="
                                                                    field__input-wrapper
                                                                    field__input-wrapper--select
                                                                "
                                                            >
                                                                <label
                                                                    class="
                                                                        field__label
                                                                        field__label--visible
                                                                    "
                                                                    for="checkout_shipping_address_province"
                                                                    >LGA</label
                                                                >
                                                                <select
                                                                    placeholder="LGA"
                                                                    autocorrect="off"
                                                                    data-backup="province"
                                                                    class="
                                                                        field__input
                                                                        field__input--select
                                                                    "
                                                                    id="LGAID"
                                                                    aria-required="true"
                                                                    v-model="
                                                                        user.lga
                                                                    "
                                                                >
                                                                    <option
                                                                        disabled=""
                                                                    >
                                                                        LGA
                                                                    </option>
                                                                    <option
                                                                        v-for="lga in lgaSorted"
                                                                        :key="
                                                                            lga.id
                                                                        "
                                                                        :value="
                                                                            lga.id
                                                                        "
                                                                    >
                                                                        {{
                                                                            lga.name
                                                                        }}
                                                                    </option>
                                                                </select>
                                                                <div
                                                                    class="
                                                                        field__caret
                                                                        shown-if-js
                                                                    "
                                                                >
                                                                    <svg
                                                                        class="
                                                                            icon-svg
                                                                            icon-svg--color-adaptive-lighter
                                                                            icon-svg--size-10
                                                                            field__caret-svg
                                                                        "
                                                                        role="presentation"
                                                                        aria-hidden="true"
                                                                        focusable="false"
                                                                    >
                                                                        <use
                                                                            xlink:href="#caret-down"
                                                                        ></use>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <p
                                                                :class="{
                                                                    field__message:
                                                                        sorted,
                                                                    'field__message--error':
                                                                        sorted,
                                                                }"
                                                                v-show="sorted"
                                                                id="error-for-province"
                                                            >
                                                                Select Local
                                                                Government
                                                            </p>
                                                        </div>
                                                        <div
                                                            class="
                                                                field
                                                                field--required
                                                                field--third
                                                            "
                                                            data-address-field="zip"
                                                            data-autocomplete-field-container="true"
                                                        >
                                                            <div
                                                                class="
                                                                    field__input-wrapper
                                                                "
                                                            >
                                                                <label
                                                                    class="
                                                                        field__label
                                                                        field__label--visible
                                                                    "
                                                                    for="checkout_shipping_address_zip"
                                                                    >ZIP
                                                                    code</label
                                                                >
                                                                <input
                                                                    placeholder="ZIP code"
                                                                    autocomplete="shipping postal-code"
                                                                    autocorrect="off"
                                                                    class="
                                                                        field__input
                                                                        field__input--zip
                                                                    "
                                                                    aria-required="true"
                                                                    size="30"
                                                                    type="text"
                                                                    v-model="
                                                                        user.postal_code
                                                                    "
                                                                />
                                                            </div>
                                                            <!-- <p
                                                                class="
                                                                    field__message
                                                                    field__message--error
                                                                "
                                                                id="error-for-zip"
                                                            >
                                                                Enter a valid
                                                                ZIP code
                                                            </p> -->
                                                        </div>
                                                        <div
                                                            class="
                                                                field
                                                                field--required
                                                                field--third
                                                            "
                                                            data-address-field="phone"
                                                            data-autocomplete-field-container="true"
                                                        >
                                                            <div
                                                                class="
                                                                    field__input-wrapper
                                                                "
                                                            >
                                                                <label
                                                                    class="
                                                                        field__label
                                                                        field__label--visible
                                                                    "
                                                                    for="checkout_shipping_address_zip"
                                                                    >Phone</label
                                                                >
                                                                <input
                                                                    placeholder="Phone"
                                                                    autocomplete="shipping tel"
                                                                    autocorrect="off"
                                                                    class="
                                                                        field__input
                                                                        field__input--zip
                                                                    "
                                                                    aria-required="true"
                                                                    size="30"
                                                                    type="tel"
                                                                    v-model="
                                                                        user.phone
                                                                    "
                                                                />
                                                            </div>
                                                            <!-- <p
                                                                class="
                                                                    field__message
                                                                    field__message--error
                                                                "
                                                                id="error-for-zip"
                                                            >
                                                                Enter a valid
                                                                ZIP code
                                                            </p> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="step__footer" data-step-footer="">
                                    <button
                                        name="button"
                                        type="submit"
                                        id="continue_button"
                                        class="step__footer__continue-btn btn"
                                        aria-busy="false"
                                    >
                                        <span
                                            class="btn__content"
                                            data-continue-button-content="true"
                                            v-if="!requesting"
                                            >Continue to shipping</span
                                        ><svg
                                            v-else
                                            class="
                                                icon-svg icon-svg--size-18
                                                btn__spinner
                                                icon-svg--spinner-button
                                                fa-spin
                                            "
                                            aria-hidden="true"
                                            focusable="false"
                                        >
                                            <use
                                                xlink:href="#spinner-button"
                                            ></use>
                                        </svg>
                                    </button>
                                    <a
                                        class="step__footer__previous-link"
                                        href="/cart"
                                        ><svg
                                            focusable="false"
                                            aria-hidden="true"
                                            class="
                                                icon-svg
                                                icon-svg--color-accent
                                                icon-svg--size-10
                                                previous-link__icon
                                            "
                                            role="img"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 10 10"
                                        >
                                            <path
                                                d="M8 1L7 0 3 4 2 5l1 1 4 4 1-1-4-4"
                                            ></path></svg
                                        ><span
                                            class="
                                                step__footer__previous-link-content
                                            "
                                            >Return to cart</span
                                        ></a
                                    >
                                </div>
                            </form>
                        </div>
                        <div v-if="nextStep.payment">
                            <div
                                class="step"
                                data-last-step="true"
                            >
                                <form
                                    class="edit_checkout"
                                    accept-charset="UTF-8"
                                >
                                    
                                    <div class="step__sections">
                                        <div class="section">
                                            <div class="content-box">
                                                <div
                                                    role="table"
                                                    class="
                                                        content-box__row
                                                        content-box__row--tight-spacing-vertical
                                                    "
                                                >
                                                    <div
                                                        role="row"
                                                        class="review-block"
                                                    >
                                                        <div
                                                            class="
                                                                review-block__inner
                                                            "
                                                        >
                                                            <div
                                                                role="rowheader"
                                                                class="
                                                                    review-block__label
                                                                "
                                                            >
                                                                Contact
                                                            </div>
                                                            <div
                                                                role="cell"
                                                                class="
                                                                    review-block__content
                                                                "
                                                            >
                                                                <bdo dir="ltr"
                                                                    >{{user.email}}</bdo
                                                                >
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                    <div
                                                        role="row"
                                                        class="review-block"
                                                    >
                                                        <div
                                                            class="
                                                                review-block__inner
                                                            "
                                                        >
                                                            <div
                                                                role="rowheader"
                                                                class="
                                                                    review-block__label
                                                                "
                                                            >
                                                                Ship to
                                                            </div>
                                                            <div
                                                                role="cell"
                                                                class="
                                                                    review-block__content
                                                                "
                                                            >
                                                                <address
                                                                    class="
                                                                        address
                                                                        address--tight
                                                                    "
                                                                >
                                                                    {{selected.address + ' ' + selected.phone}}
                                                                    <address></address>
                                                                </address>
                                                            </div>
                                                        </div>
                                                        <div
                                                            role="cell"
                                                            class="
                                                                review-block__link
                                                            "
                                                        >
                                                            <a
                                                                class="
                                                                    link--small
                                                                "
                                                                href="#!"
                                                                @click.prevent="nextStep.payment = false, nextStep.info = true"
                                                            >
                                                                <span
                                                                    aria-hidden="true"
                                                                    >Change</span
                                                                >
                                                                <span
                                                                    class="
                                                                        visually-hidden
                                                                    "
                                                                    >Change
                                                                    shipping
                                                                    address</span
                                                                >
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="
                                                section section--shipping-method
                                            "
                                        >
                                            <div class="section__header">
                                                <h2
                                                    class="section__title"
                                                    id="main-header"
                                                    tabindex="-1"
                                                >
                                                    Shipping method
                                                </h2>
                                            </div>

                                            <div class="section__content">
                                                <div
                                                    class="content-box"
                                                    data-shipping-methods=""
                                                >
                                                    <div
                                                        class="content-box__row"
                                                    >
                                                        <div
                                                            class="
                                                                radio-wrapper
                                                            "
                                                            data-shipping-method="shopify-International%20Shipping-20.00"
                                                        >
                                                            <div
                                                                class="
                                                                    radio__input
                                                                "
                                                            >
                                                                <input
                                                                    class="
                                                                        input-radio
                                                                    "
                                                                    type="radio"
                                                                    checked="checked"
                                                                />
                                                            </div>
                                                            <label
                                                                class="
                                                                    radio__label
                                                                "
                                                                for="checkout_shipping_rate_id_shopify-international20shipping-20_00"
                                                            >
                                                                <span
                                                                    class="
                                                                        radio__label__primary
                                                                    "
                                                                    data-shipping-method-label-title="International Shipping"
                                                                >
                                                                    Local
                                                                    Shipping
                                                                </span>
                                                                <span
                                                                    class="
                                                                        radio__label__accessory
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            content-box__emphasis
                                                                        "
                                                                    >
                                                                        &#8358;2,000.00
                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <!-- /radio-wrapper-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="step__footer"
                                        data-step-footer=""
                                    >
                                        <button
                                            name="button"
                                            type="submit"
                                            id="continue_button"
                                            class="
                                                step__footer__continue-btn
                                                btn
                                            "
                                            aria-busy="false"
                                            @click.prevent="makePayment"
                                        >
                                            <span
                                                class="btn__content"
                                                data-continue-button-content="true"
                                                v-if="!requesting"
                                                >Continue to payment</span
                                            ><svg
                                            v-if="requesting"
                                                class="
                                                    icon-svg icon-svg--size-18
                                                    fa-spin
                                                    btn__spinner
                                                    icon-svg--spinner-button
                                                "
                                                aria-hidden="true"
                                                focusable="false"
                                            >
                                                <use
                                                    xlink:href="#spinner-button"
                                                ></use>
                                            </svg>
                                        </button>
                                        <a
                                            class="step__footer__previous-link"
                                            href="#!"
                                            @click.prevent="nextStep.payment = false, nextStep.info = true"
                                            ><svg
                                                focusable="false"
                                                aria-hidden="true"
                                                class="
                                                    icon-svg
                                                    icon-svg--color-accent
                                                    icon-svg--size-10
                                                    previous-link__icon
                                                "
                                                role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 10 10"
                                            >
                                                <path
                                                    d="M8 1L7 0 3 4 2 5l1 1 4 4 1-1-4-4"
                                                ></path></svg
                                            ><span
                                                class="
                                                    step__footer__previous-link-content
                                                "
                                                >Return to information</span
                                            ></a
                                        >
                                    </div>
                                </form>
                            </div>
                        </div>
                    </main>
                    <footer class="main__footer" role="contentinfo">
                        <ul class="policy-list" role="list">
                            <li class="policy-list__item">
                                <a
                                    aria-haspopup="dialog"
                                    data-modal="policy-refund-policy"
                                    data-title-text="Refund policy"
                                    data-close-text="Close"
                                    data-iframe="true"
                                    href="/23009895/policies/refund-policy.html?locale=en-US"
                                    >Refund policy</a
                                >
                            </li>
                            <li class="policy-list__item">
                                <a
                                    aria-haspopup="dialog"
                                    data-modal="policy-shipping-policy"
                                    data-title-text="Shipping policy"
                                    data-close-text="Close"
                                    data-iframe="true"
                                    href="/23009895/policies/shipping-policy.html?locale=en-US"
                                    >Shipping policy</a
                                >
                            </li>
                            <li class="policy-list__item">
                                <a
                                    aria-haspopup="dialog"
                                    data-modal="policy-privacy-policy"
                                    data-title-text="Privacy policy"
                                    data-close-text="Close"
                                    data-iframe="true"
                                    href="/23009895/policies/privacy-policy.html?locale=en-US"
                                    >Privacy policy</a
                                >
                            </li>
                            <li class="policy-list__item">
                                <a
                                    aria-haspopup="dialog"
                                    data-modal="policy-terms-of-service"
                                    data-title-text="Terms of service"
                                    data-close-text="Close"
                                    data-iframe="true"
                                    href="/23009895/policies/terms-of-service.html?locale=en-US"
                                    >Terms of service</a
                                >
                            </li>
                        </ul>
                    </footer>
                </div>
                <aside class="sidebar md-hidden" role="complementary">
                    <div class="sidebar__header">
                        <a class="logo logo--left" href="/"
                            ><img
                                alt="uniqlo-minimal"
                                class="logo__image logo__image--medium"
                                src="//cdn.shopify.com/s/files/1/2300/9895/files/uniqlo.png?2045"
                        /></a>

                        <h1 class="visually-hidden">Error - Payment</h1>
                    </div>
                    <div class="sidebar__content">
                        <div
                            id="order-summary"
                            class="order-summary order-summary--is-collapsed"
                            data-order-summary=""
                        >
                            <h2 class="visually-hidden">Order summary</h2>

                            <div class="order-summary__sections">
                                <div
                                    class="
                                        order-summary__section
                                        order-summary__section--product-list
                                        order-summary__section--is-scrollable
                                    "
                                >
                                    <div
                                        class="order-summary__section__content"
                                        tabindex="0"
                                        aria-labelledby="order-summary__scroll-indicator"
                                    >
                                        <table class="product-table">
                                            <caption class="visually-hidden">
                                                Shopping cart
                                            </caption>
                                            <thead
                                                class="product-table__header"
                                            >
                                                <tr>
                                                    <th scope="col">
                                                        <span
                                                            class="
                                                                visually-hidden
                                                            "
                                                            >Product image</span
                                                        >
                                                    </th>
                                                    <th scope="col">
                                                        <span
                                                            class="
                                                                visually-hidden
                                                            "
                                                            >Description</span
                                                        >
                                                    </th>
                                                    <th scope="col">
                                                        <span
                                                            class="
                                                                visually-hidden
                                                            "
                                                            >Quantity</span
                                                        >
                                                    </th>
                                                    <th scope="col">
                                                        <span
                                                            class="
                                                                visually-hidden
                                                            "
                                                            >Price</span
                                                        >
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody
                                                data-order-summary-section="line-items"
                                            >
                                                <tr
                                                    class="product"
                                                    v-for="(
                                                        item, index
                                                    ) in $store.state.cart"
                                                    :key="index"
                                                >
                                                    <td class="product__image">
                                                        <div
                                                            class="
                                                                product-thumbnail
                                                            "
                                                        >
                                                            <div
                                                                class="
                                                                    product-thumbnail__wrapper
                                                                "
                                                            >
                                                                <!-- :alt="Tails batna - xl / orange / partex" -->
                                                                <img
                                                                    v-if="
                                                                        item.images
                                                                    "
                                                                    :alt="
                                                                        item.title
                                                                    "
                                                                    class="
                                                                        product-thumbnail__image
                                                                    "
                                                                    :src="
                                                                        item
                                                                            .images[0]
                                                                            .url
                                                                    "
                                                                />
                                                            </div>
                                                            <span
                                                                class="
                                                                    product-thumbnail__quantity
                                                                "
                                                                aria-hidden="true"
                                                                >{{
                                                                    item.quantity
                                                                }}</span
                                                            >
                                                        </div>
                                                    </td>
                                                    <th
                                                        class="
                                                            product__description
                                                        "
                                                        scope="row"
                                                    >
                                                        <span
                                                            class="
                                                                product__description__name
                                                                order-summary__emphasis
                                                            "
                                                            >{{
                                                                item.title
                                                            }}</span
                                                        >
                                                        <span
                                                            class="
                                                                product__description__variant
                                                                order-summary__small-text
                                                            "
                                                            v-if="
                                                                item.selectedSize ||
                                                                item.selectedColor
                                                            "
                                                            ><span
                                                                v-if="
                                                                    item.selectedSize
                                                                "
                                                                >{{
                                                                    item
                                                                        .selectedSize
                                                                        .name
                                                                }}
                                                                /
                                                            </span>
                                                            <span
                                                                v-if="
                                                                    item.selectedColor
                                                                "
                                                                >{{
                                                                    item
                                                                        .selectedColor
                                                                        .name
                                                                }}
                                                            </span></span
                                                        >
                                                    </th>
                                                    <td
                                                        class="
                                                            product__quantity
                                                        "
                                                    >
                                                        <span
                                                            class="
                                                                visually-hidden
                                                            "
                                                        >
                                                            {{ item.quantity }}
                                                        </span>
                                                    </td>
                                                    <td class="product__price">
                                                        <span
                                                            class="
                                                                order-summary__emphasis
                                                                skeleton-while-loading
                                                            "
                                                            >&#8358;{{
                                                                formatPrice(
                                                                    item.amount
                                                                )
                                                            }}</span
                                                        >
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div
                                            class="
                                                order-summary__scroll-indicator
                                            "
                                            aria-hidden="true"
                                            tabindex="-1"
                                            id="order-summary__scroll-indicator"
                                        >
                                            Scroll for more items
                                            <svg
                                                aria-hidden="true"
                                                focusable="false"
                                                class="
                                                    icon-svg icon-svg--size-12
                                                "
                                            >
                                                <use
                                                    xlink:href="#down-arrow"
                                                ></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="
                                        order-summary__section
                                        order-summary__section--total-lines
                                    "
                                    data-order-summary-section="payment-lines"
                                >
                                    <table class="total-line-table">
                                        <caption class="visually-hidden">
                                            Cost summary
                                        </caption>
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <span
                                                        class="visually-hidden"
                                                        >Description</span
                                                    >
                                                </th>
                                                <th scope="col">
                                                    <span
                                                        class="visually-hidden"
                                                        >Price</span
                                                    >
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="total-line-table__tbody">
                                            <tr
                                                class="
                                                    total-line
                                                    total-line--subtotal
                                                "
                                            >
                                                <th
                                                    class="total-line__name"
                                                    scope="row"
                                                >
                                                    Subtotal
                                                </th>
                                                <td class="total-line__price">
                                                    <span
                                                        class="
                                                            order-summary__emphasis
                                                            skeleton-while-loading
                                                        "
                                                        data-checkout-subtotal-price-target="99400"
                                                    >
                                                        &#8358;{{ totalPrice }}
                                                    </span>
                                                </td>
                                            </tr>

                                            <tr
                                                class="
                                                    total-line
                                                    total-line--shipping
                                                "
                                            >
                                                <th
                                                    class="total-line__name"
                                                    scope="row"
                                                >
                                                    <span> Shipping </span>
                                                </th>
                                                <td class="total-line__price">
                                                    <span
                                                        class="
                                                            skeleton-while-loading
                                                            order-summary__emphasis
                                                        "
                                                        data-checkout-total-shipping-target="2000"
                                                    >
                                                        &#8358;2,000.00
                                                    </span>
                                                </td>
                                            </tr>

                                            <!-- <tr
                                                    class="
                                                        total-line
                                                        total-line--taxes
                                                        hidden
                                                    "
                                                    data-checkout-taxes=""
                                                >
                                                    <th
                                                        class="total-line__name"
                                                        scope="row"
                                                    >
                                                        Taxes
                                                    </th>
                                                    <td
                                                        class="
                                                            total-line__price
                                                        "
                                                    >
                                                        <span
                                                            class="
                                                                order-summary__emphasis
                                                                skeleton-while-loading
                                                            "
                                                            data-checkout-total-taxes-target="0"
                                                            >$0.00</span
                                                        >
                                                    </td>
                                                </tr> -->
                                        </tbody>
                                        <tfoot class="total-line-table__footer">
                                            <tr class="total-line">
                                                <th
                                                    class="
                                                        total-line__name
                                                        payment-due-label
                                                    "
                                                    scope="row"
                                                >
                                                    <span
                                                        class="
                                                            payment-due-label__total
                                                        "
                                                        >Total</span
                                                    >
                                                </th>
                                                <td
                                                    class="
                                                        total-line__price
                                                        payment-due
                                                    "
                                                    data-presentment-currency="USD"
                                                >
                                                    <span
                                                        class="
                                                            payment-due__currency
                                                            remove-while-loading
                                                        "
                                                        >NGN</span
                                                    >
                                                    <span
                                                        class="
                                                            payment-due__price
                                                            skeleton-while-loading--lg
                                                        "
                                                        data-checkout-payment-due-target="101400"
                                                    >
                                                        &#8358;{{ amountDue }}
                                                    </span>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div
                            class="visually-hidden"
                            data-order-summary-section="accessibility-live-region"
                        >
                            <div
                                aria-live="polite"
                                aria-atomic="true"
                                role="status"
                            >
                                Updated total price:
                                <span data-checkout-payment-due-target="101400">
                                    $1,014.00
                                </span>
                            </div>
                        </div>

                        <div
                            id="partial-icon-symbols"
                            class="icon-symbols"
                            data-tg-refresh="partial-icon-symbols"
                            data-tg-refresh-always="true"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg">
                                <symbol id="error">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M12 24C5.373 24 0 18.627 0 12S5.373 0 12 0s12 5.373 12 12-5.373 12-12 12zm0-2c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10zm0-16c.552 0 1 .448 1 1v5c0 .552-.448 1-1 1s-1-.448-1-1V7c0-.552.448-1 1-1zm-1.5 10.5c0-.828.666-1.5 1.5-1.5.828 0 1.5.666 1.5 1.5 0 .828-.666 1.5-1.5 1.5-.828 0-1.5-.666-1.5-1.5z"
                                        ></path>
                                    </svg>
                                </symbol>
                                <symbol id="info">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M12 11h1v7h-2v-5c-.552 0-1-.448-1-1s.448-1 1-1h1zm0 13C5.373 24 0 18.627 0 12S5.373 0 12 0s12 5.373 12 12-5.373 12-12 12zm0-2c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10zM10.5 7.5c0-.828.666-1.5 1.5-1.5.828 0 1.5.666 1.5 1.5 0 .828-.666 1.5-1.5 1.5-.828 0-1.5-.666-1.5-1.5z"
                                        ></path>
                                    </svg>
                                </symbol>
                                <symbol id="caret-down">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 10 10"
                                    >
                                        <path
                                            d="M0 3h10L5 8"
                                            fill-rule="nonzero"
                                        ></path>
                                    </svg>
                                </symbol>
                                <symbol id="powered-by-google">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 116 15"
                                    >
                                        <path
                                            fill="#737373"
                                            d="M4.025 3.572c1.612 0 2.655 1.283 2.655 3.27 0 1.974-1.05 3.27-2.655 3.27-.902 0-1.63-.393-1.974-1.06h-.09v3.057H.95V3.68h.96v1.054h.094c.404-.726 1.16-1.166 2.02-1.166zm-.24 5.63c1.16 0 1.852-.884 1.852-2.36 0-1.477-.692-2.362-1.846-2.362-1.14 0-1.86.91-1.86 2.362 0 1.447.72 2.36 1.857 2.36zm7.072.91c-1.798 0-2.912-1.243-2.912-3.27 0-2.033 1.114-3.27 2.912-3.27 1.8 0 2.913 1.237 2.913 3.27 0 2.027-1.114 3.27-2.913 3.27zm0-.91c1.196 0 1.87-.866 1.87-2.36 0-1.5-.674-2.362-1.87-2.362-1.195 0-1.87.862-1.87 2.362 0 1.494.675 2.36 1.87 2.36zm12.206-5.518H22.05l-1.244 5.05h-.094L19.3 3.684h-.966l-1.412 5.05h-.094l-1.242-5.05h-1.02L16.336 10h1.02l1.406-4.887h.093L20.268 10h1.025l1.77-6.316zm3.632.78c-1.008 0-1.71.737-1.787 1.856h3.48c-.023-1.12-.69-1.857-1.693-1.857zm1.664 3.9h1.005c-.305 1.085-1.277 1.747-2.66 1.747-1.752 0-2.848-1.262-2.848-3.26 0-1.987 1.113-3.276 2.847-3.276 1.705 0 2.742 1.213 2.742 3.176v.386h-4.542v.047c.053 1.248.75 2.04 1.822 2.04.815 0 1.366-.3 1.63-.857zM31.03 10h1.01V6.086c0-.89.696-1.535 1.657-1.535.2 0 .563.038.645.06V3.6c-.13-.018-.34-.03-.504-.03-.838 0-1.565.434-1.752 1.05h-.094v-.938h-.96V10zm6.915-5.537c-1.008 0-1.71.738-1.787 1.857h3.48c-.023-1.12-.69-1.857-1.693-1.857zm1.664 3.902h1.005c-.304 1.084-1.277 1.746-2.66 1.746-1.752 0-2.848-1.262-2.848-3.26 0-1.987 1.113-3.276 2.847-3.276 1.705 0 2.742 1.213 2.742 3.176v.386h-4.542v.047c.053 1.248.75 2.04 1.822 2.04.815 0 1.366-.3 1.63-.857zm5.01 1.746c-1.62 0-2.657-1.28-2.657-3.266 0-1.98 1.05-3.27 2.654-3.27.878 0 1.622.416 1.98 1.108h.087V1.177h1.008V10h-.96V8.992h-.094c-.4.703-1.15 1.12-2.02 1.12zm.232-5.63c-1.15 0-1.846.89-1.846 2.364 0 1.476.69 2.36 1.846 2.36 1.148 0 1.857-.9 1.857-2.36 0-1.447-.715-2.362-1.857-2.362zm7.875-3.115h1.024v3.123c.23-.3.507-.53.827-.688.32-.16.668-.238 1.043-.238.78 0 1.416.27 1.9.806.49.537.73 1.33.73 2.376 0 .992-.24 1.817-.72 2.473-.48.656-1.145.984-1.997.984-.476 0-.88-.114-1.207-.344-.195-.137-.404-.356-.627-.657v.8h-.97V1.363zm4.02 7.225c.284-.454.426-1.05.426-1.794 0-.66-.142-1.207-.425-1.64-.283-.434-.7-.65-1.25-.65-.48 0-.9.177-1.264.532-.36.356-.542.942-.542 1.758 0 .59.075 1.068.223 1.435.277.694.795 1.04 1.553 1.04.57 0 .998-.227 1.28-.68zM63.4 3.726h1.167c-.148.402-.478 1.32-.99 2.754-.383 1.077-.703 1.956-.96 2.635-.61 1.602-1.04 2.578-1.29 2.93-.25.35-.68.527-1.29.527-.147 0-.262-.006-.342-.017-.08-.012-.178-.034-.296-.065v-.96c.183.05.316.08.4.093.08.012.152.018.215.018.195 0 .338-.03.43-.094.092-.065.17-.144.232-.237.02-.033.09-.193.21-.48.122-.29.21-.506.264-.646l-2.32-6.457h1.196l1.68 5.11 1.694-5.11zM73.994 5.282V6.87h3.814c-.117.89-.416 1.54-.87 1.998-.557.555-1.427 1.16-2.944 1.16-2.35 0-4.184-1.882-4.184-4.217 0-2.332 1.835-4.215 4.184-4.215 1.264 0 2.192.497 2.873 1.135l1.122-1.117C77.04.697 75.77 0 73.99 0c-3.218 0-5.923 2.606-5.923 5.805 0 3.2 2.705 5.804 5.923 5.804 1.738 0 3.048-.57 4.073-1.628 1.05-1.045 1.382-2.522 1.382-3.71 0-.366-.028-.708-.087-.992h-5.37zm10.222-1.29c-2.082 0-3.78 1.574-3.78 3.748 0 2.154 1.698 3.747 3.78 3.747S87.998 9.9 87.998 7.74c0-2.174-1.7-3.748-3.782-3.748zm0 6.018c-1.14 0-2.127-.935-2.127-2.27 0-1.348.983-2.27 2.124-2.27 1.142 0 2.128.922 2.128 2.27 0 1.335-.986 2.27-2.128 2.27zm18.54-5.18h-.06c-.37-.438-1.083-.838-1.985-.838-1.88 0-3.52 1.632-3.52 3.748 0 2.102 1.64 3.747 3.52 3.747.905 0 1.618-.4 1.988-.852h.06v.523c0 1.432-.773 2.2-2.012 2.2-1.012 0-1.64-.723-1.9-1.336l-1.44.593c.414.994 1.51 2.213 3.34 2.213 1.94 0 3.58-1.135 3.58-3.902v-6.74h-1.57v.645zm-1.9 5.18c-1.144 0-2.013-.968-2.013-2.27 0-1.323.87-2.27 2.01-2.27 1.13 0 2.012.967 2.012 2.282.006 1.31-.882 2.258-2.01 2.258zM92.65 3.992c-2.084 0-3.783 1.574-3.783 3.748 0 2.154 1.7 3.747 3.782 3.747 2.08 0 3.78-1.587 3.78-3.747 0-2.174-1.7-3.748-3.78-3.748zm0 6.018c-1.143 0-2.13-.935-2.13-2.27 0-1.348.987-2.27 2.13-2.27 1.14 0 2.126.922 2.126 2.27 0 1.335-.986 2.27-2.127 2.27zM105.622.155h1.628v11.332h-1.628m6.655-1.477c-.843 0-1.44-.38-1.83-1.135l5.04-2.07-.168-.426c-.314-.84-1.274-2.39-3.227-2.39-1.94 0-3.554 1.516-3.554 3.75 0 2.1 1.595 3.745 3.736 3.745 1.725 0 2.724-1.05 3.14-1.658l-1.285-.852c-.427.62-1.01 1.032-1.854 1.032zm-.117-4.612c.668 0 1.24.342 1.427.826l-3.405 1.4c0-1.574 1.122-2.226 1.978-2.226z"
                                        ></path>
                                    </svg>
                                </symbol>
                                <symbol id="close">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M15.1 2.3L13.7.9 8 6.6 2.3.9.9 2.3 6.6 8 .9 13.7l1.4 1.4L8 9.4l5.7 5.7 1.4-1.4L9.4 8"
                                        ></path>
                                    </svg>
                                </symbol>
                                <symbol id="spinner-button">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M20 10c0 5.523-4.477 10-10 10S0 15.523 0 10 4.477 0 10 0v2c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8h2z"
                                        ></path>
                                    </svg>
                                </symbol>
                                <symbol id="chevron-right">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 10 10"
                                    >
                                        <path
                                            d="M2 1l1-1 4 4 1 1-1 1-4 4-1-1 4-4"
                                        ></path>
                                    </svg>
                                </symbol>
                                <symbol id="down-arrow">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 12 12"
                                    >
                                        <path
                                            d="M10.817 7.624l-4.375 4.2c-.245.235-.64.235-.884 0l-4.375-4.2c-.244-.234-.244-.614 0-.848.245-.235.64-.235.884 0L5.375 9.95V.6c0-.332.28-.6.625-.6s.625.268.625.6v9.35l3.308-3.174c.122-.117.282-.176.442-.176.16 0 .32.06.442.176.244.234.244.614 0 .848"
                                        ></path>
                                    </svg>
                                </symbol>
                                <symbol id="spinner-small">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 32 32"
                                    >
                                        <path
                                            d="M32 16c0 8.837-7.163 16-16 16S0 24.837 0 16 7.163 0 16 0v2C8.268 2 2 8.268 2 16s6.268 14 14 14 14-6.268 14-14h2z"
                                        ></path>
                                    </svg>
                                </symbol>
                            </svg>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</template>
<script>
    const flwKey = process.env.MIX_FLW_KEY;
    export default {
        computed: {
            reference() {
                let text = "";
                let possible =
                    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                for (let i = 0; i < 10; i++)
                    text += possible.charAt(
                        Math.floor(Math.random() * possible.length)
                    );
                return text;
            },
            totalPrice() {
                let total = 0;

                for (let item of this.$store.state.cart) {
                    total += item.totalPrice;
                }
                this.total = total;
                this.flwAmt = total + 2000;
                return total.toLocaleString("en-US", {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2,
                });
            },
        },
        created() {
            const script = document.createElement("script");
            script.src = "https://checkout.flutterwave.com/v3.js";
            document.getElementsByTagName("head")[0].appendChild(script);
        },
        data() {
            return {
                address: false,
                amountDue: 0,
                currency: "NGN",
                country: "NG",
                flwAmt: 0,
                flwKey: flwKey,
                lgas: [],
                lgaSorted: [],
                newAddress: false,
                nextStep: {
                    payment: false,
                    info: true,
                },
                requesting: false,
                selected: "",
                shippingInfos: [],
                states: [],
                total: 0,
                user: {},
                sorted: false,
            };
        },
        methods: {
            evalutae(e) {
                if (e.target.value == "") {
                    this.newAddress = true;
                } else {
                    this.newAddress = false;
                }
            },
            formatPrice(value) {
                let val = value / 1;
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            },
            getAddress(data) {
                this.newAddress = false;
                this.address = true;
                this.selected = data;
            },
            getStateLgas() {
                axios
                    .get("api/statelgas")
                    .then((res) => {
                        this.states = res.data.states;
                        this.lgas = res.data.lgas;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getUser() {
                axios.get("api/user").then((res) => {
                    this.user = res.data;
                    this.amountDue = this.flwAmt.toLocaleString("en-US", {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2,
                    });
                });
            },
            getUserShipping() {
                axios
                    .get(`api/shipping/${this.$store.state.user.user_id}`)
                    .then((res) => {
                        this.shippingInfos = res.data.shippinginfo;
                        this.shippingInfos.length == 0
                            ? (this.newAddress = true)
                            : (this.selected = res.data.shippinginfo[0]);
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            makePayment() {
                let vm = this;

                window.FlutterwaveCheckout({
                    public_key: vm.flwKey,
                    tx_ref: vm.reference,
                    amount: vm.flwAmt,
                    currency: vm.currency,
                    payment_options: vm.payment_method,
                    customer: {
                        email: vm.user.email,
                    },
                    redirect_url: "/dashboard?order",
                    callback(data) {
                        if (data.status === "successful") {
                            console.log(data.status);
                        }
                    },
                    onclose: function () {
                        console.log("closed checkout page");
                    },
                    customizations: {
                        title: "ColorsOfUs",
                        description: "Best lower rates you can trust.",
                        // logo:
                    },
                });
            },
            openNewForm() {
                this.newAddress = true;
            },
            shippingInfo() {
                if (this.selected != "") {
                    this.$store.commit('shipping', this.selected);
                    this.requesting = true;
                    setTimeout(() => {
                        this.requesting = false;
                        this.nextStep.payment = true;
                        this.nextStep.info = false;
                    }, 1000);
                } else {
                    if (!this.user.lga || this.user.lga == "") {
                        this.sorted = true;
                        const attr = document.createAttribute("aria-invalid");
                        attr.value = "true";
                        document.getElementById("LGAID").setAttribute(attr);
                    } else {
                        this.requesting = true;
                        this.user.user_id = this.$store.state.user.user_id;
                        axios.post("/api/shipping", this.user).then((res) => {
                            if (res.data.status == "ok") {
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
                            }
                            console.log(res);
                        });
                    }
                }
            },
            sortLgas() {
                this.lgaSorted = this.lgas.filter(
                    (el) => el.state_id == this.user.state
                );
            },
        },
        mounted() {
            this.getStateLgas();
            this.getUser();
            this.getUserShipping();
        },
    };
</script>
<style scoped>
    .main .logo {
        display: block;
    }
    .sidebar {
        padding-top: 4em;
    }
    @media (min-width: 750px) {
        .main {
            padding-top: 4em;
        }
    }
    .logged-in-customer-information__avatar .gravatar {
        background-image: url(/img/userD.png);
    }
    .field__caret {
        top: 70%;
    }
    @media (min-width: 750px) {
        .floating-labels .field--half {
            width: 50%;
        }
    }
    .field {
        width: 100%;
        float: left;
        padding: 0.4285714286em;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }
    .flexed {
        display: flex;
    }
    .btn {
        background-color: black;
        color: white;
    }
    .btn__spinner {
        opacity: 1;
    }
    .main__footer {
        margin-top: 50px
    }
</style>