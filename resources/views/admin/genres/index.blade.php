@extends('admin.layout')

@section('title', 'Kelola Genre')

@section('content')
<div class="page-header-box">
  <h2><i class="fa fa-tags"></i> Kelola Genre</h2>
  <a href="{{ route('admin.genres.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Genre</a>
</div>

<div class="panel-admin">
  <div class="panel-admin-body">
    <div class="table-responsive">
      <table class="table table-striped table-hover table-admin">
        <thead>
          <tr>
            <th width="5%">#</th>
            <th>Nama Genre</th>
            <th width="15%">Jumlah Film</th>
            <th width="15%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($genres as $genre)
            <tr>
              <td>{{ $genres->firstItem() + $loop->index }}</td>
              <td>{{ $genre->name }}</td>
              <td><span class="badge badge-admin" style="background-color: #337ab7; color: #fff;">{{ $genre->films_count }}</span></td>
              <td class="action-buttons">
                <a href="{{ route('admin.genres.edit', $genre) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                <form action="{{ route('admin.genres.destroy', $genre) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus genre ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="text-center text-muted" style="padding: 30px;">Belum ada data genre.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="text-center">{{ $genres->links() }}</div>
  </div>
</div>
@endsection
