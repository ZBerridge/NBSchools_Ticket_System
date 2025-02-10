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
<div class="container four-oh-four">
    <div class="row">
        <h1>404</h1>
    </div>
</div>
<?php
get_template_part( 'partials/footer-nav' );
get_template_part( 'partials/footer-author' );
get_footer();