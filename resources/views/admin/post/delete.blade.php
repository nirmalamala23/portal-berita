@extends('back.home')
@section('sub-judul', 'Post Terhapus')
@section('content')

    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif

    <table class="table table-striped table-hover table-sm table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Post</th>
            <th>Kategori</th>
            <th>Daftar Tags</th>
            <th>Thumbnail</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($post as $result => $hasil)
        <tr>
            <td>{{ $result + $post->firstItem() }}</td>
            <td>{{ $hasil->judul }}</td>
            <td>{{ optional($hasil->categories)->name ?? 'Tidak ada kategori' }}</td>
            <td>
                @if($hasil->tags->isNotEmpty())
                    <ul>
                        @foreach($hasil->tags as $tag)
                            <li>{{ $tag->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <span class="text-muted">Tidak ada tag</span>
                @endif
            </td>
            <td>
                @if($hasil->gambar)
                    <img src="{{ asset($hasil->gambar) }}" class="img-fluid" style="width:100px">
                @else
                    <span class="text-muted">Tidak ada gambar</span>
                @endif
            </td>
            <td>
                <form action="{{ route('post.kill', $hasil->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{ route('post.restore', $hasil->id) }}" class="btn btn-info btn-sm">Restore</a>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $post->links() }}

@endsection
