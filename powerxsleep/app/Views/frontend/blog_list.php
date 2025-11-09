<!--== Start Blog Area Wrapper ==-->
<div class="blog-detail-area section-space">
    <div class="container">
        <div class="row mb-n6">
            <?php foreach ($blog_list as $post): ?>
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
                        <a class="btn btn-gray-border" href="<?= route_to('post_detail_'.$locale, $post['slug']) ?>"><?= lang('App.see_more') ?></a>
                    </div>
                </div>
                <!--== End Blog Item ==-->
            </div>
            <?php endforeach; ?>
            
            
        </div>
    </div>
</div>
<!--== End Blog Area Wrapper ==-->