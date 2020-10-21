<?php
$term = get_term($args['term']);
?>
<div class="new-product-area pt-80 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2><?= $term->name ?></h2>
                    <p><?= $term->description ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product-carousel-active">
                <?php
                query_posts([
                    'post_type' => 'product',
                    'posts_per_page' => 8,
                    'tax_query' => [
                        'taxonomy' => 'product_cat',
                        'terms' => $term->term_id,
                        'field' => 'term_id'
                    ]
                ]);
                while (have_posts()) : the_post();
                    global $product;
                    ?>
                    <div class="col-lg-12">
                        <div class="single-new-product">
                            <div class="product-img">
                                <a href="<?= get_the_permalink() ?>">
                                    <img src="<?= resize_image(get_the_post_thumbnail_url(), [210, 262]) ?>"
                                         class="first_img" alt="<?= get_the_title() ?>"/>
                                </a>
                                <div class="new-product-action">
                                    <a href="<?= home_url() ?>/gio-hang?add-to-cart=<?= get_the_ID() ?>"><span
                                                class="lnr lnr-cart cart_pad"></span>Add to Cart</a>
                                </div>
                            </div>
                            <div class="product-content text-center">
                                <a href="<?= get_the_permalink() ?>"><h3><?= get_the_title() ?></h3></a>
                                <div class="product-price-star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h4>
                                    <?= $product->get_price_html()?>
                                </h4>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_query(); ?>
            </div>
        </div>

    </div>
</div>

