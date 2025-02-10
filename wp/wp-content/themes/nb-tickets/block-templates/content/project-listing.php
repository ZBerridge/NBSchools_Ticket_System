<?php
/*
 * Copyright (c) 2023. Designed and built by Zachary Berridge.
 * 
 * Vue.js powered block to retrieve and render a gallery of user selected images.
 * 
 */

$section_id = get_field('section_id');
$section_id = str_replace(' ', '_', strtolower( $section_id ) );
$section_id = str_replace(',', '_', strtolower( $section_id ) );
$section_id = str_replace('.', '_', strtolower( $section_id ) );

?>

<section class="vue-project-listing-block" id="vue-project-listing" data-id="<?php echo($section_id); ?>">
</section>