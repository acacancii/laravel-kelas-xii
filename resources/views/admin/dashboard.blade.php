@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="page-header-box">
  <h2><i class="fa fa-dashboard"></i> Dashboard</h2>
</div>

<div class="row">
  <div class="col-md-4 col-sm-6">
    <div class="panel-admin" style="border-left: 4px solid #337ab7;">
      <div class="panel-admin-body" style="display: flex; justify-content: space-between; align-items: center;">
        <div>
          <div style="font-size: 13px; font-weight: bold; color: #337ab7; text-transform: uppercase;">Total Film</div>
          <div style="font-size: 28px; font-weight: bold; color: #333;">{{ $counts['film'] }}</div>
        </div>
        <div>
          <i class="fa fa-film fa-3x" style="color: #337ab7; opacity: 0.3;"></i>
        </div>
      </div>
      <div style="background-color: #f8f9fa; padding: 10px 20px; border-top: 1px solid #e3e6f0;">
        <a href="{{ route('admin.films.index') }}" style="font-size: 13px; color: #337ab7;">Lihat Data &rarr;</a>
      </div>
    </div>
  </div>

  <div class="col-md-4 col-sm-6">
    <div class="panel-admin" style="border-left: 4px solid #5cb85c;">
      <div class="panel-admin-body" style="display: flex; justify-content: space-between; align-items: center;">
        <div>
          <div style="font-size: 13px; font-weight: bold; color: #5cb85c; text-transform: uppercase;">Total Cast</div>
          <div style="font-size: 28px; font-weight: bold; color: #333;">{{ $counts['cast'] }}</div>
        </div>
        <div>
          <i class="fa fa-users fa-3x" style="color: #5cb85c; opacity: 0.3;"></i>
        </div>
      </div>
      <div style="background-color: #f8f9fa; padding: 10px 20px; border-top: 1px solid #e3e6f0;">
        <a href="{{ route('admin.casts.index') }}" style="font-size: 13px; color: #5cb85c;">Lihat Data &rarr;</a>
      </div>
    </div>
  </div>

  <div class="col-md-4 col-sm-6">
    <div class="panel-admin" style="border-left: 4px solid #f0ad4e;">
      <div class="panel-admin-body" style="display: flex; justify-content: space-between; align-items: center;">
        <div>
          <div style="font-size: 13px; font-weight: bold; color: #f0ad4e; text-transform: uppercase;">Total Genre</div>
          <div style="font-size: 28px; font-weight: bold; color: #333;">{{ $counts['genre'] }}</div>
        </div>
        <div>
          <i class="fa fa-tags fa-3x" style="color: #f0ad4e; opacity: 0.3;"></i>
        </div>
      </div>
      <div style="background-color: #f8f9fa; padding: 10px 20px; border-top: 1px solid #e3e6f0;">
        <a href="{{ route('admin.genres.index') }}" style="font-size: 13px; color: #f0ad4e;">Lihat Data &rarr;</a>
      </div>
    </div>
  </div>

  <div class="col-md-4 col-sm-6">
    <div class="panel-admin" style="border-left: 4px solid #5bc0de;">
      <div class="panel-admin-body" style="display: flex; justify-content: space-between; align-items: center;">
        <div>
          <div style="font-size: 13px; font-weight: bold; color: #5bc0de; text-transform: uppercase;">Total Peran</div>
          <div style="font-size: 28px; font-weight: bold; color: #333;">{{ $counts['peran'] }}</div>
        </div>
        <div>
          <i class="fa fa-id-badge fa-3x" style="color: #5bc0de; opacity: 0.3;"></i>
        </div>
      </div>
      <div style="background-color: #f8f9fa; padding: 10px 20px; border-top: 1px solid #e3e6f0;">
        <a href="{{ route('admin.perans.index') }}" style="font-size: 13px; color: #5bc0de;">Lihat Data &rarr;</a>
      </div>
    </div>
  </div>

  <div class="col-md-4 col-sm-6">
    <div class="panel-admin" style="border-left: 4px solid #d9534f;">
      <div class="panel-admin-body" style="display: flex; justify-content: space-between; align-items: center;">
        <div>
          <div style="font-size: 13px; font-weight: bold; color: #d9534f; text-transform: uppercase;">Total Komentar</div>
          <div style="font-size: 28px; font-weight: bold; color: #333;">{{ $counts['kritik'] }}</div>
        </div>
        <div>
          <i class="fa fa-comments fa-3x" style="color: #d9534f; opacity: 0.3;"></i>
        </div>
      </div>
      <div style="background-color: #f8f9fa; padding: 10px 20px; border-top: 1px solid #e3e6f0;">
        <a href="{{ route('admin.kritiks.index') }}" style="font-size: 13px; color: #d9534f;">Lihat Data &rarr;</a>
      </div>
    </div>
  </div>

  <div class="col-md-4 col-sm-6">
    <div class="panel-admin" style="border-left: 4px solid #6f42c1;">
      <div class="panel-admin-body" style="display: flex; justify-content: space-between; align-items: center;">
        <div>
          <div style="font-size: 13px; font-weight: bold; color: #6f42c1; text-transform: uppercase;">Total User</div>
          <div style="font-size: 28px; font-weight: bold; color: #333;">{{ $counts['user'] }}</div>
        </div>
        <div>
          <i class="fa fa-user-circle fa-3x" style="color: #6f42c1; opacity: 0.3;"></i>
        </div>
      </div>
      <div style="background-color: #f8f9fa; padding: 10px 20px; border-top: 1px solid #e3e6f0;">
        <a href="{{ route('admin.users.index') }}" style="font-size: 13px; color: #6f42c1;">Lihat Data &rarr;</a>
      </div>
    </div>
  </div>
</div>
@endsection
