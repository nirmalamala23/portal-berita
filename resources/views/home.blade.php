@extends('layout.app')

@section('title', 'Dashboard')
@endsection
@section('content')
<div class="container">
    <div class="alert alert-success text-center" role="alert">
        <h4 class="alert-heading">Login Berhasil!</h4>
        <p>Selamat datang di Dashboard Admin, {{ auth()->user()->name }}!</p>
        <hr>
        <p class="mb-0">Anda berhasil login dengan email: {{ auth()->user()->email }}</p>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Dashboard Admin
        </div>
        <div class="card-body">
            <h5 class="card-title">Konten Dashboard</h5>
            <p class="card-text">Selamat datang, ini adalah area khusus admin untuk mengelola aplikasi.</p>
            <a href="{{ url('/logout') }}" class="btn btn-danger">Logout</a>
        </div>
    </div>
</div>
@endsection
