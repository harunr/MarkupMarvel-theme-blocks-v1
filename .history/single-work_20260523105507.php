<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="main-content-wrap work-details-page">
    
    <div class="project-content-area">
        <?php the_content(); ?>
    </div>

    <?php 
    // Logic to find the next chronological project
    $next_post = get_next_post();

    // If there is no next post (we are on the newest one), loop back to the oldest
    if (!$next_post) {
        $first_post_args = array(
            'post_type'      => 'work',
            'posts_per_page' => 1,
            'order'          => 'ASC',
            'post_status'    => 'publish'
        );
        $first_post_query = get_posts($first_post_args);
        if ($first_post_query) {
            $next_post = $first_post_query[0];
        }
    }

    if ($next_post) : 
        $next_title = get_the_title($next_post->ID);
        $next_url   = get_permalink($next_post->ID);
        
        // Try to get excerpt, fallback to trimmed content
        $next_excerpt = has_excerpt($next_post->ID) ? get_the_excerpt($next_post->ID) : wp_trim_words(get_post_field('post_content', $next_post->ID), 25);
        
        // Get the thumbnail URL, fallback to placeholder
        if (has_post_thumbnail($next_post->ID)) {
            $next_image_url = get_the_post_thumbnail_url($next_post->ID, 'full');
            $next_image_alt = get_post_meta(get_post_thumbnail_id($next_post->ID), '_wp_attachment_image_alt', true) ?: $next_title;
        } else {
            $next_image_url = get_template_directory_uri() . '/assets/img/works/COVER.jpg';
            $next_image_alt = 'Next Project';
        }
    ?>
    
    <div class="largest-work-wrap" style="position: relative; margin-top: -80px; z-index: 10;">
        <div class="common-wrap clear">
            <div class="largest-work-inner flex">
                <div class="largest-work-component flex" style="align-items: center; justify-content: space-between; gap: 40px; background: #fff; padding: 40px; border-radius: 8px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                    
                    <div class="work-component-thumb animate-from-bottom" style="width: 50%;">
                        <figure style="margin: 0;">
                            <a href="<?php echo esc_url($next_url); ?>">
                                <img src="<?php echo esc_url($next_image_url); ?>" alt="<?php echo esc_attr($next_image_alt); ?>" style="width: 100%; height: auto; display: block; border-radius: 8px;">
                            </a>
                        </figure>
                    </div>
                    
                    <div class="largest-work-component-content" style="width: 45%;">
                        <div class="work-component-content animate-from-bottom">
                            <h2 class="split-heading" style="color: #0b3b4e; font-size: 42px; line-height: 1.2; margin-bottom: 20px;">
                                <?php echo esc_html($next_title); ?>
                            </h2>
                            <p style="color: #666; font-size: 16px; line-height: 1.8; margin-bottom: 30px;">
                                <?php echo esc_html($next_excerpt); ?>
                            </p>
                        </div>

                        <div class="project-component-content-btn animate-from-bottom">
                            <a href="<?php echo esc_url($next_url); ?>" class="secondary-arrow-btn" style="color: #4a7e94; font-weight: 600; text-decoration: none;">
                                See Next Project
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="work-details-wrap" style="padding-top: 60px;">
        <div class="common-wrap clear">
            <div class="work-details-inner flex">
                
                <div class="work-details-driscription-wrap flex">
                    <div class="work-details-driscription flex">
                        <?php if( get_field('client_description') ): ?>
                        <div class="work-details-driscription-content-wrap flex"> 
                            <div class="work-details-driscription-content">
                                <h2 class="split-heading">Client</h2>
                                <div class="animate-from-bottom"><?php the_field('client_description'); ?></div>
                            </div>  
                        </div>
                        <?php endif; ?>

                        <?php if( get_field('project_goals') ): ?>
                        <div class="work-details-driscription-content-wrap flex">
                            <div class="work-details-driscription-content">
                                <h2 class="split-heading">Project Goals</h2>
                                <div class="animate-from-bottom"><?php the_field('project_goals'); ?></div>
                            </div>
                        </div> 
                        <?php endif; ?>
                    </div>
                </div>
    
                <?php 
                $video_url = get_field('showcase_video_url');
                $placeholder = get_field('video_placeholder_image'); 

                if( $video_url ): 
                    $site_url = home_url();
                    $video_url = add_query_arg(array(
                        'autoplay'    => 1,
                        'enablejsapi' => 1,
                        'origin'      => $site_url,
                        'rel'         => 0
                    ), $video_url);
                ?>
                <div class="work-details-video-wrap animate-from-bottom">
                    <figure>
                        <?php if( is_array($placeholder) ): ?>
                            <img src="<?php echo esc_url($placeholder['url']); ?>" alt="<?php echo esc_attr($placeholder['alt']); ?>">
                        <?php elseif( $placeholder ): ?>
                            <img src="<?php echo esc_url($placeholder); ?>" alt="Showcase Placeholder">
                        <?php endif; ?>
                    </figure>
                    
                    <a href="<?php echo esc_url($video_url); ?>" class="work-details-play-btn popup-video">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/works/play-btn.svg" alt="play-btn">
                    </a>
                </div>
                <?php endif; ?>

                <div class="work-details-content-component-wrap flex">
                    <?php if( get_field('problems_content') ): ?>
                    <div class="work-details-content-component">
                        <h2 class="split-heading">Problems</h2>
                        <div class="animate-from-bottom"><?php the_field('problems_content'); ?></div>
                    </div>
                    <?php endif; ?>

                    <?php if( get_field('solutions_content') ): ?>
                    <div class="work-details-content-component">
                        <h2 class="split-heading">Solutions</h2>
                        <div class="animate-from-bottom"><?php the_field('solutions_content'); ?></div>
                    </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

    <div class="related-work-wrap">
        <div class="common-wrap clear">
            <div class="related-work-inner flex">
                <div class="related-work-title animate-from-bottom">
                    <h2 class="split-heading">More Projects</h2>
                </div>
                <div class="related-work-component-wrap flex">
                    <?php
                    $related_projects = new WP_Query(array(
                        'post_type'      => 'work',
                        'posts_per_page' => 3,
                        'post__not_in'   => array(get_the_ID()),
                        'orderby'        => 'rand'
                    ));
                    if ($related_projects->have_posts()) : while ($related_projects->have_posts()) : $related_projects->the_post(); ?>
                        <div class="project-component animate-from-bottom">
                            <a href="<?php the_permalink(); ?>" class="project-component-thumb">
                                <figure><?php if (has_post_thumbnail()) the_post_thumbnail('large'); ?></figure>
                            </a>
                            <div class="project-component-content">
                                <h4 class="split-heading"><?php the_title(); ?></h4>
                                <p class="small-text"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                <div class="project-component-content-btn">
                                    <a href="<?php the_permalink(); ?>" class="secondary-arrow-btn">See Detail Project</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php get_template_part('template-parts/blocks/home-cta'); ?>
    
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>