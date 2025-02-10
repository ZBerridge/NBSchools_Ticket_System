<?php
/*
*
*  Registers and Enqueues Scripts and CSS
*
*/

if ( ! class_exists('ZB_Scripts')):

    class ZB_Scripts {

        public static function zb_register_scripts(){
            // TODO: register AJAX endpoint for forms, etc...
        }

        public static function zb_enqueue_scripts_and_styles()
        {
            $frontend_build_time = filemtime( get_template_directory() . '/frontend/dist/.' );
            wp_enqueue_style('main', get_template_directory_uri() . '/frontend/dist/css/main.css', [], $frontend_build_time, false);
            wp_enqueue_script('vendors', get_template_directory_uri() . '/frontend/dist/scripts/vendors.js', [], $frontend_build_time, true);
            wp_enqueue_script('main', get_template_directory_uri() . '/frontend/dist/scripts/main.js', [], $frontend_build_time, true);
        }


        public static function zb_remove_wp_block_library_css(){
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
        } 

    }

endif;

add_action( 'wp_enqueue_scripts', [ 'ZB_Scripts', 'zb_enqueue_scripts_and_styles' ], 100 );
add_action( 'wp_enqueue_scripts', [ 'ZB_Scripts', 'zb_remove_wp_block_library_css' ], 100 );

?>