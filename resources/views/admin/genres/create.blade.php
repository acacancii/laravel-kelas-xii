@extends('admin.layout')

@section('title', 'Tambah Genre')

@section('content')
<div class="page-header-box">
  <h2><i class="fa fa-plus"></i> Tambah Genre</h2>
  <a href="{{ route('admin.genres.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>

<div class="panel-admin">
  <div class="panel-admin-body">
    <form action="{{ route('admin.genres.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Nama Genre <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
      </div>
      <hr>
      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
      <a href="{{ route('admin.genres.index') }}" class="btn btn-default">Batal</a>
    </form>
  </div>
</div>
@endsection
