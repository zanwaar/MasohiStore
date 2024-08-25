<!DOCTYPE html>
<html lang="en">


<!-- molla/category.html  22 Nov 2019 10:02:48 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UMKM - MASOHI</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="UMKM - MASOHI">
    <meta name="author" content="p-themes">
    <link rel="stylesheet" href="{{ asset('build/assets/app-build.css')}}">
    <style>
        /* resi */
        .resi {
            font-size: 14px;
        }

        .resi .resi-item .resi-label {
            color: #888;
            position: relative;
            flex-shrink: 0;
            flex-grow: 0;
            min-width: 64px;
        }

        .resi .resi-item .resi-label::before {
            content: "";
            position: absolute;
            right: -14px;
            width: 4px;
            top: 0;
            bottom: 0;
            background-color: #eceefe;
        }

        .resi .resi-item .resi-badge {
            margin-top: 3px;
            z-index: 1;
            font-size: 11px;
            line-height: 0;
            border-radius: 50%;
            flex-shrink: 0;
            border: 3px solid #fff;
            flex-grow: 0;
        }

        .resi .resi-item .resi-content {
            padding-left: 10px;
            padding-bottom: 20px;
        }

        .resi .resi-item:first-child .resi-label::before {
            top: 5px;
        }

        .resi .resi-item:last-child .resi-content {
            padding-bottom: 0;
        }
    </style>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('ui/assets/images/icons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('ui/assets/images/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('ui/assets/images/icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('ui/assets/images/icons/site.html')}}">
    <link rel="mask-icon" href="{{ asset('ui/assets/images/icons/safari-pinned-tab.svg')}}" color="#666666">
    <link rel="shortcut icon" href="{{ asset('ui/assets/images/icons/favicon.ico')}}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ asset('ui/assets/images/icons/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('ui/assets/css/bootstrap.min.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('ui/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('ui/assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('ui/assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('ui/assets/css/plugins/nouislider/nouislider.css')}}">
    <link rel="stylesheet" href="{{ asset('ui/assets/css/demos/demo-4.css')}}">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    @livewireStyles
    @livewireScripts

    <style>
        .swal2-title {
            font-size: 15px !important;
        }

        .swal2-icon {
            font-size: 15px !important;
        }

        .dz-max-w-2xl {
            max-width: 100% !important;
            padding: 10px;
        }

        .dz-w-14 {
            width: 5.5rem !important;
        }

        .dz-h-14 {
            height: 5.5rem !important;
        }

        .dz-text-sm {
            font-size: 12px !important;
            line-height: 2.25rem !important;
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        @livewire('header')

        {{ $slot }}

        <footer class="footer">


            <div class="footer-bottom">
                <div class="container">
                    <p class="footer-copyright">Copyright © 2024 UMKM Store. All Rights Reserved.</p><!-- End .footer-copyright -->
                    <figure class="footer-payments">
                        <img src="{{asset('ui/assets/images/payments.png')}}" alt="Payment methods" width="272" height="20">
                    </figure><!-- End .footer-payments -->
                </div><!-- End .container -->
            </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>




    @stack('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />


    <!-- Plugins JS File -->
    <script src="{{asset('ui/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('ui/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('ui/assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{asset('ui/assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('ui/assets/js/superfish.min.js')}}"></script>
    <script src="{{asset('ui/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('ui/assets/js/wNumb.js')}}"></script>
    <script src="{{asset('ui/assets/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{asset('ui/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('ui/assets/js/nouislider.min.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{asset('ui/assets/js/main.js')}}"></script>
</body>

<!-- molla/category.html  22 Nov 2019 10:02:52 GMT -->

</html>