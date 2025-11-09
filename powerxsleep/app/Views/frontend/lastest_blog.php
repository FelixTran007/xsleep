<!--== Start Blog Area Wrapper ==-->
<div class="blog-area section-space">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="title mb-0 mt-n2"><?= lang('App.posts') ?></h2>
        </div>
        <div class="swiper-container-wrap swiper-button-style swiper-button-nav5">
            <div class="swiper post-items-slider">
                <div class="swiper-wrapper">
                    <?php foreach ($posts as $post): ?>
                    <div class="swiper-slide">
                        <!--== Start Blog Item ==-->
                        <div class="post-item">
                            <a href="<?= route_to('post_detail_'.$locale, $post['slug']) ?>" class="post-item-thumb">
                                <img class="w-100" src="<?= base_url($post["thumbnail"]) ?>" width="348" height="232" alt="Image-HasTech">
                            </a>
                            <div class="post-item-content">
                                <h3 class="post-item-title"><a href="<?= route_to('post_detail_'.$locale, $post['slug']) ?>"><?= $post["title"] ?></a></h3>                                
                                <p class="post-item-desc"><?= $post["description"] ?></p>
                                <a class="btn btn-gray-border" href="<?= route_to('post_detail_'.$locale, $post['slug']) ?>"><?= lang('App.see_more') ?></a>
                            </div>
                        </div>
                        <!--== End Blog Item ==-->
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!--== Start Swiper Navigation ==-->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</div>
<!--== End Blog Area Wrapper ==-->