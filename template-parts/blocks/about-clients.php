<?php
// 1. Fetch your ACF data
$title = get_field('clients_title') ?: 'Our satisfied clients';
$logos = get_field('client_logos') ?: []; // Fallback to an empty array
?>

<div class="clients-wrap wp-block-acf-client-logos"
     data-section-title="<?php echo esc_attr($title); ?>"
     data-logos='<?php echo esc_attr(wp_json_encode($logos)); ?>'>
    
    <div class="common-wrap clear">
        <div class="clients-inner flex">
            
            <div class="clients-title animate-from-bottom">
                <h2 class="split-heading justify-center"><?php echo esc_html( $title ); ?></h2>
            </div>
            
            <div class="clients-item-wrap flex">
                <?php 
                if ( $logos ) : 
                    foreach( $logos as $logo ) : 
                ?>
                        <div class="clients-item animate-from-bottom">
                            <img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>">
                        </div>
                <?php 
                    endforeach; 
                endif; 
                ?>
            </div>
            
        </div>
    </div>
</div>