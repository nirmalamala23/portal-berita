@extends('back.home')
@section('sub-judul', 'Edit Kategori')
@section('content')

  @if(count($errors)>0)
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
      {{ $error }}
    </div>
        
    @endforeach
  @endif

  @if(Session::has('success'))
  <div class="alert alert-success" role="alert">
  {{ Session('success')}}
  </div>
  
  @endif

    <form action="{{ route('categories.update',  $categories->id ) }}" method="POST">
    @csrf
    @method('patch')
  <div class="form-group">
    <label>Kategori</label>
        <input type="text" class="form-control" name="name" value="{{ $categories->name }}">
  </div>
  
  <div class="form-group">
    <button class="btn btn-primary btn-block">Simpan Kategori</button>
  </div>
  
    </form>
@endsection