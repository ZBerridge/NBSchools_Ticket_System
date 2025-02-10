<?php
/**
 * Template for new user registration
 * Author: Zack Berridge
 * Year: 2025
 * 
 */

 include_once ( get_stylesheet_directory() . '/includes/registration.php');

if(isset($_POST['submit']))
{   
    $new_user = new ZB_Registration($_POST);
} 
?>
<div class="row">
    <div class="card col s12">
        <?php //echo json_encode($_POST);?>
        <form name="registerform" id="registerform" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" novalidate="novalidate">
          <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input placeholder="Username" id="user_login" name="user_login" value="" size="20" type="text" class="validate">
                <label for="user_login">Username</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">person</i>
                <input placeholder="First Name" id="first_name" name="first_name" value="" size="20" type="text">
                <label for="first_name">First Name</label>
            </div>
            <div class="input-field col s12">
                <input placeholder="Last Name" id="last_name" name="last_name" value="" size="20" type="text">
                <label for="last_name">last_name Name</label>
            </div>
            <div class="input-field col s12">
                <label for="user_email">NBPS Email</label>
                <input type="email" name="user_email" id="user_email" class="input" value="" size="25" autocomplete="email" required="required">
            </div>
            <div class="input-field col s12">
                <input id="password" type="password" name="password" value="" size="20" type="text" class="validate">
                <label for="password" class="">Password</label>
            </div>
            <div class="input-field col s12">
                <input id="confirm-password" type="password" value="" size="20" type="text" class="validate">
                <label for="confirm-password" class="">Confirm Password</label>
            </div>
            </div>
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light">
                        <input class="white-text" type="submit" name="action" value="Submit">
                        <i class="material-icons right">send</i>
                    </button>
                    <input type="hidden" name="redirect_to" value="<?php echo esc_url( '/' ); ?>" />
                </div>
            </div>
        </form>
    </div>
</div>