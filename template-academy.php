<?php 
/* Template Name: academy template */ 
get_header(); ?>

<div id="wrapper" class="top-spacer"><?php //this div closes in footer ?> 
    <div class="vacancy-content">
    	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<h1 class="blue-heading"><?php the_title(); ?></h1>
		<div class="general academy-padded-right">			
			<?php the_content(); ?>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
		<div class="spacer"></div>	
		<?php
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
            
<?php get_footer('customerjourney'); ?>         
          