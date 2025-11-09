


    <div class="col-lg-6">
        <div class="single-product-slider">
            <div class="single-product-thumb">
                <div class="swiper single-product-quick-view-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="thumb-item">
                                <img src="<?= $product_detail['thumbnail'] ?>"alt="Image-HasTech" style="height: 100%">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="thumb-item">
                                <img src="assets/images/shop/details/single-product-2.jpg" alt="Image-HasTech">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="thumb-item">
                                <img src="assets/images/shop/details/single-product-3.jpg" alt="Image-HasTech">
                            </div>
                        </div>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="single-product-content">
            <h3 class="single-product-title"><?= $product_detail["name"] ?></h3>
            <div class="single-product-price">
                <?php $sale_price = number_format($product_detail['sale_price'], 0, ',', '.'); 
                if($sale_price) {
                    echo number_format($product_detail['sale_price'], 0, ',', '.').' VND';
                    echo "<del>".number_format($product_detail['price'], 0, ',', '.').' VND</del>';
                }
                else
                    echo number_format($product_detail['price'], 0, ',', '.').' VND'; ?>
            </div>
            <ul class="single-product-meta">
                <li><span class="label">SKU :</span> <span class="value">1110</span></li>
                <li><span class="label">Vendor :</span> <span class="value">Vendor 3</span></li>
                <li><span class="label">Type :</span> <span class="value">Type 3</span></li>
                <li><span class="label">Availability :</span> <span class="value">11 Left in Stock</span></li>
            </ul>
            <ul class="single-product-variations">
                <li><span class="label">Size :</span>
                    <div class="value">
                        <div class="single-product-variation-size-wrap">
                            <div class="single-product-variation-size-item"><input type="radio" name="size" id="size-sq" checked><label for="size-sq">s</label></div>
                            <div class="single-product-variation-size-item"><input type="radio" name="size" id="size-mq"><label for="size-mq">m</label></div>
                            <div class="single-product-variation-size-item"><input type="radio" name="size" id="size-lq"><label for="size-lq">l</label></div>
                            <div class="single-product-variation-size-item"><input type="radio" name="size" id="size-xlq"><label for="size-xlq">xl</label></div>
                        </div>
                    </div>
                </li>
                <li><span class="label">Color :</span>
                    <div class="value">
                        <div class="single-product-variation-color-wrap">
                            <div class="single-product-variation-color-item"><input type="radio" name="color" id="qcolor-purple" checked><label for="qcolor-purple" style="background-color: purple;">purple</label></div>
                            <div class="single-product-variation-color-item"><input type="radio" name="color" id="qcolor-violet"><label for="qcolor-violet" style="background-color: violet;">violet</label></div>
                            <div class="single-product-variation-color-item"><input type="radio" name="color" id="qcolor-black"><label for="qcolor-black" style="background-color: black;">black</label></div>
                            <div class="single-product-variation-color-item"><input type="radio" name="color" id="qcolor-pink"><label for="qcolor-pink" style="background-color: pink;">pink</label></div>
                            <div class="single-product-variation-color-item"><input type="radio" name="color" id="qcolor-orange"><label for="qcolor-orange" style="background-color: orange;">orange</label></div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
