<!--== Start Hero Area Wrapper ==-->
<div class="hero-slider-area position-relative">
    <div class="swiper hero-slider-container">
        <div class="swiper-wrapper">
            <?php foreach ($banners as $banner): ?>
                <div class="swiper-slide hero-slide-item" data-bg-img="<?= base_url().$banner['image_path'] ?>">
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
