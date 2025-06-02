<?php
/*
 * Copyright (c) 2025. Designed and built by Zachary Berridge.
 */

if ( ! class_exists('ZB_Queries')):

	class ZB_Queries {

        public static function ProjectListingQuery(int $count = 10, int $skip = 0) {
            $response = [];
            $args = array(
                'post_type' => 'project',
                'post_status' => 'publish',
                'posts_per_page' => $count,
                'offset' => $skip,
                'orderby' => 'post_date',
                'order' => 'DESC'
            );
            $posts = get_posts( $args );

            foreach ( $posts as $post ) :

                $response[$post->ID]['title'] = get_the_title( $post->ID );
                $response[$post->ID]['slug'] = get_post_field( 'post_name', $post->ID );
                $response[$post->ID]['post_id'] = $post->ID;
				$response[$post->ID]['description'] = wp_kses_post( wp_trim_words( get_field( 'description', $post->ID ), 100, '' ) );
				$response[$post->ID]['post_date'] = get_the_date('F d, Y', $post->ID);
                $due_date = get_post_field( 'due_date', $post->ID );
                $response[$post->ID]['due_date'] = ZB_Helpers::dateFix($due_date); 
                $start_date = get_post_field( 'start_date', $post->ID );
                $response[$post->ID]['start_date'] = ZB_Helpers::dateFix($start_date); 
                $response[$post->ID]['priority'] = get_post_field( 'priority', $post->ID );
                $response[$post->ID]['permalink'] = get_permalink( $post->ID );


            endforeach;

            return $response;
        }

    }

endif;