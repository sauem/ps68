<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
    exit;
}

//do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
    echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
    return;
}


?>

<form name="checkout" method="post" class="checkout woocommerce-checkout"
      action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-6">
            <div class="checkbox-form">
                <h3>Chi tiết đặt hàng</h3>
                <?php if ($checkout->get_checkout_fields()) : ?>

                    <?php do_action('woocommerce_checkout_before_customer_details'); ?>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_address" class="text-black">Họ tên<span class="text-danger">*</span></label>
                            <input type="text" class="input-text form-control" name="billing_first_name"
                                   id="billing_first_name" placeholder="" autocomplete="given-name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_address" class="text-black">Địa chỉ<span class="text-danger">*</span></label>
                            <input type="text" class="input-text form-control" name="billing_address_1"
                                   id="billing_address_1" placeholder="Địa chỉ" autocomplete="address-line1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_address" class="text-black">Tỉnh thành<span
                                        class="text-danger">*</span></label>
                            <input type="text" class="input-text form-control" name="billing_city" id="billing_city"
                                   placeholder="" autocomplete="address-level2">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_address" class="text-black">Số điên thoại<span
                                        class="text-danger">*</span></label>
                            <input type="tel" class="input-text form-control" name="billing_phone" id="billing_phone"
                                   placeholder="" autocomplete="tel">

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_address" class="text-black">Email<span class="text-danger">*</span></label>
                            <input type="email" class="input-text form-control" name="billing_email" id="billing_email"
                                   placeholder="" autocomplete="email username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="c_order_notes" class="text-black">Ghi chú đơn hàng</label>
                        <textarea name="order_comments" rows="3" class="input-text form-control" id="order_comments"
                                  placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."
                                  rows="2" cols="5"></textarea>
                    </div>

                    <?php do_action('woocommerce_checkout_after_customer_details'); ?>

                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="your-order">
                <h3>Sản phẩm</h3>
                <div class="your-order-table table-responsive">
                    <?php do_action('woocommerce_checkout_order_review'); ?>
                </div>
                <div class="payment-method">
                    <?php do_action('woocommerce_checkout_after_order_review'); ?>
                </div>
            </div>
        </div>
    </div>
</form>
<?php do_action('woocommerce_after_checkout_form', $checkout); ?>
