<!--== Start Product Area Wrapper ==-->
<div class="product-area section-space">
    <div class="container">
        <!--== Start Product Top Bar Area Wrapper ==-->
        <div class="shop-top-bar">

            <div class="shop-top-bar-item">
                <div class="nav list-grid-toggle">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#column-three"><i class="icon-grid icons"></i></button>
                    <button class="nav-link mr-0" data-bs-toggle="tab" data-bs-target="#nav-list"><i class="icon-menu icons"></i></button>
                </div>
            </div>
            
        </div>

        <!--== End Product Top Bar Area Wrapper ==-->
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="column-three">
                <div class="row">
                    <?php foreach ($products as $product): ?>
                        <div class="col-sm-6 col-lg-4 mb-4">
                            <!--== Start Product Item ==-->
                            <div class="product-item">
                                <div class="product-item-thumb-wrap">
                                    <a class="product-item-thumb" href="<?= route_to('product_detail_'.$locale, $product['slug']) ?>">
                                        <img src="<?= $product["thumbnail"] ?>" alt="Image-HasTech">
                                    </a>

                                    <div class="product-item-action">
                                        <button type="button" class="product-action-btn action-btn-quick-view" data-id="<?= $product['id'] ?>" data-tooltip-text="Quick View" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                            <i class="icon-magnifier"></i>
                                        </button>
                                        <button type="button" class="product-action-btn action-btn-compare" data-tooltip-text="Compare" data-bs-toggle="modal" data-bs-target="#action-CompareModal">
                                            <i class="icon-refresh"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="product-item-info">
                                    <h5 class="product-item-title"><a href="<?= route_to('product_detail_'.$locale, $product['slug']) ?>"><?= $product["name"] ?></a></h5>
                                    <p class="product-two-item-desc"><?= $product["short_description"] ?></p>
                                    <div class="product-item-price">
                                        <?php $sale_price = number_format($product['sale_price'], 0, ',', '.');
                                        if($sale_price) {
                                            echo '<span class="price-old">'.number_format($product['price'], 0, ',', '.').' VND</span> '.
                                            number_format($product['sale_price'], 0, ',', '.').' VND';
                                        }
                                        else
                                            echo number_format($product['price'], 0, ',', '.').' VND';
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!--== End Product Item ==-->
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>




            <!--== Bat dau hien thi dạng danh sách ==-->

            <div class="tab-pane fade" id="nav-list">
                <div class="product-list-items">                    
                    <?php foreach ($products as $product): ?>
                        <!--== Start Product Item ==-->
                        <div class="product-two-item mb-4">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="product-two-item-thumb-wrap">
                                        <a class="product-two-item-thumb" href="<?= route_to('product_detail_'.$locale, $product['slug']) ?>">
                                            <img src="<?= $product["thumbnail"] ?>" alt="Image-HasTech">
                                        </a>
                                        <div class="product-two-item-action">
                                            <button type="button" class="product-action-btn action-btn-quick-view" data-tooltip-text="Quick View" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                                <i class="icon-magnifier-add"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 align-self-center">
                                    <div class="product-two-item-info">
                                        <h3 class="product-two-item-title mt-n1"><a href="<?= route_to('product_detail_'.$locale, $product['slug']) ?>"><?= $product["name"] ?></a></h3>
                                        <p class="product-two-item-desc"><?= $product["description"] ?></p>
                                        
                                        <div class="product-item-price">
                                            <span class="price-old"><?= number_format($product['price'], 0, ',', '.') ?> VND</span> 
                                            <?= number_format($product['sale_price'], 0, ',', '.') ?> VND
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--== End Product Item ==-->
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== End Product Area Wrapper ==-->