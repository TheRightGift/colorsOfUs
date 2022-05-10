<!DOCTYPE html>
<html lang="en">
    <style>
        .htc__foooter__area {
            background-color: #f3f3f3;
        }

        .footer__container {
            padding-bottom: 65px;
            padding-top: 76px;
        }
    </style>
    @include('included.userNav')
<body id="about-us" class="template-page">
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
        <aboutus-component></aboutus-component>
    </div>
    @include('included.userScript')
</body>
</html>
