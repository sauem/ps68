<?php
$ids = get_post_meta(get_the_ID(), 'related', TRUE);
$prev = get_previous_post();
$next = get_next_post();
?>
<nav class="navigation post-nav" role="navigation">
        <h2 class="screen-reader-text">Post navigation</h2>
        <div class="nav-links">
            <?php if ($prev) { ?>
                <div class="nav-previous cover-image s-overlay ds ms">
                    <div class="post-nav-image">
                        <img src="<?= getImageID($prev->ID) ?>" alt="<?= $prev->post_title ?>">
                    </div>

                    <div class="post-nav-text-wrap text-center text-md-left">
                        <span class="screen-reader-text">Bài trước</span>
                        <span aria-hidden="true" class="nav-subtitle">
												<i class="fa fa-angle-left"></i>
												Bài trước
											</span>

                        <h6 class="nav-title">
                            <?= $prev->post_title ?>
                        </h6>
                    </div>
                    <a href="<?= get_the_permalink($prev->ID) ?>" rel="prev"></a>
                </div>
            <?php } ?>

            <?php if ($next) { ?>
                <div class="nav-previous cover-image s-overlay ds ms">
                    <div class="post-nav-image">
                        <img src="<?= getImageID($next->ID) ?>" alt="<?= $next->post_title ?>">
                    </div>

                    <div class="post-nav-text-wrap text-center text-md-left">
                        <span class="screen-reader-text">Bài tiếp</span>
                        <span aria-hidden="true" class="nav-subtitle">
												<i class="fa fa-angle-left"></i>
												Bài tiếp
											</span>

                        <h6 class="nav-title">
                            <?= $next->post_title ?>
                        </h6>
                    </div>
                    <a href="<?= get_the_permalink($next->ID) ?>" rel="prev"></a>
                </div>
            <?php } ?>
        </div>
    </nav>