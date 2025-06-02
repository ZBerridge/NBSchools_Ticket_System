<?php
/*
 * Copyright (c) 2022. Designed and built by Zachary Berridge.
 */

if ( ! class_exists('ZB_Post_Types')):

    class ZB_Post_Types {

    public static function zb_get_post_types(){

        $post_types_paths = glob(get_stylesheet_directory() . '/json/post_types/*.json');
        $post_types_json = array_map( 'file_get_contents', $post_types_paths );
        $post_types_arrays = array_map( function( $post_types_json ) {return json_decode( $post_types_json, true ); }, $post_types_json );

        foreach($post_types_arrays as $post_type_array) {
            register_post_type($post_type_array["post_type"], $post_type_array["args"]);
        }
    }
}

endif;

add_action( 'init', [ 'ZB_Post_Types', 'zb_get_post_types' ], 0 );