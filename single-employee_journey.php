<?php
get_header('employee'); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php
echo "<div id=\"employee-journey-banner\" style=\"background-image:url(" . get_the_post_thumbnail_url() . ")\"></div>";
?>
<div id="wrapper"><?php //this div closes in footer ?>
	
	<div class="vacancy-content">
		<h1 class="blue-heading"><?php the_title(); ?></h1>
		<div class="general employee">			
			<?php the_content(); ?>			
		</div>
		<div class="spacer"></div>
		<h2 class="white-heading">Current Vacancies</h2>
		<?php
		echo "<div class=\"vacancies-list\">";
			$vacancies_args = array(
				'posts_per_page'			=> -1,
				'post_type'					=> 'vacancy',
				'post_status'				=> 'publish',
				'orderby'					=> 'date',
				'order'						=> 'DESC'				
			);
			$vacancies = get_posts($vacancies_args);
			foreach($vacancies as $v){				
				echo "<a href=\"" . get_the_permalink($v->ID) . "\">";
					echo "<h3>";
						echo $v->post_title; 
						if((get_field('vacancy_number_of_positions_available', $v->ID)) !== '1'){
							echo " (x" . get_field('vacancy_number_of_positions_available', $v->ID) . ")";
						}
						if(get_field('vacancy_location', $v->ID)){
							echo " - ";
							echo get_field('vacancy_location', $v->ID);
						}
					echo "</h3>";
				echo "</a>";
			}
		echo "</div>";	
		?>
		<div class="spacer"></div>
	</div>	
	
	
		
<?php endwhile; ?>
<?php endif; ?>

<div class="content-right employees">
<?php
	$employee_args = array(
		'posts_per_page'			=> -1,
		'post_type'					=> 'employee_journey',
		'post_status'				=> 'publish',
		'orderby'					=> 'date',
		'order'						=> 'DESC'
	);
	$journeys = get_posts($employee_args);
	foreach($journeys as $j){
		if($j->ID == $post->ID){$active = "active";}
		else{$active = "";}
		echo "<a href=\"" . get_the_permalink($j->ID) . "\" class=\"" . $active . "\">";
			echo "<img src=\"" . get_the_post_thumbnail_url($j->ID,'employee-journey-thumb') . "\" />";
			echo "<h3>" . $j->post_title . "</h3>";
		echo "</a>";
	}
?>
</div>

<?php get_footer('customerjourney'); ?>