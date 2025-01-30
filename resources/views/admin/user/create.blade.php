@extends('back.home')
@section('sub-judul', 'Tambah User')
@section('content')

    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
    {{ Session('success')}}
    </div>
    @endif

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama User</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label>Tipe User</label>
            <select class="form-control" name="type">
                <option value="" holder>Pilih Tipe User</option>
                <option value="0" holder>Journalist</option>
                <option value="1" holder>Admin</option>
            </select>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}">
        </div>

        <button type="submit" class="btn btn-primary btn-block">Simpan User</button>
    </form>

@endsection
