<template>
    <div>
        <div class="jaliana">
            <header-component />
            <div class="">
                <div class="">
                    <!-- BREADCRUMBS SETCTION START -->

                    <div class="ht__bradcaump__area">
                        <div class="ht__bradcaump__wrap">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div
                                            class="bradcaump__inner text-center"
                                        >
                                            <h2 class="bradcaump-title">
                                                Contact
                                            </h2>
                                            <nav class="bradcaump-inner">
                                                <nav
                                                    class=""
                                                    role="navigation"
                                                    aria-label="breadcrumbs"
                                                >
                                                    <ul class="breadcrumb-list">
                                                        <li>
                                                            <a
                                                                href="/"
                                                                title="Back to the home page"
                                                                >Home</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <span>Contact</span>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BREADCRUMBS SETCTION END -->

                    <main role="main">
                        <div
                            id="shopify-section-contact-template"
                            class="shopify-section"
                        >
                            <!-- Start Contact Area -->
                            <section
                                class="htc__contact__area ptb--120 bg__white"
                            >
                                <div class="container">
                                    <div class="row">
                                        <div
                                            class="col-md-6 col-sm-12 col-xs-12"
                                        >
                                            <div
                                                class="htc__contact__container"
                                            >
                                                <div
                                                    class="
                                                        htc__contact__address
                                                    "
                                                >
                                                    <h2 class="contact__title">
                                                        contact info
                                                    </h2>
                                                    <div
                                                        class="
                                                            contact__address__inner
                                                        "
                                                    >
                                                        <!-- Start Single Adress -->
                                                        <div
                                                            class="
                                                                single__contact__address
                                                            "
                                                        >
                                                            <div
                                                                class="
                                                                    contact__icon
                                                                "
                                                            >
                                                                <span
                                                                    class="
                                                                        ti-location-pin
                                                                    "
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="
                                                                    contact__details
                                                                "
                                                            >
                                                                <p>
                                                                    Location :
                                                                    <br />
                                                                    Colorsofus House 1 Ikeja
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!-- End Single Adress -->
                                                    </div>
                                                    <div
                                                        class="
                                                            contact__address__inner
                                                        "
                                                    >
                                                        <!-- Start Single Adress -->
                                                        <div
                                                            class="
                                                                single__contact__address
                                                            "
                                                        >
                                                            <div
                                                                class="
                                                                    contact__icon
                                                                "
                                                            >
                                                                <span
                                                                    class="
                                                                        ti-mobile
                                                                    "
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="
                                                                    contact__details
                                                                "
                                                            >
                                                                <p>
                                                                    Phone :
                                                                    <br />
                                                                    <a href="#"
                                                                        >+00 111
                                                                        222 333
                                                                        44</a
                                                                    >
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!-- End Single Adress -->
                                                        <!-- Start Single Adress -->
                                                        <div
                                                            class="
                                                                single__contact__address
                                                            "
                                                        >
                                                            <div
                                                                class="
                                                                    contact__icon
                                                                "
                                                            >
                                                                <span
                                                                    class="
                                                                        ti-email
                                                                    "
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="
                                                                    contact__details
                                                                "
                                                            >
                                                                <p>
                                                                    Mail :
                                                                    <br />
                                                                    <a href="#"
                                                                        >colorsofus@gmail.com</a
                                                                    >
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!-- End Single Adress -->
                                                    </div>
                                                </div>

                                                <div class="contact-form-wrap">
                                                    <div class="contact-title">
                                                        <h2
                                                            class="
                                                                contact__title
                                                            "
                                                        >
                                                            Get In Touch
                                                        </h2>
                                                    </div>
                                                    <form
                                                        @submit.prevent="sendMail"
                                                        id="contact_form"
                                                        accept-charset="UTF-8"
                                                        class="contact-form"
                                                    >
                                                        <input
                                                            type="hidden"
                                                            name="form_type"
                                                            value="contact"
                                                        /><input
                                                            type="hidden"
                                                            name="utf8"
                                                            value="✓"
                                                        />

                                                        <div
                                                            class="
                                                                single-contact-form
                                                            "
                                                        >
                                                            <div
                                                                class="
                                                                    contact-box
                                                                    name
                                                                "
                                                            >
                                                                <input
                                                                    type="text"
                                                                    placeholder="Your name"
                                                                    v-model="mail.name"
                                                                    required
                                                                />
                                                                <input
                                                                    type="email"
                                                                    v-model="mail.email"
                                                                    placeholder="Your email"
                                                                    required
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="
                                                                single-contact-form
                                                            "
                                                        >
                                                            <div
                                                                class="
                                                                    contact-box
                                                                    subject
                                                                "
                                                            >
                                                                <input
                                                                    type="text"
                                                                    id="ContactFormSubject"
                                                                    name="contact[subject]"
                                                                    placeholder="Subject"
                                                                    v-model="mail.subject"
                                                                    required
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="
                                                                single-contact-form
                                                            "
                                                        >
                                                            <div
                                                                class="
                                                                    contact-box
                                                                    message
                                                                "
                                                            >
                                                                <textarea
                                                                    placeholder="Message"
                                                                    class="
                                                                        custom-textarea
                                                                    "
                                                                    v-model="mail.message"
                                                                    id="ContactFormMessage"
                                                                ></textarea>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="contact-btn"
                                                        >
                                                            <button
                                                                type="submit"
                                                                class="fv-btn"
                                                                :disabled="saving"
                                                            >
                                                                Send
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="
                                                col-md-6 col-sm-12 col-xs-12
                                                smt-60
                                                xmt-60
                                            "
                                        >
                                            <div class="map-contacts">
                                                <div id="googleMap"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- End Contact Area -->

                            <!-- Google Map js -->
                            
                        </div>
                    </main>
                    <footer-component/>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import FooterComponent from './FooterComponent.vue';
    import HeaderComponent from "./HeaderComponent.vue";
    export default {
        components: { HeaderComponent, FooterComponent },
        data() {
            return {
                success: false,
                saving: false,
                mail: {
                    email: '',
                    name: '',
                    message: '',
                    subject: ''
                }
            }
        },
        methods: {
            sendMail(){
                this.saving = true
                axios.post('api/contact-us', this.mail)
                .then(response => {
                    this.success = response.data[0]
                    setTimeout(() => {
                        this.$router.go()
                    }, 3000)
                })
                .catch(error => {
                    // console.log(error);
                    this.saving = false
                })
            }
        },
    };
</script>