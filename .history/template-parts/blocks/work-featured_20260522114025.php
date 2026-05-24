<?php
/**
 * Block Name: Work: Featured Item
 * Template: work-featured.php
 * Description: A reusable block to highlight a single portfolio project anywhere on the site.
 */

// 1. Fetch the Absolute Newest Project Dynamically (Default Fallback)
$latest_work_query = new WP_Query(array(
    'post_type'      => 'work',
    'posts_per_page' => 1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC'
));

$dynamic_title    = '';
$dynamic_text     = '';
$dynamic_url      = '#';
$dynamic_image_id = 0;

if ($latest_work_query->have_posts()) {
    $latest_work_query->the_post();
    $dynamic_title    = get_the_title();
    $dynamic_text     = wp_trim_words(get_the_excerpt(), 25);
    $dynamic_url      = get_the_permalink();
    $dynamic_image_id = get_post_thumbnail_id();
    wp_reset_postdata(); 
}

// 2. Fetch ACF Fields (Overrides - so you can pick specific projects in the editor)
$acf_image   = get_field('featured_image');
$acf_title   = get_field('featured_title');
$acf_text    = get_field('featured_text');
$manual_link = get_field('featured_link'); 

// 3. Final Variable Assignment (Priority Logic)
$title = $acf_title ?: $dynamic_title;
$text  = $acf_text ?: $dynamic_text;

if ($manual_link) {
    $url        = esc_url($manual_link['url']);
    $link_title = esc_html($manual_link['title']);
    $target     = esc_attr($manual_link['target'] ?: '_self');
} elseif ($dynamic_title) {
    $url        = esc_url($dynamic_url);
    $link_title = 'See Detail projects &longrightarrow;';
    $target     = '_self';
} else {
    $url        = '#';
    $link_title = 'See Detail projects &longrightarrow;';
    $target     = '_self';
}

// Image Priority Logic
if ($acf_image) {
    $final_image_url = esc_url($acf_image['url']);
    $final_image_alt = esc_attr($acf_image['alt'] ?: $title);
} elseif ($dynamic_image_id) {
    $final_image_url = esc_url(wp_get_attachment_image_url($dynamic_image_id, 'full'));
    $final_image_alt = esc_attr(get_post_meta($dynamic_image_id, '_wp_attachment_image_alt', true) ?: $title);
} else {
    $final_image_url = get_template_directory_uri() . '/assets/img/works/COVER.jpg';
    $final_image_alt = 'Featured Project';
}
?>

<div class="largest-work-wrap wp-block-acf-work-featured"
     data-title="<?php echo esc_attr($title); ?>"
     data-text="<?php echo esc_attr($text); ?>"
     data-url="<?php echo esc_attr($url); ?>"
     data-link-title="<?php echo esc_attr($link_title); ?>"
     data-link-target="<?php echo esc_attr($target); ?>"
     data-image-url="<?php echo esc_attr($final_image_url); ?>"
     data-image-alt="<?php echo esc_attr($final_image_alt); ?>">
    
    <div class="common-wrap clear">
        <div class="largest-work-inner flex">
            
            <div class="largest-work-component flex" style="align-items: center; justify-content: space-between; gap: 40px;">
                
                <div class="work-component-thumb animate-from-bottom" style="width: 50%;">
                    <figure style="margin: 0;">
                        <a href="<?php echo esc_url($url); ?>">
                            <img src="<?php echo esc_url($final_image_url); ?>" alt="<?php echo esc_attr($final_image_alt); ?>" style="width: 100%; height: auto; display: block; border-radius: 8px;">
                        </a>
                    </figure>
                </div>
                
                <div class="largest-work-component-content" style="width: 45%;">
                    <div class="work-component-content animate-from-bottom">
                        <h2 class="split-heading" style="color: #0b3b4e; font-size: 42px; line-height: 1.2; margin-bottom: 20px;">
                            <?php echo esc_html($title); ?>
                        </h2>
                        <p style="color: #666; font-size: 16px; line-height: 1.8; margin-bottom: 30px;">
                            <?php echo esc_html($text); ?>
                        </p>
                    </div>

                    <div class="project-component-content-btn animate-from-bottom">
                        <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" class="secondary-arrow-btn" style="color: #4a7e94; font-weight: 600; text-decoration: none;">
                            <?php echo wp_kses($link_title, array('longrightarrow' => array())); ?>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>