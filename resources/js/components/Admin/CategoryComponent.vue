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
                            <h1 class="h3 mb-0 text-gray-800">Categories</h1>
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
                                                modal-title
                                                m-0
                                                font-weight-bold
                                                text-primary
                                            "
                                            v-if="addCategoryView"
                                        >
                                            Add/Edit Category
                                        </h5>
                                        <h5
                                            class="
                                                modal-title
                                                m-0
                                                font-weight-bold
                                                text-primary
                                            "
                                            v-else-if="categoryView"
                                        >
                                            Category
                                        </h5>
                                        <div
                                            class="
                                                m-0
                                                font-weight-bold
                                                text-primary
                                            "
                                            v-else-if="categoryViewTrashed"
                                        >
                                            <i
                                                class="
                                                    fas
                                                    fa-arrow-circle-left fa-2x
                                                    cursor-pointer text-primary
                                                "
                                                @click="
                                                    (categoryViewTrashed = false),
                                                        (addCategoryView = false),
                                                        (categoryView = true),
                                                        (update = false)
                                                "
                                            ></i>
                                            <h5 class="d-inline-block pl-5 text-primary">Trashed Categories</h5>
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
                                                        (addCategoryView = true),
                                                            (categoryView = false)
                                                    "
                                                    >New Category</a
                                                >
                                                <a
                                                    class="dropdown-item"
                                                    href="#"
                                                    @click="getTrashed"
                                                    >Trashed Category</a
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

                                        <div class="" v-else>
                                            <div
                                                class="formRole"
                                                v-if="addCategoryView || update"
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
                                                        createCategory
                                                    "
                                                    enctype="multipart/form-data"
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
                                                                category.name
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
                                                            Description.
                                                        </label>
                                                        <textarea
                                                            class="form-control"
                                                            id="grid-role"
                                                            type="text"
                                                            placeholder="Description"
                                                            v-model="
                                                                category.desc
                                                            "
                                                        ></textarea>
                                                    </div>
                                                    <div
                                                        class="
                                                            form-group
                                                            col-md-12
                                                        "
                                                    >
                                                        <div
                                                            class="input-group"
                                                        >
                                                            <div
                                                                class="
                                                                    input-group-prepend
                                                                "
                                                            >
                                                                <span
                                                                    class="
                                                                        input-group-text
                                                                    "
                                                                    id="inputGroupFileAddon01"
                                                                    >Upload</span
                                                                >
                                                            </div>
                                                            <div
                                                                class="
                                                                    custom-file
                                                                "
                                                            >
                                                                <input
                                                                    type="file"
                                                                    class="
                                                                        custom-file-input
                                                                    "
                                                                    id="inputGroupFile01"
                                                                    aria-describedby="inputGroupFileAddon01"
                                                                    @change="
                                                                        previewImages
                                                                    "
                                                                />
                                                                <label
                                                                    class="
                                                                        custom-file-label
                                                                    "
                                                                    for="inputGroupFile01"
                                                                    >Choose
                                                                    file</label
                                                                >
                                                            </div>
                                                        </div>
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
                                                            (categoryViewTrashed = false),
                                                                (addCategoryView = false),
                                                                (categoryView = true),
                                                                (update = false),
                                                                (category = {})
                                                        "
                                                    >
                                                        Cancel
                                                    </button>
                                                </form>
                                            </div>
                                            <div
                                                class="formTable table-responsive"
                                                v-else-if="categoryView"
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
                                                                Image
                                                            </th>
                                                            <th scope="col">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr
                                                            v-for="(
                                                                category, index
                                                            ) in categories"
                                                            :key="category.id"
                                                        >
                                                            <th scope="row">
                                                                {{ index + 1 }}
                                                            </th>
                                                            <td>
                                                                {{
                                                                    category.name
                                                                }}
                                                            </td>
                                                            <td>
                                                                {{
                                                                    category.desc.slice(
                                                                        0,
                                                                        10
                                                                    )
                                                                }}
                                                            </td>
                                                            <td>
                                                                <img
                                                                    :src="
                                                                        category.image
                                                                    "
                                                                    :alt="
                                                                        category.name
                                                                    "
                                                                    width="50px"
                                                                    height="50px"
                                                                />
                                                            </td>
                                                            <td>
                                                                <i
                                                                    class="
                                                                        fas
                                                                        fa-trash
                                                                        cursor-pointer
                                                                    "
                                                                    @click="
                                                                        trashCategory(
                                                                            category
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
                                                                        editCategory(
                                                                            category
                                                                        )
                                                                    "
                                                                ></i>
                                                            </td>
                                                            <td>
                                                                <div class="dropdown no-arrow">
                                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                                        aria-labelledby="dropdownMenuLink">
                                                                        <div class="dropdown-header">Relate to Size/Color:</div>
                                                                        <a data-toggle="modal" @click="getCategory(category)" data-target="#modalForSizeColor" class="dropdown-item" href="#">Relate</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr
                                                            v-if="
                                                                categories.length ==
                                                                0
                                                            "
                                                            class="text-center"
                                                        >
                                                            
                                                            <td colspan="5">
                                                                No Category Found
                                                                <p>
                                                                    <button @click="addCategoryView = true" class="btn btn-small btn-light">
                                                                        Add new
                                                                    </button>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div
                                                class="recycleTable"
                                                v-else-if="categoryViewTrashed"
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
                                                                Image
                                                            </th>
                                                            <th scope="col">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr
                                                            v-for="(
                                                                category, index
                                                            ) in categoryTrashed"
                                                            :key="category.id"
                                                        >
                                                            <th scope="row">
                                                                {{ index + 1 }}
                                                            </th>
                                                            <td>
                                                                {{
                                                                    category.name
                                                                }}
                                                            </td>
                                                            <td>
                                                                {{
                                                                    category.desc.slice(
                                                                        0,
                                                                        10
                                                                    )
                                                                }}
                                                            </td>
                                                            <td>
                                                                <img
                                                                    :src="
                                                                        category.image
                                                                    "
                                                                    :alt="
                                                                        category.name
                                                                    "
                                                                    width="50px"
                                                                    height="50px"
                                                                />
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
                                                                            category
                                                                        )
                                                                    "
                                                                ></i>
                                                            </td>
                                                        </tr>
                                                        <tr
                                                            v-if="
                                                                categoryTrashed.length ==
                                                                0
                                                            "
                                                            class="text-center"
                                                        >
                                                            No Trashed Category
                                                            Found
                                                        </tr>
                                                    </tbody>
                                                </table>
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
        <!-- Modal for relating with color/size or material -->
        <div
            class="modal fade"
            id="modalForSizeColor"
            tabindex="-1"
            role="dialog"
            aria-labelledby="modalForSizeColorLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalForSizeColorLabel">
                            Link colors and sizes to its category
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
                       <p>Link <b>{{category.name}}</b> to its colors.</p>
                       <form @submit.prevent="linkToCate">
                            <div>
                                <h5>Colors</h5>
                                
                                <div class="form-check form-check-inline" v-for="color in colors" :key="color.id">
                                    <input class="form-check-input" type="checkbox" v-model="selectedColors[color.id]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{color.name}}
                                    </label>
                                </div>
                            </div>
                            <div>
                                <h5>Sizes</h5>
                                
                                <div class="form-check form-check-inline" v-for="size in sizes" :key="size.id">
                                    <input class="form-check-input" type="checkbox" v-model="selectedSizes[size.id]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{size.name}}
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-small" :disabled="requesting">
                                <i
                                    class="
                                        fas
                                        fa-spinner
                                        fa-spin
                                    "
                                    v-if="requesting"
                                ></i>
                                Submit
                            </button>
                       </form>
                        

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import NavbarComponent from "../Super/NavbarComponent.vue";
    import SidebarComponent from "../Super/SidebarComponent.vue";
    export default {
        components: { NavbarComponent, SidebarComponent },
        name: "Category",

        data() {
            return {
                addCategoryView: false,
                category: {},
                categoryViewTrashed: false,
                categoryTrashed: [],
                categories: [],
                categoryView: true,
                selectedColors: [],
                colors: [],
                requesting: false,
                selectedSizes: [],
                sizes: [],
                success: "",
                update: false,
                loading: false,
            };
        },
        methods: {
            createCategory() {
                let url;
                let axiosFunction;
                if (this.update == true) {
                    url = `api/category/${this.category.id}`;
                    axiosFunction = axios.post;
                } else {
                    url = "api/category";
                    axiosFunction = axios.post;
                }
                this.requesting = true;
                let formData = new FormData();
                formData.append("name", this.category.name);
                formData.append("desc", this.category.desc);
                formData.append("image", this.category.image);
                this.update ? formData.append("_method", "put") : null;
                axiosFunction(url, formData)
                    .then((res) => {
                        if (res.data.status == 1) {
                            this.success = this.update
                                ? "Update Success"
                                : res.data.message;
                            setTimeout(() => {
                                this.categories = res.data.categories;
                                this.addCategoryView = false;
                                this.categoryView = true;
                                this.success = "";
                                this.requesting = false;
                                this.update = false;
                                this.category = {};
                            }, 1000);
                        }
                    })
                    .catch((err) => {
                        this.requesting = false;
                        console.log(err);
                    });
            },
            editCategory(category) {
                this.addCategoryView = true;
                this.update = true;
                this.categoryViewTrashed = false;
                this.category = category;
            },
            getCategories() {
                this.loading = true;
                axios
                    .get(`api/category`)
                    .then((res) => {
                        this.categories = res.data.untrashed;
                        this.categoryTrashed = res.data.trashed;
                        this.loading = false;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getCategory(category) {
                this.selectedColors = [];
                this.selectedSizes = [];
                this.category = category;
                this.selectedColors.push(false);
                this.selectedSizes.push(false);
                let colorValues = [];
                let sizeValues = [];
                this.category.colors.forEach(el => {
                    colorValues.push(el.id);
                })
                this.category.sizes.forEach(el => {
                    sizeValues.push(el.id);
                })
                this.colors.forEach(el => {
                    if (colorValues.includes(el.id) ) {
                        console.log(el.id)
                        this.selectedColors.push(true)
                    }
                    else {
                        this.selectedColors.push(false);
                    }
                });
                category.sizes.forEach(el => {
                    if (sizeValues.includes(el.id) ) {
                        this.selectedSizes.push(true)
                    }
                    else {
                        this.selectedSizes.push(false);
                    }
                });
            },
            getColors() {
                axios
                    .get(`api/color`)
                    .then((res) => {
                        this.colors = res.data.untrashed;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getCateColorSize() {
                return Promise.all([this.getCategories(), this.getSizes(), this.getColors()])
            },
            getSizes(){
                axios
                    .get(`api/size`)
                    .then((res) => {
                        this.sizes = res.data.untrashed;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getTrashed() {
                this.categoryViewTrashed = true;
                this.categoryView = false;
                this.addCategoryView = false;
                this.update = false;
            },
            linkToCate(){
                this.requesting = true;
                axios.post('api/category-link',{category_id: this.category.id, size: this.selectedSizes, color: this.selectedColors}).then(res => {
                    console.log(res);
                    this.success = res.data.message;
                    this.requesting = false;
                    location.reload();
                }).catch(err => {
                    console.log(err);
                    this.requesting = false;
                })
            },
            previewImages(event) {
                if (event.target.files.length !== 0) {
                    this.category.image = event.target.files[0];
                }
            },
            refresh(category) {
                axios
                    .patch(`api/category-refresh/${category.id}`)
                    .then((res) => {
                        console.log(res);
                        if (res.status == 201) {
                            this.categories.push(category);
                            this.categoryTrashed.splice(
                                this.categoryTrashed.findIndex(
                                    (rol) => rol.id === category.id
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
            trashCategory(category) {
                axios
                    .delete(`api/category/${category.id}`)
                    .then((res) => {
                        if (res.status == 204) {
                            this.categories.splice(
                                this.categories.findIndex(
                                    (rol) => rol.id === category.id
                                ),
                                1
                            );
                            this.categoryTrashed.push(category);
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
            this.getCateColorSize();
        },
    };
</script>
<style scoped>
</style>