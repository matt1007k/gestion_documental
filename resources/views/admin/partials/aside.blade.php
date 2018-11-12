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
                <li class="nav-item">
                    <a href="{{route('admin')}}" class="nav-link {{  active('admin') }}">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#modalFiltro" role="button" data-toggle="modal" class="nav-link">
                        <i class="fas fa-search nav-icon"></i>
                        <p>
                            Búscar documentos
                        </p>
                    </a>
                </li>
                @can('roles.index')
                <li class="nav-item">
                    <a href="{{route('roles.index')}}" class="nav-link {{  active('roles') }}">
                        <i class="fas fa-key nav-icon"></i>
                        <p>
                            Roles
                        </p>
                    </a>
                </li>
                @endcan
                @can('users.index')
                    <li class="nav-item">
                        <a href="{{route('usuarios.index')}}" class="nav-link {{  active('usuarios') }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Usuarios
                            </p>
                        </a>
                    </li>
                @endcan
                @can('offices.index')
                <li class="nav-item">
                    <a href="{{route('oficinas.index')}}" class="nav-link {{  active('oficinas') }}">
                        <i class="nav-icon fas fa-suitcase"></i>
                        <p>
                            Oficinas
                        </p>
                    </a>
                </li>
                @endcan
                @can('types.index')
                    <li class="nav-item">
                        <a href="{{route('tipos.index')}}" class="nav-link {{  active('tipos') }}">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Tipo de Documentos
                            </p>
                        </a>
                    </li>
                @endcan
                @can('documents.index')
                    <li class="nav-item has-treeview {{ request()->is('documentos*') ? 'menu-open' : '' || request()->is('*documento') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ active('documentos*') }}">
                            <i class="nav-icon far fa-file"></i>
                            <p>
                                Documentos
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('documents.index')
                            <li class="nav-item">
                                <a href="{{route('documentos.index')}}" class="nav-link  {{  active('documentos') }}">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Todos los documento</p>
                                </a>
                            </li>
                            @endcan
                            @can('documents.create')
                            <li class="nav-item">
                                <a href="{{route('documentos.create')}}" class="nav-link  {{  active('documentos/create') }}">
                                    <i class="fas fa-file-import nav-icon"></i>
                                    <p>Registrar documento</p>
                                </a>
                            </li>
                            @endcan
                            @can('documents.elaborar')
                            <li class="nav-item">
                                <a href="{{route('documentos.elaborar')}}" class="nav-link {{ active('elaborar/documento') }}">
                                    <i class="fas fa-file-contract nav-icon"></i>
                                    <p>Elaborar documento</p>
                                </a>
                            </li>
                            @endcan
                            @can('documents.asignar')
                            <li class="nav-item">
                                <a href="{{route('documentos.asignar')}}" class="nav-link {{ active('asignar/documento') }}">
                                    <i class="fas fa-file-signature nav-icon"></i>
                                    <p>Asignar documento</p>
                                </a>
                            </li>
                            @endcan
                            @can('documents.asignados')
                            <li class="nav-item">
                                <a href="{{route('documentos.asignados')}}" class="nav-link  {{  active('documentos-asignados') }}">
                                    <i class="fas fa-file-signature nav-icon"></i>
                                    <p>Documento asignados</p>
                                </a>
                            </li>
                            @endcan
                            @can('documents.enviar')
                            <li class="nav-item">
                                <a href="{{route('documentos.emitir')}}" class="nav-link {{ active('emitir/documento') }}">
                                    <i class="fas fa-file-export nav-icon"></i>
                                    <p>Enviar documento</p>
                                </a>
                            </li>
                            @endcan
                            @can('documents.enviados')
                                <li class="nav-item">
                                    <a href="{{route('documentos.enviados')}}" class="nav-link  {{  active('documentos-enviados') }}">
                                        <i class="fas fa-file-signature nav-icon"></i>
                                        <p>Documento enviados</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>