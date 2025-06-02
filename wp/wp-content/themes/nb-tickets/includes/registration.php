<?php
/*
 * 
 * New User Registration.
 * Registers new user as 'stakeholder'.
 * 
 */

if ( ! class_exists('ZB_Registration')):

    class ZB_Registration {

        // Methods
        public function __construct()
        {

        }

        public function register_user($user) {
            $username = $user['user_login'];
            $firstname = $user['first_name'];
            $lastname = $user['last_name'];
            $password = $user['user_pass'];
            $email = $user['user_email'];

            $response = false;

            if (username_exists($username) == null && email_exists($email) == false) {
                
                // Create and fill User data array
                $new_user = [];

                $new_user[ "user_pass" ] = $password;
                $new_user[ "user_login" ] = $username;
                $new_user[ "user_nicename" ] = $firstname . " " . $lastname;
                $new_user[ "user_email" ] = $email;
                $new_user[ "first_name" ] = $firstname;
                $new_user[ "last_name" ] = $lastname;

                // Create the new user
                $user_id = wp_insert_user($new_user);

                // Get current user object
                $user = get_user_by('id', $user_id);

                if($user !== false) {
                    $response = true;
                }

                // Remove role
                $user->remove_role('subscriber');

                // Add role
                $user->add_role('stake_holder');
            }

            return $response;
        }
    }

endif;