@extends('admin.layout')

@section('title', 'Edit Komentar')

@section('content')
<div class="page-header-box">
  <h2><i class="fa fa-pencil"></i> Edit Komentar</h2>
  <a href="{{ route('admin.kritiks.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>

<div class="panel-admin">
  <div class="panel-admin-body">
    <div class="row" style="margin-bottom: 20px;">
      <div class="col-sm-6">
        <label style="font-weight: bold; color: #666;">User</label>
        <p class="form-control-static" style="font-size: 15px;">{{ $kritik->user->name ?? '-' }}</p>
      </div>
      <div class="col-sm-6">
        <label style="font-weight: bold; color: #666;">Film</label>
        <p class="form-control-static" style="font-size: 15px;">{{ $kritik->film->title ?? '-' }}</p>
      </div>
    </div>
    <hr>
    <form action="{{ route('admin.kritiks.update', $kritik) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="comment">Komentar <span class="text-danger">*</span></label>
        <textarea name="comment" id="comment" class="form-control" rows="4" maxlength="500" required>{{ old('comment', $kritik->comment) }}</textarea>
        <p class="help-block">Maksimal 500 karakter.</p>
      </div>
      <div class="form-group">
        <label for="rating">Rating <span class="text-danger">*</span></label>
        <select name="rating" id="rating" class="form-control" style="width: 120px;" required>
          @for ($i = 1; $i <= 5; $i++)
            <option value="{{ $i }}" {{ old('rating', $kritik->rating) == $i ? 'selected' : '' }}>{{ $i }} ⭐</option>
          @endfor
        </select>
      </div>
      <hr>
      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
      <a href="{{ route('admin.kritiks.index') }}" class="btn btn-default">Batal</a>
    </form>
  </div>
</div>
@endsection
