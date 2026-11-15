@extends('admin.layout')

@section('title', 'Tambah User')

@section('content')
<div class="page-header-box">
  <h2><i class="fa fa-plus"></i> Tambah User</h2>
  <a href="{{ route('admin.users.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>

<div class="panel-admin">
  <div class="panel-admin-body">
    <form action="{{ route('admin.users.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Nama <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
      </div>
      <div class="form-group">
        <label for="email">Email <span class="text-danger">*</span></label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
      </div>
      <div class="form-group">
        <label for="password">Password <span class="text-danger">*</span></label>
        <input type="password" name="password" id="password" class="form-control" minlength="8" required>
        <p class="help-block">Minimal 8 karakter.</p>
      </div>
      <div class="form-group">
        <label for="role_id">Role <span class="text-danger">*</span></label>
        <select name="role_id" id="role_id" class="form-control" required>
          <option value="">-- Pilih Role --</option>
          @foreach ($roles as $role)
            <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ ucfirst($role->name) }}</option>
          @endforeach
        </select>
      </div>
      <hr>
      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
      <a href="{{ route('admin.users.index') }}" class="btn btn-default">Batal</a>
    </form>
  </div>
</div>
@endsection
