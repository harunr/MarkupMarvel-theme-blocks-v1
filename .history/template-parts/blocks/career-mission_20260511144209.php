<div class="our-mission-wrap">
    <div class="common-wrap clear">
        <div class="our-mission-inner flex">
            <div class="our-mission-thumb animate-from-bottom">
                <figure>
                    <?php 
                    $image = get_field('mission_image'); 
                    if( $image ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/career/mission.jpg" alt="mission">
                    <?php endif; ?>
                </figure>
            </div>
            <div class="our-mission-content">
                <h6 class="split-heading "><?php the_field('small_title') ?: 'OUR MISSION'; ?></h6>
                <h2 class="split-heading"><?php the_field('main_heading') ?: 'How we reach our goal'; ?></h2>
                <div class="animate-from-bottom">
                    <?php the_field('mission_description'); ?>
                </div>
            </div>
        </div>
    </div>
</div>