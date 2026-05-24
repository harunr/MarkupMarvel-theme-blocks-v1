<?php $title = get_field('section_title') ?: 'Our satisfied clients'; ?>
<div class="satisfied-clients-wrap">
    <div class="common-wrap clear">
        <div class="satisfied-clients-inner flex">
            <div class="satisfied-clients-title common-title">
                <h2 class="split-heading justify-center"><?php echo esc_html($title); ?></h2>
            </div>
            <div class="satisfied-clients-item-wrap animate-from-bottom">
                <?php 
                $logos = get_field('logos');
                if( $logos ): 
                    foreach( $logos as $logo ): ?>
                        <div class="satisfied-clients-item">
                            <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
                        </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </div>
</div>