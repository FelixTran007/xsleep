<!--== Start Product Tab Area Wrapper ==-->
<div class="product-area section-bottom-space position-relative">
    <div class="container">
        <div class="section-title text-center mb-0">
            <h5 class="sub-title text-uppercase text-primary mt-n1"><?= lang('App.explore_the_awesome') ?></h5>
            <h2 class="title mb-0 mt-n2"><?= lang('App.various_products') ?></h2>
        </div>
        <div class="product-tab-content">
            <ul class="nav nav-tabs nav-tabs-two" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="new-products-tab" data-bs-toggle="tab" data-bs-target="#new-products" type="button" role="tab" aria-controls="new-products" aria-selected="true"><?= lang('App.pillow_group') ?></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="best-selling-product-tab" data-bs-toggle="tab" data-bs-target="#best-selling-product" type="button" role="tab" aria-controls="best-selling-product" aria-selected="false"><?= lang('App.mattress_group') ?></button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="new-products" role="tabpanel" aria-labelledby="new-products-tab">
                    <div class="swiper-container-wrap swiper-button-style swiper-button-nav10 mb-n6">
                        <!--== Start Swiper Navigation ==-->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>

                        <div class="swiper product-tab-four-grid-slider">
                            <div class="swiper-wrapper">
                                <?php foreach ($goi_products as $product): ?>
                                    <div class="swiper-slide">
                                        <!--== Start Product Item ==-->
                                        <div class="product-item mb-4">
                                            <div class="product-item-thumb-wrap">
                                                <a class="product-item-thumb" href="<?= route_to('product_detail_'.$locale, $product['slug']) ?>">
                                                    <img src="<?= $product['thumbnail'] ?>"  alt="Image-HasTech" >
                                                </a>
                                                <?php if(in_array($product['id'], array(1,5,12, 14))) { ?>
                                                <span class="label">Sale</span>
                                                <span class="label label-two">-15%</span>
                                                <span class="label label-new">New</span>
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
                <div class="tab-pane fade" id="best-selling-product" role="tabpanel" aria-labelledby="best-selling-product-tab">
                    sdfsfsfssdfsfs sdfsdfsd
                    <div class="swiper-container-wrap swiper-button-style swiper-button-nav11 mb-n6">
                        <!--== Start Swiper Navigation ==-->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>

                        <div class="swiper product-tab-five-grid-slider">
                            <div class="swiper-wrapper">
                                <?php foreach ($nem_products as $product): ?>
                                    <div class="swiper-slide">
                                        <!--== Start Product Item ==-->
                                        <div class="product-item mb-4">
                                            <div class="product-item-thumb-wrap">
                                                <a class="product-item-thumb" href="<?= route_to('product_detail_'.$locale, $product['slug']) ?>">
                                                    <img src="<?= $product['thumbnail'] ?>"  alt="Image-HasTech" style="width: 300px; height: 350px;">
                                                </a>
                                                <?php if(in_array($product['id'], array(1,5,12, 14))) { ?>
                                                <span class="label">Sale</span>
                                                <span class="label label-two">-15%</span>
                                                <span class="label label-new">New</span>
                                                <?php } ?>
                                                
                                            </div>
                                            <div class="product-item-info">
                                                <h5 class="product-item-title"><a href="<?= route_to('product_detail_'.$locale, $product['slug']) ?>"><?= $product['name'] ?></a></h5>
                                                <div class="product-item-price">
                                                    <span class="price-old"><?= number_format($product['price'], 0, ',', '.') ?> VND</span> 
                                                    <?= number_format($product['sale_price'], 0, ',', '.') ?> VND
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

        </div>
    </div>
</div>
<!--== End Product Tab Area Wrapper ==-->