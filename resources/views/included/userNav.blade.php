<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name', 'Laravel')}}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/logo.png">
    <link rel="manifest" href="/site.webmanifest">
    <!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Dosis|Poppins:300,400,500,600,700"
    rel="stylesheet">

    <!-- CSS ================================================== -->
    <link href="{{ asset("/css/assets/timber.css") }}"
        rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/css/assets/preloader.css")}}"
        rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/css/assets/bootstrap.min.css")}}"
        rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/css/assets/owl.carousel.min.css")}}"
        rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/css/assets/owl.theme.default.min.css")}}"
        rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/css/assets/themify-icons.css")}}"
        rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/font_awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <link
        href="{{ asset("/css/assets/material-design-iconic-font.min.css")}}"
        rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/css/assets/animate.css")}}"
        rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/css/assets/default.css")}}"
        rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/css/assets/jquery-ui.css")}}"
        rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/css/assets/magnific-popup.css")}}"
        rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/css/assets/slick.css")}}" rel="stylesheet"
        type="text/css" media="all" />
    <link href="{{ asset("/css/assets/slick-theme.css")}}"
        rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/css/assets/meanmenu.css")}}"
        rel="stylesheet" type="text/css" media="all" />
    <style>
            /* Header */

        .header {
            z-index: 10;
            position: relative;
        }
        .main__menu {
            display: flex;
            justify-content: center;
        }
        .main__menu > li > a {
            color: #666;
            display: block;
            font-size: 14px;
            font-weight: 400;
            line-height: 70px;
            position: relative;
            text-transform: capitalize;
        }
        .main__menu > li {
            padding: 0 20px;
            position: relative;
        }
        .logo a {
            display: block;
        }
        .mainmenu__area {
            left: 0;
            margin: auto;
            position: absolute;
            right: 0;
            top: 32px;
            width: 100%;
        }
        .mainmenu__area .container .row,
        .mainmenu__area .container-fluid .row {
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: flex;
            -ms-align-items: center;
            align-items: center;
        }
        .htc-header {
            position: relative;
            z-index: 99;
        }
        .main__menu > li:hover > a {
            color: #ff4136;
        }
        .sidebar--content .htc__news__inner {
            margin: 0 auto;
            width: 68%;
        }
        .header--2 .mean-container a.meanmenu-reveal {
            border: 2px solid #fff;
            color: #fff;
        }
        .header--2 .mean-container a.meanmenu-reveal span {
            background: #fff none repeat scroll 0 0;
        }
        .sidebar__menu {
            text-align: left;
        }
        .sidebar__menu li.active {
            background: #fff;
        }
        .sidebar__menu li.active > a {
            color: #ff4136;
        }
        .sidebar__menu li a {
            display: block;
            font-size: 14px;
            line-height: 40px;
            padding: 0;
            text-align: center;
            text-transform: capitalize;
        }
        .sidebar__menu--inner {
            padding: 0;
        }
        .offsetmenu__inner.sidebar__menu--inner {
            height: 100%;
            padding: 0;
        }
        .sidebar__menu--inner .off__contact .logo {
            padding-top: 40px;
        }
        .menu__style--7 .main__menu li.drop:hover ul.dropdown {
            opacity: 1;
            visibility: visible;
            top: 0;
        }
        .menu__style--7 .main__menu li.drop ul.dropdown {
            background: #ffffff none repeat scroll 0 0;
            box-shadow: 0 0 #0000001a, 0 1px 3px #0000001a;
            left: 100%;
            margin: 0;
            opacity: 0;
            padding: 0;
            position: absolute;
            right: auto;
            top: 10px;
            transition: all 0.2s ease-in-out 0s;
            visibility: hidden;
            width: 189px;
            z-index: 99;
        }
        .sticky__header.scroll-header {
            animation: 0.3s ease-in-out 0s normal none 1 running fadeInDown;
            background: rgba(246, 246, 248, 0.9) none repeat scroll 0 0;
            box-shadow: 0 0 15px #0000001a;
            left: 0;
            margin: 0 auto;
            position: fixed;
            right: 0;
            top: 0;
            width: 100%;
            z-index: 99;
        }
        .sticky__header.scroll-header .logo a {
            height: 70px;
            line-height: 70px;
        }
        .sticky__header.scroll-header .main__menu > li > a {
            height: 70px;
            line-height: 70px;
        }
        .sticky__header.scroll-header .menu-extra li a span,
        .sticky__header.scroll-header .menu-extra li span {
            height: 60px;
            line-height: 62px;
        }
        .fluid-container.mobile-menu-container {
            position: relative;
        }
        .mobile-logo {
            align-items: center;
            display: flex;
            height: 52px;
            left: 0;
            padding-left: 15px;
            position: absolute;
            top: 0;
            z-index: 2147483647;
        }
        .mobile-logo img {
            max-height: 25px;
        }
        .main__menu li.drop,
        .main__menu li.drop a {
            position: relative;
        }
        .main__menu li.drop ul.dropdown {
            background: #ffffff none repeat scroll 0 0;
            box-shadow: 0 0 #0000001a, 0 1px 3px #0000001a;
            left: 0;
            margin: 0;
            opacity: 0;
            padding: 0;
            position: absolute;
            top: 120%;
            transition: all 0.2s ease-in-out 0s;
            visibility: hidden;
            width: 189px;
            z-index: 99;
        }
        .main__menu li.drop:hover ul.dropdown {
            opacity: 1;
            top: 100%;
            visibility: visible;
        }
        .header--3 .main__menu li.drop:hover ul.dropdown {
            top: 100%;
        }
        .main__menu ul.dropdown li {
            border-bottom: 1px solid #f4f4f4;
            display: block;
        }
        .main__menu ul.dropdown li a {
            background: #ffffff none repeat scroll 0 0;
            color: #333;
            display: block;
            font-size: 12px;
            font-weight: 400;
            padding: 10px 18px;
            text-align: left;
            text-decoration: none;
            text-transform: uppercase;
            transition: all 0.3s ease 0s;
        }
        .main__menu li.drop ul.dropdown li:hover > a {
            background: #fafafa none repeat scroll 0 0;
            color: #ff4136;
        }
        .scroll-header .main__menu li.drop ul.dropdown,
        .scroll-header .main__menu li.drop a:hover ul.dropdown {
            top: 100%;
        }
        .main__menu li.drop ul.dropdown li.drop:after {
            color: #999;
            content: "\f2fb";
            font-family: Material-Design-Iconic-Font;
            font-size: 13px;
            position: absolute;
            right: 20px;
            top: 12px;
            transition: all 0.2s ease-in-out 0s;
        }
        .main__menu li.drop ul.dropdown li.drop {
            position: relative;
        }
        .main__menu li.drop ul.dropdown li.drop ul.dropdown.smright {
            border: medium none;
            right: 100%;
            top: 0;
            transition: all 0.3s ease 0s;
        }
        .main__menu li.drop ul.dropdown li.drop ul.dropdown.level2 {
            border: medium none;
            left: 100%;
            top: 20%;
            transition: all 0.3s ease 0s;
        }
        .main__menu li.drop ul.dropdown li.drop ul.dropdown.level2 {
            opacity: 0;
            visibility: hidden;
        }
        .main__menu li.drop ul.dropdown li.drop:hover ul.dropdown.level2 {
            opacity: 1;
            visibility: visible;
            top: 0;
        }
        .main__menu li.drop ul.dropdown li.drop ul.dropdown.smright {
            opacity: 0;
            visibility: hidden;
        }
        .main__menu li.drop ul.dropdown li.drop ul.dropdown.smright {
            background: #ffffff none repeat scroll 0 0;
            left: -100%;
            margin: 0;
            opacity: 0;
            padding: 0;
            position: absolute;
            top: 20%;
            transition: all 0.3s ease-in-out 0s;
            visibility: hidden;
            width: 220px;
            z-index: 999;
        }
        .main__menu li.drop ul.dropdown li.drop:hover ul.dropdown.smright {
            left: -100%;
            opacity: 1;
            visibility: visible;
            top: 0;
        }
        .menu-extra {
            display: flex;
            justify-content: flex-end;
        }
        .menu-extra li {
            padding: 0 15px;
        }
        .menu-extra li:last-child {
            padding-right: 0;
        }
        .menu-extra li:first-child {
            padding-left: 0;
        }
        .menu-extra li span {
            color: #666;
            font-size: 19px;
            line-height: 30px;
            transition: all 0.3s ease 0s;
            cursor: pointer;
        }
        .menu-extra li span:hover {
            color: #ff4136;
        }
        .header--2 .main__menu > li > a {
            color: #fff;
            font-size: 15px;
        }
        .header--2 .menu-extra li span {
            color: #fff;
        }
        .sticky__header.scroll-header.header--2 {
            background: rgba(64, 64, 64, 0.7) none repeat scroll 0 0;
        }
        .header--3 .mainmenu__area {
            position: inherit;
            top: auto;
        }
        .header--3 .logo {
            align-items: center;
            display: flex;
            height: 134px;
        }
        .header--3 .main__menu > li > a {
            font-size: 15px;
            font-weight: 500;
            line-height: 134px;
        }
        .header--3 .menu-extra {
            align-items: center;
            display: flex;
            height: 134px;
        }
        .header--3 .sticky__header.scroll-header {
            animation: 0.3s ease-in-out 0s normal none 1 running fadeInDown;
            background: rgba(246, 246, 248, 0.9) none repeat scroll 0 0;
            box-shadow: 0 0 15px #0000001a;
            left: 0;
            margin: 0 auto;
            position: fixed;
            right: 0;
            top: 0;
            width: 100%;
            z-index: 99;
        }
        .header--3 .sticky__header.scroll-header .logo,
        .header--3 .sticky__header.scroll-header .menu-extra {
            height: 70px;
        }
        .header--4 .menu-extra {
            margin-right: -15px;
        }
        .header--4 .logo {
            margin-left: -15px;
        }
        .header--4 .sticky__header.scroll-header {
            padding-left: 60px;
            padding-right: 60px;
        }
        .header--5 .logo {
            text-align: center;
        }
        .select__language {
            display: flex;
        }
        .select__language li {
            cursor: pointer;
            padding-bottom: 10px;
            padding-right: 22px;
            position: relative;
            transition: all 0.3s ease 0s;
        }
        .select__language > li:after {
            color: #000;
            content: "\e64b";
            font-family: Themify;
            font-size: 12px;
            position: absolute;
            right: 0;
            top: 38%;
            transform: translateY(-50%);
        }
        .select__language li + li {
            margin-left: 40px;
        }
        .select__language > li:hover {
            color: #ff4136;
        }
        .select__language > li + li:before {
            background: #444444 none repeat scroll 0 0;
            content: "";
            height: 20px;
            left: -20px;
            position: absolute;
            top: 2px;
            width: 1px;
        }
        .select__language li.drop--lan .language__option {
            background: #fff none repeat scroll 0 0;
            left: 0;
            opacity: 0;
            padding: 10px 20px;
            position: absolute;
            top: 100%;
            transition: all 0.4s ease 0s;
            visibility: hidden;
            width: 150px;
        }
        .select__language li.drop--lan .language__option span {
            color: #000;
            display: block;
            font-size: 14px;
            line-height: 29px;
            margin: 0;
            padding: 0;
            text-transform: uppercase;
            transition: all 0.3s ease 0s;
        }
        .select__language li.drop--lan:hover .language__option {
            opacity: 1;
            visibility: visible;
        }
        .select__language li.drop--lan .language__option span:hover {
            color: #ff4136;
        }
        .sticky__header.scroll-header .select__language li {
            height: 70px;
            line-height: 70px;
            padding-bottom: 0;
        }
        .sticky__header.scroll-header .select__language > li:after {
            height: 70px;
            line-height: 84px;
        }
        .sticky__header.scroll-header .select__language > li + li:before {
            height: 22px;
            top: 24px;
        }
        .header--6 .sticky__header.scroll-header {
            padding-left: 145px;
            padding-right: 145px;
        }
        .header--6 .main__menu > li > a {
            font-size: 15px;
            font-weight: 500;
        }
        .search__area .search__inner form button:before {
            color: #333;
            content: "\f1c3";
            display: block;
            font-family: Material-Design-Iconic-Font;
            font-size: 29px;
            transition: color 0.3s ease 0s;
        }
        .search__area {
            background: #cfcfcd none repeat scroll 0 0;
            box-shadow: 0 8px 10px #00000014;
            left: 0;
            position: fixed;
            right: 0;
            top: 0;
            transform: translateY(-200%);
            transition: all 0.3s ease 0s;
            z-index: 2147483647;
        }
        .search__area .search__inner {
            position: relative;
        }
        .search__area .search__inner form {
            margin: 4em 0;
            padding: 0 40px 0 0;
            position: relative;
            text-align: center;
        }
        .search__area .search__inner form input[type="text"] {
            background: #fff none repeat scroll 0 0;
            border: medium none;
            color: #333;
            font-size: 25px;
            font-weight: 300;
            height: 60px;
            line-height: 60px;
            padding: 0 70px 0 20px;
            text-align: left;
        }
        .search__area
            .search__inner
            form
            input[type="text"]::-webkit-input-placeholder {
            color: #333;
            font-size: 25px;
            font-weight: 300;
        }
        .search__area .search__inner form input[type="text"]::-moz-placeholder {
            color: #333;
            font-size: 25px;
            font-weight: 300;
        }
        .search__area .search__inner form input[type="text"]:-ms-input-placeholder {
            color: #333;
            font-size: 25px;
            font-weight: 300;
        }
        .search__area .search__inner form input[type="text"]:-moz-placeholder {
            color: #333;
            font-size: 25px;
            font-weight: 300;
        }
        .search__area .search__inner form button {
            background: transparent none repeat scroll 0 0;
            border: 0 none;
            border-radius: 0;
            cursor: pointer;
            height: 60px;
            line-height: 60px;
            position: absolute;
            right: 40px;
            top: 0;
            width: 60px;
            transition: 0.3s;
        }
        .search__area .search__inner form button:hover {
            background: #ff4136 none repeat scroll 0 0;
        }
        .search__area .search__inner form button:hover:before {
            color: #fff;
        }
        .search__area .search__inner .search__close__btn {
            display: block;
            line-height: 58px;
            position: absolute;
            right: 0;
            top: 0;
        }
        .search__area .search__inner .search__close__btn {
            color: #fff;
            cursor: pointer;
            font-size: 21px;
            line-height: 58px;
        }
        .search__close__btn .search__close__btn_icon i {
            transition: all 0.5s ease 0s;
            transform: scale(1) rotate(0);
        }
        .search__close__btn .search__close__btn_icon:hover i {
            transform: scale(2) rotate(180deg);
            color: #ff4136;
        }
        .search__box__show__hide .search__area {
            transform: translateY(0);
            transition: all 0.3s ease 0s;
        }
        .body__overlay {
            backface-visibility: hidden;
            background-color: #000c;
            cursor: url("/img/close-20.png") 25 25, pointer;
            height: 100%;
            left: 0;
            opacity: 0;
            position: fixed;
            top: 0;
            transition: opacity 0.3s ease 0s, visibility 0s ease 0.3s,
                transform 0.3s ease 0s;
            visibility: hidden;
            width: 100%;
            z-index: 99999;
        }
        .body__overlay.is-visible {
            opacity: 1;
            transition: opacity 0.3s ease 0s, visibility 0s ease 0s,
                transform 0.3s ease 0s;
            visibility: visible;
        }
        .offsetmenu,
        .shopping__cart,
        .user__meta {
            background: #eeeeee none repeat scroll 0 0;
            box-shadow: 0 0 85px #0003;
            display: block;
            height: 100vh;
            opacity: 0;
            overflow-y: scroll;
            position: fixed;
            right: -100%;
            top: 0;
            transition: all 0.25s ease 0s;
            width: 100%;
            z-index: 99999;
            width: 475px;
        }
        .user__meta .htc__login__register {
            padding-top: 30px;
        }
        .offsetmenu.offsetmenu__on,
        .shopping__cart.shopping__cart__on,
        .user__meta.user__meta__on {
            opacity: 1;
            padding-bottom: 50px;
            right: -16px;
        }
        .offsetmenu__inner,
        .shopping__cart__inner,
        .user__meta__inner {
            height: 100%;
            padding: 60px 50px;
        }
        .offsetmenu__close__btn {
            background-color: #eee;
            padding: 29px 50px 24px;
            position: absolute;
            right: 0;
            top: 0;
            z-index: 10;
        }
        .offsetmenu__close__btn a i {
            color: #666;
            font-size: 36px;
            transition: all 0.3s ease 0s;
        }
        .offsetmenu__close__btn a:hover i {
            color: #ff4136;
        }
        .offset__widget {
            display: flex;
            justify-content: space-between;
            margin-bottom: 19px;
            margin-top: 7px;
        }
        h4.offset__title {
            color: #444;
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 15px;
            text-transform: capitalize;
        }
        .offset__single ul li a {
            color: #303030;
            font-size: 14px;
            text-transform: capitalize;
            transition: all 0.4s ease 0s;
        }
        .offset__single ul li + li {
            padding: 2px 0 0;
        }
        .offset__single ul li a:hover {
            color: #ff4136;
        }
        .off__contact p {
            color: #303030;
            font-size: 16px;
            line-height: 28px;
            width: 98%;
            text-align: center;
        }
        .offset__sosial__share {
            margin-top: 21px;
            text-align: center;
        }
        .off__soaial__link {
            display: flex;
            justify-content: center;
            margin-top: 16px;
        }
        .off__soaial__link li + li {
            padding-left: 15px;
        }
        .off__soaial__link li a {
            height: 35px;
            line-height: 35px;
            width: 35px;
            text-align: center;
            transition: all 0.3s ease 0s;
            display: block;
        }
        .off__soaial__link li a i {
            color: #fff;
            font-size: 16px;
        }
        .off__soaial__link li a:hover i {
            color: #fff;
        }
        .off__contact {
            margin-bottom: 25px;
        }
        .off__contact .logo {
            margin-bottom: 18px;
            text-align: center;
        }
        .sidebar__thumd {
            display: flex;
            flex-wrap: wrap;
            margin: 32px -7px 30px;
        }
        .sidebar__thumd li {
            margin: 0 7px 15px;
            position: relative;
        }
        .sidebar__thumd a img {
            width: 100%;
        }
        .sidebar__thumd > li a:before {
            background: #ff4136 none repeat scroll 0 0;
            content: "";
            height: 100%;
            opacity: 0;
            position: absolute;
            transition: all 0.5s ease 0s;
            width: 100%;
        }
        .sidebar__thumd li a:after {
            color: #fff;
            content: "\e73d";
            font-family: themify;
            left: 40%;
            opacity: 0;
            position: absolute;
            top: 33%;
            transition: all 0.5s ease 0s;
        }
        .sidebar__thumd li a {
            position: relative;
        }
        .sidebar__thumd > li a {
            display: block;
        }
        .sidebar__thumd li a:hover:after {
            opacity: 1;
        }
        .sidebar__thumd li a:hover:before {
            opacity: 0.7;
        }
        .shopping__cart__inner {
            padding: 102px 50px;
        }
        .shopping__cart__inner .offsetmenu__close__btn {
            padding: 21px 50px 24px;
        }
        .shp__pro__details h2 {
            border-top-width: 0;
            color: #000;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.4;
            padding: 0;
            text-transform: none;
        }
        .shoping__total .subtotal {
            color: #000;
            font-size: 20px;
            font-weight: 400;
            text-transform: capitalize;
        }
        .shp__pro__details .shp__price {
            color: #c00;
            display: block;
        }
        .shoping__total .subtotal {
            color: #000;
            font-weight: 400;
        }
        .shoping__total .total__price {
            color: #c33;
            float: right;
        }
        .shopping__btn li a {
            background-color: transparent;
            border: 1px solid #000;
            color: #000;
            font-size: 14px;
            height: 57px;
            line-height: 57px;
            margin-bottom: 15px;
            padding: 0 25px;
            text-align: center;
            text-transform: none;
            transition: all 0.5s ease 0s;
            width: 100%;
            display: block;
        }
        .shopping__btn li a:hover {
            background: #ff4136;
            border: 1px solid #ff4136;
            color: #fff;
        }
        .shopping__btn .shp__checkout a {
            background-color: #000;
            color: #fff;
        }
        .shp__single__product {
            display: flex;
            justify-content: space-between;
            padding-bottom: 21px;
            padding-top: 21px;
        }
        .shp__pro__thumb {
            margin-right: 20px;
        }
        .shp__pro__thumb a {
            display: block;
        }
        .shp__pro__thumb a img {
            max-width: 60px;
        }
        .remove__btn {
            text-align: right;
            width: 20px;
        }
        .shp__pro__details {
            min-width: 71%;
        }
        .shp__cart__wrap {
            margin-top: -30px;
        }
        .shoping__total {
            border-top: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            padding: 22px 0;
        }
        .remove__btn a i {
            color: #ccc;
            font-size: 22px;
            transition: all 0.5s ease 0s;
        }
        .remove__btn a:hover i {
            color: #ff4136;
            transform: rotate(180deg);
        }
        .shp__cart__wrap .shp__single__product + .shp__single__product {
            border-top: 1px solid #ddd;
        }
        .main__menu li.drop ul.dropdown.mega_dropdown {
            width: 654px;
        }
        .dropdown.mega_dropdown {
            width: 655px;
        }
        .dropdown.mega_dropdown {
            display: flex;
            justify-content: space-between;
            padding: 30px !important;
        }
        .dropdown.mega_dropdown li a.mega__title {
            display: inline-block;
            font-size: 20px;
            margin-bottom: 20px;
            padding: 0 0 10px;
            position: relative;
            text-transform: capitalize;
        }
        .dropdown.mega_dropdown li a.mega__title:before {
            background: #000 none repeat scroll 0 0;
            bottom: 0;
            content: "";
            height: 1px;
            left: 0;
            position: absolute;
            width: 100%;
        }
        .main__menu li.drop ul.dropdown.mega_dropdown {
            left: 50%;
            transform: translate(-50%);
        }
        .main__menu li.drop ul.dropdown.mega_dropdown li:hover > a {
            background: transparent none repeat scroll 0 0;
            color: #ff4136;
        }
        .main__menu ul.dropdown.mega_dropdown li a {
            padding: 4px 0 12px;
        }
        .main__menu ul.dropdown.mega_dropdown li {
            border-bottom: 1px solid transparent;
        }

    </style>
    <link href="{{ asset("/css/assets/slider.css")}}"
        rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/css/assets/footer.css")}}"
        rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/css/assets/style.css")}}" rel="stylesheet"
        type="text/css" media="all" />
    <link href="{{ asset("/css/assets/custom.css")}}" rel="stylesheet"
        type="text/css" media="all" />
    <link href="{{ asset("/css/assets/responsive.css")}}"
        rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/css/assets/theme-responsive.css")}}"
        rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/css/assets/skin-theme.css")}}"
        rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset("/css/assets/theme-color.css")}}"
        rel="stylesheet" type="text/css" media="all" />

    
    {{-- <link href="{{ asset('/css/app.css') }}" rel="stylesheet"> --}}
    <style>
        .htc__foooter__area {
            background-color: #f3f3f3;
        }

        .footer__container {
            padding-bottom: 65px;
            padding-top: 76px;
        }

        .main__menu {
            justify-content: center;
        }

        .slider--two .slider__bg--2 {
            background: rgba(0, 0, 0, 0)
                url("/img/252d0.jpg?v=1509611638")
                no-repeat scroll center center / cover;
        }

        .slider--two .slider__bg--2 {
            background-attachment: fixed;
        }

        .htc__new__product.bg__white.mlt_banner {
            background: #ffffff;
        }
        .best__product__list .best__product,
        .best__product__list .product {
            margin-bottom: 30px;
        }


        
    </style>
    {{-- <script defer src="{{ mix('js/entry-client.js') }}"></script> --}}
</head>