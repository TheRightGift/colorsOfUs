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
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        </div>
                        <!-- Content Row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Illustrations -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6
                                            class="
                                                m-0
                                                font-weight-bold
                                                text-primary
                                            "
                                        >
                                            Dashboard Activity
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <p
                                            class="center bg-success"
                                            v-if="success != ''"
                                        >
                                            <i class="text-white">{{
                                                success
                                            }}</i>
                                        </p>
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
                                                
                                                <div class="row">
                                                    <div
                                                        class="col-md-3"
                                                        v-for="message in messages.data"
                                                        :key="message.id"
                                                    >
                                                        <div
                                                            class="card"
                                                            v-if="
                                                                message.order !=
                                                                null
                                                            "
                                                        >
                                                            <p class="card-body">
                                                                {{
                                                                    message
                                                                        .admin
                                                                        .firstname
                                                                }}
                                                                requests that
                                                                order with id -
                                                                <span
                                                                    v-if="
                                                                        message.order !=
                                                                        null
                                                                    "
                                                                    >{{
                                                                        message
                                                                            .order
                                                                            .orderID +
                                                                        message
                                                                            .order
                                                                            .id
                                                                    }}</span
                                                                >
                                                                <button
                                                                    type="button"
                                                                    @click="
                                                                        deleteOrder(
                                                                            message
                                                                                .order
                                                                                .id
                                                                        )
                                                                    "
                                                                    class="
                                                                        btn
                                                                        btn-primary
                                                                        btn-sm
                                                                    "
                                                                    v-if="
                                                                        message.order !=
                                                                        null
                                                                    "
                                                                >
                                                                    Delete
                                                                </button>
                                                            </p>
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
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer-component />
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </div>
</template>
<script>
    import NavbarComponent from "../Super/NavbarComponent.vue";
    import FooterComponent from "../Super/FooterComponent.vue";
    import SidebarComponent from "../Super/SidebarComponent.vue";
    export default {
        components: { NavbarComponent, FooterComponent, SidebarComponent },
        data() {
            return {
                messages: [],
                success: "",
            };
        },
        methods: {
            deleteOrder(id) {
                axios
                    .delete(`api/order/${id}`)
                    .then((res) => {
                        if (res.status == 204) {
                            const findId = (rol) => rol.id === id;
                            this.success = "Order Deleted";
                            window.scroll(0, 10);
                            this.messages.data.splice(
                                this.messages.data.findIndex(findId),
                                1
                            );
                            setTimeout(() => {
                                this.success = "";
                                location.reload();
                            }, 2000);
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getNotifications() {
                axios
                    .get("api/notify")
                    .then((res) => {
                        this.messages = res.data.notify;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
        },
        mounted() {
            this.getNotifications();
        },
    };
</script>
