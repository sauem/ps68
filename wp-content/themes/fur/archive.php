<?php
get_header(); ?>
    <div class="post-list-wrapper-area ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <?php
                    while (have_posts()) : the_post(); ?>
                        <div class="single-post-list">
                            <div class="post-list-img">
                                <a href="<?= get_the_permalink()?>">
                                    <img alt="<?= get_the_title()?>" src="<?= get_thumb() ?>" />
                                </a>
                            </div>
                            <div class="post-list-info">
                                <a href="<?= get_the_permalink()?>"><h3><?= get_the_title()?></h3></a>
                                <p><?= get_the_excerpt()?></p>
                                <h4><?= get_the_date('F Y')?></h4>
                            </div>
                        </div>

                    <?php
                    endwhile;
                    ?>
                </div>
                <div class="col-md-3">
                   <?php get_template_part("part/sidebar",'archive');?>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
