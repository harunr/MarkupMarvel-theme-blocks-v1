<?php
// 1. Fetch static ACF fields
$title    = get_field('title') ?: 'Open Positions';
$subtitle = get_field('subtitle') ?: '';

// 2. Run the WP_Query and package the dynamic CPT data into an array for Next.js
$positions = [];
$args = array(
    'post_type'      => 'careers',
    'posts_per_page' => -1,
    'post_status'    => 'publish'
);

$query = new WP_Query($args);
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $positions[] = array(
            'title'     => get_the_title(),
            'meta'      => get_field('job_meta', get_the_ID()),
            'permalink' => get_permalink()
        );
    }
    wp_reset_postdata();
}
?>

<div class="positions-wrap wp-block-acf-career-positions"
     data-title="<?php echo esc_attr($title); ?>"
     data-subtitle="<?php echo esc_attr($subtitle); ?>"
     data-positions='<?php echo esc_attr(wp_json_encode($positions)); ?>'>
    
    <div class="common-wrap clear">
        <div class="positions-inner flex">
            
            <div class="positions-title">
                <h2 class="split-heading"><?php echo esc_html($title); ?></h2>
                <?php if ($subtitle) : ?>
                    <p class="animate-from-bottom"><?php echo esc_html($subtitle); ?></p>
                <?php endif; ?>
            </div>
            
            <div class="positions-component-wrap flex">
                <?php if (!empty($positions)) : ?>
                    <?php foreach ($positions as $job) : ?>
                        <div class="positions-component flex animate-from-bottom">
                            <div class="positions-component-content">
                                <h4 class="split-heading"><?php echo esc_html($job['title']); ?></h4>
                                <?php if ($job['meta']) : ?>
                                    <p class="animate-from-bottom"><?php echo esc_html($job['meta']); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="positions-component-btn animate-from-bottom">
                                <a href="<?php echo esc_url($job['permalink']); ?>" class="btn transparent">Apply</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>Currently, there are no open positions. Please check back later!</p>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</div>