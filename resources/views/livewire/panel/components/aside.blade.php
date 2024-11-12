<div>
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            @role('merchant')
            <!-- <li class="nav-item">
                <a class="nav-link  {{ $activeRoute === 'beranda' ? '' : 'collapsed' }}" href="{{ route('beranda') }}">
                    <i class="bx bxs-store-alt"></i>

                    <span>Beranda</span>
                </a>
            </li> -->

            <li class="nav-heading">Data Transaksi</li>
            <li class="nav-item">
                <a class="nav-link  {{ $activeRoute === 'beranda' ? '' : 'collapsed' }}" href="{{ route('beranda') }}">
                    <i class="bx bxs-shopping-bags"></i>

                    <span>Order Transaksi</span>
                </a>
            </li>
            <li class="nav-heading">Data Product</li>
            <li class="nav-item">
                <a class="nav-link  {{ $activeRoute === 'product' ? '' : 'collapsed' }}" href="{{ route('product') }}">
                    <i class="bx bxs-archive"></i>
                    <span>Manajemen Produk</span>
                </a>
            </li>
            <li class="nav-heading">Pengaturan</li>
            <li class="nav-item">
                <a class="nav-link  {{ $activeRoute === 'penagturan' ? '' : 'collapsed' }}" href="{{ route('penagturan') }}">
                    <i class='bx bx-cog'></i>

                    <span>Pengaturan Umkm</span>
                </a>
            </li>

            @else
            <li class="nav-item">
                <a class="nav-link " href="index.html">
                    <i class="bx bxs-store-alt"></i>

                    <span>Beranda</span>
                </a>
            </li>
            <li class="nav-heading">UMKM</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bx bx-book-content"></i><span>Data UMKM</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="forms-elements.html">
                            <i class="bi bi-circle"></i><span>Form Elements</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-layouts.html">
                            <i class="bi bi-circle"></i><span>Form Layouts</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-editors.html">
                            <i class="bi bi-circle"></i><span>Form Editors</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-validation.html">
                            <i class="bi bi-circle"></i><span>Form Validation</span>
                        </a>
                    </li>
                </ul>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="index.html">
                    <i class="bx bxs-report"></i>
                    <span>Data Transaksi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="index.html">
                    <i class="bx bxs-purchase-tag"></i>
                    <span>Kategori</span>
                </a>
            </li>
            <li class="nav-heading">PENGGUNA</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="index.html">
                    <i class="bx bxs-user-circle"></i>
                    <span>Pengguna</span>
                </a>
            </li>
            @endrole


        </ul>

    </aside><!-- End Sidebar-->
</div>

@push('meta')
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>UMKM Masohi</title>
<meta content="" name="description">
<meta content="" name="keywords">

<!-- Favicons -->
<link href="{{asset('ds/img/favicon.png')}}" rel="icon">
<link href="{{asset('ds/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{asset('ds/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('ds/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
<link href="{{asset('ds/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
<link href="{{asset('ds/vendor/quill/quill.snow.css')}}" rel="stylesheet">
<link href="{{asset('ds/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
<link href="{{asset('ds/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
<link href="{{asset('ds/vendor/simple-datatables/style.css')}}" rel="stylesheet">
<link href="{{asset('ds/css/style.css')}}" rel="stylesheet">
@endpush

@push('appscripts')
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script src="{{asset('ds/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('ds/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('ds/vendor/chart.js/chart.umd.js')}}"></script>
<script src="{{asset('ds/vendor/echarts/echarts.min.js')}}"></script>
<script src="{{asset('ds/vendor/quill/quill.min.js')}}"></script>
<script src="{{asset('ds/vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('ds/vendor/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('ds/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('ds/js/main.js')}}"></script>
@endpush