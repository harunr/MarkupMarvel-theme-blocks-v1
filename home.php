<?php
/**
 * The main template file (Blog Listing)
 * Path: index.php
 */

get_header();
?>

<section class="main-content-wrap blog-page">
                
    <div class="hero-wrap">
        <div class="common-pattern">
            <div></div><div></div><div></div><div></div><div></div>
        </div>
        <div class="common-wrap clear">
            <div class="hero-inner flex">
                <div class="hero-content-wrap">
                    <?php 
                    // This pulls data from the Page you assigned as "Posts Page" in Settings > Reading
                    $blog_page_id = get_option('page_for_posts'); 
                    $hero_title   = get_field('hero_title', $blog_page_id) ?: 'Check out our various blogs for your new knowledge';
                    $hero_text    = get_field('hero_text', $blog_page_id) ?: 'Stay updated with the latest insights and industry trends.';
                    ?>
                    <h1 class="split-heading justify-center"><?php echo esc_html($hero_title); ?></h1>
                    <p class="animate-from-bottom"><?php echo esc_html($hero_text); ?></p>
                    
                    <div class="hero-btn flex animate-from-bottom">
                        <a href="#blog-start" class="btn">Discover More</a>
                    </div>
                </div>      
            </div>
        </div>
    </div>

    <div id="blog-start" class="blog-wrap">
        <div class="common-wrap clear">
            <div class="blog-inner flex">

                <?php 
                // 2. FEATURED POST LOOP (The Largest Component)
                $featured_query = new WP_Query(array(
                    'posts_per_page' => 1,
                    'post_status'    => 'publish'
                ));

                $featured_id = 0;

                if ($featured_query->have_posts()) : while ($featured_query->have_posts()) : $featured_query->the_post(); 
                    $featured_id = get_the_ID(); 
                ?>
                    <div class="largest-blog-component flex">
                        <a href="<?php the_permalink(); ?>" class="blog-component-thumb animate-from-bottom">
                            <figure>
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('full'); ?>
                                <?php endif; ?>
                            </figure>
                        </a>
                        <div class="largest-blog-component-content">
                            <div class="blog-component-content animate-from-bottom">
                                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 40); ?></p>
                            </div>
                            <div class="blog-component-author flex animate-from-bottom">
                                <div class="blog-component-author-thumb">
                                    <figure>
                                        <?php echo get_avatar(get_the_author_meta('ID'), 60); ?>
                                    </figure>
                                </div>
                                <div class="blog-component-author-content">
                                    <h6><?php the_author(); ?></h6>
                                    <em><?php echo get_the_author_meta('description') ?: 'Sr. Brand Designer'; ?></em>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); endif; ?>

                <div class="blog-component-wrap flex">
                    <?php 
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $grid_query = new WP_Query(array(
                        'posts_per_page' => 6,
                        'post__not_in'   => array($featured_id), // Exclude the featured post
                        'paged'          => $paged
                    ));

                    if ($grid_query->have_posts()) : while ($grid_query->have_posts()) : $grid_query->the_post(); ?>
                        <div class="blog-component animate-from-bottom">
                            <a href="<?php the_permalink(); ?>" class="blog-component-thumb">
                                <figure>
                                    <?php if (has_post_thumbnail()) the_post_thumbnail('large'); ?>
                                </figure>
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
                    <?php endwhile; ?>
                    
                    <div class="pagination-wrap flex animate-from-bottom">
                        <?php 
                        echo paginate_links(array(
                            'total'   => $grid_query->max_num_pages,
                            'current' => $paged,
                            'prev_text' => __('« Prev'),
                            'next_text' => __('Next »'),
                        )); 
                        ?>
                    </div>

                    <?php wp_reset_postdata(); endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php get_template_part('template-parts/blocks/home-cta'); ?>
                
</section>

<?php get_footer(); ?>