<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="stylesheet" href="('../assets/img/background-login.png')">
        <title>Indokom</title>

        <!-- Custom fonts for this template-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/{{ strtolower(Auth::user()->role) }}">
                    <div class="sidebar-brand-text mx-3">Indokom</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                
                <!-- Nav Item - Pages Collapse Menu -->
                {{-- feature if user have role Admin --}}
                @if (auth()->user()->role == 'Admin')
                    <li class="{{ request()->is('admin') ? 'active' : '' }} nav-item">
                        <a class="nav-link collapsed" href="/admin">
                            <i class="fa-sharp fa-solid fa-house"></i>
                            <span>Dashboard</span></a>
                    </li>
                    <li class="{{ request()->is('admin/produk') ? 'active' : '' }} nav-item">
                        <a class="nav-link collapsed" href="{{ route('produk.index') }}">
                            <i class="fa-solid fa-barcode"></i>
                            <span>Produk</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/kategori') ? 'active' : '' }} nav-item">
                        <a class="nav-link collapsed" href="{{ route('kategori.index') }}">
                            <i class="fa-solid fa-folder-open"></i>
                            <span>Kategori</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/tambahKasir') ? 'active' : '' }} nav-item">
                        <a class="nav-link collapsed" href="{{ route('tambahKasir.index') }}">
                            <i class="fa-solid fa-users"></i>
                            <span>Kasir</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/tambahKasir') ? 'active' : '' }} nav-item">
                        <a class="nav-link collapsed" href="{{ route('tambahKasir.index') }}">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span>Penjuakan</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/tambahKasir') ? 'active' : '' }} nav-item">
                        <a class="nav-link collapsed" href="{{ route('tambahKasir.index') }}">
                            <i class="fa-solid fa-chart-column"></i>
                            <span>Laporan</span>
                        </a>
                    </li>
                @endif

                {{-- feature if user have role Kasir --}}
                @if (auth()->user()->role == 'Kasir')
                    <li class="{{ request()->is('kasir/transaksi') ? 'active' : '' }} nav-item">
                        <a class="nav-link collapsed" href="{{ route('transaksi.index') }}">
                            <i class="fa-solid fa-file-invoice"></i>
                            <span>Transaksi</span>
                        </a>
                    </li>
                @endif

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

            </ul>
            <!-- End of Sidebar -->

           <!-- Content Wrapper -->
           <div id="content-wrapper" class="d-flex flex-column">


            <!-- Main Content -->
            <div id="content">
                <br>
                <div class="container">
                    <section class="content">
                        @yield('content')
                    </section>
                </div>
            </div>
            <!-- End of Main Content -->
        </div>
    </div>

    </body>
</html>