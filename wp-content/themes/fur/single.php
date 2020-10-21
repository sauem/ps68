<?php
get_header();
global $product;
?>
<?php get_template_part("template-parts/block/breadcrumb") ?>

<div id="sns_content" class="wrap">
    <div class="container">
        <div class="row">
            <?php get_template_part('part/sidebar', 'single') ?>
            <div id="sns_main" class="col-md-9 col-main">
                <div id="sns_mainmidle">
                    <div class="blogs-page">
                        <div class="postWrapper v1" style="margin-top: 0">
                            <a class="post-img" href="#">
                                <img class="" width="100%" src="<?= get_the_post_thumbnail_url()?>" alt="">
                            </a>
                            <div class="post-title">
                                <h1><?= get_the_title()?></h1>
                            </div>
                            <div class="post-content">
                                <?= get_the_content()?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
