<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <head>
    <!-- MetaTags -->
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="shortcut icon" href="favicon.ico" />  
    <title>Corinne Nagel | my multimedia design portfolio - video production/design, web design, print and flash pieces</title>
    <?php
		global $pulsar_data; //fetch options stored in $pulsar_data
		$your_homepage_description = $pulsar_data['homepage_description'];
		$your_homepage_keywords = $pulsar_data['homepage_keywords'];
        
        if ( is_home() || is_front_page() ) 
            echo '<meta name="description" content="' .$your_homepage_description .'">
	<meta name="keywords" content="' .$your_homepage_keywords. '">';
    ?>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <!-- This script prevents links from opening in Mobile Safari. https://gist.github.com/1042026 -->
    <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>

    <!-- RSS + PingBack -->
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- WPHEAD -->
    <?php wp_head(); ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
	$(function(){
	
	  $('#backgrounddrops').css({backgroundPosition: '0px 0px'});
	  $('#midgrounddrops').css({backgroundPosition: '0px 0px'});
	  $('#foregrounddrops').css({backgroundPosition: '0px 0px'});
	  $('#balloonlrg').css({backgroundPosition: '-100px 300px'});
	  $('#balloonsml').css({backgroundPosition: '1100px 100px'});
	  $('#clouds').css({backgroundPosition: '200px 0px'});
	
		$('#midgrounddrops').animate({
			backgroundPosition:"(-200px 9000px)"
		}, 130000, 'linear');
		
		$('#foregrounddrops').animate({
			backgroundPosition:"(-300px 11000px)"
		}, 130000, 'linear');
		
		$('#backgrounddrops').animate({
			backgroundPosition:"(-100px 6000px)"
		}, 130000, 'linear');
		
		$('#balloonlrg').animate({
			backgroundPosition:"(900px 80px)"
		}, 130000, 'linear');
		
		$('#bird01l').animate({
			backgroundPosition:"(150px 150px)"
		}, 130000, 'linear');
		
		$('#clouds').animate({
			backgroundPosition:"(-500px 0px)"
		}, 130000, 'linear');
	});
</script>

    </head>
    <body id="homepage" <?php body_class(); ?>>
<?php if(is_home() ) { ?>
<!-- Loader -->
<div id="loading">
      <?php global $pulsar_data; //fetch options stored in $pulsar_data
			$your_uploaded_loader = $pulsar_data['uploaded_loader'];
			$template_url = get_template_directory_uri();
			if (isset($your_uploaded_loader[0]) && $your_uploaded_loader[1]) {
				echo '<img src="' .$your_uploaded_loader. '"  alt="'.$your_homepage_title.'">'  ;
			} else {
				echo '<img src="' .$template_url. '/images/loader.gif"  alt="'.$your_homepage_title.'">';
			} ?>
    </div>
<div id="home-overlay"> </div>
<?php } ?>

<!-- Header and Navigation -->
<header>
      <?php if(is_home() ) { ?>
      <!-- Your Logo Goes Here -->
      <div class="logo"> <a href="#homepage">
        <?php global $pulsar_data; //fetch options stored in $pulsar_data
			$your_uploaded_logo = $pulsar_data['uploaded_logo'];
			$template_url = get_template_directory_uri();
			if (isset($your_uploaded_logo[0]) && $your_uploaded_logo[1]) {
				echo '<img src="' .$your_uploaded_logo. '"  alt="'.$your_homepage_title.'">'  ;
			} else {
				echo '<img src="' .$template_url. '/images/logo.png"  alt="'.$your_homepage_title.'">';
			} ?>
        </a> </div>
      <?php } ?>
      <div id="navspacer"></div>
      <div id="navspacerr"></div>
      <div class="main-menu hide-for-small">
    <nav>
          <div class="menu-main-top-container">
        <ul id="menu-main-top">
              <li id="#homepage"><a href="http://corinnenagel.com/#homepage"><img src="http://corinnenagel.com/wp-content/themes/pulsar/images/cnspecific/btnhome.png" data-hover="http://corinnenagel.com/wp-content/themes/pulsar/images/cnspecific/btnhome.png" width="95" height="62" alt="homebtn"/></a></li>
              <li id="#skills"><a href="http://corinnenagel.com/#skills"><img src="http://corinnenagel.com/wp-content/themes/pulsar/images/cnspecific/btnskills.png" data-hover="http://corinnenagel.com/wp-content/themes/pulsar/images/cnspecific/btnskills.png" width="106" height="62" alt="skills"/></a></li>
              <li id="#55"><a href="http://corinnenagel.com/?page_id=55"><img src="http://corinnenagel.com/wp-content/themes/pulsar/images/cnspecific/btnwork.png" data-hover="http://corinnenagel.com/wp-content/themes/pulsar/images/cnspecific/btnwork.png" width="104" height="62" alt="work"/></a></li>
              <li id="#about"><a href="http://corinnenagel.com/#about"><img src="http://corinnenagel.com/wp-content/themes/pulsar/images/cnspecific/btnabout.png" data-hover="http://corinnenagel.com/wp-content/themes/pulsar/images/cnspecific/btnabout.png" width="112" height="62" alt="about"/></a></li>
              <li id="#77"><a href="http://corinnenagel.com/?page_id=77"><img src="http://corinnenagel.com/wp-content/themes/pulsar/images/cnspecific/btncontact.png" data-hover="http://corinnenagel.com/wp-content/themes/pulsar/images/cnspecific/btncontact2.png" width="117" height="62" alt="contact"/> </a></li>
            </ul>
      </div>
        </nav>
  </div>
      <?php if(!is_home() ) { ?>
      <!-- Your Logo Goes Here -->
      <div class="logo"> <a href="<?php echo home_url(); ?>">
        <?php global $pulsar_data; //fetch options stored in $pulsar_data
			$your_uploaded_logo = $pulsar_data['uploaded_logo'];
			$template_url = get_template_directory_uri();
			if (isset($your_uploaded_logo[0]) && $your_uploaded_logo[1]) {
				echo '<img src="' .$your_uploaded_logo. '"  alt="'.$your_homepage_title.'">'  ;
			} else {
				echo '<img src="' .$template_url. '/images/logo.png"  alt="'.$your_homepage_title.'">';
			} ?>
        </a> </div>
      <!-- Your menu items are placed here -->
      <div class="main-menu">
    <nav>
          <div class="menu-main-menu-container">
        <ul>
              <li> <a href="<?php echo home_url(); ?>">Go Back to home</a> </li>
            </ul>
      </div>
        </nav>
  </div>
      <?php } ?>
    </header>
<?php if(is_home() ) { ?>

<div id="clouds"></div>
<div id="bird01"></div>
<div class="section1"> 
      <div class="pattern1cn">
    <div id="introtext">
          <?php $id=98; $post = get_page($id); $content = apply_filters('the_content', $post->post_content); echo $content;  ?>
        </div>
  </div>
    </div>

<?php } ?>