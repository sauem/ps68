<?php
get_header();
?>
    <div id="sns_content" class="wrap layout-lm">
        <div class="container">
            <div class="row">
                <!-- sns_left -->
                <?php get_template_part('part/archive-aside') ?>
                <!-- sns_left -->


                <div id="sns_main" class="col-md-9 col-main">
                    <div id="sns_mainmidle">
                        <div class="page-title">
                            <h1>Cửa hàng</h1>
                        </div>

                        <div class="category-products">
                            <!-- sns-products-container -->
                            <div class="sns-products-container clearfix">
                                <div class="products-grid row style_grid">
                                    <?php
                                    while (have_posts()) : the_post();
                                        global $product;
                                        ?>
                                        <?php get_template_part('woocommerce/templates/product', 'item', [
                                            'class' => 'col-phone col-md-3 col-12',
                                            'item' => 'size-sm'
                                        ]) ?>
                                    <?php endwhile; ?>


                                </div>
                            </div>
                            <!-- sns-products-container -->


                            <!-- toolbar clearfix  bottom-->

                            <div class="toolbar clearfix">
                                <div class="toolbar-inner">
                                    <div class="pager">
                                        <p class="amount">
                                            <span>1 to 20 </span>
                                            123 item (s)
                                        </p>
                                        <div class="pages">
                                            <strong>Pages:</strong>
                                            <ol>
                                                <li class="current">1</li>
                                                <li>
                                                    <a href="#">2</a>
                                                </li>
                                                <li>
                                                    <a href="#">3</a>
                                                </li>
                                                <li>
                                                    <a class="next i-next" title="Next" href="#"> Next </a>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- toolbar clearfix bottom -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();