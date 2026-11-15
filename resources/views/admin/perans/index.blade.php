@extends('admin.layout')

@section('title', 'Kelola Peran')

@section('content')
<div class="page-header-box">
  <h2><i class="fa fa-id-badge"></i> Kelola Peran</h2>
  <a href="{{ route('admin.perans.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Peran</a>
</div>

<div class="panel-admin">
  <div class="panel-admin-body">
    <div class="table-responsive">
      <table class="table table-striped table-hover table-admin">
        <thead>
          <tr>
            <th width="5%">#</th>
            <th>Nama Peran (Actor)</th>
            <th>Film</th>
            <th>Cast</th>
            <th width="15%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($perans as $peran)
            <tr>
              <td>{{ $perans->firstItem() + $loop->index }}</td>
              <td>{{ $peran->actor }}</td>
              <td>{{ $peran->film->title ?? '-' }}</td>
              <td>{{ $peran->cast->name ?? '-' }}</td>
              <td class="action-buttons">
                <a href="{{ route('admin.perans.edit', $peran) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                <form action="{{ route('admin.perans.destroy', $peran) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus peran ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center text-muted" style="padding: 30px;">Belum ada data peran.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="text-center">{{ $perans->links() }}</div>
  </div>
</div>
@endsection
