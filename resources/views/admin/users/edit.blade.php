@extends('admin.layout')

@section('title', 'Edit User')

@section('content')
<div class="page-header-box">
  <h2><i class="fa fa-pencil"></i> Edit User</h2>
  <a href="{{ route('admin.users.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>

<div class="panel-admin">
  <div class="panel-admin-body">
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Nama <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
      </div>
      <div class="form-group">
        <label for="email">Email <span class="text-danger">*</span></label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" minlength="8">
        <p class="help-block">Kosongkan jika tidak ingin mengubah password. Minimal 8 karakter.</p>
      </div>
      <div class="form-group">
        <label for="role_id">Role <span class="text-danger">*</span></label>
        <select name="role_id" id="role_id" class="form-control" required>
          <option value="">-- Pilih Role --</option>
          @foreach ($roles as $role)
            <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>{{ ucfirst($role->name) }}</option>
          @endforeach
        </select>
        @if (Auth::id() === $user->id)
          <p class="help-block text-danger"><i class="fa fa-exclamation-triangle"></i> Anda tidak dapat menurunkan role akun Anda sendiri dari admin.</p>
        @endif
      </div>
      <hr>
      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
      <a href="{{ route('admin.users.index') }}" class="btn btn-default">Batal</a>
    </form>
  </div>
</div>
@endsection
