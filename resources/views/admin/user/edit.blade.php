@extends('back.home')
@section('sub-judul', 'Edit User')
@section('content')

    @if(count($errors) > 0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>
    @endforeach
    @endif

    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Nama User</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" readonly>
        </div>

        <div class="form-group">
            <label>Tipe User</label>
            <select class="form-control" name="role_id">
                <option value="" holder>Pilih Tipe User</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" 
                        @if ($role->id == $user->role_id) selected @endif>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>
        

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}">
        </div>

        <button type="submit" class="btn btn-primary btn-block">Update User</button>
    </form>

@endsection
