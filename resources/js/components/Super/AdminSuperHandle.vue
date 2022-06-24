<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">
                    <div class="shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="
                                card-header
                                py-3
                                d-flex
                                flex-row
                                align-items-center
                                justify-content-between
                            "
                        >
                            <h6
                                class="
                                    m-0
                                    font-weight-bold
                                    text-primary
                                    d-inline-block
                                "
                            >
                                Admins Overview
                            </h6>
                            <div class="dropdown no-arrow right">
                                <a
                                    class="dropdown-toggle"
                                    href="#"
                                    role="button"
                                    id="dropdownMenuLink"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i
                                        class="
                                            fas
                                            fa-ellipsis-v fa-sm fa-fw
                                            text-gray-400
                                        "
                                    ></i>
                                </a>
                                <div
                                    class="
                                        dropdown-menu dropdown-menu-right
                                        shadow
                                        animated--fade-in
                                    "
                                    aria-labelledby="dropdownMenuLink"
                                >
                                    <div class="dropdown-header">Actions:</div>
                                    <a
                                        class="dropdown-item"
                                        href="#"
                                        @click="
                                            (adminsView = false),
                                                (adminAddView = true),
                                                (adminView = false)
                                        "
                                        >New Admin</a
                                    >
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->

                        <div class="card-body p-0">
                            <div class="loadingPage" v-if="loading">
                                <i class="fas fa-spinner fa-spin fa-3x"></i>
                            </div>
                            <div class="card-body" v-else>
                                <div id="addAD" v-if="adminAddView">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h5 class="d-inline-block">
                                                    New Administrator
                                                </h5>
                                                <button
                                                    type="button"
                                                    class="
                                                        btn btn-secondary
                                                        right
                                                    "
                                                    @click="
                                                        (adminAddView = false),
                                                            (adminsView = true)
                                                    "
                                                    style="
                                                        padding: 0.01rem 0.3rem;
                                                    "
                                                >
                                                    x
                                                </button>
                                            </div>
                                            <admin-register-form />
                                        </div>
                                    </div>
                                </div>

                                <div id="viewAdmins" v-else-if="adminsView">
                                    <div v-if="admins.length > 0">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-sm-12 mr-1"
                                                v-for="admin in admins"
                                                :key="admin._id"
                                            >
                                                <div
                                                    class="
                                                        card
                                                        profile-card-3
                                                        cursor-pointer
                                                    "
                                                    @click="getDetails(admin)"
                                                >
                                                    <div
                                                        class="background-block"
                                                    >
                                                        <img
                                                            src="/img/11._grande.jpg"
                                                            alt="profile-sample1"
                                                            class="background"
                                                        />
                                                    </div>
                                                    <div
                                                        class="
                                                            profile-thumb-block
                                                        "
                                                    >
                                                        <img
                                                            v-if="
                                                                admin.profile_img !=
                                                                'undefined'
                                                            "
                                                            :src="
                                                                admin.profile_img
                                                            "
                                                            alt="profile-image"
                                                            class="profile"
                                                            width="100px"
                                                            height="100px"
                                                        />
                                                        <img
                                                            v-else
                                                            src="/img/user.svg"
                                                            alt="profile-image"
                                                            class="profile"
                                                        />
                                                    </div>
                                                    <div class="card-content">
                                                        <h5
                                                            class="
                                                                text-truncate
                                                            "
                                                        >
                                                            {{
                                                                admin.user.email
                                                            }}
                                                        </h5>
                                                        <small
                                                            class="field"
                                                            v-if="
                                                                admin.user
                                                                    .user_type ==
                                                                1
                                                            "
                                                        >
                                                            Admin
                                                            <span
                                                                v-if="
                                                                    admin.role !=
                                                                    null
                                                                "
                                                                >{{
                                                                    admin.role
                                                                        .name
                                                                }}</span
                                                            >
                                                        </small>
                                                        <small
                                                            class="field"
                                                            v-else
                                                            >Tech Admin</small
                                                        >
                                                        <span>{{
                                                            admin.deleted_at !=
                                                            null
                                                                ? "(Suspended)"
                                                                : "(Active)"
                                                        }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="" v-else>
                                        <p class="text-center">
                                            No Admin Added Yet
                                        </p>
                                        <p class="text-center">
                                            <a
                                                class="
                                                    text-center
                                                    text-decoration-none
                                                "
                                                href="#"
                                                @click="
                                                    (adminAddView = true),
                                                        (adminsView = false)
                                                "
                                                >Add New</a
                                            >
                                        </p>
                                    </div>
                                </div>

                                <div id="viewAdmin" v-else-if="adminView">
                                    <i
                                        class="
                                            fas
                                            fa-arrow-circle-left fa-2x
                                            cursor-pointer
                                        "
                                        @click="
                                            (adminView = false),
                                                (adminsView = true)
                                        "
                                    ></i>
                                    <i
                                        v-if="adminClickedOn.deleted_at == null"
                                        class="
                                            fas
                                            fa-trash
                                            cursor-pointer
                                            right
                                        "
                                        data-toggle="modal"
                                        data-target="#deleteAdminModal"
                                    ></i>
                                    <i
                                        v-else
                                        @click="recycle = true"
                                        class="
                                            fas
                                            fa-recycle
                                            cursor-pointer
                                            right
                                        "
                                        title="Acquit Admin/ Reinstate"
                                        data-toggle="modal"
                                        data-target="#deleteAdminModal"
                                    ></i>
                                    <div
                                        class="container"
                                        v-if="
                                            adminClickedOn.user.user_type ==
                                                1 && adminClickedOn.role != null
                                                ? adminClickedOn.role.id == 1
                                                : null
                                        "
                                    >
                                        <!-- Page Heading -->
                                        <div class="row">
                                            <!-- Column -->
                                            <div class="col-lg-4 col-md-6">
                                                <div
                                                    class="card cursor-pointer"
                                                    @click="getAssigned"
                                                >
                                                    <div class="card-body">
                                                        <h4 class="card-title">
                                                            Orders Assigned
                                                        </h4>
                                                        <div class="text-end">
                                                            <span
                                                                class="
                                                                    text-muted
                                                                "
                                                                >Assigned</span
                                                            >
                                                            <h1
                                                                class="
                                                                    font-light
                                                                "
                                                            >
                                                                <span
                                                                    v-if="
                                                                        ordersProcessing.length >
                                                                        0
                                                                    "
                                                                    >{{
                                                                        ordersProcessing.length
                                                                    }}</span
                                                                >
                                                                <span v-else
                                                                    >0</span
                                                                >
                                                            </h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Column -->
                                            <!-- Column -->
                                            <div class="col-lg-4 col-md-6">
                                                <div
                                                    class="card cursor-pointer" 
                                                    @click="getInTransit"
                                                >
                                                    <div class="card-body">
                                                        <h4 class="card-title">
                                                            Orders In transit
                                                        </h4>
                                                        <div class="text-end">
                                                            <span
                                                                class="
                                                                    text-muted
                                                                "
                                                                >Shipped</span
                                                            >
                                                            <h1
                                                                class="
                                                                    font-light
                                                                "
                                                            >
                                                                <span
                                                                    v-if="
                                                                        ordersInTransit.length >
                                                                        0
                                                                    "
                                                                    >{{
                                                                        ordersInTransit.length
                                                                    }}</span
                                                                >
                                                                <span v-else
                                                                    >0</span
                                                                >
                                                            </h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Column -->
                                            <!-- Column -->
                                            <div class="col-lg-4 col-md-6">
                                                <div
                                                    class="card cursor-pointer"
                                                    @click="getCompleted"
                                                >
                                                    <div class="card-body">
                                                        <h4 class="card-title">
                                                            Orders Completed
                                                        </h4>
                                                        <div class="text-end">
                                                            <span
                                                                class="
                                                                    text-muted
                                                                "
                                                                >Completed</span
                                                            >
                                                            <h1
                                                                class="
                                                                    font-light
                                                                "
                                                            >
                                                                <span
                                                                    v-if="
                                                                        ordersCompleted.length >
                                                                        0
                                                                    "
                                                                    >{{
                                                                        ordersCompleted.length
                                                                    }}</span
                                                                >
                                                                <span v-else
                                                                    >0</span
                                                                >
                                                            </h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Column -->
                                        </div>
                                    </div>
                                    <div class="container mt-3">
                                        <div
                                            class="card"
                                            v-if="!updateAdminClickedOn"
                                        >
                                            <div class="card-header">
                                                <p class="d-inline-block">
                                                    Profile
                                                </p>
                                                <div class="d-flex right">
                                                    <i
                                                        class="
                                                            fa fa-edit
                                                            pr-3
                                                            text-gray-400
                                                            cursor-pointer
                                                        "
                                                        @click="
                                                            getAdminToView(
                                                                adminClickedOn
                                                            )
                                                        "
                                                    ></i>
                                                    <div
                                                        class="
                                                            dropdown
                                                            no-arrow
                                                            d-inline-block
                                                        "
                                                        v-if="
                                                            adminClickedOn.user
                                                                .user_type == 1
                                                        "
                                                    >
                                                        <a
                                                            class="
                                                                dropdown-toggle
                                                            "
                                                            href="#"
                                                            role="button"
                                                            id="assignMennuLink"
                                                            data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false"
                                                        >
                                                            <i
                                                                class="
                                                                    fa-fw
                                                                    text-gray-400
                                                                    fa fa-tasks
                                                                    cursor-pointer
                                                                "
                                                                title="Assign a role to this admin"
                                                                aria-hidden="true"
                                                            ></i>
                                                        </a>
                                                        <div
                                                            class="
                                                                dropdown-menu
                                                                dropdown-menu-right
                                                                shadow
                                                                animated--fade-in
                                                            "
                                                            aria-labelledby="assignMennuLink"
                                                        >
                                                            <div
                                                                class="
                                                                    dropdown-header
                                                                "
                                                            >
                                                                Assign role of
                                                                taking:
                                                            </div>
                                                            <a
                                                                class="
                                                                    dropdown-item
                                                                "
                                                                v-for="role in roles"
                                                                :key="role.id"
                                                                href="#"
                                                                @click="
                                                                    assignRole(
                                                                        role
                                                                    )
                                                                "
                                                                >{{
                                                                    role.name
                                                                }}
                                                                <i
                                                                    v-if="
                                                                        adminClickedOn.role !=
                                                                        null
                                                                            ? adminClickedOn
                                                                                  .role
                                                                                  .id ==
                                                                              role.id
                                                                            : null
                                                                    "
                                                                    class="
                                                                        fa
                                                                        fa-check
                                                                        right
                                                                        text-gray-400
                                                                        fa-sm
                                                                    "
                                                                    aria-hidden="true"
                                                                ></i
                                                            ></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <p>
                                                    Email
                                                    <i
                                                        class="fas fa-envelope"
                                                    ></i>
                                                    :
                                                    {{
                                                        adminClickedOn.user
                                                            .email
                                                    }}
                                                </p>
                                                <p>
                                                    Name
                                                    <i class="fas fa-user"></i>
                                                    :
                                                    {{
                                                        adminClickedOn.firstname
                                                    }}
                                                    {{
                                                        adminClickedOn.lastname
                                                    }}
                                                </p>
                                                <p>
                                                    Address
                                                    <i
                                                        class="
                                                            fas
                                                            fa-address-card
                                                        "
                                                    ></i>
                                                    :
                                                    {{ adminClickedOn.address }}
                                                </p>
                                                <p>
                                                    Phone
                                                    <i class="fas fa-phone"></i>
                                                    :
                                                    <a
                                                        :href="
                                                            'tel:' +
                                                            adminClickedOn.phone
                                                        "
                                                        >{{
                                                            adminClickedOn.phone
                                                        }}</a
                                                    >
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card shadow" v-else>
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h6 class="d-inline-block">
                                                        Update Admin
                                                        {{
                                                            adminClickedOn.firstname +
                                                            " " +
                                                            adminClickedOn.lastname
                                                        }}
                                                    </h6>
                                                    <button
                                                        type="button"
                                                        class="
                                                            btn btn-secondary
                                                            right
                                                        "
                                                        @click="
                                                            updateAdminClickedOn = false
                                                        "
                                                        style="
                                                            padding: 0.01rem
                                                                0.3rem;
                                                        "
                                                    >
                                                        x
                                                    </button>
                                                </div>
                                                <admin-register-form
                                                    :adminDet="adminClickedOn"
                                                    :update="update"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div v-else-if="adminOrderView" class="adminOrders">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Order modal -->
        <div
            class="modal fade"
            id="orderModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="orderModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderModalLabel">
                            <!-- Details for {{ orderOpened.orderID }} -->
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

                        <div>
                            <!-- Collapsable Card Example -->
                            <div
                                class="card shadow mb-4"
                                v-for="order in ordersOpened"
                                :key="order.id"
                            >
                                <!-- Card Header - Accordion -->
                                <a
                                    :href="'#' + order.orderID"
                                    class="d-block card-header py-3"
                                    data-toggle="collapse"
                                    role="button"
                                    aria-expanded="true"
                                    :aria-controls="order.orderID"
                                >
                                    <h6
                                        class="
                                            m-0
                                            font-weight-bold
                                            text-primary
                                        "
                                    >
                                        Order ID - {{ order.orderID }}
                                    </h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" :id="order.orderID">
                                    <div class="card-body">
                                        <div class="flexedItem">
                                            <div>
                                                <img
                                                    v-if="order.resources"
                                                    :src="
                                                        '/img/resources/' +
                                                        order.resources
                                                            .images[0].url
                                                    "
                                                    alt=""
                                                />
                                            </div>
                                            <div>
                                                <p>
                                                    Quantity -
                                                    {{ order.quantity }}
                                                </p>
                                                <p>
                                                    Unit Price -
                                                    {{ order.unit_price }}
                                                </p>
                                            </div>
                                            <div>
                                                <p v-if="order.resources">
                                                    {{ order.resources.title }}
                                                </p>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="flexedItem">
                                            <div>
                                                <p>Name:</p>
                                                {{
                                                    order.shippinginfo
                                                        .firstname +
                                                    " " +
                                                    order.shippinginfo.lastname
                                                }}
                                            </div>
                                            <div>
                                                <p>Phone:</p>
                                                {{ order.shippinginfo.phone }}
                                            </div>
                                            <div>
                                                <p>Address:</p>
                                                {{ order.shippinginfo.address }}
                                            </div>
                                            <div>
                                                <p>Postal Code:</p>
                                                {{
                                                    order.shippinginfo
                                                        .postal_code
                                                }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Admin Delete Modal-->
        <div
            class="modal fade"
            id="deleteAdminModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="deleteAdminModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAdminModalLabel">
                            Are you sure to
                            {{ recycle ? "re-admit" : "delete" }}
                            {{ adminClickedOn.firstname }} &nbsp;
                            {{ adminClickedOn.lastname }}?
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
                        {{
                            recycle
                                ? 'Select "Re-admit" below if you are sure to remove above user as admin.'
                                : 'Select "Delete" below if you are sure to remove above user as admin.'
                        }}
                    </div>
                    <div class="modal-footer">
                        <button
                            class="btn btn-secondary"
                            type="button"
                            data-dismiss="modal"
                        >
                            Cancel
                        </button>
                        <a
                            class="btn btn-danger"
                            href="#"
                            @click="removeReadmit"
                            :disabled="registering"
                        >
                            <i
                                class="fas fa-spinner fa-spin"
                                v-if="registering"
                            ></i>
                            {{ recycle ? "Re-admit" : "Delete." }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import AdminRegisterForm from "../Admin/AdminRegisterForm.vue";
    export default {
        components: { AdminRegisterForm },
        name: "AdminSuperHandle",
        props: ["user"],
        data() {
            return {
                // successMessage: "",
                success: "",
                // errorMessage: "",
                // errorMsg: false,
                updateAdminClickedOn: false,
                emailError: "",
                errors: [],
                admins: [],
                admin: {
                    email: "",
                    usertype: "",
                },
                adminAddView: false,
                adminOrderview: false,
                // adminAssigned: false,
                // adminCompleted: false,
                // adminInTransit: false,
                adminsView: true,
                adminView: false,
                adminClickedOn: {},
                recycle: false,
                registering: false,
                roles: [],
                ordersProcessing: [],
                ordersInTransit: [],
                ordersCompleted: [],
                ordersOpened: [],
                update: false,
                loading: false,
            };
        },
        methods: {
            assignRole(el) {
                let data = {
                    admin_id: this.adminClickedOn.id,
                    role_id: el.id,
                };
                axios
                    .post("api/assignRole", data)
                    .then((res) => {
                        if (res.data.status == 1) {
                            this.$toasted.show(
                                `Admin assigned to ${el.name} section`,
                                {
                                    duration: 3000,
                                    position: "top-right",
                                    action: {
                                        text: "Click the back arrow to refresh",
                                        onClick: (e, toastObject) => {
                                            toastObject.goAway(0);
                                        },
                                    },
                                }
                            );
                            this.adminClickedOn = res.data.admins.find(
                                (el) => el.id == this.adminClickedOn.id
                            );
                            window.location.reload();
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getAdmins() {
                this.loading = true;
                axios
                    .get("api/admin")
                    .then((res) => {
                        this.admins =
                            this.user.user_type == 3
                                ? res.data.admins.filter(
                                      (el) =>
                                          el.user.user_type == 1 ||
                                          el.user.user_type == 2
                                  )
                                : res.data.admins.filter(
                                      (el) => el.user.user_type == 1
                                  );
                        this.loading = false;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getAdminToView(data) {
                this.updateAdminClickedOn = true;
                this.update = true;
            },
            getDetails(admin) {
                this.adminsView = false;
                this.adminView = true;
                this.adminAddView = false;
                this.adminClickedOn = admin;
                this.ordersProcessing = admin.orders.filter((el) => el.status == 0);
                this.ordersInTransit = admin.orders.filter((el) => el.status == 1);
                this.ordersCompleted = admin.orders.filter((el) => el.status == 2);
            },
            getAssigned() {
                this.ordersOpened = this.ordersProcessing;
                this.adminView = false;
                this.adminOrderview = true;
                // this.adminAssigned = true;
                // this.adminInTransit = false;
                // this.adminCompleted = false;
            },
            getCompleted() {
                this.ordersOpened = this.ordersCompleted;
                this.adminView = false;
                this.adminOrderview = true;
                // this.adminAssigned = false;
                // this.adminInTransit = false;
                // this.adminCompleted = true;
            },
            getInTransit() {
                this.ordersOpened = this.ordersInTransit;
                this.adminView = false;
                this.adminOrderview = true;
                // this.adminAssigned = false;
                // this.adminInTransit = true;
                // this.adminCompleted = false;
            },
            removeReadmit() {
                this.registering = true;
                if (this.recycle) {
                    axios
                        .patch(`api/admin-refresh/${this.adminClickedOn.id}`)
                        .then((res) => {
                            if (res.status == 201) {
                                this.adminClickedOn.deleted_at = null;
                                this.recycle = false;
                                this.registering = false;
                                this.success = res.data.message;
                                setTimeout(() => {
                                    this.success = false;
                                    $("#deleteAdminModal .close").click();
                                }, 2000);
                            }
                        })
                        .catch((err) => {
                            this.registering = false;
                            console.log(err);
                        });
                } else {
                    axios
                        .delete(`api/admin/${this.adminClickedOn.id}`)
                        .then((res) => {
                            if (res.status == 204) {
                                this.adminClickedOn.deleted_at = new Date();
                                this.registering = false;
                                this.success = "Deleted Success";
                                setTimeout(() => {
                                    this.success = false;
                                    $("#deleteAdminModal .close").click();
                                }, 2000);
                            }
                        })
                        .catch((err) => {
                            this.registering = false;
                            console.log(err);
                        });
                }
            },
            getRoles() {
                axios
                    .get("api/role")
                    .then((res) => {
                        this.roles = res.data.roles;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
        },
        mounted() {
            this.getAdmins();
            this.getRoles();
        },
    };
</script>
<style>
    @media (max-width: 768px) {
        .flexedItem img {
            height: 150px !important;
            width: 125px;
        }
    }
    @media (min-width: 1366px) {
        .flexedItem img {
            height: 100px !important;
        }
    }
    #logoutModal {
        z-index: 999999;
    }
</style>
<style scoped>
    .error {
        font-size: 0.9em;
        color: red;
    }
    .bg-success {
        color: white;
        font-size: 1.2em;
        border-radius: 5px;
        text-align: center;
    }
    .card-link {
        font-size: 0.8rem;
    }
    .field {
        font-size: 1rem;
    }
    /* Profile Cards */
    .profile-card-3 {
        font-family: "Open Sans", Arial, sans-serif;
        position: relative;
        float: left;
        overflow: hidden;
        width: 100%;
        text-align: center;
        height: 220px;
        border: none;
    }
    .profile-card-3 .background-block {
        float: left;
        width: 100%;
        height: 100px;
        overflow: hidden;
    }
    .profile-card-3 .background-block .background {
        width: 100%;
        vertical-align: top;
        opacity: 0.9;
        -webkit-filter: blur(0.5px);
        filter: blur(0.5px);
        -webkit-transform: scale(1.8);
        transform: scale(2.8);
    }
    .profile-card-3 .card-content {
        width: 100%;
        padding: 15px 25px;
        color: #232323;
        float: left;
        background: #efefef;
        height: 50%;
        border-radius: 0 0 5px 5px;
        position: relative;
        /* z-index: 9999; */
    }
    .profile-card-3 .profile {
        border-radius: 50%;
        position: absolute;
        bottom: 50%;
        left: 50%;
        max-width: 100px;
        opacity: 1;
        box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.5);
        border: 2px solid rgba(255, 255, 255, 1);
        -webkit-transform: translate(-50%, 0%);
        transform: translate(-50%, 0%);
        z-index: 99999;
    }
    .profile-card-3 .profile-thumb-block img {
        height: 100px;
    }
    .profile-card-3 h2 {
        margin: 0 0 5px;
        font-weight: 600;
        font-size: 25px;
    }
    .profile-card-3 h2 small {
        display: block;
        font-size: 15px;
        margin-top: 10px;
    }
    .cursor-pointer {
        cursor: pointer;
    }
    .right {
        float: right;
        clear: both;
    }

    @media (min-width: 768px) {
        .col-md-4 {
            flex: 0 0 33.33333%;
            max-width: 19.33333%;
        }
        .profile-card-3 {
            width: 15vw;
        }
    }
</style>