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
                                        <div class="text-center">
                                            <img
                                                class="
                                                    img-fluid
                                                    px-3 px-sm-4
                                                    mt-3
                                                    mb-4
                                                "
                                                style="width: 25rem"
                                                src="/img/admin_posting.jpg"
                                                alt="..."
                                            />
                                        </div>
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
                                        
                                            </div>

                                            <div class="row">
                                                <!-- Earnings (Monthly) Card Example -->
                                                <div
                                                    class="
                                                        col-xl-3 col-md-6
                                                        mb-4
                                                    "
                                                >
                                                    <a
                                                        class="
                                                            card
                                                            border-left-primary
                                                            shadow
                                                            h-100
                                                            py-2
                                                        "
                                                        href="/product"
                                                    >
                                                        <div class="card-body">
                                                            <div
                                                                class="
                                                                    row
                                                                    no-gutters
                                                                    align-items-center
                                                                "
                                                            >
                                                                <div
                                                                    class="
                                                                        col
                                                                        mr-2
                                                                    "
                                                                >
                                                                    <div
                                                                        class="
                                                                            text-xs
                                                                            font-weight-bold
                                                                            text-primary
                                                                            text-uppercase
                                                                            mb-1
                                                                        "
                                                                    >
                                                                        Products
                                                                    </div>
                                                                    <div
                                                                        class="
                                                                            h5
                                                                            mb-0
                                                                            font-weight-bold
                                                                            text-gray-800
                                                                        "
                                                                    >
                                                                        {{data.res}}
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="
                                                                        col-auto
                                                                    "
                                                                >
                                                                    <i
                                                                        class="fab fa-buysellads
                                                                            fa-2x
                                                                            text-gray-300
                                                                        "
                                                                    ></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <!-- Earnings (Annual) Card Example -->
                                                <div
                                                    class="
                                                        col-xl-3 col-md-6
                                                        mb-4
                                                    "
                                                >
                                                    <a
                                                        class="
                                                            card
                                                            border-left-success
                                                            shadow
                                                            h-100
                                                            py-2
                                                        "
                                                        href="/order"
                                                    >
                                                        <div class="card-body">
                                                            <div
                                                                class="
                                                                    row
                                                                    no-gutters
                                                                    align-items-center
                                                                "
                                                            >
                                                                <div
                                                                    class="
                                                                        col
                                                                        mr-2
                                                                    "
                                                                >
                                                                    <div
                                                                        class="
                                                                            text-xs
                                                                            font-weight-bold
                                                                            text-success
                                                                            text-uppercase
                                                                            mb-1
                                                                        "
                                                                    >
                                                                        Orders
                                                                        
                                                                    </div>
                                                                    <div
                                                                        class="
                                                                            h5
                                                                            mb-0
                                                                            font-weight-bold
                                                                            text-gray-800
                                                                        "
                                                                    >
                                                                        {{data.orders}}
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="
                                                                        col-auto
                                                                    "
                                                                >
                                                                    <i
                                                                        class="
                                                                            fas
                                                                            fa-shopping-basket
                                                                            fa-2x
                                                                            text-gray-300
                                                                        "
                                                                    ></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <!-- Tasks Card Example -->
                                                <div
                                                    class="
                                                        col-xl-3 col-md-6
                                                        mb-4
                                                    "
                                                >
                                                    <a
                                                        class="
                                                            card
                                                            border-left-info
                                                            shadow
                                                            h-100
                                                            py-2
                                                        "
                                                        href="/customer"
                                                    >
                                                        <div class="card-body">
                                                            <div
                                                                class="
                                                                    row
                                                                    no-gutters
                                                                    align-items-center
                                                                "
                                                            >
                                                                <div
                                                                    class="
                                                                        col
                                                                        mr-2
                                                                    "
                                                                >
                                                                    <div
                                                                        class="
                                                                            text-xs
                                                                            font-weight-bold
                                                                            text-info
                                                                            text-uppercase
                                                                            mb-1
                                                                        "
                                                                    >
                                                                        Customers
                                                                    </div>
                                                                    <div
                                                                        class="
                                                                            row
                                                                            no-gutters
                                                                            align-items-center
                                                                        "
                                                                    >
                                                                        <div
                                                                            class="
                                                                                col-auto
                                                                            "
                                                                        >
                                                                            <div
                                                                                class="
                                                                                    h5
                                                                                    mb-0
                                                                                    mr-3
                                                                                    font-weight-bold
                                                                                    text-gray-800
                                                                                "
                                                                            >
                                                                                {{data.customers}}
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="
                                                                        col-auto
                                                                    "
                                                                >
                                                                    <i
                                                                        class="
                                                                            far fa-address-book
                                                                            fa-2x
                                                                            text-gray-300
                                                                        "
                                                                    ></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <!-- Pending Requests Card Example -->
                                                <div
                                                    class="
                                                        col-xl-3 col-md-6
                                                        mb-4
                                                    "
                                                >
                                                    <a
                                                        class="
                                                            card
                                                            border-left-warning
                                                            shadow
                                                            h-100
                                                            py-2
                                                        "
                                                        href="/admins"
                                                    >
                                                        <div class="card-body">
                                                            <div
                                                                class="
                                                                    row
                                                                    no-gutters
                                                                    align-items-center
                                                                "
                                                            >
                                                                <div
                                                                    class="
                                                                        col
                                                                        mr-2
                                                                    "
                                                                >
                                                                    <div
                                                                        class="
                                                                            text-xs
                                                                            font-weight-bold
                                                                            text-warning
                                                                            text-uppercase
                                                                            mb-1
                                                                        "
                                                                    >
                                                                        Admins
                                                                    </div>
                                                                    <div
                                                                        class="
                                                                            h5
                                                                            mb-0
                                                                            font-weight-bold
                                                                            text-gray-800
                                                                        "
                                                                    >
                                                                        {{data.admins}}
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="
                                                                        col-auto
                                                                    "
                                                                >
                                                                    <i
                                                                        class="
                                                                            fas fa-meh
                                                                            fa-2x
                                                                            text-gray-300
                                                                        "
                                                                    ></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
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
                <footer-component/>
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
            <!-- <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header d-flex">
                                <p>Dashboard</p>
                                <select class="mr-auto" v-model="actions">
                                    <option value="" selected>Actions</option>
                                    <option value="1">View Admins</option>
                                </select>    
                            </div>

                            <div class="card-body" v-if="actions == ''">
                                You are logged in! You are the SUPER ADMIN!
                            </div>
                            <div class="card-body" v-if="actions == '1'">
                                <table>
                                    <tr>
                                        <th>Name</th>
                                        <th>From</th>
                                        <th>Employment#</th>
                                        <th>Function#</th>
                                    </tr>
                                    <tr v-for="admin in admins" :key="admin.id">
                                        <td>{{admin.lastname + ' ' + admin.firstname}}</td>
                                        <td>{{admin.town}}</td>
                                        <td>{{admin.employment_id}}</td>
                                        <td>{{admin.user_type == 1 ? 'TechAdmin' : 'Admin'}}</td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
        </div> -->
        
    </div>
</template>
<script>
    import NavbarComponent from "./NavbarComponent.vue";
    import FooterComponent from "./FooterComponent.vue";
    import SidebarComponent from './SidebarComponent.vue';
    export default {
        components: { NavbarComponent, FooterComponent, SidebarComponent },
        data() {
            return {
                actions: "",
                admins: [],
                data: {},
            };
        },
        methods: {
            getAdmins() {
                axios
                    .get("api/admin")
                    .then((res) => {
                        this.admins = res.data.admins;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getHomeView() {
                axios.get('api/compactview').then(res => {
                    this.data = res.data;
                }).catch(err => {
                    console.log(err);
                })
            }
        },
        mounted() {
            this.getAdmins();
            this.getHomeView();
        },
    };
</script>
