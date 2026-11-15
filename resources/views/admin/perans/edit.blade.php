@extends('admin.layout')

@section('title', 'Edit Peran')

@section('content')
<div class="page-header-box">
  <h2><i class="fa fa-pencil"></i> Edit Peran</h2>
  <a href="{{ route('admin.perans.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>

<div class="panel-admin">
  <div class="panel-admin-body">
    <form action="{{ route('admin.perans.update', $peran) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="actor">Nama Peran (Actor) <span class="text-danger">*</span></label>
        <input type="text" name="actor" id="actor" class="form-control" value="{{ old('actor', $peran->actor) }}" required>
      </div>
      <div class="form-group">
        <label for="film_id">Film <span class="text-danger">*</span></label>
        <select name="film_id" id="film_id" class="form-control" required>
          <option value="">-- Pilih Film --</option>
          @foreach ($films as $film)
            <option value="{{ $film->id }}" {{ old('film_id', $peran->film_id) == $film->id ? 'selected' : '' }}>{{ $film->title }} ({{ $film->year }})</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="cast_id">Cast <span class="text-danger">*</span></label>
        <select name="cast_id" id="cast_id" class="form-control" required>
          <option value="">-- Pilih Cast --</option>
          @foreach ($casts as $cast)
            <option value="{{ $cast->id }}" {{ old('cast_id', $peran->cast_id) == $cast->id ? 'selected' : '' }}>{{ $cast->name }}</option>
          @endforeach
        </select>
      </div>
      <hr>
      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
      <a href="{{ route('admin.perans.index') }}" class="btn btn-default">Batal</a>
    </form>
  </div>
</div>
@endsection
