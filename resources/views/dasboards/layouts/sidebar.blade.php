<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dasboards') ? 'active' : '' }} " aria-current="page" href="/dasboards">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dasboards/posts*') ? 'active' : '' }}" href="/dasboards/posts">
                    <span data-feather="file" class="align-text-bottom"></span>
                    My Posts
                </a>
            </li>
        </ul>

        @can('admin')
            <h6 class="sidebar-heading d-flex justify-content-between align-item-center px-3 mt-4 mb-1 text-muted">
                <span>ADMINISTRATOR</span>
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dasboards/categories*') ? 'active' : '' }}"
                        href="/dasboards/categories">
                        <span data-feather="grid" class="align-text-bottom"></span>
                        Post Categories
                    </a>
                </li>
            </ul>
        @endcan
    </div>
</nav>
