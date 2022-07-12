<template>
    <div>
        <div class="jalaina">
            <div class="">
                <header-component />
                <main role="main">
                    <div class="htc__login__register bg__white ptb--130">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="htc__login__register__wrap">
                                        <div
                                            id="login"
                                            role="tabpanel"
                                            class="
                                                single__tabs__panel
                                                login
                                                tab-pane
                                                fade
                                                in
                                                active
                                            "
                                        >
                                            <div id="CustomerLoginForm">
                                                <div
                                                    class="code text-center"
                                                    v-if="
                                                        defaults.reset == false
                                                    "
                                                >
                                                    <p>
                                                        Code has expired or not
                                                        Found
                                                    </p>
                                                </div>
                                                <div
                                                    v-else-if="
                                                        defaults.reset == true
                                                    "
                                                >
                                                    <h1 class="active">Reset Password</h1>
                                                    <div
                                                        id="RecoverPasswordForm"
                                                    >
                                                        <p
                                                            class="success"
                                                            v-if="success != ''"
                                                            name="utf8"
                                                        >
                                                            {{ "✓" + success }}
                                                        </p>
                                                        <div
                                                            class="errors"
                                                            v-if="error != ''"
                                                        >
                                                            <ul>
                                                                <li>
                                                                    {{ error }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <form
                                                            id="customer_login"
                                                            accept-charset="UTF-8"
                                                            @submit.prevent="
                                                                reset
                                                            "
                                                        >
                                                            <input
                                                                type="hidden"
                                                                name="form_type"
                                                                value="recover_customer_password"
                                                            /><input
                                                                type="hidden"
                                                                name="utf8"
                                                                value="✓"
                                                            />

                                                            <input
                                                                type="email"
                                                                id="RecoverEmail"
                                                                class="
                                                                    input-full
                                                                "
                                                                placeholder="Email"
                                                                autocorrect="off"
                                                                autocapitalize="off"
                                                                v-model="
                                                                    user.email
                                                                "
                                                            />
                                                            <p
                                                                class="errors"
                                                                v-if="
                                                                    errors.email
                                                                "
                                                            >
                                                                <span
                                                                    v-for="(
                                                                        error,
                                                                        index
                                                                    ) in errors.email"
                                                                    :key="index"
                                                                >
                                                                    {{ error }}
                                                                </span>
                                                            </p>

                                                            <label
                                                                for="CreatePassword"
                                                                class="
                                                                    hidden-label
                                                                "
                                                                >Password</label
                                                            >
                                                            <input
                                                                type="password"
                                                                id="CreatePassword"
                                                                class="
                                                                    input-full
                                                                "
                                                                required
                                                                placeholder="Password"
                                                                v-model="
                                                                    user.password
                                                                "
                                                            />

                                                            <label
                                                                for="CreatePassword"
                                                                class="
                                                                    hidden-label
                                                                "
                                                                >Password</label
                                                            >
                                                            <input
                                                                type="password"
                                                                class="
                                                                    input-full
                                                                "
                                                                required
                                                                placeholder="Confirm Password"
                                                                v-model="
                                                                    user.password_confirmation
                                                                "
                                                            />
                                                            <p
                                                                class="errors"
                                                                v-if="
                                                                    errors.length != ''
                                                                "
                                                            >
                                                                <span
                                                                    v-for="(
                                                                        error,
                                                                        index
                                                                    ) in errors"
                                                                    :key="index"
                                                                >
                                                                    {{ error.password }}
                                                                </span>
                                                            </p>

                                                            <div
                                                                class="
                                                                    htc__login__btn
                                                                    mt--30
                                                                "
                                                            >
                                                                <button
                                                                    type="submit"
                                                                    :disabled="
                                                                        requesting
                                                                    "
                                                                >
                                                                    <i
                                                                        v-if="
                                                                            requesting
                                                                        "
                                                                        class="
                                                                            fa
                                                                            fa-circle-o-notch
                                                                            fa-spin
                                                                            fa-fw
                                                                        "
                                                                        aria-hidden="true"
                                                                    ></i>
                                                                    Reset
                                                                </button>
                                                            </div>
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
                </main>
                <footer-component />
            </div>
        </div>
    </div>
</template>
<script>
    import FooterComponent from "./FooterComponent.vue";
    import HeaderComponent from "./HeaderComponent.vue";
    export default {
        components: { HeaderComponent, FooterComponent },
        data() {
            return {
                defaults: { reset: false },
                errors: [],
                error: "",
                requesting: false,
                success: "",
                user: {
                    email: "",
                    password: "",
                    password_confirmation: "",
                    token: "",
                },
            };
        },
        methods: {
            checkCode() {
                let code = window.location.href.split("/").pop();
                if (code != "") {
                    this.defaults.reset = true;
                    this.user.token = code;
                }
            },
            reset() {
                this.requesting = true;
                if (this.user.password == this.user.password_confirmation) {
                    this.errors = [];
                    axios
                        .post("/api/reset-password", this.user)
                        .then((res) => {
                            if (res.data.status == null) {
                                this.success = res.data.message;
                                this.error = "";
                                this.requesting = false;
                                this.user.email = "";
                                this.user.password = "";
                                this.user.password_confirmation = "";
                            }
                            else {
                                this.error = 'Please check your internet connection and try again!';
                            }
                            if (res.data.status == 204) {
                                this.requesting = false;
                                this.error = res.data.message;
                            }
                            if (res.status == 422) {
                                this.requesting = false;
                                this.errors = res.data.error;
                            }
                        })
                        .catch((err) => {
                            console.log(err, err.status);
                        });
                } else {
                    this.errors = [];
                    this.errors.push({ password: "Password does not match" });
                    this.requesting = false;
                }
            },
        },
        mounted() {
            this.checkCode();
        },
    };
</script>
<style scoped>
    .error {
        color: #ff3e6c;
        text-align: justify;
        font-size: 1.2em;
    }
    .active {
        color: #f2b8c9;
    }
</style>