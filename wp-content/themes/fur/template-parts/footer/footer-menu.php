<?php

$footer = wp_get_menu_array('footer');

?>

<!--<div id="sns_partners" class="wrap">-->
<!--    <div class="container">-->
<!--        <div class="slider-wrap">-->
<!--            <div class="partners_slider_in">-->
<!--                <div id="partners_slider1" class="our_partners owl-carousel owl-theme owl-loaded"-->
<!--                     style="display: inline-block">-->
<!--                    --><?php
//                    query_posts([
//                        'post_type' => 'partner',
//                        'posts_per_page' => -1,
//                    ]);
//                    while (have_posts()) : the_post();
//                    ?>
<!--                    <div class="item">-->
<!--                        <a class="banner11" href="--><?//= get_post_meta(get_the_ID(), 'link', TRUE) ?><!--" target="_blank">-->
<!--                            <img alt="" src="--><?//= resize_image(get_the_post_thumbnail_url(), [173, 100]) ?><!--">-->
<!--                        </a>-->
<!--                    </div>-->
<!---->
<!--                    --><?php
//                    endwhile;wp_reset_query();
//                    ?>
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div id="sns_footer" class="footer_style vesion2 wrap">
    <div id="sns_footer_top" class="footer">
        <div class="container">
            <div class="container_in">
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12 column0">
                        <div class="contact_us">
                            <style>
                                #media_image-2 img{
                                    width: 150px;
                                }
                                .textwidget{
                                    margin-top: 15px;
                                }
                            </style>
                            <?php dynamic_sidebar('Cuối trang 1') ?>
                        </div>
                    </div>
                    <?php if($footer){
                    foreach ($footer as $menu){
                    ?>
                    <div class="col-phone-12 col-xs-6 col-sm-3 col-md-2 column column1">
                        <h6><a href="<?= $menu['url']?>"><?= $menu['title']?></a></h6>
                        <ul>
                            <?php
                            if($menu['children']){
                                foreach ($menu['children'] as $item){
                                    ?>
                                    <li><a href="<?= $item['url']?>"><?= $item['title']?></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                        <?php
                    }
                    } ?>
                    <div class="col-md-3 col-sm-12 col-xs-12 column2">
                        <?php dynamic_sidebar('Cuối trang 2') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="sns_footer_bottom" class="footer">
        <div class="container">
            <div class="row">
                <div class="bottom-pd1 col-sm-6">
                    <div class="sns-copyright">
                        © 2020 by code
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
