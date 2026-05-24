<?php
/**
 * Home Blog Block Template (Dynamic).
 * Path: template-parts/blocks/home-blog.php
 */

// 1. Fetch static ACF fields
$subtitle = get_field('blog_subtitle') ?: 'BLOG';
$title    = get_field('blog_title') ?: 'We love to share knowledge';

// 2. Run the WP_Query and package the dynamic post data into an array for Next.js
$posts_data = [];
$args = array(
    'post_type'           => 'post',
    'posts_per_page'      => 6,
    'post_status'         => 'publish',
    'orderby'             => 'date',
    'order'               => 'DESC',
    'ignore_sticky_posts' => 1,    
    'suppress_filters'    => true 
    );

$blog_query = new WP_Query( $args );
if ( $blog_query->have_posts() ) {
    while ( $blog_query->have_posts() ) {
        $blog_query->the_post();
        
        $posts_data[] = array(
            // ✨ ADDED: id and slug so Next.js can build correct /blog/[slug] links
            'id'      => (string) get_the_ID(),
            'slug'    => get_post_field( 'post_name', get_the_ID() ),
            
            'link'    => get_permalink(), // Kept for WP safety
            'title'   => get_the_title(),
            'excerpt' => wp_trim_words( get_the_excerpt(), 20, '...' ),
            
            // ✨ FORMATTED: Match the Next.js `featuredImage` object structure
            'featuredImage' => array(
                'node' => array(
                    'sourceUrl' => get_the_post_thumbnail_url( get_the_ID(), 'large' ),
                    'altText'   => get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true )
                )
            ),
            
            // Kept original fields just in case they are used elsewhere
            'thumb'   => get_the_post_thumbnail_url( get_the_ID(), 'large' ),
            'author'  => get_the_author_meta('display_name'),
            'avatar'  => get_avatar_url( get_the_author_meta('ID') )
        );
    }
    // CRITICAL: Always reset post data after a custom query
    wp_reset_postdata(); 
}
?>

<div class="blog-wrap wp-block-acf-home-blog"
     data-subtitle="<?php echo esc_attr($subtitle); ?>"
     data-title="<?php echo esc_attr($title); ?>"
     data-posts='<?php echo esc_attr(wp_json_encode($posts_data)); ?>'>
    
    <div class="common-wrap clear">
        <div class="blog-inner flex">
            
            <div class="common-title blog-title-wrap animate-from-bottom">
                <h6 class="split-heading justify-center"><?php echo esc_html( $subtitle ); ?></h6>
                <h2 class="split-heading justify-center"><?php echo esc_html( $title ); ?></h2>
            </div>
            
            <div class="blog-component-wrap flex">
                <?php if ( !empty($posts_data) ) : ?>
                    <?php foreach ( $posts_data as $post ) : ?>
                        <div class="blog-component animate-from-bottom">
                            
                            <a href="<?php echo esc_url( $post['link'] ); ?>" class="blog-component-thumb">
                                <figure>
                                    <?php if ( $post['thumb'] ) : ?>
                                        <img src="<?php echo esc_url( $post['thumb'] ); ?>" alt="<?php echo esc_attr( $post['title'] ); ?>">
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog-thumb-1.jpg" alt="Fallback">
                                    <?php endif; ?>
                                </figure>
                            </a>

                            <div class="blog-component-content">
                                <a href="<?php echo esc_url( $post['link'] ); ?>">
                                    <h5><?php echo esc_html( $post['title'] ); ?></h5>
                                </a>
                                <p><?php echo esc_html( $post['excerpt'] ); ?></p>
                            </div>
                            
                            <div class="blog-component-author flex">
                                <div class="blog-component-author-thumb">
                                    <figure>
                                        <?php if ( $post['avatar'] ) : ?>
                                            <img src="<?php echo esc_url( $post['avatar'] ); ?>" alt="<?php echo esc_attr( $post['author'] ); ?>">
                                        <?php endif; ?>
                                    </figure>
                                </div>
                                <div class="blog-component-author-content">
                                    <h6><?php echo esc_html( $post['author'] ); ?></h6>
                                    <em>Author</em> 
                                </div>
                            </div>
                            
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No blog posts found. Please publish some posts!</p>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</div>