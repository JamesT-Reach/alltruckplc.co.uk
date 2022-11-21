<?php

/* Template Name: truck rental template */ 

get_header(); ?>

<div class="content top-spacer">
	<div class="content-left">
		<?php
			
			$truck_rental_main_heading = get_field('truck_rental_main_heading');
			if($truck_rental_main_heading){echo "<h1 class=\"pink-heading padded-right\">" . apply_filters("the_content", $truck_rental_main_heading) . "</h1>";}
			
					
			$truck_rental_main_text = get_field('truck_rental_main_text');
			if($truck_rental_main_text){
				echo "<div class=\"general small-white-paragraph padded-right-less\">";
					echo $truck_rental_main_text;
				echo "</div>";
				echo "<div class=\"spacer\"></div>";
			}
		
			echo "<div id=\"truck-rental-trucks-container\">";
				$truck_rental_trucks_heading = get_field('truck_rental_trucks_heading');
				if($truck_rental_trucks_heading){echo "<h2>" . $truck_rental_trucks_heading . "</h2>";}
				echo "<div id=\"truck-rental-trucks\">";
					foreach(get_field('trucks') as $t){
						echo "<a href=\"" . $t['link'] . "\">";
							echo "<div class=\"truck-thumb\">";
								echo "<img src=\"" . $t['truck_thumbnail']['sizes']['new-truck-thumb'] . "\" alt=\"" . $t['truck_thumbnail']['alt'] . "\">";
							echo "</div>";
							echo "<h3>" . $t['truck_title'] . "</h3>";
						echo "</a>";
					}
					echo "<div class=\"clear\"></div>";
				echo "</div>";
			echo "</div>";
		
			
		
			$truck_rental_bottom_text = get_field('truck_rental_bottom_text');
			if($truck_rental_bottom_text){
				echo "<div class=\"general small-white-paragraph padded-right-less\">";
					echo $truck_rental_bottom_text;
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
            
<?php get_footer('dark'); ?>