<?php

function template_scripts_styles() {

	// Loads our main stylesheet.
	wp_enqueue_style( 'template-style', get_stylesheet_uri(), array(), time() );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'template-ie', get_template_directory_uri() . '/css/ie.css', array( 'template-style' ), time() );
	wp_style_add_data( 'template-ie', 'conditional', 'lt IE 9' );
	
	wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'template_scripts_styles' );




// register the main navigation
function register_my_menus() {
	register_nav_menus(
		array(
			'main-menu' => __('Main Menu')
		)
	);
}
add_action( 'init', 'register_my_menus' );




//add featured post functionality to the theme
add_theme_support( 'post-thumbnails' );





// custom post excerpt for news feeds and cutsom post type feeds
function my_custom_excerpt($content, $limit){
					$content = strip_tags($content, "<p><br>");
					$length = strlen($content);
					if($length > $limit){
						$content = substr($content, 0, $limit);
						$pos = strrchr($content, " ");
						$pos2 = strrpos($content, $pos);
						$content = substr($content, 0, $pos2);
						$content .= " ...";	
					}
					
					$content = apply_filters('the_content', $content);
					
					return $content;
}




function add_google_map($lat, $lng, $zoom, $width, $height, $style, $div, $icon, $api) {
	if($api == "true"){
		$output = "<script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyC71wUspez-Tr-D6c98lLLDj9AZQwB_twI&v=3.exp&sensor=false\"></script>\n";
	}else{
		$output = "";
	}
	$output .= "								<script language=\"javascript\">\n";
	$output .= "											google.maps.visualRefresh = true;\n";
	$output .= "											var map;\n";
	$output .= "											var styles = $style;\n";
	$output .= "											function initialize() {\n";
	$output .= "												var myLatlng = new google.maps.LatLng(" . $lat . "," . $lng . ");\n";
	$output .= "													var mapOptions = {\n";
	$output .= "													zoom: " . $zoom . ",\n";
	$output .= "													center: myLatlng,\n";
	$output .= "													disableDefaultUI: true,\n";
	$output .= "													panControl: false,\n";
	$output .= "													zoomControl: true,\n";
	$output .= "													scaleControl: true,\n";
	$output .= "													mapTypeControl: true,\n";
	$output .= "													styles: styles,\n";
	$output .= "												}\n";
	$output .= "												var map = new google.maps.Map(document.getElementById('" . $div . "'), mapOptions);\n";
	$output .= "												var marker = new google.maps.Marker({\n";
	$output .= "													position: myLatlng,\n";
	$output .= "													map: map, \n";
	if($icon != false){
		$output .= "												icon: \"" . $icon . "\"\n";	
	}
	$output .= "												});\n";
	$output .= "											}\n";
	$output .= "											google.maps.event.addDomListener(window, 'load', initialize);\n";
	$output .= "											</script>\n";
	$output .= "											<div id=\"" . $div . "\" style=\"width: " . $width . "; height: " . $height . "px;\"></div>		\n";		
	return $output;	
}



// Add Shortcode
function google_map_short( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'width' => '600',
			'height' => '300',
			'zoom' => '12',
			'lat' => '52.635434',
			'lng' => '-1.1327464'
		), $atts )
	);

	// Code
$output = "<script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyC71wUspez-Tr-D6c98lLLDj9AZQwB_twI&v=3.exp&sensor=false\"></script>\n";
	$output .= "								<script language=\"javascript\">\n";
	$output .= "											google.maps.visualRefresh = true;\n";
	$output .= "											var map;\n";
	$output .= "											function initialize() {\n";
	$output .= "												var myLatlng = new google.maps.LatLng(" . $lat . "," . $lng . ");\n";
	$output .= "													var mapOptions = {\n";
	$output .= "													zoom: " . $zoom . ",\n";
	$output .= "													center: myLatlng,\n";
	$output .= "													disableDefaultUI: true,\n";
	$output .= "													panControl: true,\n";
	$output .= "													zoomControl: true,\n";
	$output .= "													scaleControl: false,\n";
	$output .= "													mapTypeControl: true,\n";
	$output .= "												}\n";
	$output .= "												var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);\n";
	$output .= "												var marker = new google.maps.Marker({\n";
	$output .= "													position: myLatlng,\n";
	$output .= "													map: map\n";
	$output .= "												});\n";
	$output .= "											}\n";
	$output .= "											google.maps.event.addDomListener(window, 'load', initialize);\n";
	$output .= "											</script>\n";
	$output .= "											<div id=\"map-canvas\" style=\"width: " . $width . "; height: " . $height . "px;\"></div>		\n";		
	return $output;	
}
add_shortcode( 'GoogleMap', 'google_map_short' );


// Play a youtube video using vid code and width/height parameters
function play_YouTube_Video ($code, $width, $height) {
	$video = "<iframe width=\"" . $width . "\" height=\"" . $height . "\" src=\"//www.youtube.com/embed/" . $code . "?fs=1&amp;rel=0&amp;vq=large\" frameborder=\"0\" allowfullscreen></iframe>";
	return $video;
}

// Add Shortcode
function play_YouTube_Video_short( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'width' => '600',
			'height' => '300',
			'code' => ''
		), $atts )
	);

	// Code
	$output = "<iframe width=\"" . $width . "\" height=\"" . $height . "\" src=\"//www.youtube.com/embed/" . $code . "?fs=1&amp;rel=0&amp;vq=large\" frameborder=\"0\" allowfullscreen></iframe>";
	return $output;
}
add_shortcode( 'YouTubeVideo', 'play_YouTube_Video_short' );

// add a filter to pushYoast plugin meta box to the bottom in the admin area
add_filter( 'wpseo_metabox_prio', function() { return 'low';}); 


// set up options page, title, order etc
if( function_exists('acf_set_options_page_menu') )
{
   	acf_set_options_page_menu('Site Options');
}

if( function_exists('acf_set_options_page_title') )
{
   	acf_set_options_page_title('Site Options');
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

function custom_menu_order( $menu_ord ) {  
    
    if (!$menu_ord) return true;  
    
    // vars
    $menu = 'acf-options';
    
    // remove from current menu
    $menu_ord = array_diff($menu_ord, array( $menu ));
    
    // append after index.php [0]
    array_splice( $menu_ord, 5, 0, array( $menu ) );    
    
    // return
    return $menu_ord;
}  

add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');



function remove_parent_classes($class)
{
  // check for current page classes, return false if they exist.
	return ($class == 'current_page_item' || $class == 'current_page_parent' || $class == 'current_page_ancestor'  || $class == 'current-menu-item') ? FALSE : TRUE;
}

function add_class_to_wp_nav_menu($classes)
{

	
	
     switch (get_post_type())
     {
     	case 'truck':
     		// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
     		$classes = array_filter($classes, "remove_parent_classes");

     		// add the current page class to a specific menu item (replace ###).
     		if (in_array('menu-item-26', $classes))
     		{
     		   $classes[] = 'current_page_parent';
         }
     	 break;
		 
		 
     	
      // add more cases if necessary and/or a default
     }
	 
	 if(is_author()){
		$classes = array_filter($classes, "remove_parent_classes");
	}
	if(is_search()){
		$classes = array_filter($classes, "remove_parent_classes");
	}
	if(is_404()){
		$classes = array_filter($classes, "remove_parent_classes");
	}
	 
	return $classes;
}
add_filter('nav_menu_css_class', 'add_class_to_wp_nav_menu');

// register the limited color picker
add_action('acf/register_fields', 'my_register_fields');

function my_register_fields()
{
	include_once('fields/limited-colour-picker.php');
}

// community page video
function show_youtube_video($youtube_code)	{		
		$output = "<a class=\"fancybox-iframe\" href=\"https://www.youtube.com/embed/" .  $youtube_code . "?fs=1&rel=0&vq=large&autoplay=1&showinfo=0&autohide=1\">";
		$output .= "<img src=\"https://img.youtube.com/vi/" . $youtube_code . "/maxresdefault.jpg\" border=\"0\">";
		$output .= "<div class=\"video-play-button\">Play Video</div>";
		$output .= "</a>";		
		echo $output;
}

// customer journey video
function show_customerjourney_video($youtube_code)	{		
		$output = "<a class=\"fancybox-iframe\" href=\"https://www.youtube.com/embed/" .  $youtube_code . "?fs=1&rel=0&vq=large&autoplay=1&showinfo=0&autohide=1\">";
		$output .= "<img src=\"https://img.youtube.com/vi/" . $youtube_code . "/maxresdefault.jpg\" border=\"0\">";		
		$output .= "</a>";		
		echo $output;
}

function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyDqRTmo1u7ZNp8UvLWvg4EEV86goP10PXg');
}

add_action('acf/init', 'my_acf_init');