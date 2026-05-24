<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<section class="main-content-wrap work-details-page">
    
    <div class="project-content-area">
        <?php the_content(); ?>
    </div>

    <div class="work-details-wrap" style="padding-top: 60px;">
        <div class="common-wrap clear">
            <div class="work-details-inner flex">
                
                <div class="work-details-driscription-wrap flex">
                    <div class="work-details-driscription flex">
                        
                        <?php if( $client_desc = get_field('client_description') ): ?>
                        <div class="work-details-driscription-content-wrap flex"> 
                            <div class="work-details-driscription-content">
                                <h2 class="split-heading">Client</h2>
                                <div class="animate-from-bottom"><?php echo $client_desc; ?></div>
                            </div>  
                        </div>
                        <?php endif; ?>

                        <?php if( $goals = get_field('project_goals') ): ?>
                        <div class="work-details-driscription-content-wrap flex">
                            <div class="work-details-driscription-content">
                                <h2 class="split-heading">Project Goals</h2>
                                <div class="animate-from-bottom"><?php echo $goals; ?></div>
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
                        'autoplay' => 1, 'enablejsapi' => 1, 'origin' => $site_url, 'rel' => 0
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
                    <?php if( $problems = get_field('problems_content') ): ?>
                    <div class="work-details-content-component">
                        <h2 class="split-heading">Problems</h2>
                        <div class="animate-from-bottom"><?php echo $problems; ?></div>
                    </div>
                    <?php endif; ?>

                    <?php if( $solutions = get_field('solutions_content') ): ?>
                    <div class="work-details-content-component">
                        <h2 class="split-heading">Solutions</h2>
                        <div class="animate-from-bottom"><?php echo $solutions; ?></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    </section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>