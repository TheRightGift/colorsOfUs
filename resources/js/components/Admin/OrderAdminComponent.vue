<template>
    <div>
        <div v-if="!isOrderDetails">
            <!-- Page Heading -->
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

            <!-- Content Row -->
            <!-- Info box Content -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <a
                        href="#ordersID"
                        @click="getRecentOrders"
                        class="locatorS"
                    >
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown">
                                    <h4
                                        class="
                                            dropdown-toggle
                                            u-dropdown
                                            link
                                            hide-menu
                                            card-title
                                        "
                                        data-bs-toggle="dropdown"
                                        role="button"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                    >
                                        ORDER RECEIVED
                                        <span class="caret"></span>
                                    </h4>
                                    <div
                                        class="dropdown-menu animated flipInY"
                                        style=""
                                    >
                                        <!-- text-->
                                        <a
                                            href="#!"
                                            class="dropdown-item"
                                            @click="
                                                (ordersForToday = true),
                                                    (ordersForYesterday = false)
                                            "
                                            ><i class="ti-calendar"></i>
                                            Today</a
                                        >
                                        <!-- text-->
                                        <a
                                            href="#!"
                                            class="dropdown-item"
                                            @click="
                                                (ordersForYesterday = true),
                                                    (ordersForToday = false)
                                            "
                                            ><i class="ti-time"></i>
                                            Yesterday</a
                                        >
                                    </div>
                                </div>

                                <div class="text-end">
                                    <span class="text-muted">{{
                                        ordersForToday
                                            ? "Todays Order"
                                            : "Yesterdays Order"
                                    }}</span>
                                    <h1 class="font-light">
                                        <sup>
                                            <i
                                                v-if="
                                                    yesterdayOrders <
                                                    todayOrders
                                                "
                                                class="ti-arrow-up text-success"
                                            ></i>
                                            <i
                                                v-else
                                                class="
                                                    ti-arrow-down
                                                    text-primary
                                                "
                                            ></i>
                                        </sup>
                                        {{
                                            ordersForToday
                                                ? todayOrders
                                                : yesterdayOrders
                                        }}
                                    </h1>
                                </div>
                                <span
                                    :class="{
                                        'text-success':
                                            yesterdayOrders < todayOrders,
                                        'text-primary':
                                            todayOrders > yesterdayOrders,
                                    }"
                                    >{{
                                        ordersForToday
                                            ? todayGraph
                                            : yesterdayGraph
                                    }}%</span
                                >
                                <div class="progress">
                                    <div
                                        :class="{
                                            'bg-success':
                                                yesterdayOrders < todayOrders,
                                            'bg-primary':
                                                todayOrders > yesterdayOrders,
                                        }"
                                        class="progress-bar"
                                        role="progressbar"
                                        :style="{
                                            width: ordersForToday
                                                ? todayGraph + '%'
                                                : yesterdayGraph + '%',
                                            height: '6px',
                                        }"
                                        :aria-valuenow="
                                            ordersForToday
                                                ? todayGraph
                                                : yesterdayGraph
                                        "
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <a href="#ordersID" @click="getCompleted" class="locatorS">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    ORDER COMPLETED <i class="ti-check"></i>
                                </h4>
                                <div class="text-end">
                                    <span class="text-muted"> Completed </span>
                                    <h1 class="font-light">
                                        {{ completedOrders }}
                                    </h1>
                                </div>
                                <span class="text-primary"
                                    >{{ completedOrdersPercent }}%</span
                                >
                                <div class="progress">
                                    <div
                                        class="progress-bar bg-primary"
                                        role="progressbar"
                                        :style="{
                                            width: completedOrdersPercent + '%',
                                            height: '6px',
                                        }"
                                        :aria-valuenow="completedOrdersPercent"
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <a href="#ordersID" @click="getAssigned" class="locatorS">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    ORDER PROCESSING <i class="ti-notepad"></i>
                                </h4>
                                <div class="text-end">
                                    <span class="text-muted">Processing</span>
                                    <h1 class="font-light">
                                        {{ processingOrders }}
                                    </h1>
                                </div>
                                <span class="text-info"
                                    >{{ processingOrdersPercent }}%</span
                                >
                                <div class="progress">
                                    <div
                                        class="progress-bar bg-info"
                                        role="progressbar"
                                        :style="{
                                            width:
                                                processingOrdersPercent + '%',
                                            height: '6px',
                                        }"
                                        :aria-valuenow="processingOrdersPercent"
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <a href="#ordersID" @click="getInTransit" class="locatorS">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    IN TRANSIT ORDERS <i class="ti-truck"></i>
                                </h4>
                                <div class="text-end">
                                    <span class="text-muted">Shipped</span>
                                    <h1 class="font-light">
                                        {{ transitOrders }}
                                    </h1>
                                </div>
                                <span class="text-inverse"
                                    >{{ transitOrdersPercent }}%</span
                                >
                                <div class="progress">
                                    <div
                                        class="progress-bar bg-inverse"
                                        role="progressbar"
                                        :style="{
                                            width: transitOrdersPercent + '%',
                                            height: '6px',
                                        }"
                                        :aria-valuenow="transitOrdersPercent"
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Column -->
            </div>
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Order Overview -->
            <div class="row" id="ordersID">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5
                                    class="card-title"
                                    v-if="isWhatOrder.isRecentOrders"
                                >
                                    Recent Order Overview
                                </h5>
                                <h5 class="card-title" v-else-if="ordersView">
                                    Orders Overview
                                </h5>
                                <p>
                                    <input
                                        type="text"
                                        v-model="searchVal"
                                        @keyup="search"
                                        class="form-control"
                                        placeholder="Search (Name or OrderID"
                                    />
                                </p>
                            </div>
                            <div class="table-responsive m-t-30">
                                <table class="table product-overview">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Order ID</th>
                                            <th>Date</th>
                                            <th>Total</th>
                                            <th>Products</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="recent in pageOfItems[0]"
                                            :key="recent.id"
                                        >
                                            <td>
                                                {{
                                                    recent[0].shippinginfo
                                                        .firstname +
                                                    " " +
                                                    recent[0].shippinginfo
                                                        .lastname
                                                }}
                                            </td>
                                            <td>#{{ recent[0].orderID }}</td>
                                            <td>
                                                {{
                                                    moment(
                                                        recent[0].created_at
                                                    ).format("ll")
                                                }}
                                            </td>
                                            <td>
                                                &#8358; {{ totalPrice(recent) }}
                                            </td>
                                            <td>
                                                {{
                                                    totalProductPerOrder(recent)
                                                }}
                                            </td>
                                            <td>
                                                <span
                                                    class="
                                                        label
                                                        label-rounded
                                                        label-primary
                                                    "
                                                    v-if="recent[0].status == 2"
                                                    >Completed</span
                                                >
                                                <span
                                                    class="
                                                        label
                                                        label-rounded
                                                        label-inverse
                                                    "
                                                    v-if="recent[0].status == 1"
                                                    >Transit</span
                                                >
                                                <span
                                                    class="
                                                        label
                                                        label-rounded
                                                        label-info
                                                    "
                                                    v-if="recent[0].status == 0"
                                                    >Pending</span
                                                >
                                            </td>
                                            <td>
                                                <a href="#!"
                                                    ><i
                                                        class="ti-eye font-18"
                                                        @click="
                                                            getOrdersSummary(
                                                                recent
                                                            )
                                                        "
                                                    ></i
                                                ></a>
                                            </td>
                                        </tr>
                                        <tr
                                            v-if="pageOfItems.length == 0"
                                            class="text-center"
                                        >
                                            <td colspan="10">
                                                <b>No Result Found</b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card-footer pb-0 pt-3">
                                    <jw-pagination
                                        :pageSize="15"
                                        :items="recentOrders"
                                        @changePage="onChangePage"
                                    ></jw-pagination>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <order-details-component
            v-if="isOrderDetails"
            :discount="discount"
            :totalPrice="totalPrice"
            :formatPrice="formatPrice"
            :orderDetails="orderDetails"
            @closeOrderDetails="closeOrderDetails($event)"
            :moment="moment"
            :markInTransit="markInTransit"
        />
    </div>
</template>
<script>
    import moment from "moment";
    import OrderDetailsComponent from "./OrderDetailsComponent.vue";

    export default {
        components: { OrderDetailsComponent },
        name: "OrderAdmin",
        data() {
            return {
                admin: {},
                allOrders: [],
                completedOrders: 0,
                completedOrdersPercent: 0,
                hidePen: false,
                isOrderDetails: false,
                isWhatOrder: {
                    isCompleted: false,
                    isInTransit: false,
                    isProcessing: false,
                    isRecentOrders: false,
                },
                orders: [],
                ordersCompleted: [],
                orderDetails: [],
                ordersForToday: false,
                ordersForYesterday: false,
                ordersProcessing: [],
                ordersInTransit: [],
                ordersView: false,
                ordersOpened: [],
                orderOpened: {},
                pageOfItems: [],
                processingOrders: 0,
                processingOrdersPercent: 0,
                recentOrders: [],
                searchVal: "",
                status: 0,
                success: "",
                todayGraph: 0,
                todayOrders: 0,
                transitOrders: 0,
                transitOrdersPercent: 0,
                yesterdayGraph: 0,
                yesterdayOrders: 0,
            };
        },
        methods: {
            checkIfRegisteredDetails() {
                axios
                    .get(`/api/admin/${this.$store.state.user.id}`)
                    .then((res) => {
                        if (res.data.admin != null && res.data.admin.role_id == 1) {
                            this.orders = res.data.admin.orders;
                            this.ordersCompleted = this.orders.filter(
                                (el) => el.status == 2
                            );
                            this.ordersInTransit = this.orders.filter(
                                (el) => el.status == 1
                            );
                            this.ordersProcessing = this.orders.filter(
                                (el) => el.status == 0 && el.deleted_at == null
                            );
                            this.getOrdersForToday(res.data.orders);
                            this.getYesterdayOrder(res.data.orders);
                            this.allOrders = res.data.orders;
                            this.getPercentOverAll();
                            this.getRecentOrders();
                        } else if (
                            res.data.admin != null &&
                            res.data.admin.role_id == 2
                        ) {
                        }
                        this.admin = res.data.admin;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
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
            getAssigned() {
                this.ordersView = true;
                this.isRecentOrders = false;
                this.isWhatOrder.isProcessing = true;
                this.isWhatOrder.isCompleted = false;
                this.isWhatOrder.isInTransit = false;
                this.isWhatOrder.isRecentOrders = false;
                this.recentOrders = _.isEmpty(this.ordersProcessing)
                    ? this.ordersProcessing
                    : [
                          _.groupBy(this.ordersProcessing, function (n) {
                              return n.orderID;
                          }),
                      ];
            },
            getCompleted() {
                this.ordersView = true;
                this.isWhatOrder.isProcessing = false;
                this.isWhatOrder.isCompleted = true;
                this.isWhatOrder.isInTransit = false;
                this.isWhatOrder.isRecentOrders = false;
                this.recentOrders = _.isEmpty(this.ordersCompleted)
                    ? this.ordersCompleted
                    : [
                          _.groupBy(this.ordersCompleted, function (n) {
                              return n.orderID;
                          }),
                      ];
            },
            getInTransit() {
                this.ordersView = true;
                this.isWhatOrder.isProcessing = false;
                this.isWhatOrder.isCompleted = false;
                this.isWhatOrder.isInTransit = true;
                this.isWhatOrder.isRecentOrders = false;
                this.recentOrders = _.isEmpty(this.ordersInTransit)
                    ? this.ordersInTransit
                    : [
                          _.groupBy(this.ordersInTransit, function (n) {
                              return n.orderID;
                          }),
                      ];
            },
            getOrdersForToday(orders) {
                let todayMoment = moment();
                let todayOrders = this.orders.filter(
                    (el) =>
                        el.deleted_at == null &&
                        moment(el.created_at).isSame(todayMoment, "day")
                ).length;
                let totalOrderForDay = orders.filter(
                    (el) =>
                        el.deleted_at == null &&
                        moment(el.created_at).isSame(todayMoment, "day")
                ).length;
                this.ordersForToday = true;
                this.todayGraph =
                    todayOrders == 0
                        ? 0
                        : Math.round((todayOrders / totalOrderForDay) * 100);
                this.todayOrders = todayOrders;
            },
            getOrdersSummary(recent) {
                this.isOrderDetails = true;
                this.orderDetails = recent;
            },
            getPercentOverAll() {
                let completedOrders = this.allOrders.filter(
                    (el) => el.status == 2
                ).length;
                this.completedOrders = this.ordersCompleted.length;
                this.completedOrdersPercent =
                    this.ordersCompleted.length == 0
                        ? 0
                        : Math.round(
                              (this.ordersCompleted.length / completedOrders) * 100
                          );

                let transitOrders = this.allOrders.filter(
                    (el) => el.status == 1
                ).length;
                this.transitOrders = this.ordersInTransit.length;
                this.transitOrdersPercent =
                    this.ordersInTransit.length == 0
                        ? 0
                        : Math.round(
                              (this.ordersInTransit.length / transitOrders) * 100
                          );

                let processingOrders = this.allOrders.filter(
                    (el) => el.status == 0
                ).length;
                this.processingOrders = this.ordersProcessing.length;
                this.processingOrdersPercent =
                    this.ordersProcessing.length == 0
                        ? 0
                        : Math.round(
                              (this.ordersProcessing.length / processingOrders) *
                                  100
                          );
            },
            getRecentOrders() {
                this.recentOrders = _.isEmpty(this.orders)
                    ? this.orders
                    : [
                          _.groupBy(
                              this.orders.reverse().slice(0, 5),
                              function (n) {
                                  return n.orderID;
                              }
                          ),
                      ];
                this.isWhatOrder.isRecentOrders = true;
            },
            getYesterdayOrder(orders) {
                let yesterday = moment().add(-1, "days");
                let yesterdayOrders = this.orders.filter(
                    (el) =>
                        el.deleted_at == null &&
                        moment(el.created_at).isSame(yesterday, "day")
                ).length;
                let totalOrderForYDay = orders.filter(
                    (el) =>
                        el.deleted_at == null &&
                        moment(el.created_at).isSame(yesterday, "day")
                ).length;

                this.yesterdayGraph =
                    yesterdayOrders == 0
                        ? 0
                        : Math.round((yesterdayOrders / totalOrderForYDay) * 100);
                this.yesterdayOrders = yesterdayOrders;
            },
            markInTransit(order, status) {
                this.status = status;
                let data = { status: this.status };
                axios
                    .put(`api/order/${order.id}`, data)
                    .then((res) => {
                        if (res.data.order) {
                            this.allOrders = res.data.orders;
                            if (this.status == 1) {
                                this.ordersProcessing.splice(
                                    this.ordersProcessing.findIndex(
                                        (rol) => rol.id === order.id
                                    ),
                                    1
                                );
                                order.status = 1;
                                this.ordersInTransit.push(order);
                            } else if (this.status == 0) {
                                this.ordersInTransit.splice(
                                    this.ordersInTransit.findIndex(
                                        (rol) => rol.id === order.id
                                    ),
                                    1
                                );
                                order.status = 0;
                                this.ordersProcessing.push(order);
                            }

                            this.$toasted.show("Change effected!", {
                                duration: 2000,
                                position: "top-right",
                            });
                            this.getPercentOverAll();
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
                axios
                    .post("api/notify", {
                        order_id: order.id,
                        admin_id: this.admin.id,
                        typeof: 1,
                    })
                    .then((res) => {
                        if (res.data.status == 200) {
                            this.success =
                                "Marked for Deletion: TechAdmin Notified";
                            this.orderOpened.notification = res.data.notify;
                            setTimeout(() => {
                                this.success = "";
                            }, 2000);
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
            search() {
                if (this.searchVal != "") {
                    // Cos I groupedBy for orderID
                    // To search ungroup and search and
                    // to return search items regroup
                    let ungrouped;
                    this.recentOrders.filter((item) => {
                        let filtered = _.values(item);
                        ungrouped = filtered.flat();
                    });
                    let groupe = ungrouped.filter((el) => {
                        return this.searchVal
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
            this.checkIfRegisteredDetails();
        },
    };
</script>
<style>
    .locatorS:hover {
        color: unset;
    }
</style>