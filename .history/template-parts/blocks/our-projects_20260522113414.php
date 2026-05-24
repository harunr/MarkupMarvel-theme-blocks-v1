<?php
/**
 * Our Projects Block Template.
 * Path: template-parts/blocks/our-projects.php
 */

// 1. Fetch static ACF fields
$subtitle = get_field('projects_subtitle') ?: 'OUR PROJECTS';
$title    = get_field('projects_title') ?: 'Our latest awesome projects';
$cta_btn  = get_field('projects_cta_button');

// 2. Run the WP_Query and package the dynamic data into an array for Next.js
$projects_data = [];
$args = array(
    'post_type'      => 'work',
    'posts_per_page' => 6,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC'
);

$work_query = new WP_Query($args);

if ( $work_query->have_posts() ) {
    while ( $work_query->have_posts() ) {
        $work_query->the_post();
        
        // Handle excerpt fallback gracefully
        $excerpt = has_excerpt() ? get_the_excerpt() : get_the_content();

        $projects_data[] = array(
            'link'    => get_permalink(),
            'title'   => get_the_title(),
            'excerpt' => wp_trim_words($excerpt, 15),
            'thumb'   => get_the_post_thumbnail_url(get_the_ID(), 'large') ?: get_template_directory_uri() . '/assets/img/placeholder.jpg'
        );
    }
    wp_reset_postdata();
}
?>

<div class="our-project-wrap wp-block-acf-our-projects" style="padding: 80px 0;"
     data-subtitle="<?php echo esc_attr($subtitle); ?>"
     data-title="<?php echo esc_attr($title); ?>"
     data-cta-btn='<?php echo esc_attr(wp_json_encode($cta_btn)); ?>'
     data-projects='<?php echo esc_attr(wp_json_encode($projects_data)); ?>'>
    
    <div class="common-wrap clear">
        <div class="our-project-inner flex">
            
            <div class="common-title our-project-title animate-from-bottom" style="text-align: center; width: 100%; margin-bottom: 50px;">
                <h6 class="split-heading justify-center"><?php echo esc_html( $subtitle ); ?></h6>
                <h2 class="split-heading justify-center"><?php echo esc_html( $title ); ?></h2>
            </div>
            
            <div class="project-component-wrap flex">
                <?php if ( !empty($projects_data) ) : ?>
                    <?php foreach ( $projects_data as $project ) : ?>
                        <div class="project-component animate-from-bottom">
                            
                            <a href="<?php echo esc_url($project['link']); ?>" class="project-component-thumb">
                                <figure>
                                    <img src="<?php echo esc_url($project['thumb']); ?>" alt="<?php echo esc_attr($project['title']); ?>">
                                </figure>
                            </a>

                            <div class="project-component-content">
                                <h4 class="split-heading"><?php echo esc_html($project['title']); ?></h4>
                                <p class="small-text animate-from-bottom">
                                    <?php echo esc_html($project['excerpt']); ?>
                                </p>
                                
                                <div class="project-component-content-btn animate-from-bottom">
                                    <a href="<?php echo esc_url($project['link']); ?>" class="secondary-arrow-btn">
                                        See Detail Project
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No projects found. Publish some in the Works menu!</p>
                <?php endif; ?>
            </div>
            
            <?php if ( $cta_btn ) : ?>
                <div class="our-project-btn flex animate-from-bottom" style="width: 100%; justify-content: center; margin-top: 40px;">
                    <a href="<?php echo esc_url( $cta_btn['url'] ); ?>" target="<?php echo esc_attr( $cta_btn['target'] ); ?>" class="btn transparent">
                        <?php echo esc_html( $cta_btn['title'] ); ?>
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>