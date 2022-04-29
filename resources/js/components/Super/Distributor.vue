<template>
    <div>
        <div id="wrapper">
            <sidebar-component />
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <navbar-component />
                    <div class="container-fluid">
                        <div
                            class="
                                d-sm-flex
                                align-items-center
                                justify-content-between
                                mb-4
                            "
                        >
                            <h1 class="h3 mb-0 text-gray-800">Distributors</h1>
                        </div>
                        <div class="row">
                            <!-- Area Chart -->
                            <div class="col-xl-12 col-lg-11">
                                <div class="card shadow mb-4">
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
                                            "
                                        >
                                            Distributors Overview
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
                                                        (distributorsView = false),
                                                            (distributorAddView = true)
                                                    "
                                                    >New Distributor</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body p-0">
                                        <div class="card-body">
                                            <div
                                                id="addAD"
                                                v-if="distributorAddView"
                                            >
                                                <div class="card shadow">
                                                    <div class="card-body">
                                                        <div class="card-title">
                                                            <h5>
                                                                Add New
                                                                Distributor
                                                            </h5>
                                                        </div>
                                                        <div
                                                            class="bg-success"
                                                            v-if="success != ''"
                                                        >
                                                            <p>
                                                                {{ success }}
                                                            </p>
                                                        </div>
                                                        <form
                                                            class="
                                                                w-full
                                                                max-w-lg
                                                            "
                                                            @submit.prevent="
                                                                submit
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
                                                                        for="grid-name"
                                                                    >
                                                                        Name
                                                                    </label>
                                                                    <input
                                                                        class="
                                                                            form-control
                                                                        "
                                                                        id="grid-name"
                                                                        type="text"
                                                                        placeholder="Crescent Bookstore"
                                                                        v-model="
                                                                            distributor.name
                                                                        "
                                                                        required
                                                                    />
                                                                    <p
                                                                        class="
                                                                            error
                                                                        "
                                                                        v-if="
                                                                            errors.name
                                                                        "
                                                                    >
                                                                        {{
                                                                            errors.name
                                                                        }}
                                                                    </p>
                                                                </div>
                                                                <div
                                                                    class="
                                                                        form-group
                                                                        col-md-6
                                                                    "
                                                                >
                                                                    <label
                                                                        for="grid-address"
                                                                    >
                                                                        Address
                                                                    </label>
                                                                    <input
                                                                        class="
                                                                            form-control
                                                                        "
                                                                        id="grid-address"
                                                                        type="text"
                                                                        placeholder="113 Emmanuel Mall"
                                                                        v-model="
                                                                            distributor.address
                                                                        "
                                                                        required
                                                                    />
                                                                    <p
                                                                        class="
                                                                            error
                                                                        "
                                                                        v-if="
                                                                            errors.address
                                                                        "
                                                                    >
                                                                        {{
                                                                            errors.address
                                                                        }}
                                                                    </p>
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
                                                                        for="usertype"
                                                                        >Select
                                                                        Books</label
                                                                    >
                                                                    <multiselect
                                                                        v-model="
                                                                            resource_id
                                                                        "
                                                                        :options="
                                                                            options
                                                                        "
                                                                        :custom-label="
                                                                            nameWithLang
                                                                        "
                                                                        placeholder="Select Multiple"
                                                                        label="books"
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
                                                                        for="grid-website"
                                                                    >
                                                                        Website
                                                                        (Optional)
                                                                    </label>
                                                                    <input
                                                                        class="
                                                                            form-control
                                                                        "
                                                                        id="grid-website"
                                                                        type="url"
                                                                        placeholder="https://www.crescentbookstore.com"
                                                                        v-model="
                                                                            distributor.website
                                                                        "
                                                                    />
                                                                    <p
                                                                        class="
                                                                            error
                                                                        "
                                                                        v-if="
                                                                            errors.website
                                                                        "
                                                                    >
                                                                        {{
                                                                            errors.website
                                                                        }}
                                                                    </p>
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
                                                                        for="grid-phone"
                                                                    >
                                                                        Phone
                                                                    </label>
                                                                    <input
                                                                        class="
                                                                            form-control
                                                                        "
                                                                        id="grid-phone"
                                                                        type="tel"
                                                                        placeholder="+234819200300"
                                                                        v-model="
                                                                            distributor.phone
                                                                        "
                                                                        required
                                                                    />
                                                                    <p
                                                                        class="
                                                                            error
                                                                        "
                                                                        v-if="
                                                                            errors.phone
                                                                        "
                                                                    >
                                                                        {{
                                                                            errors.phone
                                                                        }}
                                                                    </p>
                                                                </div>
                                                                <div
                                                                    class="
                                                                        form-group
                                                                        col-md-6
                                                                    "
                                                                >
                                                                    <label
                                                                        for="grid-facebook"
                                                                    >
                                                                        Facebook
                                                                        (Optional)
                                                                    </label>
                                                                    <input
                                                                        class="
                                                                            form-control
                                                                        "
                                                                        id="grid-facebook"
                                                                        type="text"
                                                                        placeholder="https://faceboo.com/tomunslittlefbPage"
                                                                        v-model="
                                                                            distributor.facebook
                                                                        "
                                                                    />
                                                                    <p
                                                                        class="
                                                                            error
                                                                        "
                                                                        v-if="
                                                                            errors.address
                                                                        "
                                                                    >
                                                                        {{
                                                                            errors.address
                                                                        }}
                                                                    </p>
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
                                                                        for="grid-twitter"
                                                                    >
                                                                        Twitter
                                                                        (Optional)
                                                                    </label>
                                                                    <input
                                                                        class="
                                                                            form-control
                                                                        "
                                                                        id="grid-twitter"
                                                                        type="text"
                                                                        placeholder="https://twitter.com/tomunslittletweetPage"
                                                                        v-model="
                                                                            distributor.twitter
                                                                        "
                                                                    />
                                                                    <p
                                                                        class="
                                                                            error
                                                                        "
                                                                        v-if="
                                                                            errors.twitter
                                                                        "
                                                                    >
                                                                        {{
                                                                            errors.twitter
                                                                        }}
                                                                    </p>
                                                                </div>

                                                                <div
                                                                    class="
                                                                        form-group
                                                                        col-md-6
                                                                    "
                                                                >
                                                                    <label
                                                                        for="grid-insta"
                                                                    >
                                                                        Instagram
                                                                        (Optional)
                                                                    </label>
                                                                    <input
                                                                        class="
                                                                            form-control
                                                                        "
                                                                        id="grid-insta"
                                                                        type="text"
                                                                        placeholder="https://instagram.com/tomunslittleinstaPage"
                                                                        v-model="
                                                                            distributor.instagram
                                                                        "
                                                                    />
                                                                    <p
                                                                        class="
                                                                            error
                                                                        "
                                                                        v-if="
                                                                            errors.instagram
                                                                        "
                                                                    >
                                                                        {{
                                                                            errors.instagram
                                                                        }}
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="form-row"
                                                            >
                                                                <div
                                                                    class="
                                                                        form-group
                                                                        col-md-12
                                                                    "
                                                                >
                                                                    <label
                                                                        for="grid-desc"
                                                                    >
                                                                        Description
                                                                    </label>
                                                                    <textarea
                                                                        class="
                                                                            form-control
                                                                        "
                                                                        id="grid-desc"
                                                                        rows="6"
                                                                        placeholder="Distributor About(Optional)"
                                                                        v-model="
                                                                            distributor.desc
                                                                        "
                                                                    >
                                                                    </textarea>
                                                                    <p
                                                                        class="
                                                                            error
                                                                        "
                                                                        v-if="
                                                                            errors.desc
                                                                        "
                                                                    >
                                                                        {{
                                                                            errors.desc
                                                                        }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <button
                                                                type="submit"
                                                                class="
                                                                    btn
                                                                    btn-primary
                                                                "
                                                                :disabled="
                                                                    registering
                                                                "
                                                            >
                                                                <i
                                                                    v-if="
                                                                        registering
                                                                    "
                                                                    class="
                                                                        fas
                                                                        fa-spinner
                                                                        fa-spin
                                                                        fa-fw
                                                                    "
                                                                    aria-hidden="true"
                                                                ></i>
                                                                {{
                                                                    update
                                                                        ? "Update"
                                                                        : "Submit"
                                                                }}
                                                            </button>
                                                            <button
                                                                type="button"
                                                                class="
                                                                    btn
                                                                    btn-secondary
                                                                "
                                                                @click="
                                                                    (distributorAddView = false),
                                                                        (distributorsView = true),
                                                                        (update = false),
                                                                        (distributor =
                                                                            {})
                                                                "
                                                            >
                                                                Close
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                id="viewDistributors"
                                                v-else-if="distributorsView"
                                            >
                                                <div
                                                    v-if="
                                                        distributors.data != []
                                                    "
                                                >
                                                    <div class="row">
                                                        <!-- Collapsable Card Example -->
                                                        <div
                                                            class="
                                                                mb-4
                                                                col-md-3
                                                                col-sm-12
                                                                mr-1
                                                            "
                                                            :class="{shadow: clickedOn == index, card: clickedOn == index}"
                                                            v-for="(distributor, index) in distributors.data"
                                                            :key="
                                                                distributor.id
                                                            "
                                                            @click="getIndex(index)"
                                                        >
                                                            <!-- Card Header - Accordion -->
                                                            <a
                                                                :href="
                                                                    '#' +
                                                                    distributor.name.replace(
                                                                        /\s+/g,
                                                                        ''
                                                                    )
                                                                "
                                                                class="
                                                                    d-block
                                                                    card-header
                                                                    py-3
                                                                "
                                                                data-toggle="collapse"
                                                                role="button"
                                                                aria-expanded="true"
                                                                :aria-controls="
                                                                    distributor.name.replace(
                                                                        /\s+/g,
                                                                        ''
                                                                    )
                                                                "
                                                            >
                                                                <h6
                                                                    class="
                                                                        m-0
                                                                        font-weight-bold
                                                                        text-primary
                                                                    "
                                                                >
                                                                    {{
                                                                        distributor.name
                                                                    }}<small
                                                                        v-if="
                                                                            distributor.deleted_at !=
                                                                            null
                                                                        "
                                                                        >(Trashed)</small
                                                                    >
                                                                </h6>
                                                            </a>
                                                            <!-- Card Content - Collapse -->
                                                            <div
                                                                class="collapse"
                                                                :id="
                                                                    distributor.name.replace(
                                                                        /\s+/g,
                                                                        ''
                                                                    )
                                                                "
                                                            >
                                                                <div
                                                                    class="
                                                                        card-body
                                                                        d-flex
                                                                        justify-content-between
                                                                    "
                                                                >
                                                                    <div
                                                                        class="
                                                                            flexGrow
                                                                        "
                                                                    >
                                                                        <p>
                                                                            <i
                                                                                class="
                                                                                    fas
                                                                                    fa-user
                                                                                "
                                                                            ></i
                                                                            >&nbsp;&nbsp;
                                                                            {{
                                                                                distributor.name
                                                                            }}
                                                                        </p>
                                                                        <p>
                                                                            <i
                                                                                class="
                                                                                    fas
                                                                                    fa-location-arrow
                                                                                "
                                                                            ></i
                                                                            >&nbsp;&nbsp;
                                                                            {{
                                                                                distributor.address
                                                                            }}
                                                                        </p>
                                                                        <p>
                                                                            <i
                                                                                class="
                                                                                    fas
                                                                                    fa-phone
                                                                                "
                                                                            ></i
                                                                            >&nbsp;&nbsp;
                                                                            {{
                                                                                distributor.phone
                                                                            }}
                                                                        </p>
                                                                        <p
                                                                            v-if="
                                                                                distributor.website
                                                                            "
                                                                        >
                                                                            <i
                                                                                class="
                                                                                    fas
                                                                                    fa-link
                                                                                "
                                                                            ></i
                                                                            >&nbsp;&nbsp;
                                                                            {{
                                                                                distributor.website
                                                                            }}
                                                                        </p>
                                                                        <p
                                                                            v-if="
                                                                                distributor.desc
                                                                            "
                                                                        >
                                                                            <i
                                                                                class="
                                                                                    fas
                                                                                    fa-info
                                                                                "
                                                                            ></i
                                                                            >&nbsp;&nbsp;
                                                                            {{
                                                                                distributor.desc.slice(
                                                                                    0,
                                                                                    50
                                                                                )
                                                                            }}...
                                                                        </p>
                                                                        <p
                                                                            v-if="
                                                                                distributor.facebook
                                                                            "
                                                                        >
                                                                            <i
                                                                                class="
                                                                                    fab
                                                                                    fa-facebook
                                                                                "
                                                                            ></i
                                                                            >&nbsp;&nbsp;
                                                                            {{
                                                                                distributor.facebook
                                                                            }}
                                                                        </p>
                                                                        <p
                                                                            v-if="
                                                                                distributor.twitter
                                                                            "
                                                                        >
                                                                            <i
                                                                                class="
                                                                                    fab
                                                                                    fa-twitter
                                                                                "
                                                                            ></i
                                                                            >&nbsp;&nbsp;
                                                                            {{
                                                                                distributor.twitter
                                                                            }}
                                                                        </p>
                                                                        <p
                                                                            v-if="
                                                                                distributor.instagram
                                                                            "
                                                                        >
                                                                            <i
                                                                                class="
                                                                                    fab
                                                                                    fa-instagram
                                                                                "
                                                                            ></i
                                                                            >&nbsp;&nbsp;
                                                                            {{
                                                                                distributor.instagram
                                                                            }}
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="
                                                                            d-flex
                                                                            flex-column
                                                                            align-self-center
                                                                        "
                                                                    >
                                                                        <p
                                                                            v-if="
                                                                                distributor.deleted_at ==
                                                                                null
                                                                            "
                                                                        >
                                                                            <a
                                                                                class="
                                                                                    card-link
                                                                                    cursor-pointer
                                                                                "
                                                                                @click.prevent="
                                                                                    deleteDistro(
                                                                                        distributor
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
                                                                                    ml-0
                                                                                "
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Edit Item"
                                                                                @click.prevent="
                                                                                    getDistributor(
                                                                                        distributor,
                                                                                        (distributorAddView = true),
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
                                                                        <p
                                                                            v-else
                                                                        >
                                                                            <a
                                                                                href="#"
                                                                                class="
                                                                                    card-link
                                                                                    ml-0
                                                                                "
                                                                                data-target="#restoreWarn"
                                                                                data-toggle="modal"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Restore Item"
                                                                                @click.prevent="
                                                                                    getDistributor(
                                                                                        distributor
                                                                                    )
                                                                                "
                                                                                ><i
                                                                                    class="
                                                                                        fas
                                                                                        fa-recycle
                                                                                    "
                                                                                ></i
                                                                            ></a>
                                                                        </p>
                                                                    </div>
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
                                                                mt-3
                                                            "
                                                        >
                                                            <li
                                                                class="
                                                                    page-item
                                                                "
                                                                v-for="(
                                                                    pages, index
                                                                ) in distributors.links"
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
                                                        No Distributor Added Yet
                                                    </p>
                                                    <p class="text-center">
                                                        <a
                                                            class="
                                                                text-center
                                                                text-decoration-none
                                                            "
                                                            href="#"
                                                            @click="
                                                                (distributorAddView = true),
                                                                    (distributorsView = false)
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
                    <div
                        class="modal fade"
                        id="restoreWarn"
                        tabindex="-1"
                        role="dialog"
                        aria-labelledby="restoreWarnLabel"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5
                                        class="modal-title"
                                        id="restoreWarnLabel"
                                    >
                                        Are you sure to "restore"
                                        {{ distributor.name }} ?
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
                                    <div
                                        class="bg-success"
                                        v-if="success != ''"
                                    >
                                        <p>
                                            {{ success }}
                                        </p>
                                    </div>

                                    Select "Delete" below if you are sure to
                                    restore .
                                </div>
                                <div class="modal-footer">
                                    <button
                                        class="btn btn-secondary"
                                        type="button"
                                        data-dismiss="modal"
                                        @click="distributor = {}"
                                    >
                                        Cancel
                                    </button>
                                    <a
                                        class="btn btn-danger"
                                        href="#"
                                        @click="restoreDistro"
                                        :disabled="registering"
                                    >
                                        <i
                                            class="fas fa-spinner fa-spin"
                                            v-if="registering"
                                        ></i>
                                        Refresh
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer-component />
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </div>
</template>
<script>
    import FooterComponent from "./FooterComponent.vue";
    import NavbarComponent from "./NavbarComponent.vue";
    import SidebarComponent from "./SidebarComponent.vue";
    import Multiselect from "vue-multiselect";
    export default {
        components: {
            NavbarComponent,
            FooterComponent,
            SidebarComponent,
            Multiselect,
        },
        data() {
            return {
                clickedOn: 0,
                distributorAddView: false,
                distributorsView: true,
                distributor: {},
                distributors: [],
                errors: [],
                options: [],
                resource_id: [],
                registering: false,
                success: "",
                update: false,
            };
        },
        methods: {
            deleteDistro(distro) {
                this.distributor = distro;
                axios.delete(`api/distributor/${distro.id}`).then((res) => {
                    if (res.status == 204) {
                        this.distributor.deleted_at = new Date();
                        this.distributor = {};
                        // this.resourceTrashed.push(this.resource);
                        // $("#deleteModal .close").click();
                    }
                });
            },
            getDistributor(data) {
                this.distributor = data;
                this.resource_id = data.resources;
            },
            getDistributors() {
                axios
                    .get("api/distributor")
                    .then((res) => {
                        this.distributors = res.data.distributors;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getIndex(i) {
                this.clickedOn = i;
            },
            getResources() {
                axios
                    .get("api/resource_home")
                    .then((res) => {
                        this.options = res.data.resources;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            restoreDistro() {
                this.registering = true;
                axios
                    .patch(`api/distributor/${this.distributor.id}`)
                    .then((res) => {
                        if (res.status == 201) {
                            this.distributor.deleted_at = null;
                            this.success = "Restore Success!";
                            this.registering = false;
                            this.distributor = {};
                            $("#restoreWarn .close").click();
                            this.success = "";
                        }
                    });
            },
            nameWithLang({ title }) {
                return `${title}`;
            },

            submit() {
                this.distributor.resource_id = this.resource_id.map((a) => a.id);
                this.registering = true;
                let url;
                let axiosFunction;
                if (this.update == true) {
                    url = `api/distributor/${this.distributor.id}`;
                    axiosFunction = axios.put;
                } else {
                    url = "api/distributor";
                    axiosFunction = axios.post;
                }
                axiosFunction(url, this.distributor)
                    .then((res) => {
                        if (res.data.status == 1) {
                            window.scrollTo(5, 20);

                            this.success = this.update
                                ? "Distributor Updated Success"
                                : res.data.message;
                            this.distributors = res.data.distributors;
                            this.distributor = {};
                            this.resource_id = [];
                            setTimeout(() => {
                                this.success = "";
                                this.distributorAddView = false;
                                this.distributorsView = true;
                                this.update = false;
                                this.registering = false;
                            }, 3000);
                        } else if (res.errors) {
                            this.errors = res.errors;
                        }
                    })
                    .catch((err) => {
                        this.registering = false;
                    });
            },
        },
        mounted() {
            this.getDistributors();
            this.getResources();
        },
    };
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style>
    @media (min-width: 1366px) {
        #inspired h1,
        #inspired {
            margin-top: 30px;
        }
    }
    .flexGrow {
        flex-grow: 1;
    }
</style>

        