@extends('admin.layout')

@section('title', 'Edit Genre')

@section('content')
<div class="page-header-box">
  <h2><i class="fa fa-pencil"></i> Edit Genre</h2>
  <a href="{{ route('admin.genres.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>

<div class="panel-admin">
  <div class="panel-admin-body">
    <form action="{{ route('admin.genres.update', $genre) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Nama Genre <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $genre->name) }}" required>
      </div>
      <hr>
      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
      <a href="{{ route('admin.genres.index') }}" class="btn btn-default">Batal</a>
    </form>
  </div>
</div>
@endsection
