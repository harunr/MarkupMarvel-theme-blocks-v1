<?php
/**
 * Home Blog Block Template (Dynamic).
 * Path: template-parts/blocks/home-blog.php
 */

$subtitle = get_field('blog_subtitle') ?: 'BLOG';
$title    = get_field('blog_title') ?: 'We love to share knowledge';

// Set up the query to grab the 3 newest published posts
$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC'
);
$blog_query = new WP_Query( $args );
?>

<div class="blog-wrap">
    <div class="common-wrap clear">
        <div class="blog-inner flex">
            
            <div class="common-title blog-title-wrap animate-from-bottom">
                <h6 class="split-heading justify-center"><?php echo esc_html( $subtitle ); ?></h6>
                <h2 class="split-heading justify-center"><?php echo esc_html( $title ); ?></h2>
            </div>
            
            <div class="blog-component-wrap flex">
                <?php 
                // Check if we have any blog posts published
                if ( $blog_query->have_posts() ) : 
                    while ( $blog_query->have_posts() ) : $blog_query->the_post(); 
                        
                        // Grab dynamic data for the current post
                        $post_link    = get_permalink();
                        $post_title   = get_the_title();
                        // Trims the excerpt to 20 words so it fits perfectly in your design
                        $post_excerpt = wp_trim_words( get_the_excerpt(), 20, '...' ); 
                        // Grabs the Featured Image URL
                        $thumb_url    = get_the_post_thumbnail_url( get_the_ID(), 'large' ); 
                        // Grabs the Author data
                        $author_id    = get_the_author_meta('ID');
                        $author_name  = get_the_author_meta('display_name');
                        $author_img   = get_avatar_url( $author_id );
                ?>
                        <div class="blog-component animate-from-bottom">
                            
                            <a href="<?php echo esc_url( $post_link ); ?>" class="blog-component-thumb">
                                <figure>
                                    <?php if ( $thumb_url ) : ?>
                                        <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( $post_title ); ?>">
                                    <?php else : ?>
                                        <!-- Fallback image if a post doesn't have a featured image -->
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog-thumb-1.jpg" alt="Fallback">
                                    <?php endif; ?>
                                </figure>
                            </a>

                            <div class="blog-component-content">
                                <a href="<?php echo esc_url( $post_link ); ?>">
                                    <h5><?php echo esc_html( $post_title ); ?></h5>
                                </a>
                                <p><?php echo esc_html( $post_excerpt ); ?></p>
                            </div>
                            
                            <div class="blog-component-author flex">
                                <div class="blog-component-author-thumb">
                                    <figure>
                                        <?php if ( $author_img ) : ?>
                                            <img src="<?php echo esc_url( $author_img ); ?>" alt="<?php echo esc_attr( $author_name ); ?>">
                                        <?php endif; ?>
                                    </figure>
                                </div>
                                <div class="blog-component-author-content">
                                    <h6><?php echo esc_html( $author_name ); ?></h6>
                                    <em>Author</em> <!-- Hardcoded role, or you can build a custom author meta field later -->
                                </div>
                            </div>
                            
                        </div>
                <?php 
                    endwhile; 
                    // CRITICAL: Always reset post data after a custom query so the rest of the page doesn't break
                    wp_reset_postdata(); 
                else: 
                ?>
                    <p>No blog posts found. Please publish some posts!</p>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</div>