@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body py-4 px-4 d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <div class="avatar avatar-xl">
                    <img src="{{ asset('assets/template/assets/images/faces/1.jpg') }}" alt="Face 1">
                </div>
                <div class="ms-3 name">
                    <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <div class="ms-3 name">
                    <h5 class="font-bold">Level Anda sebagai : {{ Auth::user()->role }}</h5>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Dashboard</h2>
            </div>
        </div>
    </div>
    Selamat Datang <b>{{ Auth::user()->name }}</b> --}}
@endsection