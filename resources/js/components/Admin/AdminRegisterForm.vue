<template>
    <div>
        <div class="card shadow">
            <div class="card-body">
                <div
                    v-if="success || errorMsg"
                    class="
                        d-flex
                        items-center
                         text-sm
                        font-bold
                        px-4
                        py-1
                    "
                    :class="{
                        'bg-success': success,
                        'bg-danger': errorMsg,
                    }"
                >
                    <svg
                        class="fill-current w-4 h-4 mr-2"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        style="height: 20px"
                    >
                        <path
                            d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"
                        />
                    </svg>
                    <p v-if="success" class="m-0 p-1 text-white">{{ successMessage }}.</p>
                    <p v-if="errorMsg" class="m-0 p-1 text-white">{{ errorMessage }}.</p>
                </div>
                <form
                    id="adminRegisterForm"
                    class="w-full max-w-lg"
                    enctype="multipart/form-data"
                    @submit.prevent="create"
                >
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="grid-firstname"> Firstname </label>
                            <input
                                class="form-control"
                                id="grid-firstname"
                                type="text"
                                placeholder="Amalugo"
                                v-model="admin.firstname"
                                required
                            />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="grid-lastname">Lastname</label>
                            <input
                                class="form-control"
                                id="grid-lastname"
                                type="text"
                                placeholder="Eg. Onanenyi"
                                v-model="admin.lastname"
                                required
                            />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="grid-othername">Othername</label>
                            <input
                                class="form-control"
                                id="grid-othername"
                                type="text"
                                placeholder="Othername"
                                v-model="admin.othername"
                            />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="grid-phone"> Phone </label>
                            <input
                                class="form-control"
                                id="grid-phone"
                                type="text"
                                placeholder="Phone"
                                v-model="admin.phone"
                                required
                            />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="grid-phone2">Phone 2</label>
                            <input
                                class="form-control"
                                id="grid-phone2"
                                type="text"
                                placeholder="Phone 2"
                                v-model="admin.phone2"
                            />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="grid-username">Username</label>
                            <input
                                class="form-control"
                                id="grid-username"
                                type="text"
                                placeholder="Username"
                                v-model="admin.username"
                            />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="state">Select State</label>
                            <span class="danger">*</span>
                            <select
                                v-model="admin.state"
                                class="form-control"
                                @change="sortLgas"
                                required
                            >
                                <option value="null" disabled selected>
                                    Select state
                                </option>
                                <option
                                    v-for="state in states"
                                    :key="state.id"
                                    :value="state.id"
                                >
                                    {{ state.name }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lga"
                                >Select Local Government Area</label
                            >
                            <span class="danger">*</span>
                            <select
                                id="inputLGA"
                                class="form-control"
                                v-model="admin.lga"
                                required
                            >
                                <option selected disabled>Choose...</option>
                                <option
                                    v-for="lga in lgaSorted"
                                    :key="lga.id"
                                    :value="lga.id"
                                >
                                    {{ lga.name }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="grid-address">Address</label>
                            <input
                                class="form-control"
                                id="grid-address"
                                type="text"
                                placeholder="Address"
                                v-model="admin.address"
                                required
                            />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <p>
                                <label for="inputGender">Gender</label>
                            </p>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="gender"
                                    value="M"
                                    v-model="admin.gender"
                                />
                                <label
                                    class="form-check-label"
                                    for="inlineRadio1"
                                    >Male</label
                                >
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="gender"
                                    value="F"
                                    v-model="admin.gender"
                                />
                                <label
                                    class="form-check-label"
                                    for="inlineRadio2"
                                    >Female</label
                                >
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="grid-email"> Email </label>
                            <input
                                class="form-control"
                                id="grid-email"
                                type="email"
                                placeholder="buchi@gmail.com"
                                v-model="admin.email"
                                required
                                :disabled="update"
                            />
                            <p class="error text-danger" v-if="errors.email">
                                {{ errors.email }}
                            </p>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="usertype">Select Admin Type</label>
                            <span class="danger">*</span>
                            <select
                                v-model="admin.user_type"
                                class="form-control"
                                required
                            >
                                <option value="" disabled selected>
                                    Select Type of Admin
                                </option>
                                <option value="1">Administrator</option>
                                <option value="2">Technical Admin.</option>
                            </select>
                        </div>
                    </div>
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Profile Photo</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center m-t-15">
                                <input
                                    id="file-input1"
                                    type="file"
                                    ref="files"
                                    @change="previewImages"
                                />
                                <div id="preview">
                                    <img :src="typeof(admin.profile_img) == 'string' ? admin.profile_img : image" alt="" width="150px" height="300px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button
                            type="submit"
                            class="btn btn-primary"
                            :disabled="requesting"
                        >
                            <i class="fas fa-spinner fa-spin" v-if="requesting"></i>
                            {{ update ? "Update Now" : "Create" }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "AdminProfileForm",
        data() {
            return {
                admin: {
                },
                adminRegistered: false,
                states: [],
                lgas: [],
                lgaSorted: [],
                requesting: false,
                successMessage: "",
                success: false,
                errors: [],
                emailError: "",
                errorMessage: "",
                errorMsg: false,
                image: undefined,
            };
        },
        props: ['adminDet', 'update'],
        methods: {
            create() {
                let url;
                let axiosFunction;
                if (this.update == true) {
                    url = `api/admin/${this.admin.id}`;
                    axiosFunction = axios.post;
                } else {
                    url = "api/basic.auth1";
                    axiosFunction = axios.post;
                }
                this.admin.user_id = this.update ? this.admin.user.id : this.$store.state.user.id;
                this.requesting = true;
                let formData = new FormData();
                formData.append("profile_img", this.admin.profile_img);
                formData.append("lastname", this.admin.lastname);
                formData.append("firstname", this.admin.firstname);
                formData.append("othername", this.admin.othername);
                formData.append("username", this.admin.username);
                formData.append("phone", this.admin.phone);
                formData.append("address", this.admin.address);
                formData.append("phone2", this.admin.phone2);
                formData.append("user_id", this.admin.user_id);
                formData.append("lga", this.admin.lga);
                formData.append("state", this.admin.state);
                formData.append("gender", this.admin.gender);
                this.update ? null : formData.append("email", this.admin.email);
                formData.append("user_type", this.admin.user_type);
                formData.append("employment_id", this.admin.employment_id || "");
                this.update ? formData.append("_method", "put") : null;

                axiosFunction(url, formData)
                    .then((res) => {
                        if (res.data.error) {
                            this.requesting = false;
                            this.errors = res.data.error;
                        }
                        if (res.data.status == 200) {
                            window.scrollTo(5, 20);

                            this.requesting = false;
                            this.successState(
                                true,
                                this.update ? "Update Successful" : "Administrator Registered Ok. Check Email to confirm!"
                            );
                            
                            setTimeout(() => {
                                window.location.reload();
                            }, 5000);
                        }
                    })
                    .catch((err) => {
                        // this.errAndLogState(true, err);
                        console.log(err);
                        this.errAndLogState(
                            true,
                            "Network Error, Try again or refresh your browser!"
                        );
                    });
            },
            disableForm() {
                $("#adminRegisterForm input").attr("disabled", true);
                $("#adminRegisterForm select").attr("disabled", true);
                $("#adminRegisterForm button").attr('disabled', true);
            },
            successState(msg, successMsg) {
                this.success = msg;
                this.successMessage = successMsg;
            },
            errAndLogState(errMsg, errorMsg) {
                this.errorMsg = errMsg;
                this.errorMessage = errorMsg;
            },
            previewImages(event) {
                if (event.target.files.length !== 0) {
                    this.admin.profile_img = event.target.files[0];
                    this.image = URL.createObjectURL(event.target.files[0]);
                }
            },
            sortLgas() {
                this.lgaSorted = this.lgas.filter(
                    (el) => el.state_id == this.admin.state
                );
            },
            getStateLgas() {
                axios
                    .get("api/statelgas")
                    .then((res) => {
                        if (res.data.status == "ok") {
                            this.states = res.data.states;
                            this.lgas = res.data.lgas;
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
        },
        mounted() {
            this.getStateLgas();
            if (this.update) {
                this.admin = this.adminDet;
                this.admin.email = this.adminDet.user.email;
                this.admin.user_type = this.adminDet.user.user_type;
                setTimeout(() => {
                    this.sortLgas()
                }, 1000);
                this.adminDet.deleted_at != null ? this.disableForm() : null;
            }
        },
    };
</script>
<style scoped>
    .error {
        font-size: 0.9rem;
    }
</style>