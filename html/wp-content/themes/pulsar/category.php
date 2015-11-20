<?php get_header(); ?>

<div class="page-section clearfix">
	<div class="page-wrapper">
    
        <h2 class="category-main-title"><?php the_category(' '); ?></h2> 
        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        

        <div class="category-content">
        	<a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail()) {
                    echo get_the_post_thumbnail($post->ID, 'category-thumbnail'); 
                } ?>
            </a>
            
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="post-meta-data">
                <div class="single-published-by">
                    <span>PUBLISHED BY: <?php the_author(); ?></span>
                </div>
            </div>
            <p><?php echo wp_trim_words( get_the_content(), 20 ); ?></p>
        </div>
        
		<?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>
        <div class="clr"></div>
        
    </div>
        
        
	
</div>
	
<?php get_footer(); ?>