<!DOCTYPE html>
<html lang="en">
    @include('included.userNav')
<body id="uniqlo-2" class="template-index">
    {{-- <div id="preloader_active">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_four"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_one"></div>

            </div>
        </div>
    </div> --}}
    <div id="app">
        <dashboard-component></dashboard-component>
    </div>
    @include('included.userScript')
</body>
</html>
