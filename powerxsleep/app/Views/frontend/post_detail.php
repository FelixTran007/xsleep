<!--== Start Blog Area Wrapper ==-->
<div class="blog-detail-area section-space">
    <div class="container">
        <?php if(!empty($post_detail)) { ?>
            <div class="blog-detail">
                <h2 class="blog-detail-title"><?= $post_detail["title"] ?></h2>
                <div class="blog-detail-meta post-item-meta">
                    <div class="post-item-date"><a href="blog.html"> <?= date('d-m-Y H:i', strtotime($post_detail["updated_at"])) ?></a></div>
                </div>
                <div style="padding-bottom: 15px;;">
                    <?= $post_detail["description"] ?>
                </div>
                <div>
                    <?= $post_detail["content"] ?>
                </div>
                
                <div class="blog-detail-tag-social mt-6" style="padding-top: 30px;">
                    <div class="blog-detail-tag">
                        
                    </div>
                    <div class="blog-detail-social">
                        <span>Share:</span>
                        <a class="blog-detail-social-item facebook-item" href="https://www.facebook.com/" target="_blank" rel="noopener"><i class="icon icon-social-facebook"></i></a>
                        <a class="blog-detail-social-item twitter-item" href="https://www.twitter.com/" target="_blank" rel="noopener"><i class="icon icon-social-twitter"></i></a>
                        <a class="blog-detail-social-item pinterest-item" href="https://www.pinterest.com/" target="_blank" rel="noopener"><i class="icon icon-social-pinterest"></i></a>
                    </div>
                </div>
                
            </div>
        <?php 
        } 
        else echo "<div align='center'>".lang('App.no_posts_found')."</div>";
        ?>
    </div>
</div>
<!--== End Blog Area Wrapper ==-->