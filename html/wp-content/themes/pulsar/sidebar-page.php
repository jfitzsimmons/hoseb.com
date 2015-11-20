<div class="sidebar hide-for-small">

    <div class="post-navigation  hide-for-small">
    	<h4>Post navigation</h4>
        <div class="previous-post">
			<?php previous_post_link('&larr; %link'); ?>
            </div>
            <div class="next-post">
            <?php next_post_link('%link &rarr;'); ?>
        </div>
    </div>
    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Page Sidebar') ) ?> 
</div>