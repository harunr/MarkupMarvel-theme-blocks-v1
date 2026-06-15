<?php
/**
 * Home About Block Template.
 * Path: template-parts/blocks/home-about.php
 */

// 1. Fetch ALL your ACF data at the top
$subtitle     = get_field('about_subtitle') ?: 'ABOUT US';
$title        = get_field('about_title') ?: "Let's get to know us more";
$image        = get_field('about_image');
$content      = get_field('about_content') ?: '<p>Add your about text here in the WordPress dashboard.</p>';
$check_rows   = get_field('buyer_checks') ?: [];
$buyer_checks = array_map(fn($row) => [
    'question' => $row['check_question'] ?? '',
    'answer'   => $row['check_answer'] ?? '',
], (array) $check_rows);
?>

<div class="home-about-wrap wp-block-acf-home-about"
     data-about-subtitle="<?php echo esc_attr($subtitle); ?>"
     data-about-title="<?php echo esc_attr($title); ?>"
     data-about-content="<?php echo esc_attr($content); ?>"
     data-about-image='<?php echo esc_attr(wp_json_encode($image)); ?>'
     data-buyer-checks='<?php echo esc_attr(wp_json_encode($buyer_checks)); ?>'>
    
    <div class="common-wrap clear">
        <div class="home-about-inner flex">
            
            <div class="home-about-title-wrap flex">
                <div class="home-about-title animate-from-bottom">
                    <h6 class="split-heading"><?php echo esc_html( $subtitle ); ?></h6>
                    <h2 class="split-heading"><?php echo esc_html( $title ); ?></h2>
                    
                    <div class="home-about-title-thumb-wrap">
                        <div class="home-about-title-thumb animate-from-bottom">
                            <figure>
                                <?php if ( $image ) : ?>
                                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about-thumb.png" alt="About Webtricker">
                                <?php endif; ?>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="home-about-content-wrap flex">
                <div class="home-about-content animate-from-bottom">
                    <?php echo wp_kses_post( $content ); ?>
                </div>
                
                <div class="common-pattern home-about-pattern animate-from-bottom">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>

        </div>
    </div>
</div>