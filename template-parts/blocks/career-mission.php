<?php
// 1. Fetch ALL your ACF data at the top
$small_title         = get_field('small_title') ?: 'OUR MISSION';
$main_heading        = get_field('main_heading') ?: 'How we reach our goal';
$mission_description = get_field('mission_description') ?: '';
$mission_image       = get_field('mission_image'); 
?>

<div class="our-mission-wrap wp-block-acf-career-mission"
     data-small-title="<?php echo esc_attr($small_title); ?>"
     data-main-heading="<?php echo esc_attr($main_heading); ?>"
     data-description="<?php echo esc_attr($mission_description); ?>"
     data-image='<?php echo esc_attr(wp_json_encode($mission_image)); ?>'>
    
    <div class="common-wrap clear">
        <div class="our-mission-inner flex">
            
            <div class="our-mission-thumb animate-from-bottom">
                <figure>
                    <?php if( $mission_image ): ?>
                        <img src="<?php echo esc_url($mission_image['url']); ?>" alt="<?php echo esc_attr($mission_image['alt']); ?>">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/career/mission.jpg" alt="mission">
                    <?php endif; ?>
                </figure>
            </div>
            
            <div class="our-mission-content">
                <h6 class="split-heading "><?php echo esc_html($small_title); ?></h6>
                <h2 class="split-heading"><?php echo esc_html($main_heading); ?></h2>
                <div class="animate-from-bottom">
                    <?php echo wp_kses_post($mission_description); ?>
                </div>
            </div>
            
        </div>
    </div>
</div>