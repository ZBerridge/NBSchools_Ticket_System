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

?>
<div id="nav-wrap" class="container-fluid px-0">
<?php
get_template_part( 'partials/nav-bar' );
?>
</div>
<div class="container archive">
<?php

if( !is_user_logged_in() ):
    get_template_part( 'partials/login-link' );
else:

    $post_type = ZB_Helpers::get_archive_post_type();
    ?><pre><?php echo ($post_type); ?></span><?php
   
endif;
?>

</div>
<?php
get_template_part( 'partials/footer-nav' );
get_template_part( 'partials/footer-author' );
get_footer();