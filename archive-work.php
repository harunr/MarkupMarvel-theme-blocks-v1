<?php
/**
 * The template for displaying Work/Portfolio Archives
 * Path: archive-work.php
 */

get_header();
?>

<section class="main-content-wrap portfolio-listing-page">
                
    <div class="hero-wrap">
        <div class="common-pattern">
            <div></div><div></div><div></div><div></div><div></div>
        </div>
        <div class="common-wrap clear">
            <div class="hero-inner flex">
                <div class="hero-content-wrap">
                    <h1 class="split-heading justify-center">Our Creative Portfolio</h1>
                    <p class="animate-from-bottom">Explore our latest projects, case studies, and digital solutions.</p>
                </div>      
            </div>
        </div>
    </div>

    <?php 
    $featured_work_query = new WP_Query(array(
        'post_type'      => 'work',
        'posts_per_page' => 1,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC'
    ));

    $featured_id = 0;

    if ($featured_work_query->have_posts()) : 
        while ($featured_work_query->have_posts()) : $featured_work_query->the_post(); 
            $featured_id = get_the_ID(); 
    ?>
        <div class="largest-work-wrap" style="padding: 60px 0;">
            <div class="common-wrap clear">
                <div class="largest-work-inner flex">
                    <div class="largest-work-component flex" style="align-items: center; justify-content: space-between; gap: 40px;">
                        
                        <div class="work-component-thumb animate-from-bottom" style="width: 50%;">
                            <figure style="margin: 0;">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('full', array('style' => 'width: 100%; height: auto; display: block; border-radius: 8px;')); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/works/COVER.jpg" alt="<?php the_title(); ?>" style="width: 100%; height: auto; display: block; border-radius: 8px;">
                                    <?php endif; ?>
                                </a>
                            </figure>
                        </div>
                        
                        <div class="largest-work-component-content" style="width: 45%;">
                            <div class="work-component-content animate-from-bottom">
                                <h2 class="split-heading" style="color: #0b3b4e; font-size: 42px; line-height: 1.2; margin-bottom: 20px;">
                                    <?php the_title(); ?>
                                </h2>
                                <p style="color: #666; font-size: 16px; line-height: 1.8; margin-bottom: 30px;">
                                    <?php echo has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 25); ?>
                                </p>
                            </div>

                            <div class="project-component-content-btn animate-from-bottom">
                                <a href="<?php the_permalink(); ?>" class="secondary-arrow-btn" style="color: #4a7e94; font-weight: 600; text-decoration: none;">
                                    See Detail projects &longrightarrow;
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php 
        endwhile; 
        wp_reset_postdata(); 
    endif; 
    ?>

    <div class="our-project-wrap" style="padding-bottom: 80px;">
        <div class="common-wrap clear">
            <div class="our-project-inner flex">
                <div class="project-component-wrap flex">
                    <?php 
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $grid_query = new WP_Query(array(
                        'post_type'      => 'work',
                        'post_status'    => 'publish',
                        'posts_per_page' => 6,
                        'post__not_in'   => array($featured_id), // Exclude the featured project
                        'paged'          => $paged
                    ));

                    if ($grid_query->have_posts()) : 
                        while ($grid_query->have_posts()) : $grid_query->the_post(); 
                    ?>
                            <div class="project-component animate-from-bottom">
                                <a href="<?php the_permalink(); ?>" class="project-component-thumb">
                                    <figure>
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('large'); ?>
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/placeholder.jpg" alt="<?php the_title(); ?>">
                                        <?php endif; ?>
                                    </figure>
                                </a>
                                
                                <div class="project-component-content">
                                    <h4 class="split-heading"><?php the_title(); ?></h4>
                                    <p class="small-text">
                                        <?php echo has_excerpt() ? wp_trim_words(get_the_excerpt(), 15) : wp_trim_words(get_the_content(), 15); ?>
                                    </p>
                                    <div class="project-component-content-btn">
                                        <a href="<?php the_permalink(); ?>" class="secondary-arrow-btn">See Detail Project</a>
                                    </div>
                                </div>
                            </div>
                    <?php 
                        endwhile; 
                    ?>
                    
                    <div class="pagination-wrap flex animate-from-bottom" style="width: 100%; justify-content: center; margin-top: 40px;">
                        <?php 
                        echo paginate_links(array(
                            'total'     => $grid_query->max_num_pages,
                            'current'   => $paged,
                            'prev_text' => __('« Prev'),
                            'next_text' => __('Next »'),
                        )); 
                        ?>
                    </div>

                    <?php
                        wp_reset_postdata(); 
                    else :
                        echo '<p>More projects coming soon.</p>';
                    endif; 
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php get_template_part('template-parts/blocks/home-cta'); ?>
                
</section>

<?php get_footer(); ?>