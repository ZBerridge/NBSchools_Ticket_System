<?php
/*
*
*  Custom Walker for the Main Nav, to bring it in line with Materialize's markup
*
*/

if ( ! class_exists('ZB_MainNav_Walker')):
    class ZB_MainNav_Walker extends Walker_Nav_Menu {
        // Displays start of an element. E.g '<li> Item Name'
        // @see Walker::start_el()
        function start_el(&$output, $item, $depth=0, $args=[], $id=0) {

            $current_id = get_the_id();
            if ($item->url) {
                if((int)$item->object_id === $current_id) {
                    $output .= '<li class="nav-item active"><a href="' . $item->url . '">';
                } else {
                    $output .= '<li class="nav-item"><a class="nav-link" href="' . $item->url . '">';
                }
            }

            $output .= $item->title;

            $output .= '</a>';
        }
    }
endif;