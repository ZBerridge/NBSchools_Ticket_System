<?php
/**
 * Generic archive template
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
    get_template_part( 'archives/' . $post_type );
   
endif;

get_template_part( 'partials/action-btn' );
?>

</div>
<?php
get_template_part( 'partials/footer-nav' );
get_template_part( 'partials/footer-author' );
get_footer();