<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | Gestion dde vente du CSTAB</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Plateforme FADESP">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">
 
    <!-- FontAwesome JS-->
    <script defer src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">


    <!-- Plugins css -->
    <link rel="stylesheet" href="{{ asset('css/default-assets/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default-assets/jquery.bootstrap-touchspin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default-assets/color-picker-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default-assets/jquery.tagsinput.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default-assets/daterange-picker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default-assets/form-picker.css') }}">

    <link rel="stylesheet" href="{{ asset('css/default-assets/datatables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default-assets/responsive.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default-assets/buttons.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default-assets/select.bootstrap4.css') }}">

    <!-- Master Stylesheet CSS -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="app">
    <header class="app-header fixed-top">
        @include('layouts.topbar')
        <!--//app-header-inner-->
        @include('layouts.sidebar')
    </header><!--//app-header-->
    
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                @yield('content')

                <!--//row-->

            </div><!--//container-fluid-->
        </div><!--//app-content-->

        <footer class="app-footer">
            <div class="container text-center py-3">
                <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                @auth
                   <small class="copyright">Conçu par <span class="sr-only">CSTAB</span><i class="fas fa-heart"
                            style="color: #fb866a;"></i> par <a class="app-link" href="#" target="_blank">
                            {{ AppNameGetter::getAppName() ? AppNameGetter::getAppName() : 'TP CSTAB' }}
                        </a> pour les dévéloppeurs</small>
                @else
                    <small class="copyright">Conçu par <span class="sr-only">CSTAB</span><i class="fas fa-heart"
                        style="color: #fb866a;"></i> par <a class="app-link" href="#" target="_blank">
                        {{ AppNameGetter::getAppName() ? AppNameGetter::getAppName() : 'TP CSTAB' }}
                    </a> pour les dévéloppeurs</small>
                @endauth
                <div class="fotter-icon text-center">
                    <a href="#" class="action-item mr-2" data-toggle="tooltip" title="Facebook">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="action-item mr-2" data-toggle="tooltip" title="Twitter">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="action-item mr-2" data-toggle="tooltip" title="Pinterest">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="action-item mr-2" data-toggle="tooltip" title="Instagram">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </footer><!--//app-footer-->

    </div><!--//app-wrapper-->

    <script>
        $(document).ready(function () {
            $("#order").click(function () {
                $("#appear").show();
            });
            $("#close").click(function () {
                $("#appear").hide();
            });
        });
    </script>
    
    <!-- Javascript -->
    <script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Charts JS -->
    <script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/index-charts.js') }}"></script>

    <!-- Page Specific JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Plugins Js -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bundle.js') }}"></script>

    <!-- Active JS -->
    <script src="{{ asset('js/canvas.js') }}"></script>
    <script src="{{ asset('js/collapse.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/default-assets/active.js') }}"></script>

    <!-- Inject JS -->
    <script src="{{ asset('js/default-assets/file-upload.js') }}"></script>
    <script src="{{ asset('js/default-assets/basic-form.js') }}"></script>
    <script src="{{ asset('js/default-assets/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('js/default-assets/jquery.bootstrap-touchspin.custom.js') }}"></script>
    <script src="{{ asset('js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('js/default-assets/colorpicker-bootstrap.js') }}"></script>
    <script src="{{ asset('js/default-assets/jquey.tagsinput.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/default-assets/daterange-picker.js') }}"></script>
    <script src="{{ asset('js/default-assets/form-picker.js') }}"></script>
    <script src="{{ asset('js/default-assets/select2.min.js') }}"></script>
    <script src="{{ asset('js/default-assets/select2-custom.js') }}"></script>

    <!-- Plugins Js -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bundle.js') }}"></script>

    <!-- Inject JS -->
    <script src="{{ asset('js/default-assets/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('js/default-assets/datatables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/default-assets/datatable-responsive.min.js') }}"></script>
    <script src="{{ asset('js/default-assets/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/default-assets/datatable-button.min.js') }}"></script>
    <script src="{{ asset('js/default-assets/button.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/default-assets/button.html5.min.js') }}"></script>
    <script src="{{ asset('js/default-assets/button.flash.min.js') }}"></script>
    <script src="{{ asset('js/default-assets/button.print.min.js') }}"></script>
    <script src="{{ asset('js/default-assets/datatables.keytable.min.js') }}"></script>
    <script src="{{ asset('js/default-assets/datatables.select.min.js') }}"></script>
    <script src="{{ asset('js/default-assets/demo.datatable-init.js') }}"></script>

    <script>
        $(function() {
            'use strict';

            $('#tags').tagsInput({
                'width': '100%',
                'height': '85%',
                'interactive': true,
                'defaultText': 'Add More',
                'removeWithBackspace': true,
                'minChars': 0,
                'maxChars': 20,
                'placeholderColor': '#555'
            });
        });
    </script>

    <script>
        // Open the full screen search box
        function openSearch() {
            document.getElementById("myOverlay").style.display = "block";
        }

        // Close the full screen search box
        function closeSearch() {
            document.getElementById("myOverlay").style.display = "none";
        }
    </script>


</body>

</html>
