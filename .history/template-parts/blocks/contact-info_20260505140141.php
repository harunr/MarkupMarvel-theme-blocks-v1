<?php
$logo  = get_field('info_logo');
$title = get_field('info_title') ?: 'Get in touch with us';
$desc  = get_field('info_description');
?>
<div class="get-in-touch-wrap">
    <div class="common-wrap clear">
        <div class="get-in-touch-inner flex">
            
            <div class="get-in-touch-thumb-wrap flex animate-from-bottom">
                <div class="common-pattern">
                    <div></div><div></div><div></div>
                </div>
                <div class="get-in-touch-logo animate-from-bottom">
                    <?php if($logo): ?>
                        <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/contact/wbt-logo.svg" alt="logo">
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="get-in-touch-content">
                <div class="get-in-touch-title">
                    <h2 class="split-heading"><?php echo esc_html($title); ?></h2>
                    <?php if($desc): ?>
                        <p class="animate-from-bottom"><?php echo esc_html($desc); ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="get-in-touch-item-wrap flex">
                    <?php 
                    if( have_rows('info_items') ): 
                        while( have_rows('info_items') ) : the_row(); 
                            $icon  = get_sub_field('icon');
                            $url   = get_sub_field('link_url');
                            $text  = get_sub_field('link_text');
                            $label = get_sub_field('label');
                    ?>
                            <div class="get-in-touch-item animate-from-bottom">
                                <div class="get-in-touch-item-icon">
                                    <a href="<?php echo esc_url($url); ?>">
                                        <?php if($icon): ?>
                                            <img src="<?php echo esc_url($icon['url']); ?>" alt="icon">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <a href="<?php echo esc_url($url); ?>"><?php echo esc_html($text); ?></a>
                                <span><?php echo esc_html($label); ?></span>
                            </div>
                    <?php 
                        endwhile; 
                    endif; 
                    ?>
                </div>
                
            </div>
            
        </div>
    </div>
</div>