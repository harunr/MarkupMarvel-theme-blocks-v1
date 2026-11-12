<?php
/**
 * Workflow Trust Block Template (Payment / PM Tool Logos).
 * Path: template-parts/blocks/workflow-trust.php
 */

// 1. Fetch ALL your ACF data at the top
$heading       = get_field('heading') ?: '';
$payment_label = get_field('payment_label') ?: 'Payment';
$pm_label      = get_field('pm_label') ?: 'Communication, Design & Project Management';

if (!function_exists('markupmarvel_build_logo_list')) {
    function markupmarvel_build_logo_list($repeater_rows) {
        $logos = array();
        if ( ! $repeater_rows ) {
            return $logos;
        }
        foreach ( $repeater_rows as $row ) {
            $image = $row['logo_image'] ?? null;
            if ( ! $image ) {
                continue;
            }
            $name = trim($row['logo_name'] ?? '');
            $logos[] = array(
                'url' => $image['url'],
                'alt' => $name ?: ($image['alt'] ?: ''),
            );
        }
        return $logos;
    }
}

$payment_logos = markupmarvel_build_logo_list( get_field('payment_logos') );
$pm_logos      = markupmarvel_build_logo_list( get_field('pm_logos') );
?>

<div class="workflow-trust-wrap wp-block-acf-workflow-trust"
     data-heading="<?php echo esc_attr($heading); ?>"
     data-payment-label="<?php echo esc_attr($payment_label); ?>"
     data-pm-label="<?php echo esc_attr($pm_label); ?>"
     data-payment-logos='<?php echo esc_attr(wp_json_encode($payment_logos)); ?>'
     data-pm-logos='<?php echo esc_attr(wp_json_encode($pm_logos)); ?>'>

    <div class="common-wrap clear">
        <div class="workflow-trust-inner">

            <?php if ($heading) : ?>
                <div class="workflow-trust-title common-title">
                    <h2 class="split-heading justify-center"><?php echo esc_html($heading); ?></h2>
                </div>
            <?php endif; ?>

            <div class="workflow-trust-groups">

                <?php if ($payment_logos) : ?>
                    <div class="workflow-trust-group">
                        <p class="workflow-trust-label"><?php echo esc_html($payment_label); ?></p>
                        <div class="workflow-trust-logos">
                            <?php foreach ($payment_logos as $logo) : ?>
                                <div class="workflow-trust-logo-item">
                                    <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($pm_logos) : ?>
                    <div class="workflow-trust-group">
                        <p class="workflow-trust-label"><?php echo esc_html($pm_label); ?></p>
                        <div class="workflow-trust-logos">
                            <?php foreach ($pm_logos as $logo) : ?>
                                <div class="workflow-trust-logo-item">
                                    <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
