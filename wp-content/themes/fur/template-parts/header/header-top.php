<?php
?>
<div id="sns_header" class="wrap">
    <!-- Header Top -->

    <div id="sns_header_logo">
        <div class="container">
            <div class="container_in">
                <div class="row">
                    <h1 id="logo" class="responsv col-md-3">
                        <a href="<?= home_url() ?>" title="<?= get_bloginfo() ?>">
                            <img alt="" width="80" src="<?= get_logo() ?>">
                        </a>
                    </h1>
                    <div class="col-md-9 policy">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-phone-12">
                                <div class="policy_custom">
                                    <div class="policy-icon">
                                        <em class="fa fa-truck"> </em>
                                    </div>
                                    <p class="policy-titile">FREE DELIVERY WORLDWIDE</p>
                                    <p class="policy-ct">On order over $100</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-phone-12">
                                <div class="policy_custom">
                                    <div class="policy-icon">
                                        <em class="fa fa-cloud-upload"> </em>
                                    </div>
                                    <p class="policy-titile">UP TO 20% OFF COSY LAYERS</p>
                                    <p class="policy-ct">Lorem ipsum dolor sit amet</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-phone-12">
                                <div class="policy_custom">
                                    <div class="policy-icon">
                                        <em class="fa fa-gift"> </em>
                                    </div>
                                    <p class="policy-titile">Buy 1 get 1 free</p>
                                    <p class="policy-ct">On order over $100</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu -->
    <div id="sns_menu">
        <div class="container">
            <div class="sns_mainmenu">
                <div id="sns_mainnav">
                    <?php wp_is_mobile() ?
                        get_template_part('template-parts/menu/menu', 'mobile')
                        : get_template_part('template-parts/menu/menu', 'desktop')
                    ?>
                </div>
                <div class="sns_menu_right">
                    <div class="block_topsearch">
                        <div class="top-cart">
                            <div class="mycart mini-cart">
                                <div class="block-minicart">
                                    <div class="tongle">
                                        <i class="fa fa-shopping-cart"></i>
                                        <div class="summary">
                                                        <span class="amount">
                                                            <a href="<?= home_url()?>/gio-hang">
                                                                <span>Giỏ hàng (<?= WC()->cart->get_cart_contents_count();?>)</span>
                                                            </a>
                                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="icon-search"></span>
                        <div class="top-search">
                            <div class="sns-serachbox-pro">
                                <div class="sns-searbox-content">
                                    <form  method="get"
                                          action="s">
                                        <div class="form-search">
                                            <input class="input-text" type="text"
                                                   value="" name="q" placeholder="Search here...." size="30"
                                                   autocomplete="off">
                                            <button class="button form-button" title="Search" type="submit">Tìm kiếm
                                            </button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slideshow -->
    <?php is_home() ? get_template_part('part/slider') : "" ?>
</div>