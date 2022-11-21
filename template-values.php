<?php 
/* Template Name: values template */ 
get_header('customerjourney'); ?>

<div id="wrapper" class="top-spacer"><?php //this div closes in footer ?> 
    <div>
    	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<h1 class="white-heading"><?php the_title(); ?></h1>
		<div class="enquiry-form">			
			<?php echo the_content(); ?>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
		<div class="spacer"></div>		
	</div>	                       	           	
            
<?php get_footer('customerjourney'); ?>         
          