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
                        <div v-if="$store.state.user.role_id != null">
                            <div v-if="$store.state.user.role_id == 1">
                                <order-admin-component />
                            </div>
                            <div v-else-if="$store.state.user.role_id == 2">
                                <product-admin-component />
                            </div>
                        </div>
                        <div v-else class="container">
                                <img src="/img/loading.png" class="fa-spin" alt="processing Image" width="50px" height="50px" />
                                <p class="center">Your Interface is being prepared, please check back later</p>
                                <p class="center">An alternative is to logout and login again OR Contact your superior</p>
                            
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
    import ProductAdminComponent from "./ProductAdminComponent.vue";
    import OrderAdminComponent from "./OrderAdminComponent.vue";
    export default {
        components: {
            NavbarComponent,
            FooterComponent,
            SidebarComponent,
            ProductAdminComponent,
            OrderAdminComponent,
        },
        data() {
            return {};
        },
        methods: {},
    };
</script>
<style scoped>
    .flexedItem {
        display: flex;
        justify-content: space-between;
    }
    .flexedItem img {
        height: 100px;
    }
    @media screen and (max-width: 768px) {
        .flexedItem {
            display: block;
        }
    }
    .container {
        text-align: center;
        margin-top: 25vh;
    }
</style>
<style>
    .cursor-pointer {
        cursor: pointer;
    }
</style>