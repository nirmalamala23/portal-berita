<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="">Jejak Berita</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="">JB</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
       <!-- Cek jika type = 1 (Admin) -->
@if(auth()->user()->role_id == 1)
<li class="active">
    <a class="nav-link" href="/admin">
        <i class="fas fa-fire"></i> 
        <span>Dashboard Admin</span>
    </a>
</li>
@endif

<!-- Cek jika type = 2 (Journalist) -->
@if(auth()->user()->role_id == 2)
<li class="active">
    <a class="nav-link" href="/journalist">
        <i class="fas fa-fire"></i> 
        <span>Dashboard Journalist</span>
    </a>
</li>
@endif

        <li class="menu-header">Starter</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa-solid fa-signs-post"></i> <span>Post</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('post.index')}}">List Post</a></li>
            <li><a class="nav-link" href="{{ route('post.tampil_delete')}}">List Post di Hapus</a></li>
          </ul>
        </li>

       <!-- Tampilkan menu hanya jika type BUKAN 2 -->
@if(auth()->user()->role_id != 2)
<!-- Menu Kategori -->
<li class="dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class="fa-solid fa-layer-group"></i> 
        <span>Kategori</span>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="nav-link" href="{{ route('categories.index')}}">List Kategori</a>
        </li>
    </ul>
</li>

<!-- Menu Tag -->
<li class="dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class="fa-solid fa-hashtag"></i> 
        <span>Tag</span>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="nav-link" href="{{ route('tag.index')}}">List Tag</a>
        </li>
    </ul>
</li>

<!-- Menu Users -->
<li class="dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class="fa-solid fa-user-group"></i> 
        <span>Users</span>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="nav-link" href="{{ route('user.index')}}">List Users</a>
        </li>
    </ul>
</li>
@endif

  </aside>
  </div>