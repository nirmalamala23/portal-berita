@extends('back.home')
@section('sub-judul', 'Kategori')
@section('content')

    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
    {{ Session('success')}}
    </div>

    @endif

    <a href="{{ route('categories.create') }}" class="btn btn-info btn-sm">Tambah Kategori</a>
    <br></br>

    <table class="table table-striped table-hover table-sm table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $result => $hasil)
        <tr>
            <td>{{ $result + $categories->firstItem() }}</td>
            <td>{{ $hasil->name }}</td>
            <td>
                <form action="{{ route('categories.destroy', $hasil->id)}}" method="POST">
                    @csrf
                    @method('delete')
                <a href="{{ route('categories.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <button type="submit" class="btn btn-danger btn-sm">Delete</buttom>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $categories->links() }}

@endsection
