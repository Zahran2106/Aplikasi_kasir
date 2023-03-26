@extends('layouts.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kategori</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Daftar Kategori</h2>
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
                <a class="btn btn-success" href="{{ route('kategori.create') }}"> Tambah</a>
            </div>
        </div>
        <tr>
            <th>No.</th>
            <th>Nama Kategori</th>
            <th>Jumlah</th>
            <th width="115px">Action</th>
        </tr>
        @foreach ($kategoris as $kategori)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $kategori->nama_kategori }}</td>
            <td>{{ $kategori->jumlah}}</td>
            <td>
                <a href="/kategori/edit/{{ $kategori ->id }}">
                    <button type="button" class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                </a>
                <a href="/kategori/delete/{{ $kategori->id }}" onclick="return confirm('Are you sure to delete?')">
                    <button type="button" class="btn btn-danger btn-sm ">
                        <i class="fa-solid fa-trash-can"></i>   
                    </button>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $kategoris->links() }}
    
@endsection