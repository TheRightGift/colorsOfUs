<template>
    <div>
        <h5 class="ptb--60">Choose default shipping address</h5>
        <p>You will be able to add a new shipping address on your next checkout</p>
        <div class="row">
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
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                shippingAddrs: [],
            };
        },
        methods: {
            getShippingAddr() {
                axios
                    .get(`api/shipping/${this.$store.state.user.id}`)
                    .then((res) => {
                        this.shippingAddrs = res.data.shippinginfo;
                    });
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
    /*  */
</style>