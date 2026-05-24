<?php
// 1. Fetch your ACF data at the top
$title = get_field('section_title') ?: 'Our satisfied clients';
$logos = get_field('logos') ?: []; // Fetch the gallery array
?>

<div class="satisfied-clients-wrap wp-block-acf-client-logos"
     data-section-title="<?php echo esc_attr($title); ?>"
     data-logos='<?php echo esc_attr(wp_json_encode($logos)); ?>'>
    
    <div class="common-wrap clear">
        <div class="satisfied-clients-inner flex">
            
            <div class="satisfied-clients-title common-title">
                <h2 class="split-heading justify-center"><?php echo esc_html($title); ?></h2>
            </div>
            
            <div class="satisfied-clients-item-wrap animate-from-bottom">
                <?php 
                if( $logos ): 
                    foreach( $logos as $logo ): ?>
                        <div class="satisfied-clients-item">
                            <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
                        </div>
                <?php endforeach; endif; ?>
            </div>
            
        </div>
    </div>
</div>