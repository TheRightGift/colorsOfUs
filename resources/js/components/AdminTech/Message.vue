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
                        <!-- Content Row -->
                        <div class="row page-titles">
                            <div class="col-md-5 align-self-center">
                                <h4 class="text-themecolor">Mailbox</h4>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End right sidebar toggle -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Start Page Content -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4">
                                            <div class="card-body inbox-panel">
                                                <input
                                                    type="search"
                                                    name=""
                                                    class="
                                                        m-b-20
                                                        p-10
                                                        w-100
                                                        text-black
                                                    "
                                                    v-model="searchVal"
                                                    @keyup="search"
                                                    placeholder="Search"
                                                />
                                                <ul
                                                    class="
                                                        list-group
                                                        list-group-full
                                                    "
                                                >
                                                    <li
                                                        class="
                                                            list-group-item
                                                            d-flex
                                                            no-block
                                                            align-items-center
                                                        "
                                                        :class="{
                                                            active: msgsActive,
                                                        }"
                                                    >
                                                        <a
                                                            href="javascript:void(0)"
                                                            class="
                                                                d-flex
                                                                no-block
                                                                align-items-center
                                                            "
                                                            @click="reload"
                                                            ><i
                                                                class="
                                                                    mdi
                                                                    mdi-gmail
                                                                    fs-4
                                                                    me-2
                                                                    d-flex
                                                                    align-items-center
                                                                "
                                                            ></i>
                                                            Notifications </a
                                                        ><span
                                                            class="
                                                                badge
                                                                bg-success
                                                                ms-auto
                                                            "
                                                            >{{
                                                                validMsg
                                                            }}</span
                                                        >
                                                    </li>

                                                    <li
                                                        class="
                                                            list-group-item
                                                            d-flex
                                                            no-block
                                                            align-items-center
                                                        "
                                                        :class="{
                                                            active: unreadActive,
                                                        }"
                                                    >
                                                        <a
                                                            href="#!"
                                                            class="
                                                                d-flex
                                                                no-block
                                                                align-items-center
                                                            "
                                                            @click="getUnread"
                                                        >
                                                            <i
                                                                class="
                                                                    mdi
                                                                    mdi-file-document-box
                                                                    fs-4
                                                                    me-2
                                                                    d-flex
                                                                    align-items-center
                                                                "
                                                            ></i>
                                                            Unread
                                                        </a>
                                                        <span
                                                            class="
                                                                badge
                                                                bg-danger
                                                                ms-auto
                                                            "
                                                            >{{ unread }}</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="
                                                            list-group-item
                                                            d-flex
                                                            no-block
                                                            align-items-center
                                                        "
                                                        :class="{
                                                            active: trashActive,
                                                        }"
                                                        v-if="$store.state.user.role_id == 2"
                                                    >
                                                        <a
                                                            href="#!"
                                                            class="
                                                                d-flex
                                                                no-block
                                                                align-items-center
                                                            "
                                                            @click="getTrashed"
                                                        >
                                                            <i
                                                                class="
                                                                    fs-4
                                                                    me-2
                                                                    d-flex
                                                                    align-items-center
                                                                    mdi
                                                                    mdi-delete
                                                                "
                                                            ></i>
                                                            Trash
                                                        </a>
                                                    </li>
                                                </ul>
                                                <h3
                                                    class="card-title m-t-40"
                                                ></h3>
                                                <div
                                                    class="
                                                        list-group
                                                        b-0
                                                        mail-list
                                                    "
                                                    v-if="$store.state.user.role_id == 2"
                                                >
                                                    <a
                                                        href="#!"
                                                        class="list-group-item"
                                                        ><span
                                                            class="
                                                                fa fa-circle
                                                                text-info
                                                                m-r-10
                                                            "
                                                        ></span
                                                        >Trashed messages have
                                                        order that is deleted</a
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="
                                                col-lg-9 col-md-8
                                                bg-light
                                                border-start
                                            "
                                        >
                                            <div
                                                class="card-body"
                                                v-if="!msgOpen"
                                            >
                                                <button
                                                    type="button "
                                                    class="
                                                        btn btn-secondary
                                                        m-r-10 m-b-10
                                                    "
                                                    @click="reload()"
                                                >
                                                    <i
                                                        class="
                                                            mdi mdi-reload
                                                            font-18
                                                        "
                                                    ></i>
                                                </button>
                                            </div>
                                            <div>
                                                <div
                                                    class="
                                                        card
                                                        b-all
                                                        shadow-none
                                                    "
                                                >
                                                    <div
                                                        class="
                                                            inbox-center
                                                            table-responsive
                                                        "
                                                        v-if="!msgOpen"
                                                    >
                                                        <table
                                                            class="
                                                                table
                                                                table-hover
                                                                no-wrap
                                                            "
                                                        >
                                                            <tbody>
                                                                <tr
                                                                    :class="{
                                                                        unread:
                                                                            message.track ==
                                                                            '0',
                                                                    }"
                                                                    v-for="message in pageOfItems"
                                                                    :key="
                                                                        message.id
                                                                    "
                                                                >
                                                                    <span
                                                                        @click="
                                                                            getMessage(
                                                                                message
                                                                            )
                                                                        "
                                                                        class="
                                                                            cursor-pointer
                                                                        "
                                                                    >
                                                                        <td
                                                                            style="
                                                                                width: 40px;
                                                                            "
                                                                        >
                                                                            <div
                                                                                class="
                                                                                    form-check
                                                                                    mr-sm-2
                                                                                "
                                                                            >
                                                                                <input
                                                                                    type="checkbox"
                                                                                    class="
                                                                                        form-check-input
                                                                                    "
                                                                                    id="checkbox0"
                                                                                    value="check"
                                                                                />
                                                                                <label
                                                                                    class="
                                                                                        form-check-label
                                                                                    "
                                                                                    for="checkbox0"
                                                                                ></label>
                                                                            </div>
                                                                        </td>

                                                                        <td
                                                                            class="
                                                                                hidden-xs-down
                                                                            "
                                                                        >
                                                                            {{
                                                                                message
                                                                                    .user
                                                                                    .email
                                                                            }}
                                                                        </td>
                                                                        <td
                                                                            class="
                                                                                max-texts
                                                                            "
                                                                        >
                                                                            <a
                                                                                href="#!"
                                                                            />
                                                                            {{
                                                                                message.message.slice(
                                                                                    0,
                                                                                    70
                                                                                )
                                                                            }}
                                                                        </td>

                                                                        <td
                                                                            class="
                                                                                text-end
                                                                            "
                                                                        >
                                                                            {{
                                                                                moment(
                                                                                    message.created_at
                                                                                ).calendar()
                                                                            }}
                                                                        </td>
                                                                    </span>
                                                                </tr>
                                                                <tr
                                                                    v-if="
                                                                        messages.length ==
                                                                        0
                                                                    "
                                                                    class="
                                                                        text-center
                                                                    "
                                                                >
                                                                    No
                                                                    Notifications
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div
                                                            class="
                                                                card-footer
                                                                pb-0
                                                                pt-3
                                                            "
                                                        >
                                                            <jw-pagination
                                                                :pageSize="25"
                                                                :items="
                                                                    messages
                                                                "
                                                                @changePage="
                                                                    onChangePage
                                                                "
                                                            ></jw-pagination>
                                                        </div>
                                                    </div>
                                                    <div v-if="msgOpen">
                                                        <div class="card-body">
                                                            <h3
                                                                class="
                                                                    card-title
                                                                    m-b-0
                                                                "
                                                            >
                                                                <i
                                                                    class="
                                                                        mdi
                                                                        mdi-arrow-left
                                                                        font-18
                                                                        cursor-pointer
                                                                    "
                                                                    @click="
                                                                        msgOpen = false
                                                                    "
                                                                ></i>
                                                                {{
                                                                    message.title ||
                                                                    ""
                                                                }}
                                                            </h3>
                                                        </div>
                                                        <div>
                                                            <hr class="m-t-0" />
                                                        </div>
                                                        <div class="card-body">
                                                            <div
                                                                class="
                                                                    d-flex
                                                                    m-b-40
                                                                "
                                                            >
                                                                <div>
                                                                    <a href="#!"
                                                                        ><img
                                                                            src="img/userD.png"
                                                                            alt="user"
                                                                            width="40"
                                                                            class="
                                                                                img-circle
                                                                            "
                                                                    /></a>
                                                                </div>
                                                                <div
                                                                    class="
                                                                        p-l-10
                                                                    "
                                                                >
                                                                    <h4
                                                                        class="
                                                                            m-b-0
                                                                        "
                                                                    >
                                                                        {{
                                                                            message
                                                                                .user
                                                                                .firstname ||
                                                                            "Default user"
                                                                        }}
                                                                    </h4>
                                                                    <small
                                                                        class="
                                                                            text-muted
                                                                        "
                                                                        >From:
                                                                        {{
                                                                            message
                                                                                .user
                                                                                .email
                                                                        }}(message
                                                                        generated
                                                                        within
                                                                        coloursofus)
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                <b
                                                                    >Dear
                                                                    {{
                                                                        $store
                                                                            .state
                                                                            .user
                                                                            .firstname
                                                                    }}</b
                                                                >
                                                            </p>
                                                            <p
                                                                v-html="
                                                                    message.message
                                                                "
                                                            ></p>
                                                        </div>
                                                        <div>
                                                            <hr class="m-t-0" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End PAge Content -->
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
<style scoped>
    .inbox-panel .list-group .list-group-item {
        border: 0px;
        border-radius: 0px;
        border-left: 3px solid transparent;
        display: flex;
        align-items: center;
    }
    .inbox-panel .list-group .list-group-item a {
        color: #212529;
    }
    .inbox-panel .list-group .list-group-item.active,
    .inbox-panel .list-group .list-group-item:hover {
        background: #e9ecef;
        border-left: 3px solid #fb9678;
    }

    .inbox-center .unread td {
        font-weight: 700;
    }

    .inbox-center td {
        vertical-align: middle;
        white-space: nowrap;
    }

    .inbox-center a {
        color: #212529;
        padding: 2px 0 3px 0;
        overflow: hidden;
        vertical-align: middle;
        text-overflow: ellipsis;
        white-space: nowrap;
        display: inline-block;
    }

    .inbox-center .checkbox {
        margin-top: -13px;
        height: 20px;
    }
</style>
<script>
    import NavbarComponent from "../Super/NavbarComponent.vue";
    import FooterComponent from "../Super/FooterComponent.vue";
    import SidebarComponent from "../Super/SidebarComponent.vue";
    import moment from "moment";

    export default {
        components: { NavbarComponent, FooterComponent, SidebarComponent },
        data() {
            return {
                notifications: [],
                message: {},
                messages: [],
                msgsActive: false,
                msgOpen: false,
                pageOfItems: [],
                searchVal: "",
                success: "",
                trashActive: false,
                unread: 0,
                unreadActive: false,
                validMsg: 0,
            };
        },
        computed: {},
        methods: {
            deleteOrder(id) {
                axios
                    .delete(`api/order/${id}`)
                    .then((res) => {
                        if (res.status == 204) {
                            const findId = (rol) => rol.id === id;
                            this.success = "Order Deleted";
                            window.scroll(0, 10);
                            this.messages.data.splice(
                                this.messages.data.findIndex(findId),
                                1
                            );
                            setTimeout(() => {
                                this.success = "";
                                location.reload();
                            }, 2000);
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getMessage(msg) {
                // If get message
                this.message = msg;
                this.msgOpen = true;
                msg.track == 0
                    ? axios
                          .put(`/api/notify/${msg.id}`)
                          .then((res) => {
                              if (res.data.status == 200) {
                                  this.message.track = "1";
                              }
                          })
                          .catch((err) => {
                              console.log(err);
                          })
                    : null;
            },
            getNotifications() {
                let url =
                    this.$store.state.user.role_id == 2
                        ? "/api/notify-prdmin"
                        : "api/notify";
                axios
                    .get(url)
                    .then((res) => {
                        this.unreadActive = false;
                        this.trashActive = false;
                        this.msgsActive = true;
                        this.notifications = res.data.notify;
                        this.messages =
                            this.$store.state.user.role_id == 2
                                ? res.data.notify.filter(
                                      (el) => el.order.deleted_at == null
                                  )
                                : res.data.notify;
                        this.unread =
                            this.$store.state.user.role_id == 2
                                ? res.data.notify.filter(
                                      (el) =>
                                          el.track == "0" &&
                                          el.order.deleted_at == null
                                  ).length
                                : res.data.notify.filter((el) => el.track == "0")
                                      .length;
                        this.validMsg =
                            this.$store.state.user.role_id == 2
                                ? this.messages.filter(
                                      (el) => el.order.deleted_at == null
                                  ).length
                                : this.messages.length;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getTrashed() {
                this.messages = this.notifications.filter(
                    (el) => el.order.deleted_at != null
                );
                this.unreadActive = false;
                this.trashActive = true;
                this.msgsActive = false;
                this.msgOpen = false;
            },
            getUnread() {
                this.messages =
                    this.$store.state.user.role_id == 2
                        ? this.notifications.filter(
                              (el) => el.track == "0" && el.order.deleted_at == null
                          )
                        : this.notifications.filter((el) => el.track == "0");
                this.unreadActive = true;
                this.trashActive = false;
                this.msgsActive = false;
                this.msgOpen = false;
            },
            moment(arg) {
                return moment(arg);
            },
            onChangePage(pageOfItems) {
                // update page of items
                this.pageOfItems = pageOfItems;
            },
            reload() {
                this.getNotifications();
            },
            search() {
                if (this.searchVal != "") {
                    return (this.messages = this.notifications.filter((item) => {
                        return this.searchVal
                            .toLowerCase()
                            .split(" ")
                            .every(
                                (v) =>
                                    item.user.email.toLowerCase().includes(v) ||
                                    item.message.toLowerCase().includes(v)
                            );
                    }));
                } else {
                    if (this.msgsActive) {
                        this.messages = this.$store.state.user.role_id == 2 ? this.notifications.filter(
                            (el) => el.order.deleted_at == null
                        ) : this.notifications;
                    } else if (this.unreadActive) {
                        this.getUnread();
                    } else if (this.trashActive) {
                        this.getTrashed();
                    }
                }
            },
        },
        mounted() {
            this.getNotifications();
        },
    };
</script>
