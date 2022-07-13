<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!-- DASHBOARD -->
                <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}"
                    href="{{ url('admin/dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gauge-high"></i></div>
                    Dashboard
                </a>

                <!-- CATEGORY -->
                <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/add-category') || Request::is('admin/edit-categroy/*') ? 'collapse active' : 'collapsed' }} collapsed"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="false"
                    aria-controls="collapseCategory">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                    Category
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/category') || Request::is('admin/add-category') || Request::is('admin/edit-categroy/*') ? 'show' : '' }}"
                    id="collapseCategory" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/add-category') ? 'active' : '' }}"
                            href="{{ url('admin/add-category') }}">Add Category</a>
                        <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/edit-categroy/*') ? 'active' : '' }}"
                            href="{{ url('admin/category') }}">View Category</a>
                    </nav>
                </div>

                <!-- POST -->
                <a class="nav-link {{ Request::is('admin/post') || Request::is('admin/add-post') || Request::is('admin/edit-post/*') ? 'collapse active' : 'collapsed' }} collapsed"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapsePost" aria-expanded="false"
                    aria-controls="collapsePost">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
                    Post
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/post') || Request::is('admin/add-post') || Request::is('admin/edit-post/*') ? 'show' : '' }}"
                    id="collapsePost" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/add-post') ? 'active' : '' }}"
                            href="{{ url('admin/add-post') }}">Add Post</a>
                        <a class="nav-link {{ Request::is('admin/post') || Request::is('admin/edit-post/*') ? 'active' : '' }}"
                            href="{{ url('admin/post') }}">View Post</a>
                    </nav>
                </div>

                <!-- USER -->
                <a class="nav-link {{ Request::is('admin/user') ? 'active' : '' }}"
                    href="{{ url('admin/user') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                    Users
                </a>

                <a class="nav-link {{ Request::is('admin/setting') ? 'active' : '' }}"
                    href="{{ url('admin/setting') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gears"></i></div>
                    Settings
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer text-center">
            {{-- <div class="small">Logged in as:</div> --}}
            ADMIN
        </div>
    </nav>
</div>
