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
                            <h1 class="h3 mb-0 text-gray-800" v-if="ordersView">
                                Orders
                            </h1>
                            <h1 class="h3 mb-0 text-gray-800" v-else>
                                Dashboard
                            </h1>
                        </div>
                        <!-- Content Row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Illustrations -->

                                <div class="card shadow mb-4" v-if="ordersView">
                                    <div
                                        class="
                                            card-header
                                            py-3
                                            d-flex
                                            justify-content-between
                                        "
                                    >
                                        <div>
                                            <i
                                                class="
                                                    fas
                                                    fa-arrow-circle-left fa-2x
                                                    cursor-pointer
                                                "
                                                @click="ordersView = false"
                                            ></i>
                                        </div>
                                        <h6
                                            class="
                                                m-0
                                                font-weight-bold
                                                text-primary
                                            "
                                        >
                                            Orders
                                        </h6>
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
                                        ></div>
                                        <div class="table-responsive">
                                            <table
                                                class="
                                                    table
                                                    table-hover
                                                    table-striped
                                                "
                                            >
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">
                                                            Tracking ID
                                                        </th>
                                                        <th scope="col">
                                                            Status
                                                        </th>
                                                        <th scope="col">
                                                            Registered On
                                                        </th>
                                                        <th scope="col">
                                                            Extras
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr
                                                        v-for="(
                                                            ordersOpened, index
                                                        ) in ordersOpened"
                                                        :key="ordersOpened.id"
                                                        @click="
                                                            getFullDet(
                                                                ordersOpened
                                                            )
                                                        "
                                                        data-toggle="modal"
                                                        data-target="#orderModal"
                                                    >
                                                        <th scope="row">
                                                            {{ index + 1 }}
                                                        </th>
                                                        <td>
                                                            {{
                                                                ordersOpened.orderID
                                                            }}
                                                        </td>
                                                        <td
                                                            v-if="
                                                                ordersOpened.status ==
                                                                1
                                                            "
                                                        >
                                                            In Transit
                                                        </td>
                                                        <td
                                                            v-if="
                                                                ordersOpened.status ==
                                                                2
                                                            "
                                                        >
                                                            Completed
                                                        </td>
                                                        <td
                                                            v-if="
                                                                ordersOpened.status ==
                                                                0
                                                            "
                                                        >
                                                            Unprocessed
                                                        </td>
                                                        <td>
                                                            {{
                                                                moment(
                                                                    ordersOpened.created_at
                                                                ).format("lll")
                                                            }}
                                                        </td>
                                                        <td>
                                                            <i v-if="ordersOpened.notification != null">Marked for Deletion</i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow mb-4" v-else>
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
                                                src="/fonts/undraw_posting_photo.svg"
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
                                            ></div>

                                            <div class="row">
                                                <div
                                                    class="
                                                        col-xl-3 col-md-6
                                                        mb-4
                                                    "
                                                >
                                                    <div
                                                        class="
                                                            card
                                                            border-left-primary
                                                            shadow
                                                            h-100
                                                            py-2
                                                            cursor-pointer
                                                        "
                                                        @click="getAssigned"
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
                                                                        Orders
                                                                        Assigned
                                                                    </div>
                                                                    <div
                                                                        class="
                                                                            h5
                                                                            mb-0
                                                                            font-weight-bold
                                                                            text-gray-800
                                                                        "
                                                                    >
                                                                        <span
                                                                            v-if="
                                                                                ordersProcessing.length >
                                                                                0
                                                                            "
                                                                            >{{
                                                                                ordersProcessing.length
                                                                            }}</span
                                                                        >
                                                                        <span
                                                                            v-else
                                                                            >0</span
                                                                        >
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="
                                                                        col-auto
                                                                    "
                                                                >
                                                                    <i
                                                                        class="
                                                                            fab
                                                                            fa-buysellads
                                                                            fa-2x
                                                                            text-gray-300
                                                                        "
                                                                    ></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-1"></div>
                                                <!-- Tasks Card Example -->
                                                <div
                                                    class="
                                                        col-xl-3 col-md-6
                                                        mb-4
                                                    "
                                                >
                                                    <div
                                                        class="
                                                            card
                                                            border-left-info
                                                            shadow
                                                            h-100
                                                            py-2
                                                            cursor-pointer
                                                        "
                                                        @click="getInTransit"
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
                                                                        Orders
                                                                        In
                                                                        transit
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
                                                                                <span
                                                                                    v-if="
                                                                                        ordersInTransit.length >
                                                                                        0
                                                                                    "
                                                                                    >{{
                                                                                        ordersInTransit.length
                                                                                    }}</span
                                                                                >
                                                                                <span
                                                                                    v-else
                                                                                    >0</span
                                                                                >
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
                                                                            fas
                                                                            fa-truck
                                                                            fa-2x
                                                                            text-gray-300
                                                                        "
                                                                    ></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-1"></div>
                                                <!-- Pending Requests Card Example -->
                                                <div
                                                    class="
                                                        col-xl-3 col-md-6
                                                        mb-4
                                                    "
                                                >
                                                    <div
                                                        class="
                                                            card
                                                            border-left-warning
                                                            shadow
                                                            h-100
                                                            py-2
                                                            cursor-pointer
                                                        "
                                                        @click="getCompleted"
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
                                                                        Orders
                                                                        Completed
                                                                    </div>
                                                                    <div
                                                                        class="
                                                                            h5
                                                                            mb-0
                                                                            font-weight-bold
                                                                            text-gray-800
                                                                        "
                                                                    >
                                                                        <span
                                                                            v-if="
                                                                                ordersCompleted.length >
                                                                                0
                                                                            "
                                                                            >{{
                                                                                ordersCompleted.length
                                                                            }}</span
                                                                        >
                                                                        <span
                                                                            v-else
                                                                            >0</span
                                                                        >
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
                                                                            fa-book
                                                                            fa-2x
                                                                            text-gray-300
                                                                        "
                                                                    ></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                    <div
                        class="modal fade"
                        id="orderModal"
                        tabindex="-1"
                        role="dialog"
                        aria-labelledby="orderModalLabel"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5
                                        class="modal-title"
                                        id="orderModalLabel"
                                    >
                                        Details for {{ orderOpened.orderID }}
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
                                    <div
                                        class="bg-success"
                                        v-if="success != ''"
                                    >
                                        <p class="text-white">
                                            {{ success }}
                                        </p>
                                    </div>

                                    <div>
                                        <!-- Collapsable Card Example -->
                                        <div class="card shadow mb-4">
                                            <!-- Card Header - Accordion -->
                                            <a
                                                href="#orderCollapse"
                                                class="d-block card-header py-3"
                                                data-toggle="collapse"
                                                role="button"
                                                aria-expanded="true"
                                                aria-controls="orderCollapse"
                                            >
                                                <h6
                                                    class="
                                                        m-0
                                                        font-weight-bold
                                                        text-primary
                                                    "
                                                >
                                                    Order Details
                                                </h6>
                                            </a>
                                            <!-- Card Content - Collapse -->
                                            <div
                                                class="collapse show"
                                                id="orderCollapse"
                                            >
                                                <div class="card-body">
                                                    <div class="flexedItem">
                                                        <div>
                                                            <img
                                                                v-if="
                                                                    orderOpened.resources
                                                                "
                                                                :src="
                                                                    '/images/resources/' +
                                                                    orderOpened
                                                                        .resources
                                                                        .images[0]
                                                                        .url
                                                                "
                                                                alt=""
                                                            />
                                                        </div>
                                                        <div>
                                                            <p>
                                                                Quantity -
                                                                {{
                                                                    orderOpened.quantity
                                                                }}
                                                            </p>
                                                            <p>
                                                                Unit Price -
                                                                {{
                                                                    orderOpened.unit_price
                                                                }}
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <p
                                                                v-if="
                                                                    orderOpened.resources
                                                                "
                                                            >
                                                                {{
                                                                    orderOpened
                                                                        .resources
                                                                        .title
                                                                }}
                                                            </p>
                                                        </div>
                                                        <div class="d-flex-column">
                                                            <div v-if="orderOpened.status == 0 || orderOpened.status == 1">
                                                                <span v-if="orderOpened.notification == null">
                                                                    <i
                                                                        class="
                                                                            fas
                                                                            fa-pen
                                                                            cursor-pointer
                                                                            text-blue
                                                                        "
                                                                        @click="
                                                                            hidePen = true
                                                                        "
                                                                        v-if="!hidePen"
                                                                    ></i>
                                                                    <input
                                                                        type="checkbox"
                                                                        v-model="status"
                                                                        title="Mark for transit"
                                                                        name="marksucess"
                                                                        v-else
                                                                        @change="
                                                                            markInTransit(
                                                                                orderOpened, orderOpened.status == '0' ? '1' : '0'
                                                                            )
                                                                        "
                                                                    />
                                                                </span>
                                                            </div>
                                                            <div class="deleted" v-if="orderOpened.notification == null">
                                                                <i
                                                                    class="
                                                                        fas
                                                                        fa-trash
                                                                        cursor-pointer
                                                                        text-blue
                                                                    "
                                                                    @click="
                                                                        notify(orderOpened)
                                                                    "
                                                                ></i>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Collapsable Card Example -->
                                        <div class="card shadow mb-4">
                                            <!-- Card Header - Accordion -->
                                            <a
                                                href="#customerCollapse"
                                                class="d-block card-header py-3"
                                                data-toggle="collapse"
                                                role="button"
                                                aria-expanded="true"
                                                aria-controls="customerCollapse"
                                            >
                                                <h6
                                                    class="
                                                        m-0
                                                        font-weight-bold
                                                        text-primary
                                                    "
                                                >
                                                    Customer Details
                                                </h6>
                                            </a>
                                            <!-- Card Content - Collapse -->
                                            <div
                                                class="collapse show"
                                                id="customerCollapse"
                                            >
                                                <div
                                                    class="card-body"
                                                    v-if="orderOpened.customer"
                                                >
                                                    <div class="flexedItem">
                                                        <div>
                                                            <p class="center">
                                                                <i
                                                                    class="
                                                                        fas
                                                                        fa-user
                                                                    "
                                                                ></i>
                                                            </p>
                                                            {{
                                                                orderOpened
                                                                    .customer
                                                                    .firstname +
                                                                " " +
                                                                orderOpened
                                                                    .customer
                                                                    .lastname
                                                            }}
                                                        </div>
                                                        <div>
                                                            <p class="center mb-0">
                                                                <i
                                                                    class="
                                                                        fas
                                                                        fa-phone
                                                                    "
                                                                ></i>
                                                            </p>
                                                            <a :href="'tel:'+orderOpened.customer.phone">
                                                                {{
                                                                    orderOpened
                                                                        .customer
                                                                        .phone
                                                                }}
                                                            </a>
                                                            
                                                        </div>
                                                        <div>
                                                            <p class="center">
                                                                <i
                                                                    class="
                                                                        fas
                                                                        fa-address-book
                                                                    "
                                                                ></i>
                                                            </p>
                                                            {{
                                                                orderOpened
                                                                    .customer
                                                                    .address
                                                            }}
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
    import moment from "moment";
    import NavbarComponent from "../Super/NavbarComponent.vue";
    import FooterComponent from "../Super/FooterComponent.vue";
    import SidebarComponent from "../Super/SidebarComponent.vue";
    export default {
        components: { NavbarComponent, FooterComponent, SidebarComponent },
        data() {
            return {
                admin: {},
                success: "",
                authors: [],
                hidePen: false,
                orders: [],
                ordersCompleted: [],
                ordersProcessing: [],
                ordersInTransit: [],
                ordersView: false,
                ordersOpened: [],
                orderOpened: {},
                status: 0,
            };
        },
        methods: {
            checkIfRegisteredDetails() {
                axios.get(`api/admin/${this.$store.state.user.id}`).then((res) => {
                    if (res.data.admin == null) {
                        // Open the update details page to update the form
                        window.location.replace("/profile");
                    } else if (res.data.admin != null) {
                        axios
                            .get("api/order/admin/" + res.data.admin.id)
                            .then((res) => {
                                this.orders = res.data.orders;
                                this.ordersCompleted = this.orders.filter(
                                    (el) => el.status == 2
                                );
                                this.ordersInTransit = this.orders.filter(
                                    (el) => el.status == 1
                                );
                                this.ordersProcessing = this.orders.filter(
                                    (el) => el.status == 0
                                );
                            })
                            .catch((err) => {
                                console.log();
                            });
                    }
                    this.admin = res.data.admin;
                });
            },
            getAssigned() {
                this.ordersView = true;
                this.ordersOpened = this.ordersProcessing;
            },
            getCompleted() {
                this.ordersView = true;
                this.ordersOpened = this.ordersCompleted;
            },
            getFullDet(data) {
                this.orderOpened = data;
            },
            getInTransit() {
                this.ordersView = true;
                this.ordersOpened = this.ordersInTransit;
            },
            markInTransit(order, status) {
                this.status = status;
                let data = { status: this.status };
                axios
                    .put(`api/order/${order.id}`, data)
                    .then((res) => {
                        if (res.data.order) {
                            if (this.status == 1) {
                                this.ordersProcessing.splice(
                                    this.ordersProcessing.findIndex(
                                        (rol) => rol.id === order.id
                                    ),
                                    1
                                );
                                order.status = 1;
                                this.ordersInTransit.push(order);
                            }
                            else if (this.status == 0) {
                                this.ordersInTransit.splice(
                                    this.ordersInTransit.findIndex(
                                        (rol) => rol.id === order.id
                                    ),
                                    1
                                );
                                order.status = 0;
                                this.ordersProcessing.push(order);
                            }
                            
                            $("#orderModal .close").click();
                            this.status = 0;
                            this.hidePen = !this.hidePen;
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            moment(arg) {
                return moment(arg);
            },
            notify(order) {
                axios.post('api/notify', {'order_id': order.id, 'admin_id': this.admin.id, 'typeof': 1}).then(res => {
                    if (res.data.status == 200) {
                        this.success = 'Marked for Deletion: TechAdmin Notified';
                        this.orderOpened.notification = res.data.notify;
                        setTimeout(() => {
                            this.success = '';
                        }, 2000);
                    }
                    
                })
                .catch(err => {
                    console.log(err);
                })
            },
        },
        mounted() {
            this.checkIfRegisteredDetails();
        },
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