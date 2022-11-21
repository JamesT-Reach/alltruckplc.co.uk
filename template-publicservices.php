<?php

/* Template Name: public services template */ 

get_header(); ?>

<div class="content top-spacer">
	<div class="content-left">
		<?php
			$public_services_main_heading = get_field('public_services_main_heading');
			if($public_services_main_heading){echo "<h1 class=\"pink-heading public-services-padding\">" . $public_services_main_heading . "</h1>";}
				
					
			$public_services_mission_box_heading = get_field('public_services_mission_box_heading');
			$public_services_mission_box_paragraph = get_field('public_services_mission_box_paragraph');
			if($public_services_mission_box_heading || $public_services_mission_box_paragraph){
				echo "<div class=\"public-services-mission-box\">";
					if($public_services_mission_box_heading){echo "<h3>" . $public_services_mission_box_heading . "</h3>";}
					if($public_services_mission_box_paragraph){echo "<p>" . $public_services_mission_box_paragraph . "</p>";}
				echo "</div>";
			}
		
			$public_services_first_large_paragraph = get_field('public_services_first_large_paragraph');
			if($public_services_first_large_paragraph){
				echo "<h2 class=\"public-services-h2 public-services-padding\">" . $public_services_first_large_paragraph . "</h2>";
			}
		
			$public_services_first_text_block = get_field('public_services_first_text_block');
			if($public_services_first_text_block){
				echo "<div class=\"general public-services-padding public-services-white-text\">" . $public_services_first_text_block . "</div>";
			}
		
			$public_services_bullet_list = get_field('public_services_bullet_list');
			if($public_services_bullet_list){
				echo "<ul class=\"public-services-list public-services-padding\">";
					foreach($public_services_bullet_list as $li){
						echo "<li>" . $li['list_item'] . "</li>";
					}
				echo "</ul>";
			}
		
			$public_services_second_text_block = get_field('public_services_second_text_block');
			if($public_services_second_text_block){
				echo "<div class=\"general public-services-padding public-services-white-text public-services-padded-bottom\">" . $public_services_second_text_block . "</div>";
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
            
<?php get_footer('dark'); ?>