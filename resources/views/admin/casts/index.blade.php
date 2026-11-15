@extends('admin.layout')

@section('title', 'Kelola Cast')

@section('content')
<div class="page-header-box">
  <h2><i class="fa fa-users"></i> Kelola Cast</h2>
  <a href="{{ route('admin.casts.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Cast</a>
</div>

<div class="panel-admin">
  <div class="panel-admin-body">
    <div class="table-responsive">
      <table class="table table-striped table-hover table-admin">
        <thead>
          <tr>
            <th width="5%">#</th>
            <th>Nama</th>
            <th width="10%">Umur</th>
            <th>Bio</th>
            <th width="15%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($casts as $cast)
            <tr>
              <td>{{ $casts->firstItem() + $loop->index }}</td>
              <td>{{ $cast->name }}</td>
              <td>{{ $cast->age }}</td>
              <td>{{ Str::limit($cast->bio, 80) }}</td>
              <td class="action-buttons">
                <a href="{{ route('admin.casts.edit', $cast) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                <form action="{{ route('admin.casts.destroy', $cast) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus cast ini? Semua peran terkait juga akan dihapus.')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center text-muted" style="padding: 30px;">Belum ada data cast.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="text-center">{{ $casts->links() }}</div>
  </div>
</div>
@endsection
