@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Kasir</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tambahKasir.create') }}"> Tambah</a>
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
        <tr>
            <th>No.</th>
            <th>Foto</th>
            <th>Nama Karyawan</th>
            <th>Username</th>
            <th>Status</th>
            <th width="112px">Action</th>
        </tr>
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
                        <i class="fa-solid fa-pen"></i>
                    </button>
                </a>
                <a href="/tambahKasir/delete/{{ $user->id }}" onclick="return confirm('Are you sure to delete?')">
                    <button type="button" class="btn btn-danger btn-sm">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $users->links() !!}
        
@endsection