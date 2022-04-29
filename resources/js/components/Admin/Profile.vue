<template>
    <div>
        <!-- Page Wrapper -->
        <div id="wrapper">
            <sidebar-component />
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <navbar-component />

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div
                            class="
                                d-sm-flex
                                align-items-center
                                justify-content-between
                                mb-4
                            "
                        >
                            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                        </div>
                        <!-- Content Row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Illustrations -->
                                <div class="card shadow mb-4">
                                    <div
                                        class="
                                            card-header
                                            py-3
                                            d-flex
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
                                            Details
                                        </h6>
                                    </div>

                                    <div class="card-body">
                                        <div class="row" v-if="!passwordChg">
                                            <div class="col-md-6">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <div
                                                            class="
                                                                d-flex
                                                                justify-content-between
                                                            "
                                                        >
                                                            <h5>
                                                                Password Change
                                                            </h5>
                                                            <i
                                                                class="
                                                                    fas
                                                                    fa-key fa-2x
                                                                    cursor-pointer
                                                                "
                                                                @click="
                                                                    (passwordChg = true),
                                                                        (profile = false)
                                                                "
                                                            ></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        Make changes to your
                                                        password, click on the
                                                        lock key to change your
                                                        previous password.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="card shadow"
                                            v-if="passwordChg"
                                        >
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h5>
                                                        {{
                                                            update
                                                                ? "Edit Profile"
                                                                : "Update Profile"
                                                        }}
                                                    </h5>
                                                </div>
                                                <div
                                                    class="
                                                        bg-success
                                                        text-white
                                                    "
                                                    v-if="success != ''"
                                                >
                                                    {{ success }}
                                                </div>
                                                <form
                                                    class="w-full max-w-lg"
                                                    @submit.prevent="
                                                        requestPassChg
                                                    "
                                                >
                                                    <div class="form-row">
                                                        <div
                                                            class="
                                                                form-group
                                                                col-md-12
                                                            "
                                                        >
                                                            <label
                                                                for="grid-password"
                                                            >
                                                                Password
                                                            </label>
                                                            <input
                                                                class="
                                                                    form-control
                                                                "
                                                                id="grid-password"
                                                                type="password"
                                                                placeholder="*******"
                                                                v-model="
                                                                    user.currentPass
                                                                "
                                                                required
                                                            />
                                                        </div>
                                                        <div
                                                            class="
                                                                form-group
                                                                col-md-12
                                                            "
                                                        >
                                                            <label
                                                                for="grid-newPass"
                                                                >New
                                                                Password</label
                                                            >
                                                            <input
                                                                class="
                                                                    form-control
                                                                "
                                                                id="grid-newPass"
                                                                type="password"
                                                                placeholder="New Password"
                                                                v-model="
                                                                    user.newPass
                                                                "
                                                                required
                                                            />
                                                        </div>
                                                        <div
                                                            class="
                                                                form-group
                                                                col-md-12
                                                            "
                                                        >
                                                            <label
                                                                for="grid-newpass"
                                                                >Confirm New
                                                                Password</label
                                                            >
                                                            <input
                                                                class="
                                                                    form-control
                                                                "
                                                                id="grid-newpass"
                                                                type="password"
                                                                placeholder="Confirm New Password"
                                                                v-model="
                                                                    user.password_confirmation
                                                                "
                                                                required
                                                            />
                                                        </div>
                                                    </div>
                                                    <button
                                                        type="submit"
                                                        class="btn btn-primary"
                                                        :disabled="requesting"
                                                    >
                                                        <i
                                                            class="
                                                                fas
                                                                fa-spinner
                                                                fa-spin
                                                            "
                                                            v-if="requesting"
                                                        ></i>
                                                        Submit
                                                    </button>
                                                    <button
                                                        @click="changePass"
                                                        class="
                                                            btn btn-secondary
                                                        "
                                                    >
                                                        Cancel
                                                    </button>
                                                </form>
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
</template>
<script>
    import NavbarComponent from "../Super/NavbarComponent.vue";
    import FooterComponent from "../Super/FooterComponent.vue";
    import SidebarComponent from "../Super/SidebarComponent.vue";
    export default {
        name: "Profile",
        components: {
            NavbarComponent,
            FooterComponent,
            SidebarComponent,
        },
        data() {
            return {
                passwordChg: false,
                requesting: false,
                successMessage: "",
                success: false,
                errors: [],
                errorMessage: "",
                errorMsg: false,
                update: false,
                user: {},
            };
        },
        methods: {
            changePass() {
                this.passwordChg = !this.passwordChg;
            },
            successState(msg, successMsg) {
                this.success = msg;
                this.successMessage = successMsg;
            },
            errAndLogState(errMsg, errorMsg) {
                this.errorMsg = errMsg;
                this.errorMessage = errorMsg;
            },
            requestPassChg() {
                this.requesting = true;
                this.error = "";
                if (
                    this.user.newPass == this.user.password_confirmation &&
                    this.user.newPass.length >= 8
                ) {
                    axios
                        .patch("api/changePass", this.user)
                        .then((res) => {
                            if (res.data.user == true) {
                                this.success = res.data.message;
                                this.user = {};
                                setTimeout(() => {
                                    this.success = "";
                                    this.requesting = false;
                                }, 2000);
                            } else if (res.data.error == 401) {
                                this.error =
                                    "Please enter your password correctly!";
                            }
                        })
                        .catch((err) => {
                            console.log(err);
                        });
                    setTimeout(() => {
                        this.success = "";
                        this.error = "";
                        this.requesting = false;
                    }, 2000);
                } else {
                    this.requesting = false;
                    this.error =
                        "Confirm Password does not match OR Password does meet minimum of 8 Length!.";
                }
            },
        },
    };
</script>
<style scoped>
</style>