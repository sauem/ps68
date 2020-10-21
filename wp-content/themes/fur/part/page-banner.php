<?php
?>
<div class="header_absolute ds cover-background s-overlay">
    <section class="page_title ds s-pt-115 s-pb-65 s-pb-lg-85 s-pt-lg-145 bg-auto page_title s-parallax s-overlay">
        <div class="container">
            <div class="row">

                <div class="col-md-12 text-center text-lg-left">
                    <h1 class="color-main"><?= is_single() ? get_the_title() : single_term_title() ?></h1>
                    <ol class="breadcrumb links-light">
                        <?php
                        if (function_exists('yoast_breadcrumb')) {
                            yoast_breadcrumb('<li class="breadcrumb-item">', '</li>');
                        }
                        ?>
                    </ol>

                </div>

            </div>
        </div>
    </section>
</div>