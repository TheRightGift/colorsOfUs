<template>
    <div>
        <div class="content">
            <div class="mb-4">
                <nav
                    style="--bs-breadcrumb-divider: '>'"
                    aria-label="breadcrumb"
                >
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#" @click="backToOrders()">
                                <i class="bi bi-globe2 small me-2"></i>
                                {{ orderDetails[0].orderID }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Order Detail
                        </li>
                    </ol>
                </nav>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div
                                class="
                                    mb-5
                                    d-flex
                                    align-items-center
                                    justify-content-between
                                "
                            >
                                <span
                                    >Order No :
                                    <a href="#"
                                        >#{{ orderDetails[0].orderID }}</a
                                    ></span
                                >
                                <span
                                    class="badge bg-primary"
                                    v-if="orderDetails[0].status == 2"
                                    >Completed</span
                                >
                                <span
                                    class="badge bg-info"
                                    v-if="orderDetails[0].status == 0"
                                    >Pending</span
                                >
                                <span
                                    class="badge bg-dark"
                                    v-if="orderDetails[0].status == 1"
                                    >Shipped</span
                                >
                            </div>
                            <div class="row mb-5 g-4">
                                <div class="col-md-3 col-sm-6">
                                    <p class="fw-bold">Order Created at</p>
                                    {{
                                        moment(
                                            orderDetails[0].created_at
                                        ).format("ll")
                                    }}
                                    at
                                    {{
                                        moment(
                                            orderDetails[0].created_at
                                        ).format("H:mm A")
                                    }}
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <p class="fw-bold">Name</p>
                                    {{
                                        orderDetails[0].shippinginfo.firstname +
                                        " " +
                                        orderDetails[0].shippinginfo.lastname
                                    }}
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <p class="fw-bold">Email</p>
                                    {{
                                        orderDetails[0].shippinginfo.user.email
                                    }}
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <p class="fw-bold">Contact No</p>
                                    {{ orderDetails[0].shippinginfo.phone }}
                                </div>
                            </div>
                            <div class="row g-4">
                                <div class="col-md-6 col-sm-12">
                                    <div class="card">
                                        <div
                                            class="
                                                card-body
                                                d-flex
                                                flex-column
                                                gap-3
                                            "
                                        >
                                            <div
                                                class="
                                                    d-flex
                                                    justify-content-between
                                                "
                                            >
                                                <h5 class="mb-0">
                                                    Delivery Address
                                                </h5>
                                            </div>
                                            <div>
                                                Name:
                                                {{
                                                    orderDetails[0].shippinginfo
                                                        .firstname +
                                                    " " +
                                                    orderDetails[0].shippinginfo
                                                        .lastname
                                                }}
                                            </div>
                                            <div>
                                                {{
                                                    orderDetails[0].shippinginfo
                                                        .address +
                                                    ", " +
                                                    orderDetails[0].shippinginfo
                                                        .city
                                                }}
                                            </div>
                                            <div>
                                                {{
                                                    orderDetails[0].shippinginfo
                                                        .lga.name +
                                                    ", " +
                                                    orderDetails[0].shippinginfo
                                                        .state.name +
                                                    "."
                                                }}
                                            </div>
                                            <div>
                                                <i
                                                    class="
                                                        mdi mdi-cellphone-basic
                                                        me-2
                                                    "
                                                ></i>
                                                {{
                                                    orderDetails[0].shippinginfo
                                                        .phone
                                                }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card widget">
                        <h5 class="card-header">Order Items</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-custom mb-0">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price(&#8358;)</th>
                                            <th>Total(&#8358;)</th>
                                            <th>Size</th>
                                            <th>Color</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="(order, index) in orderDetails"
                                            :key="order.id"
                                        >
                                            <td>
                                                <a href="#">
                                                    <img
                                                        v-if="order.product"
                                                        :src="
                                                            order.product
                                                                .images[0].url
                                                        "
                                                        class="rounded"
                                                        width="60"
                                                        :alt="
                                                            order.product.title
                                                        "
                                                    />
                                                </a>
                                            </td>
                                            <td>{{ order.product.title }}</td>
                                            <td>{{ order.quantity }}</td>
                                            <td>
                                                &#8358; {{ singlePrice(order) }}
                                            </td>
                                            <td>
                                                &#8358;
                                                {{
                                                    singlePrice(
                                                        order,
                                                        order.quantity
                                                    )
                                                }}
                                            </td>
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
                                            <td v-if="order.status <= 1" :id="index">
                                                <div
                                                    class="
                                                        form-check form-switch
                                                    "
                                                >
                                                    <input
                                                        type="checkbox"
                                                        :value="order.status"
                                                        :checked="checked(order.status)"
                                                        :true-value="
                                                            checked(order.status)
                                                        "
                                                        :false-value="
                                                           checked(order.status)
                                                        "
                                                        class="form-check-input"
                                                        id="customSwitch1"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#warnBeforeSave"
                                                        @click="getOrder(order, index)"
                                                    />
                                                    <i class="fa fa-spinner fa-spin hide" aria-hidden="true"></i>
                                                    <!-- <label class="form-check-label" for="customSwitch1">Toggle this switch element</label> -->
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mt-4 mt-lg-0">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h6 class="card-title mb-4">Price</h6>
                            <div class="row justify-content-center mb-3">
                                <div class="col-4 text-end">Sub Total :</div>
                                <div class="col-4">
                                    &#8358; {{ totalPrice(orderDetails) }}
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3">
                                <div class="col-4 text-end">Shipping :</div>
                                <div class="col-4">-</div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-4 text-end">
                                    <strong>Total :</strong>
                                </div>
                                <div class="col-4">
                                    <strong
                                        >&#8358;
                                        {{ totalPrice(orderDetails) }}</strong
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            id="warnBeforeSave"
            class="modal bs-example-modal-sm"
            tabindex="-1"
            role="dialog"
            aria-labelledby="vcenter"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title mySmallModalLabel" id="vcenter">
                            Update Product Order
                        </h4>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-hidden="true"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <h4>Are you sure to update product order?</h4>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn waves-effect waves-light btn-secondary"
                            data-bs-dismiss="modal"
                            @click.prevent="
                                markInTransit(
                                    order,
                                    order.status == '0' ? '1' : '0'
                                )
                            "
                        >
                            Update
                        </button>
                        <button
                            type="button"
                            class="btn waves-effect waves-light btn-info"
                            data-bs-dismiss="modal"
                        >
                            Close
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</template>
<script>
    export default {
        name: "OrderDetails",
        data() {
            return {
                order: {},
            };
        },
        props: [
            "orderDetails",
            "moment",
            "discount",
            "totalPrice",
            "formatPrice",
            "markInTransit",
        ],
        methods: {
            backToOrders() {
                this.$emit("closeOrderDetails");
            },
            checked(check) {
                if (check == 1) {
                    return true;
                }
                else return false;
            },
            getColor(e) {
                let color = e.product.colors.find((el) => el.id == e.color_id);
                return color.name;
            },
            getOrder(order, index) {
                this.order = order;
                this.$emit('indexId', index);
            },
            getSize(e) {
                let size = e.product.sizes.find((el) => el.id == e.size_id);
                return size != undefined ? size.name : e.size_id;
            },
            singlePrice(order, qty) {
                let totalAmt = 0;
                if (order.discount == null) {
                    totalAmt = totalAmt + order.unit_price;
                } else if (order.discount != null) {
                    let disc = this.discount(order.discount, order.unit_price);
                    totalAmt = totalAmt + disc;
                }
                qty != undefined ? (totalAmt = totalAmt * qty) : "";
                return this.formatPrice(totalAmt);
            },
        },
    };
</script>
<style scoped>
    .card .card {
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 1rem;
    }
    .btn-info {
        background-color: #5e9ada;
    }
    .btn:hover {
        background-color: #5e9ada !important;
    }
    .hide {
        display: none;
    }
</style>