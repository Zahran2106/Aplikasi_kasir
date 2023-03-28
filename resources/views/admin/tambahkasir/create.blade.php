@extends('layouts.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('tambahKasir.index') }}">Kasir</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Akun Kasir</li>
        </ol>
    </nav>
<div class="col-md-6">
    <div class="card">
        <div class="card-header text-center">
            <h2>Tambah Akun Kasir</h2>
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
        <form action="{{ route('tambahKasir.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                        <div class="form-group">
                            <strong>Nama Karyawan:</strong>
                            <input type="text" name="name_karyawan" class="form-control" placeholder="Nama Karyawan">
                        </div>
                        <div class="form-group">
                            <strong>Username :</strong>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <strong>Password :</strong>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
                        </div>
                        <div class="form-group">
                            <strong>Foto :</strong>
                            <input type="file" name="foto" class="form-control" placeholder="Foto"  accept="image/*" onchange="preview()">
                        </div>
                        <div class="form-group">
                            <strong>Status :</strong>
                            <select name="status" id="" class="form-control">
                                <option value="" selected disabled>- Pilih Status -</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-outline-primary" href="{{ route('tambahKasir.index') }}"> Kembali</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection