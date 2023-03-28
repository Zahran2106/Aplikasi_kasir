@extends('layouts.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Kategori</li>
        </ol>
    </nav>

    <br>

<div class="col-md-6">
    <div class="card">
        <div class="card-header text-center">
            <h2>Tambah Kategori</h2>
        </div>
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
        
        <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="form-group">
                        <strong>Nama Kategori :</strong>
                        <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori">
                    </div>
                    <div class="form-group">
                        <strong>Jumlah :</strong>
                        <input type="text" name="jumlah" class="form-control" placeholder="Jumlah">
                    </div>
                    <div class="text-center">
                        <a class="btn btn-outline-primary" href="{{ route('kategori.index') }}"> Kembali</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection