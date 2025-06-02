<?php
/*
 * 
 * Extends WP REST API.
 * Provides data for frontend post retrieval.
 * 
 */

if ( ! class_exists('ZB_RestEndpoints')):

    class ZB_RestEndpoints extends WP_REST_Controller {

        public function __construct()
        {

            $this->addProjectListingRoute();

        }

        private function addProjectListingRoute(){
            register_rest_route('nbps/v1', 'projects', array(
                'methods' => 'GET',
                'callback' => array ($this, 'getProjects'),
                'permission_callback' => '__return_true'
            ));
        }

        public function getProjects(WP_REST_REQUEST $request){


            $response = [];

            if ( $request['full_count'] == 'true') {
                 $post_count = wp_count_posts('project');
                 $response = $post_count->publish;
            } else {
                $count = $request[ 'count' ];
                $skip = $request[ 'skip' ];
                
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
                    $response[$post->ID]['description'] = wp_kses_post( wp_trim_words( get_field( 'description', $post->ID ), 20, '' ) );
                    $response[$post->ID]['post_date'] = get_the_date('F d, Y', $post->ID);
                    //$due_date = get_field( 'due_date', $post->ID );
                    $response[$post->ID]['due_date'] = get_field( 'due_date', $post->ID ); 
                    //$start_date = get_post_field( 'start_date', $post->ID );
                    $response[$post->ID]['start_date'] = get_field( 'start_date', $post->ID );
                    $response[$post->ID]['priority'] = get_post_field( 'priority', $post->ID );
                    $response[$post->ID]['permalink'] = get_permalink( $post->ID );


                endforeach;
            }

            return $response;
		}

    }

endif;

function initiate_rest_functions(){
	$rest_functions = new ZB_RestEndpoints();
}

add_action('rest_api_init', 'initiate_rest_functions');