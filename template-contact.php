<?php 
/**
 * Template Name: Template Contact
 */
// send contact
if (isset($_POST['contact'])) {
	$error = ale_send_contact($_POST['contact']);
}
get_header();
?>


<div class="container contacts">
    <div class="wrapper">
        <h2 class="page-title"><?php the_title(); ?></h2>
        <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="page-content">
            <?php the_content(); ?>
        </div>
        <?php endwhile; endif; ?>

        <div class="contacts-data cf">
            <div class="third-part">
                <span class="label"><i class="fa fa-phone" aria-hidden="true"></i><?php echo ale_get_meta('phone_label'); ?></span>
                <span class="value phone-number"><?php echo ale_get_meta('phone_number') ?></span>
            </div>
            <div class="third-part">
                <span class="label"><i class="fa fa-globe" aria-hidden="true"></i><?php echo ale_get_meta('address_label'); ?></span>
                <span class="value"><?php echo ale_get_meta('address') ?></span>
            </div>
            <div class="third-part emailbox">
                <span class="label"><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo ale_get_meta('email_label'); ?></span>
                <span class="value"><a href="mailto:<?php echo ale_get_meta('email') ?>"><?php echo ale_get_meta('email') ?></a></span>
            </div>
        </div>

        <div class="contact-form">
            <div class="inner-pages-title">
                <h3 class="inner-title font_three"><?php echo _e('Contact form', 'aletheme') ?></h3>
            </div>
            <form method="post" action="<?php the_permalink();?>">
                <?php if (isset($_GET['success'])) : ?>
                    <p class="success"><?php _e('Thank you for your message!', 'aletheme')?></p>
                <?php endif; ?>
                <?php if (isset($error) && isset($error['msg'])) : ?>
                    <p class="error"><?php echo $error['msg']?></p>
                <?php endif; ?>
                <div class="item_line cf">
                    <div class="item_input">
                        <input name="contact[name]" type="text" placeholder="Your Name" value="<?php echo isset($_POST['contact']['name']) ? $_POST['contact']['name'] : ''?>" required="required" id="contact-form-name" />
                    </div>
                    <div class="item_input">
                        <input name="contact[phone]" type="text" placeholder="Phone" value="<?php echo isset($_POST['contact']['phone']) ? $_POST['contact']['phone'] : ''?>" required="required" id="contact-form-phone" />
                    </div>
                    <div class="item_input">
                        <input name="contact[email]" type="email" placeholder="Email" value="<?php echo isset($_POST['contact']['email']) ? $_POST['contact']['email'] : ''?>" required="required" id="contact-form-email" />
                    </div>
                </div>
                <div class="item_line">
                    <textarea name="contact[message]"  placeholder="Message..." id="contact-form-message" required="required"><?php echo isset($_POST['contact']['message']) ? $_POST['contact']['message'] : ''?></textarea>
                </div>
                <div class="item_line">
                    <input type="submit" class="submit" value="<?php _e('Send Message', 'aletheme')?>"/>
                </div>
                <?php wp_nonce_field() ?>
            </form>
        </div>
    </div>
    <div class="contact-map">
        <?php if(ale_get_meta('address')) { ?>
            <?php echo do_shortcode('[ale_map address="'.ale_get_meta('address').'" width="100%" height="475px"]'); ?>
        <?php } ?>
    </div>
</div>


<?php get_footer(); ?>