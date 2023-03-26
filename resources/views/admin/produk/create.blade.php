@extends('layouts.master')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Produk</li>
    </ol>
</nav>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambah Produk</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('produk.index') }}"> Kembali</a>
            </div>
        </div>
    </div>

    <br>  

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        
    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode Barang :</strong>
                    <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Barang :</strong>
                    <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kategori :</strong>
                    <select class="form-control" name="kategori">
                        <option value="" selected disabled>- Pilih Kategori -</option>
                        @foreach($kategoris as $kategori)
                        <option value="{{$kategori->nama_kategori}}">{{$kategori->nama_kategori}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stok Barang :</strong>
                    <input type="text" name="stok_barang" class="form-control" placeholder="Stok Barang">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Satuan :</strong>
                    <select name="satuan" id="" class="form-control">
                        <option value="" selected disabled>- Pilih Satuan -</option>
                        <option value="Pcs">Pcs</option>
                        <option value="KiloGram">KiloGram</option>
                        <option value="Liter">Liter</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga Modal :</strong>
                    <input type="text" name="harga_modal" class="form-control" placeholder="Harga Modal">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga Jual :</strong>
                    <input type="text" name="harga_jual" class="form-control" placeholder="Harga Jual">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Foto Barang:</strong>
                    <input type="file" name="foto_barang" class="form-control" placeholder="Foto Barang"  accept="image/*" onchange="preview()">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status Barang :</strong>
                    <select name="status_barang" id="" class="form-control">
                        <option value="" selected disabled>- Pilih Status Barang -</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    <script>
        function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
    </script>
@endsection