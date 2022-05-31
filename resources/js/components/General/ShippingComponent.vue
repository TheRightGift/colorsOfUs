<template>
    <div>
        <!-- <h5 class="ptb--60">Choose default shipping address</h5>
        <p>
            You will be able to add a new shipping address on your next checkout
        </p> -->
        <!-- <div class="row">
            <div class="col-md-9 main">
                <div class="section__content">
                    <fieldset class="content-box">
                        <legend class="visually-hidden">
                            Choose default shipping address
                        </legend>

                        <div class="radio-wrapper content-box__row" v-for="shipping in shippinginfos" :key="shipping.id">
                            <div class="radio__input">
                                <input
                                    class="input-radio"
                                    type="radio"
                                    value="false"
                                    checked="checked"
                                    id="checkout_different_billing_address_false"
                                />
                            </div>

                            <label
                                class="radio__label content-box__emphasis"
                                for="checkout_different_billing_address_false"
                            >
                                {{shipping.address + ' ' + shipping.postal_code + ' ' + shipping.city + ' ' + shipping.state}}
                            </label>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div> -->
        <header class="section-header">
            <h1 class="section-header__left">
                My Account (Shipping Information)
            </h1>
            <div class="section-header__right">
                <a
                    href="#!"
                    class="btn ac-custom-btn"
                    @click="toggleNewForm"
                    >Add a New Address</a
                >
            </div>
        </header>
        <hr class="hr--small" />

        <div class="grid">
            <div class="grid__item one-third medium-down--one-whole">
                <p><a href="/dashboard">Return to Account Details</a></p>
            </div>
            <div class="grid__item two-thirds medium-down--one-whole">
                <h2>Your Addresses</h2>
                <shipping-form-component v-if="newAddress" :toggleNewForm="toggleNewForm"/>
                <span>
                    <h3>Dev5 Oasis</h3>

                    <p>
                        <br />
                        SSQ9 River Port Onitsha.<br />
                        Onitsha<br />

                        AN<br />

                        430254<br />
                        Nigeria<br />
                        +2348166266824
                    </p>
                    <p class="pb-30">
                        <a
                            href="#"
                            @click="toggleFormEdit"
                            >Edit</a
                        >
                        |
                        <a
                            href="#"
                            onclick='Shopify.CustomerAddress.destroy(6758427754531, "Are you sure you wish to delete this address?"); return false'
                            >Delete</a
                        >
                    </p>
                    <shipping-form-component v-if="editAddress" @cancelEdit="cancelEdit($event)" :editAddress="editAddress"/>
                </span>
               
                <!-- <span>
                    <h3>Amaizu Somtoo (Default)</h3>

                    <p>
                        <br />
                        SSQ9 River Port Onitsha.<br />
                        Onitsha<br />

                        AB<br />

                        430254<br />
                        Nigeria<br />
                        +2347087917557
                    </p>
                    <p>
                        <a
                            href="#"
                            onclick="Shopify.CustomerAddress.toggleForm(6758445842467); return false"
                            >Edit</a
                        >
                        |
                        <a
                            href="#"
                            onclick='Shopify.CustomerAddress.destroy(6758445842467, "Are you sure you wish to delete this address?"); return false'
                            >Delete</a
                        >
                    </p>
                </span> -->
                 

            </div>
        </div>
    </div>
</template>
<script>
import ShippingFormComponent from './ShippingFormComponent.vue';
    export default {
    components: { ShippingFormComponent },
        data() {
            return {
                editAddress: false,
                newAddress: false,
                shippingAddrs: [],
            };
        },
        methods: {
            cancelEdit(e) {
                this.editAddress = e;
            },
            getShippingAddr() {
                axios
                    .get(`api/shipping/${this.$store.state.user.id}`)
                    .then((res) => {
                        this.shippingAddrs = res.data.shippinginfo;
                    });
            },
            toggleFormEdit() {
                this.editAddress = !this.editAddress;
            },
            toggleNewForm() {
                this.newAddress = !this.newAddress;
            },
        },
        mounted() {
            this.getShippingAddr();
            console.log("Shipping details mounted");
        },
        name: "Shipping",
    };
</script>
<style scoped>
    .content-box {
        border: 1px solid #d9d9d9 !important;
        border-radius: 10px;
        padding: 10px;
    }
    .radio-wrapper {
        border-bottom: 1px solid #d9d9d9;
    }
    .radio__input {
        display: inline-block;
    }
    .pb-30 {
        margin-bottom: 25px;
    }
    /*  */
</style>