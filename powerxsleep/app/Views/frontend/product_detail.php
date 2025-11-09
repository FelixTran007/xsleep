<!--== Start Product Detail Area Wrapper ==-->
<div class="product-details-section section-space">
    <div class="container">
        <?php if(!empty($product_detail)) { ?>
            <!-- Single Product Top Area Start -->
            <div class="row row-cols-md-2 row-cols-1 mb-n6">

                <!-- Product Image Start -->
                <div class="col mb-4">
                    <div class="single-product-image">

                        <!-- Product Image Slider Start -->
                        <div class="product-image-slider swiper">
                            <!-- Product Badge Start -->
                            <?php $subthumbnails = json_decode($product_detail["subthumbnails"], true) ?? []; ?>
                            <!-- Product Badge End -->
                            <div class="swiper-wrapper">
                                <?php 
                                foreach ($subthumbnails as $subthumb): ?>
                                    <div class="swiper-slide">
                                    <div class="swiper-slide image-zoom"><img src="<?= base_url($subthumb) ?>" width="600" height="700" alt="Image-HasTech"></div>
                                    </div>
                                <?php endforeach; ?>
                                
                            </div>
                            <div class="swiper-pagination d-none"></div>
                            <div class="swiper-button-prev d-none"></div>
                            <div class="swiper-button-next d-none"></div>
                        </div>
                        <!-- Product Image Slider End -->

                        <!-- Product Thumbnail Carousel Start -->
                        <div class="product-thumb-carousel swiper">
                            <div class="swiper-wrapper">
                                <?php 
                                foreach ($subthumbnails as $subthumb): ?>
                                    <div class="swiper-slide">
                                        <img src="<?= base_url($subthumb) ?>" alt="Image-HasTech">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-pagination d-none"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        <!-- Product Thumbnail Carousel End -->

                    </div>
                </div>
                <!-- Product Image End -->

                <!-- Product Content Start -->
                <div class="col mb-4">
                    <div class="single-product-content">
                        <h3 class="single-product-title"><?= $product_detail["name"] ?></h3>
                        <div class="single-product-price"><?= number_format($product_detail['sale_price'], 0, ',', '.') ?> VND <del><?= number_format($product_detail['price'], 0, ',', '.') ?> VND</del></div>
                        <ul class="single-product-meta">
                            <li><span class="label">Mã SP :</span> <span class="value"><?= $product_detail['sku'] ?></span></li>
                            <li><span class="label">Kích thước :</span> <span class="value"><?= $product_detail['size'] ?></span></li>
                            <li><span class="label">Độ dày :</span> <span class="value"><?= $product_detail['thickness'] ?></span></li>
                        </ul>
                        <div class="single-product-text">
                            <p><?= $product_detail["description"] ?></p>
                        </div>
                        
                        
                        <div class="single-product-buy-now">
                            <a href="#/" class="btn btn-buy-now">Mua sản phẩm</a>
                        </div>
                        
                    </div>
                </div>
                <!-- Product Content End -->

            </div>
            <!-- Single Product Top Area End -->

            <!-- Single Product Bottom (Description) Area Start -->
            <div class="single-product-description-area">            
                <div class="tab-content">
                    <!-- Description Start -->
                    <div class="tab-pane fade show active" id="product-description">
                        <div class="single-product-description">
                            <?= $product_detail["product_content"] ?>
                        </div>
                    </div>
                    <!-- Description End -->
                </div>
            </div>
            <!-- Single Product Bottom (Description) Area End -->
         <?php 
         }
         else echo "<div align='center'>".lang('App.no_products_found')."</div>";
          ?>
    </div>
</div>
<!--== End Product Detail Area Wrapper ==-->

<!--== Start Product Area Wrapper ==-->
<?php if(!empty($product_detail)) { ?>
    <div class="product-area section-bottom-space position-relative">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="title mb-0 mt-n2"><?= lang('App.other_products') ?></h2>
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
                                        <a class="product-item-thumb" href="shop-single-product.html">
                                            <img src="<?= base_url($product["thumbnail"]) ?>" width="268" height="313" alt="Image-HasTech">
                                        </a>
                                    </div>
                                    <div class="product-item-info">
                                        <h5 class="product-item-title"><a href="shop-single-product.html"><?= $product["name"] ?></a></h5>
                                        <div class="product-item-price"><span class="price-old"><?= number_format($product['price'], 0, ',', '.') ?> VND</span> 
                                            <?= number_format($product['sale_price'], 0, ',', '.') ?> VND</div>
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
<?php } ?>
<!--== End Product Area Wrapper ==-->