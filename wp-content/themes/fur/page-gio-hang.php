<?php
get_header();
global $woocommerce;
$items = $woocommerce->cart->get_cart();
?>
<?php
get_template_part("template-parts/block/breadcrumb");
?>
    <div id="sns_content" class="wrap layout-m">
        <div class="container">
            <div class="row">
                <div class="shoppingcart">
                    <div class="sptitle col-md-12">
                        <h3>GIỎ HÀNG</h3>
                    </div>
                    <?php do_action('woocommerce_before_cart'); ?>
                    <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>">
                        <div class="content col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>SẢN PHẨM</th>
                                    <th>ĐƠN GIÁ</th>
                                    <th>SỐ LƯỢNG</th>
                                    <th>TỔNG TIỀN</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($items) {
                                    foreach ($items as $key => $item) {
                                        $_product = apply_filters('woocommerce_cart_item_product', $item['data'], $item, $key);
                                        $product_id = apply_filters('woocommerce_cart_item_product_id', $item['product_id'], $item, $key);
                                        if ($_product && $_product->exists() && $item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $item, $key)) {
                                            $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($item) : '', $item, $key);
                                        } ?>

                                        <tr>
                                            <td class="product-thumbnail" style="display: flex">
                                                <div>
                                                    <?php
                                                    $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image([100,100], ['class' => 'img-fluid']), $item, $key);

                                                    if (!$product_permalink) {
                                                        echo $thumbnail; // PHPCS: XSS ok.
                                                    } else {
                                                        printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
                                                    }
                                                    ?>
                                                </div>
                                                <div class="product-name">
                                                    <?php
                                                    if (!$product_permalink) {
                                                        echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $item, $key) . '&nbsp;');
                                                    } else {
                                                        echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $item, $key));
                                                    }

                                                    do_action('woocommerce_after_cart_item_name', $item, $key);

                                                    // Meta data.
                                                    echo wc_get_formatted_cart_item_data($item); // PHPCS: XSS ok.

                                                    // Backorder notification.
                                                    if ($_product->backorders_require_notification() && $_product->is_on_backorder($item['quantity'])) {
                                                        echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
                                                    }
                                                    ?>
                                                </div>
                                            </td>

                                            <td class="product-price">
                                                <?php
                                                echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $item, $key); // PHPCS: XSS ok.
                                                ?>
                                            </td>
                                            <td class="product-quantity">
                                                <?php
                                                if ($_product->is_sold_individually()) {
                                                    $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $key);
                                                } else {
                                                    $product_quantity = woocommerce_quantity_input(array(
                                                        'input_name' => "cart[{$key}][qty]",
                                                        'input_value' => $item['quantity'],
                                                        'max_value' => $_product->get_max_purchase_quantity(),
                                                        'min_value' => '0',
                                                        'product_name' => $_product->get_name(),
                                                        'classes' => apply_filters('woocommerce_quantity_input_classes', array('', 'text-center', 'input-text', 'qty', 'text'), $_product)
                                                    ), $_product, false);
                                                }

                                                echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $key, $item); // PHPCS: XSS ok.
                                                ?>
                                            </td>
                                            <td class="product-subtotal">
                                                <?php
                                                echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $item['quantity']), $item, $key); // PHPCS: XSS ok.
                                                ?>
                                            </td>
                                            <td class="product-remove">
                                                <?php
                                                // @codingStandardsIgnoreLine
                                                echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                                                    '<a href="%s" class="remove " aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fa fa-times"></i></a>',
                                                    esc_url(wc_get_cart_remove_url($key)),
                                                    __('Remove this item', 'woocommerce'),
                                                    esc_attr($product_id),
                                                    esc_attr($_product->get_sku())
                                                ), $key);
                                                ?>
                                            </td>
                                        </tr>

                                        <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='6'><h2>Giỏ hàng trống!</h2></td></tr>";
                                } ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-8"></div>
                                <div class="form-right col-md-4">
                                    <div class="form-bd">
                                        <h3>
                                            <span class="text3">THÀNH TIỀN:</span>
                                            <span class="text4">
                                                <?php wc_cart_totals_order_total_html(); ?>
                                            </span>
                                        </h3>
                                        <a href="<?= home_url()?>/thanh-toan"><span class="style-bd">Thanh đặt đơn hàng</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php do_action('woocommerce_cart_actions'); ?>
                        <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
