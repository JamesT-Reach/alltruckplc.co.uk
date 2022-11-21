<?php

/* Template Name: homepage template */ 

get_header(); ?>

<?php

	echo "<div id=\"home-slider\">";
		echo "<ul class=\"home-bxslider\">";
			foreach (get_field('slider_images') as $slide) {
				echo "<li><img src=\"" . $slide['image']['url'] . "\" alt=\"" . $slide['image']['alt'] . "\"></li>";
			}
		echo "</ul>";
	echo "</div>";

	echo "<div class=\"home-intro-section-outer\">";

		echo "<div class=\"home-intro-section\">";
			echo "<h2>" . get_field('home_first_heading') . "</h2>";

			foreach (get_field('home_links') as $linkbox) {
				echo "<a href=\"" . $linkbox['link'] . "\" class=\"home-top-linkbox\" style=\"background-color:" . $linkbox['background_colour'] . "\">";

					echo "<h4>" . $linkbox['white_text'] . "</h4>";
					echo "<span>" . $linkbox['blue_text'] . "</span>";

				echo "</a>";
			}
		echo "</div>";

	echo "</div>";

	echo "<div id=\"home-bottom-content-outer\">";
		echo "<div id=\"home-bottom-content-inner\">";
			$home_main_heading = get_field('home_main_heading');
			if($home_main_heading){echo "<h1>" . $home_main_heading . "</h1>";}
			echo "<div class=\"home-left-column\">";
				$home_paragraphs = get_field('home_paragraphs');
				if($home_paragraphs){
					foreach($home_paragraphs as $hp){
						echo "<p>" . $hp['paragraph'] . "</p>";
					}
				}
			echo "</div>";
			echo "<div class=\"home-right-column\">";

				echo "<h4>" . get_field('clients_title') . "</h4>";

				echo "<div class=\"home-clients-box\">";
					foreach (get_field('clients') as $c) {
						echo "<div class=\"client-logo\">";
							echo "<img src=\"" . $c['logo']['url'] . "\">";
						echo "</div>";
					}
				echo "</div>";


			
			echo "</div>";
			echo "<div class=\"clear\"></div>";

			echo "<div class=\"home-quote-box\">";		

				echo "<h4>" . get_field('quotes_title') . "</h4>";

				$home_quotes = get_field('home_quotes');
				if($home_quotes){
					if(count($home_quotes) > 1){			
						echo "<ul class=\"bxslider\">";
							foreach($home_quotes as $hq){
								echo "<li>";
									echo "<p>" . $hq['quote'] . "</p>"; 
									if($hq['quote_by']){
										echo "<span>" . $hq['quote_by'] . "</span>";
									}
								echo "</li>";
							}
						echo "</ul>";
					} else {
						echo "<p>" . $home_quotes[0]['quote'] . "</p>"; 
						if($home_quotes[0]['quote_by']){
							echo "<span>" . $home_quotes[0]['quote_by'] . "</span>";
						}
					}				
					
				}
			echo "</div>";

		echo "</div>";
	echo "</div>";

?>
            
<?php get_footer('home'); ?>