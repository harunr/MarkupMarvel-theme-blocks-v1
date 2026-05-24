<?php
// 1. Fetch your ACF data at the top
$title = get_field('hero_title') ?: 'Get to know us more and why we exist';
$text  = get_field('hero_text') ?: '';
?>

<div class="hero-wrap about-hero wp-block-acf-about-hero"
     data-hero-title="<?php echo esc_attr($title); ?>"
     data-hero-text="<?php echo esc_attr($text); ?>">
    
    <div class="common-pattern">
        <div></div><div></div><div></div><div></div><div></div>
    </div>
    <div class="common-wrap clear">
        <div class="hero-inner flex">
            <div class="hero-content-wrap flex">
                <div class="hero-title animate-from-bottom">
                    <h1 class="split-heading"><?php echo esc_html( $title ); ?></h1>
                </div>
                <?php if ( $text ) : ?>
                    <div class="hero-content animate-from-bottom">
                        <p><?php echo esc_html( $text ); ?></p>
                    </div>
                <?php endif; ?>
            </div>      
        </div>
    </div>
</div>