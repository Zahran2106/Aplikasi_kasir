@extends('layouts.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('tambahKasir.index') }}">Kasir</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Akun Kasir</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambah Akun Kasir</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tambahKasir.index') }}"> Kembali</a>
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
        
    <form action="{{ route('tambahKasir.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Karyawan:</strong>
                    <input type="text" name="name_karyawan" class="form-control" placeholder="Nama Karyawan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Username :</strong>
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password :</strong>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Foto :</strong>
                    <input type="file" name="foto" class="form-control" placeholder="Foto"  accept="image/*" onchange="preview()">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status :</strong>
                    <select name="status" id="" class="form-control">
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
        const togglePassword = document.querySelector("#togglePassword");
            const password = document.querySelector("#password");

            togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("bi-eye");
    });
        function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
    </script>
@endsection