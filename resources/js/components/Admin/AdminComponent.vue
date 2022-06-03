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
                        <div v-if="$store.state.user.role_id == 1">
                            <order-admin-component />
                        </div>
                        <div v-else-if="$store.state.user.role_id == 2">
                            <product-admin-component />
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
</style>
<style>
    .cursor-pointer {
        cursor: pointer;
    }
</style>