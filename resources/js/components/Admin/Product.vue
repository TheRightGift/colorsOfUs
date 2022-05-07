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
                            <h1 class="h3 mb-0 text-gray-800">Products</h1>
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
                                            v-if="productTrashedView"
                                        >
                                            <i
                                                class="
                                                    fas
                                                    fa-arrow-left
                                                    pr-5
                                                    cursor-pointer
                                                "
                                                @click="
                                                    (productTrashedView = false),
                                                        (onAddPrd = false)
                                                "
                                            ></i>
                                            Archived Products
                                        </h6>
                                        <h6
                                            class="
                                                m-0
                                                font-weight-bold
                                                text-primary
                                            "
                                            v-else
                                        >
                                            All Products
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
                                                        openCreatePrdForm();
                                                        cancelUpdateOrAdd();
                                                    "
                                                    >New Product</a
                                                >
                                                <a
                                                    class="dropdown-item"
                                                    href="#"
                                                    @click="
                                                        (productTrashedView = true),
                                                            (onAddPrd = false)
                                                    "
                                                    >Trashed Product</a
                                                >
                                                <div
                                                    class="dropdown-divider"
                                                ></div>
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
                                        <div class="activePage" v-else>
                                            <div
                                                v-if="success || errorMsg"
                                                class="
                                                    d-flex
                                                    items-center
                                                    text-white text-sm
                                                    font-bold
                                                    px-4
                                                    py-1
                                                "
                                                :class="{
                                                    'bg-success': success,
                                                    'bg-danger': errorMsg,
                                                }"
                                            >
                                                <svg
                                                    class="
                                                        fill-current
                                                        w-4
                                                        h-4
                                                        mr-2
                                                    "
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    style="height: 20px"
                                                >
                                                    <path
                                                        d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"
                                                    />
                                                </svg>
                                                <p
                                                    v-if="success"
                                                    class="m-0 p-1 text-white"
                                                >
                                                    {{ successMessage }}.
                                                </p>
                                                <p
                                                    v-if="errorMsg"
                                                    class="m-0 p-1 text-white"
                                                >
                                                    {{ errorMessage }}.
                                                </p>
                                            </div>
                                            <div id="addAD" v-if="onAddPrd">
                                                <div
                                                    v-if="status_msg"
                                                    :class="{
                                                        'alert-success': status,
                                                        'alert-danger': !status,
                                                    }"
                                                    class="alert"
                                                    role="alert"
                                                >
                                                    {{ status_msg }}
                                                </div>
                                                <div class="card shadow">
                                                    <div class="card-body">
                                                        <div class="card-title">
                                                            <h5>
                                                                {{
                                                                    update
                                                                        ? "Edit Product"
                                                                        : "Add New Product"
                                                                }}
                                                            </h5>
                                                            <small
                                                                ><b>NOTE*</b
                                                                >First create a
                                                                category before
                                                                proceeding</small
                                                            >
                                                        </div>
                                                        <form
                                                            class="
                                                                w-full
                                                                max-w-lg
                                                            "
                                                            @submit.prevent="
                                                                createproduct
                                                            "
                                                        >
                                                            <div
                                                                class="form-row"
                                                            >
                                                                <div
                                                                    class="
                                                                        form-group
                                                                        col-md-6
                                                                    "
                                                                >
                                                                    <label
                                                                        for="grid-title"
                                                                    >
                                                                        Product
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
                                                                        id="grid-title"
                                                                        type="text"
                                                                        placeholder="Eugene Classic watch"
                                                                        v-model="
                                                                            product.title
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
                                                                        for="grid-amount"
                                                                        >Amount</label
                                                                    >
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
                                                                        id="grid-amount"
                                                                        type="text"
                                                                        placeholder="4000"
                                                                        v-model="
                                                                            product.amount
                                                                        "
                                                                        required
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="form-row"
                                                            >
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
                                                                            product.category_id
                                                                        "
                                                                        class="
                                                                            form-control
                                                                        "
                                                                        required
                                                                        @change="
                                                                            getSizeColorByCate
                                                                        "
                                                                    >
                                                                        <option
                                                                            value="null"
                                                                            disabled
                                                                            selected
                                                                        >
                                                                            Select
                                                                            an
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
                                                                <div
                                                                    class="
                                                                        form-group
                                                                        col-md-6
                                                                    "
                                                                >
                                                                    <label
                                                                        for="grid-stock"
                                                                        >Quantity
                                                                        in
                                                                        Stock</label
                                                                    >
                                                                    <span
                                                                        >(Optional)</span
                                                                    >
                                                                    <input
                                                                        class="
                                                                            form-control
                                                                        "
                                                                        id="grid-stock"
                                                                        type="number"
                                                                        placeholder="40000000"
                                                                        v-model="
                                                                            product.stock
                                                                        "
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="form-row"
                                                            >
                                                                <div
                                                                    class="
                                                                        form-group
                                                                        col-md-6
                                                                    "
                                                                >
                                                                    <label
                                                                        for="subject"
                                                                        >Select
                                                                        Color</label
                                                                    >
                                                                    <span
                                                                        >(Optional)</span
                                                                    >
                                                                    <multiselect
                                                                        v-model="
                                                                            product.colors
                                                                        "
                                                                        :options="
                                                                            colors
                                                                        "
                                                                        :custom-label="
                                                                            nameWithLang
                                                                        "
                                                                        placeholder="Select Multiple"
                                                                        label="color"
                                                                        track-by="id"
                                                                        :close-on-select="
                                                                            false
                                                                        "
                                                                        :searchable="
                                                                            true
                                                                        "
                                                                        :multiple="
                                                                            true
                                                                        "
                                                                        :clear-on-select="
                                                                            false
                                                                        "
                                                                    ></multiselect>
                                                                </div>
                                                                <div
                                                                    class="
                                                                        form-group
                                                                        col-md-6
                                                                    "
                                                                >
                                                                    <label
                                                                        for="class"
                                                                        >Select
                                                                        Size</label
                                                                    >
                                                                    <span
                                                                        >(Optional)</span
                                                                    >
                                                                    <multiselect
                                                                        v-model="
                                                                            product.sizes
                                                                        "
                                                                        :options="
                                                                            sizes
                                                                        "
                                                                        :custom-label="
                                                                            nameWithLang
                                                                        "
                                                                        placeholder="Select Multiple"
                                                                        label="size"
                                                                        track-by="id"
                                                                        :close-on-select="
                                                                            false
                                                                        "
                                                                        :searchable="
                                                                            true
                                                                        "
                                                                        :multiple="
                                                                            true
                                                                        "
                                                                        :clear-on-select="
                                                                            false
                                                                        "
                                                                    ></multiselect>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="
                                                                    form-group
                                                                "
                                                            >
                                                                <label
                                                                    for="description"
                                                                    >Description</label
                                                                >
                                                                <span
                                                                    class="
                                                                        text-danger
                                                                    "
                                                                    >*</span
                                                                >
                                                                <div>
                                                                    <quill-editor
                                                                        v-model="
                                                                            product.desc
                                                                        "
                                                                        class="
                                                                            mb-3
                                                                        "
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
                                                            <div class="mb-2">
                                                                <p>
                                                                    Do you
                                                                    recommend
                                                                    this
                                                                    product?
                                                                </p>
                                                                <div
                                                                    class="
                                                                        form-check
                                                                        form-check-inline
                                                                    "
                                                                >
                                                                    <input
                                                                        class="
                                                                            form-check-input
                                                                        "
                                                                        type="radio"
                                                                        name="recommend"
                                                                        v-model="
                                                                            product.recommended
                                                                        "
                                                                        value="1"
                                                                    />
                                                                    <label
                                                                        class="
                                                                            form-check-label
                                                                        "
                                                                        for="recommend1"
                                                                    >
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="
                                                                        form-check
                                                                        form-check-inline
                                                                    "
                                                                >
                                                                    <input
                                                                        class="
                                                                            form-check-input
                                                                        "
                                                                        type="radio"
                                                                        name="recommend"
                                                                        v-model="
                                                                            product.recommended
                                                                        "
                                                                        value="0"
                                                                    />
                                                                    <label
                                                                        class="
                                                                            form-check-label
                                                                        "
                                                                        for="recommend1"
                                                                    >
                                                                        No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="
                                                                    card
                                                                    m-b-30
                                                                "
                                                            >
                                                                <div
                                                                    class="
                                                                        card-header
                                                                    "
                                                                >
                                                                    <h5
                                                                        class="
                                                                            card-title
                                                                        "
                                                                    >
                                                                        Product
                                                                        Image
                                                                        Gallery
                                                                    </h5>
                                                                </div>
                                                                <div
                                                                    class="
                                                                        card-body
                                                                    "
                                                                >
                                                                    <el-upload
                                                                        action="/"
                                                                        list-type="picture-card"
                                                                        :on-preview="
                                                                            handlePictureCardPreview
                                                                        "
                                                                        :on-change="
                                                                            updateImageList
                                                                        "
                                                                        :on-remove="handleRemove"
                                                                        :auto-upload="
                                                                            false
                                                                        "
                                                                        :file-list="fileList"
                                                                    >
                                                                        <i
                                                                            class="
                                                                                el-icon-plus
                                                                            "
                                                                        ></i>
                                                                    </el-upload>
                                                                    <el-dialog
                                                                        :visible.sync="
                                                                            dialogVisible
                                                                        "
                                                                    >
                                                                        <img
                                                                            width="100%"
                                                                            src="dialogImageUrl"
                                                                            alt=""
                                                                        />
                                                                    </el-dialog>
                                                                </div>
                                                                <div
                                                                    class="
                                                                        container
                                                                    "
                                                                ></div>
                                                            </div>
                                                            <div class="mt-1">
                                                                <button
                                                                    type="submit"
                                                                    class="
                                                                        btn
                                                                        btn-primary
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
                                                                    ></i>
                                                                    {{
                                                                        update
                                                                            ? "Update Now"
                                                                            : "Add New"
                                                                    }}
                                                                </button>
                                                                <button
                                                                    type="button"
                                                                    class="
                                                                        btn
                                                                        btn-secondary
                                                                    "
                                                                    @click="
                                                                        update = false;
                                                                        onAddPrd = false;
                                                                        cancelUpdateOrAdd;
                                                                    "
                                                                >
                                                                    Cancel
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                id="archivedBooks"
                                                v-else-if="productTrashedView"
                                            >
                                                <div
                                                    v-if="
                                                        productTrashed.length >
                                                        0
                                                    "
                                                >
                                                    <div class="row">
                                                        <div
                                                            class="
                                                                card
                                                                col-lg-2
                                                                col-sm-12
                                                                m-1
                                                            "
                                                            v-for="trashed in productTrashed"
                                                            :key="trashed._id"
                                                        >
                                                            <img
                                                                :src="
                                                                    trashed
                                                                        .images[0]
                                                                        .url
                                                                "
                                                                class="
                                                                    card-img-top
                                                                "
                                                                alt=""
                                                            />
                                                            <div
                                                                class="
                                                                    card-body
                                                                "
                                                            >
                                                                <p
                                                                    class="
                                                                        card-text
                                                                    "
                                                                >
                                                                    {{
                                                                        trashed.title
                                                                    }}
                                                                </p>
                                                            </div>
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
                                                                        restoreArch(
                                                                            trashed
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
                                                        <!-- </div> -->
                                                    </div>
                                                </div>
                                                <div class="" v-else>
                                                    <p class="text-center">
                                                        No product has been
                                                        archived Yet
                                                    </p>
                                                </div>
                                            </div>
                                            <div id="books" v-else>
                                                <div v-if="products.data">
                                                    <div
                                                        v-if="
                                                            products.data
                                                                .length != 0
                                                        "
                                                    >
                                                        <div class="row justify-content-center">
                                                            <div
                                                                class="
                                                                    card
                                                                    col-lg-2
                                                                    col-sm-5
                                                                    m-1
                                                                    p-0
                                                                "
                                                                v-for="product in products.data"
                                                                :key="
                                                                    product.id
                                                                "
                                                            >
                                                                <img
                                                                    :src="
                                                                        product
                                                                            .images[0]
                                                                            .url
                                                                    "
                                                                    class="
                                                                        card-img-top
                                                                    "
                                                                    height="125px"
                                                                    alt=""
                                                                />
                                                                <div
                                                                    class="
                                                                        card-body
                                                                    "
                                                                >
                                                                    <div
                                                                        class="
                                                                            flexedItem
                                                                        "
                                                                    >
                                                                        <p
                                                                            class="
                                                                                card-text
                                                                            "
                                                                        >
                                                                            {{
                                                                                product.title.slice(
                                                                                    0,
                                                                                    10
                                                                                )
                                                                            }}...
                                                                        </p>
                                                                        <p>
                                                                            <a
                                                                                href="#"
                                                                                class="
                                                                                    card-link
                                                                                "
                                                                                data-toggle="modal"
                                                                                data-target="#deleteModal"
                                                                                @click.prevent="
                                                                                    getProduct(
                                                                                        product
                                                                                    )
                                                                                "
                                                                                ><i
                                                                                    class="
                                                                                        far
                                                                                        fa-trash-alt
                                                                                    "
                                                                                ></i
                                                                            ></a>
                                                                            <a
                                                                                href="#"
                                                                                class="
                                                                                    card-link
                                                                                "
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Edit Item"
                                                                                @click.prevent="
                                                                                    getProduct(
                                                                                        product,
                                                                                        (onAddPrd = true),
                                                                                        (update = true)
                                                                                    )
                                                                                "
                                                                                ><i
                                                                                    class="
                                                                                        fas
                                                                                        fa-edit
                                                                                    "
                                                                                ></i
                                                                            ></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <!-- <div
                                                                    class="
                                                                        mx-auto
                                                                        card-footer
                                                                        hidden-xs
                                                                    "
                                                                >
                                                                    <a
                                                                        href="#"
                                                                        class="
                                                                            card-link
                                                                        "
                                                                        data-toggle="modal"
                                                                        data-target="#deleteModal"
                                                                        @click.prevent="
                                                                            getProduct(
                                                                                product
                                                                            )
                                                                        "
                                                                        ><i
                                                                            class="
                                                                                far
                                                                                fa-trash-alt
                                                                            "
                                                                        ></i
                                                                    ></a>
                                                                    <a
                                                                        href="#"
                                                                        class="
                                                                            card-link
                                                                        "
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        title="Edit Item"
                                                                        @click.prevent="
                                                                            getProduct(
                                                                                product,
                                                                                (onAddPrd = true),
                                                                                (update = true)
                                                                            )
                                                                        "
                                                                        ><i
                                                                            class="
                                                                                fas
                                                                                fa-edit
                                                                            "
                                                                        ></i
                                                                    ></a>
                                                                </div> -->
                                                            </div>
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
                                                                    class="
                                                                        page-item
                                                                    "
                                                                    v-for="(
                                                                        pages,
                                                                        index
                                                                    ) in products.links"
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
                                                    <div class="" v-else>
                                                        <p class="text-center">
                                                            No product Added Yet
                                                        </p>
                                                        <p class="text-center">
                                                            <a
                                                                class="
                                                                    text-center
                                                                    text-decoration-none
                                                                "
                                                                href="#"
                                                                @click.prevent="
                                                                    openCreatePrdForm()
                                                                "
                                                                >Add New</a
                                                            >
                                                        </p>
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
                <!-- Footer -->
                <footer-component />
                <!-- End of Footer -->
            </div>
            <div
                class="modal fade"
                id="deleteModal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="deleteModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">
                                Are you sure to "delete"
                                {{ product.title }} ?
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

                            Select "Delete" below if you are sure to remove
                            Product <b>{{product.title}}</b>.
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
                                @click="deletePrd"
                                :disabled="requesting"
                            >
                                <i
                                    class="fas fa-spinner fa-spin"
                                    v-if="requesting"
                                ></i>
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import NavbarComponent from "../Super/NavbarComponent.vue";
    import FooterComponent from "../Super/FooterComponent.vue";
    import SidebarComponent from "../Super/SidebarComponent.vue";
    import ProductComponent from "./Profile.vue";
    import CategoryComponent from "./CategoryComponent.vue";

    import Multiselect from "vue-multiselect";
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
        ["link", "image"],
        // ["clean"]
    ];
    export default {
        components: {
            NavbarComponent,
            FooterComponent,
            SidebarComponent,
            ProductComponent,
            CategoryComponent,
            quillEditor,
            Multiselect,
        },
        name: "Product",
        computed: {
            editor() {
                return this.$refs.myQuillEditor.quill;
            },
        },
        data() {
            return {
                archivedPrd: false,
                authors: [],
                colors: [],
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
                dialogImageUrl: "",
                dialogVisible: false,
                fileList: [],
                imageList: [],
                loading: false,
                onAddPrd: false,
                product: {
                    title: "",
                    amount: "",
                    stock: "",
                    desc: "",
                    colors: [],
                    sizes: [],
                    category_id: "null",
                },
                sizes: [],
                categories: [],
                status: false,
                status_msg: "",
                successMessage: "",
                success: false,
                errorMessage: "",
                errorMsg: false,
                sortBy: "latest",
                products: [],
                deletedImgs: [],
                deletedImgIds: [],
                productTrashedView: false,
                productTrashed: [],
                update: false,
                requesting: false,
            };
        },
        methods: {
            cancelUpdateOrAdd() {
                this.product.title = "";
                this.product.amount = "";
                this.product.stock = "";
                this.product.description = "";
                this.product.author_id = "null";
                this.product.classe_id = "null";
                this.product.subject_id = "null";
                this.product.category_id = "null";
                this.fileList = [];
                this.imageList = [];
                this.product.recommended = "";
                this.product.colors = []
                this.product.sizes = [];
            },
            createproduct() {
                if (!this.validateForm()) {
                    return false;
                }
                this.requesting = true;
                let url;
                let axiosFunction;
                if (this.update == true) {
                    url = `api/product/${this.product.id}`;
                    axiosFunction = axios.post;
                } else {
                    url = "api/product";
                    axiosFunction = axios.post;
                }
                let formData = new FormData();
                $.each(this.imageList, function (key, image) {
                    formData.append(`images[${key}]`, image);
                });
                formData.append("title", this.product.title);
                this.deletedImgs.length > 0
                    ? formData.append("deletedImgs", this.deletedImgs)
                    : null;
                this.deletedImgs.length > 0
                    ? formData.append("deletedImgIds", this.deletedImgIds)
                    : null;
                formData.append("amount", this.product.amount);
                formData.append("recommended", this.product.recommended);
                formData.append("desc", this.product.desc);
                this.product.stock == null ? null : formData.append("stock", this.product.stock);
                if (this.product.colors != null) {
                    let colors = [];
                    this.product.colors.forEach(el => {
                        colors.push(el.id);
                    })
                    formData.append("colors", colors);
                }
                else this.product.color = "";
                if (this.product.sizes != null) {
                    let sizes = [];
                    this.product.sizes.forEach(el => {
                        sizes.push(el.id);
                    })
                    formData.append("sizes", sizes);
                }
                else this.product.size = "";
                formData.append("category_id", this.product.category_id);

                this.update ? formData.append("_method", "put") : null;
          
                axiosFunction(url, formData, { headers: { "Content-Type": "multipart/form-data" },})
                    .then((res) => {
                        if (res.data.status == 1) {
                            this.viewUp();
                            this.product = {};
                            this.successState(
                                true,
                                this.update
                                    ? "Product Update Success"
                                    : res.data.message
                            );
                            !this.update
                                ? (this.products = res.data.products)
                                : null;
                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);
                        }
                    })
                    .catch((err) => {
                        this.errAndLogState(
                            true,
                            "Network Error, Try again or refreh your browser!"
                        );
                        this.requesting = false;
                        setTimeout(() => {
                            this.errAndLogState(false, "");
                        }, 2000);
                    });
            },
            deletePrd() {
                this.requesting = true;
                axios.delete(`api/product/${this.product.id}`).then((res) => {
                    if (res.status == 204) {
                        const findId = (rol) => rol.id === this.product.id;
                        this.products.data.splice(
                            this.products.data.findIndex(findId),
                            1
                        );
                        this.productTrashed.push(this.product);
                        this.requesting = false;
                        $("#deleteModal .close").click();
                    }
                });
            },
            getSizeColorByCate() {
                let selCategory = this.categories.filter(
                    (el) => el.id == this.product.category_id
                );
                this.colors = selCategory[0].colors;
                this.sizes = selCategory[0].sizes;
            },
            handleRemove(file, fileList) {
                this.update ? (this.deletedImgs.push(file.url),this.deletedImgIds.push(file.id) ): null; //Pushes removed images
                let list = this.update ? this.fileList : this.imageList;
                const findId = (rol) => rol.uid === file.uid; 
                list.splice(
                    list.findIndex(findId),
                    1
                );
            },
            handlePictureCardPreview(file) {
                this.dialogImageUrl = file.url;
                this.dialogVisible = true;
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
            onEditorBlur(editor) {
                // console.log('editor blur!', editor)
            },
            onEditorFocus(editor) {
                // console.log('editor focus!', editor)
            },
            onEditorReady(editor) {
                // console.log('editor ready!', editor)
            },
            successState(msg, successMsg) {
                this.success = msg;
                this.successMessage = successMsg;
            },
            errAndLogState(errMsg, errorMsg) {
                this.errorMsg = errMsg;
                this.errorMessage = errorMsg;
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

            getProducts() {
                this.loading = true;
                axios.get(`api/product/${this.sortBy}/null`).then((res) => {
                    this.products = res.data.products;
                    this.productTrashed = res.data.trashed;
                    this.loading = false;
                });
            },
            getProduct(datum) {
                this.product = datum;
                this.product.category_id = datum.categories[0].id;
                this.getSizeColorByCate();
                try {
                    this.fileList = datum.images;
                } catch (error) {
                    console.log(error);
                }
            },
            nameWithLang({ name }) {
                return `${name}`;
            },
            openCreatePrdForm() {
                this.onAddPrd = true;
                this.archivedPrd = false;
                this.update = false;
                this.books = false;
            },
            paginate(url) {
                this.loading = true;
                axios
                    .get(url)
                    .then((res) => {
                        this.products = res.data.products;
                        this.productTrashed = res.data.trashed;
                        this.loading = false;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            restoreArch(product) {
                axios
                    .patch(`api/product-refresh/${product.id}`)
                    .then((res) => {
                        if (res.status == 201) {
                            this.products.data.push(product);
                            this.productTrashed.splice(
                                this.productTrashed.findIndex(
                                    (rol) => rol.id === product.id
                                ),
                                1
                            );
                        }
                        this.$toasted.show("Product restored!", {
                            duration: 3000,
                            position: "top-right",
                        });
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            showNotification(message) {
                this.status_msg = message;
                setTimeout(() => {
                    this.status_msg = "";
                }, 3000);
            },
            updateImageList(file) {
                this.imageList.push(file.raw);
            },
            viewUp(){
                window.scroll(30, 50);
            },
            validateForm() {
                if (!this.product.category_id || this.product.category_id == "null") {
                    this.status = false;
                    this.showNotification("Category cannot be empty");
                    this.viewUp()
                    return false;
                }
                if (!this.product.desc || this.product.desc == "") {
                    this.status = false;
                    this.showNotification("Description cannot be empty");
                    this.viewUp()
                    return false;
                }
                if (!this.update && this.imageList.length < 1) {
                    this.status = false;
                    this.showNotification("You need to select an image");
                    this.viewUp()
                    return false;
                }
                return true;
            },
        },
        mounted() {
            this.getProducts();
            this.getCategories();
        },
    };
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style>
    a {
        color: #000;
    }
    a:hover {
        color: rgb(250, 140, 140);
    }
    .loadingPage {
        text-align: center;
        height: 50vh;
        position: relative;
    }
    .loadingPage i {
        position: absolute;
        top: 25vh;
    }
    .avatar-uploader .el-upload {
        border: 1px dashed #d9d9d9;
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    .avatar-uploader .el-upload:hover {
        border-color: #409eff;
    }
    .avatar-uploader-icon {
        color: #8c939d;
        font-size: 28px;
        width: 178px;
        height: 178px;
        line-height: 178px;
        text-align: center;
    }
    .avatar {
        width: 178px;
        height: 178px;
        display: block;
    }
</style>
<style scoped>
    .cursor-pointer {
        cursor: pointer;
    }
    .card-img-top {
        height: 235px !important;
    }

    @media (max-width: 768px) {
        .flexedItem {
            display: flex;
            justify-content: space-between;
        }
        .hidden-xs {
            display: none;
        }
    }
    @media (min-width: 1366px) {
        .hidden-lg {
            display: none;
        }
    }
</style>