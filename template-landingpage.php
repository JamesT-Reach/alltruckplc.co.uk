<?php
/* Template Name: landing page template */ 

get_header('landingpage'); 

$background_color_option = get_field('lp_body_background_colour'); 
?>
 

<div class="content lp top-spacer">

	<div class="lp-right">
		<h2 class="form-heading"><?php echo get_field('form_heading'); ?></h2>
		<div class="floating-form">
			<div class="enquiry-form">
				<?php echo do_shortcode('[contact-form-7 id="192" title="Enquiry Form"]'); ?>
			</div>
		</div>

		<div class="lp-images">
			<?php

				$images = get_field('images');
				
				if($images){
					foreach($images as $i){
						echo "<img src=\"" . $i['image']['url'] . "\">";
					}
				}

			?>			
		</div>
	</div>


	<div class="content-left">
		<?php
			$contract_hire_main_heading = get_field('contract_hire_main_heading');
			if($contract_hire_main_heading){echo "<h1 class=\"lp-heading\">" . apply_filters("the_content", $contract_hire_main_heading) . "</h1>";}
		
			$contract_hire_first_paragraph = get_field('contract_hire_first_paragraph');
			if($contract_hire_first_paragraph){echo "<div class=\"big-white-paragraph padded-right\">" . apply_filters('the_content',$contract_hire_first_paragraph) . "</div>";}
		
		
		
			if(get_field('add_truck_rentals_block')){
				
			
				echo "<div id=\"truck-rental-trucks-container\">";
				$truck_rental_trucks_heading = get_field('truck_rental_trucks_heading');
				if($truck_rental_trucks_heading){echo "<h2>" . $truck_rental_trucks_heading . "</h2>";}
				echo "<div id=\"truck-rental-trucks\">";
					$truck_args = array(
						'posts_per_page'			=> -1,
						'post_type'					=> 'truck',
						'post_status'				=> 'publish',
						'orderby'					=> 'menu_order',
						'order'						=> 'ASC'				
					);
					$trucks = get_posts($truck_args);
					foreach($trucks as $t){
						echo "<a href=\"" . get_the_permalink($t->ID) . "\">";
							echo "<div class=\"truck-thumb\">";
								echo get_the_post_thumbnail($t->ID,'new-truck-thumb');
							echo "</div>";
							echo "<h3>" . $t->post_title . "</h3>";
						echo "</a>";
					}
					echo "<div class=\"clear\"></div>";
				echo "</div>";
			echo "</div>";
				
				
			}
		
		
					
			$contract_hire_main_text_area = get_field('contract_hire_main_text_area');
			if($contract_hire_main_text_area){
				echo "<div class=\"general small-white-paragraph padded-right\">" . $contract_hire_main_text_area . "</div>";
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
            
<?php 
if($background_color_option == "blue"){
	get_footer('dark');
} 
else {
	get_footer('light');	
}      
?>