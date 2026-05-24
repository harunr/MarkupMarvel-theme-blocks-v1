<?php
// 1. Fetch ALL your ACF data at the top
$title   = get_field('title') ?: '';
$content = get_field('content') ?: '';
$image   = get_field('image');
$stats   = get_field('stats') ?: []; // Full repeater array
?>

<div class="career-information-wrap wp-block-acf-career-info"
     data-title="<?php echo esc_attr($title); ?>"
     data-content="<?php echo esc_attr($content); ?>"
     data-image='<?php echo esc_attr(wp_json_encode($image)); ?>'
     data-stats='<?php echo esc_attr(wp_json_encode($stats)); ?>'>
    
    <div class="common-wrap clear">
        <div class="career-information-inner flex">
            <div class="career-information-thumb animate-from-bottom">
                <figure>
                    <img src="<?php echo $image['url'] ?? get_template_directory_uri().'/assets/img/career/IMAGE.jpg'; ?>" alt="career">
                </figure>
            </div>
            <div class="career-information-container flex">
                <div class="career-information-item-wrap flex">
                    <?php if( have_rows('stats') ): while( have_rows('stats') ) : the_row(); ?>
                        <div class="career-information-item flex animate-from-bottom">
                            <div class="career-information-item-icon">
                                <img src="<?php echo get_sub_field('icon')['url']; ?>" alt="icon">
                            </div>
                            <div class="career-information-item-content">
                                <span><?php the_sub_field('number'); ?></span>
                                <em><?php the_sub_field('label'); ?></em>
                            </div>
                        </div>
                    <?php endwhile; endif; ?>
                </div>
                <div class="career-information-content animate-from-bottom">
                    <h2 class="split-heading"><?php echo esc_html($title); ?></h2>
                    <?php echo wp_kses_post($content); ?>
                </div>
            </div>
        </div>
    </div>
</div>