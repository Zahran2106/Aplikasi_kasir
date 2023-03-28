@extends('layouts.master')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Produk</li>
    </ol>
</nav>

<div class="card">
    <div class="card-header d-flex">
        <div class="form-group w-100 mb-3">
            <label for="search" class="d-block mr-2">Cari Pengguna Kasir</label>
            <input type="text" name="cari" class="form-control w-25 d-inline" id="datatable-search-input" placeholder="Search">
            <button type="submit" class="btn btn-primary mb-1">Cari</button>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex">
        <h4 class="card-title">Data Karyawan</h4>
        <a href="{{ route('tambahKasir.create') }}" class="btn btn-primary ms-auto">
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
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Username</th>
                        <th scope="col">Status</th>
                        <th style="width: 150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>
                            @if ($user->foto !== "")
                                <img src="{{ asset('/uploads/images/' . $user->foto) }}" alt="" width="50px">
                            @else
            
                            @endif
                        </td>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->status }}</td>
                        <td>
                            <a href="/tambahKasir/edit/{{ $user->id }}">
                                <button type="button" class="btn btn-warning btn-sm">
                                    <img src="{{ asset('assets/bootstrap-icons/pencil-square.svg') }}" width="20px" alt="">
                                </button>
                            </a>
                            <a href="/tambahKasir/delete/{{ $user->id }}" onclick="return confirm('Are you sure to delete?')">
                                <button type="button" class="btn btn-danger btn-sm">
                                    <img src="{{ asset('assets/bootstrap-icons/trash.svg') }}" width="20px" alt="">
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $users->links() !!}
        </div>
    </div>
</div>
@endsection