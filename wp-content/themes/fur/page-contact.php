<?php
/*
 * Template Name: Liên Hệ
 */
get_header();
?>
<?php get_template_part("template-parts/block/breadcrumb") ?>
<?php
get_template_part("template-parts/block/banner", null,[
    'title' => get_the_title()
]);
?>
<div class="contuct-form-area pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="<?= ASSET?>/img/blog/1.jpg"  class="img-fluid" >
            </div>
            <div class="col-lg-6">
                <div class="contuct-form_area">
                    <form id="contact-form" action="https://demo.hasthemes.com/grand-preview/grand/mail.php">
                        <div class="form-group contuct_f">
                            <label for="con_name">Name <span>*</span></label>
                            <input type="text" class="form-control" id="con_name" name="con_name" placeholder="Name">
                        </div>
                        <div class="form-group contuct_f">
                            <label for="con_email">Email <span>*</span></label>
                            <input type="email" class="form-control" id="con_email" name="con_email" placeholder="Email">
                        </div>
                        <div class="form-group contuct_f">
                            <label for="con_phone">Phone Number</label>
                            <input type="text" class="form-control" id="con_phone" name="con_phone" placeholder="Phone Number">
                        </div>
                        <div class="form-group contuct_f">
                            <label for="con_message">What is on your mind? <span>*</span></label>
                            <textarea class="form-control" id="con_message" name="con_message" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default contact-btn">Submit</button>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>
