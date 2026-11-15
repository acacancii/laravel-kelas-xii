@extends('admin.layout')

@section('title', 'Kelola Komentar')

@section('content')
<div class="page-header-box">
  <h2><i class="fa fa-comments"></i> Kelola Komentar</h2>
</div>

<div class="panel-admin">
  <div class="panel-admin-body">
    <div class="table-responsive">
      <table class="table table-striped table-hover table-admin">
        <thead>
          <tr>
            <th width="5%">#</th>
            <th width="15%">User</th>
            <th width="20%">Film</th>
            <th>Komentar</th>
            <th width="8%">Rating</th>
            <th width="15%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($kritiks as $kritik)
            <tr>
              <td>{{ $kritiks->firstItem() + $loop->index }}</td>
              <td>{{ $kritik->user->name ?? '-' }}</td>
              <td>{{ $kritik->film->title ?? '-' }}</td>
              <td>{{ Str::limit($kritik->comment, 80) }}</td>
              <td>
                @for ($i = 1; $i <= 5; $i++)
                  <i class="fa fa-star{{ $i <= $kritik->rating ? '' : '-o' }}" style="color: #f0ad4e; font-size: 11px;"></i>
                @endfor
              </td>
              <td class="action-buttons">
                <a href="{{ route('admin.kritiks.edit', $kritik) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                <form action="{{ route('admin.kritiks.destroy', $kritik) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center text-muted" style="padding: 30px;">Belum ada data komentar.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="text-center">{{ $kritiks->links() }}</div>
  </div>
</div>
@endsection
