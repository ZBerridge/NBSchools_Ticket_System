<?php
/*
 * Copyright (c) 2024. Designed and built by Zachary Berridge.
 */

//include_once ( __DIR__ . '/includes/custom_post_types.php');
//include_once ( __DIR__ . '/includes/acf_blocks.php' );
//include_once ( __DIR__ . '/includes/theme_menus.php' );
//include_once ( __DIR__ . '/includes/nav_walkers.php' );
//include_once ( __DIR__ . '/includes/acf_img_srscets.php' );
//include_once ( __DIR__ . '/includes/acf_options_page.php' );
//include_once ( __DIR__ . '/includes/scripts.php' );

show_admin_bar( false );

remove_filter ('acf_the_content', 'wpautop');

// Wp v4.7.1 and higher
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype( $filename, $mimes );
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];

}, 10, 4 );

function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );