<?php

?>

<div class="header_absolute ds cover-background s-overlay">
    <!-- header with two Bootstrap columns - left for logo and right for navigation and includes ( phone ) -->
    <header class="page_header ds justify-nav-center">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="my-15 my-md-0 col-xl-2 col-md-4 col-11">
                    <a href="<?= home_url()?>" class="logo">
                        <img src="<?= get_logo()?>" alt="<?= get_option("blogname")?>">
                    </a>
                </div>
                <div class="col-xl-8 col-1 order-3 order-lg-2">
                    <div class="nav-wrap">
                        <?= wp_nav_menu([
                            'menu' => 'head',
                            'container' =>'nav',
                            'container_class' =>'top-nav',
                            'menu_class' => 'nav sf-menu'
                        ])?>
                    </div>
                </div>
                <div class="col-xl-2 col-5 order-2 order-lg-3 d-none d-md-block top-phone">
                    <a href="tel:1900.1098" class="fs-20 fw-500 d-flex align-items-center justify-content-xl-end links-light">
                        <i class="ico-phone color-main fs-37 mr-2"></i>
                        <span>1900.1098</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- header toggler -->
        <span class="toggle_menu"><span></span></span>
    </header>

</div>
