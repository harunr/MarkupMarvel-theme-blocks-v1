<?php
// 1. Fetch ALL your ACF data at the top
$image      = get_field('counter_image');
$statistics = get_field('statistics') ?: []; // Grab the full repeater array for Next.js
?>

<div class="about-counter-wrap wp-block-acf-about-counter"
     data-counter-image='<?php echo esc_attr(wp_json_encode($image)); ?>'
     data-statistics='<?php echo esc_attr(wp_json_encode($statistics)); ?>'>
    
    <div class="common-wrap clear">
        <div class="about-counter-inner flex">
            
            <div class="about-counter-thumb animate-from-bottom">
                <figure>
                    <?php if ( $image ) : ?>
                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about/image-1.jpg" alt="about-thumb">
                    <?php endif; ?>
                </figure>
            </div>
            
            <div class="about-counter-item-wrap flex">
                <?php 
                // Check if the repeater field has rows of data for the WP Backend
                if( have_rows('statistics') ): 
                    while( have_rows('statistics') ) : the_row(); 
                        $number = get_sub_field('number');
                        $symbol = get_sub_field('symbol'); // e.g., '+', '%', or 'K'
                        $label  = get_sub_field('label');
                ?>
                        <div class="about-counter-item animate-from-bottom">
                            <span class="counter"><em><?php echo esc_html( $number ); ?></em><?php echo esc_html( $symbol ); ?></span>
                            <dfn><?php echo esc_html( $label ); ?></dfn>
                        </div>
                <?php 
                    endwhile; 
                endif; 
                ?>
            </div>
            
        </div>
    </div>
</div>