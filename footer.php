<?php
/**
 * The template for displaying the footer
 *
 * @package Webtricker_wp
 */
?>
            <!-- Beginning footer section-->
            <footer class="main-footer-section">
                <div class="common-pattern">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="common-wrap clear">
                    <div class="footer-inner flex">
                        <div class="footer-main flex">
                            
                            <div class="footer-info">
                                <div class="footer-logo animate-from-bottom">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-mm.png" alt="<?php bloginfo( 'name' ); ?> Logo">
                                    </a>
                                </div>
                                <div class="footer-info-list animate-from-bottom">
                                    <ul>
                                        
                                        <!-- DYNAMIC WEBSITE -->
                                        <?php 
                                        $website = get_field('footer_website', 'option'); 
                                        if( $website ) : 
                                            // This strips the "https://" off the front just for the display text
                                            $display_url = preg_replace('#^https?://#', '', rtrim($website, '/'));
                                        ?>
                                            <li>
                                                <a href="<?php echo esc_url( $website ); ?>" target="_blank" rel="noopener noreferrer">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/internet.svg" alt="internet">
                                                    <span><?php echo esc_html( $display_url ); ?></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        
                                        <!-- DYNAMIC EMAIL -->
                                        <?php 
                                        $email = get_field('footer_email', 'option'); 
                                        if( $email ) : 
                                        ?>
                                            <li>
                                                <a href="mailto:<?php echo esc_attr( $email ); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/mail.svg" alt="mail">
                                                    <span><?php echo esc_html( $email ); ?></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        
                                        <!-- DYNAMIC PHONE NUMBER -->
                                        <?php 
                                        $phone = get_field('footer_phone', 'option'); 
                                        if( $phone ) : 
                                            // This safely removes spaces and dashes so mobile phones can dial it correctly
                                            $phone_link = preg_replace('/[^0-9+]/', '', $phone);
                                        ?>
                                            <li>
                                                <a href="tel:<?php echo esc_attr( $phone_link ); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/tel.svg" alt="phone">
                                                    <span><?php echo esc_html( $phone ); ?></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        
                                    </ul>
                                </div>
                            </div>

                            <div class="footer-widget-wrap flex">
                                
                                <div class="footer-widget animate-from-bottom">
                                    <h6>Company</h6>
                                    <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'footer-company',
                                        'container'      => false, // Removes the default <div> wrapper
                                        'menu_class'     => '',    // Removes default classes to keep your CSS clean
                                        'fallback_cb'    => false, // Doesn't show anything if no menu is assigned
                                    ) );
                                    ?>
                                </div>
                                
                                <div class="footer-widget animate-from-bottom">
                                    <h6>Project</h6>
                                    <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'footer-project',
                                        'container'      => false, // Removes the default <div> wrapper
                                        'menu_class'     => '',    // Removes default classes to keep your CSS clean
                                        'fallback_cb'    => false, // Doesn't show anything if no menu is assigned
                                    ) );
                                    ?>
                                </div>
                                
                                <div class="footer-widget animate-from-bottom">
                                    <h6>Support</h6>
                                    <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'footer-support',
                                        'container'      => false, // Removes the default <div> wrapper
                                        'menu_class'     => '',    // Removes default classes to keep your CSS clean
                                        'fallback_cb'    => false, // Doesn't show anything if no menu is assigned
                                    ) );
                                    ?>
                                </div>
                                
                                <div class="footer-widget big-widget social-widget animate-from-bottom">
                                    <h6>Social</h6>
                                    <ul>
                                        <li><a href="https://www.linkedin.com/company/webtricker" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/linkedin.svg" alt="linkedin"></a></li>
                                        <li><a href="https://www.instagram.com/webtricker/" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/instagram.svg" alt="instagram"></a></li>
                                        <li><a href="https://www.facebook.com/webtricker" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/facebook.svg" alt="facebook"></a></li>
                                        <li><a href="https://twitter.com/webtricker" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/twitter.svg" alt="twitter"></a></li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="footer-bottom animate-from-bottom">
                            <p>&copy; <?php echo wp_date('Y'); ?> Webtricker. All Rights Reserved</p>
                        </div>
                        
                    </div>
                </div>
            </footer>
            <!-- //End main footer section -->

            <!-- Overlay / Mobile Navigation -->
            <div class="navbar-wrap">
                <div class="navbar">
                    
                    <div class="navbar-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-mm.png" alt="<?php bloginfo( 'name' ); ?> Logo">
                        </a>
                    </div>
                    
                    <div class="nav-wrap flex">
                        
                        <div class="nav-social">
                            <div class="nav-social-line flex">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/LINE.svg" alt="line">
                            </div>
                            <ul>
                                <li><a href="https://www.facebook.com/webtricker" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/nav-fb.svg" alt="fb"></a></li>
                                <li><a href="https://twitter.com/webtricker" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/nav-tw.svg" alt="twitter"></a></li>
                                <li><a href="https://www.instagram.com/webtricker/" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/nav-insta.svg" alt="instagram"></a></li>
                                <li><a href="https://www.linkedin.com/company/webtricker" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/nav-ld.svg" alt="linkedin"></a></li>
                            </ul>
                        </div>
                        
                        <nav class="main-nav">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-1',
                                    'container'      => false,
                                    'fallback_cb'    => false,
                                )
                            );
                            ?>
                        </nav>
                        
                        <div class="nav-contact">
                            <ul>
                                <li><a href="https://www.webtricker.com"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/nav-web.svg" alt="web"> <span>www.webtricker.com</span></a></li>
                                <li><a href="mailto:info@webtricker.com"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/nav-mail.svg" alt="mail"> <span>info@webtricker.com</span></a></li>
                                <li><a href="tel:+8801407090991"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/nav-tel.svg" alt="tel"> <span>+8801407-090991</span></a></li>
                                <li>
                                    <a href="https://www.google.com.bd/maps/place/..." target="_blank" rel="noopener noreferrer">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/nav-address.svg" alt="address"> 
                                        <span>Probal Valley, Plot # 112-113, Block # I, Road # 5, Bashundhora R/A, Dhaka.</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.google.com/maps/place/..." target="_blank" rel="noopener noreferrer">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/nav-address.svg" alt="address"> 
                                        <span>Zia College mor, Bagerhata, Jamalpur</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>

        </main><!-- .main-wrap (Opened in header.php) -->

        <!-- WordPress dynamically injects all your footer scripts (GSAP, Slick, common-scripts.js) here -->
        <?php wp_footer(); ?>

    </body>
</html>