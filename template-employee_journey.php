<?php
/* Template Name: employee journeys template */ 
get_header('employee'); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php
echo "<div id=\"employee-journey-banner\" style=\"background-image:url(" . get_the_post_thumbnail_url() . ")\">";
	if(get_field('employee_banner_heading')){
		echo "<div class=\"employee-journey-banner-inner\">";
			echo "<h2>" . get_field('employee_banner_heading') . "</h2>";
		echo "</div>";
	}
echo "</div>";
?>
<div id="wrapper"><?php //this div closes in footer ?>
	
	<div class="vacancy-content">
		<?php
		$employee_main_heading = get_field('employee_main_heading');
		if($employee_main_heading){
			echo "<h1 class=\"blue-heading\">" . $employee_main_heading . "</h1>";
		}		
		?>
		<div class="general">			
			<?php the_content(); ?>			
		</div>
		
		<div class="spacer"></div>
	</div>	
	
	
		
<?php endwhile; ?>
<?php endif; ?>

<?php
	$employee_journey_videos = get_field('employee_journey_videos');
	if($employee_journey_videos){
		echo "<div class=\"content-right\">";
			foreach($employee_journey_videos as $ejv){
				echo "<div class=\"cj-video\">";
					echo show_customerjourney_video($ejv['youtube_video_code']);
					echo "<h3>" . $ejv['title'] . "</h3>";
				echo "</div>";
			}
		echo "</div>";			
	}
?>

<?php get_footer('customerjourney'); ?>