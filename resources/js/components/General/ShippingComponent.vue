<template>
    <div>
        <header class="section-header">
            <h1 class="section-header__left">
               {{$store.state.user.firstname + ' ' + $store.state.user.lastname}} (Shipping Information)
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
                <shipping-form-component v-if="newAddress || editAddress" :toggleNewForm="toggleNewForm" :editAddress="editAddress" @cancelEdit="cancelEdit($event)" :inputs="inputs" @addToAddress="addToAddress($event)"/>
                <span v-for="shipping in shippingAddrs" :key="shipping.id">
                    <h3>{{shipping.firstname + ' '+ shipping.lastname}} <span v-if="shipping.active == 1">(Default)</span></h3>

                    <p>
                        <br />
                        {{shipping.address}}.<br />
                        {{shipping.lga.name}}<br />

                        {{shipping.state.name}}<br />

                        {{shipping.postal_code }}<br />
                        Nigeria<br />
                        {{shipping.phone}}
                    </p>
                    <p class="pb-30">
                        <a
                            href="#"
                            @click="toggleFormEdit(shipping)"
                            >Edit</a
                        >
                        |
                        <a
                            href="#!"
                            data-toggle="modal" data-target="#deleteAlert"
                            @click.prevent="getAddressToDel(shipping.id)"
                            >Delete</a
                        >
                    </p>
                </span>
                <span v-if="shippingAddrs.length == 0">No Shipping Address added yet!</span>
            </div>
        </div>

        <div class="modal fade" id="deleteAlert" tabindex="-1" role="dialog" aria-labelledby="deleteAlertLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <h5 class="center">Are you sure to delete?</h5>
                    <div class="flexed">
                        <a href="#!" @click="deleteAddress">Yes</a>
                        <a href="#!" id="clcik" data-dismiss="modal">No</a>
                    </div>
                </div>
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
                addressToDelete: 0,
                editAddress: false,
                inputs: {
                    state_id: "",
                    lga_id: ""
                },
                newAddress: false,
                shippingAddrs: [],
            };
        },
        methods: {
            addToAddress(evt) {
                this.shippingAddrs.unshift(evt);
            },
            cancelEdit(e) {
                this.editAddress = e;
            },
            deleteAddress() {
                axios.delete(`/api/shipping/${this.addressToDelete}`).then(res => {
                    if (res.data == '') {
                        this.shippingAddrs.splice(
                            this.shippingAddrs.findIndex(
                                (rol) => rol.id === this.addressToDelete
                            ),
                            1
                        );
                        this.$toasted.show(
                            "Shipping Address deleted!",
                            {
                                duration: 3000,
                                position: "top-right",
                            }
                        );
                        document.getElementById('clcik').click();
                    }
                    
                }).catch(err => {
                    console.log(err);
                })
            },
            getAddressToDel(addr) {
                this.addressToDelete = addr;
            },
            getShippingAddr() {
                axios
                    .get(`/api/shipping/${this.$store.state.user.user_id}`)
                    .then((res) => {
                        this.shippingAddrs = res.data.shippinginfo;
                    });
            },
            toggleFormEdit(inputs) {
                this.newAddress = false;
                this.editAddress = !this.editAddress;
                this.inputs = inputs;
            },
            toggleNewForm() {
                this.editAddress = false;
                this.newAddress = !this.newAddress;
                this.inputs = {};
            },
        },
        mounted() {
            this.getShippingAddr();
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
    .modal-content {
        padding: 15px 20px;
    }
    .flexed {
        margin-top: 20px;
        display: flex;
        justify-content: space-around;
    }
    .center {
        text-align: center;
    }
</style>