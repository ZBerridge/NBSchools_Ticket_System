<?php
/**
* Template Name: NBPS Registration Page
*
* @package NBPS_Tickets
* @since Time_Immemorial 1.0
*/

get_header();

get_template_part( 'partials/nav-bar' );
?>
<div class="container">
<?php

if( !is_user_logged_in() ):

    get_template_part( 'templates/registration' );
    
endif;
?>

</div>
<?php
get_template_part( 'partials/footer-nav' );
get_template_part( 'partials/footer-author' );
get_footer();