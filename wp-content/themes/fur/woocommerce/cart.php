<?php
get_header();?>
<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <?php do_action( 'woocommerce_before_cart' );?>
            <form class="woocommerce-cart-form col-md-12" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                <div class="site-blocks-table">
                    <?php do_action( 'woocommerce_before_cart_table' ); ?>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="product-thumbnail">Ảnh sản phẩm</th>
                            <th class="product-name">Tên sản phẩm</th>
                            <th class="product-price">Giá</th>
                            <th class="product-quantity">Số lượng</th>
                            <th class="product-total">Tổng cộng</th>
                            <th class="product-remove">Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                            $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                            $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                ?>
                                <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">



                                    <td class="product-thumbnail">
                                        <?php
                                        $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image('100%',['class'=>'img-fluid']), $cart_item, $cart_item_key );

                                        if ( ! $product_permalink ) {
                                            echo $thumbnail; // PHPCS: XSS ok.
                                        } else {
                                            printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                                        }
                                        ?>
                                    </td>

                                    <td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                                        <?php
                                        if ( ! $product_permalink ) {
                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                        } else {
                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                        }

                                        do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                                        // Meta data.
                                        echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

                                        // Backorder notification.
                                        if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                                        }
                                        ?>
                                    </td>

                                    <td class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
                                        <?php
                                        echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                        ?>
                                    </td>

                                    <td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                                        <?php
                                        if ( $_product->is_sold_individually() ) {
                                            $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                        } else {
                                            $product_quantity = woocommerce_quantity_input( array(
                                                'input_name'   => "cart[{$cart_item_key}][qty]",
                                                'input_value'  => $cart_item['quantity'],
                                                'max_value'    => $_product->get_max_purchase_quantity(),
                                                'min_value'    => '0',
                                                'product_name' => $_product->get_name(),
                                                'classes' => apply_filters( 'woocommerce_quantity_input_classes', array( 'form-control','text-center','input-text', 'qty', 'text' ), $_product )
                                            ), $_product, false );
                                        }

                                        echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                                        ?>
                                    </td>

                                    <td class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
                                        <?php
                                        echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                        ?>
                                    </td>
                                    <td class="product-remove">
                                        <?php
                                        // @codingStandardsIgnoreLine
                                        echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                            '<a href="%s" class="remove btn btn-primary btn-sm" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                            __( 'Remove this item', 'woocommerce' ),
                                            esc_attr( $product_id ),
                                            esc_attr( $_product->get_sku() )
                                        ), $cart_item_key );
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

        </div>





        <div class="row">

            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <button type="submit" class="button btn btn-primary btn-sm btn-block" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

                    </div>
                </div>
                <div class="row">

                    <?php if ( wc_coupons_enabled() ) { ?>
                        <div class="col-md-12">
                            <label class="text-black h4" for="coupon">Mã giảm giá</label>
                            <p>Nhập mã giảm giá (nếu có)</p>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0">
                            <input name="coupon_code" id="coupon_code" type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" name="apply_coupon" class="btn btn-primary btn-sm" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>">Áp dụng</button>
                        </div>
                        <?php do_action( 'woocommerce_cart_coupon' ); ?>
                    <?php } ?>


                </div>
            </div>
            <?php do_action( 'woocommerce_cart_actions' ); ?>
            <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>

            </form>


            <div class="col-md-6 pl-5 cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

                <div class="row justify-content-end shop_table">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">TỔNG THANH TOÁN</h3>
                            </div>
                        </div>
                        <div class="row mb-3 cart-subtotal">
                            <div class="col-md-6">
                                <span class="text-black"><?php _e( 'Subtotal', 'woocommerce' ); ?></span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black"><?php wc_cart_totals_subtotal_html(); ?></strong>
                            </div>
                        </div>


                        <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

                            <?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

                            <?php wc_cart_totals_shipping_html(); ?>

                            <?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

                        <?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>
                            <div class="row mb-3">
                                <div class="col-md-7">
                                    <span><?php _e( 'Shipping', 'woocommerce' ); ?></span>
                                </div>
                                <div class="col-md-5 text-right">
                                    <strong class="text-black" data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></strong>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                            <div class="row mb-3 cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                                <div class="col-md-7">
										<span class="text-black">
												<b><?php wc_cart_totals_coupon_label( $coupon ); ?></b>
										</span>
                                </div>
                                <div class="col-md-5 text-right">
                                    <strong class="text-black"><?php wc_cart_totals_coupon_html( $coupon ); ?></strong>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>
                        <div class="row mb-5 order-total">
                            <div class="col-md-6">
                                <span class="text-black"><?php _e( 'Total', 'woocommerce' ); ?></span>
                            </div>
                            <div class="col-md-6 text-right ">
                                <strong class="text-black"><?php wc_cart_totals_order_total_html(); ?></strong>
                            </div>
                        </div>
                        <?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='<?=home_url('thanh-toan')?>'">Tiến hành thanh toán</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php do_action( 'woocommerce_after_cart_totals' ); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>
