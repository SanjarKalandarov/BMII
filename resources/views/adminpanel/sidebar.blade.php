<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">BMI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('profile.edit')}}" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item menu-open">

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('admin.roles.index')}}" class="nav-link @if(request()->routeIs('admin.role.index')) active @endif">
                                <i class="fa fa-check nav-icon"></i>
                                <p>Role</p>
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{route('admin.permissions.index')}}"--}}
{{--                               class="nav-link @if(request()->routeIs('admin.permissions.index')) active @endif">--}}
{{--                                <i class="fa fa-check nav-icon"></i>--}}
{{--                                <p>Permission</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <a href="{{route('admin.users.index')}}"
                               class="nav-link @if(request()->routeIs('admin.users.index')) active @endif">
                                <i class="fa fa-user nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
