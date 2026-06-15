<?php
$title         = get_field('cta_title', 'option') ?: get_field('cta_title');
$cta_btn       = get_field('cta_button', 'option') ?: get_field('cta_button');
$description   = get_field('cta_description', 'option') ?: get_field('cta_description') ?: '';
$secondary_btn = get_field('cta_secondary_button', 'option') ?: get_field('cta_secondary_button');
$trust_text    = get_field('cta_trust_text', 'option') ?: get_field('cta_trust_text') ?: '';

if (!$title) $title = 'Ready to build a faster, more scalable web platform?';
$default_url = home_url('/contact/');
?>

<div class="cta-wrap wp-block-acf-home-cta"
     data-cta-title="<?php echo esc_attr($title); ?>"
     data-cta-button='<?php echo esc_attr(wp_json_encode($cta_btn)); ?>'
     data-cta-description="<?php echo esc_attr($description); ?>"
     data-cta-secondary-button='<?php echo esc_attr(wp_json_encode($secondary_btn)); ?>'
     data-cta-trust-text="<?php echo esc_attr($trust_text); ?>"
     data-default-url="<?php echo esc_attr($default_url); ?>">

    <div class="common-wrap clear">
        <div class="cta-inner flex animate-from-bottom">

            <div class="common-pattern">
                <div></div><div></div><div></div><div></div><div></div><div></div>
            </div>

            <div class="cta-content">
                <h2 class="animate-from-bottom split-heading justify-center"><?php echo esc_html($title); ?></h2>

                <?php if ($description): ?>
                    <p class="cta-description animate-from-bottom"><?php echo esc_html($description); ?></p>
                <?php endif; ?>

                <div class="cta-content-btn flex animate-from-bottom">
                    <?php if ($cta_btn): ?>
                        <a href="<?php echo esc_url($cta_btn['url']); ?>" target="<?php echo esc_attr($cta_btn['target']); ?>" class="btn"><?php echo esc_html($cta_btn['title']); ?></a>
                    <?php else: ?>
                        <a href="<?php echo esc_url($default_url); ?>" class="btn">Schedule a Free Consultation</a>
                    <?php endif; ?>

                    <?php if ($secondary_btn): ?>
                        <a href="<?php echo esc_url($secondary_btn['url']); ?>" target="<?php echo esc_attr($secondary_btn['target']); ?>" class="secondary-btn"><?php echo esc_html($secondary_btn['title']); ?></a>
                    <?php endif; ?>
                </div>

                <?php if ($trust_text): ?>
                    <p class="cta-trust-line animate-from-bottom"><?php echo esc_html($trust_text); ?></p>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
