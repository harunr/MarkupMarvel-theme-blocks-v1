<?php
/**
 * Template Name: Legal/Privacy Template
 * Path: page-legal.php
 */

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="main-content-wrap terms-and-policy">
                
    <div class="hero-wrap">
        <div class="common-pattern">
            <div></div><div></div><div></div><div></div><div></div>
        </div>
        <div class="common-wrap clear">
            <div class="hero-inner flex">
                <div class="hero-content">
                    <h1 class="split-heading"><?php the_title(); ?></h1>
                    <p class="lead-text animate-from-bottom">Last Update <?php echo get_the_modified_date('F j, Y'); ?></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="terms-and-policy-section privacy-policy">
        <div class="common-wrap clear">
            <div class="terms-and-policy-inner flex">
                <div class="terms-and-policy-content flex">
                    
                    <div class="terms-and-policy-content-item animate-from-bottom">
                        <?php the_content(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    <?php get_template_part('template-parts/blocks/home-cta'); ?>
    
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>