<template>
    <div>
        <div id="wrapper">
            <sidebar-component />
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <navbar-component />
                    <admin-super-handle v-if="user.user_type == 3 || user.user_type == 2" :user="user"/>


                    <!-- <admin-tech-handle v-if="$store.state.user.user_type == 2"/> -->
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
import AdminTechHandle from '../AdminTech/AdminTechHandle.vue'
import AdminSuperHandle from './AdminSuperHandle.vue'
import FooterComponent from './FooterComponent.vue'
import NavbarComponent from './NavbarComponent.vue'
import SidebarComponent from './SidebarComponent.vue'

export default {
    components: { AdminSuperHandle, AdminTechHandle, NavbarComponent, FooterComponent, SidebarComponent },
    data() {
        return {
            user: {}
        }
    },
    methods: {
        getUser() {
            axios.get("api/user").then((res) => {
                this.user = res.data;
            });
        },
    },
    mounted() {
        this.getUser();
    }
}
</script>,
        