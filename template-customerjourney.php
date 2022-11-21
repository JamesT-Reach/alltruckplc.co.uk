<?php

/* Template Name: customer journey template */ 

get_header('customerjourney'); ?>

<?php
	//$cj_main_image = get_field('cj_main_image');
	//if($cj_main_image){
		//echo "<div id=\"employee-journey-banner\" style=\"background-image:url(" . $cj_main_image['url'] . ")\">";
			//$cj_banner_heading = get_field('cj_banner_heading');
			//if($cj_banner_heading){
				//echo "<div class=\"banner-inner\">";
					//echo "<h2>" . $cj_banner_heading . "</h2>";
				//echo "</div>";
			//}
		//echo "</div>";
	//}
?>

<div class="above-wrapper">
<?php
	$cj_youtube_video_code = get_field('cj_youtube_video_code');
	echo "<div class=\"iframe-container\">";
		echo "<iframe src=\"https://www.youtube.com/embed/" . $cj_youtube_video_code . "?rel=0&amp;showinfo=0\" frameborder=\"0\" allowfullscreen></iframe>";
	echo "</div>";	
?>
</div>

<div id="wrapper"><?php //this div closes in the footer ?>
	
	
	<div class="content-left">
		<?php
			$cj_main_heading = get_field('cj_main_heading');
			if($cj_main_heading){echo "<h1 class=\"blue-heading\">" . $cj_main_heading . "</h1>";}
		
			$cj_paragraphs = get_field('cj_paragraphs');
			if($cj_paragraphs){
				foreach($cj_paragraphs as $cjp){
					echo "<p class=\"small-white-paragraph\">" . $cjp['paragraph'] . "</p>";
				}
				echo "<div class=\"spacer\"></div>";
			}
		?>          	               	          
	</div>   
          	          
    <?php
		$cj_videos = get_field('cj_videos');
		if($cj_videos){
			echo "<div class=\"content-right\">";
				foreach($cj_videos as $cjv){
					echo "<div class=\"cj-video\">";
						echo show_customerjourney_video($cjv['youtube_video_code']);
						echo "<h3>Alltruck customer journeys:<br>" . $cjv['title'] . "</h3>";
					echo "</div>";
				}
			echo "</div>";			
		}
	?>
	<div class="clear"></div>          	          
            
<?php get_footer('customerjourney'); ?>