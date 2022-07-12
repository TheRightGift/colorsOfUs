<!DOCTYPE html>
<html lang="en">
    @include('included.userNav')
<body id="account" class="template-customers-login" >
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
        <reset_password-component></reset_password-component>
    </div>
    @include('included.userScript')
</body>
</html>
