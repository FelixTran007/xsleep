<!--== Start Product Area Wrapper ==-->
<div class="product-area section-space">
    <div class="container">
        <!--== Start Product Top Bar Area Wrapper ==-->
        <div class="shop-top-bar">
        <h3><?= lang('App.search_result') ?> "<?= esc($keyword) ?>"</h3>
            

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
                                </div>
                                <div class="product-item-info">
                                    <h5 class="product-item-title"><a href="<?= route_to('product_detail_'.$locale, $product['slug']) ?>"><?= $product["name"] ?></a></h5>
                                    <p class="product-two-item-desc"><?= $product["short_description"] ?></p>
                                    <div class="product-item-price"><span class="price-old"><?= number_format($product['price'], 0, ',', '.') ?> VND</span> <?= number_format($product['sale_price'], 0, ',', '.') ?> VND</div>
                                </div>
                            </div>
                            <!--== End Product Item ==-->
                        </div>
                    <?php endforeach; ?>


                    <?php foreach ($posts as $post): ?>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <!--== Start Blog Item ==-->
                        <div class="post-item">
                            <a href="<?= route_to('post_detail_'.$locale, $post['slug']) ?>" class="post-item-thumb">
                                <img class="w-100" src="<?= base_url($post["thumbnail"]) ?>" width="348" height="232" alt="Image-HasTech">
                            </a>
                            <div class="post-item-content">
                                <h3 class="post-item-title"><a href="<?= route_to('post_detail_'.$locale, $post['slug']) ?>"><?= $post["title"] ?></a></h3>
                                <div class="post-item-meta">
                                    <div class="post-item-date"><a href="#"> <?= date('d-m-Y H:i', strtotime($post["updated_at"])) ?></a></div>
                                </div>
                                <p class="post-item-desc"><?= $post["description"] ?></p>
                                <a class="btn btn-gray-border" href="<?= route_to('post_detail_'.$locale, $post['slug']) ?>">Xem thêm</a>
                            </div>
                        </div>
                        <!--== End Blog Item ==-->
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>




            
        </div>
    </div>
</div>
<!--== End Product Area Wrapper ==-->

