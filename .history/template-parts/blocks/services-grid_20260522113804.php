<?php
/**
 * Block Name: Services Grid (Listing Page)
 * Path: template-parts/blocks/services-grid.php
 */

// 1. Fetch static ACF fields
$posts_per_page = get_field('posts_per_page') ?: 12;

// 2. Run the WP_Query and package the dynamic data into an array for Next.js
$services_data = [];
$all_services = new WP_Query(array(
    'post_type'      => 'services',
    'posts_per_page' => $posts_per_page,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order date',
    'order'          => 'DESC'
));

if ( $all_services->have_posts() ) {
    while ( $all_services->have_posts() ) {
        $all_services->the_post();
        
        $services_data[] = array(
            'title'   => get_the_title(),
            'link'    => get_permalink(),
            'excerpt' => wp_trim_words(get_the_excerpt(), 15, '...'),
            'icon'    => get_field('service_icon', get_the_ID())
        );
    }
    wp_reset_postdata();
}
?>

<div class="our-services-wrap wp-block-acf-services-grid" style="padding-top: 0;"
     data-posts-per-page="<?php echo esc_attr($posts_per_page); ?>"
     data-services='<?php echo esc_attr(wp_json_encode($services_data)); ?>'>
    
    <div class="common-wrap clear">
        <div class="our-services-inner flex">
            
            <div class="our-services-component-wrap flex">
                <?php if ( !empty($services_data) ) : ?>
                    <?php foreach ( $services_data as $service ) : ?>
                        <div class="our-services-component animate-from-bottom">
                            <div class="our-services-component-icon-wrap flex">
                                <div class="our-services-component-icon">
                                    <?php if ( !empty($service['icon']) ) : ?>
                                        <img src="<?php echo esc_url( $service['icon']['url'] ); ?>" alt="<?php echo esc_attr( $service['icon']['alt'] ); ?>">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="our-services-component-content">
                                <h5><?php echo esc_html( $service['title'] ); ?></h5>
                                
                                <p style="font-size: 14px; color: #666; margin: 10px 0 20px;">
                                    <?php echo esc_html( $service['excerpt'] ); ?>
                                </p>
                                
                                <div class="our-services-component-btn">
                                    <a href="<?php echo esc_url( $service['link'] ); ?>" class="arrow-btn">
                                        Services Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>New services coming soon.</p>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</div>