<?php
get_header(); ?>

<?php

get_template_part("template-parts/block/breadcrumb");
get_template_part("template-parts/block/banner", null, [
    'title' => get_the_title()
]);

?>
<div class="checkout-area pt-50 pb-50">
    <div class="container">
        <?= do_shortcode("[woocommerce_checkout]")?>
    </div>
</div>
<?php

// do_shortcode('[woocommerce_checkout]');
get_footer();
?>
