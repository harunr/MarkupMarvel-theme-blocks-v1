<?php
$subtitle     = get_field('testimonial_subtitle') ?: 'Client feedback';
$title        = get_field('testimonial_title') ?: 'What clients say after working with MarkupMarvel';
$description  = get_field('testimonial_description') ?: '';
$testimonials_raw = get_field('testimonials_list') ?: [];

$testimonials = [];
foreach ($testimonials_raw as $row) {
    $raw_pills = $row['endorsement_pills'] ?? '';
    $pills = array_values(array_filter(array_map('trim', explode(',', $raw_pills))));
    $testimonials[] = [
        'testimonial_text'  => $row['testimonial_text'] ?? '',
        'review_highlight'  => $row['review_highlight'] ?? '',
        'author_name'       => $row['author_name'] ?? '',
        'author_position'   => $row['author_position'] ?? '',
        'author_image'      => $row['author_image'] ?? null,
        'platform'          => $row['platform'] ?? 'upwork',
        'endorsement_pills' => $pills,
        'avatar_initials'   => $row['avatar_initials'] ?? '',
        'top_rated'         => !empty($row['top_rated']),
        'project_type'      => $row['project_type'] ?? '',
    ];
}
?>

<div class="testimonial-wrap wp-block-acf-testimonials"
     data-subtitle="<?php echo esc_attr($subtitle); ?>"
     data-title="<?php echo esc_attr($title); ?>"
     data-description="<?php echo esc_attr($description); ?>"
     data-testimonials='<?php echo esc_attr(wp_json_encode($testimonials)); ?>'>

    <div class="common-wrap clear">
        <div class="testimonial-inner">
            <div class="common-title testimonial-title animate-from-bottom">
                <h6 class="split-heading justify-center"><?php echo esc_html($subtitle); ?></h6>
                <h2 class="split-heading justify-center"><?php echo esc_html($title); ?></h2>
            </div>
        </div>
    </div>
</div>
