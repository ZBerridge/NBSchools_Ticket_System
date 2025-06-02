<?php
/*
 * Copyright (c) 2023. Designed and built by Zachary Berridge.
 */

if ( ! class_exists('ZB_Helpers')):

	class ZB_Helpers {

		public static function zb_hex_to_rgba( $color, $opacity = false ){
			$default = 'rgb(0,0,0)';

			//Return default if no color provided
			if(empty($color))
				return $default;

			//Sanitize $color if "#" is provided
			if ($color[0] == '#' ) {
				$color = substr( $color, 1 );
			}

			//Check if color has 6 or 3 characters and get values
			if (strlen($color) == 6) {
				$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
			} elseif ( strlen( $color ) == 3 ) {
				$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
			} else {
				return $default;
			}

			//Convert hexadec to rgb
			$rgb =  array_map('hexdec', $hex);

			//Check if opacity is set(rgba or rgb)
			if($opacity){
				if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
				$output = 'rgb('.implode(",",$rgb).')';
			}

			//Return rgb(a) color string
			return $output;
		}

		public static function get_archive_post_type() {
			return is_archive() ? get_queried_object()->name : false;
		}

		public static function generate_random_string($length = 10) {

			return substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);

		}


        public static function dateFix($date){

			//$ret_date = substr($date, 0, 4) . "/" . substr($date, 4, 2) . "/" . substr($date, 6, 2);
            //return $ret_date;
			return $date;

        }
	}

endif;