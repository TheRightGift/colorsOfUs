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
                                            All Customer
                                        </h6>
                                    </div>
                                    <div class="card-body">
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
                                                            Email
                                                        </th>
                                                        <th scope="col">
                                                            Status
                                                        </th>
                                                        <th scope="col">
                                                            Registered On
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
                                                            getFullDet(user)
                                                        "
                                                        data-toggle="modal"
                                                        data-target="#customerModal"
                                                    >
                                                        <th scope="row">
                                                            {{ index + 1 }}
                                                        </th>
                                                        <td>
                                                            {{ user.email }}
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
                                                                ).format("lll")
                                                            }}
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
                                        <tbody v-if="customer.customer.orders">
                                            <tr
                                                v-for="(
                                                    customer, index
                                                ) in customer.customer.orders"
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
    export default {
        components: {
            NavbarComponent,
            FooterComponent,
            SidebarComponent,
        },
        name: "Customer",
        data() {
            return {
                customer: {},
                loading: false,
                requesting: false,
                success: "",
                users: [],
            };
        },
        methods: {
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
</style>
<style scoped>
    .flexedItem {
        font-family: Shift-Light;
    }
    .cursor-pointer {
        cursor: pointer;
    }
    .card-img-top {
        height: 125px !important;
    }
</style>