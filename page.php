<?php get_header('pink'); ?>

<div id="wrapper" class="top-spacer"><?php //this div closes in footer ?> 
    <div class="vacancy-content">
    	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<h1 class="white-heading"><?php the_title(); ?></h1>
		<div class="general">			
			<?php the_content(); ?>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
		<div class="spacer"></div>		
	</div>	                       	           	
            
<?php get_footer('customerjourney'); ?>         
          