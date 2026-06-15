<?php
/**
 * Our Services Block Template (Dynamic).
 * Path: template-parts/blocks/our-services.php
 */

// 1. Fetch static ACF fields
$subtitle = get_field('services_subtitle') ?: 'OUR SERVICES';
$title    = get_field('services_title') ?: 'The services we provide for you';

// 2. Run the WP_Query and package the dynamic data into an array for Next.js
$services_data = [];
$homepage_services = new WP_Query(array(
    'post_type'      => 'services',
    'posts_per_page' => 4,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC'
));

if ( $homepage_services->have_posts() ) {
    while ( $homepage_services->have_posts() ) {
        $homepage_services->the_post();
        
        $raw_tags = get_field('service_tags', get_the_ID()) ?: '';
        $tags = array_filter(array_map('trim', explode(',', $raw_tags)));

        $services_data[] = array(
            'title'   => get_the_title(),
            'link'    => get_permalink(),
            'excerpt' => wp_trim_words(get_the_excerpt(), 12, '...'),
            'icon'    => get_field('service_icon', get_the_ID()),
            'tags'    => array_values($tags)
        );
    }
    wp_reset_postdata();
}
?>

<div class="our-services-wrap wp-block-acf-our-services"
     data-subtitle="<?php echo esc_attr($subtitle); ?>"
     data-title="<?php echo esc_attr($title); ?>"
     data-services='<?php echo esc_attr(wp_json_encode($services_data)); ?>'>
    
    <div class="common-wrap clear">
        <div class="our-services-inner flex">
            
            <div class="common-title our-services-title animate-from-bottom">
                <h6 class="split-heading justify-center"><?php echo esc_html( $subtitle ); ?></h6>
                <h2 class="split-heading justify-center"><?php echo esc_html( $title ); ?></h2>
            </div>
            
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
                    <p>No services found. Publish some in the Services menu!</p>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</div>