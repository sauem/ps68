<?php

query_posts([
    'post_type' => 'post',
    'cat' => 1,
    'posts_per_page' => 12,
    'sort' => 'DESC',
    'sortby' => 'date'
]);
if (have_posts()) :
    ?>
    <div class="blog-area pb-80 dotted-style3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2>BLOG</h2>
                        <p>Các tips vệ sinh đồ nội thất nhà bạn</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog-carousel-active">
                    <?php
                    while (have_posts()) :
                        the_post();
                        ?>
                        <div class="col-lg-12">
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="<?= get_the_permalink()?>">
                                        <img src="<?= resize_image(get_the_post_thumbnail_url(),[370,280])?>" alt="<?= get_the_title()?>"/>
                                    </a>
                                </div>
                                <div class="blog-info">
                                    <a href="<?= get_the_permalink()?>"><h2><?= get_the_title()?></h2></a>
                                    <p><?= wp_trim_words(get_the_excerpt(),20,'...')?></p>
                                    <a href="<?= get_the_permalink()?>">Đọc tiếp <span class="lnr lnr-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>

                    <?php
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
endif;
wp_reset_query();
?>