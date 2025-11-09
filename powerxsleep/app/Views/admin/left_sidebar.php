<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
            <img src="<?= base_url() ?>admin_assets/images/logos/logo.svg" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-6"></i>
            </div>
        </div>

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Menu</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="<?= base_url('users'); ?>" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex"><i class="ti ti-shopping-cart"></i></span>
                            <span class="hide-menu">Quản lý user</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="<?= base_url('post'); ?>" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex"><i class="ti ti-shopping-cart"></i></span>
                            <span class="hide-menu">Quản lý bài viết</span>
                        </div>
                    </a>
                </li>   
                
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="<?= base_url('product'); ?>" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex"><i class="ti ti-shopping-cart"></i></span>
                            <span class="hide-menu">Quản lý sản phẩm</span>
                        </div>
                    </a>
                </li>
                
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="<?= base_url('banners'); ?>" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex"><i class="ti ti-shopping-cart"></i></span>
                            <span class="hide-menu">Quản lý top banner</span>
                        </div>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="<?= base_url('pages'); ?>" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex"><i class="ti ti-shopping-cart"></i></span>
                            <span class="hide-menu">Trang liên hệ</span>
                        </div>
                    </a>
                </li>

                <li>
                    <span class="sidebar-divider lg"></span>
                </li>

                
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
</aside>