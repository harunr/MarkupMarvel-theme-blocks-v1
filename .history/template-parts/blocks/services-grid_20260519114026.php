<?php
/**
 * Block Name: Services Grid (Listing Page)
 * Path: template-parts/blocks/services-grid.php
 */
?>

<div class="our-services-wrap" style="padding-top: 0;"> <div class="common-wrap clear">
        <div class="our-services-inner flex">
            
            <div class="our-services-component-wrap flex">
                <?php 
                // Dynamic Query for up to 12 services
                $all_services = new WP_Query(array(
                    'post_type'      => 'services',
                    'posts_per_page' => get_field('posts_per_page') ?: 12,
                    'post_status'    => 'publish',
                    'orderby'        => 'menu_order date',
                    'order'          => 'DESC'
                ));

                if ( $all_services->have_posts() ) : 
                    while ( $all_services->have_posts() ) : $all_services->the_post(); 
                        
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
                                    <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
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
                else: 
                    echo '<p>New services coming soon.</p>';
                endif; 
                ?>
            </div>
            
        </div>
    </div>
</div>