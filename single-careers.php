<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); 
    $job_meta = get_field('job_meta'); // Pulls "Design • Remote • Fulltime"
?>

<section class="main-content-wrap career-details-page">
    
    <div class="career-detail-hero-wrap">
        <div class="common-wrap clear">
            <div class="career-detail-hero-inner flex">
                <div class="career-detail-hero-content">
                    <h2 class="split-heading"><?php the_title(); ?></h2>
                    <?php if($job_meta): ?>
                        <p class="animate-from-bottom"><?php echo esc_html($job_meta); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="career-submission-wrap">
        <div class="common-wrap clear">
            <div class="career-submission-inner flex">
                
                <div class="career-submission-content-wrap flex">
                    <div class="career-submission-content animate-from-bottom">
                        <?php the_content(); ?>
                    </div>
                </div>

                <div class="career-submission-form">
                    <h2 class="split-heading">Form Submission</h2>
                    <p class="animate-from-bottom">Faucibus mi pellentesque ac congue in at porta sed in. Odio sed nisl platea ut praesent et dignissim luctus.</p>
                    
                    <?php 
                        // Replace 'X' with your actual Contact Form 7 ID
                        echo do_shortcode('[contact-form-7 id="5a24a2e" title="Career form"]'); 
                    ?>
                </div>

            </div>
        </div>
    </div>

    <div class="positions-wrap">
		<div class="common-wrap clear">
			<div class="positions-inner flex">
				<div class="positions-title">
					<h2 class="split-heading">Other Open Positions</h2>
					<p class="animate-from-bottom">Explore more opportunities to join our team.</p>
				</div>
				<div class="positions-component-wrap flex">
					<?php
					$current_id = get_the_ID();
					$other_jobs = new WP_Query(array(
						'post_type'      => 'careers',
						'posts_per_page' => 4,
						'post__not_in'   => array($current_id),
						'orderby'        => 'rand'
					));

					if ($other_jobs->have_posts()) : 
						while ($other_jobs->have_posts()) : $other_jobs->the_post(); 
							// IMPORTANT: Get the meta field for the loop's current post
							$meta_info = get_field('job_meta', get_the_ID()); 
					?>
						<div class="positions-component flex animate-from-bottom">
							<div class="positions-component-content">
								<h4 class="split-heading"><?php the_title(); ?></h4>
								
								<?php if($meta_info): ?>
									<p class="animate-from-bottom"><?php echo esc_html($meta_info); ?></p>
								<?php endif; ?>
							</div>
							<div class="positions-component-btn animate-from-bottom">
								<a href="<?php the_permalink(); ?>" class="btn transparent">Apply</a>
							</div>
						</div>
					<?php 
						endwhile; 
						wp_reset_postdata(); 
					endif; 
					?>
				</div>
			</div>
		</div>
	</div>

    <?php get_template_part('template-parts/blocks/home-cta'); ?>

</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>