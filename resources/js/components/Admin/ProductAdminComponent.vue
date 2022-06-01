<template>
    <div>
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Dashboard</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <button
                        type="button"
                        class="btn btn-info d-none d-lg-block m-l-15 text-white"
                    >
                        <i class="fa fa-plus-circle"></i> Create New
                    </button>
                </div>
            </div>
        </div>
        <!-- Info box Content -->
        <!-- ============================================================== -->
        <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex m-b-40 align-items-center no-block">
                                    <h5 class="card-title ">PRODUCT SALES</h5>
                                    <div class="ms-auto">
                                        <ul class="list-inline font-12">
                                            <li><i class="fa fa-circle text-cyan"></i> Iphone</li>
                                            <li><i class="fa fa-circle text-primary"></i> IMac</li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="morris-area-chart2" style="height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-4 col-md-12">
                        <div class="row">
                            <!-- Column -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">ORDER STATS</h5>
                                        <div id="morris-donut-chart" class="ecomm-donute"></div>
                                        <ul class="list-inline m-t-30 text-center">
                                            <li class="p-r-20">
                                                <h5 class="text-muted"><i class="fa fa-circle" style="color: #fb9678;"></i> Order</h5>
                                                <h4 class="m-b-0">8500</h4>
                                            </li>
                                            <li class="p-r-20">
                                                <h5 class="text-muted"><i class="fa fa-circle" style="color: #01c0c8;"></i> Pending</h5>
                                                <h4 class="m-b-0">3630</h4>
                                            </li>
                                            <li>
                                                <h5 class="text-muted"> <i class="fa fa-circle" style="color: #4F5467;"></i> Delivered</h5>
                                                <h4 class="m-b-0">4870</h4>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                        </div>
                    </div>
        </div>
        <!-- ============================================================== -->
    </div>
</template>
<script>
    export default {
        name: "ProductAdmin",
    };
</script>