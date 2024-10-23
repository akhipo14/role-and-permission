{{-- <link rel="stylesheet" href="{{ asset('assets/css/style_sidebar.css') }}">
<aside id="sidebar">
    <div class="add-scrollbar">
        <div class="sidebar-logo-1 d-flex align-items-center mt-4" style="z-index: 100">
            <div class="sidebar-logo ">
                <a href="/"><span class="">Roles and Permissions</span></a>
            </div>
        </div>
        <ul class="sidebar-nav ">
            @can('view user')
                <li class="sidebar-item mb-2">
                    <a href="{{ route('user') }}"
                        class="sidebar-link 
                {{ Request::is('user*') ? 'active' : '' }}">
                        <div class="d-flex rounded icon-sidebar">
                            <i class="fa-regular fa-file-lines m-auto text-white" style="font-size: 12px !important"></i>
                        </div>
                        <span class="dashboard">User</span>
                    </a>
                </li>
            @endcan
            @can('view role')
                <li class="sidebar-item mb-2">
                    <a href="{{ route('role') }}"
                        class="sidebar-link 
                    {{ Request::is('role*') ? 'active' : '' }}">
                        <div class="d-flex rounded icon-sidebar">
                            <i class="fa-regular fa-file-lines m-auto text-white" style="font-size: 12px !important"></i>
                        </div>
                        <span class="dashboard">Role</span>
                    </a>
                </li>
            @endcan
            @can('view permission')
                <li class="sidebar-item mb-2">
                    <a href="{{ route('permission') }}"
                        class="sidebar-link 
                {{ Request::is('permission*') ? 'active' : '' }}">
                        <div class="d-flex rounded icon-sidebar">
                            <i class="fa-solid fa-users m-auto text-white" style="font-size: 12px !important"></i>
                        </div>
                        <span class="dashboard">Permissions</span>
                    </a>
                </li>
            @endcan
            @canany(['view post', 'show all post'])
                <li class="sidebar-item mb-2">
                    <a href="{{ route('post') }}"
                        class="sidebar-link 
            {{ Request::is('post*') ? 'active' : '' }}">
                        <div class="d-flex rounded icon-sidebar">
                            <i class="fa-solid fa-users m-auto text-white" style="font-size: 12px !important"></i>
                        </div>
                        <span class="dashboard">Post</span>
                    </a>
                </li>
            @endcanany
    </div>
</aside> --}}
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Gadaimas</div>
    </a>
    {{-- <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Interface
    </div> --}}
    @foreach ($menu_header as $item)
        <li class="nav-item">
            @php
                $collapseId = 'collapse' . $item->idMenu;
            @endphp
            @if ($item->childMenu->isNotEmpty())
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#{{ $collapseId }}"
                    aria-expanded="true" aria-controls="{{ $collapseId }}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>{{ $item->namaMenu }}</span>
                @else
                    <a class="nav-link collapsed" href="#">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>{{ $item->namaMenu }}</span>
            @endif
            </a>
            <div id="{{ $collapseId }}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white  collapse-inner rounded">
                    @foreach ($menu_child as $child)
                        @if ($child->headerMenu === $item->idMenu)
                            <a class="collapse-item" href="buttons.html">{{ $child->namaMenu }}</a>
                        @else
                        @endif
                    @endforeach
                </div>
            </div>
        </li>
    @endforeach
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Addons
    </div>
    <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse " aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item active" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> --}}
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
