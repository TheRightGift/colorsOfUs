<!DOCTYPE html>
<html lang="en">
    @include('included.userNav')
    <link rel="stylesheet" href="{{asset('css/assets/zoomOnHover.css')}}">
    <style>
        .product__big__images {
            width: 80%;
        }
        label[for="product-select-option-0"] {
            display: none;
        }

        #product-select-option-0 {
            display: none;
        }

        #product-select-option-0
            + .custom-style-select-box {
            display: none !important;
        }
    </style>
<body id="uniqlo-2" class="template-index">
    <div id="preloader_active">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_four"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_one"></div>

            </div>
        </div>
    </div>
    <div id="app">
        <singleproduct-component></singleproduct-component>
    </div>
    @include('included.userScript')
</body>
</html>
            