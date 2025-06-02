<?php 
// Template for custom login form.

?>
<div class="valign-wrapper">
  <div class="row">
    <div class="card col s12"">
      <form class="center-align" name="loginform" id="loginform" action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" method="post">
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input placeholder="Username" id="user_login" name="log" value="" size="20" type="text" class="validate">
            <label for="user_login">Username</label>
          </div>
          <div class="input-field col s12">
              <input type="password" class="validate" type="password" name="pwd" id="user_pass" class="input" value="" size="20" />
              <label for="user_pass">Password</label>
          </div>
          <div class="input-field col s12">
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
              <i class="material-icons right">send</i>
            </button>
            <input type="hidden" name="redirect_to" value="<?php echo esc_url( '/' ); ?>" />
          </div>
        </div>
      </form>
  </div>
</div>
</div>