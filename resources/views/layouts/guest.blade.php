<!DOCTYPE html>

<html lang="en" class="light-style     customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/"
    data-base-url="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1"
    data-framework="laravel" data-template="blank-menu-theme-default-light">


<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/auth/login-basic by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Apr 2023 10:23:41 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Login Leave Tracker</title>
    <meta name="description"
        content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="ZzzTYe3whApMRKEFXEMeHSm5Yu8aZdvGINSJY5Iy">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/item/sneat-bootstrap-html-laravel-admin-template/">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"
        href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/favicon/favicon.ico" />


    <!-- Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5DDHKGP');
    </script>
    <!-- End Google Tag Manager -->


    <!-- Include Styles -->
    <!-- BEGIN: Theme CSS-->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="../../demo/assets/vendor/fonts/boxiconsc4a7.css?id=87122b3a3900320673311cebdeb618da" />
    <link rel="stylesheet"
        href="../../demo/assets/vendor/fonts/fontawesome5cae.css?id=89157e39c524ff7f679d3aebf872b7b9" />
    <link rel="stylesheet"
        href="../../demo/assets/vendor/fonts/flag-icons5883.css?id=403b97c176f3cdf56a3cbf09107ee240" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../demo/assets/vendor/css/rtl/coref43c.css?id=f1cefeba0c68d327230d2f6538f276fa"
        class="template-customizer-core-css" />
    <link rel="stylesheet"
        href="../../demo/assets/vendor/css/rtl/theme-default56b8.css?id=cc3d4ef91c8c858754d8ed20c78a3a3c"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../demo/assets/css/democb2e.css?id=24b55ca26d6f2bafc5a21ff5a4bcdfb3" />


    <link rel="stylesheet"
        href="../../demo/assets/vendor/libs/perfect-scrollbar/perfect-scrollbarb440.css?id=d9fa6469688548dca3b7e6bd32cb0dc6" />
    <link rel="stylesheet"
        href="../../demo/assets/vendor/libs/typeahead-js/typeahead3881.css?id=8fc311b79b2aeabf94b343b6337656cf" />

    <!-- Vendor Styles -->
    <!-- Vendor -->
    <link rel="stylesheet" href="../../demo/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />


    <!-- Page Styles -->
    <!-- Page -->
    <link rel="stylesheet" href="../../demo/assets/vendor/css/pages/page-auth.css">

    <!-- Include Scripts for customizer, helper, analytics, config -->
    <!-- laravel style -->
    <script src="../../demo/assets/vendor/js/helpers.js"></script>
    <!-- beautify ignore:start -->
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <script src="../../demo/assets/vendor/js/template-customizer.js"></script>

  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../../demo/assets/js/config.js"></script>

  <script>
      window.templateCustomizer = new TemplateCustomizer({
          cssPath: '',
          themesPath: '',
          defaultShowDropdownOnHover: true, // true/false (for horizontal layout only)
          displayCustomizer: true,
          lang: 'en',
          pathResolver: function(path) {
              var resolvedPaths = {
                  // Core stylesheets
                  'core.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/core.css?id=f1cefeba0c68d327230d2f6538f276fa',
                  'core-dark.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/core-dark.css?id=a7e1b898874fb932a0d06a8338e83740',

                  // Themes
                  'theme-default.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-default.css?id=cc3d4ef91c8c858754d8ed20c78a3a3c',
                  'theme-default-dark.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-default-dark.css?id=9a338740c08a948bb83b45bbd12fb4aa',
                  'theme-bordered.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-bordered.css?id=8d92124ca46dc5afef2fb07a37c27881',
                  'theme-bordered-dark.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-bordered-dark.css?id=18f699a37ba20ce77d7e28d9cb364a77',
                  'theme-semi-dark.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-semi-dark.css?id=91f37f96f7ed4b04e63de6773e24ffa5',
                  'theme-semi-dark-dark.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-semi-dark-dark.css?id=0c263a3742f3ca2d2cb3e92439d5f540',
              }
              return resolvedPaths[path] || path;
          },
          'controls': ["rtl", "style", "layoutType", "showDropdownOnHover", "layoutNavbarFixed",
              "layoutFooterFixed", "themes"
          ],
      });
  </script>
  <!-- beautify ignore:end -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'GA_MEASUREMENT_ID');
    </script>
</head>

<body>

    <!-- Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <!-- Layout Content -->

    <!-- Content -->
    {{ $slot }}
    <!--/ Content -->

    <!--/ Layout Content -->



    <!-- Include Scripts -->
    <!-- BEGIN: Vendor JS-->
    <script src="../../demo/assets/vendor/libs/jquery/jquery8853.js?id=08d304be7f95879ae643fabf15fb255a"></script>
    <script src="../../demo/assets/vendor/libs/popper/popper5751.js?id=70485ad9be8ba3e426172708feb35181"></script>
    <script src="../../demo/assets/vendor/js/bootstrape305.js?id=3cb2c653a33d885b40641d15713e3994"></script>
    <script
        src="../../demo/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar6188.js?id=44b8e955848dc0c56597c09f6aebf89a">
    </script>
    <script src="../../demo/assets/vendor/libs/hammer/hammera90c.js?id=5c0a4017d0ce861e87a50c0c1401eb81"></script>
    <script src="../../demo/assets/vendor/libs/i18n/i18nbcd7.js?id=74a027f4696264ade8796f88b3d49c14"></script>
    <script src="../../demo/assets/vendor/libs/typeahead-js/typeahead60e7.js?id=f6bda588c16867a6cc4158cb4ed37ec6"></script>
    <script src="../../demo/assets/vendor/js/menuf635.js?id=03d9787739b295480194ce0a121ae550"></script>
    <script src="../../demo/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="../../demo/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="../../demo/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="../../demo/assets/js/maincf4d.js?id=e0aeed34a47c1efb009b120245cce82e"></script>

    <!-- END: Theme JS-->
    <!-- Pricing Modal JS-->
    <!-- END: Pricing Modal JS-->
    <!-- BEGIN: Page JS-->
    <script src="../../demo/assets/js/pages-auth.js"></script>
    <!-- END: Page JS-->

    @stack('scripts')
</body>


<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/auth/login-basic by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Apr 2023 10:23:42 GMT -->

</html>
