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
                            <p>{{ processingOrder.product.title }} <span v-if="processingOrder.color_id != null || processingOrder.size_id != null"></span> {{ processingOrder.color_id ? getColor(processingOrder) : '' }} <span v-if="processingOrder.color_id != null && processingOrder.size_id != null">/</span> {{ processingOrder.size_id ? getSize(processingOrder) : '' }} </p>
                            <p>
                                &#8358;{{
                                    toLocaleStringe(processingOrder.unit_price, processingOrder.discount)
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
                                        processingOrder.quantity,
                                        processingOrder.discount
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
                            <p>{{ orderInTransit.product.title }} <span v-if="orderInTransit.color_id != null || orderInTransit.size_id != null">-</span> {{ orderInTransit.color_id ? getColor(orderInTransit) : '' }} <span v-if="orderInTransit.color_id != null && orderInTransit.size_id != null">/</span> {{ orderInTransit.size_id ? getSize(orderInTransit) : '' }} </p>
                            <p>
                                &#8358;{{
                                    toLocaleStringe(orderInTransit.unit_price, orderInTransit.discount)
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
                                        orderInTransit.quantity,
                                        orderInTransit.discount
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
                            <p>{{ completedOrder.product.title }} <span v-if="completedOrder.color_id != null || completedOrder.size_id != null">-</span> {{ completedOrder.color_id ? getColor(completedOrder) : '' }} <span v-if="completedOrder.color_id != null && completedOrder.size_id != null">/</span> {{ completedOrder.size_id ? getSize(completedOrder) : '' }} </p>
                            <p>
                                &#8358;{{
                                    toLocaleStringe(
                                        completedOrder.unit_price, completedOrder.discount
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
                                        completedOrder.quantity,
                                        completedOrder.discount
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
                            <p>{{ orderPaginated.product.title }} <span v-if="orderPaginated.color_id != null || orderPaginated.size_id != null">-</span> {{ orderPaginated.color_id ? getColor(orderPaginated) : '' }} <span v-if="orderPaginated.color_id != null && orderPaginated.size_id != null">/</span> {{ orderPaginated.size_id ? getSize(orderPaginated) : '' }}</p>
                            <p>
                                &#8358;{{
                                    toLocaleStringe(orderPaginated.unit_price, orderPaginated.discount)
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
                                        orderPaginated.quantity,
                                        orderPaginated.discount
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
                        <button type="button" id="clcik" class="btn cancelOrder btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import moment, { now } from "moment";
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
                    message: `
                        Good day coloursofus, this is to notify you of an order cancellation with details
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>OrderId</th>
                                        <th>User</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Quantity</th>
                                        <th>Amount(Refundable)</th>
                                        <th>Product</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#${this.orderToCancel.orderID}</td>
                                        <td>${this.$store.state.user.firstname + ' ' + this.$store.state.user.lastname}</td>
                                        <td><span class="text-muted"><i class="fa fa-clock-o"></i>${moment(this.orderToCancel.created_at).format('ll')}</span> </td>
                                        <td>&#8358;${this.orderToCancel.discount == null ? this.orderToCancel.unit_price : this.discount(this.orderToCancel.discount, this.orderToCancel.unit_price)}</td>
                                        <td>${this.orderToCancel.quantity}</td>
                                        <td>&#8358;${this.orderToCancel.discount == null ? this.orderToCancel.unit_price * this.orderToCancel.quantity : this.discount(this.orderToCancel.discount, this.orderToCancel.unit_price) * this.orderToCancel.quantity}</td>
                                        <td>
                                            ${this.orderToCancel.product.title}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        This order has been automatically deleted!, reach out to the user to resolve refund using the email above.
                        `,
                    admin_id: this.orderToCancel.admins[0].id,
                    title: 'Order Cancellation',
                    'typeof': '1'  // 1 is to cancel orders
                }
                axios.post('/api/notify-cancel', data).then(res => {
                    if (res.data.status == 200) {
                        this.$toasted.show("Order cancelled!", {
                            duration: 2000,
                            position: "top-right",
                        });
                        this.orderToCancel.deleted_at = moment();
                        document.getElementById('clcik').click();
                    }
                }).catch(err => {
                    console.log(err);
                })
            },
            discount(disc, e) {
                let discount = (disc / 100) * e;
                let newPrice = e - Math.round(discount);
                return Math.round(newPrice);
            },
            confirmOrder() {
                let data = { status: '2' };
                axios
                    .put(`api/order/${this.orderToCancel.id}`, data)
                    .then((res) => {
                        if (res.data.order.status == 2) {
                            window.location.reload();
                            document.getElementById('clcik').click();
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
            totalPrice(amount, qty, discount) {
                let total = discount == null ? amount * qty : this.discount(discount, amount) * qty;
                
                return total.toLocaleString("en-US", {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2,
                });
            },
            toLocaleStringe(data, discount) {
                let discounted = discount == null ? data : this.discount(discount, data);
                let datum = discounted.toLocaleString("en-US", {
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