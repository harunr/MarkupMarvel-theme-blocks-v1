<?php
// 1. Fetch your ACF data at the top, including the repeater array
$title    = get_field('title') ?: 'Perks and benefit';
$benefits = get_field('benefits') ?: []; // Grab the full repeater array!
?>

<div class="benefit-wrap wp-block-acf-career-benefits"
     data-title="<?php echo esc_attr($title); ?>"
     data-benefits='<?php echo esc_attr(wp_json_encode($benefits)); ?>'>
    
    <div class="common-wrap clear">
        <div class="benefit-inner flex">
            
            <div class="common-title benefit-title animate-from-bottom">
                <h2 class="split-heading justify-center"><?php echo esc_html( $title ); ?></h2>
            </div>
            
            <div class="benefit-component-wrap flex">
                <?php 
                if( have_rows('benefits') ): 
                    while( have_rows('benefits') ) : the_row(); 
                ?>
                        <div class="benefit-component animate-from-bottom">
                            <em></em> <h5><?php the_sub_field('benefit_name'); ?></h5>
                        </div>
                <?php 
                    endwhile; 
                endif; 
                ?>
            </div>
            
        </div>
    </div>
</div>