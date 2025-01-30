<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Jejak Berita</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">JB</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class=active><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
        </li>
        <li class="menu-header">Starter</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa-solid fa-signs-post"></i> <span>Post</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('post.index')}}">List Post</a></li>
            <li><a class="nav-link" href="{{ route('post.tampil_delete')}}">List Post di Hapus</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa-solid fa-layer-group"></i> <span>Kategori</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('categories.index')}}">List Kategori</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa-solid fa-hashtag"></i> <span>Tag</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('tag.index')}}">List Tag</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa-solid fa-user-group"></i> <span>Users</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('user.index')}}">List Users</a></li>
          </ul>
        </li>
  </aside>
  </div>