<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.2
 */

?>
<?= get_template_part("template-parts/footer/footer", "menu") ?>

<?php wp_footer(); ?>

</div>
<script src="<?= ASSET ?>/js/jquery-1.9.1.min.js"></script>
<script src="<?= ASSET ?>/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= ASSET ?>/js/less.min.js"></script>
<script src="<?= ASSET ?>/js/owl-carousel/owl.carousel.min.js"></script>
<script src="<?= ASSET ?>/js/sns-extend.js"></script>
<script src="<?= ASSET ?>/js/handlebarjs.min.js"></script>
<script src="<?= ASSET ?>/js/custom.js"></script>

</body>
</html>
