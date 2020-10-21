<?php

$categories = get_terms([
    'taxonomy' => 'product_cat',
    'hide_empty' => true,
]);
$category_show = [];
foreach ($categories as $category) {
    $is_home = get_term_meta($category->term_id, 'show_home', TRUE);
    if ($is_home) {
        $category_show[] = $category->term_id;
    }
}
?>
<div id="sns_left" class="col-md-3">
    <div class="bestsale">
        <div class="title">
            <h3>BÁN CHẠY</h3>
        </div>
        <div class="content">
            <div id="products_slider12" class="products-slider12 owl-carousel owl-theme" style="display: inline-block">
                <?php foreach ($category_show as $show) {
                    ?>
                    <div class="item-row">
                        <?php
                        query_posts([
                            'post_type' => 'product',
                            'posts_per_page' => 5,
                            'order' => 'DECS',
                            'orderby' => 'date',
                            'tax_query' => [
                                [
                                    'taxonomy' => 'product_cat',
                                    'terms' => $show,
                                    'field' => 'term_id'
                                ]
                            ]
                        ]);
                        while (have_posts()) : the_post();
                            global $product;
                            ?>
                            <div class="item">
                                <div class="item-inner">
                                    <div class="prd">
                                        <div class="item-img clearfix">
                                            <a class="product-image have-additional" href="<?= get_the_permalink() ?>"
                                               title="<?= get_the_title() ?>">
                                                                    <span class="img-main">
                                                                        <img alt=""
                                                                             src="<?= resize_image(get_the_post_thumbnail_url(), [90, 108]) ?>">
                                                                    </span>
                                            </a>
                                        </div>
                                        <div class="item-info">
                                            <div class="info-inner">
                                                <div class="item-title">
                                                    <a href="<?= get_the_permalink() ?>" title="<?= get_the_title() ?>">
                                                        <?= get_the_title() ?>
                                                    </a>
                                                </div>
                                                <div class="item-price">
                                                    <?php echo $product->get_price_html(); ?>
                                                </div>
                                            </div>
                                            <div class="action-bot">
                                                <div class="wrap-addtocart">
                                                    <button class="btn-cart" title="Thêm vào giỏ">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <span>Thêm vào giỏ</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_query();
                        ?>
                    </div>
                    <?php

                } ?>
            </div>
        </div>
    </div>

    <div class="block block-banner banner5">
        <?php
        query_posts([
            'post_type' => 'banner',
            'posts_per_page' => 2,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'meta_query' => [
                [
                    'key' => 'banner_position',
                    'value' => 'bottom_sidebar_single',
                    'compare' => '='
                ]
            ]
        ]);
        while (have_posts()) :the_post();
            ?>
            <a href="<?= get_post_meta(get_the_ID(), 'link', TRUE) ?>" class="banner22">
                <img src="<?= resize_image(get_the_post_thumbnail_url(), [270, 333]) ?>" alt="">
            </a>
        <?php endwhile;
        wp_reset_query(); ?>
    </div>
</div>