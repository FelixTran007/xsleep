<!--== Start Product Area Wrapper ==-->
<div class="product-area section-space position-relative">
    <div class="container">
        <div class="section-title text-center">
            <h5 class="sub-title text-uppercase text-primary mt-n1"><?= lang('App.awesome_products') ?></h5>
            <h2 class="title mb-0 mt-n2"><?= lang('App.featured_collections') ?></h2>
        </div>

        <div class="swiper-container-wrap swiper-button-style swiper-button-nav14">
            <!--== Start Swiper Navigation ==-->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <div class="swiper product-slider-container swiper-shadow-space">
                <div class="swiper-wrapper">
                    <?php foreach ($products as $product): ?>
                        <div class="swiper-slide">
                            <!--== Start Product Item ==-->
                            <div class="product-item">
                                <div class="product-item-thumb-wrap">
                                    <div class="tab-content product-item-tab-content" id="productItem22-tabContent">
                                        <div class="tab-pane fade show active" id="product-item1" role="tabpanel" aria-labelledby="product-item1-tab">
                                            <a class="product-item-thumb" href="<?= route_to('product_detail_'.$locale, $product['slug']) ?>">
                                                <img src="<?= $product['thumbnail'] ?>" alt="Image-HasTech" style="width: 300px; height: 350px;">
                                            </a>
                                        </div>
                                        
                                    </div>
                                    
                                    <?php if(in_array($product['id'], array(1,5,12, 14))) { ?>
                                    <span class="label">Sale</span>
                                    <span class="label label-two">-10%</span>
                                    <?php } ?>

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
                                    <h5 class="product-item-title"><a href="<?= route_to('product_detail_'.$locale, $product['slug']) ?>"><?= $product['name'] ?></a></h5>
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
        </div>
    </div>
</div>
<!--== End Product Area Wrapper ==-->