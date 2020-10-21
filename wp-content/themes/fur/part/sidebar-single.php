<?php
$categories = get_categories([
    'taxonomy' => 'product_cat',
    'hide_empty' => true
]);

?>
<div id="sns_left" class="col-md-3">
    <div class="wrap-in">
        <div class="block block-blog-inner">
            <div class="block-content">
                <?php if ($categories && !empty($categories)) { ?>
                    <div class="menu-categories">
                        <div class="block-title">
                            <strong>Danh mục sản phẩm</strong>
                        </div>
                        <ul>
                            <?php foreach ($categories as $k => $category) {
                                ?>
                                <li><span><?= $k + 1 ?></span><a
                                            href="<?= get_term_link($category->term_id) ?>"><?= $category->name ?></a>
                                </li>
                                <?php
                            } ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="block block-latestblog-v3">
        <div class="block-title">
            <strong>Bài viết nổi bật</strong>
        </div>
        <div class="block-content">
            <div class="list-blog">
                <div class="item-post clearfix">
                    <?php
                    query_posts([
                        'post_type' => 'post',
                        'post_per_page' => 6,
                        'order' => 'DESC',
                        'orderby' => 'date'
                    ]);
                    while (have_posts()) : the_post();
                        ?>
                        <div class="item-child">
                            <div class="item-img">
                                <a class="post-img" title="<?= get_the_title() ?>" href="<?= get_the_permalink() ?>">
                                    <img src="<?= resize_image(get_the_post_thumbnail_url(), [60, 60]) ?>">
                                </a>
                            </div>
                            <div class="item-content">
                                <div class="post-title">
                                    <a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a>
                                </div>
                                <div class="date">
                                    <i class="fa fa-calendar-o"></i>
                                    <span class="day-month"><?= get_the_date('d,m, Y') ?></span>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>