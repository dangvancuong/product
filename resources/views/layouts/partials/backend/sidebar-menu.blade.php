<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="{{ \App\Utils::checkRoute(['dashboard::index', 'admin::index']) ? 'active': '' }}">
        <a href="{{ route('dashboard::index') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    @if (Auth::user()->can('viewList', \App\User::class))
        <li class="{{ \App\Utils::checkRoute(['admin::users.index', 'admin::users.create']) ? 'active': '' }}">
            <a href="{{ route('admin::users.index') }}">
                <i class="fa fa-user-secret"></i> <span>Users</span>
            </a>
        </li>
    @endif
    @if (Auth::user()->can('viewList', \App\User::class))
        <li class="{{ \App\Utils::checkRoute(['admin::products.index', 'admin::products.create']) ? 'active': '' }}">
            <a href="{{ route('admin::products.index') }}">
                <i class="fa fa-list"></i> <span>Products</span>
            </a>
        </li>
    @endif
    @if (Auth::user()->can('viewList', \App\User::class))
        <li class="{{ \App\Utils::checkRoute(['admin::categories.index', 'admin::categories.create']) ? 'active': '' }}">
            <a href="{{ route('admin::categories.index') }}">
                <i class="fa fa-list-alt"></i> <span>Categories</span>
            </a>
        </li>
    @endif
</ul>
