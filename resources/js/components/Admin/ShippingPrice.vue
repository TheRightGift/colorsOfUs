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
                            <h1 class="h3 mb-0 text-gray-800">Sizes</h1>
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
                                            v-if="addSizeView"
                                        >
                                            Add/Edit Size
                                        </h5>
                                        <h5
                                            class="
                                                m-0
                                                font-weight-bold
                                                text-primary
                                            "
                                            id="exampleModalLabel"
                                            v-else-if="sizeView"
                                        >
                                            Size
                                        </h5>
                                        <div
                                            class="
                                                m-0
                                                font-weight-bold
                                                text-primary
                                            "
                                            v-else-if="sizeViewTrashed"
                                        >
                                            <i
                                                class="
                                                    fas
                                                    fa-arrow-circle-left fa-2x
                                                    cursor-pointer
                                                    text-primary
                                                "
                                                @click="
                                                    (sizeViewTrashed = false),
                                                        (addSizeView = false),
                                                        (sizeView = true),
                                                        (size = {})
                                                "
                                            ></i>
                                            <h5
                                                class="
                                                    d-inline-block
                                                    pl-5
                                                    text-primary
                                                "
                                            >
                                                Trashed Sizes
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
                                                        (addSizeView = true),
                                                            (sizeView = false)
                                                    "
                                                    >New Size</a
                                                >
                                                <a
                                                    class="dropdown-item"
                                                    href="#"
                                                    @click="getTrashed"
                                                    >Trashed Size</a
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
                                                v-if="addSizeView || update"
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
                                                        createsize
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
                                                                size.name
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
                                                            placeholder="desc"
                                                            v-model="
                                                                size.desc
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
                                                            (sizeViewTrashed = false),
                                                                (addSizeView = false),
                                                                (sizeView = true),
                                                                (update = false),
                                                                (size = {})
                                                        "
                                                    >
                                                        Cancel
                                                    </button>
                                                </form>
                                            </div>
                                            <div
                                                class="formTable"
                                                v-else-if="sizeView"
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
                                                                size, index
                                                            ) in sizes"
                                                            :key="size.id"
                                                        >
                                                            <th scope="row">
                                                                {{ index + 1 }}
                                                            </th>
                                                            <td>
                                                                {{
                                                                    size.name
                                                                }}
                                                            </td>
                                                            <td>
                                                                {{
                                                                    size.desc
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
                                                                        trashSize(
                                                                            size
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
                                                                        editSize(
                                                                            size
                                                                        )
                                                                    "
                                                                ></i>
                                                            </td>
                                                        </tr>
                                                        <tr
                                                            v-if="
                                                                sizes.length ==
                                                                0
                                                            "
                                                            class="text-center"
                                                        >
                                                            <td colspan="4">
                                                                No Size Found
                                                                <p>
                                                                    <button @click="addSizeView = true" class="btn btn-small btn-light">
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
                                                            ) in sizes.links"
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
                                                v-else-if="sizeViewTrashed"
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
                                                                desc
                                                            </th>
                                                            <th scope="col">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr
                                                            v-for="(
                                                                size, index
                                                            ) in sizeTrashed"
                                                            :key="size.id"
                                                        >
                                                            <th scope="row">
                                                                {{ index + 1 }}
                                                            </th>
                                                            <td>
                                                                {{
                                                                    size.name
                                                                }}
                                                            </td>
                                                            <td>
                                                                {{
                                                                    size.desc
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
                                                                            size
                                                                        )
                                                                    "
                                                                ></i>
                                                            </td>
                                                        </tr>
                                                        <tr
                                                            v-if="
                                                                sizeTrashed.length ==
                                                                0
                                                            "
                                                            class="text-center"
                                                        >
                                                            No Trashed size
                                                            Found
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- <button
                            class="btn btn-light"
                            type="button"
                            v-if="sizeViewTrashed"
                            @click="
                                (sizeViewTrashed = false),
                                    (addSizeView = false),
                                    (sizeView = true),
                                    (size = {})
                            "
                        >
                            Back To sizes
                        </button>
                        <button
                            class="btn btn-secondary"
                            type="button"
                            data-dismiss="modal"
                            @click="
                                (sizeViewTrashed = false),
                                    (addSizeView = false),
                                    (sizeView = true),
                                    (update = false),
                                    (size = {})
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
        name: "size",
        data() {
            return {
                size: {},
                sizeViewTrashed: false,
                sizes: [],
                sizeView: true,
                addSizeView: false,
                sizePage: 1,
                sizeTrashed: [],
                update: false,
                requesting: false,
                success: "",
                loading: false,
            };
        },
        methods: {
            createsize() {
                let url;
                let axiosFunction;
                if (this.update == true) {
                    url = `api/size/${this.size.id}`;
                    axiosFunction = axios.put;
                } else {
                    url = "api/size";
                    axiosFunction = axios.post;
                }
                this.requesting = true;
                axiosFunction(url, this.size)
                    .then((res) => {
                        if (res.data.status == 1) {
                            this.success = this.update
                                ? "Update Success"
                                : res.data.message;
                            setTimeout(() => {
                                !this.update
                                    ? this.sizes.push(res.data.size)
                                    : null;
                                this.addSizeView = false;
                                this.sizeView = true;
                                this.success = "";
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
            editSize(size) {
                this.addSizeView = true;
                this.update = true;
                this.sizeViewTrashed = false;
                this.size = size;
            },
            getSizes() {
                this.loading = true;
                axios
                    .get(`api/size`)
                    .then((res) => {
                        this.sizes = res.data.untrashed;
                        this.sizeTrashed = res.data.trashed;
                        this.loading = false;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getTrashed() {
                this.sizeViewTrashed = true;
                this.sizeView = false;
                this.addSizeView = false;
                this.update = false;
            },
            // paginate(url) {
            //     axios
            //         .get(url)
            //         .then((res) => {
            //             this.sizes = res.data.untrashed;
            //             this.sizeTrashed = res.data.trashed;
            //         })
            //         .catch((err) => {
            //             console.log(err);
            //         });
            // },
            refresh(size) {
                axios
                    .patch(`api/size-refresh/${size.id}`)
                    .then((res) => {
                        console.log(res);
                        if (res.status == 201) {
                            this.sizes.push(size);
                            this.sizeTrashed.splice(
                                this.sizeTrashed.findIndex(
                                    (rol) => rol.id === size.id
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
            trashSize(size) {
                axios
                    .delete(`api/size/${size.id}`)
                    .then((res) => {
                        if (res.status == 204) {
                            this.sizes.splice(
                                this.sizes.findIndex(
                                    (rol) => rol.id === size.id
                                ),
                                1
                            );
                            this.sizeTrashed.push(size);
                            this.$toasted.show("Data Removed!", {
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
            this.getSizes();
        },
    };
</script>