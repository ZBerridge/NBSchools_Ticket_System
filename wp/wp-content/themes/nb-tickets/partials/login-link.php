<?php
/**
* Template Name: NBPS Login Page
*
* @package NBPS Ticket System
* @since 1.0
*/

// ACF Fields

$login_link_title = get_field('login_link_title', 'option');
$login_link_description = get_field('login_link_description', 'option');
$login_link_url = get_field('login_link_url', 'option');
$login_link_text = get_field('login_link_text', 'option');
$registration_link_text = get_field('reg_link_text', 'option');
$registration_link_url = get_field('reg_link_url', 'option');

?>
<div class="row">
    <div class="col s12 m6 push-m3">
      <div class="card blue-grey lighten-1">
        <div class="card-content white-text">
          <span class="card-title"><?php echo( $login_link_title ); ?></span>
          <p><?php echo( $login_link_description ); ?></p>
        </div>
        <div class="card-action">
          <a href="<?php echo( $login_link_url ); ?>">
            <button class="btn waves-effect waves-light amber-text blue-grey darken-1">
              <?php echo( $login_link_text) ?>
            </button>
          </a>
          <span class="pr-3 amber-text">Or...</span>
          <a href="<?php echo( $registration_link_url ); ?>">
            <button class="btn waves-effect waves-light amber-text blue-grey darken-1">
              <?php echo( $registration_link_text) ?>
            </button>
          </a>
        </div>
      </div>
    </div>
</div>