<?php
global $product;
$attachment_ids = $product->get_gallery_image_ids();

?>
<?php get_template_part("template-parts/block/breadcrumb") ?>
<div id="sns_content" class="wrap layout-m">
    <div class="container">
        <div class="row">
            <div id="sns_main" class="col-md-12 col-main">
                <div id="sns_mainmidle">
                    <div class="product-view sns-product-detail">
                        <div class="product-essential clearfix">
                            <div class="row ">
                                <div class="product-img-box col-md-6" id="resultImageColor">

                                    <div class="content-carousel">
                                        <div class="owl-carousel">
                                            <?php
                                            if ($attachment_ids) {
                                                foreach ($attachment_ids as $id) {
                                                    $src = wp_get_attachment_image_src($id, 'full')[0];
                                                    ?>
                                                    <div>
                                                        <img src="<?= $src ?>">
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div id="product_shop" class="product-shop col-md-6">
                                    <div class="item-inner product_list_style">
                                        <div class="item-info">
                                            <?php do_action('woocommerce_single_product_summary'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom row">
            <div class="2coloum-left">
                <?php get_template_part('part/aside-product') ?>
                <div id="sns_mainm" class="col-md-9">
                    <div id="sns_description" class="description">
                        <div class="sns_producttaps_wraps1">
                            <h3 class="detail-none">Description
                                <i class="fa fa-align-justify"></i>
                            </h3>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active style-detail"><a href="#home" aria-controls="home"
                                                                                       role="tab" data-toggle="tab">Chi
                                        tiết sản phẩm</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="style1">
                                        <?= get_the_content() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="products-upsell">
                        <div class="detai-products1">
                            <div class="title">
                                <h3>Sản phẩm bán chạy</h3>
                            </div>
                            <div class="products-grid">
                                <div id="related_upsell" class="item-row owl-carousel owl-theme"
                                     style="display: inline-block">
                                    <?php
                                    query_posts([
                                        'posts_per_page' => 24,
                                        'post_type' => 'product',
                                        'order' => 'DESC',
                                        'orderby' => 'date'
                                    ]);
                                    while (have_posts()) : the_post();
                                        ?>
                                        <?php get_template_part('woocommerce/templates/product', 'item') ?>
                                    <?php endwhile;
                                    wp_reset_query(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="products-related">
                        <div class="detai-products1">
                            <div class="title">
                                <h3>Cùng danh mục</h3>
                            </div>
                            <div class="products-grid">
                                <div id="related_upsell1" class="item-row owl-carousel owl-theme"
                                     style="display: inline-block">
                                    <?php
                                    query_posts([
                                        'posts_per_page' => 24,
                                        'post_type' => 'product',
                                        'order' => 'DESC',
                                        'orderby' => 'date'
                                    ]);
                                    while (have_posts()) : the_post();
                                        ?>
                                        <?php get_template_part('woocommerce/templates/product', 'item') ?>
                                    <?php endwhile;
                                    wp_reset_query(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
