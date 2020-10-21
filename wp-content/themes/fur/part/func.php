<?php

function prinf($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die;
}


add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);
function special_nav_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active ';
    }
    $mega = get_post_meta($item->ID, 'mega_menu', TRUE);
    if ($mega) {
        $classes[] = 'has-children megamenu';
    }

    return $classes;
}

function get_logo()
{
    $custom_logo_id = get_theme_mod('custom_logo');
    $image = wp_get_attachment_image_src($custom_logo_id, 'full');
    echo $image[0];
}

function resize_image($url, $size = [])
{
    $media_url = str_replace(home_url('wp-content/uploads') . '/', '', $url);
    if (!isset($size[0]) || !isset($size[1])) {
        return home_url('wp-content/uploads/') . $media_url;
    }
    $img_url = home_url('wp-content/uploads/vthumb.php?src=' . $media_url . '&size=' . $size[0] . 'x' . $size[1] . '&zoom=1&q=90');
    return $img_url;
}

function getImageID($post, $size = "full")
{
    return get_the_post_thumbnail_url($post, $size);
}

function staticInfo($key, $img = false)
{
    if (!$img) {
        return get_post_meta(39, $key, TRUE);
    }
    return wp_get_attachment_image_url(get_post_meta(39, $key, TRUE), 'full');
}

function wp_get_menu_array($menu = 'head')
{

    $array_menu = wp_get_nav_menu_items($menu);
    if (!$array_menu) {
        return false;
    }
    $menu = array();
    foreach ($array_menu as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID'] = $m->ID;
            $menu[$m->ID]['title'] = $m->title;
            $menu[$m->ID]['url'] = $m->url;
            $menu[$m->ID]['children'] = array();
        }
    }
    $submenu = array();
    foreach ($array_menu as $m) {
        if ($m->menu_item_parent) {
            $submenu[$m->ID] = array();
            $submenu[$m->ID]['ID'] = $m->ID;
            $submenu[$m->ID]['title'] = $m->title;
            $submenu[$m->ID]['url'] = $m->url;
            $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
        }
    }
    return $menu;
}

function buildTree(array &$elements, $parentId = 0)
{
    $branch = array();
    foreach ($elements as &$element) {
        if ($element->menu_item_parent == $parentId) {
            $children = buildTree($elements, $element->ID);
            if ($children)
                $element->items = $children;
            $branch[$element->ID] = $element;
            unset($element);
        }
    }
    return $branch;
}

function getMenu($menu_id)
{
    $items = wp_get_nav_menu_items($menu_id);
    return $items ? buildTree($items, 0) : null;
}


add_action('after_setup_theme', 'setup_woocommerce_support');

function setup_woocommerce_support()
{
    add_theme_support('woocommerce');
}

function get_thumb()
{
    $img = get_the_post_thumbnail_url(get_the_ID(), "full");
    return $img ? $img : ASSET . '/img/default-image.png';
}

add_filter('woocommerce_get_price_html', 'get_price_html', 100, 2);

function get_price_html($price, $product)
{

    if ($product->price > 0) {
        if ($product->price && isset($product->regular_price)) {
            $from = $product->regular_price;
            $to = $product->price;
            return '<span class="price"><span class="price1">' . ((is_numeric($to)) ? wc_price($to) : $to) . ' </span><span class="price2"><del>' . ((is_numeric($from)) ? wc_price($from) : $from) . '</del></span></span>';
        } else {
            $to = $product->price;
            return '<span class="price"><span class="price1">' . ((is_numeric($to)) ? wc_price($to) : $to) . '</span></span>';
        }
    } else {
        return '<span class="price1"><a href="' . home_url('/lien-he') . '">Liên hệ</a></span>';
    }
}


function getPaginate($qr)
{
    $current_page = max(1, get_query_var('paged'));
    $pagin = paginate_links([
        'total' => $qr->max_num_pages,
        'type' => 'array',
        'prev_text' => '<i class="fa fa-angle-left"></i>',
        'next_text' => ' <span aria-hidden="true">&raquo;</span>',
        'current' => $current_page,
        'show_all' => true
    ]);
    $list = $pagin;
    $html = '';

    if ($qr->max_num_pages > 1) {
        $html .= '<div class="pagination-area mt-40 pt-40"><div class="bedroom-pagination"><nav aria-label="Page navigation">';
        if ($current_page > 1) {
            $html .= $list[0];
        }
        $html .= '<ul class="pagination">';

        if ($current_page == $qr->max_num_pages) {
            array_shift($pagin);
        } elseif ($current_page == 1) {
            array_pop($pagin);
        } else {
            array_pop($pagin);
            array_shift($pagin);
        }


        foreach ($pagin as $k => $p) {

            $link = new SimpleXMLElement($p);
            $checked = ($current_page == $k + 1) ? "active" : "";
            $html .= "<li class='" . $checked . "'>";
            $html .= $p;
            $html .= "</li>";
        }
        $html .= '</ul>';

        if ($current_page < $qr->max_num_pages) {
            //$html.= end($list);
        }
        $html .= '</nav></div></div>';
    }
    echo $html;
}


function ajax_get_thumbnail()
{
    global $wpdb;
    $table = 'wp_postmeta';
    $term = $_GET['term'];
    $product = $_GET['productId'];
    $sql = "SELECT `meta_key` FROM `wp_postmeta` WHERE `post_id` = $product AND `meta_value` = $term";
    $query = $wpdb->get_row($sql);
    $key = (int)filter_var($query->meta_key, FILTER_SANITIZE_NUMBER_INT);
    $thumbId = get_post_meta($product, "color_thumb_{$key}_thumbs", TRUE);
    $thumbs = [];
    if (!empty($thumbId)) {
        foreach ($thumbId as $id) {
            $thumbs[] = wp_get_attachment_image_src($id, 'full')[0];
        }
    }
    wp_send_json_success($thumbs);
    die();
}

add_action('wp_ajax_thumbnail', 'ajax_get_thumbnail');
add_action('wp_ajax_nopriv_thumbnail', 'ajax_get_thumbnail');


function ajax_create_order()
{
    global $woocommerce;
    if ($_POST) {
        $address = $_POST['customer'];
        $product = wc_get_product($_POST['product']);
        $qty = $_POST['qty'];
        $variable = $_POST['variants'];
        $order = wc_create_order();
        $order->add_product($product, $qty, $variable);
        $order->set_address($address, 'shipping');
        $order->set_address($address, 'billing');
        $order->calculate_totals();

        wp_send_json_success($order);
        die();
    }
}

add_action('wp_ajax_create_order', 'ajax_create_order');
add_action('wp_ajax_nopriv_create_order', 'ajax_create_order');
