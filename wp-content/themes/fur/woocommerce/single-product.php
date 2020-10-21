<?php
get_header('shop');

global $product;

$product = new WC_product(get_the_ID());
$thumbs = $product->get_gallery_image_ids();
$terms = get_the_terms($product->ID, 'product_cat');
$terms = array_column($terms, 'term_id');


?>
<?php while (have_posts()) : ?>
    <?php the_post(); ?>

    <?php wc_get_template_part('content', 'single-product'); ?>

<?php endwhile; // end of the loop. ?>
<?php get_footer('shop'); ?>
<script id="template-image-color" type="text/x-handlebars-template">
    <div class="content-carousel">
        <div class="owl-carousel">
            {{#each this}}
            <div>
                <img src="{{this}}">
            </div>
            {{/each}}
        </div>
    </div>
</script>
<script>
    $(document).on("click", "#addCard", function (e) {
        let orderForm = $("#orderForm");
        let json = orderForm.serializeArray();

        let data = {
            action: 'create_order',
            customer: {
                first_name: null,
                phone: null,
                address_1: null
            },
            product: '<?= get_the_ID()?>',
            qty: json[2].value,
            variants: {
                variation_id: 0,
                variation: {
                    'pa_mau-sac': json[0].value,
                    'pa_size': json[1].value,
                    'pa_so-luong': json[2].value
                }
            }
        };
        let invalid = false;
        json.map(item => {
            if (item.name === 'pa_mau-sac') {
                if (!item.value) {
                    swal.fire('Thông báo!', 'Hãy chọn màu bạn thích!', 'info');
                    invalid = true;
                }
                data.variants.variation["pa_mau-sac"] = item.value;
            }
            if (item.name === 'pa_size') {
                if (!item.value) {
                    swal.fire('Thông báo!', 'Hãy chọn kích cỡ sản phẩm!', 'info');
                    invalid = true;
                }
                data.variants.variation["pa_size"] = item.value;

            }
            if (item.name === 'pa_so-luong') {
                if (!item.value) {
                    swal.fire('Thông báo!', 'Hãy chọn số lượng sản phẩm!', 'info');
                    invalid = true;
                }
                data.variants.variation["pa_so-luong"] = item.value;
            }
            if (item.name === 'phone') {
                if (item.value === "") {
                    swal.fire('Thông báo!', 'Hãy điền số điện thoại của bạn!', 'info');
                    invalid = true;
                }
                data.customer.phone = item.value;
            }
            if (item.name === 'name') {
                if (item.value === "") {
                    swal.fire('Thông báo!', 'Hãy điền tên của bạn!', 'info');
                    invalid = true;
                }
                data.customer.first_name = item.value;
            }
            if (item.name === 'address') {
                if (item.value === "") {
                    swal.fire('Thông báo!', 'Hãy điền địa chỉ giao hàng!', 'info');
                    invalid = true;
                }
                data.customer.address = item.value;
            }
        });
        if (invalid) {
            return false;
        }
        swal.fire({
            title: 'Đang xử lý yêu cầu...',
            icon: 'info',
            onBeforeOpen: () => {
                swal.showLoading();
                try {
                    $.ajax({
                        url: '<?= admin_url('admin-ajax.php')?>',
                        type: 'POST',
                        data: data,
                        success: function (res) {
                            swal.hideLoading();
                            if (res.success) {
                                swal.fire('Đặt hàng thành công!', 'Đội ngũ tư vấn của chúng tôi sẽ tư vấn cho bạn trong giây lát!', 'success').then(() => window.location.reload());
                            }
                        }
                    });
                } catch (e) {
                    swal.fire('Lỗi!', e.message, 'error');
                }
                ;
            }
        })

        return false;
    });
    $(document).on("click", ".pa_mau-sac", function () {
        let term_id = $(this).data('term');
        let productId = $(this).data('pid');
        $("#resultImageColor").html('<i style="font-size: 50px" class="fa fa-spin fa-spinner"></i>');
        getThumbs(term_id, productId).then(res => {
            const html = $("#template-image-color").html();
            let template = Handlebars.compile(html);
            $("#resultImageColor").html(template(res.data))
            singleProductInit();
        }).catch(error => {
            console.log(error);
        });
    });

    async function getThumbs(term_id, productId) {
        return $.ajax({
            url: '<?= admin_url('admin-ajax.php')?>',
            cache: false,
            data: {term: term_id, action: 'thumbnail', productId: productId},
            type: 'GET'
        });
    }

    function singleProductInit() {
        $("#resultImageColor .owl-carousel").owlCarousel({
            loop: true,
            items: 1,
            margin: 0,
            stagePadding: 0,
            autoplay: false
        });

        dotcount = 1;

        jQuery('.owl-dot').each(function () {
            jQuery(this).addClass('dotnumber' + dotcount);
            jQuery(this).attr('data-info', dotcount);
            dotcount = dotcount + 1;
        });

        slidecount = 1;

        jQuery('.owl-item').not('.cloned').each(function () {
            jQuery(this).addClass('slidenumber' + slidecount);
            slidecount = slidecount + 1;
        });

        jQuery('.owl-dot').each(function () {
            grab = jQuery(this).data('info');
            slidegrab = jQuery('.slidenumber' + grab + ' img').attr('src');
            jQuery(this).css("background-image", "url(" + slidegrab + ")");
            jQuery(this).css("background-position", "top");
            jQuery(this).css("background-size", "cover");
        });

        amount = $('.owl-dot').length;
        gotowidth = 100 / amount;
        jQuery('.owl-dot').css("height", "15%");
    }
</script>