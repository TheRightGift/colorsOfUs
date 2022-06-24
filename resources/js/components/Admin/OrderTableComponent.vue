<template>
    <div>
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
                                                recent[0].shippinginfo.lastname
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
                                            {{ totalProductPerOrder(recent) }}
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
                                                        getOrdersSummary(recent)
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
</template>
<script>
    export default {
        data() {
            return {
                searchVal: "",
            }
        },
        methods: {
            getOrdersSummary(recent) {
                this.$emit('getOrdersSummary', recent);
            },
            search() {
                this.$emit('search', this.searchVal);
            },
        },
        name: "OrderTable",
        props: ["onChangePage", "pageOfItems", "isWhatOrder", "ordersView", "recentOrders", "moment", "totalPrice", "totalProductPerOrder"],
    };
</script>