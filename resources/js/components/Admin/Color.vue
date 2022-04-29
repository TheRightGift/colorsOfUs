<template>
    <div>
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
                            <h1 class="h3 mb-0 text-gray-800">Colors</h1>
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
                                        <h5
                                            class="
                                                m-0
                                                font-weight-bold
                                                text-primary
                                            "
                                            id="exampleModalLabel"
                                            v-if="addColorView"
                                        >
                                            Add/Edit Color
                                        </h5>
                                        <h5
                                            class="
                                                m-0
                                                font-weight-bold
                                                text-primary
                                            "
                                            id="exampleModalLabel"
                                            v-else-if="colorView"
                                        >
                                            Color
                                        </h5>
                                        <div
                                            class="
                                                m-0
                                                font-weight-bold
                                                text-primary
                                            "
                                            v-else-if="colorViewTrashed"
                                        >
                                            <i
                                                class="
                                                    fas
                                                    fa-arrow-circle-left fa-2x
                                                    cursor-pointer
                                                    text-primary
                                                "
                                                @click="
                                                    (colorViewTrashed = false),
                                                        (addColorView = false),
                                                        (colorView = true),
                                                        (color = {})
                                                "
                                            ></i>
                                            <h5
                                                class="
                                                    d-inline-block
                                                    pl-5
                                                    text-primary
                                                "
                                            >
                                                Trashed Colors
                                            </h5>
                                        </div>

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
                                                        fa-ellipsis-v
                                                        fa-sm
                                                        fa-fw
                                                        text-gray-400
                                                    "
                                                ></i>
                                            </a>
                                            <div
                                                class="
                                                    dropdown-menu
                                                    dropdown-menu-right
                                                    shadow
                                                    animated--fade-in
                                                "
                                                aria-labelledby="dropdownMenuLink"
                                            >
                                                <div class="dropdown-header">
                                                    Actions:
                                                </div>
                                                <a
                                                    class="dropdown-item"
                                                    href="#"
                                                    @click="
                                                        (addColorView = true),
                                                            (colorView = false)
                                                    "
                                                    >New Color</a
                                                >
                                                <a
                                                    class="dropdown-item"
                                                    href="#"
                                                    @click="getTrashed"
                                                    >Trashed Color</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="loadingPage" v-if="loading">
                                            <i
                                                class="
                                                    fas
                                                    fa-spinner fa-spin fa-3x
                                                "
                                            ></i>
                                        </div>

                                        <div v-else>
                                            <div
                                                class="formRole"
                                                v-if="addColorView || update"
                                            >
                                                <div
                                                    class="
                                                        bg-success
                                                        text-white
                                                    "
                                                    v-if="success != ''"
                                                >
                                                    <p>{{ success }}</p>
                                                </div>
                                                <form
                                                    @submit.prevent="
                                                        createColor
                                                    "
                                                >
                                                    <div
                                                        class="
                                                            form-group
                                                            col-md-12
                                                        "
                                                    >
                                                        <label for="grid-role">
                                                            Name
                                                        </label>
                                                        <input
                                                            class="form-control"
                                                            id="grid-role"
                                                            type="text"
                                                            placeholder="Name"
                                                            v-model="
                                                                color.name
                                                            "
                                                            required
                                                        />
                                                    </div>
                                                    
                                                    <div
                                                        class="
                                                            form-group
                                                            col-md-12
                                                        "
                                                    >
                                                        <label for="grid-role">
                                                            Description
                                                        </label>
                                                        <input
                                                            class="form-control"
                                                            id="grid-role"
                                                            type="text"
                                                            placeholder="Description"
                                                            v-model="
                                                                color.desc
                                                            "
                                                        />
                                                    </div>
                                                    <button
                                                        class="btn btn-primary"
                                                        type="submit"
                                                    >
                                                        <i
                                                            class="
                                                                fas
                                                                fa-spinner
                                                                fa-spin
                                                            "
                                                            v-if="requesting"
                                                        ></i>
                                                        {{
                                                            update
                                                                ? "Update"
                                                                : "Submit"
                                                        }}
                                                    </button>
                                                    <button
                                                        class="
                                                            btn btn-secondary
                                                        "
                                                        type="button"
                                                        @click="
                                                            (colorViewTrashed = false),
                                                                (addColorView = false),
                                                                (colorView = true),
                                                                (update = false),
                                                                (color = {})
                                                        "
                                                    >
                                                        Cancel
                                                    </button>
                                                </form>
                                            </div>
                                            <div
                                                class="formTable"
                                                v-else-if="colorView"
                                            >
                                                <table
                                                    class="table table-hover"
                                                >
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">
                                                                #
                                                            </th>
                                                            <th scope="col">
                                                                Name
                                                            </th>
                                                            <th scope="col">
                                                                Desc
                                                            </th>
                                                            <th scope="col">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr
                                                            v-for="(
                                                                color, index
                                                            ) in colors"
                                                            :key="color.id"
                                                        >
                                                            <th scope="row">
                                                                {{ index + 1 }}
                                                            </th>
                                                            <td>
                                                                {{
                                                                    color.name
                                                                }}
                                                            </td>
                                                            <td>
                                                                {{
                                                                    color.desc
                                                                }}
                                                            </td>
                                                            <td>
                                                                <i
                                                                    class="
                                                                        fas
                                                                        fa-trash
                                                                        cursor-pointer
                                                                    "
                                                                    @click="
                                                                        trashColor(
                                                                            color
                                                                        )
                                                                    "
                                                                ></i>
                                                            </td>
                                                            <td>
                                                                <i
                                                                    class="
                                                                        fas
                                                                        fa-edit
                                                                        cursor-pointer
                                                                    "
                                                                    @click="
                                                                        editColor(
                                                                            color
                                                                        )
                                                                    "
                                                                ></i>
                                                            </td>
                                                        </tr>
                                                        <tr
                                                            v-if="
                                                                colors.length ==
                                                                0
                                                            "
                                                            class="text-center"
                                                            
                                                        >
                                                        <td colspan="4">
                                                            No Color Found
                                                            <p>
                                                                <button @click="addColorView = true" class="btn btn-small btn-light">
                                                                    Add new
                                                                </button>
                                                            </p>
                                                        </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- <nav
                                                    aria-label="Page navigation example"
                                                >
                                                    <ul
                                                        class="
                                                            pagination
                                                            justify-content-center
                                                        "
                                                    >
                                                        <li
                                                            class="page-item"
                                                            v-for="(
                                                                pages, index
                                                            ) in colors.links"
                                                            :key="index"
                                                            :class="{
                                                                active: pages.active,
                                                                disabled:
                                                                    pages.url ==
                                                                    null,
                                                            }"
                                                        >
                                                            <span
                                                                class="
                                                                    page-link
                                                                "
                                                                v-if="
                                                                    pages.active
                                                                "
                                                                v-html="
                                                                    pages.label
                                                                "
                                                            >
                                                                <span
                                                                    class="
                                                                        sr-only
                                                                    "
                                                                    >(current)</span
                                                                >
                                                            </span>
                                                            <a
                                                                class="
                                                                    page-link
                                                                "
                                                                href="#"
                                                                v-else
                                                                v-html="
                                                                    pages.label
                                                                "
                                                                @click="
                                                                    paginate(
                                                                        pages.url
                                                                    )
                                                                "
                                                            ></a>
                                                        </li>
                                                    </ul>
                                                </nav> -->
                                            </div>
                                            <div
                                                class="recycleTable"
                                                v-else-if="colorViewTrashed"
                                            >
                                                <table
                                                    class="table table-hover"
                                                >
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">
                                                                #
                                                            </th>
                                                            <th scope="col">
                                                                Name
                                                            </th>
                                                            <th scope="col">
                                                                Description
                                                            </th>
                                                            <th scope="col">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr
                                                            v-for="(
                                                                color, index
                                                            ) in colorTrashed"
                                                            :key="color.id"
                                                        >
                                                            <th scope="row">
                                                                {{ index + 1 }}
                                                            </th>
                                                            <td>
                                                                {{
                                                                    color.name
                                                                }}
                                                            </td>
                                                            <td>
                                                                {{
                                                                    color.desc
                                                                }}
                                                            </td>
                                                            <td>
                                                                <i
                                                                    class="
                                                                        fas
                                                                        fa-redo
                                                                        cursor-pointer
                                                                    "
                                                                    @click="
                                                                        refresh(
                                                                            color
                                                                        )
                                                                    "
                                                                ></i>
                                                            </td>
                                                        </tr>
                                                        <tr
                                                            v-if="
                                                                colorTrashed.length ==
                                                                0
                                                            "
                                                            class="text-center"
                                                        >
                                                            No Trashed Color
                                                            Found
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- <button
                            class="btn btn-light"
                            type="button"
                            v-if="ColorViewTrashed"
                            @click="
                                (ColorViewTrashed = false),
                                    (addColorView = false),
                                    (ColorView = true),
                                    (Color = {})
                            "
                        >
                            Back To Colors
                        </button>
                        <button
                            class="btn btn-secondary"
                            type="button"
                            data-dismiss="modal"
                            @click="
                                (ColorViewTrashed = false),
                                    (addColorView = false),
                                    (ColorView = true),
                                    (update = false),
                                    (Color = {})
                            "
                        >
                            Close
                        </button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import NavbarComponent from '../Super/NavbarComponent.vue';
import SidebarComponent from '../Super/SidebarComponent.vue';
    export default {
    components: { NavbarComponent, SidebarComponent },
        name: "Color",
        data() {
            return {
                color: {},
                colorViewTrashed: false,
                colors: [],
                colorView: true,
                addColorView: false,
                colorPage: 1,
                colorTrashed: [],
                update: false,
                requesting: false,
                success: "",
                loading: false,
            };
        },
        methods: {
            createColor() {
                let url;
                let axiosFunction;
                if (this.update == true) {
                    url = `api/color/${this.color.id}`;
                    axiosFunction = axios.put;
                } else {
                    url = "api/color";
                    axiosFunction = axios.post;
                }
                this.requesting = true;
                axiosFunction(url, this.color)
                    .then((res) => {
                        if (res.data.status == 1) {
                            this.success = this.update
                                ? "Update Success"
                                : res.data.message;
                            setTimeout(() => {
                                !this.update
                                    ? this.colors.push(res.data.color)
                                    : null;
                                this.addColorView = false;
                                this.colorView = true;
                                this.success = "";
                                this.color = {};
                                this.requesting = false;
                                this.update = false;
                            }, 1000);
                        }
                    })
                    .catch((err) => {
                        this.requesting = false;
                        console.log(err);
                    });
            },
            editColor(color) {
                this.addColorView = true;
                this.update = true;
                this.colorViewTrashed = false;
                this.color = color;
            },
            getColors() {
                this.loading = true;
                axios
                    .get(`api/color`)
                    .then((res) => {
                        this.colors = res.data.untrashed;
                        this.colorTrashed = res.data.trashed;
                        this.loading = false;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getTrashed() {
                this.colorViewTrashed = true;
                this.colorView = false;
                this.addColorView = false;
                this.update = false;
            },
            // paginate(url) {
            //     axios
            //         .get(url)
            //         .then((res) => {
            //             this.colors = res.data.untrashed;
            //             this.colorTrashed = res.data.trashed;
            //         })
            //         .catch((err) => {
            //             console.log(err);
            //         });
            // },
            refresh(color) {
                axios
                    .patch(`api/color-refresh/${color.id}`)
                    .then((res) => {
                        console.log(res);
                        if (res.status == 201) {
                            this.colors.push(color);
                            this.colorTrashed.splice(
                                this.colorTrashed.findIndex(
                                    (rol) => rol.id === color.id
                                ),
                                1
                            );
                            this.$toasted.show("Data Restored!", {
                                duration: 3000,
                                position: "top-right",
                            });
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            trashColor(color) {
                axios
                    .delete(`api/color/${color.id}`)
                    .then((res) => {
                        if (res.status == 204) {
                            this.colors.splice(
                                this.colors.findIndex(
                                    (rol) => rol.id === color.id
                                ),
                                1
                            );
                            this.colorTrashed.push(color);
                            this.$toasted.show("Data Deleted!", {
                                duration: 3000,
                                position: "top-right",
                            });
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
        },
        mounted() {
            this.getColors();
        },
    };
</script>
<style>
    .btn:hover {
        color: rgb(243, 240, 240);
        background-color: red !important;
    }
    .btn {
        background-color: rgb(253, 253, 253);
        text-transform: uppercase;
        color: black;
        border: 1px solid thin rgb(145, 144, 144);
    }
</style>