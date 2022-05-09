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
                            <p>{{ processingOrder.product.title }}</p>
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
                            <button class="deleteOrder">Delete</button>
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
                            <p v-if="orderPaginated.status == 2">
                                <b>Finsihed</b>
                            </p>
                            <p v-else-if="orderPaginated.status == 1">
                                <b>Shipped</b>
                            </p>
                            <p v-else-if="orderPaginated.status == 0">
                                <b>Processing</b>
                            </p>
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
                            <p>{{ orderPaginated.product.title }}</p>
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
                                &#8358;{{
                                    totalPrice(
                                        orderPaginated.unit_price,
                                        orderPaginated.quantity
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
    </div>
</template>
<script>
    import moment from "moment";
    export default {
        computed: {},
        name: "OrderComponent",
        data() {
            return {};
        },
        methods: {
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
</style>