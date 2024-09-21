<ul class="nav">


    <li class="nav-item menu-items {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
        </a>
    </li>
    <li class="nav-item menu-items {{ Route::currentRouteName() == 'category.list' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('category.list') }}">
            <span class="menu-icon">
                <i class="fa-solid fa-layer-group"></i>
            </span>
            <span class="menu-title">Category</span>
        </a>
    </li>
    <li class="nav-item menu-items {{ Route::currentRouteName() == 'subcat.list' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('subcat.list') }}">
            <span class="menu-icon">
                <i class="fa-solid fa-layer-group"></i>
            </span>
            <span class="menu-title">Sub Category</span>
        </a>
    </li>
    <li class="nav-item menu-items {{ Route::currentRouteName() == 'productList' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('productList') }}">
            <span class="menu-icon">
                <i class="fa-solid fa-cubes-stacked"></i>
            </span>
            <span class="menu-title">Product</span>
        </a>
    </li>
    

   
</ul>
