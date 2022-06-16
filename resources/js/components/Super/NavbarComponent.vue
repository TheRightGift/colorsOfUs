<template>
    <div>
        <!-- Topbar -->
        <nav
            class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
        >
            <!-- Sidebar Toggle (Topbar) -->
            <button
                id="sidebarToggleTop"
                class="btn btn-link d-md-none rounded-circle mr-3"
            >
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <!-- <search-component @resized="mobileDemo" @value="getQuery" v-if="resize == false"/> -->

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <!-- <li class="nav-item dropdown no-arrow d-sm-none">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="searchDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown"
                    >
                       <search-component @resized="mobileDemo" @value="getQuery" v-if="resize" />
                    </div>
                </li> -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="alertsDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <i class="fas fa-bell fa-fw"></i>
                        <!-- Counter - Alerts -->
                        <span
                            v-if="msgLength >= 3"
                            class="badge badge-danger badge-counter"
                            >3+</span
                        >
                        <span
                            v-if="msgLength <= 2 && msgLength != 0"
                            class="badge badge-danger badge-counter"
                            >{{ msgLength }}</span
                        >
                        <!--  -->
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div
                        class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown"
                    >
                        <h6 class="dropdown-header bg-danger">Alerts Center</h6>
                        <a
                            class="dropdown-item d-flex align-items-center"
                            href="#"
                            v-for="message in messages"
                            :key="message._id"
                        >
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">
                                    {{
                                        moment(message.created_at).format(
                                            "lll"
                                        )
                                    }}
                                </div>
                                <span
                                    :class="{
                                        'font-weight-bold': message.track == '0',
                                    }"
                                    >{{ message.message.slice(0, 28) }}...</span
                                >
                                
                            </div>
                        </a>
                        <a
                            class="dropdown-item text-center small text-gray-500"
                            href="/message"
                            >Show All Alerts</a
                        >
                    </div>
                
                </li>
                
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="userDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <span
                            class="mr-2 d-none d-lg-inline text-gray-600 small"
                            >{{$store.state.user.firstname}}</span
                        >
                        <img
                            class="img-profile rounded-circle"
                            src="/img/undraw_profile.svg"
                        />
                    </a>
                    <!-- Dropdown - User Information -->
                    <div
                        class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown"
                    >
                        <a class="dropdown-item" href="/profile">
                            <i
                                class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"
                            ></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a
                            class="dropdown-item"
                            href="#"
                            data-toggle="modal"
                            data-target="#logoutModal"
                        >
                            <i
                                class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                            ></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Logout Modal-->
        <div
            class="modal fade"
            id="logoutModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Ready to Leave?
                        </h5>
                        <button
                            class="close"
                            type="button"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Select "Logout" below if you are ready to end your
                        current session.
                    </div>
                    <div class="modal-footer">
                        <button
                            class="btn btn-secondary"
                            type="button"
                            data-dismiss="modal"
                        >
                            Cancel
                        </button>
                        <a class="btn btn-primary" href="#" @click="logout"
                            >Logout</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import moment from 'moment';
// import SearchComponent from './SearchComponent.vue';
export default {
    name: 'Navbar',
    // components: { SearchComponent },
    data() {
        return {
            user: '',
            messages: [],
            message: [],
            unread: [],
            resize: false,
            msgLength: 0,
        }
    },
    methods: {
        moment (arg) {
            return moment(arg);
        },
        logout () {
            axios
            .post("logout")
            .then((res) => {
                if (res.data.status == 401) {
                    this.$store.commit("logout");
                    window.location.replace("/");
                }
            })
            .catch((err) => {
                console.log(err);
            });
        },
        getNotifications() {
            let adminOn = this.$store.state.user.role_id;
            let url =
                adminOn == 2
                    ? "/api/notify-prdmin"
                    : "/api/notify";
            axios.get(url).then(res => {
                this.messages = res.data.notify.slice(0, 5);
                this.msgLength = res.data.notify.filter(el => el.track == '0').length;
            }).catch(err => {
                console.log(err);
            })
        },
    },
    mounted() {
        this.getNotifications();
    },
};
</script>
