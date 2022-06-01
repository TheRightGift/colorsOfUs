<template>
    <div>
        <div class="card-body">
            <div class="tab-content" id="nav-tabContent">
                <div v-if="isOrdersView">
                    <h4 class="mt-3">All Orders</h4>
                    <order-component
                        :ordersPaginated="ordersPaginated"
                        v-if="ordersPaginated.length > 0"
                    />
                    <div class="text-center p-30" v-else>
                        <p>No Orders Recently</p>
                    </div>
                </div>
                <div v-else-if="isProcessingView">
                    <h4 class="mt-3">Processing</h4>

                    <order-component
                        :processingOrders="processingOrders"
                        v-if="processingOrders.length > 0"
                    />
                    <div class="text-center p-30" v-else>
                        <p>No Orders are currently being processed</p>
                    </div>
                </div>
                <div v-else-if="isInTransitView">
                    <h4 class="mt-3">Order In Transit</h4>

                    <order-component
                        :orderInTransits="orderInTransits"
                        v-if="orderInTransits.length > 0"
                    />
                    <div class="text-center p-30" v-else>
                        <p>No Orders in Transit Recently</p>
                    </div>
                </div>
                <div v-else-if="isCompletedView">
                    <h4 class="mt-3">Completed Orders</h4>

                    <order-component
                        :completedOrders="completedOrders"
                        v-if="completedOrders.length > 0"
                    />
                    <div class="text-center p-30" v-else>
                        <p>No Orders Completed Recently</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import OrderComponent from "./OrderComponent.vue";
    import ShortUniqueId from "short-unique-id";
    export default {
        components: { OrderComponent },
        name: "Order",
        data() {
            return {
                completedOrders: [],
                orderInTransits: [],
                ordersPaginated: [],
                processingOrders: [],
                ordersNotPaginated: [],
                orders: true,
                processing: false,
                inTransit: false,
                completed: false,
            };
        },
        props: [
            "isProcessingView",
            "isCompletedView",
            "isInTransitView",
            "isProcessingView",
            'isOrdersView'
        ],
        methods: {
            checkIfPaymentSuccessful() {
                // CHeck the query params if with ?order
                let params = new URLSearchParams(window.location.search);
                let status = params.get("status");
                if (
                    params.has("order") &&
                    params.has("status") &&
                    status == "successful"
                ) {
                    const uid = new ShortUniqueId({ length: 10 });
                    let data = {
                        orderID: uid(),
                        customer_id: this.$store.state.customer,
                        cart: this.$store.state.cart,
                        shippinginfo_id: this.$store.state.shippingInfo.id
                    };
                    axios
                        .post("api/order", data)
                        .then((res) => {
                            if (res.data.status == 201) {
                                this.$store.commit("clearCart");
                                window.location.replace('/dashboard?order')
                                this.getAllOrders();
                            }
                        })
                        .catch((err) => {
                            console.log(err);
                        });
                }
            },
            getAllOrders() {
                axios
                    .get(`api/shipping/${this.$store.state.user.user_id}`)
                    .then((res) => {
                        this.ordersPaginated = res.data.shippinginfo[0].order;
                        this.completedOrders = this.ordersPaginated.filter(
                            (el) => el.status == 2 && el.deleted_at == null
                        );
                        this.processingOrders = this.ordersPaginated.filter(
                            (el) => el.status == 0 && el.deleted_at == null
                        );
                        this.orderInTransits = this.ordersPaginated.filter(
                            (el) => el.status == 1 && el.deleted_at == null
                        );
                        this.ordersNotPaginated = this.ordersPaginated;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            generateOrderID() {
                var arr = [];
                while (arr.length < 8) {
                    var randomnumber = Math.ceil(Math.random() * 100);
                    if (arr.indexOf(randomnumber) === -1) {
                        arr.push(randomnumber);
                    }
                }
            },
        },
        mounted() {
            this.checkIfPaymentSuccessful();
            this.getAllOrders();
            this.generateOrderID();
        },
    };
</script>
<style scoped>
    li {
        padding: 0 20px;
    }
    .p-30 {
        padding: 30px;
    }
</style>