<?php
/**
 * The template for displaying all single pages
 */

get_header();
?>

    <!-- Beginning main content section  -->
    <section class="main-content-wrap">
        <?php
        
        while ( have_posts() ) :
            the_post();
            // This outputs all the Gutenberg blocks you add in the WP Editor
            the_content();

        endwhile; // End of the loop.
        ?>

    </section>

<?php
get_footer();