@extends('admin.layout')

@section('title', 'Edit Film')

@section('content')
<div class="page-header-box">
  <h2><i class="fa fa-pencil"></i> Edit Film</h2>
  <a href="{{ route('admin.films.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>

<div class="panel-admin">
  <div class="panel-admin-body">
    <form action="{{ route('admin.films.update', $film) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="title">Judul <span class="text-danger">*</span></label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $film->title) }}" required>
      </div>
      <div class="form-group">
        <label for="sinopsis">Sinopsis <span class="text-danger">*</span></label>
        <textarea name="sinopsis" id="sinopsis" class="form-control" rows="4" required>{{ old('sinopsis', $film->sinopsis) }}</textarea>
      </div>
      <div class="form-group">
        <label for="year">Tahun <span class="text-danger">*</span></label>
        <input type="number" name="year" id="year" class="form-control" value="{{ old('year', $film->year) }}" min="1900" max="2100" required>
      </div>
      <div class="form-group">
        <label for="genre_id">Genre <span class="text-danger">*</span></label>
        <select name="genre_id" id="genre_id" class="form-control" required>
          <option value="">-- Pilih Genre --</option>
          @foreach ($genres as $genre)
            <option value="{{ $genre->id }}" {{ old('genre_id', $film->genre_id) == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="poster">Poster</label>
        @if ($film->poster)
          <div style="margin-bottom: 10px;">
            <img src="/{{ $film->poster }}" alt="{{ $film->title }}" style="max-width: 150px; border-radius: 3px;">
            <p class="help-block">Poster saat ini. Upload file baru untuk mengganti.</p>
          </div>
        @endif
        <input type="file" name="poster" id="poster" accept="image/jpeg,image/jpg,image/png,image/webp">
        <p class="help-block">Format: JPG, JPEG, PNG, WEBP. Maks 2MB. Kosongkan jika tidak ingin mengganti.</p>
      </div>
      <hr>
      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
      <a href="{{ route('admin.films.index') }}" class="btn btn-default">Batal</a>
    </form>
  </div>
</div>
@endsection
