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
                            <h1 class="h3 mb-0 text-gray-800">Orders</h1>
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
                                            All Orders
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <p class="center bg-success" v-if="success != ''">
                                            <i class="text-white">{{success}}</i>
                                        </p>
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
                                                            Ordered On
                                                        </th>
                                                        <th scope="col">
                                                            Extras
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- <tr v-for="(order, index) in orders.data" :key="order.id" @click="getFullDet(order)" data-toggle="modal"
                                                    data-target="#orderModal"> -->
                                                    <tr v-for="(order, index) in orders.data" :key="order.id" @click="getFullDet(order)">
                                                        <th scope="row">{{index + 1}}</th>
                                                        <td>{{order.orderID}}</td>
                                                        <td v-if="order.status == 2">Completed</td>
                                                        <td v-if="order.status == 1">In Transit</td>
                                                        <td v-if="order.status == 0">Processing</td>
                                                        <td>{{moment(order.created_at).format('lll')}}</td>
                                                        <td>
                                                            <i class="fas fa-trash cursor-pointer" @click="deleteOrder(order.id)"></i> 
                                                            <!-- v-if="order.notification != null" -->
                                                        </td>
                                                    </tr>
                                                    <tr v-if="orders.data == []">No Orders recently</tr>
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
                                                    ) in orders.links"
                                                    :key="index"
                                                    :class="{
                                                        active: pages.active,
                                                        disabled:
                                                            pages.url == null,
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
                                                        @click="
                                                            paginate(pages.url)
                                                        "
                                                    ></a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                            <h5 class="modal-title" id="orderModalLabel">
                                You are viewing details for {{order.orderID}}
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
                            // TODO: Merge items where orderID are same.
                            <div>
                                Ordered Details will display here
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import moment from 'moment';
    import NavbarComponent from "../Super/NavbarComponent.vue";
    import FooterComponent from "../Super/FooterComponent.vue";
    import SidebarComponent from "../Super/SidebarComponent.vue";
    export default {
        components: {
            NavbarComponent,
            FooterComponent,
            SidebarComponent,
        },
        name: "Customer",
        data() {
            return {
                order: {},
                loading: false,
                requesting: false,
                success: '',
                orders: [],
            };
        },
        methods: {
            deleteOrder(id) {
                axios.delete(`api/order/${id}`).then(res => {
                    if (res.status == 204) {
                        const findId = (rol) => rol.id === id;
                        this.success = 'Order Deleted';
                        window.scroll(0, 10);
                        this.orders.data.splice(
                            this.orders.data.findIndex(findId),
                            1
                        );
                        setTimeout(() => {
                            this.success = '';
                        }, 2000);
                    }
                }).catch(err => {
                    console.log(err);
                })
            },
            getCustomers() {
                axios.get(`api/order-home`).then(res => {
                    this.orders = res.data.orders;
                    this.loading = false;
                }).catch(err => {
                    console.log(err);
                })
            },
            getFullDet(order) {
                this.order = order;
            },
            moment(arg) {
                return moment(arg);
            },
            paginate(url) {
                axios
                    .get(url)
                    .then((res) => {
                        this.orders = res.data.orders;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            restoreUser(order) {
                axios
                    .patch(`api/order/${order.id}`)
                    .then((res) => {
                        if (res.status == 201) {
                            this.orders.push(order);
                            this.orderTrashed.splice(
                                this.orderTrashed.findIndex(
                                    (order) => order.id === order.id
                                ),
                                1
                            );
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
        },
        mounted() {
            this.getCustomers();
        },
    };
</script>
<style scoped>
    .cursor-pointer {
        cursor: pointer;
    }
    .card-img-top {
        height: 125px !important;
    }
</style>