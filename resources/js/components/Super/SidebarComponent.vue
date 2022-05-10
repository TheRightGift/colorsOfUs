<template>
    <div>
        <!-- Sidebar -->
        <ul
            class="
                navbar-nav
                bg-gradient-primary
                sidebar
                toggled
                sidebar-dark
                accordion
            "
            id="accordionSidebar"
        >
            <!-- Sidebar - Brand -->
            <a
                class="
                    sidebar-brand
                    d-flex
                    align-items-center
                    justify-content-center
                "
                href="/super"
            >
                <div class="sidebar-brand-icon rotate-n-15">
                    <img
                        class="sidebar-card-illustration mb-2"
                        :src="admin.profile_img"
                        alt="..."
                        v-if="
                            admin.profile_img != '' &&
                            admin.profile_img != 'undefined'
                        "
                    />
                    <i class="fas fa-laugh-wink" v-else></i>
                </div>
                <div class="sidebar-brand-text mx-3">MunsRead Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" :href="$store.state.intended">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a
                >
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Interface</div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li
                class="nav-item"
                v-if="
                    $store.state.rewop == 3 ||
                    $store.state.rewop == 2
                "
            >
                <a class="nav-link collapsed" href="/admins">
                    <i class="fas fa-meh"></i>
                    <span>Admins</span>
                </a>
            </li>
            
            <li class="nav-item" v-if="$store.state.rewop == 3 || 2">
                <a class="nav-link collapsed" href="/blogpost">
                    <i class="fas fa-blog"></i>
                    <span>Blogposts</span>
                </a>
            </li>

            <li
                class="nav-item"
                v-if="
                    $store.state.rewop == 3 ||
                    $store.state.rewop == 2
                "
            >
                <a class="nav-link collapsed" href="/category">
                    <i class="fa fa-book" aria-hidden="true"></i>
                    <span>Category</span>
                </a>
            </li>

            <li
                class="nav-item"
                v-if="
                    $store.state.rewop == 3 ||
                    $store.state.rewop == 2
                "
            >
                <a class="nav-link collapsed" href="/color">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <span>Color</span>
                </a>
            </li>
            
            <li
                class="nav-item"
                v-if="
                    $store.state.rewop == 3 ||
                    $store.state.rewop == 2
                "
            >
                <a class="nav-link collapsed" href="/customer">
                    <i class="far fa-address-book"></i>
                    <span>Customers</span>
                </a>
            </li>

            <li
                class="nav-item"
                v-if="
                    $store.state.rewop == 3 ||
                    $store.state.rewop == 2
                "
            >
                <a class="nav-link collapsed" href="/order">
                    <i class="fas fa-shopping-basket"></i>
                    <span>Orders</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/product">
                    <i class="fas fa-store"></i>
                    <span>Products</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/promotions">
                   <i class='fas fa-ad'></i>
                    <span>Promotions</span>
                </a>
            </li>
            
            <li
                class="nav-item"
                v-if="
                    $store.state.rewop == 3 ||
                    $store.state.rewop == 2
                "
            >
                <a class="nav-link collapsed" href="/size">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                    <span>Size</span>
                </a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" />

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button
                    class="rounded-circle border-0"
                    id="sidebarToggle"
                ></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img
                    class="sidebar-card-illustration mb-2"
                    src="/img/undraw_rocket.svg"
                    alt="..."
                />
                <p class="text-center mb-2">
                    <strong>Admins</strong> have elevated priviledges , you can
                    find all your functions here!
                </p>
            </div>
        </ul>
        <!-- End of Sidebar -->
    </div>
</template>

<script>
    export default {
        name: "Sidebar",
        data() {
            return {
                admin: {},
            };
        },
        methods: {
            
        },
        mounted() {
        },
    };
</script>
<style>
    .sidebar-brand-icon img {
        height: 50px;
        width: 50px;
        border-radius: 50px;
    }
    @media screen and (max-width: 1366px) {
        .sidebar-brand-icon img {
            height: 44px !important;
            width: 65px !important;
        }
    }
</style>