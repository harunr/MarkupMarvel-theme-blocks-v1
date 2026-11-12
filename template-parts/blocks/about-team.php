<?php
// 1. Fetch the correct ACF data for the Team Block
$team_title   = get_field('team_title') ?: 'Let’s meet our team';
$team_button  = get_field('team_button');
$team_members = get_field('team_members') ?: []; // Fetch the repeater array
?>

<div class="team-wrap wp-block-acf-about-team"
     data-team-title="<?php echo esc_attr($team_title); ?>"
     data-team-button='<?php echo esc_attr(wp_json_encode($team_button)); ?>'
     data-team-members='<?php echo esc_attr(wp_json_encode($team_members)); ?>'>

    <h2><?php echo esc_html($team_title); ?></h2>

    <?php if ( have_rows('team_members') ) : ?>
        <div class="team-members-admin-preview" style="display:flex;flex-wrap:wrap;gap:20px;">
            <?php while ( have_rows('team_members') ) : the_row();
                $member_image = get_sub_field('image');
                $member_name  = get_sub_field('name');
                $member_role  = get_sub_field('role');
            ?>
                <div class="team-member-admin-preview" style="width:140px;text-align:center;">
                    <?php if ( $member_image ) : ?>
                        <img src="<?php echo esc_url( $member_image['sizes']['thumbnail'] ?? $member_image['url'] ); ?>" alt="<?php echo esc_attr( $member_image['alt'] ?: $member_name ); ?>" style="width:80px;height:80px;object-fit:cover;border-radius:50%;">
                    <?php endif; ?>
                    <p style="margin:8px 0 0;font-weight:600;"><?php echo esc_html($member_name); ?></p>
                    <p style="margin:0;font-size:12px;color:#666;"><?php echo esc_html($member_role); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p><em>No team members added yet.</em></p>
    <?php endif; ?>

    </div>