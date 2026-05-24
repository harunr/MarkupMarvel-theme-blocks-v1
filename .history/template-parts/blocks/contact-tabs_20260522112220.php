<?php
// 1. Fetch your ACF data at the top
// Tab 1 Fields
$t1_label = get_field('tab_1_label') ?: 'Contact us';
$t1_title = get_field('tab_1_title') ?: 'Say hello to us !';
$t1_desc  = get_field('tab_1_description') ?: '';
$t1_form  = get_field('tab_1_shortcode') ?: ''; 

// Tab 2 Fields
$t2_label = get_field('tab_2_label') ?: 'Work with us';
$t2_title = get_field('tab_2_title') ?: 'Trust your project to us';
$t2_desc  = get_field('tab_2_description') ?: '';
$t2_form  = get_field('tab_2_shortcode') ?: '';
?>

<div class="contact-wrap wp-block-acf-contact-tabs"
     data-t1-label="<?php echo esc_attr($t1_label); ?>"
     data-t1-title="<?php echo esc_attr($t1_title); ?>"
     data-t1-desc="<?php echo esc_attr($t1_desc); ?>"
     data-t1-form="<?php echo esc_attr($t1_form); ?>"
     data-t2-label="<?php echo esc_attr($t2_label); ?>"
     data-t2-title="<?php echo esc_attr($t2_title); ?>"
     data-t2-desc="<?php echo esc_attr($t2_desc); ?>"
     data-t2-form="<?php echo esc_attr($t2_form); ?>">
    
    <div class="common-wrap clear">
        <div class="contact-inner flex">
            <div class="contact-container flex">
                
                <div class="contact-tab-trigger flex animate-from-bottom">
                    <ul>
                        <li class="active"><a href="#contact-tab-item-1"><?php echo esc_html($t1_label); ?></a></li>
                        <li><a href="#contact-tab-item-2"><?php echo esc_html($t2_label); ?></a></li>
                    </ul>
                </div>
                
                <div class="contact-tab-item-wrap flex">
                    
                    <div class="contact-tab-item animate-from-bottom" id="contact-tab-item-1">
                        <div class="contact-title animate-from-bottom">
                            <h2 class="split-heading justify-center"><?php echo esc_html($t1_title); ?></h2>
                            <?php if($t1_desc): ?>
                                <p class="animate-from-bottom"><?php echo wp_kses_post($t1_desc); ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <?php if($t1_form): ?>
                            <div class="custom-form-wrapper animate-from-bottom">
                                <?php echo do_shortcode($t1_form); ?>
                            </div>
                        <?php else: ?>
                            <form action="#">
                                <div class="input-row-wrap flex">
                                    <div class="input-row flex">
                                        <div class="input-col animate-from-bottom"><input type="text" placeholder="First Name"></div>
                                        <div class="input-col animate-from-bottom"><input type="text" placeholder="Last Name"></div>
                                    </div>
                                    <div class="input-row flex">
                                        <div class="input-col animate-from-bottom"><input type="number" placeholder="Phone"></div>
                                        <div class="input-col animate-from-bottom"><input type="mail" placeholder="Email"></div>
                                    </div>
                                    <div class="input-row flex animate-from-bottom">
                                        <input type="text" placeholder="Company or organization">
                                    </div>
                                    <div class="input-row flex animate-from-bottom">
                                        <textarea placeholder="Message or description"></textarea>
                                    </div>
                                    <div class="input-row input-row-submit flex animate-from-bottom">
                                        <input type="submit" value="Send">
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>

                    <div class="contact-tab-item animate-from-bottom" id="contact-tab-item-2">
                        <div class="contact-title animate-from-bottom">
                            <h2 class="animate-from-bottom"><?php echo esc_html($t2_title); ?></h2>
                            <?php if($t2_desc): ?>
                                <p class="animate-from-bottom"><?php echo wp_kses_post($t2_desc); ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <?php if($t2_form): ?>
                            <div class="custom-form-wrapper animate-from-bottom">
                                <?php echo do_shortcode($t2_form); ?>
                            </div>
                        <?php else: ?>
                            <form action="#">
                                <div class="input-row-wrap flex">
                                    <div class="input-row flex">
                                        <div class="input-col animate-from-bottom"><input type="text" placeholder="First Name"></div>
                                        <div class="input-col animate-from-bottom"><input type="text" placeholder="Last Name"></div>
                                    </div>
                                    <div class="input-row flex">
                                        <div class="input-col animate-from-bottom"><input type="number" placeholder="Phone"></div>
                                        <div class="input-col animate-from-bottom"><input type="mail" placeholder="Email"></div>
                                    </div>
                                    <div class="input-row flex animate-from-bottom">
                                        <input type="text" placeholder="Company or organization">
                                    </div>
                                    <div class="input-row flex animate-from-bottom">
                                        <textarea placeholder="Message or description"></textarea>
                                    </div>
                                    <div class="input-row input-row-submit flex animate-from-bottom">
                                        <input type="submit" value="Send">
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>