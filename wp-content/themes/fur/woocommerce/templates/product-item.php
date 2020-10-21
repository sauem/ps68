<?php
global $product;
$class = $args ? $args['class'] : null;
$item = $args ? $args['item'] : null;
?>

<div class="item <?= $class ?>">
    <div class="item-inner">
        <div class="prd">
            <div class="item-img clearfix">
                <a class="product-image have-additional"
                   href="<?= get_the_permalink() ?>"
                   title="<?= get_the_title()?>">
                       <span class="img-main">
                             <img alt="<?= get_the_title() ?>"
                                  src="<?= resize_image(get_the_post_thumbnail_url(), [800, 960]) ?>">
                       </span>
                </a>
            </div>
            <div class="item-info">
                <div class="info-inner">
                    <div class="item-title">
                        <a href="<?= get_the_permalink() ?>"
                           title="<?= get_the_title() ?>">
                            <?= get_the_title() ?>
                        </a>
                    </div>
                    <div class="item-price">
                        <div class="price-box">
                            <span class="regular-price">
                                 <?= get_price_html(null, $product) ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="action-bot <?=$item?>">
                <div class="wrap-addtocart">
                    <button class="btn-cart" title="Thêm giỏ hàng">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Thêm giỏ hàng</span>
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
