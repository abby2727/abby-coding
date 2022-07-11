<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>

                <!-- DASHBOARD -->
                <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}"
                    href="{{ url('admin/dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">Interface</div>

                <!-- CATEGORY -->
                <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/add-category') || Request::is('admin/edit-categroy/*') ? 'collapse active' : 'collapsed' }} collapsed"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="false"
                    aria-controls="collapseCategory">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
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
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
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
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Users
                </a>

                <!-- CHANGE PASSWORD -->
                <a class="nav-link" href="{{ url('change-password') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Change Password
                </a>

                <!-- ADDONS -->
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="{{ url('admin/setting') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Settings
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer text-center">
            {{-- <div class="small">Logged in as:</div> --}}
            Administration
        </div>
    </nav>
</div>
