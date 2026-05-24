<?php 
// 1. Fetch your ACF data at the top, including the repeater array
$title = get_field('section_title') ?: 'Frequently Asked Questions'; 
$faqs  = get_field('faqs') ?: []; // Grab the full repeater array!
?>

<div class="faq-wrap wp-block-acf-faq-accordion"
     data-section-title="<?php echo esc_attr($title); ?>"
     data-faqs='<?php echo esc_attr(wp_json_encode($faqs)); ?>'>
    
    <div class="common-wrap clear">
        <div class="faq-inner flex">
            
            <div class="faq-title common-title">
                <h2 class="split-heading justify-center"><?php echo esc_html($title); ?></h2>
            </div>
            
            <div class="faq-accordion-wrap flex">
                <?php 
                if( have_rows('faqs') ): 
                    $count = 0;
                    while( have_rows('faqs') ) : the_row(); 
                        $count++;
                ?>
                    <div class="faq-accordion-item <?php echo ($count === 1) ? 'active' : ''; ?> animate-from-bottom">
                        <div class="faq-accordion-item-title">
                            <h6><?php the_sub_field('question'); ?></h6>
                        </div>
                        <div class="faq-accordion-item-content">
                            <p><?php the_sub_field('answer'); ?></p>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
            
        </div>
    </div>
</div>