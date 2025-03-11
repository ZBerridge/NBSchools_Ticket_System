<?php
/**
 * Template for new user registration
 * Author: Zack Berridge
 * Year: 2025
 * 
 */

include ( get_stylesheet_directory() . '/includes/registration.php');

$response_url = 'https://' . $_SERVER['SERVER_NAME'];
$submission_success = true;

if(isset($_POST['submit']))
{   
    $new_user = new ZB_Registration;
    $submission_success = $new_user->register_user($_POST);
    if($submission_success == true) {
        $response_url .= $_SERVER['REQUEST_URI'];
    }
} 
?>
<div class="row">
    <div class="card col s12 z-depth-5">
        <?php 
            //if($submission_success == false):
            //    ?>
                <div class="row">
                    <div class="col s12">
                        <span class="form-error">There was a problem with your submission.  Please check your information and try again.  If you feel this is in error, contact your system administrator.</span>
                    </div>
                </div>
                <?php
            //endif;
        ?>
        <form name="registerform" id="registerform" action="<?php //echo $response_url; ?>" method="POST" novalidate="novalidate">
          <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input placeholder="Username" id="user_login" name="user_login" value="" size="20" type="text" class="validate" required>
                <label for="user_login">Username</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">person</i>
                <input placeholder="First Name" id="first_name" name="first_name" value="" size="20" type="text" class="validate" required>
                <label for="first_name">First Name</label>
            </div>
            <div class="input-field col s12">
                <input placeholder="Last Name" id="last_name" name="last_name" value="" size="20" type="text" class="validate" required>
                <label for="last_name">Last Name</label>
            </div>
            <div class="input-field col s12">
                <label for="user_email">NBPS Email</label>
                <input type="email" name="user_email" id="user_email" value="" size="25" autocomplete="email" class="validate" required>
            </div>
            <div class="input-field col s12">
                <input id="password" type="password" name="user_pass" value="" size="20" type="text" class="validate" required>
                <label for="password" class="">Password</label>
            </div>
            <div class="input-field col s12">
                <input id="confirm-password" type="password" value="" size="20" type="text" class="validate" required>
                <label for="confirm-password" class="">Confirm Password</label>
            </div>
            </div>
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light submit">
                        <input class="white-text" type="submit" name="submit" value="Submit">
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>