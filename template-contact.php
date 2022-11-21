<?php 
/* Template Name: contact template */ 
get_header('contact'); ?>

<div id="wrapper" class="top-spacer"><?php //this div closes in footer ?> 
    
    	<?php
		$contact_location_type = get_field('contact_location_type');
		if($contact_location_type){
			$count1 = 1;
			foreach($contact_location_type as $clt){
				echo "<div class=\"contact-location\">";
					if($clt['location_type']){echo "<h2 class=\"white-heading\">" . $clt['location_type'] . "</h2>";}	
					$count2 = 1;
					foreach($clt['location'] as $cltl){
						echo "<div class=\"contact-location-inner\">";
							echo "<div class=\"contact-location-inner-text\">";
								if($cltl['name']){echo "<h3>" . $cltl['name'] . "</h3>";}
								if($cltl['address']){echo "<p>" . $cltl['address'] . "</p>";}
								if($cltl['telephone']){echo "<p><span>Tel:</span> <strong><a href=\"tel:" . str_replace(' ','',$cltl['telephone']) . "\">" . $cltl['telephone'] . "</a></strong></p>";}
								if($cltl['fax']){echo "<p><span>F:</span> " . $cltl['fax'] . "</p>";}
								if($cltl['email']){echo "<p><span>E:</span> <a href=\"mailto:" . $cltl['email'] . "\">" . $cltl['email'] . "</a></p>";}
								if($cltl['workshop_telephone'] || $cltl['bodyshop_telephone'] || $cltl['additional_telephone_numbers']){echo "<div class=\"spacer\"></div>";}
								if($cltl['workshop_telephone']){echo "<p><span>Workshop:</span> <a href=\"tel:" . str_replace(' ','',$cltl['workshop_telephone']) . "\">" . $cltl['workshop_telephone'] . "</a></p>";}
								if($cltl['bodyshop_telephone']){echo "<p><span>Bodyshop:</span> <a href=\"tel:" . str_replace(' ','',$cltl['bodyshop_telephone']) . "\">" . $cltl['bodyshop_telephone'] . "</a></p>";}
								if($cltl['additional_telephone_numbers']){
									foreach($cltl['additional_telephone_numbers'] as $cltlat){
										echo "<p><span>" . $cltlat['name'] . ":</span> <a href=\"tel:" . str_replace(' ','',$cltlat['telephone_number']) . "\">" . $cltlat['telephone_number'] . "</a></p>";
									}
								}
							echo "</div>";
							if($cltl['map']){
								echo "<div class=\"map-container\">";
									$map = $cltl['map'];
									$style = '[{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]';	
									$lat = $map['lat'];
									$lng = $map['lng'];
									$icon = get_bloginfo('template_url') . "/images/map-marker.png";
									echo add_google_map($lat, $lng, 16, "100%", 300, $style, "map" . $count1 . $count2, $icon, true);	
								echo "</div>";
							}
							echo "<div class=\"clear\"></div>";
						echo "</div>";	
						$count2++;
					}
				echo "</div>";
				$count1++;
			}
		}
		/*
		$contact_additional_contacts = get_field('contact_additional_contacts');
		if($contact_additional_contacts){
			foreach($contact_additional_contacts as $cac){
				echo "<div class=\"contact-location-inner\">";
					if($cac['name']){echo "<h3>" . $cac['name'] . "</h3>";}
					if($cac['telephone']){echo "<p><span>Tel:</span> <a href=\"tel:" . str_replace(' ','',$cac['telephone']) . "\">" . $cac['telephone'] . "</a></p>";}
				echo "</div>";
			}			
		}	*/	
		?>	
	
          
       	           	                       	           	
            
<?php get_footer('contact'); ?>         
          