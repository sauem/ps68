<?php
?>
<div id="sns_slideshows3">
    <div id="slishow_wrap12" class="sns-slideshow owl-carousel owl-theme owl-loaded">
        <?php
        query_posts([
            'post_type' => 'slider',
        ]);
        if (have_posts()) :while (have_posts()) : the_post();
        ?>
        <div class="item">
            <img src="<?= resize_image(get_the_post_thumbnail_url(get_the_ID(),'full'),[1520, 610])?>" alt="">
        </div>
        <?php endwhile; endif;
        wp_reset_query(); ?>
    </div>
</div>

