<template>
    <div>
        <!-- Page Wrapper -->

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
                <h1 class="h3 mb-0 text-gray-800">Admins</h1>
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
                                flex-row
                                align-items-center
                                justify-content-between
                            "
                        >
                            <h6 class="m-0 font-weight-bold text-primary">
                                All Admins
                            </h6>
                            <div class="dropdown no-arrow">
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
                                        data-toggle="modal"
                                        data-target="#rolesModal"
                                        >Roles</a
                                    >
                                    <!-- <a class="dropdown-item" href="#">Another action</a> -->
                                    <div class="dropdown-divider"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Firstname</th>
                                            <th scope="col">Lastname</th>
                                            <th scope="col">Roles</th>
                                            <th scope="col" colspan="3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="(admin, index) in admins"
                                            :key="admin.id"
                                        >
                                            <th scope="row">
                                                {{ index + 1 }}
                                            </th>
                                            <td>
                                                {{ admin.firstname }}
                                            </td>
                                            <td>
                                                {{ admin.lastname }}
                                            </td>
                                            <td>
                                                {{
                                                    admin.role == null
                                                        ? "null"
                                                        : admin.role.name
                                                }}
                                            </td>
                                            <td v-if="admin.deleted_at == null">
                                                <i
                                                    class="
                                                        fas
                                                        fa-edit
                                                        cursor-pointer
                                                    "
                                                    data-toggle="modal"
                                                    data-target="#adminRolesModal"
                                                    @click="
                                                        editAdminRole(admin)
                                                    "
                                                ></i>
                                            </td>
                                            <td v-if="admin.deleted_at == null">
                                                <i
                                                    class="
                                                        fas
                                                        fa-trash
                                                        cursor-pointer
                                                    "
                                                    @click="trashAdmin(admin)"
                                                ></i>
                                            </td>
                                            <td v-else>Admin is Suspended</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Roles Modal -->
        <div
            class="modal fade"
            id="rolesModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="rolesModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5
                            class="modal-title"
                            id="rolesModalLabel"
                            v-if="addRole"
                        >
                            {{ update ? "Update Role" : "Enter A New Role" }}
                        </h5>
                        <h5
                            class="modal-title"
                            id="rolesModalLabel"
                            v-else-if="roleView"
                        >
                            All Role
                        </h5>
                        <h5 class="modal-title" id="rolesModalLabel" v-else>
                            Trashed
                        </h5>
                        <a
                            href="#!"
                            class="btn btn-light"
                            @click="(addRole = true), (roleView = false)"
                            >Add Role</a
                        >
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
                        <div class="formRole" v-if="addRole || update">
                            <div class="bg-success" v-if="success != ''">
                                <p>{{ success }}</p>
                            </div>
                            <form @submit.prevent="createRole">
                                <div class="form-group col-md-8">
                                    <label for="grid-role"> Role </label>
                                    <input
                                        class="form-control"
                                        id="grid-role"
                                        type="text"
                                        placeholder="Role"
                                        v-model="role.name"
                                        required
                                    />
                                </div>
                                <button
                                    class="btn btn-primary"
                                    type="submit"
                                    :disabled="requesting"
                                >
                                    <i
                                        class="fas fa-spinner fa-spin"
                                        v-if="requesting"
                                    ></i>
                                    Submit
                                </button>
                            </form>
                        </div>
                        <div class="formTable" v-else-if="roleView">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(role, index) in roles"
                                        :key="role.id"
                                    >
                                        <th scope="row">{{ index + 1 }}</th>
                                        <td>{{ role.name }}</td>
                                        <td>
                                            <i
                                                class="
                                                    fas
                                                    fa-trash
                                                    cursor-pointer
                                                "
                                                @click="trashRole(role)"
                                            ></i>
                                        </td>
                                        <td>
                                            <i
                                                class="
                                                    fas
                                                    fa-edit
                                                    cursor-pointer
                                                "
                                                @click="editRole(role)"
                                            ></i>
                                        </td>
                                    </tr>
                                    <tr
                                        v-if="roles.length == 0"
                                        class="text-center"
                                    >
                                        No Roles Found
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="recycleTable" v-else-if="roleViewTrashed">
                            <p
                                v-if="success != ''"
                                class="bg-success text-white p-3"
                            >
                                {{ success }}
                            </p>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(role, index) in roleTrashed"
                                        :key="role.id"
                                    >
                                        <th scope="row">{{ index + 1 }}</th>
                                        <td>{{ role.name }}</td>
                                        <td>
                                            <i
                                                class="
                                                    fas
                                                    fa-redo
                                                    cursor-pointer
                                                "
                                                @click="refresh(role)"
                                            ></i>
                                        </td>
                                    </tr>
                                    <tr
                                        v-if="roleTrashed.length == 0"
                                        class="text-center"
                                    >
                                        No Trashed Roles Found
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            class="btn btn-light"
                            type="button"
                            @click="getTrashed"
                        >
                            View Trashed
                        </button>
                        <button
                            class="btn btn-secondary"
                            type="button"
                            data-dismiss="modal"
                            @click="
                                (roleViewTrashed = false),
                                    (addRole = false),
                                    (roleView = true)
                            "
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Admin Roles Modal -->
        <div
            class="modal fade"
            id="adminRolesModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="adminRolesModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="adminRolesModalLabel">
                            Update Role
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
                        <p
                            class="bg-success text-white p-3"
                            v-if="success != ''"
                        >
                            {{ success }}
                        </p>
                        <p>
                            <b
                                >Update Role for
                                {{ admin.firstname + " " + admin.lastname }}</b
                            >
                        </p>
                        <form @submit.prevent="updateRole">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1"
                                    >Role select</label
                                >
                                <select
                                    class="form-control"
                                    id="exampleFormControlSelect1"
                                    v-model="adminRole"
                                >
                                    <option selected disabled value="">
                                        Select Role
                                    </option>
                                    <option
                                        v-for="role in roles"
                                        :key="role.id"
                                        :value="role.id"
                                    >
                                        {{ role.name }}
                                    </option>
                                </select>
                            </div>
                            <button
                                class="btn btn-primary"
                                type="submit"
                                :disabled="requesting"
                            >
                                <i
                                    class="fas fa-spinner fa-spin"
                                    v-if="requesting"
                                ></i>
                                Change
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
   
<script>
    export default {
        name: "AdminTecHandle",
        data() {
            return {
                admin: {},
                admins: [],
                adminRole: "",
                role: {},
                roles: [],
                addRole: false,
                roleView: true,
                roleViewTrashed: false,
                update: false,
                success: "",
                requesting: false,
                roleTrashed: [],
            };
        },
        methods: {
            checkIfRegisteredDetails() {
                axios.get(`api/admin/${this.$store.state.user.id}`).then((res) => {
                    if (res.data.admin == null) {
                        // Open the update details page to update the form
                        window.location.replace("/profile");
                    }
                });
            },
            createRole() {
                let url;
                let axiosFunction;
                if (this.update == true) {
                    url = `api/role/${this.role.id}`;
                    axiosFunction = axios.put;
                } else {
                    url = "api/role";
                    axiosFunction = axios.post;
                }
                this.requesting = true;
                axiosFunction(url, this.role)
                    .then((res) => {
                        if (res.data.status == 1) {
                            this.success = this.update
                                ? "Update Success"
                                : res.data.message;
                            setTimeout(() => {
                                this.roles = res.data.roles;
                                this.addRole = false;
                                this.roleView = true;
                                this.success = "";
                                this.requesting = false;
                                this.update = false;
                                this.role = {};
                            }, 1000);
                        }
                    })
                    .catch((err) => {
                        this.requesting = false;
                        console.log(err);
                    });
            },
            editAdminRole(admin) {
                this.admin = admin;
                console.log(admin);
            },
            editRole(role) {
                this.addRole = true;
                this.update = true;
                this.roleViewTrashed = false;
                this.role = role;
            },
            getAdmins() {
                axios
                    .get("api/admin")
                    .then((res) => {
                        this.admins = res.data.admins.filter(
                            (el) => el.user.user_type == 1
                        );
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getRoles() {
                axios
                    .get("api/role")
                    .then((res) => {
                        this.roles = res.data.roles.filter(
                            (el) => el.deleted_at == null
                        );
                        this.roleTrashed = res.data.roles.filter(
                            (el) => el.deleted_at != null
                        );
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getTrashed() {
                this.roleViewTrashed = true;
                this.roleView = false;
                this.addRole = false;
                this.update = false;
            },
            refresh(role) {
                axios
                    .patch(`api/role/${role.id}`)
                    .then((res) => {
                        if (res.status == 201) {
                            this.roles.push(role);
                            this.roleTrashed.splice(
                                this.roleTrashed.findIndex(
                                    (rol) => rol.id === role.id
                                ),
                                1
                            );
                            this.success = res.data.message;
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            trashAdmin(admin) {
                axios
                    .delete(`api/admin/${admin.id}`)
                    .then((res) => {
                        if (res.status == 204) {
                            this.admins.splice(
                                this.admins.findIndex((rol) => rol.id === admin.id),
                                1
                            );
                            location.reload();
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            trashRole(role) {
                axios
                    .delete(`api/role/${role.id}`)
                    .then((res) => {
                        if (res.status == 204) {
                            this.roles.splice(
                                this.roles.findIndex((rol) => rol.id === role.id),
                                1
                            );
                            this.roleTrashed.push(role);
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            updateRole() {
                this.requesting = true;
                axios
                    .patch(`api/admin/${this.admin.id}`, {
                        admin_id: this.admin.id,
                        role_id: this.adminRole,
                    })
                    .then((res) => {
                        if (res.data.status === 1) {
                            this.requesting = false;
                            this.success = "Success";
                            this.admins = res.data.admin_roles.filter(
                                (el) => el.user.user_type == 1
                            );
                            $("#adminRolesModal .close").click();
                            this.success = "";
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                        this.requesting = false;
                    });
            },
        },
        mounted() {
            this.checkIfRegisteredDetails();
            this.getAdmins();
            this.getRoles();
        },
    };
</script>
<style scoped>
    .cursor-pointer {
        cursor: pointer;
    }
</style>