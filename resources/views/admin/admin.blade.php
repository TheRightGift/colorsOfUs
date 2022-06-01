<!DOCTYPE html>
<html lang="en">
@include('admin.adminnavheader')
<link rel="stylesheet" href="{{asset('/style.min.css')}}">
<body id="page-top">
    <div id="app">
        <admin-component></admin-component>
    </div>
    @include('admin.adminscripts')
</body>
</html>

