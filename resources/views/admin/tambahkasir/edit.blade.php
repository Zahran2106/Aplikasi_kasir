@extends('layouts.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('tambahKasir.index') }}">Kasir</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Kasir</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tambahKasir.index') }}"> Back</a>
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
        
    <form action="{{ '/tambahKasir/update/' . $user->id }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Karyawan:</strong>
                    <input type="text" name="name_karyawan" class="form-control" placeholder="Name Karyawan" value="{{$user->name}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Username :</strong>
                    <input type="text" name="username" class="form-control" placeholder="Username" value="{{$user->username}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password :</strong>
                    <input type="password" name="password" class="form-control" placeholder="Password" value="{{$user->password}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Foto :</strong>
                    <br>
                    @if ($user->foto != "-")
                        <img src="{{ asset('uploads/images/' . $user->foto) }}" alt="" height="100px" width="100px">
                    @endif
                    <input type="file" name="foto" class="form-control" placeholder="Foto" value="{{$user->foto}}"  accept="image/*" onchange="preview()">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status :</strong>
                    <select name="status" id="" class="form-control">
                        <option value="Aktif" @if ($user->status == 'Aktif')selected @endif>Aktif</option>
                        <option value="Tidak Aktif" @if ($user->status == 'Tidak Aktif')selected @endif>Tidak Aktif</option>
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