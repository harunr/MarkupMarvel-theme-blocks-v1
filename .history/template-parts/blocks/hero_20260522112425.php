<?php
/**
 * Hero Banner Block Template.
 * Path: template-parts/blocks/hero.php
 */

// 1. Fetch ALL your ACF data at the top
$heading     = get_field('hero_heading') ?: 'WE ARE WEBTRICKER.<br>A WEB DESIGN & DEVELOPMENT <span>AGENCY.</span>';
$subtext     = get_field('hero_subtext') ?: 'A small, effective & creative solution, that can help you to grow your business bigger.';
$primary_btn = get_field('hero_primary_button'); // This will be an ACF 'Link' field array
$second_btn  = get_field('hero_secondary_button'); // This will be an ACF 'Link' field array
?>

<div class="hero-wrap wp-block-acf-hero-banner"
     data-hero-heading="<?php echo esc_attr($heading); ?>"
     data-hero-subtext="<?php echo esc_attr($subtext); ?>"
     data-hero-primary-button='<?php echo esc_attr(wp_json_encode($primary_btn)); ?>'
     data-hero-secondary-button='<?php echo esc_attr(wp_json_encode($second_btn)); ?>'>
    
    <div class="common-pattern">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div class="common-wrap clear">
        <div class="hero-inner flex">
            <div class="hero-content-wrap">
                
                <h1 class="split-heading justify-center"><?php echo $heading; ?></h1>
                <p class="lead-text animate-from-bottom"><?php echo esc_html( $subtext ); ?></p>
                
                <div class="hero-btn animate-from-bottom flex">
                    <?php if( $primary_btn ): ?>
                        <a href="<?php echo esc_url( $primary_btn['url'] ); ?>" target="<?php echo esc_attr( $primary_btn['target'] ); ?>" class="btn">
                            <?php echo esc_html( $primary_btn['title'] ); ?>
                        </a>
                    <?php endif; ?>

                    <?php if( $second_btn ): ?>
                        <a href="<?php echo esc_url( $second_btn['url'] ); ?>" target="<?php echo esc_attr( $second_btn['target'] ); ?>" class="btn transparent">
                            <?php echo esc_html( $second_btn['title'] ); ?>
                        </a>
                    <?php endif; ?>
                </div>

            </div>      
        </div>
    </div>
</div>