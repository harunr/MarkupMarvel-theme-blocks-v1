<?php
/**
 * Testimonials Block Template.
 * Path: template-parts/blocks/testimonials.php
 */

// 1. Fetch ALL your ACF data at the top
$subtitle     = get_field('testimonial_subtitle') ?: 'TESTIMONIAL';
$title        = get_field('testimonial_title') ?: 'What do they say about us?';
$testimonials = get_field('testimonials_list') ?: []; // Grab the full repeater array!
?>

<div class="testimonial-wrap wp-block-acf-testimonials"
     data-subtitle="<?php echo esc_attr($subtitle); ?>"
     data-title="<?php echo esc_attr($title); ?>"
     data-testimonials='<?php echo esc_attr(wp_json_encode($testimonials)); ?>'>
    
    <div class="common-wrap clear">
        <div class="testimonial-inner flex">
            
            <div class="testimonial-title-wrap">
                <div class="testimonial-title animate-from-bottom">
                    <h6 class="split-heading"><?php echo esc_html( $subtitle ); ?></h6>
                    <h2 class="split-heading"><?php echo esc_html( $title ); ?></h2>
                </div>
            </div>
            
            <div class="testimonial-component-wrap">
                <?php 
                // Start the Repeater Loop for the Gutenberg preview
                if ( have_rows('testimonials_list') ) : 
                    while ( have_rows('testimonials_list') ) : the_row(); 
                        
                        $text = get_sub_field('testimonial_text');
                        $image = get_sub_field('author_image');
                        $name = get_sub_field('author_name');
                        $position = get_sub_field('author_position');
                ?>
                        <div class="testimonial-component animate-from-bottom">
                            <div class="testimonial-component-content">
                                <p class="small-text"><?php echo esc_html( $text ); ?></p>
                            </div>
                            <div class="testimonial-component-author flex">
                                
                                <div class="testimonial-component-author-thumb">
                                    <figure>
                                        <?php if ( $image ) : ?>
                                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                                        <?php endif; ?>
                                    </figure>
                                </div>
                                
                                <div class="testimonial-component-author-content">
                                    <h6><?php echo esc_html( $name ); ?></h6>
                                    <em><?php echo esc_html( $position ); ?></em>
                                </div>
                                
                            </div>
                        </div>
                <?php 
                    endwhile; 
                endif; 
                ?>
            </div>
            
        </div>
    </div>
</div>