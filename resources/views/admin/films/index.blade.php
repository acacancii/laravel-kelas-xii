@extends('admin.layout')

@section('title', 'Kelola Film')

@section('content')
<div class="page-header-box">
  <h2><i class="fa fa-film"></i> Kelola Film</h2>
  <a href="{{ route('admin.films.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Film</a>
</div>

<div class="panel-admin">
  <div class="panel-admin-body">
    <div class="table-responsive">
      <table class="table table-striped table-hover table-admin">
        <thead>
          <tr>
            <th width="5%">#</th>
            <th width="10%">Poster</th>
            <th>Judul</th>
            <th width="10%">Tahun</th>
            <th width="12%">Genre</th>
            <th width="15%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($films as $film)
            <tr>
              <td>{{ $films->firstItem() + $loop->index }}</td>
              <td>
                @if ($film->poster)
                  <img src="/{{ $film->poster }}" alt="{{ $film->title }}" style="width: 60px; height: auto; border-radius: 3px;">
                @else
                  <span class="text-muted">-</span>
                @endif
              </td>
              <td>{{ $film->title }}</td>
              <td>{{ $film->year }}</td>
              <td>{{ $film->genre->name ?? '-' }}</td>
              <td class="action-buttons">
                <a href="{{ route('admin.films.edit', $film) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                <form action="{{ route('admin.films.destroy', $film) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus film ini? Semua peran dan komentar terkait juga akan dihapus.')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center text-muted" style="padding: 30px;">Belum ada data film.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="text-center">{{ $films->links() }}</div>
  </div>
</div>
@endsection
