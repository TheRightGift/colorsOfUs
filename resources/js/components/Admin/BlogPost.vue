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
                            <h1 class="h3 mb-0 text-gray-800">Blogs</h1>
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
                                            v-if="addBlogView"
                                        >
                                            Add/Edit Blog
                                        </h5>
                                        <h5
                                            class="
                                                m-0
                                                font-weight-bold
                                                text-primary
                                            "
                                            id="exampleModalLabel"
                                            v-else-if="blogView"
                                        >
                                            Blog
                                        </h5>
                                        <div
                                            class="
                                                m-0
                                                font-weight-bold
                                                text-primary
                                            "
                                            v-else-if="blogViewTrashed"
                                        >
                                            <i
                                                class="
                                                    fas
                                                    fa-arrow-circle-left fa-2x
                                                    cursor-pointer
                                                    text-primary
                                                "
                                                @click="
                                                    (blogViewTrashed = false),
                                                        (addBlogView = false),
                                                        (blogView = true),
                                                        (blog = {})
                                                "
                                            ></i>
                                            <h5
                                                class="
                                                    d-inline-block
                                                    pl-5
                                                    text-primary
                                                "
                                            >
                                                Trashed Blogs
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
                                                        (addBlogView = true),
                                                            (blogView = false)
                                                    "
                                                    >New Blog</a
                                                >
                                                <a
                                                    class="dropdown-item"
                                                    href="#"
                                                    @click="getTrashed"
                                                    >Trashed Blog</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="loadingPage" v-if="loading">
                                            <a href="#">
                                                <i
                                                    class="
                                                        fas
                                                        fa-spinner fa-spin fa-3x
                                                    "
                                                ></i>
                                            </a>
                                        </div>

                                        <div v-else>
                                            <div
                                                class="formRole"
                                                v-if="addBlogView || update"
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
                                                <div
                                                    class="bg-danger text-white"
                                                    v-if="errors.length != 0"
                                                >
                                                    <p
                                                        v-for="(
                                                            error, index
                                                        ) in errors"
                                                        :key="index"
                                                    >
                                                        {{ error }}
                                                    </p>
                                                </div>
                                                <form
                                                    @submit.prevent="createBlog"
                                                >
                                                    <div class="form-row">
                                                        <div
                                                            class="
                                                                form-group
                                                                col-md-6
                                                            "
                                                        >
                                                            <label
                                                                for="grid-role"
                                                            >
                                                                Title
                                                            </label>
                                                            <span
                                                                class="
                                                                    text-danger
                                                                "
                                                                >*</span
                                                            >
                                                            <input
                                                                class="
                                                                    form-control
                                                                "
                                                                id="grid-role"
                                                                type="text"
                                                                placeholder="Title"
                                                                v-model="
                                                                    blog.title
                                                                "
                                                                required
                                                            />
                                                        </div>
                                                        <div
                                                            class="
                                                                form-group
                                                                col-md-6
                                                            "
                                                        >
                                                            <label
                                                                for="category"
                                                                >Select
                                                                Category</label
                                                            >
                                                            <span
                                                                class="
                                                                    text-danger
                                                                "
                                                                >*</span
                                                            >
                                                            <select
                                                                v-model="
                                                                    blog.category_id
                                                                "
                                                                class="
                                                                    form-control
                                                                "
                                                                required
                                                            >
                                                                <option
                                                                    value="null"
                                                                    disabled
                                                                    selected
                                                                >
                                                                    Select an
                                                                    Category
                                                                </option>
                                                                <option
                                                                    v-for="category in categories"
                                                                    :key="
                                                                        category.id
                                                                    "
                                                                    :value="
                                                                        category.id
                                                                    "
                                                                >
                                                                    {{
                                                                        category.name
                                                                    }}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="body"
                                                            >Body</label
                                                        >
                                                        <span
                                                            class="text-danger"
                                                            >*</span
                                                        >
                                                        <div>
                                                            <quill-editor
                                                                v-model="
                                                                    blog.body
                                                                "
                                                                class="mb-3"
                                                                id="rich-text"
                                                                rows="20"
                                                                :options="
                                                                    editorOption
                                                                "
                                                                ref="myQuillEditor"
                                                                @blur="
                                                                    onEditorBlur(
                                                                        $event
                                                                    )
                                                                "
                                                                @focus="
                                                                    onEditorFocus(
                                                                        $event
                                                                    )
                                                                "
                                                                @ready="
                                                                    onEditorReady(
                                                                        $event
                                                                    )
                                                                "
                                                                required
                                                            >
                                                            </quill-editor>
                                                            <div
                                                                class="
                                                                    custom-file
                                                                    d-none
                                                                "
                                                            >
                                                                <input
                                                                    ref="image"
                                                                    @change="
                                                                        imageUpload(
                                                                            $event
                                                                        )
                                                                    "
                                                                    type="file"
                                                                    class="
                                                                        custom-file-input
                                                                    "
                                                                    id="imageUpload"
                                                                    aria-describedby="imageUploadAddon"
                                                                />
                                                                <label
                                                                    class="
                                                                        custom-file-label
                                                                    "
                                                                    for="imageUpload"
                                                                    >Choose
                                                                    file</label
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="card m-b-30"
                                                        v-if="!update"
                                                    >
                                                        <div
                                                            class="card-header"
                                                        >
                                                            <h5
                                                                class="
                                                                    card-title
                                                                "
                                                            >
                                                                Post Image
                                                            </h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <el-upload
                                                                class="
                                                                    avatar-uploader
                                                                "
                                                                action="/"
                                                                :http-request="
                                                                    httpRequest
                                                                "
                                                                :show-file-list="
                                                                    false
                                                                "
                                                                :on-success="
                                                                    handleAvatarSuccess
                                                                "
                                                                :before-upload="
                                                                    beforeAvatarUpload
                                                                "
                                                                :on-change="
                                                                    onChange
                                                                "
                                                            >
                                                                <img
                                                                    v-if="
                                                                        imageUrl
                                                                    "
                                                                    :src="
                                                                        imageUrl
                                                                    "
                                                                    class="
                                                                        avatar
                                                                    "
                                                                />
                                                                <i
                                                                    v-else
                                                                    class="
                                                                        el-icon-plus
                                                                        avatar-uploader-icon
                                                                    "
                                                                ></i>
                                                            </el-upload>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="
                                                            d-grid
                                                            gap-2
                                                            d-md-flex
                                                            justify-content-md-end
                                                            mt-3
                                                        "
                                                    >
                                                        <div
                                                            class="input-group"
                                                        >
                                                            <button
                                                                type="submti"
                                                                class="
                                                                    btn btn-dark
                                                                "
                                                                :disabled="
                                                                    requesting
                                                                "
                                                            >
                                                                <i
                                                                    class="
                                                                        fas
                                                                        fa-spinner
                                                                        fa-spin
                                                                    "
                                                                    v-if="
                                                                        requesting
                                                                    "
                                                                    @click.prevent="
                                                                        draft = true
                                                                    "
                                                                ></i
                                                                >{{
                                                                    action == 1
                                                                        ? "Publish"
                                                                        : "Draft"
                                                                }}
                                                            </button>
                                                            <button
                                                                type="button"
                                                                class="
                                                                    btn
                                                                    btn-outline-dark
                                                                    dropdown-toggle
                                                                    dropdown-toggle-split
                                                                "
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false"
                                                            >
                                                                <span
                                                                    class="
                                                                        visually-hidden
                                                                    "
                                                                ></span>
                                                            </button>
                                                            <ul
                                                                class="
                                                                    dropdown-menu
                                                                "
                                                            >
                                                                <li>
                                                                    <a
                                                                        class="
                                                                            dropdown-item
                                                                            p-0
                                                                        "
                                                                        @click.prevent="
                                                                            action = 1
                                                                        "
                                                                        >Publish</a
                                                                    >
                                                                </li>
                                                                <li
                                                                    class="padd"
                                                                >
                                                                    <a
                                                                        class="
                                                                            dropdown-item
                                                                            p-0
                                                                        "
                                                                        title="Save as draft, will not be published"
                                                                        @click.prevent="
                                                                            action = 0
                                                                        "
                                                                        >Draft</a
                                                                    >
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <button
                                                            class="
                                                                btn
                                                                btn-secondary
                                                            "
                                                            type="button"
                                                            @click="
                                                                (blogViewTrashed = false),
                                                                    (addBlogView = false),
                                                                    (blogView = true),
                                                                    (update = false),
                                                                    (blog = {})
                                                            "
                                                        >
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div
                                                class="formTable"
                                                v-else-if="blogView"
                                            >
                                                <div v-if="blogs.data">
                                                    <div
                                                        v-if="
                                                            blogs.data.length >
                                                            0
                                                        "
                                                    >
                                                        <div
                                                            class="
                                                                row
                                                                justify-content-center
                                                            "
                                                        >
                                                            <div
                                                                class="
                                                                    card
                                                                    col-lg-2
                                                                    col-sm-5
                                                                    m-1
                                                                    p-0
                                                                "
                                                                style="
                                                                    width: 18rem;
                                                                "
                                                                v-for="blog in blogs.data"
                                                                :key="blog.id"
                                                            >
                                                                <img
                                                                    :src="
                                                                        blog
                                                                            .images[0]
                                                                            .url
                                                                    "
                                                                    class="
                                                                        card-img-top
                                                                    "
                                                                    :alt="
                                                                        blog.title
                                                                    "
                                                                />
                                                                <div
                                                                    class="
                                                                        card-body
                                                                    "
                                                                >
                                                                    <h5
                                                                        class="
                                                                            card-title
                                                                        "
                                                                    >
                                                                        {{
                                                                            synopsis(
                                                                                blog.title,
                                                                                10
                                                                            )
                                                                        }}
                                                                        ...
                                                                    </h5>
                                                                    <p
                                                                        class="
                                                                            card-text
                                                                        "
                                                                    >
                                                                        {{
                                                                            synopsis(
                                                                                blog.body,
                                                                                40
                                                                            )
                                                                        }}...
                                                                    </p>
                                                                    <a
                                                                        :href="
                                                                            'blog/' +
                                                                            blog.title
                                                                        "
                                                                        class="
                                                                            btn
                                                                            btn-primary
                                                                        "
                                                                        >View</a
                                                                    >
                                                                    <div
                                                                        class="
                                                                            d-inline-block
                                                                            float-end
                                                                        "
                                                                    >
                                                                        <a href="#!"><i
                                                                            class="
                                                                                fas
                                                                                fa-trash
                                                                                cursor-pointer
                                                                                pr-3
                                                                            "
                                                                            @click="
                                                                                trashBlog(
                                                                                    blog
                                                                                )
                                                                            "
                                                                        ></i></a>
                                                                        <a href="#!"><i
                                                                            class="
                                                                                fas
                                                                                fa-edit
                                                                                cursor-pointer
                                                                            "
                                                                            @click="
                                                                                editBlog(
                                                                                    blog
                                                                                )
                                                                            "
                                                                        ></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div v-else>
                                                        <table
                                                            class="
                                                                table
                                                                table-hover
                                                            "
                                                        >
                                                            <tbody>
                                                                <tr
                                                                    v-if="
                                                                        blogs
                                                                            .data
                                                                            .length ==
                                                                        0
                                                                    "
                                                                    class="
                                                                        text-center
                                                                    "
                                                                >
                                                                    <td
                                                                        colspan="4"
                                                                    >
                                                                        No Post
                                                                        was
                                                                        Found
                                                                        <p>
                                                                            <button
                                                                                @click="
                                                                                    addBlogView = true
                                                                                "
                                                                                class="
                                                                                    btn
                                                                                    btn-small
                                                                                    btn-light
                                                                                "
                                                                            >
                                                                                Add
                                                                                new
                                                                            </button>
                                                                        </p>
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
                                                            "
                                                        >
                                                            <li
                                                                class="
                                                                    page-item
                                                                "
                                                                v-for="(
                                                                    pages, index
                                                                ) in blogs.links"
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
                                                    </nav>
                                                </div>
                                            </div>
                                            <div
                                                class="recycleTable"
                                                v-else-if="blogViewTrashed"
                                            >
                                                <div
                                                    class="
                                                        row
                                                        justify-content-center
                                                    "
                                                >
                                                    <div
                                                        class="
                                                            card
                                                            col-lg-2 col-sm-5
                                                            m-1
                                                            p-0
                                                        "
                                                        style="width: 18rem"
                                                        v-for="blog in blogTrashed.data"
                                                        :key="blog.id"
                                                    >
                                                        <img
                                                            :src="
                                                                blog.images[0]
                                                                    .url
                                                            "
                                                            class="card-img-top"
                                                            :alt="blog.title"
                                                        />
                                                        <div class="card-body">
                                                            <h5
                                                                class="
                                                                    card-title
                                                                "
                                                            >
                                                                {{ blog.title }}
                                                            </h5>
                                                            <p
                                                                class="
                                                                    card-text
                                                                "
                                                            >
                                                                {{
                                                                    synopsis(
                                                                        blog.body,
                                                                        40
                                                                    )
                                                                }}
                                                            </p>

                                                            <div
                                                                class="mx-auto"
                                                            >
                                                                <a
                                                                    href="#"
                                                                    class="
                                                                        card-footer
                                                                        text-center
                                                                    "
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    title="Restore Product"
                                                                    @click.prevent="
                                                                        refresh(
                                                                            blog
                                                                        )
                                                                    "
                                                                    ><i
                                                                        class="
                                                                            fas
                                                                            fa-redo
                                                                        "
                                                                    ></i
                                                                ></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <nav
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
                                                            ) in blogTrashed.links"
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
                                                </nav>
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
    </div>
</template>

<script>
    import NavbarComponent from "../Super/NavbarComponent.vue";
    import SidebarComponent from "../Super/SidebarComponent.vue";
    import _ from "lodash";

    // Import Quill required dependencies
    import "quill/dist/quill.core.css";
    import "quill/dist/quill.snow.css";
    import "quill/dist/quill.bubble.css";
    import { quillEditor, Quill } from "vue-quill-editor";
    import ImageResize from "quill-image-resize";

    // Register ImageResize module
    Quill.register("modules/imageResize", ImageResize);

    // Set toolbar options
    const toolbarOptions = [
        ["bold", "italic", "underline", "strike"],
        // ["blockquote", "code-block"],

        [{ header: 1 }, { header: 2 }],
        [{ list: "ordered" }, { list: "bullet" }],
        [{ script: "sub" }, { script: "super" }],
        // [{ indent: "-1" }, { indent: "+1" }],
        // [{ direction: "rtl" }],

        [{ size: ["small", false, "large", "huge"] }],
        // [{ header: [1, 2, 3, 4, 5, 6, false] }],

        [{ color: [] }, { background: [] }],
        [{ font: [] }],
        [{ align: [] }],
        ["link", "image", "video"],
        // ["clean"]
    ];
    export default {
        components: { NavbarComponent, SidebarComponent, quillEditor },
        computed: {
            editor() {
                return this.$refs.myQuillEditor.quill;
            },
        },
        name: "blog",
        data() {
            return {
                action: 0,
                addBlogView: false,
                blog: {
                    category_id: "null",
                },
                blogViewTrashed: false,
                blogs: [],
                blogView: true,
                blogPage: 1,
                blogTrashed: [],
                categories: [],
                draft: false,
                editorOption: {
                    modules: {
                        toolbar: {
                            container: toolbarOptions,
                            handlers: {
                                image: function (value) {
                                    if (value) {
                                        document
                                            .querySelector("#imageUpload")
                                            .click();
                                    } else {
                                        this.quill.format("image", false);
                                    }
                                },
                            },
                        },
                        history: {
                            delay: 1000,
                            maxStack: 50,
                            userOnly: false,
                        },
                        imageResize: {
                            displayStyles: {
                                backgroundColor: "black",
                                border: "none",
                                color: "white",
                            },
                            modules: ["Resize", "DisplaySize", "Toolbar"],
                        },
                    },
                },
                errors: [],
                file: {},
                imageUrl: "",
                update: false,
                requesting: false,
                success: "",
                loading: false,
            };
        },
        methods: {
            beforeAvatarUpload(file) {
                const isJPG =
                    file.type === "image/jpeg" ||
                    file.type === "image/png" ||
                    "video/mp4";
                const isLt2M = file.size / 1024 / 1024 < 2;

                if (!isJPG) {
                    this.$message.error("Avatar picture must be JPG format!");
                }
                if (!isLt2M) {
                    this.$message.error("Avatar picture size can not exceed 2MB!");
                }
                return isJPG && isLt2M;
            },
            createBlog() {
                this.errors = [];
                let url;
                let axiosFunction;
                if (this.update == true) {
                    url = `api/blog/${this.blog.id}`;
                    axiosFunction = axios.put;
                } else {
                    url = "api/blog";
                    axiosFunction = axios.post;
                }
                this.requesting = true;
                this.blog.status = this.action == 0 ? 'draft' : 'published';
                this.blog.imageUrl = this.imageUrl;
                axiosFunction(url, this.blog)
                    .then((res) => {
                        if (res.data.status == 1) {
                            this.success = this.update
                                ? "Update Success"
                                : res.data.message;
                            setTimeout(() => {
                                this.viewUp();
                                window.location.reload();
                            }, 3000);
                        } else if (res.data.errors) {
                            this.viewUp();
                            this.requesting = false;
                            this.errors = res.data.errors;
                        }
                    })
                    .catch((err) => {
                        this.requesting = false;
                        console.log(err);
                    });
            },
            editBlog(blog) {
                this.addBlogView = true;
                this.update = true;
                this.blogViewTrashed = false;
                this.action = blog.status == 'published' ? 1 : 0;
                this.blog = blog;
            },
            getBlogs() {
                this.loading = true;
                axios
                    .get(`api/blog`)
                    .then((res) => {
                        this.blogs = res.data.blogposts;
                        this.blogTrashed = res.data.trashed;
                        this.loading = false;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getCategories() {
                axios
                    .get(`api/category`)
                    .then((res) => {
                        this.categories = res.data.untrashed;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getTrashed() {
                this.blogViewTrashed = true;
                this.blogView = false;
                this.addBlogView = false;
                this.update = false;
            },
            httpRequest() {
                var form = new FormData();
                let self = this;
                form.append("image", self.file.raw);
                axios
                    .post("api/uploads", form)
                    .then(function (res) {
                        self.$message.success("Image Uploaded!");
                        self.imageUrl = res.data.location;
                    })
                    .catch(function (err) {
                        alert("HTTP Error: " + err.message);
                    });
            },
            handleAvatarSuccess(res, file) {
                this.imageUrl = URL.createObjectURL(file.raw);
            },
            imageUpload(e) {
                if (e.target.files.length !== 0) {
                    let quill = this.editor;
                    let self = this;
                    var form = new FormData();
                    // form.append('file[]', e.target.files[0])
                    form.append("image", e.target.files[0]);
                    axios
                        .post("api/uploads", form)
                        .then(function (res) {
                            self.$toasted.show("Image Uploaded!", {
                                duration: 3000,
                                position: "top-right",
                            });
                            let length = quill.getSelection().index;

                            // Insert image at cursor location
                            quill.insertEmbed(length, "image", res.data.location);

                            // Set cursor to the end
                            quill.setSelection(length + 1);
                        })
                        .catch(function (err) {
                            alert("HTTP Error: " + err.message);
                        });
                }
            },
            onChange(file, fileList) {
                this.file = file;
            },
            onEditorBlur(editor) {
                // console.log('editor blur!', editor)
            },
            onEditorFocus(editor) {
                // console.log('editor focus!', editor)
            },
            onEditorReady(editor) {
                // console.log('editor ready!', editor)
            },
            paginate(url) {
                axios
                    .get(url)
                    .then((res) => {
                        this.blogs = res.data.untrashed;
                        this.blogTrashed = res.data.trashed;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            refresh(blog) {
                axios
                    .patch(`api/blog-refresh/${blog.id}`)
                    .then((res) => {
                        if (res.status == 201) {
                            this.blogs.data.push(blog);
                            this.blogTrashed.data.splice(
                                this.blogTrashed.data.findIndex(
                                    (rol) => rol.id === blog.id
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
            synopsis(inputString, len) {
                var div = document.createElement("div");
                div.innerHTML = inputString;
                return div.textContent.slice(0, len);
            },
            trashBlog(blog) {
                axios
                    .delete(`api/blog/${blog.id}`)
                    .then((res) => {
                        if (res.status == 204) {
                            this.blogs.data.splice(
                                this.blogs.data.findIndex(
                                    (rol) => rol.id === blog.id
                                ),
                                1
                            );
                            this.blogTrashed.data.push(blog);
                            this.$toasted.show("Data Archived!", {
                                duration: 3000,
                                position: "top-right",
                            });
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            viewUp() {
                window.scroll(30, 50);
            },
        },
        mounted() {
            this.getBlogs();
            this.getCategories();
        },
    };
</script>
<style scoped>
    .padd {
        padding: 0 1.1em;
    }
    .float-end {
        float: right;
        clear: both;
    }
    .card img {
        height: 200.5px;
    }
</style>