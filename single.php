<?php
get_header('news'); ?>

<div class="content top-spacer">
	<div class="news-left">
		<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<h1 class="pink-heading"><?php the_title(); ?></h1>
			<?php
				if(get_the_post_thumbnail()){
					echo "<div class=\"single-news-featured-image\">";
						the_post_thumbnail();
					echo "</div>";
				}					
			?>
			<p class="post-meta">Posted in <?php the_category(', '); ?> on <?php the_time(get_option('date_format')); ?></p>
			<div class="general"><?php the_content(); ?></div>

			<?php 

			$images = get_field('n_gallery');

			if( $images ): ?>
			    <ul class="news-gallery">
			        <?php foreach( $images as $image ): ?>
			            <li>
			                <a href="<?php echo $image['url']; ?>" class="fancybox" rel="group">
			                     <img src="<?php echo $image['sizes']['news-gallery-thumb']; ?>" />
			                </a>
			            </li>
			        <?php endforeach; ?>
			    </ul>
			<?php endif; ?>


		<?php endwhile; ?>
		<?php endif; ?>	
	</div>
	<div class="news-right">
		<?php get_sidebar(); ?>
	</div>	
	<div class="clear"></div>
</div>		

<?php get_footer('home'); ?>