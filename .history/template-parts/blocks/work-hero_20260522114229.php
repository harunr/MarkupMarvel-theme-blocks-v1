<?php
/**
 * Internal Page Hero Block Template.
 */

// 1. Fetch ALL your ACF data at the top
$title = get_field('hero_title') ?: 'See the various kinds of best projects we have completed';
$text  = get_field('hero_text') ?: '';
$btn   = get_field('hero_button'); // ACF Link field array
?>

<div class="hero-wrap wp-block-acf-internal-hero"
     data-hero-title="<?php echo esc_attr($title); ?>"
     data-hero-text="<?php echo esc_attr($text); ?>"
     data-hero-button='<?php echo esc_attr(wp_json_encode($btn)); ?>'>

    <div class="common-pattern">
        <div></div><div></div><div></div><div></div><div></div>
    </div>
    <div class="common-wrap clear">
        <div class="hero-inner flex">
            <div class="hero-content-wrap">
                <h1 class="split-heading justify-center"><?php echo esc_html( $title ); ?></h1>
                <?php if ( $text ) : ?>
                    <p class="animate-from-bottom"><?php echo esc_html( $text ); ?></p>
                <?php endif; ?>
                
                <?php if ( $btn ) : ?>
                    <div class="hero-btn flex animate-from-bottom">
                        <a href="<?php echo esc_url($btn['url']); ?>" target="<?php echo esc_attr($btn['target']); ?>" class="btn"><?php echo esc_html($btn['title']); ?></a>
                    </div>
                <?php endif; ?>
            </div>      
        </div>
    </div>
</div>