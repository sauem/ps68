<?php

?>
<div class="slider-area">
    <div class="slider_img">
        <?php
        query_posts([
            'post_type' => 'slider'
        ]);
        $k = 0;
        while (have_posts()) : the_post();
            ?>
            <img src="<?= resize_image(get_the_post_thumbnail_url(), [1520, 520]) ?>" alt="<?= get_the_title() ?>"
                 title="#caption<?= $k ?>">
            <?php
            $k++;
        endwhile;
        wp_reset_query();
        ?>
    </div>
    <?php
    query_posts([
        'post_type' => 'slider'
    ]);
    $k = 0;
    while (have_posts()) : the_post();
        ?>
        <div id="caption<?= $k?>" class="nivo-html-caption">
            <div class="slide_all_1">
                <h3 class="wow bounceInUp" data-wow-delay=".5s" data-wow-duration="1.1s"><?= get_the_excerpt() ?></h3>
                <h1 class=" wow bounceInUp" data-wow-delay=".3s" data-wow-duration=".9s"><?= get_the_title() ?></h1>
                <div class="slider-btn  wow bounceInUp" data-wow-delay=".7s" data-wow-duration="1.3s">
                    <a target="_blank" href="<?= get_post_meta(get_the_ID(), 'link', TRUE) ?>">Xem thêm</a>
                </div>
            </div>
        </div>
        <?php
        $k++;
    endwhile;
    wp_reset_query();
    ?>
</div>
