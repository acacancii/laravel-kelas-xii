@extends('admin.layout')

@section('title', 'Kelola User')

@section('content')
<div class="page-header-box">
  <h2><i class="fa fa-user-circle"></i> Kelola User</h2>
  <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah User</a>
</div>

<div class="panel-admin">
  <div class="panel-admin-body">
    <div class="table-responsive">
      <table class="table table-striped table-hover table-admin">
        <thead>
          <tr>
            <th width="5%">#</th>
            <th>Nama</th>
            <th>Email</th>
            <th width="10%">Role</th>
            <th width="15%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($users as $user)
            <tr>
              <td>{{ $users->firstItem() + $loop->index }}</td>
              <td>
                {{ $user->name }}
                @if (Auth::id() === $user->id)
                  <span class="label label-info">Anda</span>
                @endif
              </td>
              <td>{{ $user->email }}</td>
              <td>
                @if ($user->role)
                  <span class="label {{ $user->role->name === 'admin' ? 'label-danger' : 'label-primary' }}">{{ ucfirst($user->role->name) }}</span>
                @else
                  <span class="text-muted">-</span>
                @endif
              </td>
              <td class="action-buttons">
                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                @if (Auth::id() !== $user->id)
                  <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus user ini? Semua komentar dan profil terkait juga akan dihapus.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                  </form>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center text-muted" style="padding: 30px;">Belum ada data user.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="text-center">{{ $users->links() }}</div>
  </div>
</div>
@endsection
