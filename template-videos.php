<?php
/* Template Name: Videos template */ 
get_header('media'); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

<div class="content top-spacer">

	<h1 class="blue-heading media-heading"><?php echo get_the_title(); ?></h1>

	<div class="media-content videos">

			<?php

				$vidCats = get_field('video_categories');

				foreach ($vidCats as $cats) {
					echo "<div class=\"cat-title\">" . $cats['title'] . "</div>";


					echo "<ul class=\"bxslider-video\">";
					foreach($cats['videos'] as $v){
						echo "<li>";
						echo "<div class=\"media-block videos\">";
							echo "<div class=\"media-thumb video\">";
								echo "<a class=\"fancybox-iframe\" href=\"https://www.youtube.com/embed/" .  $v['youtube_code'] . "?fs=1&rel=0&vq=large&autoplay=1&showinfo=0&autohide=1\">";
								echo "<img src=\"https://img.youtube.com/vi/" . $v['youtube_code'] . "/maxresdefault.jpg\">";
								echo "<div class=\"video-screen\"></div>";
								echo "</a>";
							echo "</div>";
							echo "<a class=\"fancybox-iframe\" href=\"https://www.youtube.com/embed/" .  $v['youtube_code'] . "?fs=1&rel=0&vq=large&autoplay=1&showinfo=0&autohide=1\"><h3>" . $v['video_title'] . "</h3></a>";
						echo "</div>";
						echo "</li>";
					}
					echo "</ul>";
				}

			?>

	</div>

</div>	
	
	
		
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer('home'); ?>