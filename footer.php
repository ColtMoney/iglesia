
    <footer class="main-footer">
        <div class="footer-top">
            <div class="wrapper cf">
                <div class="footer-logo footer-inner">
                    <?php if(ale_get_option('footerlogo')) { ?>
                        <a href="<?php echo home_url('/'); ?>" class="logo-link"><img src="<?php echo ale_get_option('footerlogo'); ?>" alt=""></a>
                    <?php } ?>
                </div>
                <div class="footer-info footer-inner">
                   <h5><?php _e('Information', 'aletheme') ?></h5>
                    <?php
                    if ( has_nav_menu( 'footer_menu' ) ) {
                        wp_nav_menu(array(
                            'theme_location'=> 'footer_menu',
                            'menu'			=> 'Footer Menu',
                            'menu_class'	=> 'footermenu cf',
                            'walker'		=> new Aletheme_Nav_Walker(),
                            'container'		=> '',
                        ));
                    }
                    ?>
                </div>
                <div class="footer-contact footer-inner">
                    <h5><?php _e('Contacts', 'aletheme') ?></h5>
                    <?php if(ale_get_option('footer_phone')) { ?>
                        <div class="footer_phone"><?php echo ale_get_option('footer_phone'); ?></div>
                    <?php } ?>
                    <?php if(ale_get_option('footer_address')) { ?>
                        <div class="footer_address"><?php echo ale_get_option('footer_address'); ?></div>
                    <?php } ?>
                    <?php if(ale_get_option('footer_email')) { ?>
                        <a href="#" class="footer_email"><?php echo ale_get_option('footer_email'); ?></a>
                    <?php } ?>
                </div>
                <div class="footer-twitter footer-inner">
                    <?php get_sidebar('footer'); ?>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="wrapper cf">
                <div class="copyrights">
                    <?php if(ale_get_option("copyrights")): ?>
                        <?php echo ale_get_option("copyrights"); ?>
                    <?php else: ?>
                        <?php _e('© 2017  - All Rights Reserved “Iglesia”', 'aletheme'); ?>
                    <?php endif; ?>
                </div>
                <div class="footer-social">
                    <?php if(ale_get_option('yt')) { ?>
                        <a href="<?php echo ale_get_option('yt'); ?>">
                            <i class="fa fa-youtube" aria-hidden="true"></i>
                        </a>
                    <?php } ?>

                    <?php if(ale_get_option('insta')) { ?>
                        <a href="<?php echo ale_get_option('insta'); ?>">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    <?php } ?>

                    <?php if(ale_get_option('twi')) { ?>
                        <a href="<?php echo ale_get_option('twi'); ?>">
                            <i class="fa fa-twitter-square" aria-hidden="true"></i>
                        </a>
                    <?php } ?>

                    <?php if(ale_get_option('fb')) { ?>
                        <a href="<?php echo ale_get_option('fb'); ?>">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </footer>



    <!-- Scripts -->
    <?php wp_footer(); ?>
</body>
</html>