<?php
/**
 * Block Name: Work Grid (Listing Page)
 * Path: template-parts/blocks/work-grid.php
 */

// 1. Fetch Settings from Block Fields
$count      = get_field('posts_per_page') ?: -1; 
$order      = get_field('order') ?: 'DESC';
$exclude_id = get_field('exclude_project_id'); 

// 2. Run the WP_Query and package the dynamic data into an array for Next.js
$projects_data = [];
$args = array(
    'post_type'      => 'work',
    'posts_per_page' => $count,
    'orderby'        => ($order == 'rand') ? 'rand' : 'date',
    'order'          => $order,
    'post_status'    => 'publish',
    'post__not_in'   => $exclude_id ? array($exclude_id) : array()
);

$work_query = new WP_Query($args);

if ( $work_query->have_posts() ) {
    while ( $work_query->have_posts() ) {
        $work_query->the_post();
        
        $excerpt = has_excerpt() ? get_the_excerpt() : get_the_content();
        
        $projects_data[] = array(
            'id'      => get_the_ID(),
            'title'   => get_the_title(),
            'link'    => get_permalink(),
            'excerpt' => wp_trim_words($excerpt, 15),
            'thumb'   => get_the_post_thumbnail_url(get_the_ID(), 'large') ?: get_template_directory_uri() . '/assets/img/placeholder.jpg'
        );
    }
    wp_reset_postdata(); 
}
?>

<div class="our-project-wrap wp-block-acf-work-grid"
     data-posts-per-page="<?php echo esc_attr($count); ?>"
     data-order="<?php echo esc_attr($order); ?>"
     data-exclude-id="<?php echo esc_attr($exclude_id); ?>"
     data-projects='<?php echo esc_attr(wp_json_encode($projects_data)); ?>'>
     
    <div class="common-wrap clear">
        <div class="our-project-inner flex">
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
                                
                                <p class="small-text">
                                    <?php echo esc_html($project['excerpt']); ?>
                                </p>

                                <div class="project-component-content-btn">
                                    <a href="<?php echo esc_url($project['link']); ?>" class="secondary-arrow-btn">See Detail Project</a>
                                </div>
                            </div>
                            
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No projects found in the Works menu.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>