<?php
?>
<div class="header-bottom-area ptb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-2 col-md-3">
                <div class="logo">
                    <a href="<?= home_url()?>"><img height="34" src="<?=get_logo()?>" alt="<?= get_bloginfo()?>" /></a>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 d-none d-lg-block">
                <div class="single-header-bottom-info">
                    <div class="header-bottom-icon">
                        <span class="lnr lnr-rocket"></span>
                    </div>
                    <div class="header-bottom-text">
                        <h3>Giao hàng toàn quốc</h3>
                        <p>Chính sách giao hàng hợp lý</p>
                    </div>
                </div>
                <div class="single-header-bottom-info">
                    <div class="header-bottom-icon">
                        <span class="lnr lnr-phone"></span>
                    </div>
                    <div class="header-bottom-text">
                        <h3>Hỗ trợ 24/7</h3>
                        <p>Chúng tôi hỗ trợ trực tuyến 24/7</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-9">
                <div class="header-bottom-right">
                    <div class="shop-cart">
                        <a href="<?= wc_get_cart_url()?>"><span class="lnr lnr-cart"></span>Giỏ hàng (<?= WC()->cart->get_cart_contents_count();?>)</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

