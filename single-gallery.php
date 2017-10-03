<?php get_header(); ?>

    <div class="container single-gallery">
        <div class="wrapper">
            <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="inner-wrapper">
                    <h2 class="page-title"><?php the_title(); ?></h2>
                    <div class="excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    <div class="post-info">
                        <div class="post-author">
                            <i class="fa fa-user" aria-hidden="true"></i> <?php echo the_author_posts_link(); ?>
                        </div>
                        <div class="post-data">
                            <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_date(); ?>
                        </div>
                    </div>

                </div>

                <div id="slider" class="flexslider portfolioslider">
                    <ul class="slides">
                        <?php $args = array(
                            'post_type' => 'attachment',
                            'numberposts' => -1,
                            'post_status' => null,
                            'order'				=> 'ASC',
                            'orderby'			=> 'menu_order ID',
                            'meta_query'		=> array(
                                array(
                                    'key'		=> '_ale_hide_from_gallery',
                                    'value'		=> 0,
                                    'type'		=> 'DECIMAL',
                                ),
                            ),
                            'post_parent' => $post->ID
                        );
                        $attachments = get_posts( $args );
                        if ( $attachments ) {
                            foreach ( $attachments as $attachment ) { ?>
                                <li>
                                    <?php echo wp_get_attachment_image( $attachment->ID, 'large' ); ?>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                </div>

                <div class="post-content">
                    <div class="inner-wrapper">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endwhile; endif; ?>
            <?php comments_template(); ?>
        </div>
    </div>



<?php get_footer(); ?>