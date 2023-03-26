@extends('layouts.kasir')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Dashboard Kasir</h2>
            </div>
        </div>
    </div>
    Selamat Datang <b>{{ Auth::user()->name }}</b>
@endsection