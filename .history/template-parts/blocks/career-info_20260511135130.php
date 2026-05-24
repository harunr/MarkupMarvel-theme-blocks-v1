<div class="career-information-wrap">
    <div class="common-wrap clear">
        <div class="career-information-inner flex">
            <div class="career-information-thumb animate-from-bottom">
                <figure>
                    <?php $image = get_field('image'); ?>
                    <img src="<?php echo $image['url'] ?? get_template_directory_uri().'/assets/img/career/IMAGE.jpg'; ?>" alt="career">
                </figure>
            </div>
            <div class="career-information-container flex">
                <div class="career-information-item-wrap flex">
                    <?php if( have_rows('stats') ): while( have_rows('stats') ) : the_row(); ?>
                        <div class="career-information-item flex animate-from-bottom">
                            <div class="career-information-item-icon">
                                <img src="<?php echo get_sub_field('icon')['url']; ?>" alt="icon">
                            </div>
                            <div class="career-information-item-content">
                                <span><?php the_sub_field('number'); ?></span>
                                <em><?php the_sub_field('label'); ?></em>
                            </div>
                        </div>
                    <?php endwhile; endif; ?>
                </div>
                <div class="career-information-content animate-from-bottom">
                    <h2 class="split-heading"><?php the_field('title'); ?></h2>
                    <?php the_field('content'); ?>
                </div>
            </div>
        </div>
    </div>
</div>