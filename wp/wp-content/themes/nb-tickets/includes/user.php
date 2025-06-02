<?php

/**
 * 
 * Simple 'Ticket_User' class for new user registration
 * 
 */

 if( !class_exists( 'Ticket_User') ):

    class Ticket_User {
        // Properties
        private $username;
        private $first_name;
        private $last_name;
        private $email;
        private $password;

        // Methods
        function __construct(array $user) {

            $this->username = $user['username'];
            $this->first_name = $user['first_name'];
            $this->last_name = $user['last_name'];
            $this->password = $user['password'];

        }

        /**
         * Get the value of username
         */ 
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Get the value of first_name
         */ 
        public function getFirstName()
        {
                return $this->first_name;
        }

        /**
         * Get the value of last_name
         */ 
        public function getLastName()
        {
                return $this->last_name;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }
        
        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

    }

 endif;