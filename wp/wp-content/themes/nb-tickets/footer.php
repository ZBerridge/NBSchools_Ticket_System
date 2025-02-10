<?php
/**
 * Template for displaying footer
 *
 * Displays the foot element, including scripts
 *
 * @package Wordpress
 *
 * @subpackage zberridge
 *
 */
?>
<style>
    <?php the_field( 'custom_css', 'option' ); ?>
</style>
</body>
<?php
wp_footer();
?>
</html>