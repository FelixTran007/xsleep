<!--== Start Hero Area Wrapper ==-->
<div class="hero-slider-area position-relative">
    <div class="swiper hero-slider-container">
        <div class="swiper-wrapper">
            <?php foreach ($banners as $banner): ?>
                <div class="swiper-slide hero-slide-item" data-bg-img="/assets/images/slider/slider1-bg1.png">
                    <div class="container h-100">
                        <div class="row align-items-center position-relative h-100">
                            <div class="col-lg-6 col-md-7 col-sm-12 col-12">
                                <div class="hero-slide-content">
                                    <h3 class="hero-slide-sub-title"><?= $banner['color_text'] ?></h3>
                                    <h1 class="hero-slide-title"<?= $banner['big_text'] ?></h1>
                                    <div><?= $banner['description_text'] ?></div>
                                    <div class="btn-wrp d-flex align-items-center justify-content-center justify-content-md-start">
                                        <a class="btn btn-secondary" href="<?= $banner['xem_them_link'] ?>"> <?= $banner['xem_them_text'] ?> <i class="icon icofont-cart-alt"></i></a>
                                        <div class="btn-play-wrp ms-4 ms-lg-8"><a class="btn-play ht-popup-video" data-fancybox data-type="iframe" href="<?= $banner['video_link'] ?>"> <i class="icon icofont-play"></i></a> <?= $banner['video_text'] ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-5 col-sm-12 col-12">
                                <div class="hero-slide-thumb">
                                    <img src="<?= base_url().$banner['image_path'] ?>" width="570" height="474" alt="Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>            
        </div>
        <!--== Add Pagination ==-->
        <div class="hero-slide-one-pagination"></div>
        <!--== Start Swiper Navigation ==-->
        <div class="swiper-button-prev swiper-button-two"></div>
        <div class="swiper-button-next swiper-button-two"></div>
    </div>
</div>
<!--== End Hero Area Wrapper ==-->
