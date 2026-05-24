<?php
$title = get_field('clients_title') ?: 'Our satisfied clients';
$logos = get_field('client_logos'); // This will return an array of images from the Gallery field
?>
<div class="clients-wrap">
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