<!DOCTYPE html>
<html lang="en">
    @include('included.userNav')
    <style>
        .htc__loadmore__btn button {
            border: 1px solid #eeeeee;
        }

        .page-pagination ul li a {
            background-color: #f6f6f6;
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
        <blogs-component></blogs-component>
    </div>
    @include('included.userScript')
</body>
</html>
