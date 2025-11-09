<div class="col-sm-12 col-md-6 col-lg-4 mb-n2">
    <div class="section-two-title">
        <h4 class="title mt-n1 mb-n1"><?= lang('App.mattress_bestseller') ?></h4>
    </div>

    <div class="swiper-container-wrap swiper-button-style3 swiper-button-nav3">
        <div class="swiper product-list-grid-slider">
            <div class="swiper-wrapper">
                <?php foreach ($products as $product): ?>
                    <div class="swiper-slide">
                        <!--== Start Product Item ==-->
                        <div class="product-list-item mb-2">
                            <a class="product-list-thumb" href="<?= route_to('product_detail_'.$locale, $product['slug']) ?>">
                                <img src="<?= $product['thumbnail'] ?>" alt="Image-HasTech" style="width: 116px; height: 136px;">
                            </a>
                            <div class="product-list-info">
                                <h5 class="product-list-title"><a href="<?= route_to('product_detail_'.$locale, $product['slug']) ?>"><?= $product['name'] ?></a></h5>
                                <div class="product-list-price">
                                    <?php $sale_price = number_format($product['sale_price'], 0, ',', '.');
                                    if($sale_price) {
                                        echo number_format($product['sale_price'], 0, ',', '.').' VND';
                                        echo '<span class="price-old">'.number_format($product['price'], 0, ',', '.').' VND</span>';
                                    }
                                    else
                                        echo number_format($product['price'], 0, ',', '.').' VND'; ?>
                                </div>
                                <div class="product-item-action">
                                    <button type="button" class="product-action-btn action-btn-quick-view" data-id="<?= $product['id'] ?>" data-tooltip-text="Quick View" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                        <i class="icon-magnifier"></i>
                                    </button>
                                    <button type="button" class="product-action-btn action-btn-compare" data-tooltip-text="Compare" data-bs-toggle="modal" data-bs-target="#action-CompareModal">
                                        <i class="icon-refresh"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!--== End Product Item ==-->
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!--== Start Swiper Navigation ==-->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>