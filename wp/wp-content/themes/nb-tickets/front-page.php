<?php
/**
 * Front Page Template File
 *
 */
get_header();

get_template_part( 'partials/nav-bar' );
?>
<div class="container">
<?php

if( is_user_logged_in() ):
    the_content();
else:    
    get_template_part( 'partials/login-link' );
endif;

get_template_part( 'partials/action-btn' );
?>
</div>
<?php
get_template_part( 'partials/footer-nav' );
get_template_part( 'partials/footer-author' );
get_footer();