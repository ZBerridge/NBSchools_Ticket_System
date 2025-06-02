<?php
/*
 * Copyright (c) 2023. Designed and built by Zachary Berridge.
 * 
 * Simple text area block.
 * 
 */

$section_id = get_field('section_id');
$section_title = get_field('title');
$section_text = get_field('text');


?>

<section class="text-section" id="<?php echo($section_id); ?>">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card horizontal">
                    <div class="card-stacked">
                        <div class="card-content">
                            <?php if(strlen($section_title > 0)): ?>
                                <span class="card-title"><?php echo($section_title); ?></span>
                            <?php endif; ?>
                            <p><?php echo($section_text); ?></p>
                        </div>
                        <!--<div class="card-action">
                        <a href="#">This is a link</a>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>