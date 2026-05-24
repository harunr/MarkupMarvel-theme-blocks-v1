<div class="pricing-wrap">
    <div class="common-wrap clear">
        <div class="pricing-inner flex">
            <div class="pricing-component-wrap flex animate-from-bottom">
                <?php if( have_rows('plans') ): 
                    while( have_rows('plans') ) : the_row(); 
                        $is_popular = get_sub_field('is_popular');
                        $title      = get_sub_field('title');
                        $badge      = get_sub_field('badge_text') ?: 'POPULAR PLAN';
                        $desc       = get_sub_field('description');
                        $price      = get_sub_field('price');
                        $duration   = get_sub_field('duration') ?: '/mo';
                        $btn        = get_sub_field('button');
                ?>
                    <div class="pricing-component <?php echo $is_popular ? 'popular' : ''; ?> animate-from-bottom">
                        <div class="pricing-component-content-wrap">
                            <div class="pricing-component-title flex">
                                <h3><?php echo esc_html($title); ?></h3>
                                <?php if($is_popular): ?><span><?php echo esc_html($badge); ?></span><?php endif; ?>
                            </div>
                            <p class="small-text"><?php echo esc_html($desc); ?></p>
                            <span><?php echo esc_html($price); ?><em><?php echo esc_html($duration); ?></em></span>
                            <ul>
                                <?php if( have_rows('features') ): 
                                    while( have_rows('features') ) : the_row(); 
                                        $feat_text = get_sub_field('feature_text');
                                        $disabled  = get_sub_field('is_disabled');
                                ?>
                                    <li class="<?php echo $disabled ? 'disabled' : ''; ?>"><?php echo esc_html($feat_text); ?></li>
                                <?php endwhile; endif; ?>
                            </ul>
                        </div>
                        <?php if($btn): ?>
                        <div class="pricing-component-btn">
                            <a href="<?php echo esc_url($btn['url']); ?>" target="<?php echo esc_attr($btn['target']); ?>"><?php echo esc_html($btn['title']); ?></a>
                        </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</div>