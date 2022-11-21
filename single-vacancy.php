<?php
get_header('vacancy'); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<div id="wrapper" class="top-spacer"><?php //this div closes in footer ?>
	
	<div class="vacancy-content">
		<h1 class="white-heading"><?php the_title(); ?></h1>
		<div class="general">			
			<?php the_content(); ?>
			<?php
				echo "<p>Positions available: " . get_field('vacancy_number_of_positions_available') . "</p>";
			?>
		</div>
		<div class="spacer"></div>
		<?php
		if(get_field('add_submit_your_cv_link')){
			echo "<div class=\"vacancy-toggle\">Click here to submit your CV</div>";
			echo "<div class=\"vacancy-hidden enquiry-form\">";
				echo do_shortcode('[contact-form-7 id="195" title="Vacancy Form"]');
			echo "</div>";
			echo "<div class=\"spacer\"></div>";
		}
		?>
		
	</div>	
	
	
		
<?php endwhile; ?>
<?php endif; ?>



<?php get_footer('customerjourney'); ?>