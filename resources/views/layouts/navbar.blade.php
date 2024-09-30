<link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">

{{-- navbar --}}
<div class=" navbar w-100 align-items-center py-3">
    <div class=" d-flex align-items-center  justify-content-between ">
    </div>
    <div class="btn-group">
        <div class="btn-group">
            @auth
                <button type="button" class="btn btn-green rounded " data-bs-toggle="dropdown" data-bs-display="static"
                    aria-expanded="false" style="box-shadow: none !important; border: 1px solid white !important">
                    <h5 class="text-white my-auto fs-3"><strong>{{ Auth::user()->name }}</strong></h5>

                </button>
                <ul class="dropdown-menu dropdown-menu-lg-end bg-white ">
                    @can('view post')
                        <li class="d-flex align-items-center justify-content-center mb-2">
                            <a href="/post" class="btn btn-success w-80 ">Your Post</a>
                        </li>
                    @endcan
                    @can('view user')
                        <li class="d-flex align-items-center justify-content-center mb-2">
                            <a href="/user" class="btn btn-success w-80 ">Users Page</a>
                        </li>
                    @endcan
                    @can('view role')
                        <li class="d-flex align-items-center justify-content-center mb-2">
                            <a href="/role" class="btn btn-success w-80 ">Roles Page</a>
                        </li>
                    @endcan
                    @can('view permission')
                        <li class="d-flex align-items-center justify-content-center mb-2">
                            <a href="/permission" class="btn btn-success w-80 ">Permissions Page</a>
                        </li>
                    @endcan
                    <form action="{{ route('logout') }}" method="POST" class="w-100 mb-0">
                        <li class="d-flex align-items-center justify-content-center">
                            @csrf <!-- CSRF token untuk keamanan -->
                            <button type="submit" class="btn btn-danger w-80">Logout</button>
                        </li>
                    </form>
                </ul>
            @endauth
            @guest
                <a class="text-white my-auto fs-3 border rounded px-3" href="/login">Login</a>

            @endguest
        </div>
    </div>
</div>
{{-- end-navbar --}}
