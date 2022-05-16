<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home')}}" class="brand-link">
        <img src="{{ asset('img/hcdllogo.png')}}" alt="HCDL Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light"><strong>HCDL</strong>Portal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/profileAvatar/male_avatar_1.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info" style="color:#fff;">
                <b class="d-block">{{ request()->user()->name}}</b>
                <small class="d-block">{{ request()->user()->department->name}}</small>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home')}}" class="nav-link active">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Inicio
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>
                            Mantenedores
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-tachometer-alt nav-icon"></i>
                                <p>Noticias</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.list')}}" class="nav-link">
                                <i class="fa fa-users nav-icon"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('tickets.list')}}" class="nav-link">
                                <i class="fa fa-ticket-alt nav-icon"></i>
                                <p>Tickets</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('departments.list')}}" class="nav-link">
                                <i class="fa fa-building nav-icon"></i>
                                <p>Departamentos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
