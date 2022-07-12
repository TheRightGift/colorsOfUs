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
                            <h1 class="h3 mb-0 text-gray-800">Customers</h1>
                        </div>
                        <!-- Content Row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Illustrations -->
                                <div class="card shadow mb-4">
                                    <div
                                        class="
                                            card-header
                                            py-3
                                            d-flex
                                            justify-content-between
                                        "
                                    >
                                        <h6
                                            class="
                                                m-0
                                                font-weight-bold
                                                text-primary
                                            "
                                        >
                                            <a href="#!">
                                                <i
                                                    class="
                                                        fas
                                                        fa-hand-point-left fa-2x
                                                    "
                                                    aria-hidden="true"
                                                    v-if="!customersView"
                                                    @click="toggleCustomerDet"
                                                ></i>
                                            </a>
                                            {{
                                                customersView
                                                    ? "All Customer"
                                                    : customer.profile
                                                    ? customer.profile
                                                          .firstname +
                                                      " " +
                                                      customer.profile.lastname
                                                    : ""
                                            }}
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="loadingPage" v-if="loading">
                                            <i
                                                class="
                                                    fas
                                                    fa-spinner fa-spin fa-3x
                                                "
                                            ></i>
                                        </div>
                                        <div class="presentation" v-else>
                                            <div
                                                id="customers"
                                                v-if="customersView"
                                            >
                                                <div class="table-responsive">
                                                    <table
                                                        class="
                                                            table
                                                            table-hover
                                                            table-striped
                                                        "
                                                    >
                                                        <thead
                                                            class="thead-light"
                                                        >
                                                            <tr>
                                                                <th scope="col">
                                                                    #
                                                                </th>
                                                                <th scope="col">
                                                                    Photo
                                                                </th>
                                                                <th scope="col">
                                                                    Name
                                                                </th>
                                                                <th scope="col">
                                                                    Email
                                                                </th>
                                                                <th scope="col">
                                                                    Status
                                                                </th>
                                                                <th scope="col">
                                                                    Registered
                                                                    On
                                                                </th>
                                                                <th scope="col">
                                                                    Last Order
                                                                </th>
                                                                <th scope="col"></th>
                                                                <th scope="col">
                                                                    <i
                                                                        class="
                                                                            fa
                                                                            fa-ellipsis-h
                                                                        "
                                                                        aria-hidden="true"
                                                                    ></i>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr
                                                                v-for="(
                                                                    user, index
                                                                ) in users.data"
                                                                :key="user.id"
                                                                @click="
                                                                    getFullDet(
                                                                        user
                                                                    )
                                                                "
                                                            >
                                                                <!-- data-toggle="modal"
                                                                data-target="#customerModal" -->
                                                                <th scope="row">
                                                                    {{
                                                                        index +
                                                                        1
                                                                    }}
                                                                </th>
                                                                <td>
                                                                    <div
                                                                        class="
                                                                            avatar
                                                                            avatar-info
                                                                        "
                                                                    >
                                                                        <span
                                                                            class="
                                                                                avatar-text
                                                                                rounded-circle
                                                                                upper-case
                                                                            "
                                                                            >{{
                                                                                user.profile.firstname.slice(
                                                                                    0,
                                                                                    1
                                                                                )
                                                                            }}</span
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td
                                                                    v-if="
                                                                        user.profile
                                                                    "
                                                                >
                                                                    {{
                                                                        user
                                                                            .profile
                                                                            .firstname +
                                                                        " " +
                                                                        user
                                                                            .profile
                                                                            .lastname
                                                                    }}
                                                                </td>
                                                                <td>
                                                                    {{
                                                                        user.email
                                                                    }}
                                                                </td>
                                                                <td>
                                                                    {{
                                                                        user.email_verified_at ==
                                                                        null
                                                                            ? "Inactive"
                                                                            : "Active"
                                                                    }}
                                                                </td>
                                                                <td>
                                                                    {{
                                                                        moment(
                                                                            user.created_at
                                                                        ).format(
                                                                            "lll"
                                                                        )
                                                                    }}
                                                                </td>
                                                                <td></td>
                                                                <td>
                                                                    <a href="">
                                                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                                                    </a>

                                                                    <a :href="'mailto:'">
                                                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <a
                                                                        href="#!"
                                                                        @click="
                                                                            toggleCustomerDet
                                                                        "
                                                                    >
                                                                        <i
                                                                            class="
                                                                                fa
                                                                                fa-ellipsis-h
                                                                            "
                                                                            aria-hidden="true"
                                                                        ></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <nav
                                                    aria-label="Page navigation example"
                                                >
                                                    <ul
                                                        class="
                                                            pagination
                                                            justify-content-center
                                                            mt-3
                                                        "
                                                    >
                                                        <li
                                                            class="page-item"
                                                            v-for="(
                                                                pages, index
                                                            ) in users.links"
                                                            :key="index"
                                                            :class="{
                                                                active: pages.active,
                                                                disabled:
                                                                    pages.url ==
                                                                    null,
                                                            }"
                                                        >
                                                            <span
                                                                class="
                                                                    page-link
                                                                "
                                                                v-if="
                                                                    pages.active
                                                                "
                                                                v-html="
                                                                    pages.label
                                                                "
                                                            >
                                                                <span
                                                                    class="
                                                                        sr-only
                                                                    "
                                                                    >(current)</span
                                                                >
                                                            </span>
                                                            <a
                                                                class="
                                                                    page-link
                                                                "
                                                                href="#"
                                                                v-else
                                                                v-html="
                                                                    pages.label
                                                                "
                                                                @click="
                                                                    paginate(
                                                                        pages.url
                                                                    )
                                                                "
                                                            ></a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                            <div id="customersDetails" v-else>
                                                <ul
                                                    class="
                                                        nav nav-tabs
                                                        customtab
                                                    "
                                                    role="tablist"
                                                >
                                                    <li class="nav-item">
                                                        <a
                                                            class="
                                                                nav-link
                                                                active
                                                            "
                                                            data-bs-toggle="tab"
                                                            href="#home2"
                                                            role="tab"
                                                            ><span
                                                                class="
                                                                    hidden-sm-up
                                                                "
                                                                ><i
                                                                    class="
                                                                        ti-exchange-vertical
                                                                    "
                                                                ></i
                                                            ></span>
                                                            <span
                                                                class="
                                                                    hidden-xs-down
                                                                "
                                                                >Orders</span
                                                            ></a
                                                        >
                                                    </li>
                                                    <li class="nav-item">
                                                        <a
                                                            class="nav-link"
                                                            data-bs-toggle="tab"
                                                            href="#profile2"
                                                            role="tab"
                                                            ><span
                                                                class="
                                                                    hidden-sm-up
                                                                "
                                                                ><i
                                                                    class="
                                                                        ti-user
                                                                    "
                                                                ></i
                                                            ></span>
                                                            <span
                                                                class="
                                                                    hidden-xs-down
                                                                "
                                                                >Profile</span
                                                            ></a
                                                        >
                                                    </li>
                                                </ul>
                                                <!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div
                                                        class="tab-pane active"
                                                        id="home2"
                                                        role="tabpanel"
                                                    >
                                                        <div class="p-20">
                                                            Address Shipped to.
                                                            <div
                                                                class="
                                                                    table-responsive
                                                                "
                                                            >
                                                                <table
                                                                    class="
                                                                        table
                                                                        table-hover
                                                                        table-striped
                                                                    "
                                                                >
                                                                    <thead
                                                                        class="
                                                                            thead-light
                                                                        "
                                                                    >
                                                                        <tr>
                                                                            <th
                                                                                scope="col"
                                                                            >
                                                                                #
                                                                            </th>
                                                                            <th
                                                                                scope="col"
                                                                            >
                                                                                Firstname
                                                                            </th>
                                                                            <th
                                                                                scope="col"
                                                                            >
                                                                                Lastname
                                                                            </th>
                                                                            <th
                                                                                scope="col"
                                                                            >
                                                                                Status
                                                                            </th>
                                                                            <th
                                                                                scope="col"
                                                                            >
                                                                                LGA
                                                                            </th>
                                                                            <th
                                                                                scope="col"
                                                                            >
                                                                                State
                                                                            </th>
                                                                            <th
                                                                                scope="col"
                                                                            >
                                                                                Created
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody
                                                                        v-if="
                                                                            customer.shippinginfos
                                                                        "
                                                                    >
                                                                        <tr
                                                                            v-for="(
                                                                                customer,
                                                                                index
                                                                            ) in customer
                                                                                .shippinginfos"
                                                                            :key="
                                                                                customer.id
                                                                            "
                                                                            data-bs-toggle="collapse" :data-bs-target="'#'+customer.firstname" aria-expanded="true" aria-controls="collapse1"
                                                                        >
                                                                            <th
                                                                                scope="row"
                                                                            >
                                                                                {{
                                                                                    index +
                                                                                    1
                                                                                }}
                                                                            </th>
                                                                            <td>
                                                                                {{
                                                                                    customer.firstname
                                                                                }}
                                                                            </td>
                                                                            <td>
                                                                                {{customer.lastname}}
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                {{customer.active == 1 ? 'Default' : 'NULL'}}
                                                                            </td>
                                                                            <td
                                                                            >
                                                                                {{
                                                                                    customer
                                                                                        .lga
                                                                                        .name
                                                                                }}
                                                                            </td>
                                                                            <td>
                                                                                {{
                                                                                    customer.state.name
                                                                                }}
                                                                            </td>
                                                                            <td>
                                                                                {{
                                                                                    moment(
                                                                                        customer.created_at
                                                                                    ).format(
                                                                                        "lll"
                                                                                    )
                                                                                }}
                                                                            </td>
                                                                        </tr>
                                                                        <div :id="index" class="collapse show" aria-labelledby="heading11">
                                                                            <div class="card-body">
                                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                                                            </div>
                                                                        </div>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="tab-pane p-20"
                                                        id="profile2"
                                                        role="tabpanel"
                                                    >
                                                        2
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
            <div
                class="modal fade"
                id="customerModal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="customerModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="customerModalLabel">
                                You are viewing details for {{ customer.email }}
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
                            <div class="bg-success" v-if="success != ''">
                                <p>
                                    {{ success }}
                                </p>
                            </div>

                            <div v-if="customer.customer != null">
                                <div class="flexedItem">
                                    <div>
                                        <p>Name:</p>
                                        {{
                                            customer.customer.firstname +
                                            " " +
                                            customer.customer.lastname
                                        }}
                                    </div>
                                    <div>
                                        <p>Phone:</p>
                                        {{ customer.customer.phone }}
                                    </div>
                                    <div>
                                        <p>Address:</p>
                                        {{ customer.customer.address }}
                                    </div>
                                    <div>
                                        <p>Postal Code:</p>
                                        {{ customer.customer.postal_code }}
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table
                                        class="table table-hover table-striped"
                                    >
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">ORDERID</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Book</th>
                                                <th scope="col">Unit Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Assigned</th>
                                                <th scope="col">Created</th>
                                            </tr>
                                        </thead>
                                        <tbody v-if="customer.orders">
                                            <tr
                                                v-for="(
                                                    customer, index
                                                ) in customer.orders"
                                                :key="customer.id"
                                            >
                                                <th scope="row">
                                                    {{ index + 1 }}
                                                </th>
                                                <td>
                                                    {{ customer.orderID }}
                                                </td>
                                                <td v-if="customer.status == 0">
                                                    Unprocessed
                                                </td>
                                                <td
                                                    v-else-if="
                                                        customer.status == 1
                                                    "
                                                >
                                                    In Tranit
                                                </td>
                                                <td
                                                    v-else-if="
                                                        customer.status == 2
                                                    "
                                                >
                                                    Completed
                                                </td>
                                                <td v-if="customer.resources">
                                                    {{
                                                        customer.resources.title
                                                    }}
                                                </td>
                                                <td>
                                                    &#8358;{{
                                                        customer.unit_price
                                                    }}
                                                </td>
                                                <td>
                                                    {{ customer.quantity }}
                                                </td>
                                                <td>
                                                    {{
                                                        customer.admins[0]
                                                            .firstname +
                                                        " " +
                                                        customer.admins[0]
                                                            .lastname
                                                    }}
                                                </td>
                                                <td>
                                                    {{
                                                        moment(
                                                            customer.created_at
                                                        ).format("lll")
                                                    }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div v-else>
                                User has not made any purchase yet.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import moment from "moment";
    import NavbarComponent from "../Super/NavbarComponent.vue";
    import FooterComponent from "../Super/FooterComponent.vue";
    import SidebarComponent from "../Super/SidebarComponent.vue";
    import OrderTableComponent from "./OrderTableComponent.vue";
    export default {
        components: {
            NavbarComponent,
            FooterComponent,
            SidebarComponent,
            OrderTableComponent,
        },
        created() {
            this.customersView = !this.customersView;
            this.loading = true;
        },
        name: "Customer",
        data() {
            return {
                customer: {},
                customersView: false,
                holderForRecentOrder: [],
                isOrderDetails: false,
                isWhatOrder: {},
                loading: false,
                orderDetails: [],
                orders: [],
                ordersView: false,
                pageOfItems: [],
                requesting: false,
                success: "",
                users: [],
                userOrders: [],
            };
        },
        methods: {
            closeOrderDetails() {
                this.isOrderDetails = false;
            },
            discount(disc, e) {
                let discount = (disc / 100) * e;
                let newPrice = e - Math.round(discount);
                return Math.round(newPrice);
            },
            formatPrice(value) {
                let val = value / 1;
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            },
            getCustomers() {
                axios
                    .get(`api/customer-home`)
                    .then((res) => {
                        this.users = res.data.users;
                        this.loading = false;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getFullDet(user) {
                this.customer = user;
                this.holderForRecentOrder = this.order;
            },
            getOrdersSummary(recent) {
                this.isOrderDetails = true;
                this.orderDetails = recent;
            },
            indexId(evt) {
                this.indexedID = evt;
            },
            moment(arg) {
                return moment(arg);
            },
            paginate(url) {
                axios
                    .get(url)
                    .then((res) => {
                        this.users = res.data.users;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            restoreUser(customer) {
                axios
                    .patch(`api/user/${customer.id}`)
                    .then((res) => {
                        if (res.status == 201) {
                            this.users.push(customer);
                            this.customerTrashed.splice(
                                this.customerTrashed.findIndex(
                                    (user) => user.id === customer.id
                                ),
                                1
                            );
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            onChangePage(pageOfItems) {
                // update page of items
                this.pageOfItems = pageOfItems;
            },
            search(value) {
                if (value != "") {
                    // Cos I groupedBy for orderID
                    // To search ungroup and search and
                    // to return search items regroup
                    let ungrouped;
                    this.recentOrders = this.holderForRecentOrder; // Serves as state to hold the initial order in the array;

                    this.recentOrders.filter((item) => {
                        let filtered = _.values(item);
                        ungrouped = filtered.flat();
                    });
                    try {
                        let groupe = ungrouped.filter((el) => {
                            return value
                                .toLowerCase()
                                .split(" ")
                                .every(
                                    (v) =>
                                        el.orderID.toLowerCase().includes(v) ||
                                        el.shippinginfo.firstname
                                            .toLowerCase()
                                            .includes(v) ||
                                        el.shippinginfo.lastname
                                            .toLowerCase()
                                            .includes(v)
                                );
                        });
                        this.recentOrders = _.isEmpty(groupe)
                            ? groupe
                            : [
                                  _.groupBy(groupe, function (n) {
                                      return n.orderID;
                                  }),
                              ];
                    } catch (error) {
                        console.log(error);
                    }
                } else {
                    if (this.isWhatOrder.isRecentOrders) {
                        this.getRecentOrders();
                    } else if (this.isWhatOrder.isCompleted) {
                        this.getCompleted();
                    } else if (this.isWhatOrder.isInTransit) {
                        this.getInTransit();
                    } else if (this.isWhatOrder.isProcessing) {
                        this.getAssigned();
                    }
                }
            },
            toggleCustomerDet() {
                this.customersView = !this.customersView;
            },
            totalPrice(recent) {
                let totalAmt = 0;
                recent.forEach((el) => {
                    if (el.discount == null) {
                        totalAmt = totalAmt + el.unit_price * el.quantity;
                    } else if (el.discount != null) {
                        let disc = this.discount(el.discount, el.unit_price);
                        totalAmt = totalAmt + disc * el.quantity;
                    }
                });
                return this.formatPrice(totalAmt);
            },
            totalProductPerOrder(recent) {
                let len = recent.length;
                let items;
                if (len == 1) {
                    items = recent[0].product.title;
                } else if (len > 1) {
                    items = len + " products";
                }
                return items;
            },
        },
        mounted() {
            this.getCustomers();
        },
    };
</script>
<style>
    .flexedItem {
        display: flex;
        justify-content: space-between;
        text-align: center;
    }
    @media (max-width: 768px) {
        .flexedItem {
            display: block;
        }
    }
    .avatar {
        display: inline-block;
        margin-bottom: 0;
        height: 3rem;
        width: 3rem;
        border-radius: 50%;
    }
    .avatar.avatar-info .avatar-text {
        background: #25c2e3 !important; /* #9932e7!important; */
        color: #fff !important;
    }
    .avatar .avatar-text {
        background: #d7d7d7;
        width: 100%;
        height: 100%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        text-transform: uppercase;
        font-size: 20px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .rounded-circle {
        border-radius: 50% !important;
    }
</style>
<style scoped>
    .upper-case {
        text-transform: uppercase;
    }
    .flexedItem {
        font-family: Shift-Light;
    }
    .cursor-pointer {
        cursor: pointer;
    }
    .card-img-top {
        height: 125px !important;
    }

    button {
        background-color: transparent;
        text-transform: capitalize;
    }

    .btn:hover {
        background-color: transparent !important;
        text-decoration: none;
        color: #fb9678;
    }
</style>