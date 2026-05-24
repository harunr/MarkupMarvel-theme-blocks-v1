<?php
// 1. Fetch ALL your ACF data at the top
$title = get_field('section_title') ?: 'What do they say about us';
$col_1 = get_field('col_1_testimonials') ?: [];
$col_2 = get_field('col_2_testimonials') ?: [];
$col_3 = get_field('col_3_testimonials') ?: [];
?>

<div class="pricing-about-wrap wp-block-acf-pricing-about"
     data-section-title="<?php echo esc_attr($title); ?>"
     data-col-1='<?php echo esc_attr(wp_json_encode($col_1)); ?>'
     data-col-2='<?php echo esc_attr(wp_json_encode($col_2)); ?>'
     data-col-3='<?php echo esc_attr(wp_json_encode($col_3)); ?>'>
    
    <div class="common-wrap clear">
        <div class="pricing-about-inner flex">
            
            <div class="pricing-about-title common-title">
                <h2 class="split-heading justify-center"><?php echo esc_html($title); ?></h2>
            </div>
            
            <div class="pricing-about-container flex">
                
                <div class="pricing-about-component-wrap pricing-about-component-first">
                    <?php if( have_rows('col_1_testimonials') ): 
                        while( have_rows('col_1_testimonials') ) : the_row(); ?>
                        <div class="testimonial-component">
                            <div class="testimonial-component-content">
                                <p class="small-text"><?php the_sub_field('text'); ?></p>
                            </div>
                            <div class="testimonial-component-author flex">
                                <div class="testimonial-component-author-thumb">
                                    <figure>
                                        <?php 
                                        $img = get_sub_field('author_image'); 
                                        if( $img ): 
                                            // Bulletproof check: is it an array, an ID, or a URL string?
                                            $img_url = is_array($img) ? $img['url'] : (is_numeric($img) ? wp_get_attachment_image_url($img, 'thumbnail') : $img);
                                            $img_alt = is_array($img) ? $img['alt'] : 'author';
                                        ?>
                                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                                        <?php else: ?>
                                            <div style="width: 50px; height: 50px; background: #ccc; border-radius: 50%;"></div>
                                        <?php endif; ?>
                                    </figure>
                                </div>
                                <div class="testimonial-component-author-content">
                                    <h6><?php the_sub_field('author_name'); ?></h6>
                                    <em><?php the_sub_field('author_position'); ?></em>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; endif; ?>
                </div>

                <div class="pricing-about-component-wrap pricing-about-component-second">
                    <?php if( have_rows('col_2_testimonials') ): 
                        while( have_rows('col_2_testimonials') ) : the_row(); ?>
                        <div class="testimonial-component">
                            <div class="testimonial-component-content">
                                <p class="small-text"><?php the_sub_field('text'); ?></p>
                            </div>
                            <div class="testimonial-component-author flex">
                                <div class="testimonial-component-author-thumb">
                                    <figure>
                                        <?php 
                                        $img = get_sub_field('author_image'); 
                                        if( $img ): 
                                            // Bulletproof check: is it an array, an ID, or a URL string?
                                            $img_url = is_array($img) ? $img['url'] : (is_numeric($img) ? wp_get_attachment_image_url($img, 'thumbnail') : $img);
                                            $img_alt = is_array($img) ? $img['alt'] : 'author';
                                        ?>
                                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                                        <?php else: ?>
                                            <div style="width: 50px; height: 50px; background: #ccc; border-radius: 50%;"></div>
                                        <?php endif; ?>
                                    </figure>
                                </div>
                                <div class="testimonial-component-author-content">
                                    <h6><?php the_sub_field('author_name'); ?></h6>
                                    <em><?php the_sub_field('author_position'); ?></em>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; endif; ?>
                </div>

                <div class="pricing-about-component-wrap pricing-about-component-third">
                    <?php if( have_rows('col_3_testimonials') ): 
                        while( have_rows('col_3_testimonials') ) : the_row(); ?>
                        <div class="testimonial-component">
                            <div class="testimonial-component-content">
                                <p class="small-text"><?php the_sub_field('text'); ?></p>
                            </div>
                            <div class="testimonial-component-author flex">
                                <div class="testimonial-component-author-thumb">
                                    <figure>
                                        <?php 
                                        $img = get_sub_field('author_image'); 
                                        if( $img ): 
                                            // Bulletproof check: is it an array, an ID, or a URL string?
                                            $img_url = is_array($img) ? $img['url'] : (is_numeric($img) ? wp_get_attachment_image_url($img, 'thumbnail') : $img);
                                            $img_alt = is_array($img) ? $img['alt'] : 'author';
                                        ?>
                                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                                        <?php else: ?>
                                            <div style="width: 50px; height: 50px; background: #ccc; border-radius: 50%;"></div>
                                        <?php endif; ?>
                                    </figure>
                                </div>
                                <div class="testimonial-component-author-content">
                                    <h6><?php the_sub_field('author_name'); ?></h6>
                                    <em><?php the_sub_field('author_position'); ?></em>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>