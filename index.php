<?php

get_header('news'); ?>

<div class="content top-spacer">
	<div class="news-left">
	
	<h1 class="pink-heading">
		All Posts
	</h1>

	<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<div class="news-index-item">
			<a class="news-index-thumb" href="<?php echo get_the_permalink(); ?>">
				<?php							
					if(get_the_post_thumbnail()){
						the_post_thumbnail('post-thumb');
					} else {
						echo "<img src=\"" .  get_bloginfo('template_url') . "/images/generic-news-thumb.png\" />";
					}							
				?>
			</a>						
			<div class="news-index-text">
				<a class="news-title" href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
				<p class="post-meta">Posted in <?php the_category(', '); ?> on <?php the_time(get_option('date_format')); ?></p>
				<p class="post-excerpt">
				  <?php 
					  $paragraphs = array("<p>", "</p>");  
					  $content = str_replace($paragraphs, "", my_custom_excerpt($post->post_content, 300)); 
					  echo $content;		
				  ?>
				  <a href="<?php echo get_the_permalink(); ?>" class="read-more">Read More</a>
				</p>							
			</div>
			<div class="clear"></div>
		</div>


	<?php endwhile; ?>
	<?php endif; ?>
	<div class="post-pagination">
		<div id="posts-next"><?php next_posts_link("Next Page"); ?></div>
		<div id="posts-previous"><?php previous_posts_link("Previous Page"); ?></div>
		<div class="clear"></div>
	</div>
	</div>
	<div class="news-right">
		<?php get_sidebar(); ?>
	</div>	
	<div class="clear"></div>
</div>

<?php get_footer('home'); ?>
