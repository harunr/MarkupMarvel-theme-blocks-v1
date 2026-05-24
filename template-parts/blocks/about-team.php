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
    
    </div>