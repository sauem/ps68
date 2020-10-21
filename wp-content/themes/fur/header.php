<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>

    <link rel="shortcut icon" href="<?= ASSET ?>/images/favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=Poppins:300,700' rel='stylesheet' type='text/css'>
    <!-- Style Sheet-->
    <link rel="stylesheet" type="text/css" href="<?= ASSET ?>/font/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?= ASSET ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= ASSET ?>/css/style.css">
    <link rel="stylesheet" href="<?= ASSET ?>/js/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="<?= ASSET ?>/js/owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="<?= ASSET ?>/css/custome.css?v=<?= time()?>">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body id="bd"
      class=" cms-index-index4 header-style4 prd-detail cms-simen-home-page-v2 default cmspage"
    <?php body_class(); ?>>
<div id="sns_wrapper">
    <?php get_template_part('template-parts/header/header','top')?>
    <?php wp_body_open(); ?>



