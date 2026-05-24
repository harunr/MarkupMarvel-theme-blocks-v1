<?php
$title   = get_field('exist_title') ?: 'Why do we exist';
$content = get_field('exist_content');
$image   = get_field('exist_image');
?>
<div class="exist-wrap animate-from-bottom">
    <div class="common-wrap clear">
        <div class="exist-inner flex">
            
            <div class="exist-thumb animate-from-bottom">
                <figure>
                    <?php if ( $image ) : ?>
                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about/exist-thumb.jpg" alt="exist-thumb">
                    <?php endif; ?>
                </figure>
            </div>
            
            <div class="exist-content">
                <h2 class="animate-from-bottom split-heading"><?php echo esc_html( $title ); ?></h2>
                
                <?php if ( $content ) : ?>
                    <!-- Adding a wrapper to handle WYSIWYG content output cleanly -->
                    <div class="animate-from-bottom">
                        <?php echo wp_kses_post( $content ); ?>
                    </div>
                <?php endif; ?>
                
            </div>
            
        </div>
    </div>
</div>