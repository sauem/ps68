<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

get_header();

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
    <div id="sns_content" class="wrap layout-m">
        <div class="container">
            <div class="row">
                <div id="sns_main" class="col-md-12 col-main">
                    <div id="sns_mainmidle">
                        <div id="header-slideshow">
                            <div class="row">
                                <?php
                                query_posts([
                                    'post_type' => 'banner',
                                    'posts_per_page' => 1,
                                    'orderby' => 'menu_order',
                                    'order' => 'ASC',
                                ]);
                                while (have_posts()) : the_post();
                                    ?>
                                    <div class="slideshows col-md-6 col-sm-8">
                                        <div id="slider123456">
                                            <div class="item style1 banner5">
                                                <a href="<?= get_post_meta(get_the_ID(),'link',TRUE)?>" class="banner22">
                                                    <img src="<?= resize_image(get_the_post_thumbnail_url(),[570,544]) ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_query(); ?>

                                <div class="banner-right col-md-6 col-sm-4">
                                        <?php query_posts([
                                            'post_type' => 'banner',
                                            'posts_per_page' => 1,
                                            'orderby' => 'menu_order',
                                            'order' => 'ASC',
                                            'offset' => 1,
                                        ]);
                                        while (have_posts()) : the_post();
                                        ?>
                                        <div class="banner6 banner5 dbn col-md-12 col-sm-6">
                                            <a href="<?= get_post_meta(get_the_ID(),'link',TRUE)?>" class="banner22">
                                                <img src="<?= resize_image(get_the_post_thumbnail_url(),[570,257]) ?>" alt="">
                                            </a>
                                        </div>
                                        <?php endwhile;
                                        wp_reset_query(); ?>
                                    <div class="banner6 pdno col-md-12 col-sm-12">
                                        <?php
                                        query_posts([
                                            'post_type' => 'banner',
                                            'posts_per_page' => 2,
                                            'offset' =>  2,
                                            'orderby' => 'menu_order',
                                            'order' => 'ASC',
                                        ]);
                                        while (have_posts()) : the_post();
                                            ?>
                                            <div class="banner7 banner6  banner5 col-md-6 col-sm-12">
                                                <a href="<?= get_post_meta(get_the_ID(),'link',TRUE)?>" class="banner22">
                                                    <img src="<?= resize_image(get_the_post_thumbnail_url(),[270,257]) ?>" alt="">
                                                </a>
                                            </div>
                                        <?php endwhile;
                                        wp_reset_query(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        query_posts([
                            'post_type' => 'product',
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'posts_per_page' => 24
                        ]);
                        if (have_posts()) :

                            ?>
                            <div class="products-upsell products-index index4">
                                <div class="title">
                                    <h3>SẢN PHẨM BÁN CHẠY</h3>
                                </div>
                                <div class="detai-products1">
                                    <div class="products-grid">
                                        <div id="product_index1" class="item-row owl-carousel owl-theme"
                                             style="display:inline-block;">
                                            <?php
                                            while (have_posts()) : the_post();

                                                ?>
                                                <?php get_template_part('woocommerce/templates/product', 'item') ?>
                                            <?php endwhile; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                        wp_reset_query(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- CONTENT_AFTER -->
    <div id="content_after" class="wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if ($category_show && !empty($category_show)) {
                        foreach ($category_show as $show) {
                            $term = get_term($show);
                            ?>
                            <div class="products-upsell products-index index4">
                                <div class="title">
                                    <h3><?= $term->name ?></h3>
                                </div>
                                <div class="detai-products1">
                                    <div class="products-grid">
                                        <div id="product_index2" class="item-row owl-carousel owl-theme"
                                             style="display: inline-block">
                                            <?php
                                            query_posts([
                                                'post_type' => 'product',
                                                'post_status' => 'public',
                                                'posts_per_page' => 24,
                                                'order' => 'DESC',
                                                'orderby' => 'date',
                                                'tax_query' => [
                                                    [
                                                        'taxonomy' => 'product_cat',
                                                        'field' => 'term_id',
                                                        'terms' => $term->term_id
                                                    ]
                                                ]
                                            ]);
                                            if (have_posts()) : while (have_posts()) : the_post();
                                                ?>
                                                <?php get_template_part('woocommerce/templates/product', 'item') ?>
                                            <?php endwhile; endif;
                                            wp_reset_query(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>

<!--                    <div class="sns-latestblog">-->
<!--                        <div class="row">-->
<!--                            <div class="col-md-12">-->
<!--                                <div class="block-title">-->
<!--                                    <h3>BÀI VIẾT MỚI</h3>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div id="latestblog132" class="latestblog-content owl-carousel owl-theme"-->
<!--                                 style="display: inline-block">-->
<!--                                --><?php
//                                query_posts([
//                                    'post_type' => 'post',
//                                    'orderby' => 'date',
//                                    'order' => 'DESC',
//                                    'posts_per_page' => 12
//                                ])
//                                ?>
<!--                                <div class="item">-->
<!--                                    <div class="banner5">-->
<!--                                        <a href="--><?//= get_the_permalink() ?><!--" class="banner22">-->
<!--                                            <img src="--><?//= resize_image(get_the_post_thumbnail_url(), [370, 235]) ?><!--"-->
<!--                                                 alt="--><?//= get_the_title() ?><!--">-->
<!--                                        </a>-->
<!--                                    </div>-->
<!--                                    <div class="blog-page">-->
<!--                                        <div class="blog-left">-->
<!--                                            <p class="text1">--><?//= get_the_date('d') ?><!--</p>-->
<!--                                            <p class="text2">--><?//= get_the_date('m/Y') ?><!--</p>-->
<!--                                        </div>-->
<!---->
<!--                                        <div class="blog-right">-->
<!--                                            <p class="style2">--><?//= get_the_title() ?><!--</p>-->
<!--                                            <p class="style3">-->
<!--                                                --><?//= wp_trim_words(get_the_excerpt(), 15) ?>
<!--                                            </p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                --><?php //?>
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <!-- AND CONTENT_AFTER -->
<?php
get_footer();
