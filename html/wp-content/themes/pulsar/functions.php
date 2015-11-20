<?php

if ( ! isset( $content_width ) )
	$content_width = 960;

function pulsar_adjust_content_width() {
	global $content_width;
}
add_action( 'template_redirect', 'pulsar_adjust_content_width' );

/*-----------------------------------------------------------------------------------*/
/*	Slightly Modified Options Framework
/*-----------------------------------------------------------------------------------*/

require_once ('admin/index.php');

/*-----------------------------------------------------------------------------------*/
/*	Add CSS Files To Header
/*-----------------------------------------------------------------------------------*/

function pulsar_register_css() {
	if (!is_admin()) {
		wp_register_style( 'pulsar_css', get_template_directory_uri() . '/style.css' );
		wp_register_style( 'pulsar_normalize_css', get_template_directory_uri() . '/stylesheets/normalize.css' );
		wp_register_style( 'pulsar_supersized_css', get_template_directory_uri() . '/stylesheets/supersized.css' );
		wp_register_style( 'pulsar_style_common_css', get_template_directory_uri() . '/stylesheets/style_common.css' );
		wp_register_style( 'pulsar_style_five_css', get_template_directory_uri() . '/stylesheets/style5.css' );
		wp_register_style( 'pulsar_stylehov_css', get_template_directory_uri() . '/stylesheets/stylehov.css' );
		wp_register_style( 'pulsar_thirdeffect_css', get_template_directory_uri() . '/stylesheets/thirdeffect.css' );
		wp_register_style( 'pulsar_prettyphoto_css', get_template_directory_uri() . '/stylesheets/prettyPhoto.css' );

		
		wp_enqueue_style('pulsar_css');

		wp_enqueue_style('pulsar_normalize_css');
		wp_enqueue_style('pulsar_supersized_css');
		wp_enqueue_style('pulsar_style_common_css');
		wp_enqueue_style('pulsar_style_five_css');
		wp_enqueue_style('pulsar_stylehov_css');
		wp_enqueue_style('pulsar_thirdeffect_css');
		wp_enqueue_style('pulsar_prettyphoto_css');

	}
}
add_action('init', 'pulsar_register_css');

/*-----------------------------------------------------------------------------------*/
/*	Add JS Files
/*-----------------------------------------------------------------------------------*/

function pulsar_register_js() {
	if (!is_admin()) {
		wp_register_script('pulsar_easing', get_template_directory_uri() . '/javascripts/jquery.easing.min.js', 'jquery', '1.0', TRUE);
		wp_register_script('pulsar_modernizr', get_template_directory_uri() . '/javascripts/modernizr.js', 'jquery');
		wp_register_script('pulsar_supersized', get_template_directory_uri() . '/javascripts/supersized.3.2.7.js', 'jquery');
		wp_register_script('pulsar_supersized_shutter', get_template_directory_uri() . '/javascripts/supersized.shutter.min.js', 'jquery');
		wp_register_script('pulsar_jquery_validate', 'http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.pack.js', 'jquery', '1.0', TRUE);
		wp_register_script('pulsar_parallax', get_template_directory_uri() . '/javascripts/jquery.parallax-1.1.3.js', 'jquery', '1.0', TRUE);
		wp_register_script('pulsar_prettyphoto', get_template_directory_uri() . '/javascripts/jquery.prettyPhoto.js', 'jquery', '1.0', TRUE);
		wp_register_script('pulsar_custom', get_template_directory_uri() . '/javascripts/jquery.PulsarCustom.js', 'jquery', '1.0', TRUE);
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('pulsar_modernizr');
		wp_enqueue_script('pulsar_easing');
		wp_enqueue_script('pulsar_supersized');
		wp_enqueue_script('pulsar_supersized_shutter');
		wp_enqueue_script('pulsar_jquery_validate');
		wp_enqueue_script('pulsar_parallax');
		wp_enqueue_script('pulsar_prettyphoto');
		wp_enqueue_script('pulsar_custom');
	}
}
add_action('init', 'pulsar_register_js');

/*-----------------------------------------------------------------------------------*/
/* Load scripts for single pages
/*-----------------------------------------------------------------------------------*/

function pulsar_single_scripts() {
		
	if(is_singular())
		wp_enqueue_script( "comment-reply" );
}
add_action('wp_print_scripts', 'pulsar_single_scripts');


/*-----------------------------------------------------------------------------------*/
/*	Register Navigation Menu
/*-----------------------------------------------------------------------------------*/

function register_my_menus() {
  register_nav_menus(
  	array(
      'main-menu' => __( 'Main Menu', 'pulsar' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


/*-----------------------------------------------------------------------------------*/
/*	GET ID by Page Name
/*-----------------------------------------------------------------------------------*/

function pulsar_get_ID_by_page_name($page_name)
{
	global $wpdb;
	$page_name_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."'");
	return $page_name_id;
}


/*-----------------------------------------------------------------------------------*/
/*	Add Post Thumbnail Support
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'post-thumbnails' );
add_image_size( 'about-news-team-thumbnail', 1000, 175, true );
add_image_size( 'portfolio-thumbnail', 1000, 1000, true );
add_image_size( 'single-page-thumbnail', 1000, 450, true );
add_image_size( 'category-thumbnail', 1000, 250, true );


/*-----------------------------------------------------------------------------------*/
/*	Slug Function
/*-----------------------------------------------------------------------------------*/


function get_cat_slug($cat_id) {
	$cat_id = (int) $cat_id;
	$category = &get_category($cat_id);
	return $category->slug;
}

if(!function_exists('getPageContent'))
    {
        function getPageContent($pageId,$max_char)
        {
            if(!is_numeric($pageId))
            {
                return;
            }
            global $wpdb;
            $nsquery = 'SELECT DISTINCT * FROM ' . $wpdb->posts .
            ' WHERE ' . $wpdb->posts . '.ID=' . $pageId;
            $post_data = $wpdb->get_results($nsquery);
            if(!empty($post_data))
            {
                foreach($post_data as $post)
                {
                    $text_out=nl2br($post->post_content);
                    $text_out=str_replace(']]>', ']]&gt;', $text_out);
                    $text_out = strip_tags($text_out);
                    return substr($text_out,0,$max_char);
 
                }
            }
        }
}

/*-----------------------------------------------------------------------------------*/
/*	main Menu Modification
/*-----------------------------------------------------------------------------------*/
//	Reduce nav classes, leaving only 'current-menu-item'
function nav_class_filter( $var ) {
	return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}
add_filter('nav_menu_css_class', 'nav_class_filter', 100, 1);
//	Add page slug as nav IDs
function nav_id_filter( $id, $item ) {
	return '#' .get_post_meta( $item->ID, '_menu_item_object_id', true );
}
add_filter( 'nav_menu_item_id', 'nav_id_filter', 10, 2 );

/*-----------------------------------------------------------------------------------*/
/*	Responsive Menu
/*-----------------------------------------------------------------------------------*/
class Walker_Nav_Menu_Dropdown extends Walker_Nav_Menu{
    function start_lvl(&$output, $depth){
      $indent = str_repeat("\t", $depth); // don't output children opening tag (`<ul>`)
    }

    function end_lvl(&$output, $depth){
      $indent = str_repeat("\t", $depth); // don't output children closing tag
    }

    function start_el(&$output, $item, $depth, $args){
      // add spacing to the title based on the depth
      $item->title = str_repeat("&nbsp;", $depth * 4).$item->title;

		$itemIDD = '#' .get_post_meta( $item->ID, '_menu_item_object_id', true );

		$value = false;
		$item_output = false;
        $output .= $value;  
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';  
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';  
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';  
        $attributes .= ! empty( $itemIDD )        ? ' value="'   . esc_attr( $itemIDD      ) .'"' : '';  
        
        $item_output .= '<option'. $attributes .'>';  
        $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );  
        $item_output .= '';  
        
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );  



      // no point redefining this method too, we just replace the li tag...
      $output = str_replace('<li', '<option', $output);
    }

    function end_el(&$output, $item, $depth){
      $output .= "</option>\n"; // replace closing </li> with the option tag
    }
}

/*-----------------------------------------------------------------------------------*/
/*	Add Theme Support
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'automatic-feed-links' );

add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
    load_theme_textdomain ('pulsar');
}

/*-----------------------------------------------------------------------------------*/
/*	Register Sidebars
/*-----------------------------------------------------------------------------------*/

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Post Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => 'Page Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
}