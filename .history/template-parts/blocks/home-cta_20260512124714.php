<?php
/**
 * Call To Action Block Template.
 * Path: template-parts/blocks/home-cta.php
 */

// 1. Try to pull from ACF Options Page first (Best for global blocks)
// 2. If empty, pull from current page
$title   = get_field('cta_title', 'option') ?: get_field('cta_title');
$cta_btn = get_field('cta_button', 'option') ?: get_field('cta_button');

// Fallback Title if both are empty
if (!$title) {
    $title = 'Have a project idea to collaborate with?';
}

// Fallback Link if both are empty (Adjust the URL to your contact page)
$default_url = home_url('/contact/');
?>

<div class="cta-wrap">
    <div class="common-wrap clear">
        <div class="cta-inner flex animate-from-bottom">
            
            <div class="common-pattern">
                <div></div><div></div><div></div><div></div><div></div><div></div>
            </div>
            
            <div class="cta-content">
                <h2 class="animate-from-bottom split-heading justify-center"><?php echo esc_html( $title ); ?></h2>
                
                <div class="cta-content-btn flex animate-from-bottom">
                    <?php if ( $cta_btn ) : ?>
                        <a href="<?php echo esc_url( $cta_btn['url'] ); ?>" target="<?php echo esc_attr( $cta_btn['target'] ); ?>" class="btn">
                            <?php echo esc_html( $cta_btn['title'] ); ?>
                        </a>
                    <?php else : ?>
                        <a href="<?php echo esc_url($default_url); ?>" class="btn">Contact Us</a>
                    <?php endif; ?>
                </div>
                
            </div>
            
        </div>
    </div>
</div>