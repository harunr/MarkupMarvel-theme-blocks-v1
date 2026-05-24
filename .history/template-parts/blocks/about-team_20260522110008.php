<?php
// 1. Fetch ALL your ACF data at the top, including repeaters
$title   = get_field('team_title') ?: 'Let’s meet our team';
$btn     = get_field('team_button');
$members = get_field('team_members') ?: []; // Grab the whole repeater array!
?>
<div class="team-wrap wp-block-acf-about-team" data-team-title="<?php echo esc_attr($title); ?>"
     data-team-button='<?php echo esc_attr(wp_json_encode($btn)); ?>'
     data-team-members='<?php echo esc_attr(wp_json_encode($members)); ?>'>
    <div class="common-wrap clear">
        <div class="team-inner flex">
            
            <div class="team-title animate-from-bottom">
                <h2 class="split-heading justify-center"><?php echo esc_html( $title ); ?></h2>
            </div>
            
            <div class="team-component-wrap flex">
                <?php 
                if( have_rows('team_members') ): 
                    while( have_rows('team_members') ) : the_row(); 
                        $image = get_sub_field('image');
                        $name  = get_sub_field('name');
                        $role  = get_sub_field('role');
                        $fb    = get_sub_field('facebook');
                        $li    = get_sub_field('linkedin');
                        $tw    = get_sub_field('twitter');
                        $ig    = get_sub_field('instagram');
                ?>
                        <div class="team-component animate-from-bottom">
                            <div class="team-component-inner">
                                <div class="team-component-content">
                                    <div class="team-component-thumb">
                                        <figure>
                                            <?php if($image): ?>
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($name); ?>">
                                            <?php endif; ?>
                                        </figure>
                                    </div>
                                    <div class="team-component-title">
                                        <h5 class="split-heading justify-center"><?php echo esc_html($name); ?></h5>
                                        <span class="animate-from-bottom"><?php echo esc_html($role); ?></span>
                                    </div>
                                </div>
                                <div class="team-component-social">
                                    <ul>
                                        <?php if($fb): ?><li><a href="<?php echo esc_url($fb); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/about/Facebook.svg" alt="Facebook"></a></li><?php endif; ?>
                                        <?php if($li): ?><li><a href="<?php echo esc_url($li); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/about/LinkedIn.svg" alt="LinkedIn"></a></li><?php endif; ?>
                                        <?php if($tw): ?><li><a href="<?php echo esc_url($tw); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/about/twitter.svg" alt="Twitter"></a></li><?php endif; ?>
                                        <?php if($ig): ?><li><a href="<?php echo esc_url($ig); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/about/instagram.svg" alt="Instagram"></a></li><?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                <?php 
                    endwhile; 
                endif; 
                ?>
            </div>
            
            <?php if( $btn ): ?>
                <div class="team-btn flex animate-from-bottom">
                    <a href="<?php echo esc_url($btn['url']); ?>" target="<?php echo esc_attr($btn['target']); ?>" class="btn transparent"><?php echo esc_html($btn['title']); ?></a>
                </div>
            <?php endif; ?>
            
        </div>
    </div>
</div>