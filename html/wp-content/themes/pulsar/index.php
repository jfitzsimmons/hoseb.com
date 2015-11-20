<?php get_header(); 

	global $pulsar_data; //fetch options stored in $pulsar_data
	
	//fetch first parallax data
	$pulsar_first_parallax = $pulsar_data['first_parallax'];
	$pulsar_first_parallax_template = $pulsar_data['first_parallax_template'];
	
	//fetch first page data
	$pulsar_first_content_page = $pulsar_data['first_content_page'];
	$pulsar_first_content_page_category = $pulsar_data['first_content_page_category'];
	$pulsar_first_page_template = $pulsar_data['first_page_template'];
	$pulsar_first_page_subtitle_one = $pulsar_data['first_page_subtitle_one'];
	$pulsar_first_page_subtitle_two = $pulsar_data['first_page_subtitle_two'];
	$pulsar_first_page_description = $pulsar_data['first_page_description'];
	
	//fetch second parallax data
	$pulsar_second_parallax = $pulsar_data['second_parallax'];
	$pulsar_second_parallax_template = $pulsar_data['second_parallax_template'];
	
	//fetch second page data
	$pulsar_second_content_page = $pulsar_data['second_content_page'];
	$pulsar_second_content_page_category = $pulsar_data['second_content_page_category'];
	$pulsar_second_page_template = $pulsar_data['second_page_template'];
	$pulsar_second_page_subtitle_one = $pulsar_data['second_page_subtitle_one'];
	$pulsar_second_page_subtitle_two = $pulsar_data['second_page_subtitle_two'];
	$pulsar_second_page_description = $pulsar_data['second_page_description'];
	
	//fetch third parallax data
	$pulsar_third_parallax = $pulsar_data['third_parallax'];
	$pulsar_third_parallax_template = $pulsar_data['third_parallax_template'];
	
	//fetch third page data
	$pulsar_third_content_page = $pulsar_data['third_content_page'];
	$pulsar_third_content_page_category = $pulsar_data['third_content_page_category'];
	$pulsar_third_page_template = $pulsar_data['third_page_template'];
	$pulsar_third_page_subtitle_one = $pulsar_data['third_page_subtitle_one'];
	$pulsar_third_page_subtitle_two = $pulsar_data['third_page_subtitle_two'];
	$pulsar_third_page_description = $pulsar_data['third_page_description'];
	
	//fetch fourth parallax data
	$pulsar_fourth_parallax = $pulsar_data['fourth_parallax'];
	$pulsar_fourth_parallax_template = $pulsar_data['fourth_parallax_template'];
	
	//fetch fourth page data
	$pulsar_fourth_content_page = $pulsar_data['fourth_content_page'];
	$pulsar_fourth_content_page_category = $pulsar_data['fourth_content_page_category'];
	$pulsar_fourth_page_template = $pulsar_data['fourth_page_template'];
	$pulsar_fourth_page_subtitle_one = $pulsar_data['fourth_page_subtitle_one'];
	$pulsar_fourth_page_subtitle_two = $pulsar_data['fourth_page_subtitle_two'];
	$pulsar_fourth_page_description = $pulsar_data['fourth_page_description'];
	
	//fetch fifth parallax data
	$pulsar_fifth_parallax = $pulsar_data['fifth_parallax'];
	$pulsar_fifth_parallax_template = $pulsar_data['fifth_parallax_template'];
	
	//fetch fifth page data
	$pulsar_fifth_content_page = $pulsar_data['fifth_content_page'];
	$pulsar_fifth_content_page_category = $pulsar_data['fifth_content_page_category'];
	$pulsar_fifth_page_template = $pulsar_data['fifth_page_template'];
	$pulsar_fifth_page_subtitle_one = $pulsar_data['fifth_page_subtitle_one'];
	$pulsar_fifth_page_subtitle_two = $pulsar_data['fifth_page_subtitle_two'];
	$pulsar_fifth_page_description = $pulsar_data['fifth_page_description'];
	
	//fetch sixth parallax data
	$pulsar_sixth_parallax = $pulsar_data['sixth_parallax'];
	$pulsar_sixth_parallax_template = $pulsar_data['sixth_parallax_template'];
	
	//fetch sixth page data
	$pulsar_sixth_content_page = $pulsar_data['sixth_content_page'];
	$pulsar_sixth_content_page_category = $pulsar_data['sixth_content_page_category'];
	$pulsar_sixth_page_template = $pulsar_data['sixth_page_template'];
	$pulsar_sixth_page_subtitle_one = $pulsar_data['sixth_page_subtitle_one'];
	$pulsar_sixth_page_subtitle_two = $pulsar_data['sixth_page_subtitle_two'];
	$pulsar_sixth_page_description = $pulsar_data['sixth_page_description'];

	
	// First Parallax Section
	if (isset($pulsar_first_parallax[0]) && $pulsar_first_parallax[1]) {
		$page_id_parallax_one = pulsar_get_ID_by_page_name($pulsar_first_parallax); // 123 should be replaced with a specific Page's id from your site, which you can find by mousing over the link to edit that Page on the Manage Pages admin page. The id will be embedded in the query string of the URL, e.g. page.php?action=edit&post=123.
		$page_data = get_page( $page_id_parallax_one ); // You must pass in a variable to the get_page function. If you pass in a value (e.g. get_page ( 123 ); ), WordPress will generate an error. By default, this will return an object.
			

		if ("parallax_two_template" == $pulsar_first_parallax_template ) {
			echo '
			<style>
			.section5 {
				background:#000 url('.wp_get_attachment_url(get_post_thumbnail_id( $page_id_parallax_one )).') 50% 0 no-repeat fixed;
			}
			</style>
			
			<div class="section5 black" id="skills">
				
				
				
				<div class="quote2 hide-for-520">
<div id="biotext">'. $page_data->post_content .'

<a id="resumeimage"  href="CorinneNagelResume.pdf" ></a>
<img src="'.get_template_directory_uri().'/images/cnspecific/purplefish.png" width="204" height="156" alt="Border" style="display:block; margin: 0 auto;">
</div>
					
						<img src="'.get_template_directory_uri().'/images/cnspecific/scuba02.png" id="scuba02" width="389" height="276" alt="Border">

				</div>
				<div class="quote2-pattern">
					<div class="quote2-shape"></div>
				</div>
			</div>';// echo the title
		}
		
	} else {
		echo '';
	}
	
	// First Page Section
	if (isset($pulsar_first_content_page[0]) && $pulsar_first_content_page[1]) {
		
		
		
//cnPortfolio		
		
		if ("portfolio_template" == $pulsar_first_page_template ) {
			$first_page_id = pulsar_get_ID_by_page_name($pulsar_first_content_page);
			$first_page_data = get_page( $first_page_id ); 
			echo '
			<div class="section2 black" id="'.$first_page_id.'">

				<div class="about-us-main" id="gallerynavtop">
					
					<div id="nav4" class="hide-for-small">
						<ul>
						
' ?>
<script type="text/javascript">
jQuery(function($) {
                                            $("#expressscriptfraud1-3").click(function(event) {
                                              $(".contentbox-wrapper-news-1").animate({"left":-($("#expressscriptfraud-1-3").position().left)}, "slow");
											  return false;
                                            });
											$("#testbest-places1-3").click(function(event) {
                                              $(".contentbox-wrapper-news-1").animate({"left":-($("#testbest-places-1-3").position().left)}, "slow");
											  return false;
                                            });
                                        });
</script>
<?php
                                global $post;
								$counter = 1;
								$firstCategoryID = get_cat_ID( $pulsar_first_content_page_category );
								$firstCategory = get_cat_slug($firstCategoryID);
                                $myposts = get_posts(array('category' => $firstCategoryID, 'posts_per_page'  => 500));
                                foreach( $myposts as $post ) :	setup_postdata($post); ?>
<script type="text/javascript">
                                        jQuery(function($) {
                                            $("#<?php $post_data = get_post($post->ID, ARRAY_A);
    $slug = $post_data['post_name']; echo $slug; ?>1-3").click(function(event) {
                                              $(".contentbox-wrapper-news-1").animate({"left":-($("#<?php echo $slug; ?>-1-3").position().left)}, "slow");
											  return false;
                                            });
                                        });
                                    </script>
<li><a id="<?php echo $slug; ?>1-3" href="#"><?php echo $counter ?></a></li>
<?php $counter++; ?>
<?php endforeach; ?>
<?php echo'

						</ul>
					</div>
					
				</div>
				<!-- <h2>'.$pulsar_first_page_subtitle_one.'</h2>
					<h3>'.$pulsar_first_page_subtitle_two.'</h3>
					<p>'.$pulsar_first_page_description.'</p> -->
				
				<div class="content_6 content">
					<div id="wrap25">
						<div id="content4">
							<div class="contentbox-wrapper-news-1">
							
							<!--gal item-->
							' ?>

<?php
								global $post;
								$counter = 1;
								$firstCategoryID = get_cat_ID( $pulsar_first_content_page_category );
								$firstCategory = get_cat_slug($firstCategoryID);
								$myposts = get_posts(array('category' => $firstCategoryID, 'posts_per_page'  => 500));
								foreach( $myposts as $post ) :	setup_postdata($post); ?>
<div id="<?php $post_data = get_post($post->ID, ARRAY_A);
    $slug = $post_data['post_name']; echo $slug; ?>-1-3" class="contentbox">
  <div class="article1">
    <div class="view2 third-effect flexcroll">
    
    <?php $VideoEmbed = get_post_meta($post->ID, 'VideoEmbed', true);
if ($VideoEmbed) {
?>
<?php echo $VideoEmbed; ?>

<?php } else { ?>

<?php if ( has_post_thumbnail()) {
												$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
												
												echo get_the_post_thumbnail($post->ID); 
												
											} ?>

<?php } ?>
    
    
    
    
    
      
    </div>
  </div>
  <div id="galleryinfo">
    <h2 ><a href="<?php the_permalink(); ?>">
      <?php the_title(); ?>
      </a></h2>
    <h3><?php echo get_post_meta($post->ID, 'pulsar_subtitle', true); ?></h3>
    <p><?php echo get_the_content(); ?></p>
  </div>
</div>
<!--gal item-->

<?php endforeach; ?>
                            
<?php echo'
								
							</div>			
						</div>		
					</div>
				</div>
			</div>';// echo the title
		}
		
//END cnPortfolio	


		
	} else {
		echo '';
	}
	
	// Second Parallax Section
	if (isset($pulsar_second_parallax[0]) && $pulsar_second_parallax[1]) {
		$page_id_parallax_two = pulsar_get_ID_by_page_name($pulsar_second_parallax); // 123 should be replaced with a specific Page's id from your site, which you can find by mousing over the link to edit that Page on the Manage Pages admin page. The id will be embedded in the query string of the URL, e.g. page.php?action=edit&post=123.
		$page_data = get_page( $page_id_parallax_two ); // You must pass in a variable to the get_page function. If you pass in a value (e.g. get_page ( 123 ); ), WordPress will generate an error. By default, this will return an object.
		if ("parallax_four_template" == $pulsar_second_parallax_template ) {
			echo '<div class="section9-2 black" id="about">
				
				
				<div class="quote4 hide-for-520">
				<div id="cnabouttext">
					<p>'. $page_data->post_content .'</p>
					</div>
				</div>
				<img src="'.get_template_directory_uri().'/images/cnspecific/cardshat.png" id="cardshat" width="389" height="90" alt="cardinals hat">
				
			</div>
			
			<style>
			.section9-2 {
				background:#fff url('.wp_get_attachment_url(get_post_thumbnail_id( $page_id_parallax_two )).') 50% 0 no-repeat fixed;
			}
			</style>';// echo the title
		}
		
	} else {
		echo '';
	}
	
	// Second Page Section
	if (isset($pulsar_second_content_page[0]) && $pulsar_second_content_page[1]) {
		
		if ("contact_template" == $pulsar_second_page_template ) {
			$second_page_id = pulsar_get_ID_by_page_name($pulsar_second_content_page);
			$second_page_data = get_page( $second_page_id ); 
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($second_page_id), 'full');
			echo'
            	<style>
					.section11 {
						background:#000 url('?> <?php echo $large_image_url[0] ?><?php echo') no-repeat;
					}
				</style> ' ?>
<?php 
			echo '<div class="section11 black" id="'.$second_page_id.'">
				
				<div class="contact11">
					<div class="contactW"><img src="'.get_template_directory_uri().'/images/cnspecific/partyhat.png" id="partyhat" width="389" height="155" alt="Border">
						<div class="contactWrap">
							' ?>
<div class="contactContent">
<div class="contactInfo">
  <?php $id=77; $post = get_page($id); $content = apply_filters('the_content', $post->post_content); echo $content;  ?>
</div>
<?php echo'
								<div class="contactForm">
									<h1>'.$pulsar_second_page_subtitle_two.'</h1>
									<form method="post" action="'.get_template_directory_uri().'/contact.php">
										<span>Name:</span>
										<label class="input"><img src="'.get_template_directory_uri().'/images/user.png" width="40" height="31" alt="Enter your Name">
										<input type="text" id="name" class="name" name="contactname" value=""/></label>
										<span>Email:</span>
										<label class="input"><img src="'.get_template_directory_uri().'/images/mail.png" width="40" height="31" alt="Enter your Email">
										<input type="text" id="email" class="email" name="email" value=""/></label>
										<span>Subject:</span>
										<label class="input"><img src="'.get_template_directory_uri().'/images/subject.png" width="40" height="31" alt="Enter your Subject">
										<input type="text" id="subject" class="subject" name="subject" value=""/></label>
										<span>Message:</span>
										<textarea rows="4" name="message" id="message" class="required" role="textbox" aria-required="true"></textarea>
										<input type="submit" value="Send Message" class="button23" name="submit" id="submitButton" title="Click here to submit your message!" />
									</form>
								</div>
							</div>
						</div>
						<div class="arrowback hide-for-small" >
							<nav>
								<ul>
									<li><a href="#homepage"><img src="'.get_template_directory_uri().'/images/arrow-back.png" width="99" height="68" alt="Go Back Up"></a></li>
								</ul>
							</nav>
						</div>
					</div>
					<div class="quote11-pattern"></div>
				</div>
			</div>';// echo the title
		}
	} else {
		echo '';
	}
	
	
		
	
	
get_footer(); ?>