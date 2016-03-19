<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>@yield('title','default title')</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Web Fonts -->

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- CSS Header and Footer -->
    <link rel="stylesheet" href="/assets/css/headers/header-v8.css">
    <link rel="stylesheet" href="/assets/css/footers/footer-v1.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/assets/plugins/animate.css">
    <link rel="stylesheet" href="/assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/libs/confirm/dist/jquery-confirm.min.css">
    <link rel="stylesheet" href="/libs/loading/loaders.css">
    <link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
    <link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
    <link rel="stylesheet" href="/libs/tag/jquery.tagsinput.min.css">
     @yield('styles')

    <!-- CSS Page Style -->
    <link rel="stylesheet" href="/assets/css/pages/page_log_reg_v1.css">
   
    <!-- CSS Theme -->
    <link rel="stylesheet" href="/assets/css/theme-colors/dark-blue.css" id="style_color">
    <link rel="stylesheet" href="/assets/css/theme-skins/dark.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="/assets/css/custom.css">
   
</head>

<body class="header-fixed header-fixed-space-v2">
<!--=== Style Switcher ===-->
<i class="style-switcher-btn fa fa-cogs hidden-xs"></i>
<div class="style-switcher animated fadeInRight">
    <div class="style-swticher-header">
        <div class="style-switcher-heading">Style Switcher</div>
        <div class="theme-close"><i class="icon-close"></i></div>
    </div>

    <div class="style-swticher-body">
        <!-- Theme Colors -->
        <div class="style-switcher-heading">Theme Colors</div>
        <ul class="list-unstyled">
            <li class="theme-default theme-active" data-style="default" data-header="light"></li>
            <li class="theme-blue" data-style="blue" data-header="light"></li>
            <li class="theme-orange" data-style="orange" data-header="light"></li>
            <li class="theme-red" data-style="red" data-header="light"></li>
            <li class="theme-light" data-style="light" data-header="light"></li>
            <li class="theme-purple last" data-style="purple" data-header="light"></li>
            <li class="theme-aqua" data-style="aqua" data-header="light"></li>
            <li class="theme-brown" data-style="brown" data-header="light"></li>
            <li class="theme-dark-blue" data-style="dark-blue" data-header="light"></li>
            <li class="theme-light-green" data-style="light-green" data-header="light"></li>
            <li class="theme-dark-red" data-style="dark-red" data-header="light"></li>
            <li class="theme-teal last" data-style="teal" data-header="light"></li>
        </ul>

        <!-- Theme Skins -->
        <div class="style-switcher-heading">Theme Skins</div>
        <div class="row no-col-space margin-bottom-20 skins-section">
            <div class="col-xs-6">
                <button data-skins="default" class="btn-u btn-u-xs btn-u-dark btn-block active-switcher-btn handle-skins-btn">Light</button>
            </div>
            <div class="col-xs-6">
                <button data-skins="dark" class="btn-u btn-u-xs btn-u-dark btn-block skins-btn">Dark</button>
            </div>
        </div>

        <hr>

        <!-- Layout Styles -->
        <div class="style-switcher-heading">Layout Styles</div>
        <div class="row no-col-space margin-bottom-20">
            <div class="col-xs-6">
                <a href="javascript:void(0);" class="btn-u btn-u-xs btn-u-dark btn-block active-switcher-btn wide-layout-btn">Wide</a>
            </div>
            <div class="col-xs-6">
                <a href="javascript:void(0);" class="btn-u btn-u-xs btn-u-dark btn-block boxed-layout-btn">Boxed</a>
            </div>
        </div>

        <hr>

        <!-- Theme Type -->
        <div class="style-switcher-heading">Theme Types and Versions</div>
        <div class="row no-col-space margin-bottom-10">
            <div class="col-xs-6">
                <a href="Shop-UI/index.html" class="btn-u btn-u-xs btn-u-dark btn-block">Shop UI <small class="dp-block">Template</small></a>
            </div>
            <div class="col-xs-6">
                <a href="One-Page/index.html" class="btn-u btn-u-xs btn-u-dark btn-block">One Page <small class="dp-block">Template</small></a>
            </div>
        </div>

        <div class="row no-col-space">
            <div class="col-xs-6">
                <a href="Blog/index.html" class="btn-u btn-u-xs btn-u-dark btn-block">Blog <small class="dp-block">Template</small></a>
            </div>
            <div class="col-xs-6">
                <a href="RTL/index.html" class="btn-u btn-u-xs btn-u-dark btn-block">RTL <small class="dp-block">Version</small></a>
            </div>
        </div>
    </div>
</div><!--/style-switcher-->
<!--=== End Style Switcher ===-->

<div class="wrapper">
    <!--=== Header ===-->
    @include('user.component.top_nav')
    <!--=== End Header ===-->

    <!--=== Breadcrumbs ===-->
    @yield('breadcrumbs')

    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    @yield('content')
    <!--=== End Content Part ===-->

     <!--=== Footer Version 1 ===-->
    @include('user.component.footer')
    <!--=== End Footer Version 1 ===-->
</div><!--/wrapper-->

<!-- JS Global Compulsory -->
<script type="text/javascript" src="/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/libs/arttemplate/dist/template.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="/assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="/assets/plugins/smoothScroll.js"></script>

<!-- JS Customization -->
<script type="text/javascript" src="/assets/js/custom.js"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="/libs/confirm/dist/jquery-confirm.min.js"></script>
<script type="text/javascript" src="/assets/js/app.js"></script>

<script type="text/javascript" src="/assets/js/plugins/style-switcher.js"></script>
<script src="/libs/tag/jquery.tagsinput.min.js"></script>
<script src="/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/assets/js/forms/order.js"></script>
<script src="/libs/cropit/jquery.cropit.js"></script>
@yield('scripts')
<script type="text/javascript" src="/init/js/profile.js"></script>
<script type="text/javascript">

    jQuery(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        App.init();
        StyleSwitcher.initStyleSwitcher();
        ProfileSocial.PostDemand();
        ProfileSocial.faceImg();

        @yield('jquery')
    });
</script>
<!--[if lt IE 9]>
    <script src="/assets/plugins/respond.js"></script>
    <script src="/assets/plugins/html5shiv.js"></script>
    <script src="/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>
</html>
