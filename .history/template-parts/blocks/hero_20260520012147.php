<?php
/**
 * Hero Banner Block Template.
 * Path: template-parts/blocks/hero.php
 */

// Create variables for our ACF fields. We add fallbacks so it doesn't break if empty.
$heading     = get_field('hero_heading') ?: 'WE ARE WEBTRICKER.<br>A WEB DESIGN & DEVELOPMENT <span>AGENCY.</span>';
$subtext     = get_field('hero_subtext') ?: 'A small, effective & creative solution, that can help you to grow your business bigger.';
$primary_btn = get_field('hero_primary_button'); // This will be an ACF 'Link' field array
$second_btn  = get_field('hero_secondary_button'); // This will be an ACF 'Link' field array
?>

<div class="hero-wrap">
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