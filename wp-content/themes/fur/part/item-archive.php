<?php
?>
<article
        class="box-shadow vertical-item content-padding post type-post status-publish format-standard has-post-thumbnail">
    <div class="item-media post-thumbnail">
        <img src="<?= get_the_post_thumbnail_url(get_the_ID(),'full')?>" alt="<?= get_the_title()?>">
        <div class="media-links">
            <a class="abs-link" title="" href="<?= get_the_permalink()?>"></a>
        </div>
    </div>
    <div class="item-content">
        <header class="entry-header">
            <div class="entry-meta">

                <span>
												<span class="screen-reader-text">Posted on</span>
												<a href="blog-single-right.html" rel="bookmark">
													<i class="fa fa-calendar"></i>
													<time class="entry-date published updated"
                                                          datetime="2019-04-23T15:15:12+00:00">
                                                    <?= get_the_date() ?>
                                                    </time>
												</a>
											</span>
                <span class="comments-link">
												<span class="screen-reader-text">Comments</span>
												<i class="fa fa-comment-o"></i>
												35 Comment
											</span>
            </div>
            <h3 class="entry-title">
                <a href="<?= get_the_permalink()?>" rel="bookmark">
                    <?= get_the_title() ?>
                </a>
            </h3>
        </header>
        <div class="entry-content">
            <?= get_the_excerpt() ?>
        </div>
    </div>
</article>
