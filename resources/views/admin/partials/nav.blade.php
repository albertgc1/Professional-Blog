<ul class="sidebar-menu" data-widget="tree">

    <li class="header">MENU DE NAVEGACION</li>

    <li {{ request()->routeIs('dashboard') ? 'class=active' : '' }}>
      <a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> <span>Inicio</span></a>
    </li>

    <li class="treeview {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
        <a href=""><i class="fa fa-bars"></i> <span>Blog</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li {{ request()->routeIs('admin.posts.index') ? 'class=active' : '' }}>
                <a href="{{ route('admin.posts.index') }}"><i class="fa fa-eye"></i>Lista de Posts</a>
            </li>
            <li {{ request()->routeIs('admin.posts.create') ? 'class=active' : '' }}>
                <a href="#"  data-toggle="modal" data-target="#postForm"><i class="fa fa-pencil"></i>Crear un nuevo Post</a>
            </li>
        </ul>
    </li>

    <li class="treeview {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
        <a href=""><i class="fa fa-bars"></i> <span>Usuarios</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li {{ request()->routeIs('admin.users.index') ? 'class=active' : '' }}>
                <a href="{{ route('admin.users.index') }}"><i class="fa fa-eye"></i>Lista de Usuarios</a>
            </li>
            <li {{ request()->routeIs('admin.users.create') ? 'class=active' : '' }}>
                <a href="#"  data-toggle="modal" data-target="#postForm"><i class="fa fa-pencil"></i>Crear un nuevo usuario</a>
            </li>
        </ul>
    </li>
</ul>