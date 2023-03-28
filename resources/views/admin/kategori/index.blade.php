@extends('layouts.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kategori</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header d-flex">
            <h4 class="card-title">Data Kategori</h4>
            <a href="{{ route('kategori.create') }}" class="btn btn-primary ms-auto">
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
                            <th scope="col">No.</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Jumlah</th>
                            <th style="width: 150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategoris as $kategori)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $kategori->nama_kategori }}</td>
                            <td>{{ $kategori->jumlah}}</td>
                            <td>
                                <a href="/kategori/edit/{{ $kategori ->id }}">
                                    <button type="button" class="btn btn-warning btn-sm">
                                        <img src="{{ asset('assets/bootstrap-icons/pencil-square.svg') }}" width="20px" alt="">
                                    </button>
                                </a>
                                <a href="/kategori/delete/{{ $kategori->id }}" onclick="return confirm('Are you sure to delete?')">
                                    <button type="button" class="btn btn-danger btn-sm ">
                                        <img src="{{ asset('assets/bootstrap-icons/trash.svg') }}" width="20px" alt="">  
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $kategoris->links() }}
            </div>
        </div>
    </div>
@endsection
