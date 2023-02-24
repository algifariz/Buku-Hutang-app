<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="nav-item {{ $type_menu === 'dashboard' ? 'active' : '' }}">
        <a href="/" class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <ul class="sidebar-menu">
        <li class="menu-header">Data Hutang</li>
        <li class="nav-item {{ $type_menu === 'dashboard' ? 'active' : '' }}">
          <a href="/data-hutang" class="nav-link "><i class="fas fa-fire"></i><span>Data Hutang $</span></a>
        </li>
      </ul>
      <ul class="sidebar-menu">
        <li class="menu-header">Data Hutang</li>
        <li class="nav-item {{ $type_menu === 'dashboard' ? 'active' : '' }}">
          <a href="/data-pembayaran" class="nav-link "><i class="fas fa-fire"></i><span>Data pembayaran$</span></a>
        </li>
      </ul>


  </aside>
</div>
