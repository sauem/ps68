<div class="sidebar-area">
    <div class="sideber-form">
        <form action="#">
            <input type="text" placeholder="Tìm bài viết..."/>
            <button><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="single-sidebar">
        <div class="sidebar-title">
            <h4>Bài viết nổi bật</h4>
        </div>
        <div class="sidebar-list">
            <ul>
                <?php
                query_posts([
                    'pots_type' => 'post',
                    'posts_per_page' => 6,
                    'sort' => 'DESC',
                    'sortby' => 'date',
                    'not__in' => [get_the_ID()]
                ]);
                while (have_posts()) : the_post();
                    echo "<li><a href='" . get_the_permalink() . "'>" . get_the_title() . "</a></li>";
                endwhile;
                ?>

        </div>
    </div>

</div>