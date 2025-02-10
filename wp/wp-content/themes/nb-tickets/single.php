
<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 */
get_header();

get_template_part( 'partials/nav-bar' );
?>
<div class="container">
<?php

if( is_user_logged_in() ):
    the_content();
endif;
?>
</div>
<?php
get_template_part( 'partials/footer-nav' );
get_template_part( 'partials/footer-author' );
get_footer();