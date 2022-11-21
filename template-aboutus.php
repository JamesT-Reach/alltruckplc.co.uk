<?php

/* Template Name: about us template */ 

get_header(); ?>
<div class="content top-spacer">
	<div class="content-left">
		<?php
			
			$about_main_heading = get_field('about_main_heading');
			if($about_main_heading){echo "<h1 class=\"blue-heading\">" . $about_main_heading . "</h1>";}
			
			$about_first_white_paragraph = get_field('about_first_white_paragraph');
			if($about_first_white_paragraph){echo "<p class=\"big-bold-white-paragraph padded-right\">" . $about_first_white_paragraph . "</p>";}
			
		
			$about_additional_text = get_field('about_additional_text');
			if($about_additional_text){
				echo "<div class=\"general public-services-white-text our-journey-padding our-journey-text\">";
					echo $about_additional_text;
				echo "</div>";
				echo "<div class=\"spacer\"></div>";
			}
		
			$page_links = get_field('page_links');
			if($page_links){
				foreach($page_links as $pl){
					if($pl['use_external_link']){echo "<a href=\"" . $pl['external_link'] . "\" target=\"_blank\" style=\"color:" . $pl['text_color'] . "\" class=\"page-link\">";} else {
					echo "<a href=\"" . $pl['link'] . "\" style=\"color:" . $pl['text_color'] . "\" class=\"page-link\">"; }
						echo "<img src=\"" . $pl['image']['sizes']['link-thumb'] . "\" />";
						echo "<div class=\"page-link-text\"><p>" . $pl['text'] . "</p></div>";
						echo "<div class=\"clear\"></div>";
					echo "</a>";
				}
			} 
		?>
	</div>
</div>
            
<?php get_footer('light'); ?>