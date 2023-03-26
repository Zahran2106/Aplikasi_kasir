@extends('layouts.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Produk</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Daftar Produk</h2>
            </div>
        </div>
    </div>

    <br>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-bordered">
        <div class="row">
            <div class="col-md-3">
                <form action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search" name="search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('produk.create') }}"> Tambah</a>
            </div>
        </div>
        <tr>
            <th>No.</th>
            <th>Kode Barang</th>
            <th>Foto Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Status Barang</th>
            <th width="115px">Action</th>
        </tr>
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
                        <i class="fa-solid fa-pen"></i>
                    </button>
                </a>
                <a href="/produk/delete/{{ $produk->id }}" onclick="return confirm('Are you sure to delete?')">
                    <button type="button" class="btn btn-danger btn-sm">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $produks->links() }}
@endsection