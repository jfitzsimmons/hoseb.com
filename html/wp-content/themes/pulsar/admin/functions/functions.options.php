<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories = array();  
		$of_categories_obj = get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp = array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages = array();
		$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp = array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select = array("parallax_one_template","parallax_two_template","parallax_three_template","parallax_four_template","parallax_five_template"); 
		$of_options_select_page = array("about_team_news_template","services_template","portfolio_template", "contact_template");
		$of_options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		$of_options_select_tmp = array_unshift($of_options_select, "Select Parallax Template:"); 
		$of_options_select_page_tmp = array_unshift($of_options_select_page, "Select Page Template:"); 
		$of_options_radio_tmp = array_unshift($of_options_radio, "Select a page:"); 
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" => "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr = wp_upload_dir();
		$all_uploads_path = $uploads_arr['path'];
		$all_uploads = get_option('of_uploads');
		$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$of_options[] = array( "name" => "General Settings",
					"type" => "heading");
					
$of_options[] = array( "name" => "Logo",
					"desc" => "Here you can upload your logo. *Note: maximum logo height is 38px",
					"id" => "uploaded_logo",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => "Custom Favicon",
					"desc" => "Here you can upload your favicon.",
					"id" => "uploaded_favicon",
					"std" => "",
					"type" => "media");	
					
$of_options[] = array( "name" => "Custom Loader",
					"desc" => "Here you can upload your loader. Keep in mind that the image has to be 50x50px and in .gif",
					"id" => "uploaded_loader",
					"std" => "",
					"type" => "media");	
					
$of_options[] = array( "name" => "Apple Touch Icons",
					"desc" => "",
					"id" => "apple_tocuh_icons",
					"std" => "<h3 style=\"margin: 0 0 10px;\">Apple Touch Icons</h3>
					This is the place where you can upload your apple touch icons.",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => "Apple Touch Icon 144x144 Precomposed",
					"desc" => "",
					"id" => "uploaded_apple_touch_icon_144x144_precomposed",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => "Apple Touch Icon 114x114 Precomposed",
					"desc" => "",
					"id" => "uploaded_apple_touch_icon_114x114_precomposed",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => "Apple Touch Icon 72x72 Precomposed",
					"desc" => "",
					"id" => "uploaded_apple_touch_icon_72x72_precomposed",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => "Apple Touch Icon 57x57 Precomposed",
					"desc" => "",
					"id" => "uploaded_apple_touch_icon_57x57_precomposed",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => "Apple Touch Icon",
					"desc" => "",
					"id" => "uploaded_apple_touch_icon",
					"std" => "",
					"type" => "media");
					
// Homepage Slideshow
$of_options[] = array( "name" => "Social Media",
					"type" => "heading");
					
$of_options[] = array( "name" => "Your Facebook URL",
					"desc" => "",
					"id" => "sm_profile_url_one",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "Your Twitter URL",
					"desc" => "",
					"id" => "sm_profile_url_two",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "Your Vimeo URL",
					"desc" => "",
					"id" => "sm_profile_url_three",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "Your Youtube URL",
					"desc" => "",
					"id" => "sm_profile_url_four",
					"std" => "",
					"type" => "text");
					
					
// Homepage Slideshow
$of_options[] = array( "name" => "Homepage Slideshow",
					"type" => "heading");
					
$of_options[] = array( "name" => "Create Your Homepage Slideshow",
					"desc" => "Unlimited slider with drag and drop sortings.",
					"id" => "pulsar_slider",
					"std" => "",
					"type" => "slider");
					
					
// Website Layout Manager				
$of_options[] = array( "name" => "Website Layout Manager",
					"type" => "heading");
					
					
/* First Parallax Section Options */	
$of_options[] = array( "name" => "First Parallax Section Options",
					"desc" => "Select if you want to see your first parallax section options.",
					"id" => "parallax_one_offline",
					"std" => 0,
          			"folds" => 1,
					"type" => "checkbox"); 
                                                                           
$of_options[] = array( "name" => "Select Your First Parallax Template",
					"desc" => "",
					"id" => "first_parallax_template",
					"std" => "Select parallax template:",
					"type" => "select",
          			"fold" => "parallax_one_offline", /* the checkbox hook */
					"options" => $of_options_select);
                                      
$of_options[] = array( "name" => "Select the first parallax page",
					"desc" => "A list of all pages on the site.",
					"id" => "first_parallax",
					"std" => "Select page:",
					"type" => "select",
          			"fold" => "parallax_one_offline", /* the checkbox hook */
					"options" => $of_pages);
					
					
/* First Page Section Options */	
$of_options[] = array( "name" => "First Page Section Options",
					"desc" => "Select if you want to see your first page options.",
					"id" => "page_one_offline",
					"std" => 0,
          			"folds" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Your First Page Subtitle 1",
					"desc" => "",
					"id" => "first_page_subtitle_one",
					"std" => "",
          			"fold" => "page_one_offline", /* the checkbox hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Your First Page Subtitle 2",
					"desc" => "",
					"id" => "first_page_subtitle_two",
					"std" => "",
          			"fold" => "page_one_offline", /* the checkbox hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Your First Page Description",
					"desc" => "",
					"id" => "first_page_description",
					"std" => "",
          			"fold" => "page_one_offline", /* the checkbox hook */
					"type" => "textarea"); 
                                                                           
$of_options[] = array( "name" => "Select Your First Page Template",
					"desc" => "",
					"id" => "first_page_template",
					"std" => "Select page template:",
					"type" => "select",
          			"fold" => "page_one_offline", /* the checkbox hook */
					"options" => $of_options_select_page);
                                      
$of_options[] = array( "name" => "Select the first content page",
					"desc" => "A list of all pages on the site.",
					"id" => "first_content_page",
					"std" => "Select page:",
					"type" => "select",
          			"fold" => "page_one_offline", /* the checkbox hook */
					"options" => $of_pages);
                                      
$of_options[] = array( "name" => "Select the first content page category",
					"desc" => "This is the category where you'll publish the posts for your first section. For example, if your first section is About Us, it would be the best that you create a new category called 'About Us Section'. All the posts you want to see on your first section need to be published under ths category!",
					"id" => "first_content_page_category",
					"std" => "Select category:",
					"type" => "select",
          			"fold" => "page_one_offline", /* the checkbox hook */
					"options" => $of_categories);
					
					
/* Second Parallax Section Options */			
$of_options[] = array( "name" => "Second Parallax Section Options",
					"desc" => "Select if you want to see your second parallax section options.",
					"id" => "parallax_two_offline",
					"std" => 0,
          			"folds" => 1,
					"type" => "checkbox"); 
                                                                           
$of_options[] = array( "name" => "Select Your Second Parallax Template",
					"desc" => "",
					"id" => "second_parallax_template",
					"std" => "Select parallax template:",
					"type" => "select",
          			"fold" => "parallax_two_offline", /* the checkbox hook */
					"options" => $of_options_select);
                                      
$of_options[] = array( "name" => "Select the second parallax page",
					"desc" => "A list of all pages on the site.",
					"id" => "second_parallax",
					"std" => "Select page:",
					"type" => "select",
          			"fold" => "parallax_two_offline", /* the checkbox hook */
					"options" => $of_pages);
					
					
/* Second Page Section Options */	
$of_options[] = array( "name" => "Second Page Section Options",
					"desc" => "Select if you want to see your second page options.",
					"id" => "page_two_offline",
					"std" => 0,
          			"folds" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Your Second Page Subtitle 1",
					"desc" => "",
					"id" => "second_page_subtitle_one",
					"std" => "",
          			"fold" => "page_two_offline", /* the checkbox hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Your Second Page Subtitle 2",
					"desc" => "",
					"id" => "second_page_subtitle_two",
					"std" => "",
          			"fold" => "page_two_offline", /* the checkbox hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Your Second Page Description",
					"desc" => "",
					"id" => "second_page_description",
					"std" => "",
          			"fold" => "page_two_offline", /* the checkbox hook */
					"type" => "textarea"); 
                                                                           
$of_options[] = array( "name" => "Select Your Second Page Template",
					"desc" => "",
					"id" => "second_page_template",
					"std" => "Select page template:",
					"type" => "select",
          			"fold" => "page_two_offline", /* the checkbox hook */
					"options" => $of_options_select_page);
                                      
$of_options[] = array( "name" => "Select the second content page",
					"desc" => "A list of all pages on the site.",
					"id" => "second_content_page",
					"std" => "Select page:",
					"type" => "select",
          			"fold" => "page_two_offline", /* the checkbox hook */
					"options" => $of_pages);
                                      
$of_options[] = array( "name" => "Select the second content page category",
					"desc" => "This is the category where you'll publish the posts for your second section. For example, if your second section is About Us, it would be the best that you create a new category called 'About Us Section'. All the posts you want to see on your second section need to be published under ths category!",
					"id" => "second_content_page_category",
					"std" => "Select category:",
					"type" => "select",
          			"fold" => "page_two_offline", /* the checkbox hook */
					"options" => $of_categories);
					
					
/* Third Parallax Section Options */			
$of_options[] = array( "name" => "Third Parallax Section Options",
					"desc" => "Select if you want to see your third parallax section options.",
					"id" => "parallax_three_offline",
					"std" => 0,
          			"folds" => 1,
					"type" => "checkbox"); 
                                                                           
$of_options[] = array( "name" => "Select Your Third Parallax Template",
					"desc" => "",
					"id" => "third_parallax_template",
					"std" => "Select parallax template:",
					"type" => "select",
          			"fold" => "parallax_three_offline", /* the checkbox hook */
					"options" => $of_options_select);
                                      
$of_options[] = array( "name" => "Select The Third Parallax Page",
					"desc" => "A list of all pages on the site.",
					"id" => "third_parallax",
					"std" => "Select page:",
					"type" => "select",
          			"fold" => "parallax_three_offline", /* the checkbox hook */
					"options" => $of_pages);
					
					
/* Third Page Section Options */	
$of_options[] = array( "name" => "Third Page Section Options",
					"desc" => "Select if you want to see your third page options.",
					"id" => "page_three_offline",
					"std" => 0,
          			"folds" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Your Third Page Subtitle 1",
					"desc" => "",
					"id" => "third_page_subtitle_one",
					"std" => "",
          			"fold" => "page_three_offline", /* the checkbox hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Your Third Page Subtitle 2",
					"desc" => "",
					"id" => "third_page_subtitle_two",
					"std" => "",
          			"fold" => "page_three_offline", /* the checkbox hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Your Third Page Description",
					"desc" => "",
					"id" => "third_page_description",
					"std" => "",
          			"fold" => "page_three_offline", /* the checkbox hook */
					"type" => "textarea"); 
                                                                           
$of_options[] = array( "name" => "Select Your Third Page Template",
					"desc" => "",
					"id" => "third_page_template",
					"std" => "Select page template:",
					"type" => "select",
          			"fold" => "page_three_offline", /* the checkbox hook */
					"options" => $of_options_select_page);
                                      
$of_options[] = array( "name" => "Select the third content page",
					"desc" => "A list of all pages on the site.",
					"id" => "third_content_page",
					"std" => "Select page:",
					"type" => "select",
          			"fold" => "page_three_offline", /* the checkbox hook */
					"options" => $of_pages);
                                      
$of_options[] = array( "name" => "Select the third content page category",
					"desc" => "This is the category where you'll publish the posts for your third section. For example, if your third section is About Us, it would be the best that you create a new category called 'About Us Section'. All the posts you want to see on your third section need to be published under ths category!",
					"id" => "third_content_page_category",
					"std" => "Select category:",
					"type" => "select",
          			"fold" => "page_three_offline", /* the checkbox hook */
					"options" => $of_categories);
					
					
/* Fourth Parallax Section Options */			
$of_options[] = array( "name" => "Fourth Parallax Section Options",
					"desc" => "Select if you want to see your third parallax section options.",
					"id" => "parallax_four_offline",
					"std" => 0,
          			"folds" => 1,
					"type" => "checkbox"); 
                                                                           
$of_options[] = array( "name" => "Select Your Fourth Parallax Template",
					"desc" => "",
					"id" => "fourth_parallax_template",
					"std" => "Select parallax template:",
					"type" => "select",
          			"fold" => "parallax_four_offline", /* the checkbox hook */
					"options" => $of_options_select);
                                      
$of_options[] = array( "name" => "Select The Fourth Parallax Page",
					"desc" => "A list of all pages on the site.",
					"id" => "fourth_parallax",
					"std" => "Select page:",
					"type" => "select",
          			"fold" => "parallax_four_offline", /* the checkbox hook */
					"options" => $of_pages);
					
					
/* Fourth Page Section Options */	
$of_options[] = array( "name" => "Fourth Page Section Options",
					"desc" => "Select if you want to see your fourth page options.",
					"id" => "page_four_offline",
					"std" => 0,
          			"folds" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Your Fourth Page Subtitle 1",
					"desc" => "",
					"id" => "fourth_page_subtitle_one",
					"std" => "",
          			"fold" => "page_four_offline", /* the checkbox hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Your Fourth Page Subtitle 2",
					"desc" => "",
					"id" => "fourth_page_subtitle_two",
					"std" => "",
          			"fold" => "page_four_offline", /* the checkbox hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Your Fourth Page Description",
					"desc" => "",
					"id" => "fourth_page_description",
					"std" => "",
          			"fold" => "page_four_offline", /* the checkbox hook */
					"type" => "textarea"); 
                                                                           
$of_options[] = array( "name" => "Select Your Fourth Page Template",
					"desc" => "",
					"id" => "fourth_page_template",
					"std" => "Select page template:",
					"type" => "select",
          			"fold" => "page_four_offline", /* the checkbox hook */
					"options" => $of_options_select_page);
                                      
$of_options[] = array( "name" => "Select the fourth content page",
					"desc" => "A list of all pages on the site.",
					"id" => "fourth_content_page",
					"std" => "Select page:",
					"type" => "select",
          			"fold" => "page_four_offline", /* the checkbox hook */
					"options" => $of_pages);
                                      
$of_options[] = array( "name" => "Select the fourth content page category",
					"desc" => "This is the category where you'll publish the posts for your fourth section. For example, if your fourth section is About Us, it would be the best that you create a new category called 'About Us Section'. All the posts you want to see on your fourth section need to be published under ths category!",
					"id" => "fourth_content_page_category",
					"std" => "Select category:",
					"type" => "select",
          			"fold" => "page_four_offline", /* the checkbox hook */
					"options" => $of_categories);
					
					
/* Fifth Parallax Section Options */			
$of_options[] = array( "name" => "Fifth Parallax Section Options",
					"desc" => "Select if you want to see your fifth parallax section options.",
					"id" => "parallax_five_offline",
					"std" => 0,
          			"folds" => 1,
					"type" => "checkbox"); 
                                                                           
$of_options[] = array( "name" => "Select Your Fifth Parallax Template",
					"desc" => "",
					"id" => "fifth_parallax_template",
					"std" => "Select parallax template:",
					"type" => "select",
          			"fold" => "parallax_five_offline", /* the checkbox hook */
					"options" => $of_options_select);
                                      
$of_options[] = array( "name" => "Select The Fifth Parallax Page",
					"desc" => "A list of all pages on the site.",
					"id" => "fifth_parallax",
					"std" => "Select page:",
					"type" => "select",
          			"fold" => "parallax_five_offline", /* the checkbox hook */
					"options" => $of_pages);
					
					
/* Fifth Page Section Options */	
$of_options[] = array( "name" => "Fifth Page Section Options",
					"desc" => "Select if you want to see your fifth page options.",
					"id" => "page_five_offline",
					"std" => 0,
          			"folds" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Your Fifth Page Subtitle 1",
					"desc" => "",
					"id" => "fifth_page_subtitle_one",
					"std" => "",
          			"fold" => "page_five_offline", /* the checkbox hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Your Fifth Page Subtitle 2",
					"desc" => "",
					"id" => "fifth_page_subtitle_two",
					"std" => "",
          			"fold" => "page_five_offline", /* the checkbox hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Your Fifth Page Description",
					"desc" => "",
					"id" => "fifth_page_description",
					"std" => "",
          			"fold" => "page_five_offline", /* the checkbox hook */
					"type" => "textarea"); 
                                                                           
$of_options[] = array( "name" => "Select Your Fifth Page Template",
					"desc" => "",
					"id" => "fifth_page_template",
					"std" => "Select page template:",
					"type" => "select",
          			"fold" => "page_five_offline", /* the checkbox hook */
					"options" => $of_options_select_page);
                                      
$of_options[] = array( "name" => "Select the fifth content page",
					"desc" => "A list of all pages on the site.",
					"id" => "fifth_content_page",
					"std" => "Select page:",
					"type" => "select",
          			"fold" => "page_five_offline", /* the checkbox hook */
					"options" => $of_pages);
                                      
$of_options[] = array( "name" => "Select the fifth content page category",
					"desc" => "This is the category where you'll publish the posts for your fifth section. For example, if your fifth section is About Us, it would be the best that you create a new category called 'About Us Section'. All the posts you want to see on your fifth section need to be published under ths category!",
					"id" => "fifth_content_page_category",
					"std" => "Select category:",
					"type" => "select",
          			"fold" => "page_five_offline", /* the checkbox hook */
					"options" => $of_categories);
					
					
/* Sixth Parallax Section Options */	
$of_options[] = array( "name" => "Sixth Parallax Section Options",
					"desc" => "Select if you want to see your sixth parallax section options.",
					"id" => "parallax_six_offline",
					"std" => 0,
          			"folds" => 1,
					"type" => "checkbox"); 
                                                                           
$of_options[] = array( "name" => "Select Your Sixth Parallax Template",
					"desc" => "",
					"id" => "sixth_parallax_template",
					"std" => "Select parallax template:",
					"type" => "select",
          			"fold" => "parallax_six_offline", /* the checkbox hook */
					"options" => $of_options_select);
                                      
$of_options[] = array( "name" => "Select the sixth parallax page",
					"desc" => "A list of all pages on the site.",
					"id" => "sixth_parallax",
					"std" => "Select page:",
					"type" => "select",
          			"fold" => "parallax_six_offline", /* the checkbox hook */
					"options" => $of_pages);
					
					
/* First Page Section Options */	
$of_options[] = array( "name" => "Sixth Page Section Options",
					"desc" => "Select if you want to see your sixth page options.",
					"id" => "page_six_offline",
					"std" => 0,
          			"folds" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Your Sixth Page Subtitle 1",
					"desc" => "",
					"id" => "sixth_page_subtitle_one",
					"std" => "",
          			"fold" => "page_six_offline", /* the checkbox hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Your Sixth Page Subtitle 2",
					"desc" => "",
					"id" => "sixth_page_subtitle_two",
					"std" => "",
          			"fold" => "page_six_offline", /* the checkbox hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Your Sixth Page Description",
					"desc" => "",
					"id" => "sixth_page_description",
					"std" => "",
          			"fold" => "page_six_offline", /* the checkbox hook */
					"type" => "textarea"); 
                                                                           
$of_options[] = array( "name" => "Select Your Sixth Page Template",
					"desc" => "",
					"id" => "sixth_page_template",
					"std" => "Select page template:",
					"type" => "select",
          			"fold" => "page_six_offline", /* the checkbox hook */
					"options" => $of_options_select_page);
                                      
$of_options[] = array( "name" => "Select the sixth content page",
					"desc" => "A list of all pages on the site.",
					"id" => "sixth_content_page",
					"std" => "Select page:",
					"type" => "select",
          			"fold" => "page_six_offline", /* the checkbox hook */
					"options" => $of_pages);
                                      
$of_options[] = array( "name" => "Select the sixth content page category",
					"desc" => "This is the category where you'll publish the posts for your sixth section. For example, if your sixth section is About Us, it would be the best that you create a new category called 'About Us Section'. All the posts you want to see on your sixth section need to be published under ths category!",
					"id" => "sixth_content_page_category",
					"std" => "Select category:",
					"type" => "select",
          			"fold" => "page_six_offline", /* the checkbox hook */
					"options" => $of_categories);
					
					
/* Seventh Parallax Section Options */			
$of_options[] = array( "name" => "Seventh Parallax Section Options",
					"desc" => "Select if you want to see your second parallax section options.",
					"id" => "parallax_seven_offline",
					"std" => 0,
          			"folds" => 1,
					"type" => "checkbox"); 
                                                                           
$of_options[] = array( "name" => "Select Your Seventh Parallax Template",
					"desc" => "",
					"id" => "seventh_parallax_template",
					"std" => "Select parallax template:",
					"type" => "select",
          			"fold" => "parallax_two_offline", /* the checkbox hook */
					"options" => $of_options_select);
                                      
$of_options[] = array( "name" => "Select the Seventh parallax page",
					"desc" => "A list of all pages on the site.",
					"id" => "seventh_parallax",
					"std" => "Select page:",
					"type" => "select",
          			"fold" => "parallax_seven_offline", /* the checkbox hook */
					"options" => $of_pages);
					
					
/* Seventh Page Section Options */	
$of_options[] = array( "name" => "Seventh Page Section Options",
					"desc" => "Select if you want to see your seventh page options.",
					"id" => "page_seven_offline",
					"std" => 0,
          			"folds" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Your Seventh Page Subtitle 1",
					"desc" => "",
					"id" => "seventh_page_subtitle_one",
					"std" => "",
          			"fold" => "page_seven_offline", /* the checkbox hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Your Seventh Page Subtitle 2",
					"desc" => "",
					"id" => "seventh_page_subtitle_two",
					"std" => "",
          			"fold" => "page_seven_offline", /* the checkbox hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Your Seventh Page Description",
					"desc" => "",
					"id" => "seventh_page_description",
					"std" => "",
          			"fold" => "page_seven_offline", /* the checkbox hook */
					"type" => "textarea"); 
                                                                           
$of_options[] = array( "name" => "Select Your Seventh Page Template",
					"desc" => "",
					"id" => "seventh_page_template",
					"std" => "Select page template:",
					"type" => "select",
          			"fold" => "page_seven_offline", /* the checkbox hook */
					"options" => $of_options_select_page);
                                      
$of_options[] = array( "name" => "Select the seventh content page",
					"desc" => "A list of all pages on the site.",
					"id" => "seventh_content_page",
					"std" => "Select page:",
					"type" => "select",
          			"fold" => "page_seven_offline", /* the checkbox hook */
					"options" => $of_pages);
                                      
$of_options[] = array( "name" => "Select the seventh content page category",
					"desc" => "This is the category where you'll publish the posts for your seventh section. For example, if your seventh section is About Us, it would be the best that you create a new category called 'About Us Section'. All the posts you want to see on your seventh section need to be published under ths category!",
					"id" => "seventh_content_page_category",
					"std" => "Select category:",
					"type" => "select",
          			"fold" => "page_seven_offline", /* the checkbox hook */
					"options" => $of_categories);
					
					
/* Eight Parallax Section Options */			
$of_options[] = array( "name" => "Eighth Parallax Section Options",
					"desc" => "Select if you want to see your eighth parallax section options.",
					"id" => "parallax_eight_offline",
					"std" => 0,
          			"folds" => 1,
					"type" => "checkbox"); 
                                                                           
$of_options[] = array( "name" => "Select Your Eighth Parallax Template",
					"desc" => "",
					"id" => "eighth_parallax_template",
					"std" => "Select parallax template:",
					"type" => "select",
          			"fold" => "parallax_eight_offline", /* the checkbox hook */
					"options" => $of_options_select);
                                      
$of_options[] = array( "name" => "Select The Eighth Parallax Page",
					"desc" => "A list of all pages on the site.",
					"id" => "eighth_parallax",
					"std" => "Select page:",
					"type" => "select",
          			"fold" => "parallax_eight_offline", /* the checkbox hook */
					"options" => $of_pages);
					
					
/* Eighth Page Section Options */	
$of_options[] = array( "name" => "Eighth Page Section Options",
					"desc" => "Select if you want to see your eighth page options.",
					"id" => "page_eight_offline",
					"std" => 0,
          			"folds" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Your Eighth Page Subtitle 1",
					"desc" => "",
					"id" => "eighth_page_subtitle_one",
					"std" => "",
          			"fold" => "page_eight_offline", /* the checkbox hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Your Eighth Page Subtitle 2",
					"desc" => "",
					"id" => "eighth_page_subtitle_two",
					"std" => "",
          			"fold" => "page_eight_offline", /* the checkbox hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Your Eighth Page Description",
					"desc" => "",
					"id" => "eighth_page_description",
					"std" => "",
          			"fold" => "page_eight_offline", /* the checkbox hook */
					"type" => "textarea"); 
                                                                           
$of_options[] = array( "name" => "Select Your Eighth Page Template",
					"desc" => "",
					"id" => "eighth_page_template",
					"std" => "Select page template:",
					"type" => "select",
          			"fold" => "page_eight_offline", /* the checkbox hook */
					"options" => $of_options_select_page);
                                      
$of_options[] = array( "name" => "Select the eighth content page",
					"desc" => "A list of all pages on the site.",
					"id" => "eighth_content_page",
					"std" => "Select page:",
					"type" => "select",
          			"fold" => "page_eight_offline", /* the checkbox hook */
					"options" => $of_pages);
                                      
$of_options[] = array( "name" => "Select the eighth content page category",
					"desc" => "This is the category where you'll publish the posts for your eighth section. For example, if your eighth section is About Us, it would be the best that you create a new category called 'About Us Section'. All the posts you want to see on your eighth section need to be published under ths category!",
					"id" => "eighth_content_page_category",
					"std" => "Select category:",
					"type" => "select",
          			"fold" => "page_eight_offline", /* the checkbox hook */
					"options" => $of_categories);
					
					
/* Ninth Parallax Section Options */			
$of_options[] = array( "name" => "Ninth Parallax Section Options",
					"desc" => "Select if you want to see your ninth parallax section options.",
					"id" => "parallax_nine_offline",
					"std" => 0,
          			"folds" => 1,
					"type" => "checkbox"); 
                                                                           
$of_options[] = array( "name" => "Select Your Ninth Parallax Template",
					"desc" => "",
					"id" => "ninth_parallax_template",
					"std" => "Select parallax template:",
					"type" => "select",
          			"fold" => "parallax_nine_offline", /* the checkbox hook */
					"options" => $of_options_select);
                                      
$of_options[] = array( "name" => "Select The Ninth Parallax Page",
					"desc" => "A list of all pages on the site.",
					"id" => "ninth_parallax",
					"std" => "Select page:",
					"type" => "select",
          			"fold" => "parallax_nine_offline", /* the checkbox hook */
					"options" => $of_pages);
					
					
/* Ninth Page Section Options */	
$of_options[] = array( "name" => "Ninth Page Section Options",
					"desc" => "Select if you want to see your ninth page options.",
					"id" => "page_nine_offline",
					"std" => 0,
          			"folds" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Your Ninth Page Subtitle 1",
					"desc" => "",
					"id" => "ninth_page_subtitle_one",
					"std" => "",
          			"fold" => "page_nine_offline", /* the checkbox hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Your Ninth Page Subtitle 2",
					"desc" => "",
					"id" => "ninth_page_subtitle_two",
					"std" => "",
          			"fold" => "page_nine_offline", /* the checkbox hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Your Ninth Page Description",
					"desc" => "",
					"id" => "ninth_page_description",
					"std" => "",
          			"fold" => "page_nine_offline", /* the checkbox hook */
					"type" => "textarea"); 
                                                                           
$of_options[] = array( "name" => "Select Your Ninth Page Template",
					"desc" => "",
					"id" => "ninth_page_template",
					"std" => "Select page template:",
					"type" => "select",
          			"fold" => "page_nine_offline", /* the checkbox hook */
					"options" => $of_options_select_page);
                                      
$of_options[] = array( "name" => "Select the ninth content page",
					"desc" => "A list of all pages on the site.",
					"id" => "ninth_content_page",
					"std" => "Select page:",
					"type" => "select",
          			"fold" => "page_nine_offline", /* the checkbox hook */
					"options" => $of_pages);
                                      
$of_options[] = array( "name" => "Select the ninth content page category",
					"desc" => "This is the category where you'll publish the posts for your ninth section. For example, if your ninth section is About Us, it would be the best that you create a new category called 'About Us Section'. All the posts you want to see on your ninth section need to be published under ths category!",
					"id" => "ninth_content_page_category",
					"std" => "Select category:",
					"type" => "select",
          			"fold" => "page_nine_offline", /* the checkbox hook */
					"options" => $of_categories);
					
					
/* Tenth Parallax Section Options */			
$of_options[] = array( "name" => "Tenth Parallax Section Options",
					"desc" => "Select if you want to see your tenth parallax section options.",
					"id" => "parallax_ten_offline",
					"std" => 0,
          			"folds" => 1,
					"type" => "checkbox"); 
                                                                           
$of_options[] = array( "name" => "Select Your Tenth Parallax Template",
					"desc" => "",
					"id" => "tenth_parallax_template",
					"std" => "Select parallax template:",
					"type" => "select",
          			"fold" => "parallax_ten_offline", /* the checkbox hook */
					"options" => $of_options_select);
                                      
$of_options[] = array( "name" => "Select The Tenth Parallax Page",
					"desc" => "A list of all pages on the site.",
					"id" => "tenth_parallax",
					"std" => "Select page:",
					"type" => "select",
          			"fold" => "parallax_ten_offline", /* the checkbox hook */
					"options" => $of_pages);
					
					
/* Tenth Page Section Options */	
$of_options[] = array( "name" => "Tenth Page Section Options",
					"desc" => "Select if you want to see your tenth page options.",
					"id" => "page_ten_offline",
					"std" => 0,
          			"folds" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Your Tenth Page Subtitle 1",
					"desc" => "",
					"id" => "tenth_page_subtitle_one",
					"std" => "",
          			"fold" => "page_ten_offline", /* the checkbox hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Your Tenth Page Subtitle 2",
					"desc" => "",
					"id" => "tenth_page_subtitle_two",
					"std" => "",
          			"fold" => "page_ten_offline", /* the checkbox hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Your Tenth Page Description",
					"desc" => "",
					"id" => "tenth_page_description",
					"std" => "",
          			"fold" => "page_ten_offline", /* the checkbox hook */
					"type" => "textarea"); 
                                                                           
$of_options[] = array( "name" => "Select Your Tenth Page Template",
					"desc" => "",
					"id" => "tenth_page_template",
					"std" => "Select page template:",
					"type" => "select",
          			"fold" => "page_ten_offline", /* the checkbox hook */
					"options" => $of_options_select_page);
                                      
$of_options[] = array( "name" => "Select the tenth content page",
					"desc" => "A list of all pages on the site.",
					"id" => "tenth_content_page",
					"std" => "Select page:",
					"type" => "select",
          			"fold" => "page_ten_offline", /* the checkbox hook */
					"options" => $of_pages);
                                      
$of_options[] = array( "name" => "Select the tenth content page category",
					"desc" => "This is the category where you'll publish the posts for your tenth section. For example, if your tenth section is About Us, it would be the best that you create a new category called 'About Us Section'. All the posts you want to see on your tenth section need to be published under ths category!",
					"id" => "tenth_content_page_category",
					"std" => "Select category:",
					"type" => "select",
          			"fold" => "page_ten_offline", /* the checkbox hook */
					"options" => $of_categories);
					
// SEO Options					
$of_options[] = array( "name" => "SEO",
					"type" => "heading");
					
$of_options[] = array( "name" => "Google Analytics Code",
                    "desc" => "Paste your tracking code (Google Analytics Code) here.",
                    "id" => "google_analytics_code",
                    "std" => "",
                    "type" => "textarea");
					
$of_options[] = array( "name" => "Homepage Title",
					"desc" => "Add your homepage title here.",
					"id" => "homepage_title",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Homepage Description",
					"desc" => "Add your homepage description here.",
					"id" => "homepage_description",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Homepage Keywords",
					"desc" => "Add your homepage keywords here.",
					"id" => "homepage_keywords",
					"std" => "",
					"type" => "text"); 
					
// Backup Options
$of_options[] = array( "name" => "Backup Options",
					"type" => "heading");
					
$of_options[] = array( "name" => "Backup and Restore Options",
                    "id" => "of_backup",
                    "std" => "",
                    "type" => "backup",
					"desc" => 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
					);
					
$of_options[] = array( "name" => "Transfer Theme Options Data",
                    "id" => "of_transfer",
                    "std" => "",
                    "type" => "transfer",
					"desc" => 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".
						',
					);
					
	}
}
?>
