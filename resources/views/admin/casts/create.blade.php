@extends('admin.layout')

@section('title', 'Tambah Cast')

@section('content')
<div class="page-header-box">
  <h2><i class="fa fa-plus"></i> Tambah Cast</h2>
  <a href="{{ route('admin.casts.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>

<div class="panel-admin">
  <div class="panel-admin-body">
    <form action="{{ route('admin.casts.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Nama <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" maxlength="45" required>
      </div>
      <div class="form-group">
        <label for="age">Umur <span class="text-danger">*</span></label>
        <input type="number" name="age" id="age" class="form-control" value="{{ old('age') }}" min="1" required>
      </div>
      <div class="form-group">
        <label for="bio">Bio <span class="text-danger">*</span></label>
        <textarea name="bio" id="bio" class="form-control" rows="4" required>{{ old('bio') }}</textarea>
      </div>
      <hr>
      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
      <a href="{{ route('admin.casts.index') }}" class="btn btn-default">Batal</a>
    </form>
  </div>
</div>
@endsection
