@extends('back.home')
@section('sub-judul', 'User')
@section('content')

    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
    {{ Session('success')}}
    </div>

    @endif

    <a href="{{ route('user.create') }}" class="btn btn-info btn-sm">Tambah User</a>
    <br></br>

    <table class="table table-striped table-hover table-sm table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $result => $hasil)
        <tr>
            <td>{{ $result + $user->firstItem() }}</td>
            <td>{{ $hasil->name }}</td>
            <td>{{ $hasil->email }}</td>
            <td>
                {{ $hasil->role ? $hasil->role->name : 'Tidak ada role' }}
            </td>
            
            <td>
                <form action="{{ route('user.destroy', $hasil->id)}}" method="POST">
                    @csrf
                    @method('delete')
                <a href="{{ route('user.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $user->links() }}

@endsection
