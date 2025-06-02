<?php
/*
 * Copyright (c) 2025. Designed and built by Zachary Berridge.
 */

if ( ! class_exists('ZB_User_Roles')):

    class ZB_User_Roles {

        public function __construct(){
            $this-> zb_add_user_roles();
            $this-> zb_update_user_roles('administrator');
            $this-> zb_update_user_roles('stake_holder');
        }

        private function zb_add_user_roles(){

            add_role('stake_holder', 'Stake Holder', array(
                'read' => true,
                'create_posts' => true,
                'delete_posts' => false,
            ));
        }

        private function zb_update_user_roles($role){
            $role = get_role($role);
            $role->add_cap('read_project');
            $role->add_cap('edit_project');
            $role->add_cap('publish_project');
            $role->add_cap('edit_others_project');
            $role->add_cap('read_private_project');
            $role->add_cap('delete_project');
        }

    }

endif;

function init_user_functions(){
	$user_functions = new ZB_User_Roles();
}

add_action('admin_init', 'init_user_functions', 0);