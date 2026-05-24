<?php
/**
 * Template Name: Single Service
 * Template Post Type: services
 */
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="main-content-wrap service-details-page">
    
    <div class="hero-wrap">
        <div class="common-pattern">
            <div></div><div></div><div></div><div></div><div></div>
        </div>
        <div class="common-wrap clear">
            <div class="hero-inner flex">
                <div class="hero-content-wrap service-hero-content">
                    
                    <h1 class="split-heading justify-center"><?php the_title(); ?></h1>
                    
                    <?php if (has_excerpt()) : ?>
                        <p class="animate-from-bottom service-hero-excerpt">
                            <?php echo get_the_excerpt(); ?>
                        </p>
                    <?php endif; ?>
                    
                </div>      
            </div>
        </div>
    </div>
    
    <div class="service-content-wrap">
        <div class="common-wrap clear">
            <div class="content-area animate-from-bottom">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

    <div class="more-services-wrap">
        <div class="common-wrap clear">
            
            <div class="section-title more-services-title">
                <h6>Explore</h6>
                <h2 class="split-heading">Other Services We Provide</h2>
            </div>
            
            <div class="more-services-grid flex">
                
                <?php
                $current_id = get_the_ID();
                $more_services = new WP_Query(array(
                    'post_type'      => 'services',
                    'posts_per_page' => 3,
                    'post__not_in'   => array($current_id),
                    'orderby'        => 'rand', 
                ));

                if ( $more_services->have_posts() ) : 
                    while ( $more_services->have_posts() ) : $more_services->the_post(); 
                        $icon = get_field('service_icon', get_the_ID());
                ?>
                    
                    <div class="service-hover-card animate-from-bottom">
                        
                        <div class="card-icon">
                            <?php if ( $icon ) : ?>
                                <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>">
                            <?php else: ?>
                                <span>&boxbox;</span>
                            <?php endif; ?>
                        </div>
                        
                        <h4>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                        
                        <p>
                            <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
                        </p>
                        
                        <a href="<?php the_permalink(); ?>" class="service-detail-link">
                            Service Details <span>&rarr;</span>
                        </a>
                    </div>

                <?php 
                    endwhile; 
                    wp_reset_postdata(); 
                endif; 
                ?>
                
            </div>
        </div>
    </div>

    <?php get_template_part('template-parts/blocks/home-cta'); ?>

</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>