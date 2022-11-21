<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta name="_globalsign-domain-verification" content="IY-2UNuw-ZIjzdXpR367nscYcMHnuIGzZ4wIavYaY3" />
	<?php if(is_archive() || is_category()){echo "<meta name=\"robots\" content=\"noindex\">";} ?>
	<title><?php wp_title( '|', true, 'right' ); ?><?php echo get_bloginfo('name'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<script src="<?php echo get_bloginfo('template_url'); ?>/js/bxslider/jquery.bxslider.min.js"></script>
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php echo get_bloginfo('template_url'); ?>/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <meta name="google-site-verification" content="VdlCWaD3igs50xc-VRLwOQgVleg6FlmRjXwC7OrblH4" />
    <script>document.addEventListener( 'wpcf7mailsent', function( event ) {    ga('send', 'event', { eventCategory: 'Form', eventAction: 'Submit', eventLabel: 'Contact'});}, false );</script>
	<meta name="google-site-verification" content="i-corh5Yc05nB6xGCwqVFXCH5e7TJRcgqLot102enR0" />
	<!-- Hotjar Tracking Code for www.alltruckplc.co.uk -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1013260,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
	<script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"26020676"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script>
</head>
<body <?php body_class();
$body_background_image = get_field('body_background_image');
$body_background_color = get_field('body_background_color');	  
if($body_background_image){
	echo " style=\"background-color:" . $body_background_color . ";background-image:url(" . $body_background_image['url'] . ");background-repeat:no-repeat;background-size:cover;background-position:center center;background-attachment:fixed\"";
} 
?>>


<header>  

    <?php
		echo "<div class=\"logo\">";
			echo "<a href=\"" . get_bloginfo('url') . "\"><img src=\"" . get_bloginfo('template_url') . "/images/media-logo.png\" /></a>";			
		echo "</div>";		
	?>
	
	<nav>
		<div class="menu-toggle">
			<div id="nav-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
		<div class="clear"></div>
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'nav-menu' ) ); ?>
		<div class="clear"></div>
	</nav>
	
	<div class="clear"></div>
	
</header>    
      


        
    

    