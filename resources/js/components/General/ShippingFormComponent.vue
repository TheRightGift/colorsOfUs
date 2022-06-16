<template>
    <div>
        <form
            @submit.prevent="shippingDetails"
            id="address_form_new"
            accept-charset="UTF-8"
        >
            <input
                type="hidden"
                name="form_type"
                value="customer_address"
            /><input type="hidden" name="utf8" value="✓" />
            <div id="AddAddress" class="form-vertical">
                <h2>
                    {{ editAddress ? "Edit Address" : "Add a New Address" }}
                </h2>

                <div class="grid">
                    <div class="grid__item one-half small--one-whole">
                        <label for="AddressFirstNameNew">First Name</label>
                        <input
                            type="text"
                            id="AddressFirstNameNew"
                            class="input-full"
                            v-model="formInputs.firstname"
                            required
                            autocapitalize="words"
                        />
                    </div>

                    <div class="grid__item one-half small--one-whole">
                        <label for="AddressLastNameNew">Last Name</label>
                        <input
                            type="text"
                            id="AddressLastNameNew"
                            class="input-full"
                            required
                            v-model="formInputs.lastname"
                            autocapitalize="words"
                        />
                    </div>
                </div>

                <label for="AddressCompanyNew">Company(Optional)</label>
                <input
                    type="text"
                    id="AddressCompanyNew"
                    class="input-full"
                    v-model="formInputs.company"
                    autocapitalize="words"
                />

                <label for="AddressAddress1New">Address1</label>
                <input
                    type="text"
                    id="AddressAddress1New"
                    class="input-full"
                    v-model="formInputs.address"
                    required
                    autocapitalize="words"
                />

                <label for="AddressAddress2New">Address2</label>
                <input
                    type="text"
                    id="AddressAddress2New"
                    class="input-full"
                    v-model="formInputs.address2"
                    autocapitalize="words"
                />

                <div class="grid">
                    <div class="grid__item large--one-half">
                        <label for="AddressCountryNew">State</label>
                        <select
                            class="input-full"
                            @change="sortByLgas"
                            v-model="formInputs.state_id"
                            required
                        >
                            <option value="">---</option>
                            <option
                                v-for="state in states"
                                :key="state.id"
                                :value="state.id"
                            >
                                {{ state.name }}
                            </option>
                        </select>
                    </div>

                    <div
                        class="grid__item large--one-half"
                        id="AddressProvinceContainerNew"
                    >
                        <label for="AddressProvinceNew">LGA</label>
                        <select
                            required
                            class="input-full"
                            :class="{ error: sorted }"
                            id="LGAID"
                            v-model="formInputs.lga_id"
                        >
                            <option disabled="">LGA</option>
                            <option
                                v-for="lga in sortLgas"
                                :key="lga.id"
                                :value="lga.id"
                            >
                                {{ lga.name }}
                            </option>
                        </select>

                        <p
                            :class="{
                                field__message: sorted,
                                'field__message--error': sorted,
                            }"
                            v-show="sorted"
                            id="error-for-province"
                        >
                            Select Local Government
                        </p>
                    </div>

                    <div class="grid__item large--one-half">
                        <label for="AddressCityNew">City</label>
                        <input
                            type="text"
                            id="AddressCityNew"
                            class="input-full"
                            v-model="formInputs.city"
                            autocapitalize="words"
                        />
                    </div>

                    <div class="grid__item large--one-half">
                        <label for="AddressZipNew">Postal/Zip Code</label>
                        <input
                            type="text"
                            required
                            class="input-full"
                            v-model="formInputs.postal_code"
                            autocapitalize="characters"
                        />
                    </div>

                    <div class="grid__item large--one-half">
                        <label for="AddressPhoneNew">Phone</label>
                        <input
                            type="tel"
                            class="input-full"
                            v-model="formInputs.phone"
                            required
                        />
                    </div>
                    <div class="grid__item large--one-half">
                        <label for="AddressPhoneNew">Phone2</label>
                        <input
                            type="tel"
                            class="input-full"
                            v-model="formInputs.phone2"
                        />
                    </div>
                </div>

                <p>
                    <input
                        type="checkbox"
                        id="address_default_address_new"
                        v-model="formInputs.active"
                        :checked="formInputs.active == '1'"
                    />
                    <label for="address_default_address_new" class="inline"
                        >Set as default address</label
                    >
                </p>

                <p>
                    <i
                        v-if="requesting"
                        class="zmdi zmdi-spinner zmdi-hc-spin"
                    ></i>
                    <input
                        type="submit"
                        class="btn ac-custom-btn"
                        :disabled="requesting"
                        :value="editAddress ? 'Update Address' : 'Add Address'"
                    />
                </p>
                <p>
                    <a
                        href="#"
                        @click="editAddress ? cancelEdit() : toggleNewForm()"
                        >Cancel</a
                    >
                </p>

                <hr />
            </div>
        </form>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                formInputs: {},
                lgas: [],
                lgaSorted: [],
                requesting: false,
                sorted: false,
                states: [],
            };
        },
        name: "ShippingForm",
        props: ["editAddress", "toggleNewForm", "inputs"],
        methods: {
            cancelEdit() {
                this.$emit("cancelEdit", false);
            },
            getStateLgas() {
                axios
                    .get("/api/statelgas")
                    .then((res) => {
                        this.states = res.data.states;
                        this.lgas = res.data.lgas;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            shippingDetails() {
                if (!this.formInputs.lga_id || this.formInputs.lga_id == "") {
                    this.sorted = true;
                    const attr = document.createAttribute("aria-invalid");
                    attr.value = "true";
                    document
                        .getElementById("LGAID")
                        .setAttribute("aria-invalid", true);
                } else {
                    this.requesting = true;
                    this.formInputs.user_id = this.$store.state.user.user_id;
                    this.formInputs.active =
                        this.formInputs.active == true ? "1" : "0";
                    let url = this.editAddress
                        ? axios.put(
                              `/api/shipping/${this.formInputs.id}`,
                              this.formInputs
                          )
                        : axios.post("/api/shipping", this.formInputs);
                    url.then((res) => {
                        if (res.data.status == "ok") {
                            this.requesting = false;
                            !this.editAddress
                                ? this.$emit("addToAddress", res.data.shippinginfo)
                                : location.reload();
                            let emptyObj = {};
                            this.formInputs = emptyObj;
                            this.cancelEdit();
                            this.$toasted.show(
                                this.editAddress
                                    ? "Shipping Address updated!"
                                    : "Shipping Address added!",
                                {
                                    duration: 3000,
                                    position: "top-right",
                                }
                            );
                        }
                        console.log(res);
                    });
                }
            },
            sortByLgas() {
                this.sortLgas;
            },
        },
        mounted() {
            this.getStateLgas();
        },
        computed: {
            sortLgas() {
                return this.lgas.filter(
                    (el) => el.state_id == this.formInputs.state_id
                );
            },
        },
        watch: {
            inputs: {
                immediate: true,
                deep: true,
                handler: function (newVal, oldVal) {
                    this.sortLgas;
                    this.formInputs = newVal;
                },
            },
            sorted: {
                immediate: true,
                handler: function () {
                    this.formInputs.lga_id != ""
                        ? (this.sorted = false)
                        : (this.sorted = true);
                },
            },
        },
    };
</script>
<style scoped>
    .field__message--error {
        color: red;
    }
</style>