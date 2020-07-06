<div class="row align-items-center">
    <div class="col-lg order-lg-first">
        <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
            <li class="nav-item">
                <a href="{{ route('admin.home') }}" class="nav-link">
                    <i class="fe fe-home"></i> Home
                </a>
            </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="dropdown"><i class="fe fe-users"></i> Users</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                        @can('permissions_manage')
                        <a href="{{ route('admin.permissions.index') }}" class="dropdown-item ">Permissions</a>
                        @endcan

                        @can('roles_manage')
                        <a href="{{ route('admin.roles.index') }}" class="dropdown-item ">Roles</a>
                        @endcan

                        @can('users_manage')
                            <a href="{{ route('admin.users.index') }}" class="dropdown-item ">Users</a>
                        @endcan
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.agencies.index') }}"><i class="fe fe-briefcase"></i> Agencies</a>
                </li>
        </ul>
    </div>
</div>
