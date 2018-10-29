<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin') }}" class="brand-link">
        <img src="{{ asset('image/mp-escudo.jpg') }}" alt="Escudo del Ministerio Público" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Gestión Documental</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('image/user/'.Auth::user()->avatar)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('perfil', Auth::user()->id)}}" class="d-block">{{  ucfirst(Auth::user()->name).' '.ucfirst(Auth::user()->apellidos) }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="{{route('admin')}}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @can('roles.index')
                <li class="nav-item">
                    <a href="{{route('roles.index')}}" class="nav-link {{ request()->is('roles') ? 'active' : '' }}">
                        <i class="fas fa-key nav-icon"></i>
                        <p>
                            Roles
                        </p>
                    </a>
                </li>
                @endcan
                @can('users.index')
                    <li class="nav-item">
                        <a href="{{route('usuarios.index')}}" class="nav-link {{ request()->is('usuarios') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Usuarios
                            </p>
                        </a>
                    </li>
                @endcan
                @can('offices.index')
                <li class="nav-item">
                    <a href="{{route('oficinas.index')}}" class="nav-link {{ request()->is('oficinas') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-suitcase"></i>
                        <p>
                            Oficinas
                        </p>
                    </a>
                </li>
                @endcan
                @can('types.index')
                    <li class="nav-item">
                        <a href="{{route('tipos.index')}}" class="nav-link {{ request()->is('tipos') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Tipo de Documento
                            </p>
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>