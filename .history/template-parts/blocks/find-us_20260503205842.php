<?php
/**
 * Find Us / Logos Block Template.
 * Path: template-parts/blocks/find-us.php
 */

$video_thumb = get_field('video_thumbnail');
?>

<div class="find-us-wrap">
    <div class="common-wrap clear">
        <div class="find-us-inner flex">
            
            <div class="find-us-thumb animate-from-bottom">
                <figure>
                    <?php if ( $video_thumb ) : ?>
                        <img src="<?php echo esc_url( $video_thumb['url'] ); ?>" alt="<?php echo esc_attr( $video_thumb['alt'] ); ?>">
                    <?php else : ?>
                        <!-- Fallback image so the design doesn't break if the client forgets to upload one -->
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/IMAGE.jpg" alt="Find Us">
                    <?php endif; ?>
                </figure>
                <div class="play-btn"></div>
            </div>

            <div class="find-us-item-wrap flex animate-from-bottom">
                <?php 
                // This starts the ACF Repeater Loop
                if ( have_rows('company_logos') ) : 
                    while ( have_rows('company_logos') ) : the_row(); 
                        $logo = get_sub_field('logo_image');
                        if ( $logo ) :
                ?>
                            <div class="find-us-item">
                                <img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>">
                            </div>
                <?php 
                        endif;
                    endwhile; 
                endif; 
                ?>
            </div>

        </div>
    </div>
</div>