<template>
    <div>
        <div
            class="modal fade bs-example-modal-lg product-modal productModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="myLargeModalLabel"
            id="productModal"
        >
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header modal__header">
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product clearfix">
                            <div class="product-images">
                                <div class="main-image images">
                                    <div class="product-main-image__item">
                                        <div class="img_box_1">
                                            <img
                                                v-if="product.images"
                                                class="full-width"
                                                :alt="product.title"
                                                :src="product.images[0].url"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .product-images -->
                            <div class="cras product-info">
                                <div class="product-name">
                                    <h1 class="product_title">
                                        {{ product.title }}
                                    </h1>
                                </div>
                                <div class="price-box-3">
                                    <div
                                        class="
                                            s-price-box
                                            product-info__price
                                            price-part
                                        "
                                    >
                                        <span
                                            class="
                                                price-box__new
                                                amount2
                                                new-price
                                            "
                                            style="display: inline"
                                            ><span
                                                class="money"
                                                data-currency-inr="Rs. 6,128.58"
                                                data-currency="INR"
                                                >&#8358;{{
                                                    formatPrice(product.amount)
                                                }}.00</span
                                            ></span
                                        >
                                        <span
                                            class="
                                                main
                                                new-price
                                                amount
                                                price-box__old
                                            "
                                            ><span class="money"
                                                >&#8358;{{
                                                    formatPrice(product.amount)
                                                }}.00</span
                                            ></span
                                        >
                                    </div>
                                </div>

                                <div class="small-product-des quick-desc">
                                    <div
                                        class="
                                            divider divider--xs
                                            product-info__divider
                                        "
                                    ></div>
                                    <div
                                        class="
                                            product-info__description
                                            product-des
                                        "
                                    >
                                        <p>
                                            {{ synopsis(product.desc, 150) }}
                                        </p>
                                    </div>
                                </div>

                                <div class="add-to-box1">
                                    <div class="add-to-box add-to-box2">
                                        <div class="add-to-cart">
                                            <form
                                                @submit.prevent="addToCartForm"
                                            >
                                                <div class="variants">
                                                    <div
                                                        class="variants_selects"
                                                    >
                                                        <div
                                                            v-if="product.sizes"
                                                        >
                                                            <div
                                                                class="
                                                                    selector-wrapper
                                                                "
                                                                v-if="
                                                                    product
                                                                        .sizes
                                                                        .length !=
                                                                    0
                                                                "
                                                            >
                                                                <label
                                                                    for="size"
                                                                    >Size:</label
                                                                ><select
                                                                    class="
                                                                        single-option-selector
                                                                        select--wd
                                                                    "
                                                                    @change="
                                                                        updateSize(
                                                                            $event
                                                                        )
                                                                    "
                                                                    required
                                                                    id="size"
                                                                >
                                                                    <option
                                                                        disabled
                                                                        value
                                                                        selected
                                                                    >
                                                                        Select
                                                                        size
                                                                    </option>
                                                                    <option
                                                                        :value="
                                                                            size
                                                                        "
                                                                        v-for="size in product.sizes"
                                                                        :key="
                                                                            size.id
                                                                        "
                                                                    >
                                                                        {{
                                                                            size.name
                                                                        }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div
                                                            v-if="
                                                                product.colors
                                                            "
                                                        >
                                                            <div
                                                                class="
                                                                    selector-wrapper
                                                                "
                                                                v-if="
                                                                    product
                                                                        .colors
                                                                        .length !=
                                                                    0
                                                                "
                                                            >
                                                                <label
                                                                    for="color"
                                                                    >Color:</label
                                                                ><select
                                                                    class="
                                                                        single-option-selector
                                                                        select--wd
                                                                    "
                                                                    @change="
                                                                        updateColor(
                                                                            $event
                                                                        )
                                                                    "
                                                                    required
                                                                    id="color"
                                                                >
                                                                    <option
                                                                        disabled
                                                                        value
                                                                        selected
                                                                    >
                                                                        Select
                                                                        color
                                                                    </option>
                                                                    <option
                                                                        v-for="color in product.colors"
                                                                        :key="
                                                                            color.id
                                                                        "
                                                                        :value="
                                                                            color.id
                                                                        "
                                                                    >
                                                                        {{
                                                                            color.name
                                                                        }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div
                                                            v-if="
                                                                product.materials
                                                            "
                                                            class="
                                                                selector-wrapper
                                                            "
                                                        >
                                                            <label
                                                                for="product-select-qv-option-2"
                                                                >Material:</label
                                                            ><select
                                                                class="
                                                                    single-option-selector
                                                                    select--wd
                                                                "
                                                                data-option="option3"
                                                                id="product-select-qv-option-2"
                                                            >
                                                                <option
                                                                    value="partex"
                                                                >
                                                                    partex
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="
                                                            divider divider--sm
                                                        "
                                                    ></div>
                                                </div>
                                                <div
                                                    class="divider divider--sm"
                                                ></div>
                                                <div
                                                    class="
                                                        wrapper
                                                        input-content
                                                    "
                                                >
                                                    <label
                                                        ><span class="qty-label"
                                                            >Quantity :</span
                                                        ></label
                                                    >
                                                    <div
                                                        class="
                                                            cart-plus-minus
                                                            f-left
                                                        "
                                                    >
                                                        <input
                                                            type="text"
                                                            value="1"
                                                            name="quantity"
                                                            class="
                                                                cart-plus-minus-box
                                                            "
                                                            id="quantity"
                                                        />
                                                        <div
                                                            class="
                                                                dec
                                                                qtybutton
                                                            "
                                                        >
                                                            -
                                                        </div>
                                                        <div
                                                            class="
                                                                inc
                                                                qtybutton
                                                            "
                                                        >
                                                            +
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="
                                                            last-cart
                                                            addtocart-btn
                                                        "
                                                    >
                                                        <button
                                                            title="Add to cart"
                                                            class="
                                                                add_cart
                                                                addtocartqv
                                                                custom-btn
                                                                custom-btn-hover
                                                            "
                                                            type="submit"
                                                            name="add"
                                                            value="Add to Cart"
                                                        >
                                                            <i
                                                                v-if="adding"
                                                                class="
                                                                    zmdi
                                                                    zmdi-spinner
                                                                    zmdi-hc-spin
                                                                "
                                                            ></i>
                                                            <i
                                                                v-if="added"
                                                                class="
                                                                    zmdi
                                                                    zmdi-check
                                                                "
                                                            ></i>
                                                            <span
                                                                v-if="
                                                                    !adding &&
                                                                    !added
                                                                "
                                                                >Add to
                                                                Cart</span
                                                            >
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .product-info -->
                        </div>
                        <!-- .modal-product -->
                    </div>
                    <!-- .modal-body -->
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "QuickView",
        props: ["product", "formatPrice", "synopsis"],
        data() {
            return {
                adding: false,
                added: false,
                selectedSize: {},
                selectedColor: {},
                productInView: this.product,
            };
        },
        methods: {
            updateColor(e) {
                // this.$store.commit('updateMessage', e.target.value)
                this.selectedColor = e.target.value;
            },
            updateSize(e) {
                this.selectedSize = e.target.value;
            },
            addToCartForm() {
                this.adding = true;

                this.productInView.input = parseInt(document.getElementById("quantity").value);
                this.productInView.colorFilter = this.productInView.colors.filter(
                    (el) => el.id == this.selectedColor
                )[0];
                this.productInView.sizeFilter = this.productInView.sizes.filter(
                    (el) => el.id == this.selectedSize
                )[0];
                this.$store.commit("addToCart", this.productInView);
                setTimeout(() => {
                    this.adding = false;
                    this.added = true;
                    setTimeout(() => {
                        this.added = false;
                        document.getElementById("quantity").value = 1;
                        $("#color").prop("selectedIndex", 0);
                        $("#size").prop("selectedIndex", 0);

                        this.selectedColor = "";
                        this.selectedSize = "";
                    }, 1000);
                }, 1000);
            },
        },
        
        mounted() {
        },
        watch: {
            product(product) {
                this.productInView = { ...product }; // shallow copy
            },
        },
    };
</script>
<style scoped>
    img {
        width: 519px;
        height: 480px;
    }
</style>