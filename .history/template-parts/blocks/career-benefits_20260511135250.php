<div class="benefit-wrap">
    <div class="common-wrap clear">
        <div class="benefit-inner flex">
            <div class="common-title benefit-title animate-from-bottom">
                <h2 class="split-heading justify-center"><?php the_field('title') ?: 'Perks and benefit'; ?></h2>
            </div>
            <div class="benefit-component-wrap flex">
                <?php if( have_rows('benefits') ): while( have_rows('benefits') ) : the_row(); ?>
                    <div class="benefit-component animate-from-bottom">
                        <em></em> <h5><?php the_sub_field('benefit_name'); ?></h5>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</div>