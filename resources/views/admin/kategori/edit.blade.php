@extends('layouts.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Kategori</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Kategori</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('kategori.index') }}"> Back</a>
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
        
    <form action="{{ '/kategori/update' . $kategori->id }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama kategori:</strong>
                    <input type="text" name="nama_karyawan" class="form-control" placeholder="Name Karyawan" value="{{$kategori->nama_kategori}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jumlah :</strong>
                    <input type="text" name="jumlah" class="form-control" placeholder="Jumlah" value="{{$kategori->jumlah}}">
                </div>
            </div>
            <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status :</strong>
                    <select name="status" id="" class="form-control">
                        <option value="">Aktif</option>
                        <option value="">Tidak Aktif</option>
                    </select>
                </div>
            </div> -->
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        
    </form>
@endsection