<?php
/**
 * The header for our theme
 *
 * @package Webtricker_wp
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">

    <!-- Preconnect for Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Hardcoded Favicon Fallback -->
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/svgs/fevicon.svg">

    <!-- WordPress dynamically injects all your enqueued CSS and JS here -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<main class="main-wrap">
    <!--  Beginning header section  -->
    <header class="main-header-section">
        <div class="common-wrap clear">
            <div class="header-inner flex">
                <div class="header-logo-wrap flex">
                    
                    <div class="header-logo">
                        <?php 
                        // Allows dynamic logo uploads via the WP Customizer
                        if ( has_custom_logo() ) {
                            the_custom_logo();
                        } else {
                            // Fallback to your static SVG if no logo is set in the dashboard
                            ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/main-logo.svg" alt="<?php bloginfo( 'name' ); ?> Logo">
                            </a>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="hamburger-wrap flex">
                        <div class="hamburger">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>