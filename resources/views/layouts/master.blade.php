<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Aplikasi Indokom</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/template/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/shop.jpg') }}" type="image/x-icon">
    
    <link rel="stylesheet" href="{{ asset('assets/template/assets/css/shared/iconly.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="">
                <a href="index.html" class="text-primary"><img src="{{ asset('assets/img/shop.jpg') }}" alt="Logo" style="height:30px"> INDOKOM </a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            @if (auth()->user()->role == 'Admin')
                <li class="sidebar-item {{ request()->is('admin') ? 'active' : '' }}">
                    <a class="sidebar-link" href="/admin">
                        <img src="{{ asset('assets/bootstrap-icons/grid-fill.svg') }}" alt="">
                        <span>Dashboard</span></a>
                </li>
                <li class="sidebar-item {{ request()->is('admin/produk') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('produk.index') }}">
                        <img src="{{ asset('assets/bootstrap-icons/upc-scan.svg') }}" alt="">
                        <span>Produk</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('admin/kategori') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('kategori.index') }}">
                        <img src="{{ asset('assets/bootstrap-icons/folder.svg') }}" alt="">
                        <span>Kategori</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('admin/tambahKasir') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('tambahKasir.index') }}">
                        <img src="{{ asset('assets/bootstrap-icons/person.svg') }}" alt="">
                        <span>Kasir</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('admin/tambahKasir') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('tambahKasir.index') }}">
                        <img src="{{ asset('assets/bootstrap-icons/cart3.svg') }}" alt="">
                        <span>Penjuakan</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('admin/tambahKasir') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('tambahKasir.index') }}">
                        <img src="{{ asset('assets/bootstrap-icons/bar-chart.svg') }}" alt="">
                        <span>Laporan</span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->role == 'Kasir')
                <li class="{{ request()->is('kasir/transaksi') ? 'active' : '' }} nav-item">
                    <a class="nav-link collapsed" href="{{ route('transaksi.index') }}">
                        <i class="fa-solid fa-file-invoice"></i>
                        <span>Transaksi</span>
                    </a>
                </li>
            @endif

            
            <li class="sidebar-item">
                <a href="{{ route('logout') }}" class='sidebar-link'>
                    <img src="{{ asset('assets/bootstrap-icons/box-arrow-right.svg') }}" alt="">
                    <span>Logout</span>
                </a>
            </li>
            
        </ul>
    </div>
</div>
        </div>
        
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('assets/template/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/template/assets/js/app.js') }}"></script>
    
    <!-- Need: Apexcharts -->
    <script src="{{ asset('assets/template/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/template/assets/js/pages/dashboard.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>

