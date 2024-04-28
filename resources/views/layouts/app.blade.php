<!DOCTYPE html>

<html lang="en" class="light-style  layout-menu-fixed   " dir="ltr" data-theme="theme-default" data-assets-path="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/" data-base-url="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1" data-framework="laravel" data-template="vertical-menu-theme-default-light">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title ?? 'Leave Tracker' }}</title>
    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <meta name="csrf-token" content="ZzzTYe3whApMRKEFXEMeHSm5Yu8aZdvGINSJY5Iy">
    <link rel="canonical" href="">


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

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../demo/assets/vendor/fonts/boxiconsc4a7.css?id=87122b3a3900320673311cebdeb618da" />
    <link rel="stylesheet" href="../../demo/assets/vendor/fonts/fontawesome5cae.css?id=89157e39c524ff7f679d3aebf872b7b9" />
    <link rel="stylesheet" href="../../demo/assets/vendor/fonts/flag-icons5883.css?id=403b97c176f3cdf56a3cbf09107ee240" />

    <link rel="stylesheet" href="../../demo/assets/vendor/css/rtl/coref43c.css?id=f1cefeba0c68d327230d2f6538f276fa" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../demo/assets/vendor/css/rtl/theme-default56b8.css?id=cc3d4ef91c8c858754d8ed20c78a3a3c" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../demo/assets/css/democb2e.css?id=24b55ca26d6f2bafc5a21ff5a4bcdfb3" />


    <link rel="stylesheet" href="../../demo/assets/vendor/libs/perfect-scrollbar/perfect-scrollbarb440.css?id=d9fa6469688548dca3b7e6bd32cb0dc6" />
    <link rel="stylesheet" href="../../demo/assets/vendor/libs/typeahead-js/typeahead3881.css?id=8fc311b79b2aeabf94b343b6337656cf" />

    <link rel="stylesheet" href="../../demo/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="../../demo/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="../../demo/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css">
    <link rel="stylesheet" href="../../demo/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="../../demo/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
    <link rel="stylesheet" href="../../demo/assets/vendor/libs/animate-css/animate.css" />
    <link rel="stylesheet" href="../../demo/assets/vendor/libs/sweetalert2/sweetalert2.css" />



    <script src="../../demo/assets/vendor/js/helpers.js"></script>
    <script src="../../demo/assets/js/config.js"></script>



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

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>


    <div class="layout-wrapper layout-content-navbar ">
        <div class="layout-container">

            @include('includes.sidebar')


            <div class="layout-page">
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0  d-xl-none ">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..." aria-label="Search...">
                            </div>
                        </div>
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <li class="nav-item lh-1 me-3">
                                <span></span>
                            </li>
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <!-- <div class="">
                                        <i class='menu-icon tf-icons bx bx-user-circle' style="font-size: xx-large;"></i>
                                    </div> -->
                                    <div class="avatar avatar-online">
                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template-free/demo/assets/img/avatars/1.png" alt="" class="w-px-40 h-auto rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <!-- <div class="">
                                                    <i class='menu-icon tf-icons bx bx-user-circle w-px-40 h-auto rounded-circle' style="font-size: xx-large;"></i>    
                                                    </div> -->
                                                    <div class="avatar avatar-online">
                                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template-free/demo/assets/img/avatars/1.png" alt="" class="w-px-40 h-auto rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-medium d-block">{{ auth()->user()->name}}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{url('profile')}}">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>


                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" id="logout">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>



                <div class="content-wrapper">

                    {{ $slot }}

                    @include('includes.footer')
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>

        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"></div>
    </div>

    <script src="../../demo/assets/vendor/libs/jquery/jquery8853.js?id=08d304be7f95879ae643fabf15fb255a"></script>
    <script src="../../demo/assets/vendor/libs/popper/popper5751.js?id=70485ad9be8ba3e426172708feb35181"></script>
    <script src="../../demo/assets/vendor/js/bootstrape305.js?id=3cb2c653a33d885b40641d15713e3994"></script>
    <script src="../../demo/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar6188.js?id=44b8e955848dc0c56597c09f6aebf89a">
    </script>
    <script src="../../demo/assets/vendor/libs/hammer/hammera90c.js?id=5c0a4017d0ce861e87a50c0c1401eb81"></script>
    <script src="../../demo/assets/vendor/libs/i18n/i18nbcd7.js?id=74a027f4696264ade8796f88b3d49c14"></script>
    <script src="../../demo/assets/vendor/libs/typeahead-js/typeahead60e7.js?id=f6bda588c16867a6cc4158cb4ed37ec6"></script>
    <script src="../../demo/assets/vendor/js/menuf635.js?id=03d9787739b295480194ce0a121ae550"></script>
    <script src="../../demo/assets/vendor/libs/moment/moment.js"></script>
    <script src="../../demo/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="../../demo/assets/vendor/libs/select2/select2.js"></script>
    <script src="../../demo/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="../../demo/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="../../demo/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
    <script src="../../demo/assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="../../demo/assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="../../demo/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>

    <script src="../../demo/assets/js/maincf4d.js?id=e0aeed34a47c1efb009b120245cce82e"></script>


    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#logout').click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/logout",
                    success: function(response) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: "Logout successfully.",
                            showConfirmButton: false,
                            timer: 2000,
                            width: 400,
                            height: 50,
                        })
                        location.href = "/login";
                    }
                });
            });
        });

        function deleteItem(route, itemId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'If you delete this, it will be gone forever.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                position: 'top-end'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: route + '/' + itemId,
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(data) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: "Deleted successfully.",
                                showConfirmButton: false,
                                timer: 2000,
                                width: 400,
                                height: 50,
                            })
                            window.location.reload();

                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            });
        }
    </script>
</body>



</html>