<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <p class="sidebar-menu-title">Dash menu</p>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard.index')}}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="typcn typcn-briefcase menu-icon"></i>
                <span class="menu-title">Kelola Artikel</span>
                <i class="typcn typcn-chevron-right menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('articles.index')}}">
                            Daftar Artikel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('articles.create')}}">
                            Tambah Artikel
                        </a>
                    </li>
                    @roles(['admin'])
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.categories.index')}}">
                            Kategori Artikel
                        </a>
                    </li>
                    @endroles
                </ul>
            </div>
        </li>
        @roles(['admin'])
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="typcn typcn-briefcase menu-icon"></i>
                <span class="menu-title">Kelola User</span>
                <i class="typcn typcn-chevron-right menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.users.index')}}">
                            Daftar User
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.users.create')}}">
                            Tambah User
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endroles
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="typcn typcn-user-add-outline menu-icon"></i>
                <span class="menu-title">My Account</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard.profile')}}">
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('auth.logout')}}">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
