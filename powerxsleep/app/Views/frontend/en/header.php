<!--== Start Header Wrapper ==-->
<header class="header-wrapper" style="font-family: Arial;">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center justify-content-between align-items-center">
                <div class="col-xl-2 col-md-3 col-6">
                    <div class="header-logo">
                        <a href="<?= base_url('en') ?>">
                            <img class="logo-main" src="<?= base_url("assets/images/logo.png") ?>" style="width: 200px; height: auto;" alt="Logo">
                        </a>
                        
                    </div>                    
                </div>                
                <div class="col-xl-6 col-md-4 d-none d-lg-block">
                    <form class="header-search-box" action="<?= route_to('search_en') ?>" method="get">
                        <input class="form-control" type="text" name='q' id="search" placeholder="Search in shop">
                        <button type="submit" class="btn-src">Search&nbsp;<i class="icon icofont-search-2"></i></button>
                    </form>
                </div>
                
                <div class="col-xl-2 col-md-3 col-6 d-flex justify-content-end align-items-center">
                    <div>
                        <span class="cart-amount">
                            <a href="<?= switch_language_url('vn') ?>"><img src="https://flagcdn.com/16x12/vn.png" alt="VN"> VN</a>
                        </span>
                        &nbsp;&nbsp;
                        <span class="cart-amount">
                            <a href="<?= switch_language_url('en') ?>"><img src="https://flagcdn.com/16x12/gb.png" alt="EN"> ENG</a>
                        </span>
                    </div>
                    <div class="header-info-dropdown d-none d-lg-block">
                        <div class="dropdown-menu header-dropdown-menu" aria-labelledby="dropdownCurrency">
                            <h6 class="header-dropdown-menu-title">Currency</h6>
                            <ul>
                                <li><a href="javascript:void(0)">USD - US Dollar</a></li>
                                <li><a href="javascript:void(0)">EUR - Euro</a></li>
                                <li><a href="javascript:void(0)">GBP - British Pound</a></li>
                            </ul>
                            <h6 class="header-dropdown-menu-title style-two">Account</h6>
                            <ul>
                                <li><a href="login-register.html">Login</a></li>
                                <li><a href="login-register.html">Register</a></li>
                                <li><a href="account.html">My Account</a></li>
                            </ul>
                        </div>
                    </div>
                    <button class="btn-menu-two d-lg-none me-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="header-two-area d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-9 col-lg-9">
                    <div class="header-navigation ms-0">
                        <ul class="main-nav">
                            <li class="main-nav-item has-submenu"><a <?= style_active_link("en") ?> class="main-nav-link" href="<?= base_url('en') ?>">Home</a></li>
                            <li class="main-nav-item has-submenu"><a <?= style_active_link("products") ?> class="main-nav-link" href="<?= base_url("products") ?>">Products</a>
                                <ul class="submenu-nav">
                                    <li class="submenu-nav-item"><a class="submenu-nav-link" href="<?= base_url("pillow") ?>">Pillow</a></li>
                                    <li class="submenu-nav-item"><a class="submenu-nav-link" href="<?= base_url("mattress") ?>">Mattress</a></li>
                                </ul>
                            </li>
                            <li class="main-nav-item has-submenu"><a <?= style_active_link("posts") ?> class="main-nav-link" href="<?= base_url("posts") ?>">Posts</a>
                            </li>                            
                            <li class="main-nav-item"><a <?= style_active_link("contact") ?> class="main-nav-link" href="<?= base_url("contact") ?>">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="header-action d-flex align-items-center justify-content-end">
                        <div class="phone-item-action">
                            <a href="tel:+0840981643503"><i class="icon icofont-headphone-alt"></i> (+084) 0981.643.503</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--== End Header Wrapper ==-->