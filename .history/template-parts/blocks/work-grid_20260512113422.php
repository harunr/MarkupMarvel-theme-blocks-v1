<div class="our-project-wrap">
    <div class="common-wrap clear">
        <div class="our-project-inner flex">
            <div class="project-component-wrap flex">
                <?php 
                // Settings from Block Fields
                $count = get_field('posts_per_page') ?: -1; 
                $order = get_field('order') ?: 'DESC';
                
                // OPTIONAL: If you want to exclude the project currently 
                // being shown in a Featured block on the same page.
                $exclude_id = get_field('exclude_project_id'); 

                $args = array(
                    'post_type'      => 'work',
                    'posts_per_page' => $count,
                    'orderby'        => ($order == 'rand') ? 'rand' : 'date',
                    'order'          => $order,
                    'post_status'    => 'publish',
                    'post__not_in'   => $exclude_id ? array($exclude_id) : array()
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
                                
                                <p class="small-text">
                                    <?php 
                                    if (has_excerpt()) {
                                        echo wp_trim_words(get_the_excerpt(), 15); 
                                    } else {
                                        echo wp_trim_words(get_the_content(), 15);
                                    }
                                    ?>
                                </p>

                                <div class="project-component-content-btn">
                                    <a href="<?php the_permalink(); ?>" class="secondary-arrow-btn">See Detail Project</a>
                                </div>
                            </div>
                        </div>
                <?php 
                    endwhile; 
                    wp_reset_postdata(); 
                else :
                    echo '<p>No projects found in the Works menu.</p>';
                endif; 
                ?>
            </div>
        </div>
    </div>
</div>