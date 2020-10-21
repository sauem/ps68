<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

global $product;
?>

<div class="actions">
    <div class="row">
        <div class="col-md-10">
            <h3 class="text-center">Thông tin đặt hàng</h3>
            <div class="form-group col-md-6">
                <input type="number" placeholder="Số điện thoại" name="phone" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <input type="text" placeholder="Họ tên" class="form-control" name="name">
            </div>
            <div class="form-group col-md-12">
                <textarea placeholder="Địa chỉ" class="form-control" name="address"></textarea>
            </div>
            <div class="col-md-12 text-center">
                <button id="addCard" type="button" class="btn-cart" title="Đặt hàng" data-id="qv_item_8">
                    Đặt hàng
                </button>
            </div>
        </div>
    </div>

    <?php do_action('woocommerce_after_add_to_cart_button'); ?>
    <input type="hidden" name="add-to-cart" value="<?php echo absint($product->get_id()); ?>"/>
    <input type="hidden" name="product_id" value="<?php echo absint($product->get_id()); ?>"/>
    <input type="hidden" name="variation_id" class="variation_id" value="0"/>
</div>