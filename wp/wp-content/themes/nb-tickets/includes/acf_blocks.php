<?php
/*
 * Copyright (c) 2022. Designed and built by Zachary Berridge.
 */
if ( ! class_exists('ZB_Blocks')):

    class ZB_Blocks {

	    public static function zb_register_blocks_from_json(){
		    if (!function_exists('acf_register_block_type') ) {
			    return;
		    }

		    $blocks_path = glob(get_stylesheet_directory() . '/json/blocks/*.json');
		    $blocks_json = array_map( 'file_get_contents', $blocks_path );
		    $blocks_arrays = array_map( function( $blocks_json ) {return json_decode( $blocks_json, true ); }, $blocks_json );
            //var_dump($blocks_arrays);
		    foreach($blocks_arrays as $block_array) {
			    acf_register_block_type($block_array);
		    }
	    }
    }

endif;

add_action( 'init', [ 'ZB_Blocks', 'zb_register_blocks_from_json' ]);

?>