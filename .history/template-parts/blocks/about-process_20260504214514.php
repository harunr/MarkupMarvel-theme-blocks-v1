<?php
$title = get_field('process_title') ?: 'Our Process';
$desc  = get_field('process_description');
?>
<div class="process-wrap">
    <div class="common-wrap clear">
        <div class="process-inner flex">
            
            <div class="common-title process-title">
                <h2 class="animate-from-bottom split-heading justify-center"><?php echo esc_html( $title ); ?></h2>
                <?php if($desc): ?>
                    <p class="animate-from-bottom"><?php echo esc_html( $desc ); ?></p>
                <?php endif; ?>
            </div>
            
            <div class="process-component-wrap flex">
                <?php 
                if( have_rows('process_steps') ): 
                    while( have_rows('process_steps') ) : the_row(); 
                        $step_title = get_sub_field('step_title');
                        $step_desc  = get_sub_field('step_description');
                ?>
                        <div class="process-component animate-from-bottom">
                            <div class="process-component-shape">
                                <div class="common-pattern">
                                    <div></div><div></div>
                                </div>
                            </div>
                            <div class="process-component-content">
                                <h5 class="split-heading justify-center"><?php echo esc_html( $step_title ); ?></h5>
                                <p class="animate-from-bottom"><?php echo esc_html( $step_desc ); ?></p>
                            </div>
                        </div>
                <?php 
                    endwhile; 
                endif; 
                ?>
            </div>
            
        </div>
    </div>
</div>