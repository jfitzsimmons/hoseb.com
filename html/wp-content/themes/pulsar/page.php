<?php get_header(); ?>

<div class="page-section clearfix">
	<div class="page-wrapper">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 

        <div class="page-content">
            <?php if ( has_post_thumbnail()) {
                echo get_the_post_thumbnail($post->ID, 'single-page-thumbnail'); 
            } ?>
            
            <h2><?php the_title(); ?></h2>
            <div class="post-meta-data">
                <div class="single-published-by">
                    <span>PUBLISHED BY: <?php the_author(); ?></span>
                </div>
            </div>
            <?php the_content('') ?>
            
            <div class="post-meta-data-bottom">
                <div class="single-tags">
                    <span>TAGS: <?php the_tags(); ?></span>
                </div>
            </div>
            
            <div class="comments-divider"></div>
            
            <div class="comments">
                <?php comments_template(); ?> 
            </div>
        </div>
        
		<?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>
        
        <?php get_sidebar('page'); ?>
        
        <div class="clr"></div>
        
    </div>
	
</div>
	
<?php get_footer(); ?>