@extends('admin.layout')

@section('title', 'Tambah Film')

@section('content')
<div class="page-header-box">
  <h2><i class="fa fa-plus"></i> Tambah Film</h2>
  <a href="{{ route('admin.films.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>

<div class="panel-admin">
  <div class="panel-admin-body">
    <form action="{{ route('admin.films.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="title">Judul <span class="text-danger">*</span></label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
      </div>
      <div class="form-group">
        <label for="sinopsis">Sinopsis <span class="text-danger">*</span></label>
        <textarea name="sinopsis" id="sinopsis" class="form-control" rows="4" required>{{ old('sinopsis') }}</textarea>
      </div>
      <div class="form-group">
        <label for="year">Tahun <span class="text-danger">*</span></label>
        <input type="number" name="year" id="year" class="form-control" value="{{ old('year') }}" min="1900" max="2100" required>
      </div>
      <div class="form-group">
        <label for="genre_id">Genre <span class="text-danger">*</span></label>
        <select name="genre_id" id="genre_id" class="form-control" required>
          <option value="">-- Pilih Genre --</option>
          @foreach ($genres as $genre)
            <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="poster">Poster <span class="text-danger">*</span></label>
        <input type="file" name="poster" id="poster" accept="image/jpeg,image/jpg,image/png,image/webp" required>
        <p class="help-block">Format: JPG, JPEG, PNG, WEBP. Maks 2MB.</p>
      </div>
      <hr>
      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
      <a href="{{ route('admin.films.index') }}" class="btn btn-default">Batal</a>
    </form>
  </div>
</div>
@endsection
