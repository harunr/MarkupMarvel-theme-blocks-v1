<?php
/**
 * Our Services Block Template (Dynamic).
 * Path: template-parts/blocks/our-services.php
 */

$subtitle = get_field('services_subtitle') ?: 'OUR SERVICES';
$title    = get_field('services_title') ?: 'The services we provide for you';
?>

<div class="our-services-wrap">
    <div class="common-wrap clear">
        <div class="our-services-inner flex">
            
            <div class="common-title our-services-title animate-from-bottom">
                <h6 class="split-heading justify-center"><?php echo esc_html( $subtitle ); ?></h6>
                <h2 class="split-heading justify-center"><?php echo esc_html( $title ); ?></h2>
            </div>
            
            <div class="our-services-component-wrap flex">
                <?php 
                // Dynamic Query for the 4 latest services
                $homepage_services = new WP_Query(array(
                    'post_type'      => 'services',
                    'posts_per_page' => 4,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC'
                ));

                if ( $homepage_services->have_posts() ) : 
                    while ( $homepage_services->have_posts() ) : $homepage_services->the_post(); 
                        
                        // Pull the icon directly from the individual service post
                        $icon = get_field('service_icon', get_the_ID());
                ?>
                        <div class="our-services-component animate-from-bottom">
                            <div class="our-services-component-icon-wrap flex">
                                <div class="our-services-component-icon">
                                    <?php if ( $icon ) : ?>
                                        <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="our-services-component-content">
                                <h5><?php the_title(); ?></h5>
                                
                                <p style="font-size: 14px; color: #666; margin: 10px 0 20px;">
                                    <?php echo wp_trim_words(get_the_excerpt(), 12, '...'); ?>
                                </p>
                                
                                <div class="our-services-component-btn">
                                    <a href="<?php the_permalink(); ?>" class="arrow-btn">
                                        Services Details
                                    </a>
                                </div>
                            </div>
                        </div>
                <?php 
                    endwhile; 
                    wp_reset_postdata();
                endif; 
                ?>
            </div>
            
        </div>
    </div>
</div>