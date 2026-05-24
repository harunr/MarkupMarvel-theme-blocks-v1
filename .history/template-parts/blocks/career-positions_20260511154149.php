<div class="positions-wrap">
    <div class="common-wrap clear">
        <div class="positions-inner flex">
            <div class="positions-title">
                <h2 class="split-heading"><?php the_field('title') ?: 'Open Positions'; ?></h2>
                <?php if (get_field('subtitle')) : ?>
                    <p class="animate-from-bottom"><?php the_field('subtitle'); ?></p>
                <?php endif; ?>
            </div>
            
            <div class="positions-component-wrap flex">
                <?php
                $args = array(
                    'post_type'      => 'careers',
                    'posts_per_page' => -1,
                    'post_status'    => 'publish'
                );
                
                $query = new WP_Query($args);
                
                if ($query->have_posts()) : 
                    while ($query->have_posts()) : $query->the_post(); 
                        // Pulling the meta from the CPT post ID
                        $meta = get_field('job_meta', get_the_ID()); 
                ?>
                    <div class="positions-component flex animate-from-bottom">
                        <div class="positions-component-content">
                            <h4 class="split-heading"><?php the_title(); ?></h4>
                            <?php if ($meta) : ?>
                                <p class="animate-from-bottom"><?php echo esc_html($meta); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="positions-component-btn animate-from-bottom">
                            <a href="<?php the_permalink(); ?>" class="btn transparent">Apply</a>
                        </div>
                    </div>
                <?php 
                    endwhile; 
                    wp_reset_postdata(); 
                else : 
                    echo '<p>Currently, there are no open positions. Please check back later!</p>';
                endif; 
                ?>
            </div>
        </div>
    </div>
</div>