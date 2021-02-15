<nav class="sidebar-nav" role="navigation">
    <div class="nav personal-excerpt">
            {{ Auth::user()->email }}
    </div>
    <hr>
    <div id="admin-menu">
        <ul class="nav nav-stacked">
            <li>
                <a href="{{ route('admin-lost-pet-list') }}" class="{{ (Request::route()->getName() === 'admin-lost-pet-list') ? 'active ': '' }}">
                    @lang('admin_pet.lost.index.heading')
                </a>
            </li>
            <li>
                <a href="{{ route('admin-found-pet-list') }}" class="{{ (Request::route()->getName() === 'admin-found-pet-list') ? 'active ': '' }}">
                    @lang('admin_pet.found.index.heading')
                </a>
            </li>
            @if (Auth::user()->role === 'admin')
                <li>
                    <a href="{{ route('admin-user-list') }}" class="{{ (Request::route()->getName() === 'admin-user-list') ? 'active ': '' }}">
                        @lang('admin_user.index.heading')
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin-user-create') }}" class="{{ (Request::route()->getName() === 'admin-user-create') ? 'active ': '' }}">
                        @lang('admin_user.create.heading')
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ route('admin-logout') }}">
                    @lang('auth.logout')
                </a>
            </li>
        </ul>
    </div>
    <!-- This menu is for smaller screens, it is callapsled by default and it has a callapse toggle button -->
    <a href="#" id="admin-menu-collapse-btn" class="btn btn-link btn-lg" data-toggle="collapse"
        data-target="#admin-menu-collapsed">
          <span class="glyphicon glyphicon-menu-hamburger"></span> @lang('global.menu')
    </a>
    <div id="admin-menu-collapsed" class="collapse">
        <ul class="nav nav-stacked">
            <li>
                <a href="{{ route('admin-lost-pet-list') }}" class="{{ (Request::route()->getName() === 'admin-lost-pet-list') ? 'active ': '' }}">
                    @lang('admin_pet.lost.index.heading')
                </a>
            </li>
            <li>
                <a href="{{ route('admin-found-pet-list') }}" class="{{ (Request::route()->getName() === 'admin-found-pet-list') ? 'active ': '' }}">
                    @lang('admin_pet.found.index.heading')
                </a>
            </li>
            @if (Auth::user()->role === 'admin')
                <li>
                    <a href="{{ route('admin-user-list') }}" class="{{ (Request::route()->getName() === 'admin-user-list') ? 'active ': '' }}">
                        @lang('admin_user.index.heading')
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin-user-create') }}" class="{{ (Request::route()->getName() === 'admin-user-create') ? 'active ': '' }}">
                        @lang('admin_user.create.heading')
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ route('admin-logout') }}">
                    @lang('auth.logout')
                </a>
            </li>
        </ul>
    </div>
</nav>
