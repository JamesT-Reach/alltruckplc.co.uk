<?php

/* Template Name: careers template */ 

get_header(); ?>

<div class="content top-spacer">
	<div class="content-left">
        <?php
		
			$careers_main_heading = get_field('careers_main_heading');
			if($careers_main_heading){echo "<h1 class=\"white-heading\">" . $careers_main_heading . "</h1>";}
			
			$careers_first_paragraph = get_field('careers_first_paragraph');
			if($careers_first_paragraph){echo "<p class=\"big-bold-white-paragraph padded-right\">" . $careers_first_paragraph . "</p>";}
		
			$careers_second_paragraph = get_field('careers_second_paragraph');
			if($careers_second_paragraph){
				echo "<p class=\"small-white-paragraph padded-right-less\">" . $careers_second_paragraph . "</p>";
			}
		
			$careers_third_paragraph = get_field('careers_third_paragraph');
			if($careers_third_paragraph){
				echo "<p class=\"bold-blue-paragraph padded-right-less\">" . $careers_third_paragraph . "</p>";				
			}
		
			
		
			echo "<div id=\"current\" class=\"vacancies-container\">";
		
				$current_vacancies_args = array(
					'posts_per_page'			=> -1,
					'post_type'					=> 'vacancy',
					'post_status'				=> 'publish',
					'perm'						=> 'readable',
					'orderby'					=> 'date',
					'order'						=> 'DESC',
					'meta_key'					=> 'vacancy_category',
					'meta_value'				=> 'current_vacancies'
				);
				$current_vacancies = get_posts($current_vacancies_args);
				
					echo "<div class=\"vacancies-outer\">";
						echo "<div class=\"vacancies-toggle-container\">";
							echo "<h2 class=\"vacancies-toggle\">Current Vacancies</h2>";
						echo "</div>";
						echo "<div class=\"vacancies-list\">";
							if($current_vacancies){
								foreach($current_vacancies as $cv){
									echo "<a href=\"" . get_the_permalink($cv->ID) . "\">";
										echo "<h3>";
											echo $cv->post_title; 
											if((get_field('vacancy_number_of_positions_available', $cv->ID)) !== '1'){
												echo " (x" . get_field('vacancy_number_of_positions_available', $cv->ID) . ")";
											}
											if(get_field('vacancy_location', $cv->ID)){
												echo " - ";
												echo get_field('vacancy_location', $cv->ID);
											}
										echo "</h3>";
									echo "</a>";
								}
							} else {
								echo "<p>Currently no Vacancies available</p>";
							}							
						echo "</div>";
					echo "</div>";
				
		
				$graduate_scheme_args = array(
					'posts_per_page'			=> -1,
					'post_type'					=> 'vacancy',
					'post_status'				=> 'publish',
					'perm'						=> 'readable',
					'orderby'					=> 'date',
					'order'						=> 'DESC',
					'meta_key'					=> 'vacancy_category',
					'meta_value'				=> 'graduate_scheme'
				);
				$graduate_scheme = get_posts($graduate_scheme_args);
				
					echo "<div class=\"vacancies-outer\">";
						echo "<div class=\"vacancies-toggle-container\">";
							echo "<h2 class=\"vacancies-toggle\">Graduate Scheme</h2>";
						echo "</div>";
						echo "<div class=\"vacancies-list\">";
							if($graduate_scheme){
								foreach($graduate_scheme as $gs){
									echo "<a href=\"" . get_the_permalink($gs->ID) . "\">";
										echo "<h3>";
											echo $gs->post_title; 
											if((get_field('vacancy_number_of_positions_available', $gs->ID)) !== '1'){
												echo " (x" . get_field('vacancy_number_of_positions_available', $gs->ID) . ")";
											}
											if(get_field('vacancy_location', $gs->ID)){
												echo " - ";
												echo get_field('vacancy_location', $gs->ID);
											}
										echo "</h3>";
									echo "</a>";
								}
							} else {
								echo "<p>Currently no Graduate Scheme available</p>";								
							}
						echo "</div>";
					echo "</div>";
				
		
				$apprenticeships_args = array(
					'posts_per_page'			=> -1,
					'post_type'					=> 'vacancy',
					'post_status'				=> 'publish',
					'perm'						=> 'readable',
					'orderby'					=> 'date',
					'order'						=> 'DESC',
					'meta_key'					=> 'vacancy_category',
					'meta_value'				=> 'apprenticeships'
				);
				$apprenticeships = get_posts($apprenticeships_args);				
					echo "<div class=\"vacancies-outer\">";
						echo "<div class=\"vacancies-toggle-container\">";
							echo "<h2 class=\"vacancies-toggle\">Apprenticeships</h2>";
						echo "</div>";
						echo "<div class=\"vacancies-list\">";
							if($apprenticeships){
								foreach($apprenticeships as $a){
									echo "<a href=\"" . get_the_permalink($a->ID) . "\">";
										echo "<h3>";
											echo $a->post_title; 
											if((get_field('vacancy_number_of_positions_available', $a->ID)) !== '1'){
												echo " (x" . get_field('vacancy_number_of_positions_available', $a->ID) . ")";
											}
											if(get_field('vacancy_location', $a->ID)){
												echo " - ";
												echo get_field('vacancy_location', $a->ID);
											}
										echo "</h3>";
									echo "</a>";
								}
							} else {
								echo "<p>Currently no Apprenticeships available</p>";
							}
						echo "</div>";
					echo "</div>";	
		
			echo "</div>";
		
			$careers_vacancies_paragraph = get_field('careers_vacancies_paragraph');
			if($careers_vacancies_paragraph){
				echo "<p class=\"small-white-paragraph padded-right-less\">" . $careers_vacancies_paragraph . "</p>";
			} ?>
			<?php
				if(get_field('add_submit_your_cv_link')){
					echo "<div class=\"vacancy-toggle\">Click here to submit your CV</div>";
					echo "<div class=\"vacancy-hidden enquiry-form\">";
						echo do_shortcode('[contact-form-7 id="2716" title="Vacancy Form 2"]');
					echo "</div>";
					echo "<div class=\"spacer\"></div>";
				}
			?>
			<?php
			echo "<div class=\"spacer\"></div>";
		
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
            
<?php get_footer('lightcv'); ?>