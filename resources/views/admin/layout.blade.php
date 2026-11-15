<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Dashboard') - Admin Panel</title>
  <link rel="stylesheet" href="{{ asset('template/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('template/css/font-awesome.min.css') }}">
  <style>
    body {
      background-color: #f4f6f9;
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      margin: 0;
      padding-top: 50px;
    }
    .navbar-admin {
      background-color: #222d32;
      border: none;
      border-radius: 0;
      margin-bottom: 0;
    }
    .navbar-admin .navbar-brand {
      color: #ffffff;
      font-weight: bold;
    }
    .navbar-admin .navbar-brand span {
      color: #ff8d1b;
    }
    .navbar-admin .navbar-nav > li > a {
      color: #b8c7ce;
    }
    .navbar-admin .navbar-nav > li > a:hover {
      color: #ffffff;
      background-color: #1e282c;
    }
    .admin-wrapper {
      display: flex;
      min-height: calc(100vh - 50px);
    }
    .admin-sidebar {
      width: 230px;
      background-color: #222d32;
      flex-shrink: 0;
      padding-top: 15px;
    }
    .admin-sidebar ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .admin-sidebar ul li a, .admin-sidebar ul li button {
      display: block;
      width: 100%;
      text-align: left;
      padding: 12px 20px;
      color: #b8c7ce;
      text-decoration: none;
      font-size: 14px;
      border-left: 3px solid transparent;
      background: none;
      border-top: none;
      border-right: none;
      border-bottom: none;
      cursor: pointer;
    }
    .admin-sidebar ul li a:hover, .admin-sidebar ul li button:hover {
      color: #ffffff;
      background-color: #1e282c;
      border-left-color: #ff8d1b;
    }
    .admin-sidebar ul li.active a {
      color: #ffffff;
      background-color: #1e282c;
      border-left-color: #ff8d1b;
      font-weight: bold;
    }
    .admin-sidebar ul li i {
      margin-right: 10px;
      width: 18px;
      text-align: center;
    }
    .admin-content {
      flex-grow: 1;
      padding: 25px 30px;
      overflow-x: auto;
    }
    .page-header-box {
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 1px solid #e1e4e8;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .page-header-box h2 {
      margin: 0;
      font-size: 24px;
      color: #333;
    }
    .panel-admin {
      background: #ffffff;
      border: 1px solid #e3e6f0;
      border-radius: 4px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      margin-bottom: 25px;
    }
    .panel-admin-header {
      padding: 15px 20px;
      border-bottom: 1px solid #e3e6f0;
      background-color: #fafbfc;
      font-weight: bold;
      color: #495057;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .panel-admin-body {
      padding: 20px;
    }
    .table-admin th {
      background-color: #f8f9fa;
      color: #495057;
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .table-admin td {
      vertical-align: middle !important;
      font-size: 14px;
    }
    .table-admin .action-buttons {
      white-space: nowrap;
    }
    .badge-admin {
      padding: 5px 8px;
      font-size: 12px;
      border-radius: 3px;
    }
  </style>
</head>
<body>

  <!-- Top Navbar -->
  <nav class="navbar navbar-admin navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">One<span>Movies</span> Admin</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('home') }}" target="_blank"><i class="fa fa-globe"></i> Lihat Web Publik</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
            <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="#" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">
                <i class="fa fa-sign-out"></i> Logout
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Admin Main Wrapper -->
  <div class="admin-wrapper">
    <!-- Sidebar -->
    <div class="admin-sidebar">
      <ul>
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
          <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="{{ request()->routeIs('admin.films.*') ? 'active' : '' }}">
          <a href="{{ route('admin.films.index') }}"><i class="fa fa-film"></i> Film</a>
        </li>
        <li class="{{ request()->routeIs('admin.casts.*') ? 'active' : '' }}">
          <a href="{{ route('admin.casts.index') }}"><i class="fa fa-users"></i> Cast</a>
        </li>
        <li class="{{ request()->routeIs('admin.genres.*') ? 'active' : '' }}">
          <a href="{{ route('admin.genres.index') }}"><i class="fa fa-tags"></i> Genre</a>
        </li>
        <li class="{{ request()->routeIs('admin.perans.*') ? 'active' : '' }}">
          <a href="{{ route('admin.perans.index') }}"><i class="fa fa-id-badge"></i> Peran</a>
        </li>
        <li class="{{ request()->routeIs('admin.kritiks.*') ? 'active' : '' }}">
          <a href="{{ route('admin.kritiks.index') }}"><i class="fa fa-comments"></i> Komentar</a>
        </li>
        <li class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
          <a href="{{ route('admin.users.index') }}"><i class="fa fa-user-circle"></i> User</a>
        </li>
        <li>
          <form id="admin-logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"><i class="fa fa-sign-out"></i> Logout</button>
          </form>
        </li>
      </ul>
    </div>

    <!-- Content Area -->
    <div class="admin-content">
      <!-- Flash Messages -->
      @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <i class="fa fa-check-circle"></i> {{ session('success') }}
        </div>
      @endif

      @if (session('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <i class="fa fa-exclamation-triangle"></i> {{ session('error') }}
        </div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong><i class="fa fa-exclamation-circle"></i> Terdapat kesalahan input:</strong>
          <ul style="margin-top: 5px; margin-bottom: 0;">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @yield('content')
    </div>
  </div>

  <script src="{{ asset('template/js/jquery-2.1.4.min.js') }}"></script>
  <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
  @yield('scripts')
</body>
</html>
