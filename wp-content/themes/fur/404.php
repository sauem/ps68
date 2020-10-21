<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

get_header(); ?>

    <section class="ds s-pt-145 s-pb-100 s-pt-lg-195 s-pb-lg-150 s-pt-xl-240 s-pb-xl-195 s-overlay error-404 not-found page_404 s-overlay error-404">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="img_404">
                        <img src="<?= ASSET?>/images/img404.png" alt="">
                    </div>
                    <div class="page-content">
                        <h5>Oops, Sorry We Can’t Find That Page!</h5>
                        <p class="buttons_404 ">
                            <a href="index.html" class="btn btn-small with-icon btn-maincolor back-page">Go Back</a>
                        </p>
                    </div>
                    <!-- .page-content -->
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
