<template>
    <div>
        <div id="processingOrder">
            <div
                class="card"
                v-for="processingOrder in processingOrders"
                :key="processingOrder.id"
            >
                <div class="card-body">
                    <div class="status d-flex justify-content-between">
                        <div class="">
                            <p v-if="processingOrder.status == 2">
                                <b>Finsihed</b>
                            </p>
                            <p v-else-if="processingOrder.status == 1">
                                <b>Shipped</b>
                            </p>
                            <p v-else-if="processingOrder.status == 0">
                                <b>Processing</b>
                            </p>
                        </div>
                        <div class="ml-auto">
                            <p class="m-0">
                                Order Date:
                                {{
                                    moment(processingOrder.created_at).format(
                                        "lll"
                                    )
                                }}
                            </p>
                            <p class="m-0">
                                Order Id: {{ processingOrder.orderID }}
                            </p>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div id="productImg" class="col-sm-3">
                            <img
                                :src="
                                    
                                    processingOrder.product.images[0].url
                                "
                                alt=""
                                width="130"
                                height="160"
                            />
                        </div>
                        <div id="productDetails" class="col-sm-6">
                            <p>{{ processingOrder.product.title }} - {{ processingOrder.color_id ? getColor(processingOrder) : '' }} / {{ processingOrder.size_id ? getSize(processingOrder) : '' }} </p>
                            <p>
                                &#8358;{{
                                    toLocaleStringe(processingOrder.unit_price)
                                }}
                                &nbsp;&nbsp;&nbsp; x{{
                                    processingOrder.quantity
                                }}
                            </p>
                        </div>
                        <div id="totalPriceAction" class="col-sm-3 text-center">
                            <p>
                                &#8358;{{
                                    totalPrice(
                                        processingOrder.unit_price,
                                        processingOrder.quantity
                                    )
                                }}
                            </p>
                            <span>
                                <button class="cancelOrder" data-toggle="modal" data-target="#cancelOrder" @click="orderToCancel = processingOrder">Cancel</button>
                            </span>
                        </div>
                    </div>
                    <hr />
                </div>
            </div>
        </div>
        <div id="inTransitOrder">
            <div
                class="card"
                v-for="orderInTransit in orderInTransits"
                :key="orderInTransit.id"
            >
                <div class="card-body">
                    <div class="status d-flex justify-content-between">
                        <div class="">
                            <p v-if="orderInTransit.status == 2">
                                <b>Finsihed</b>
                            </p>
                            <p v-else-if="orderInTransit.status == 1">
                                <b>Shipped</b>
                            </p>
                            <p v-else-if="orderInTransit.status == 0">
                                <b>Processing</b>
                            </p>
                        </div>
                        <div class="ml-auto">
                            <p class="m-0">
                                Order Date:
                                {{
                                    moment(orderInTransit.created_at).format(
                                        "lll"
                                    )
                                }}
                            </p>
                            <p class="m-0">
                                Order Id: {{ orderInTransit.orderID }}
                            </p>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div id="productImg" class="col-sm-3">
                            <img
                                :src="
                                    
                                    orderInTransit.product.images[0].url
                                "
                                alt=""
                                width="130"
                                height="160"
                            />
                        </div>
                        <div id="productDetails" class="col-sm-6">
                            <p>{{ orderInTransit.product.title }}</p>
                            <p>
                                &#8358;{{
                                    toLocaleStringe(orderInTransit.unit_price)
                                }}
                                &nbsp;&nbsp;&nbsp; x{{
                                    orderInTransit.quantity
                                }}
                            </p>
                        </div>
                        <div id="totalPriceAction" class="col-sm-3 text-center">
                            <p>
                                &#8358;{{
                                    totalPrice(
                                        orderInTransit.unit_price,
                                        orderInTransit.quantity
                                    )
                                }}
                            </p>
                            <!-- <button class="deleteOrder">Delete</button> -->
                        </div>
                    </div>
                    <hr />
                </div>
            </div>
        </div>
        <div id="completedOrder">
            <div
                class="card"
                v-for="completedOrder in completedOrders"
                :key="completedOrder.id"
            >
                <div class="card-body">
                    <div class="status d-flex justify-content-between">
                        <div class="">
                            <p v-if="completedOrder.status == 2">
                                <b>Finsihed</b>
                            </p>
                            <p v-else-if="completedOrder.status == 1">
                                <b>Shipped</b>
                            </p>
                            <p v-else-if="completedOrder.status == 0">
                                <b>Processing</b>
                            </p>
                        </div>
                        <div class="ml-auto">
                            <p class="m-0">
                                Order Date:
                                {{
                                    moment(
                                        completedOrder.created_at
                                    ).format("lll")
                                }}
                            </p>
                            <p class="m-0">
                                Order Id: {{ completedOrder.orderID }}
                            </p>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div id="productImg" class="col-sm-3">
                            <img
                                :src="
                                    
                                    completedOrder.product.images[0].url
                                "
                                alt=""
                                width="130"
                                height="160"
                            />
                        </div>
                        <div id="productDetails" class="col-sm-6">
                            <p>{{ completedOrder.product.title }}</p>
                            <p>
                                &#8358;{{
                                    toLocaleStringe(
                                        completedOrder.unit_price
                                    )
                                }}
                                &nbsp;&nbsp;&nbsp; x{{
                                    completedOrder.quantity
                                }}
                            </p>
                        </div>
                        <div
                            id="totalPriceAction"
                            class="col-sm-3 text-center"
                        >
                            <p>
                                &#8358;{{
                                    totalPrice(
                                        completedOrder.unit_price,
                                        completedOrder.quantity
                                    )
                                }}
                            </p>
                            <!-- <button class="deleteOrder">Delete</button> -->
                        </div>
                    </div>
                    <hr/>
                </div>
            </div>
        </div>
        <div id="ordersPaginated">
            <div
                class="card"
                v-for="orderPaginated in ordersPaginated"
                :key="orderPaginated.id"
            >
                <div class="card-body">
                    <div class="status d-flex justify-content-between">
                        <div class="">
                            <p v-if="orderPaginated.status == 2 && orderPaginated.deleted_at == null">
                                <span>
                                    <b>Finsihed</b>
                                    <p class="m-0">
                                        Confirmed On:
                                        {{
                                            moment(orderPaginated.updated_at).format(
                                                "lll"
                                            )
                                        }}
                                    </p>
                                </span>
                            </p>
                            <p v-else-if="orderPaginated.status == 1 && orderPaginated.deleted_at == null">
                                <b>Shipped</b>
                            </p>
                            <p v-else-if="orderPaginated.status == 0 && orderPaginated.deleted_at == null">
                                <b>Processing</b>
                            </p>
                            <p v-else-if="orderPaginated.deleted_at != null">Order Cancelled</p>
                        </div>
                        <div class="ml-auto">
                            <p class="m-0">
                                Order Date:
                                {{
                                    moment(orderPaginated.created_at).format(
                                        "lll"
                                    )
                                }}
                            </p>
                            <p class="m-0">
                                Order Id: {{ orderPaginated.orderID }}
                            </p>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div id="productImg" class="col-sm-3">
                            <img
                                :src="
                                    orderPaginated.product.images[0].url
                                "
                                alt=""
                                width="130"
                                height="160"
                            />
                        </div>
                        <div id="productDetails" class="col-sm-6">
                            <p>{{ orderPaginated.product.title }} - {{ orderPaginated.color_id ? getColor(orderPaginated) : '' }} / {{ orderPaginated.size_id ? getSize(orderPaginated) : '' }}</p>
                            <p>
                                &#8358;{{
                                    toLocaleStringe(orderPaginated.unit_price)
                                }}
                                &nbsp;&nbsp;&nbsp; x{{
                                    orderPaginated.quantity
                                }}
                            </p>
                        </div>
                        <div id="totalPriceAction" class="col-sm-3 text-center">
                            <p>
                                &#8358; {{
                                    totalPrice(
                                        orderPaginated.unit_price,
                                        orderPaginated.quantity
                                    )
                                }}
                            </p>
                            <p v-if="orderPaginated.deleted_at != null">Order Cancelled</p>
                            <span v-if="orderPaginated.status == 1 && orderPaginated.deleted_at == null">
                                <button class="cancelOrder" data-toggle="modal" data-target="#cancelOrder" @click="(orderToCancel = orderPaginated, orderConfirm = true)" title="Confirm you've received order">Confirm</button>
                            </span>
                            <span v-else-if="orderPaginated.status == 0 && orderPaginated.deleted_at == null">
                                <button class="cancelOrder" data-toggle="modal" data-target="#cancelOrder" @click="orderToCancel = orderPaginated">Cancel</button>
                            </span>
                        </div>
                    </div>
                    <hr/>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="cancelOrder">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ orderConfirm ? 'Confirm Receipt of product' : 'Cancel order' }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ orderConfirm ? 'Plase make sure you have received before confirming' : 'Are you sure to cancel order?' }}</p>
                        <small v-if="!orderConfirm">Please note that our admin will get back to you to initiate a refund.</small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn cancelOrder" @click="orderConfirm ? confirmOrder() : cancelOrder()">{{ orderConfirm ? 'Confirm' : 'Proceed' }}</button>
                        <button type="button" class="btn cancelOrder btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import moment from "moment";
    export default {
        computed: {},
        name: "OrderComponent",
        data() {
            return {
                message: "",
                orderConfirm: false,
                orderToCancel: {},
            };
        },
        methods: {
            cancelOrder() {
                // Send message to the admin to initiate a delete and start a refund
                let data = {
                    user_id: this.$store.state.user.user_id,
                    order_id: this.orderToCancel.id,
                    message: this.message,
                    admin_id: this.orderToCancel.admins[0].id,
                    'typeof': '1'  // 1 is to cancel orders
                }
                axios.post('/api/notify-cancel', data).then(res => {
                    if (res.data.status == 200) {
                        this.$toasted.show("Order cancelled!", {
                            duration: 2000,
                            position: "top-right",
                        });
                    }
                }).catch(err => {
                    console.log(err);
                })
            },
            confirmOrder() {
                let data = { status: '2' };
                axios
                    .put(`api/order/${this.orderToCancel.id}`, data)
                    .then((res) => {
                        if (res.data.order.status == 2) {
                            window.location.reload();
                        }
                        console.log(res);
                    }).catch(err => {
                        console.log(err);
                    })
            },
            getColor(e) {
                let color = e.product.colors.find(el => el.id == e.color_id);
                return color.name;
            },
            getSize(e) {
                let size = e.product.sizes.find(el => el.id == e.size_id);
                return size != undefined ? size.name : e.size_id;
            },
            moment(arg) {
                return moment(arg);
            },
            totalPrice(amount, qty) {
                let total = amount * qty;

                return total.toLocaleString("en-US", {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2,
                });
            },
            toLocaleStringe(data) {
                let datum = data.toLocaleString("en-US", {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2,
                });
                return datum;
            },
        },
        props: {
            processingOrders: Array,
            completedOrders: Array,
            orderInTransits: Array,
            ordersPaginated: Array,
        },
    };
</script>
<style>
    .cancelOrder {
        padding: 10px 20px;
        border: 1px solid lightgrey;
    }
    .cancelOrder:hover {
        background-color: #f2b8c9;
        color: white;
    }
    .status .ml-auto p {
        font-size: 0.785em;
        line-height: 1.8;
    }
    .m-0 {
        margin: 0 !important;
    }
    @media (max-width: 767px) {
        .d-flex {
            display: block;
        }
        .mtop {
            margin-top: 0px !important;
        }
    }
    @media screen and (min-width: 1366px) {
        .d-flex {
            display: flex;
        }
        .justify-content-center {
            justify-content: center;
        }
        .ml-auto,
        .mx-auto {
            margin-left: auto !important;
        }
    }
    .store__btn .delete__order {
        height: 35px !important;
        line-height: 35px;
        border-radius: 15px;
    }
</style>
<style scoped>
    .card {
        margin: 15px 0px;
    }
    @media (min-width: 768px) {
        .modal-dialog {
            width: 450px;
        }
    }
    @media (min-width: 576px) {
        .modal-dialog-centered {
            min-height: calc(100% - (1.75rem * 2));
        }
    }
    .modal-dialog-centered {
        display: flex;
        align-items: center;
    }
    .modal-header h5 {
        display: inline-block;
    }
    .btn.cancelOrder:hover {
        background-color: #f2b8c9;
    }
    .btn.cancelOrder:focus {
        background-color: #f2b8c9;
        border: 1px solid lightgray;
    }
</style>