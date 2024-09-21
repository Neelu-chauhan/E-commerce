{{-- @php
    use App\Models\user;
    $logged_user = Auth::user()->id;
    $permission_arr = [];
    $logged_user_data = user::where('users.id', $logged_user)
                            ->leftjoin('roles', 'roles.id', 'users.role_id_fk')
                            ->leftjoin('assign_permissions', 'assign_permissions.role_id_fk', 'roles.id')
                            ->first();
    $permission_arr = explode(',', $logged_user_data->permission_id_fk);
    // dd($permission_arr);
@endphp --}}

<div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo" href="index.html"><img src="{{ asset('assets/images/logo-tho.png') }}" alt="logo" /></a>
        </div>

      
        <ul class="nav">
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-speedometer"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            {{-- @if (!empty($permission_arr) && in_array('5', $permission_arr)) --}}
            @can('Product-view')
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('category.list') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-playlist-play"></i>
                        </span>
                        <span class="menu-title">Category</span>
                    </a>
                </li>
            @endcan
            {{-- @endif --}}
            {{-- @if (!empty($permission_arr) && in_array('6', $permission_arr)) --}}
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('subcat.list') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-table-large"></i>
                        </span>
                        <span class="menu-title">Sub Category</span>
                    </a>
                </li>
            {{-- @endif --}}
            {{-- @if (!empty($permission_arr) && in_array('11', $permission_arr)) --}}
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('productList') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-cubes-stacked"></i>
                        </span>
                        <span class="menu-title">Product</span>
                    </a>
                </li>
            {{-- @endif --}}

            {{-- @if (!empty($permission_arr) && in_array('15', $permission_arr)) --}}
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                        aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="fa-solid fa-users"></i>
                        </span>
                        <span class="menu-title">User Assign</span>
                        <i class="menu-arrow"></i>
                    </a>
            {{-- @endif --}}
            <div class="collapse" id="ui-basic">
                {{-- @if (!empty($permission_arr) && in_array('15', $permission_arr)) --}}
                    <ul class="nav flex-column sub-menu">
                        {{-- @can('User-view')     --}}
                        <li class="nav-item"> <a class="nav-link" href="{{ route('users.list') }}">Users</a></li>
                        {{-- @endcan --}}
                        {{-- @can('Role view')     --}}
                        <li class="nav-item"> <a class="nav-link" href="{{ route('role.list') }}">Roles List</a></li>
                        {{-- @endcan --}}
                        {{-- @can('View Permission')     --}}
                        <li class="nav-item"> <a class="nav-link" href="{{ route('permission.list') }}">Permission
                                List</a></li>
                        {{-- @endcan         --}}
                        <li class="nav-item"> <a class="nav-link" href="{{ route('sidecategory.list') }}">Category
                                List</a></li>
                    </ul>
                {{-- @endif --}}
            </div>
            </li>
        </ul>
    </nav>
