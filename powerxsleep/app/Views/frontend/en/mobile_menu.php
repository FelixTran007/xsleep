<!--== Start Aside Search Menu ==-->
<aside class="aside-search-box-wrapper offcanvas offcanvas-top" data-bs-scroll="true" tabindex="-1" id="AsideOffcanvasSearch">
            <div class="offcanvas-header">
                <h5 class="d-none" id="offcanvasTopLabel">Aside Search</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="icofont-close-line"></i></button>
            </div>
            <div class="offcanvas-body">
                <div class="container pt--0 pb--0">
                    <div class="search-box-form-wrap">
                        <div class="search-note">
                            <p>Start typing and press Enter to search</p>
                        </div>
                        <form action="#" method="post">
                            <div class="search-form position-relative">
                                <label for="search-input3" class="visually-hidden">Search</label>
                                <input id="search-input3" type="search" class="form-control" placeholder="Search entire store…">
                                <button class="search-button" type="button"><i class="icofont-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </aside>
        <!--== End Aside Search Menu ==-->

        <!--== Start Side Menu ==-->
        <aside class="aside-side-menu-wrapper off-canvas-area offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions">
            <div class="offcanvas-header" data-bs-dismiss="offcanvas">
                <button type="button" class="btn-close"><i class="icon icon-close"></i></button>
            </div>
            <div class="offcanvas-body">
                <div class="aside-search-form">
                    <form action="<?= route_to('search_en') ?>" method="get">
                        <input id="search-input2" name="q" type="search" class="form-control" placeholder="Search our store">
                        <button class="search-button" type="button"><i class="icon-magnifier"></i></button>
                    </form>
                </div>
                <!-- Start Mobile Menu Wrapper -->
                <div class="res-mobile-menu">
                    <nav id="offcanvasNav" class="offcanvas-menu">
                        <ul>
                            <li><a href="<?= base_url('en') ?>">Home</a></li>                            
                            <li><a href="#">Products</a>
                                <ul>
                                    <li><a href="<?= base_url("products") ?>">All products</a></li>
                                    <li><a href="<?= base_url("pillow") ?>">Pillow</a></li>
                                    <li><a href="<?= base_url("mattress") ?>">Mattress</a></li>
                                </ul>
                            </li>
                            <li><a href="<?= base_url("posts") ?>">Post</a></li>
                            <li><a href="<?= base_url("contact") ?>">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- End Mobile Menu Wrapper -->

                

            </div>
        </aside>
        <!--== Start Side Menu ==-->