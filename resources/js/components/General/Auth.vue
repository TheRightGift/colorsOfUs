<template>
    <div>
        <div class="jalaina">
            <div class="">
                <header-component />
                <div class="">
                    <main role="main">
                        <!-- Start Login Register Area -->
                        <div class="htc__login__register bg__white ptb--130">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <ul
                                            class="login__register__menu"
                                            role="tablist"
                                        >
                                            <li
                                                role="presentation"
                                                class="login active"
                                            >
                                                <a
                                                    href="#login"
                                                    role="tab"
                                                    data-toggle="tab"
                                                    >Login</a
                                                >
                                            </li>
                                            <li
                                                role="presentation"
                                                class="register"
                                            >
                                                <a
                                                    href="#register"
                                                    role="tab"
                                                    data-toggle="tab"
                                                    >Register</a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Start Login Register Content -->
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="htc__login__register__wrap">
                                            <!-- Start Single Content -->
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
                                                    <form
                                                        id="customer_login"
                                                        accept-charset="UTF-8"
                                                        @submit.prevent="login"
                                                    >
                                                        <input
                                                            type="hidden"
                                                            name="form_type"
                                                            value="customer_login"
                                                        />
                                                        <p
                                                            class="success"
                                                            v-if="success != ''"
                                                            name="utf8"
                                                        >
                                                            {{ "✓" + success }}
                                                        </p>
                                                        <div
                                                            class="errors"
                                                            v-if="
                                                                emailError != ''
                                                            "
                                                        >
                                                            <ul>
                                                                <li>
                                                                    {{
                                                                        emailError
                                                                    }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <input
                                                            type="email"
                                                            id="CustomerEmail"
                                                            class="input-full"
                                                            placeholder="Email"
                                                            autocorrect="off"
                                                            autocapitalize="off"
                                                            autofocus
                                                            v-model="user.email"
                                                        />

                                                        <input
                                                            type="password"
                                                            id="CustomerPassword"
                                                            class="input-full"
                                                            placeholder="Password"
                                                            v-model="
                                                                user.password
                                                            "
                                                        />

                                                        <div
                                                            class="
                                                                tabs__checkbox
                                                            "
                                                        >
                                                            <span
                                                                class="forget"
                                                            >
                                                                <a
                                                                    href="#recover"
                                                                    id="RecoverPassword"
                                                                    >Forgot your
                                                                    password?</a
                                                                >
                                                            </span>
                                                        </div>
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
                                                                Sign In
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div
                                                    id="RecoverPasswordForm"
                                                    style="display: none"
                                                >
                                                    <form
                                                        accept-charset="UTF-8"
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
                                                            class="input-full"
                                                            placeholder="Email"
                                                            autocorrect="off"
                                                            autocapitalize="off"
                                                            v-model="user.email"
                                                        />
                                                        <div
                                                            class="
                                                                tabs__checkbox
                                                            "
                                                        >
                                                            <span
                                                                class="forget"
                                                            >
                                                                <a
                                                                    href="#"
                                                                    id="HideRecoverPasswordLink"
                                                                    >Cancel</a
                                                                >
                                                            </span>
                                                        </div>
                                                        <div
                                                            class="
                                                                htc__login__btn
                                                                mt--30
                                                            "
                                                        >
                                                            <button
                                                                type="submit"
                                                            >
                                                                Submit
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div
                                                id="register"
                                                role="tabpanel"
                                                class="
                                                    single__tabs__panel
                                                    tab-pane
                                                    fade
                                                    login
                                                "
                                            >
                                                <form
                                                    id="create_customer"
                                                    accept-charset="UTF-8"
                                                    @submit.prevent="register"
                                                >
                                                    <input
                                                        type="hidden"
                                                        name="form_type"
                                                        value="create_customer"
                                                    />
                                                    <p
                                                        v-if="success != ''"
                                                        name="utf8"
                                                        class="success"
                                                    >
                                                        {{ "✓" + success }}
                                                    </p>

                                                    <label
                                                        for="FirstName"
                                                        class="hidden-label"
                                                        >First Name</label
                                                    >
                                                    <input
                                                        type="text"
                                                        id="FirstName"
                                                        class="input-full"
                                                        required
                                                        placeholder="First Name"
                                                        autocapitalize="words"
                                                        autofocus
                                                        v-model="user.firstname"
                                                    />

                                                    <label
                                                        for="LastName"
                                                        class="hidden-label"
                                                        >Last Name</label
                                                    >
                                                    <input
                                                        type="text"
                                                        id="LastName"
                                                        class="input-full"
                                                        required
                                                        placeholder="Last Name"
                                                        autocapitalize="words"
                                                        v-model="user.lastname"
                                                    />

                                                    <label
                                                        for="Email"
                                                        class="hidden-label"
                                                        >Email</label
                                                    >
                                                    <input
                                                        type="email"
                                                        id="Email"
                                                        class="input-full"
                                                        required
                                                        placeholder="Email"
                                                        autocorrect="off"
                                                        autocapitalize="off"
                                                        v-model="user.email"
                                                    />
                                                    <p
                                                        class="errors"
                                                        v-if="errors.email"
                                                    >
                                                        <span
                                                            v-for="(
                                                                error, index
                                                            ) in errors.email"
                                                            :key="index"
                                                        >
                                                            {{ error }}
                                                        </span>
                                                    </p>

                                                    <label
                                                        for="CreatePassword"
                                                        class="hidden-label"
                                                        >Password</label
                                                    >
                                                    <input
                                                        type="password"
                                                        id="CreatePassword"
                                                        class="input-full"
                                                        required
                                                        placeholder="Password"
                                                        v-model="user.password"
                                                    />

                                                    <label
                                                        for="CreatePassword"
                                                        class="hidden-label"
                                                        >Password</label
                                                    >
                                                    <input
                                                        type="password"
                                                        class="input-full"
                                                        required
                                                        placeholder="Confirm Password"
                                                        v-model="
                                                            user.password_confirmation
                                                        "
                                                    />
                                                    <p
                                                        class="errors"
                                                        v-if="errors.password"
                                                    >
                                                        <span
                                                            v-for="(
                                                                error, index
                                                            ) in errors.password"
                                                            :key="index"
                                                        >
                                                            {{ error }}
                                                        </span>
                                                    </p>
                                                    <div
                                                        class="
                                                            htc__login__btn
                                                            mt--20
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
                                                            {{
                                                                requesting
                                                                    ? "Creating"
                                                                    : "Create"
                                                            }}
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Login Register Content -->
                            </div>
                        </div>
                        <!-- End Login Register Area -->
                    </main>
                    <footer-component />
                </div>
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
                emailError: "",
                errors: [],
                error: "",
                requesting: false,
                success: "",
                user: {
                    email: "",
                    password: "",
                    password_confirmation: "",
                    user_type: 0,
                    firstname: "",
                    lastname: "",
                },
            };
        },
        methods: {
            login() {
                this.requesting = true;
                axios
                    .post("login", {
                        email: this.user.email,
                        password: this.user.password,
                    })
                    .then((res) => {
                        this.emailError = res.data.email;
                        if (res.data.status == "ok") {
                            this.emailError = "";
                            this.success = "Account Validated!";
                            localStorage.setItem("intended", res.data.intended);
                            this.$store.commit("loggedIn", res.data.token);
                            this.$store.commit("saveUser", res.data.user);
                            const expr = res.data.intended;
                            let power = 0;
                            switch (expr) {
                                case "dashboard":
                                    power;
                                    break;
                                case "admin":
                                    power = 1;
                                    break;
                                case "tech_admin": 
                                    power = 2;
                                    break;
                                case "super":
                                    power = 3;
                                    break;
                                default:
                                    console.log(`Sorry, we are out of ${expr}.`);
                            }

                            this.$store.commit("rewop", power);
                            power == 0 ? window.location.href = "/" : window.location.href = `/${expr}`;
                        } else {
                            this.requesting = false;
                        }
                    })
                    .catch((err) => {
                        this.requesting = false;
                        console.log(err);
                    });
            },
            register() {
                this.requesting = true;
                this.error = "";
                this.errors = [];
                if (this.user.user_type == 0) {
                    axios
                        .post("api/basic.auth0", this.user)
                        .then((res) => {
                            console.log(res, res.data.status);
                            if (res.data.status == 200) {
                                this.success =
                                    "Please check your email to confirm your account!";
                                this.requesting = false;
                                this.user.email = "";
                                this.user.password = "";
                                this.user.password_confirmation = "";
                                this.user.firstname = "";
                                this.user.lastname = "";
                            }
                            if (res.data.error) {
                                this.requesting = false;
                                this.errors = res.data.error;
                            }
                        })
                        .catch((err) => {
                            console.log(err, err.status);
                        });
                } else if (this.user.user_type == 3) {
                    axios
                        .post("/api/basic.auth3", this.user)
                        .then((res) => {
                            if (res.data.status == 200) {
                                this.success =
                                    "Account creation successful, Please login!";
                                this.requesting = false;
                                this.user.email = "";
                                this.user.password = "";
                                this.user.password_confirmation = "";
                                this.user.firstname = "";
                                this.user.lastname = "";
                            }
                            if (res.data.error) {
                                this.requesting = false;
                                this.errors = res.data.error;
                            }
                        })
                        .catch((err) => {
                            console.log(err);
                        });
                }
            },
            checkAdmin() {
                location.pathname === "/sbminbackoffice"
                    ? (this.user.user_type = 3)
                    : this.user.user_type;
            },
        },
        mounted() {
            this.checkAdmin();
        },
    };
</script>