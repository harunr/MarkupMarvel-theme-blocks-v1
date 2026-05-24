<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="main-content-wrap blog-details-page">
    
    <div class="blog-details-wrap">
        <div class="common-wrap clear">
            <div class="blog-details-inner flex">
                
                <div class="blog-details-component flex">
                    <div class="blog-details-component-thumb animate-from-bottom">
                        <figure>
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('full', array('alt' => get_the_title())); ?>
                            <?php endif; ?>
                        </figure>
                    </div>
                    <div class="blog-details-component-content">
                        <h2 class="split-heading"><?php the_title(); ?></h2>
                        
                        <div class="blog-component-author flex animate-from-bottom">
                            <div class="blog-component-author-thumb">
                                <figure>
                                    <?php echo get_avatar(get_the_author_meta('ID'), 60); ?>
                                </figure>
                            </div>
                            <div class="blog-component-author-content">
                                <h6><?php the_author(); ?></h6>
                                <em><?php echo get_the_author_meta('description'); ?></em>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="blog-details-discription-wrap flex">
                    <div class="blog-details-discription">
                        <div class="blog-details-discription-content animate-from-bottom">
                            <?php the_content(); ?>
                        </div>

                        <?php if( have_rows('process_steps') ): ?>
                        <div class="blog-details-discription-item-wrap flex">
                            <?php $i = 1; while( have_rows('process_steps') ) : the_row(); 
                                $step_title = get_sub_field('step_title');
                                $step_img   = get_sub_field('step_image');
                                $step_desc  = get_sub_field('step_description');
                            ?>
                                <div class="blog-details-discription-item animate-from-bottom">
                                    <h4 class="split-heading"><?php echo $i . '. ' . esc_html($step_title); ?></h4>
                                    <?php if($step_img): ?>
                                        <figure>
                                            <img src="<?php echo esc_url($step_img['url']); ?>" alt="<?php echo esc_attr($step_title); ?>">
                                        </figure>
                                    <?php endif; ?>
                                    <p><?php echo esc_html($step_desc); ?></p>
                                </div>
                            <?php $i++; endwhile; ?>
                        </div>
                        <?php endif; ?>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="blog-wrap">
        <div class="common-wrap clear">
            <div class="blog-inner flex">
                <div class="blog-title animate-from-bottom">
                    <h2 class="split-heading">More Blog</h2>
                </div>
                <div class="blog-component-wrap flex">
                    <?php 
                    $related_blogs = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'post__not_in' => array(get_the_ID()),
                        'orderby' => 'rand'
                    ));

                    if ($related_blogs->have_posts()) : while ($related_blogs->have_posts()) : $related_blogs->the_post(); ?>
                        <div class="blog-component animate-from-bottom">
                            <a href="<?php the_permalink(); ?>" class="blog-component-thumb">
                                <figure><?php if (has_post_thumbnail()) the_post_thumbnail('large'); ?></figure>
                            </a>
                            <div class="blog-component-content">
                                <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
                            </div>
                            <div class="blog-component-author flex">
                                <div class="blog-component-author-thumb">
                                    <figure><?php echo get_avatar(get_the_author_meta('ID'), 40); ?></figure>
                                </div>
                                <div class="blog-component-author-content">
                                    <h6><?php the_author(); ?></h6>
                                    <em>Author</em>
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