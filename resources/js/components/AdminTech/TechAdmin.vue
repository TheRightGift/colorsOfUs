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
                        <!-- ============================================================== -->
                        <!-- Bread crumb and right sidebar toggle -->
                        <!-- ============================================================== -->
                        <div class="row page-titles">
                            <div class="col-md-5 align-self-center">
                                <h4 class="text-themecolor">Dashboard</h4>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End Bread crumb and right sidebar toggle -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Info box Content -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <!-- Column -->
                            <div class="col-lg-3 col-md-6">
                                <a href="/order" class="locatorS">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                ORDER
                                            </h4>
                                            <div class="text-end">
                                                <span class="text-muted"
                                                    >Orders</span
                                                >
                                                <h1 class="font-light">
                                                    {{data.orders}}
                                                </h1>
                                            </div>
                                            <!-- <span class="text-success">20%</span>
                                            <div class="progress">
                                                <div
                                                    class="progress-bar bg-success"
                                                    role="progressbar"
                                                    style="width: 20%; height: 6px"
                                                    aria-valuenow="25"
                                                    aria-valuemin="0"
                                                    aria-valuemax="100"
                                                ></div>
                                            </div> -->
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-lg-3 col-md-6">
                                <a href="/product" class="locatorS">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                PRODUCTS
                                            </h4>
                                            <div class="text-end">
                                                <span class="text-muted"
                                                    >Products</span
                                                >
                                                <h1 class="font-light">
                                                    {{data.res}}
                                                </h1>
                                            </div>
                                            <!-- <span class="text-primary">30%</span>
                                            <div class="progress">
                                                <div
                                                    class="progress-bar bg-primary"
                                                    role="progressbar"
                                                    style="width: 30%; height: 6px"
                                                    aria-valuenow="25"
                                                    aria-valuemin="0"
                                                    aria-valuemax="100"
                                                ></div>
                                            </div> -->
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-lg-3 col-md-6">
                                <a href="/customer" class="locatorS">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                CUSTOMERS
                                            </h4>
                                            <div class="text-end">
                                                <span class="text-muted"
                                                    >Customers</span
                                                >
                                                <h1 class="font-light">
                                                    {{data.customers}}
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-lg-3 col-md-6">
                                <a href="/admins" class="locatorS">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">ADMINS</h4>
                                            <div class="text-end">
                                                <span class="text-muted"
                                                    >Admins</span
                                                >
                                                <h1 class="font-light">
                                                    {{data.admins}}
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- Column -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- charts -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div
                                class="col-md-12 col-lg-8 col-sm-12 col-xs-12"
                            >
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Recent Product Ordered
                                        </h5>
                                        <div class="table-responsive m-t-30">
                                            <table
                                                class="table product-overview"
                                            >
                                                <thead>
                                                    <tr>
                                                        <th>Customer</th>
                                                        <th>Order ID</th>
                                                        <th>Photo</th>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th>Date</th>
                                                        <th>Size</th>
                                                        <th>Color</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="order in recentOrders" :key="order.id">
                                                        <td>{{order.shippinginfo.firstname + ' ' + order.shippinginfo.lastname}}</td>
                                                        <td>#{{order.orderID}}</td>
                                                        <td>
                                                            <img
                                                                v-if="order.product"
                                                                :src="order.product.images[0].url"
                                                                :alt="order.product.title"
                                                                width="80"
                                                            />
                                                        </td>
                                                        <td>{{order.product.title}}</td>
                                                        <td>{{order.quantity}}</td>
                                                        <td>{{moment(order.created_at).format('ll')}}</td>
                                                        <td>
                                                            {{
                                                                order.size_id
                                                                    ? getSize(order)
                                                                    : "-"
                                                            }}
                                                        </td>
                                                        <td>
                                                            {{
                                                                order.color_id
                                                                    ? getColor(order)
                                                                    : "-"
                                                            }}
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="
                                                                    label
                                                                    label-success
                                                                "
                                                                >Paid</span
                                                            >
                                                        </td>
                                                        <td style="display:none;">
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="
                                                                    text-inverse
                                                                    p-r-10
                                                                "
                                                                data-bs-toggle="tooltip"
                                                                title=""
                                                                data-original-title="Edit"
                                                                ><i
                                                                    class="
                                                                        ti-marker-alt
                                                                    "
                                                                ></i
                                                            ></a>
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="
                                                                    text-inverse
                                                                "
                                                                title=""
                                                                data-bs-toggle="tooltip"
                                                                data-original-title="Delete"
                                                                ><i
                                                                    class="
                                                                        ti-trash
                                                                    "
                                                                ></i
                                                            ></a>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <div class="col-lg-4 col-md-12">
                                <div class="row">
                                    <!-- Column -->
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    ORDER STATS
                                                </h5>
                                                <div
                                                    id="morris-donut-chart"
                                                    class="ecomm-donute"
                                                ></div>
                                                <ul
                                                    class="
                                                        list-inline
                                                        m-t-30
                                                        text-center
                                                    "
                                                >
                                                    <li class="p-r-20">
                                                        <h5 class="text-muted">
                                                            <i
                                                                class="
                                                                    fa fa-circle
                                                                "
                                                                style="
                                                                    color: #fb9678;
                                                                "
                                                            ></i>
                                                            Orders
                                                        </h5>
                                                        <h4 class="m-b-0">
                                                            {{orders.length}}
                                                        </h4>
                                                    </li>
                                                    <li class="p-r-20">
                                                        <h5 class="text-muted">
                                                            <i
                                                                class="
                                                                    fa fa-circle
                                                                "
                                                                style="
                                                                    color: #01c0c8;
                                                                "
                                                            ></i>
                                                            Pending
                                                        </h5>
                                                        <h4 class="m-b-0">
                                                            {{ordersPending}}
                                                        </h4>
                                                    </li>
                                                    <li>
                                                        <h5 class="text-muted">
                                                            <i
                                                                class="
                                                                    fa fa-circle
                                                                "
                                                                style="
                                                                    color: #4f5467;
                                                                "
                                                            ></i>
                                                            Delivered
                                                        </h5>
                                                        <h4 class="m-b-0">
                                                            {{ordersDelivered}}
                                                        </h4>
                                                    </li>
                                                    <li>
                                                        <h5 class="text-muted">
                                                            <i
                                                                class="
                                                                    fa fa-circle
                                                                "
                                                                style="
                                                                    color: #f2b8c9;
                                                                "
                                                            ></i>
                                                            Shipped
                                                        </h5>
                                                        <h4 class="m-b-0">
                                                            {{ordersShipped}}
                                                        </h4>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <!-- Column -->
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
    import SidebarComponent from '../Super/SidebarComponent.vue';
    import moment from "moment";
    export default {
        components: { NavbarComponent, FooterComponent, SidebarComponent },
        data() {
            return {
                actions: "",
                admins: [],
                customers: [],
                data: {},
                orders: [],
                ordersDelivered: 0,
                ordersPending: 0,
                ordersShipped: 0,
                products: [],
                recentOrders: [],
            };
        },
        methods: {
            // getAdmins() {
            //     axios
            //         .get("api/admin")
            //         .then((res) => {
            //             this.admins = res.data.admins;
            //         })
            //         .catch((err) => {
            //             console.log(err);
            //         });
            // },
            donutChart() {
                Morris.Donut({
                    element: 'morris-donut-chart',
                    data: [{
                        label: "Orders",
                        value: this.orders.length,

                    }, {
                        label: "Pending",
                        value: this.ordersPending,
                    }, {
                        label: "Delivered",
                        value: this.ordersDelivered
                    }, {
                        label: "Shipped",
                        value: this.ordersShipped
                    }],
                    resize: true,
                    colors:['#fb9678', '#01c0c8', '#4F5467', '#f2b8c9']
                });
            },
            getColor(e) {
                let color = e.product.colors.find((el) => el.id == e.color_id);
                return color.name;
            },
            getHomeView() {
                axios
                    .get("api/compactview")
                    .then((res) => {
                        this.data = res.data;
                        this.orders = res.data.orders;
                        this.products = res.data.res;
                        this.admins = res.data.admins;
                        this.customers = res.data.customers;
                        this.data.customers = res.data.customers.length;
                        this.data.admins = res.data.admins.length;
                        this.data.res = res.data.res.length;
                        this.recentOrders = this.orders.reverse().slice(0, 5);
                        this.data.orders = res.data.orders.length;
                        this.ordersDelivered = this.orders.filter(el => el.status == 2).length;
                        this.ordersShipped = this.orders.filter(el => el.status == 1).length; 
                        this.ordersPending = this.orders.filter(el => el.status == 0).length; 
                        this.donutChart();
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getSize(e) {
                let size = e.product.sizes.find((el) => el.id == e.size_id);
                return size != undefined ? size.name : e.size_id;
            },
            moment(arg) {
                return moment(arg);
            },
        },
        mounted() {
            // this.getAdmins();
            this.getHomeView();
        },
    };
</script>
<style scoped>
    h5.text-muted {
        font-size: smaller;
    }
</style>