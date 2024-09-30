<link rel="stylesheet" href="{{ asset('assets/css/style_sidebar.css') }}">
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
                {{-- has-dropdown collapsed  --}}
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
            {{-- has-dropdown collapsed  --}}
            {{ Request::is('post*') ? 'active' : '' }}">
                        <div class="d-flex rounded icon-sidebar">
                            <i class="fa-solid fa-users m-auto text-white" style="font-size: 12px !important"></i>
                        </div>
                        <span class="dashboard">Post</span>
                    </a>
                </li>
            @endcanany

        </ul>
    </div>
</aside>
