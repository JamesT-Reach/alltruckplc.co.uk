<?php
/* Template Name: training template */ 
get_header('training'); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php
echo "<div id=\"employee-journey-banner\" style=\"background-image:url(" . get_the_post_thumbnail_url() . ")\">";
	
echo "</div>";
?>
<div id="wrapper"><?php //this div closes in footer ?>
	
	<div class="vacancy-content">
		<?php
		$training_text_section = get_field('training_text_section');
		if($training_text_section){
			foreach($training_text_section as $tts){
				echo "<div class=\"training-left-text-section\">";
					echo "<h2 class=\"blue-heading\">" . $tts['heading'] . "</h2>";
					echo "<div class=\"general\">";
						echo $tts['body'];				
					echo "</div>";
				echo "</div>";
			}
		}
		
		?>	
		
		
		
		<div class="spacer"></div>
	</div>	
	
	
		
<?php endwhile; ?>
<?php endif; ?>

<?php
echo "<div class=\"content-right training-courses\">";
	$training_courses_section_heading = get_field('training_courses_section_heading');
	if($training_courses_section_heading){echo "<h2>" . $training_courses_section_heading . "</h2>";}
	
	$training_courses = get_field('training_courses');
	if($training_courses){
		echo "<div id=\"courses\">";
			foreach($training_courses as $tc){
				echo "<div class=\"course\">";
					echo "<h3>" . $tc['title'] . "</h3>";
					echo "<p>" . $tc['body_copy'] . "</p>";
				echo "</div>";
			}
		echo "</div>";		
	}
echo "</div>";	
?>

<?php get_footer('customerjourney'); ?>