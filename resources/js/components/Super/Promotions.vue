<template>
    <div>
        <div id="wrapper">
            <sidebar-component />
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <navbar-component />
                    <div class="container-fluid">
                        <div
                            class="
                                d-sm-flex
                                align-items-center
                                justify-content-between
                                mb-4
                            "
                        >
                            <h1 class="h3 mb-0 text-gray-800">Promotionals</h1>
                        </div>
                        <div class="row">
                            <!-- Area Chart -->
                            <div class="col-xl-12 col-lg-11">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="
                                            card-header
                                            py-3
                                            d-flex
                                            flex-row
                                            align-items-center
                                            justify-content-between
                                        "
                                    >
                                        <h6
                                            class="
                                                m-0
                                                font-weight-bold
                                                text-primary
                                            "
                                        >
                                            Promotionals Overview
                                        </h6>
                                        <div class="dropdown no-arrow">
                                            <a
                                                class="dropdown-toggle"
                                                href="#"
                                                role="button"
                                                id="dropdownMenuLink"
                                                data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                            >
                                                <i
                                                    class="
                                                        fas
                                                        fa-ellipsis-v
                                                        fa-sm
                                                        fa-fw
                                                        text-gray-400
                                                    "
                                                ></i>
                                            </a>
                                            <div
                                                class="
                                                    dropdown-menu
                                                    dropdown-menu-right
                                                    shadow
                                                    animated--fade-in
                                                "
                                                aria-labelledby="dropdownMenuLink"
                                            >
                                                <div class="dropdown-header">
                                                    Actions:
                                                </div>
                                                <a
                                                    class="dropdown-item"
                                                    href="#"
                                                    @click="
                                                        (promotionsView = false),
                                                            (promotionAddView = true),
                                                            (update = false)
                                                    "
                                                    >New promotion</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body p-0">
                                        <div class="card-body">
                                            <div
                                                id="addAD"
                                                v-if="promotionAddView"
                                            >
                                                <div class="card shadow">
                                                    <div class="card-body">
                                                        <div class="card-title">
                                                            <h5>
                                                                Add New
                                                                promotion
                                                            </h5>
                                                        </div>
                                                        <div
                                                            class="
                                                                bg-success
                                                                text-white
                                                                white
                                                            "
                                                            v-if="success != ''"
                                                        >
                                                            <p>
                                                                {{ success }}
                                                            </p>
                                                        </div>
                                                        <form
                                                            class="
                                                                w-full
                                                                max-w-lg
                                                            "
                                                            @submit.prevent="
                                                                submit
                                                            "
                                                        >
                                                            <div
                                                                class="form-row"
                                                            >
                                                                <div
                                                                    class="
                                                                        form-group
                                                                        col-md-6
                                                                    "
                                                                >
                                                                    <label
                                                                        for="grid-name"
                                                                    >
                                                                        Name
                                                                    </label>
                                                                    <input
                                                                        class="
                                                                            form-control
                                                                        "
                                                                        id="grid-name"
                                                                        type="text"
                                                                        placeholder="Flash sale"
                                                                        v-model="
                                                                            promotion.type
                                                                        "
                                                                        required
                                                                    />
                                                                    <p
                                                                        class="
                                                                            error
                                                                        "
                                                                        v-if="
                                                                            errors.type
                                                                        "
                                                                    >
                                                                        {{
                                                                            errors.type
                                                                        }}
                                                                    </p>
                                                                </div>
                                                                <div
                                                                    class="
                                                                        form-group
                                                                        col-md-6
                                                                    "
                                                                >
                                                                    <label
                                                                        for="grid-website"
                                                                    >
                                                                        Discount
                                                                    </label>
                                                                    <input
                                                                        class="
                                                                            form-control
                                                                        "
                                                                        id="grid-website"
                                                                        required
                                                                        type="number"
                                                                        placeholder="20%"
                                                                        v-model="
                                                                            promotion.discount
                                                                        "
                                                                    />
                                                                    <p
                                                                        class="
                                                                            error
                                                                        "
                                                                        v-if="
                                                                            errors.discount
                                                                        "
                                                                    >
                                                                        {{
                                                                            errors.discount
                                                                        }}
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="form-row"
                                                            >
                                                                <div
                                                                    class="
                                                                        form-group
                                                                        col-md-12
                                                                    "
                                                                >
                                                                    <label
                                                                        for="usertype"
                                                                        >Select
                                                                        Products</label
                                                                    >
                                                                    <multiselect
                                                                        v-model="
                                                                            product_id
                                                                        "
                                                                        :options="
                                                                            options
                                                                        "
                                                                        :custom-label="
                                                                            nameWithLang
                                                                        "
                                                                        placeholder="Select Multiple"
                                                                        label="products"
                                                                        track-by="id"
                                                                        :close-on-select="
                                                                            false
                                                                        "
                                                                        :searchable="
                                                                            true
                                                                        "
                                                                        :multiple="
                                                                            true
                                                                        "
                                                                        :clear-on-select="
                                                                            false
                                                                        "
                                                                    ></multiselect>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="form-row"
                                                            >
                                                                <div
                                                                    class="
                                                                        form-group
                                                                        col-md-12
                                                                    "
                                                                >
                                                                    <label
                                                                        for="grid-desc"
                                                                    >
                                                                        Description
                                                                    </label>
                                                                    <textarea
                                                                        class="
                                                                            form-control
                                                                        "
                                                                        id="grid-desc"
                                                                        rows="6"
                                                                        placeholder="promotion About(Optional)"
                                                                        v-model="
                                                                            promotion.desc
                                                                        "
                                                                    >
                                                                    </textarea>
                                                                    <p
                                                                        class="
                                                                            error
                                                                        "
                                                                        v-if="
                                                                            errors.desc
                                                                        "
                                                                    >
                                                                        {{
                                                                            errors.desc
                                                                        }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <button
                                                                type="submit"
                                                                class="
                                                                    btn
                                                                    btn-primary
                                                                "
                                                                :disabled="
                                                                    registering
                                                                "
                                                            >
                                                                <i
                                                                    v-if="
                                                                        registering
                                                                    "
                                                                    class="
                                                                        fas
                                                                        fa-spinner
                                                                        fa-spin
                                                                        fa-fw
                                                                    "
                                                                    aria-hidden="true"
                                                                ></i>
                                                                {{
                                                                    update
                                                                        ? "Update"
                                                                        : "Submit"
                                                                }}
                                                            </button>
                                                            <button
                                                                type="button"
                                                                class="
                                                                    btn
                                                                    btn-secondary
                                                                "
                                                                @click="
                                                                    (promotionAddView = false),
                                                                        (promotionsView = true),
                                                                        (update = false),
                                                                        (promotion =
                                                                            {})
                                                                "
                                                            >
                                                                Close
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                id="viewpromotions"
                                                v-else-if="promotionsView"
                                            >
                                                <div
                                                    v-if="promotions.data != []"
                                                >
                                                    <div class="row">
                                                        <!-- Collapsable Card Example -->
                                                        <div
                                                            class="
                                                                mb-4
                                                                col-md-12
                                                                col-sm-12
                                                                mr-1
                                                            "
                                                        >
                                                            <!-- :class="{shadow: clickedOn == index, card: clickedOn == index}" -->
                                                            <div
                                                                id="accordion"
                                                                class="
                                                                    accordion
                                                                "
                                                            >
                                                                <div
                                                                    class="card"
                                                                    v-for="(
                                                                        promotion,
                                                                        index
                                                                    ) in promotions.data"
                                                                    :key="
                                                                        promotion.id
                                                                    "
                                                                    @click="
                                                                        getIndex(
                                                                            index
                                                                        )
                                                                    "
                                                                >
                                                                    <div
                                                                        class="
                                                                            card-header
                                                                        "
                                                                        id="headingOne"
                                                                    >
                                                                        <h5
                                                                            class="
                                                                                mb-0
                                                                            "
                                                                        >
                                                                            <!-- @click="
                                                                                    rend(
                                                                                        promotion,
                                                                                        index
                                                                                    )
                                                                                " -->
                                                                            <a
                                                                                class="
                                                                                    btn-link
                                                                                    cursor
                                                                                "
                                                                                :class="{
                                                                                    collapsed:
                                                                                        index !=
                                                                                        clickedOn,
                                                                                }"
                                                                                data-toggle="collapse"
                                                                                :data-target="
                                                                                    '#' +
                                                                                    promotion.id
                                                                                "
                                                                                aria-expanded="true"
                                                                                :aria-controls="
                                                                                    'collapse' +
                                                                                    promotion.id
                                                                                "
                                                                            >
                                                                                {{
                                                                                    promotion.type +
                                                                                    " / " +
                                                                                    promotion.discount +
                                                                                    "% discount"
                                                                                }}
                                                                            </a>
                                                                        </h5>
                                                                    </div>

                                                                    <div
                                                                        :id="
                                                                            promotion.id
                                                                        "
                                                                        class="
                                                                            collapse
                                                                        "
                                                                        :class="{
                                                                            show:
                                                                                index ==
                                                                                clickedOn,
                                                                        }"
                                                                        aria-labelledby="headingOne"
                                                                        data-parent="#accordion"
                                                                    >
                                                                        <div
                                                                            class="
                                                                                card-body
                                                                            "
                                                                        >
                                                                            <div
                                                                                class="
                                                                                    container
                                                                                "
                                                                            >
                                                                                <div
                                                                                    class="
                                                                                        row
                                                                                    "
                                                                                >
                                                                                    <div
                                                                                        class="
                                                                                            col-md-12
                                                                                        "
                                                                                    >
                                                                                        <h2
                                                                                            class="
                                                                                                mx-auto
                                                                                            "
                                                                                        >
                                                                                            <b
                                                                                                >Products</b
                                                                                            >
                                                                                        </h2>

                                                                                        <a
                                                                                            href="#!"
                                                                                            class="
                                                                                                btn
                                                                                                btn-primary-rgba
                                                                                            "
                                                                                            data-toggle="modal"
                                                                                            data-target="#productPromo"
                                                                                            @click="
                                                                                                addPrd(
                                                                                                    promotion
                                                                                                )
                                                                                            "
                                                                                            ><i
                                                                                                class="
                                                                                                    fas
                                                                                                    fa-plus
                                                                                                "
                                                                                            ></i
                                                                                            >&nbsp;
                                                                                            Add
                                                                                            Products</a
                                                                                        >
                                                                                        <div
                                                                                            class="
                                                                                                row
                                                                                            "
                                                                                        >
                                                                                            <div
                                                                                                class="
                                                                                                    col-sm-3
                                                                                                    mb-5
                                                                                                "
                                                                                                v-for="product in promotion.products"
                                                                                                :key="
                                                                                                    product.id
                                                                                                "
                                                                                            >
                                                                                                <div
                                                                                                    class="
                                                                                                        thumb-wrapper
                                                                                                    "
                                                                                                    v-if="
                                                                                                        product
                                                                                                    "
                                                                                                >
                                                                                                    <div
                                                                                                        class="
                                                                                                            img-box
                                                                                                        "
                                                                                                    >
                                                                                                        <img
                                                                                                            :src="
                                                                                                                product
                                                                                                                    .images[0]
                                                                                                                    .url
                                                                                                            "
                                                                                                            class="
                                                                                                                img-responsive
                                                                                                            "
                                                                                                            alt=""
                                                                                                            height="160px"
                                                                                                        />
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="
                                                                                                            thumb-content
                                                                                                        "
                                                                                                    >
                                                                                                        <h4>
                                                                                                            {{
                                                                                                                product.title.slice(0, 20)
                                                                                                            }}
                                                                                                        </h4>

                                                                                                        <p
                                                                                                            class="
                                                                                                                item-price
                                                                                                            "
                                                                                                        >
                                                                                                            <strike
                                                                                                                >N{{
                                                                                                                    product.amount
                                                                                                                }}</strike
                                                                                                            >
                                                                                                            <b
                                                                                                                >&#8358;{{
                                                                                                                    discount(
                                                                                                                        promotion.discount,
                                                                                                                        product.amount
                                                                                                                    )
                                                                                                                }}</b
                                                                                                            >
                                                                                                        </p>
                                                                                                        <a
                                                                                                            href="#"
                                                                                                            class="
                                                                                                                btn
                                                                                                                btn-primary
                                                                                                            "
                                                                                                            @click.prevent="
                                                                                                                remove(
                                                                                                                    product.id,
                                                                                                                    promotion.id
                                                                                                                )
                                                                                                            "
                                                                                                            >Remove</a
                                                                                                        >
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <nav
                                                        aria-label="Page navigation example"
                                                    >
                                                        <ul
                                                            class="
                                                                pagination
                                                                justify-content-center
                                                                mt-3
                                                            "
                                                        >
                                                            <li
                                                                class="
                                                                    page-item
                                                                "
                                                                v-for="(
                                                                    pages, index
                                                                ) in promotions.links"
                                                                :key="index"
                                                                :class="{
                                                                    active: pages.active,
                                                                    disabled:
                                                                        pages.url ==
                                                                        null,
                                                                }"
                                                            >
                                                                <span
                                                                    class="
                                                                        page-link
                                                                    "
                                                                    v-if="
                                                                        pages.active
                                                                    "
                                                                    v-html="
                                                                        pages.label
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            sr-only
                                                                        "
                                                                        >(current)</span
                                                                    >
                                                                </span>
                                                                <a
                                                                    class="
                                                                        page-link
                                                                    "
                                                                    href="#"
                                                                    v-else
                                                                    v-html="
                                                                        pages.label
                                                                    "
                                                                    @click="
                                                                        paginate(
                                                                            pages.url
                                                                        )
                                                                    "
                                                                ></a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                                <div class="" v-else>
                                                    <p class="text-center">
                                                        No promotion Added Yet
                                                    </p>
                                                    <p class="text-center">
                                                        <a
                                                            class="
                                                                text-center
                                                                text-decoration-none
                                                            "
                                                            href="#"
                                                            @click="
                                                                (promotionAddView = true),
                                                                    (promotionsView = false)
                                                            "
                                                            >Add New</a
                                                        >
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="modal fade"
                        id="productPromo"
                        tabindex="-1"
                        role="dialog"
                        aria-labelledby="productPromoLabel"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5
                                        class="modal-title"
                                        id="productPromoLabel"
                                    >
                                        You are adding products to
                                        {{ promotion.type }}!
                                        <small
                                            >You can also update the name of
                                            promo or discount % from here</small
                                        >
                                    </h5>
                                    <button
                                        class="close"
                                        type="button"
                                        data-dismiss="modal"
                                        aria-label="Close"
                                    >
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div
                                        class="bg-success"
                                        v-if="success != ''"
                                    >
                                        <p>
                                            {{ success }}
                                        </p>
                                    </div>
                                    <form
                                        class="w-full max-w-lg"
                                        @submit.prevent="updatePromo"
                                    >
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="grid-name">
                                                    Name
                                                </label>
                                                <input
                                                    class="form-control"
                                                    id="grid-type"
                                                    type="text"
                                                    placeholder="Flash sale"
                                                    v-model="promotion.type"
                                                    required
                                                />
                                                <p
                                                    class="error"
                                                    v-if="errors.type"
                                                >
                                                    {{ errors.type }}
                                                </p>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="grid-name">
                                                    Discount
                                                </label>
                                                <input
                                                    class="form-control"
                                                    id="grid-discount"
                                                    type="number"
                                                    placeholder="20"
                                                    v-model="promotion.discount"
                                                    required
                                                />
                                                <p
                                                    class="error"
                                                    v-if="errors.discount"
                                                >
                                                    {{ errors.discount }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="usertype"
                                                    >Select Products</label
                                                >
                                                <multiselect
                                                    v-model="product_id"
                                                    :options="options"
                                                    :custom-label="nameWithLang"
                                                    placeholder="Select Multiple"
                                                    label="products"
                                                    track-by="id"
                                                    :close-on-select="false"
                                                    :searchable="true"
                                                    :multiple="true"
                                                    :clear-on-select="false"
                                                ></multiselect>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button
                                                class="btn btn-secondary cancel"
                                                type="button"
                                                data-dismiss="modal"
                                                @click="
                                                    (promotion = {}),
                                                        (product_id = [])
                                                "
                                            >
                                                Cancel
                                            </button>
                                            <button
                                                class="btn btn-danger"
                                                href="#"
                                                type="submit"
                                                :disabled="registering"
                                            >
                                                <i
                                                    class="
                                                        fas
                                                        fa-spinner fa-spin
                                                    "
                                                    v-if="registering"
                                                ></i>
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer-component />
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </div>
</template>
<script>
    import FooterComponent from "./FooterComponent.vue";
    import NavbarComponent from "./NavbarComponent.vue";
    import SidebarComponent from "./SidebarComponent.vue";
    import Multiselect from "vue-multiselect";
    export default {
        components: {
            NavbarComponent,
            FooterComponent,
            SidebarComponent,
            Multiselect,
        },
        data() {
            return {
                // count: 0,
                // counter: 0,
                clickedOn: 0,
                promotionAddView: false,
                promotionsView: true,
                promotion: {},
                promotions: [],
                errors: [],
                options: [],
                product_id: [],
                // prdLen: [],
                // promoPrd: [],
                registering: false,
                success: "",
                update: false,
            };
        },
        methods: {
            addPrd(e) {
                this.promotion = e;
                this.product_id = e.products;
                this.update = true;
            },
            deleteDistro(promo) {
                this.promotion = promo;
                axios.delete(`api/promotion/${promo.id}`).then((res) => {
                    if (res.status == 204) {
                        this.promotion.deleted_at = new Date();
                        this.promotion = {};
                        // this.resourceTrashed.push(this.resource);
                        // $("#deleteModal .close").click();
                    }
                });
            },
            discount(disc, e) {
                let discount = (disc / 100) * e;
                let newPrice = e - Math.round(discount);
                return Math.round(newPrice);
            },
            getPromotion(data) {
                this.promotion = data;
                this.product_id = data.products;
            },
            getPromotions() {
                axios
                    .get("api/promotion")
                    .then((res) => {
                        this.promotions = res.data.promotionals;
                        // this.rend();
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getIndex(i) {
                this.clickedOn = i;
            },
            getProducts() {
                axios
                    .get("api/product-home")
                    .then((res) => {
                        this.options = res.data.products;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            remove(id, promo) {
                axios
                    .post(`api/removepromo-product`, {
                        product_id: id,
                        promo_id: promo,
                    })
                    .then((res) => {
                        if (res.data.status == 1) {
                            const findId = (rol) => rol.id === id;
                            this.promotions.data
                                .find((el) => el.id == promo)
                                .products.splice(
                                    this.promotions.data
                                        .find((el) => el.id == promo)
                                        .products.findIndex(findId),
                                    1
                                );
                        }
                        console.log(res);
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            restorePromo() {
                this.registering = true;
                axios.patch(`api/promotion/${this.promotion.id}`).then((res) => {
                    if (res.status == 201) {
                        this.promotion.deleted_at = null;
                        this.success = "Restore Success!";
                        this.registering = false;
                        this.promotion = {};
                        $("#restoreWarn .close").click();
                        this.success = "";
                    }
                });
            },
            nameWithLang({ title }) {
                return `${title}`;
            },
            submit() {
                this.registering = true;
                let url;
                let axiosFunction;
                url = "api/promotion";
                axiosFunction = axios.post;
                this.axiosFunction(axiosFunction, url);
            },
            axiosFunction(axiosFunction, url) {
                this.promotion.product_id = this.product_id.map((a) => a.id);
                axiosFunction(url, this.promotion)
                    .then((res) => {
                        if (res.data.status == 1) {
                            window.scrollTo(5, 20);

                            this.success = this.update
                                ? "promotion Updated Success"
                                : res.data.message;
                            this.promotions = res.data.promotionals;
                            this.promotion = {};
                            this.resource_id = [];
                            this.$toasted.show("Data Updated with new records!", {
                                duration: 3000,
                                position: "top-right",
                            });
                            setTimeout(() => {
                                this.success = "";
                                this.promotionAddView = false;
                                this.promotionsView = true;
                                this.update ? $(".cancel").click() : null;
                                this.update = false;
                                this.registering = false;
                            }, 3000);
                        } else if (res.errors) {
                            this.errors = res.errors;
                        }
                    })
                    .catch((err) => {
                        this.registering = false;
                    });
            },
            updatePromo() {
                this.registering = true;
                let url;
                let axiosFunction;
                url = `api/promotion/${this.promotion.id}`;
                axiosFunction = axios.put;
                this.axiosFunction(axiosFunction, url);
            },
        },
        mounted() {
            this.getPromotions();
            this.getProducts();
        },
    };
</script>
<style scoped>
    .btn-primary-rgba {
        background-color: rgba(0, 128, 255, 0.1);
        border: none;
        color: #0080ff;
        float: right;
        position: relative;
        margin: 30px 0 60px;
        font-size: 14px;
    }
    .col-sm-3 {
        padding-left: 15px;
        padding-right: 15px;
    }
    h2 {
        color: #000;
        font-size: 26px;
        font-weight: 300;
        text-align: center;
        text-transform: uppercase;
        position: relative;
        margin: 30px 0 60px;
        display: inline-block;
        text-align: center;
    }
    h2::after {
        content: "";
        width: 100px;
        position: absolute;
        margin: 0 auto;
        height: 4px;
        border-radius: 1px;
        background: #c42e00;
        left: 0;
        right: 0;
        bottom: -20px;
    }
    .carousel {
        margin: 50px auto;
        padding: 0 70px;
    }
    .col-sm-3 .item {
        color: #747d89;
        min-height: 325px;
        text-align: center;
        overflow: hidden;
    }
    .col-sm-3 .thumb-wrapper {
        padding: 25px 15px;
        background: #fff;
        border-radius: 6px;
        text-align: center;
        position: relative;
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.2);
    }
    .col-sm-3 .item .img-box {
        height: 120px !important;
        margin-bottom: 20px;
        width: 100%;
        position: relative;
    }
    .col-sm-3 .item img {
        max-width: 100%;
        max-height: 100%;
        display: inline-block;
        position: absolute;
        bottom: 0;
        margin: 0 auto;
        left: 0;
        right: 0;
    }
    .col-sm-3 .item h4 {
        font-size: 18px;
    }
    .col-sm-3 .item h4,
    .col-sm-3 .item p,
    .col-sm-3 .item ul {
        margin-bottom: 5px;
    }
    .col-sm-3 .thumb-content .btn {
        color: #c42700;
        font-size: 11px;
        text-transform: uppercase;
        font-weight: bold;
        background: none;
        border: 1px solid #c41d00;
        padding: 6px 14px;
        margin-top: 5px;
        line-height: 16px;
        border-radius: 20px;
    }
    .col-sm-3 .thumb-content .btn:hover,
    .col-sm-3 .thumb-content .btn:focus {
        color: #fff;
        background: #c40d00;
        box-shadow: none;
    }
    .col-sm-3 .thumb-content .btn i {
        font-size: 14px;
        font-weight: bold;
        margin-left: 5px;
    }
    .col-sm-3 .carousel-control {
        height: 44px;
        width: 40px;
        background: #7ac400;
        margin: auto 0;
        border-radius: 4px;
        opacity: 0.8;
    }
    .carousel .carousel-control:hover {
        background: #78bf00;
        opacity: 1;
    }
    .carousel .carousel-control i {
        font-size: 36px;
        position: absolute;
        top: 50%;
        display: inline-block;
        margin: -19px 0 0 0;
        z-index: 5;
        left: 0;
        right: 0;
        color: #fff;
        text-shadow: none;
        font-weight: bold;
    }
    .carousel .item-price {
        font-size: 13px;
        padding: 2px 0;
    }
    .carousel .item-price strike {
        opacity: 0.7;
        margin-right: 5px;
    }
    .carousel .carousel-control.left i {
        margin-left: -2px;
    }
    .carousel .carousel-control.right i {
        margin-right: -4px;
    }
    .carousel .carousel-indicators {
        bottom: -50px;
    }
    .carousel-indicators li,
    .carousel-indicators li.active {
        width: 10px;
        height: 10px;
        margin: 4px;
        border-radius: 50%;
        border: none;
    }
    .carousel-indicators li {
        background: rgba(0, 0, 0, 0.2);
    }
    .carousel-indicators li.active {
        background: rgba(0, 0, 0, 0.6);
    }
    .carousel .wish-icon {
        position: absolute;
        right: 10px;
        top: 10px;
        z-index: 99;
        cursor: pointer;
        font-size: 16px;
        color: #abb0b8;
    }
    .carousel .wish-icon .fa-heart {
        color: #ff6161;
    }
    .star-rating li {
        padding: 0;
    }
    .star-rating i {
        font-size: 14px;
        color: #ffc000;
    }
    .carousel-control {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        width: 15%;
        font-size: 20px;
        color: #fff;
        text-align: center;
        text-shadow: 0 1px 2px rgb(0 0 0 / 60%);
        background-color: rgba(0, 0, 0, 0);
        filter: alpha(opacity=50);
        opacity: 0.5;
    }
    .carousel-control.right {
        right: 0;
        left: auto;
    }
    h4 {
        font-size: 18px;
        margin-bottom: 5px;
    }
    @import "vue-multiselect/dist/vue-multiselect.min.css";
    @media (min-width: 1366px) {
        #inspired h1,
        #inspired {
            margin-top: 30px;
        }
    }
    .flexGrow {
        flex-grow: 1;
    }
    .cursor {
        text-decoration: none;
        cursor: pointer;
    }
    .cursor:hover {
        color: rgb(199, 137, 137);
        text-decoration: none;
    }
    .collapse .card-body {
        background: #e2eaef;
        font-family: "Open Sans", sans-serif;
    }
</style>

        