@extends('layouts.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Produk</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Produk</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('produk.index') }}"> Back</a>
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
        
    <form action="{{ '/produk/update/' . $produk->id }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode Barang :</strong>
                    <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" value="{{$produk->kode_barang}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Barang :</strong>
                    <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="{{$produk->nama_barang}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kategori :</strong>
                    <input type="text" name="kategori" class="form-control" placeholder="Kategori" value="{{$produk->kategori}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stok Barang :</strong>
                    <input type="text" name="stok_barang" class="form-control" placeholder="Stok Barang" value="{{$produk->stok_barang}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Satuan :</strong>
                    <select name="satuan" id="" class="form-control">
                        <option value="Pcs" @if ($produk->satuan == 'Pcs')selected @endif>Pcs</option>
                        <option value="KiloGram" @if ($produk->satuan == 'KiloGram')selected @endif>KiloGram</option>
                        <option value="Liter" @if ($produk->satuan == 'Liter') selected @endif>Liter</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga Modal :</strong>
                    <input type="text" name="harga_modal" class="form-control" placeholder="Harga Modal" value="{{$produk->harga_modal}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga Jual :</strong>
                    <input type="text" name="harga_jual" class="form-control" placeholder="Harga Jual" value="{{$produk->harga_jual}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Foto Barang:</strong>
                <br>
                    @if ($produk->foto_barang != "-")
                        <img src="{{ asset('uploads/images/' . $produk->foto_barang) }}" alt="" height="100px" width="100px">
                    @endif
                    <input type="file" name="foto_barang" class="form-control" placeholder="Foto Barang" value="{{$produk->foto_barang}}"  accept="image/*" onchange="preview()">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status Barang :</strong>
                    <select name="status_barang" id="" class="form-control">
                        <option value="Aktif" @if ($produk->status_barang == 'Aktif')selected @endif>Aktif</option>
                        <option value="Tidak Aktif" @if ($produk->status_barang == 'Tidak Aktif')selected @endif>Tidak Aktif</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        
    </form>
@endsection