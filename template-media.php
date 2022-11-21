<?php
/* Template Name: Media template */ 
get_header('media'); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

<div class="content top-spacer">

	<h1 class="blue-heading media-heading"><?php echo get_the_title(); ?></h1>

	<div class="media-content">

		<div class="media-block news">
			
			<a href="/latest-news" class="media-title">Latest News</a>

			<?php

				$latest_news = array(
					'posts_per_page'			=> 1,
					'post_type'					=> 'post',
					'post_status'				=> 'publish',
					'orderby'					=> 'date',
					'order'						=> 'DESC',
					'category_name'				=> 'latest-news'				
				);
				$latest_news = get_posts($latest_news);
				$initialID = "";
				foreach($latest_news as $n){
						echo "<div class=\"media-thumb\">";
							echo "<a href=\"" . get_the_permalink($n->ID) . "\">";
							echo get_the_post_thumbnail($n->ID,'employee-journey-thumb');
							echo "</a>";
						echo "</div>";
						$categories = get_the_category($n->ID);
						$separator = ', ';
						$output = '';
						echo "<p class=\"post-meta\">Posted in ";
						if ( ! empty( $categories ) ) {
						    foreach( $categories as $category ) {
						        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
						    }
						    echo trim( $output, $separator );
						}
						 echo " on " . get_the_time(get_option('date_format'), $n->ID) . "</p>";
						echo "<a href=\"" . get_the_permalink($n->ID) . "\"><h3>" . $n->post_title . "</h3></a>";
						echo "<p>" . my_custom_excerpt($n->post_content, 150) . "</p>";
						echo "<a class=\"media-link\" href=\"" . get_the_permalink($n->ID) . "\">" . get_field('news_link_text') . "</a>";

						$initialID = $n->ID;
				}

			?>

		</div>


		<div class="media-block blog">
			
			<a href="/blog" class="media-title blog">Blog</a>

			<?php

				$blog = array(
					'posts_per_page'			=> 2,
					'post_type'					=> 'post',
					'post_status'				=> 'publish',
					'orderby'					=> 'date',
					'order'						=> 'DESC',
					'category_name'				=> 'blog'				
				);
				$blog = get_posts($blog);
				$count = 1;
				foreach($blog as $b){

					if($count == 1) {

						if($b->ID != $initialID) {
							echo "<div class=\"media-thumb\">";
							echo "<a href=\"" . get_the_permalink($b->ID) . "\">";
								echo get_the_post_thumbnail($b->ID,'employee-journey-thumb');
								echo "</a>";
							echo "</div>";
							$categories = get_the_category($b->ID);
							$separator = ', ';
							$output = '';
							echo "<p class=\"post-meta\">Posted in ";
							if ( ! empty( $categories ) ) {
							    foreach( $categories as $category ) {
							        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
							    }
							    echo trim( $output, $separator );
							}
							 echo " on " . get_the_time(get_option('date_format'), $b->ID) . "</p>";
							echo "<a href=\"" . get_the_permalink($b->ID) . "\"><h3>" . $b->post_title . "</h3></a>";
							echo "<p>" . my_custom_excerpt($b->post_content, 150) . "</p>";
							echo "<a class=\"media-link\" href=\"" . get_the_permalink($b->ID) . "\">" . get_field('news_link_text') . "</a>";
							$count++;
						}

					}
				}

			?>

		</div>


		<div class="media-block vids">
			
			<a href="<?php echo get_field('videos_page_link'); ?>" class="media-title vids">Videos</a>

			<?php

				$video = get_field('video_categories', 2022)[0]['videos'][0];

				echo "<div class=\"media-thumb video\">";
					echo "<a class=\"fancybox-iframe\" href=\"https://www.youtube.com/embed/" .  $video['youtube_code'] . "?fs=1&rel=0&vq=large&autoplay=1&showinfo=0&autohide=1\">";
					echo "<img src=\"https://img.youtube.com/vi/" . $video['youtube_code'] . "/maxresdefault.jpg\">";
					echo "<div class=\"video-screen\"></div>";
					echo "</a>";
				echo "</div>";
				echo "<a class=\"fancybox-iframe\" href=\"https://www.youtube.com/embed/" .  $video['youtube_code'] . "?fs=1&rel=0&vq=large&autoplay=1&showinfo=0&autohide=1\"><h3>" . $video['video_title'] . "</h3></a>";
				echo "<a class=\"fancybox-iframe media-link\" href=\"https://www.youtube.com/embed/" .  $video['youtube_code'] . "?fs=1&rel=0&vq=large&autoplay=1&showinfo=0&autohide=1\">" . get_field('videos_link_text') . "</a>";

			?>

		</div>

		<div class="media-block twitter">
			
			<a href="<?php echo get_field('footer_social_media_twitter_url', 'option'); ?>" class="media-title twitter">Twitter</a>

			<div id="news-sidebar-twitter">
				<a class="twitter-timeline" data-width="280" data-height="400" data-theme="light" data-link-color="#e56db1" href="https://twitter.com/Alltruckplc?ref_src=twsrc%5Etfw">Tweets by Alltruckplc</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
			<a class="media-link" href="<?php echo get_field('footer_social_media_twitter_url', 'option'); ?>"><?php echo get_field('twitter_link_text'); ?></a>
		</div>

	</div>

</div>	
	
	
		
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer('home'); ?>