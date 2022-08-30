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
                                                v-if="productInView.images"
                                                class="full-width"
                                                :alt="productInView.title"
                                                :src="productInView.images[0].url"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .product-images -->
                            <div class="cras product-info">
                                <div class="product-name">
                                    <h1 class="product_title">
                                        {{ productInView.title }}
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
                                            v-if="productInView.promotionals"
                                            style="display: inline"
                                            ><span
                                                class="money"
                                                v-if="productInView.promotionals.length > 0"
                                                >&#8358;{{discount(productInView.promotionals[0].discount, productInView.amount)}}.00</span
                                            >
                                            <span class="money" v-else
                                                >&#8358;{{
                                                    formatPrice(productInView.amount)
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
                                            v-if="productInView.promotionals"
                                            ><span class="money" v-if="productInView.promotionals.length > 0"
                                                >&#8358;{{
                                                    formatPrice(productInView.amount)
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
                                            {{ synopsis(productInView.desc, 150) }}
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
                                                            v-if="productInView.sizes"
                                                        >
                                                            <div
                                                                class="
                                                                    selector-wrapper
                                                                "
                                                                v-if="
                                                                    productInView
                                                                        .sizes
                                                                        .length !=
                                                                    0 && !inputOn
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
                                                                    v-model="selectedSize"
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
                                                                            size.id
                                                                        "
                                                                        v-for="size in productInView.sizes"
                                                                        :key="
                                                                            size.id
                                                                        "
                                                                    >
                                                                        {{
                                                                            size.name
                                                                        }}
                                                                    </option>
                                                                    <option value="custom">Custom Size</option>
                                                                </select>
                                                            </div>
                                                            <div
                                                                class="
                                                                    selector-wrapper
                                                                "
                                                                v-if="
                                                                    productInView
                                                                        .sizes
                                                                        .length !=
                                                                    0 && inputOn
                                                                "
                                                            >
                                                                <label
                                                                    for="size"
                                                                    >Size:</label
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
                                                        <div
                                                            v-if="
                                                                productInView.colors
                                                            "
                                                        >
                                                            <div
                                                                class="
                                                                    selector-wrapper
                                                                "
                                                                v-if="
                                                                    productInView
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
                                                                    v-model="selectedColor"
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
                                                                        v-for="color in productInView.colors"
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
                                                                productInView.materials
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
                                                            onkeypress='return event.charCode >= 48 && event.charCode <= 57'
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
        props: ["product", "formatPrice", "synopsis", 'discount'],
        data() {
            return {
                adding: false,
                added: false,
                inputOn: false,
                selectedSize: '',
                selectedColor: '',
                productInView: [],
            };
        },
        methods: {
            closeInput() {
                this.inputOn = false;
                this.selectedSize = '';
            },
            updateColor(e) {
                // this.$store.commit('updateMessage', e.target.value)
                // this.selectedColor = e.target.value;
            },
            updateSize(e) {
                // this.selectedSize = e.target.value;
                if (this.selectedSize == 'custom') {
                    this.inputOn = true;
                }
            },
            addToCartForm() {
                this.adding = true;
                let customized = '0'; // If customer enters his own size
                let input = parseInt(document.getElementById("quantity").value);
                let selColor = this.productInView.colors.find(
                    (el) => el.id == this.selectedColor
                );
                let selSize = this.inputOn ? this.selectedSize : this.productInView.sizes.find(
                    (el) => el.id == this.selectedSize
                );
                this.inputOn ? customized = '1' : null; 
                this.$store.commit("addToCart", {...this.productInView, color: selColor, size: selSize, input: input, customized: customized});
                setTimeout(() => {
                    this.adding = false;
                    this.added = true;
                    setTimeout(() => {
                        this.added = false;
                        document.getElementById("quantity").value = 1;
                        $("#color").prop("selectedIndex", 0);
                        $("#size").prop("selectedIndex", 0);
                        this.inputOn = false;
                        this.selectedColor = "";
                        this.selectedSize = "";
                    }, 1000);
                }, 1000);
            },
        },
        
        mounted() {},
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
    @media (max-width: 767px) {
        img {
            height: unset !important;
        }
    }
</style>