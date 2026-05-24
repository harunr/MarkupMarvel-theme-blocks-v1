<?php
/**
 * Our Projects Block Template.
 * Path: template-parts/blocks/our-projects.php
 */

$subtitle = get_field('projects_subtitle') ?: 'OUR PROJECTS';
$title    = get_field('projects_title') ?: 'Our latest awesome projects';
$cta_btn  = get_field('projects_cta_button');
?>

<div class="our-project-wrap" style="padding: 80px 0;">
    <div class="common-wrap clear">
        <div class="our-project-inner flex">
            
            <div class="common-title our-project-title animate-from-bottom" style="text-align: center; width: 100%; margin-bottom: 50px;">
                <h6 class="split-heading justify-center"><?php echo esc_html( $subtitle ); ?></h6>
                <h2 class="split-heading justify-center"><?php echo esc_html( $title ); ?></h2>
            </div>
            
            <div class="project-component-wrap flex">
                <?php 
                // Dynamic Query for the 6 latest 'work' items
                $args = array(
                    'post_type'      => 'work',
                    'posts_per_page' => 6,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC'
                );

                $work_query = new WP_Query($args);

                if ( $work_query->have_posts() ) : 
                    while ( $work_query->have_posts() ) : $work_query->the_post(); 
                ?>
                        <div class="project-component animate-from-bottom">
                            
                            <a href="<?php the_permalink(); ?>" class="project-component-thumb">
                                <figure>
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/placeholder.jpg" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                </figure>
                            </a>

                            <div class="project-component-content">
                                <h4 class="split-heading"><?php the_title(); ?></h4>
                                <p class="small-text animate-from-bottom">
                                    <?php 
                                    if (has_excerpt()) {
                                        echo wp_trim_words(get_the_excerpt(), 15); 
                                    } else {
                                        echo wp_trim_words(get_the_content(), 15);
                                    }
                                    ?>
                                </p>
                                
                                <div class="project-component-content-btn animate-from-bottom">
                                    <a href="<?php the_permalink(); ?>" class="secondary-arrow-btn">
                                        See Detail Project
                                    </a>
                                </div>
                            </div>
                        </div>
                <?php 
                    endwhile; 
                    wp_reset_postdata();
                else:
                    echo '<p>No projects found. Publish some in the Works menu!</p>';
                endif; 
                ?>
            </div>
            
            <?php if ( $cta_btn ) : ?>
                <div class="our-project-btn flex animate-from-bottom" style="width: 100%; justify-content: center; margin-top: 40px;">
                    <a href="<?php echo esc_url( $cta_btn['url'] ); ?>" target="<?php echo esc_attr( $cta_btn['target'] ); ?>" class="btn transparent">
                        <?php echo esc_html( $cta_btn['title'] ); ?>
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>