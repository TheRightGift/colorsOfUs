<template>
    <div>
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Dashboard</h4>
            </div>
        </div>
        <!-- Info box Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Custom Orders</h4>
                        <h6 class="card-subtitle">
                            View all orders that are customized for size.
                        </h6>
                        <div class="loadingPage" v-if="loading">
                            <a href="#">
                                <i class="fas fa-spinner fa-spin fa-3x"></i>
                            </a>
                        </div>
                        <div class="table-responsive" v-else>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>OrderID</th>
                                        <th>User</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th
                                            title="If product is marked finished"
                                        >
                                            UnFinished
                                        </th>
                                        <th></th>
                                        <th
                                            data-bs-toggle="tooltip"
                                            title="Send approx time to finish producing product requested"
                                        >
                                            Time to finish
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(order, index) in orderCustomized.data"
                                        :key="order.id"
                                    >
                                        <td>
                                            <a href="#!"
                                                >Order #{{ order.orderID }}</a
                                            >
                                        </td>
                                        <td>
                                            {{
                                                order.shippinginfo.firstname +
                                                " " +
                                                order.shippinginfo.lastname
                                            }}
                                        </td>
                                        <td>
                                            <span class="text-muted"
                                                ><i class="fa fa-clock-o"></i>
                                                {{
                                                    moment(
                                                        order.created_at
                                                    ).format("ll")
                                                }}</span
                                            >
                                        </td>
                                        <td>
                                            <span
                                                class="badge bg-primary"
                                                v-if="order.status == 2"
                                                >Completed</span
                                            >
                                            <span
                                                class="badge bg-info"
                                                v-if="order.status == 0"
                                                >Pending</span
                                            >
                                            <span
                                                class="badge bg-dark"
                                                v-if="order.status == 1"
                                                >Shipped</span
                                            >
                                        </td>
                                        <td>
                                            {{ order.size_id }}
                                        </td>
                                        <td>
                                            {{
                                                order.color_id
                                                    ? getColor(order)
                                                    : "-"
                                            }}
                                        </td>
                                        <td>
                                            {{ isFinished(order) }}
                                        </td>
                                        <td>
                                            <input
                                                type="checkbox"
                                                name="expired"
                                                value="1"
                                                v-if="isFinished(order)"
                                                @change="markFinished(order)"
                                            />
                                        </td>
                                        <td :id="index">
                                            <input
                                                @keyup.enter="
                                                    updateTimeToFinish(order, index)
                                                "
                                                type="number"
                                                placeholder="Days"
                                                v-model="order.time_to_finish_customized"
                                                v-if="
                                                    isFinished(order)
                                                "
                                            />
                                            <span v-else>{{
                                                order.time_to_finish_customized
                                            }}</span>
                                            <i
                                                class="fas fa-spinner fa-spin hide"
                                            ></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li
                                        class="page-item"
                                        v-for="(
                                            pages, index
                                        ) in orderCustomized.links"
                                        :key="index"
                                        :class="{
                                            active: pages.active,
                                            disabled: pages.url == null,
                                        }"
                                    >
                                        <span
                                            class="page-link"
                                            v-if="pages.active"
                                            v-html="pages.label"
                                        >
                                            <span class="sr-only"
                                                >(current)</span
                                            >
                                        </span>
                                        <a
                                            class="page-link"
                                            href="#"
                                            v-else
                                            v-html="pages.label"
                                            @click="paginate(pages.url)"
                                        ></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
    </div>
</template>
<script>
    import moment from "moment";

    export default {
        data() {
            return {
                loading: false,
                orderCustomized: [],
            };
        },
        name: "ProductAdmin",
        methods: {
            getAllOrders() {
                this.loading = true;
                axios
                    .get("/api/order-home")
                    .then((res) => {
                        this.orderCustomized = res.data.orderCustomized;
                        this.loading = false;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getColor(e) {
                let color = e.product.colors.find((el) => el.id == e.color_id);
                return color.name;
            },
            isFinished(e) {
                if (e.is_finished == 1) {
                    return true;
                } else return false;
            },
            markFinished(e) {
                axios
                    .put(`/api/markFinished/${e.id}`, { is_finished: 0 })
                    .then((res) => {
                        if (res.data.status == 200) {
                            e.is_finished = 0;
                            this.$toasted.show("Change effected!", {
                                duration: 2000,
                                position: "top-right",
                            });
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            moment(arg) {
                return moment(arg);
            },
            paginate(url) {
                this.loading = true;
                axios
                    .get(url)
                    .then((res) => {
                        this.orderCustomized = res.data.orderCustomized;
                        this.loading = false;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            updateTimeToFinish(order, index) {
                let element = document.getElementById(`${index}`);
                if (order.time_to_finish_customized != null) {
                    element.lastElementChild.classList.remove('hide');
                    element.firstElementChild.removeAttribute('class', 'errorDays');
                    element.firstElementChild.setAttribute('disabled', true);
                    let data = { time_to_finish_customized: order.time_to_finish_customized, user: order.shippinginfo.user_id };
                    axios.put(`api/order/${order.id}`, data).then((res) => {
                        if (res.data.order) {
                            element.lastElementChild.classList.add('hide');
                            element.firstElementChild.removeAttribute('disabled', true);
                            this.$toasted.show("Change effected!, <small>User will be notified</small>", {
                                duration: 2000,
                                position: "top-right",
                            });
                        }

                    });
                } else {
                    element.firstElementChild.setAttribute('class', 'errorDays');
                }
            },
        },
        mounted() {
            this.getAllOrders();
        },
    };
</script>
<style scoped>
    input[type="number"] {
        width: 80px;
    }
    .errorDays {
        border-color: red;
    }
    .hide {
        display: none;
    }
</style>