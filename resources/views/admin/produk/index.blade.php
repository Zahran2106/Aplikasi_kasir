@extends('layouts.master')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Produk</li>
    </ol>
</nav>

<div class="card">
    <div class="card-header d-flex">
        <div class="form-group w-100 mb-3">
            <label for="search" class="d-block mr-2">Cari Produk :</label>
            <input type="text" name="cari" class="form-control w-25 d-inline" id="datatable-search-input" placeholder="Search">
            <button type="submit" class="btn btn-primary mb-1">Cari</button>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex">
        <h4 class="card-title">Data Produk</h4>
        <a href="{{ route('produk.create') }}" class="btn btn-primary ms-auto">
            <img src="{{ asset('assets/icons/plus-lg.svg') }}" width="20px" alt="">
            Tambah 
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session ('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session ('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table class="table table-bordered table-dark mb-2 text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Foto Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Status Barang</th>
                        <th style="width: 150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produks as $produk)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $produk->kode_barang }}</td>
                        <td>
                            @if ($produk->foto_barang !== "")
                            <img src="{{ asset('/uploads/images/' . $produk->foto_barang) }}" alt="" width="50px">
                        @else
                            -
                         @endif
                        </td>
                        <td>{{ $produk->nama_barang}}</td>
                        <td>{{ $produk->kategori}}</td>
                        <td>{{ $produk->status_barang}}</td>
                        <td>
                            <a href="/produk/edit/{{ $produk ->id }}">
                                <button type="button" class="btn btn-warning btn-sm">
                                    <img src="{{ asset('assets/bootstrap-icons/pencil-square.svg') }}" width="20px" alt="">
                                </button>
                            </a>
                            <a href="/produk/delete/{{ $produk->id }}">
                                <button type="button" class="btn btn-danger btn-sm hapusdata">
                                    <img src="{{ asset('assets/bootstrap-icons/trash.svg') }}" width="20px" alt="">
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $produks->links() }}
        </div>
    </div>
</div>
@endsection

