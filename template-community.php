<?php

/* Template Name: community template */ 

get_header('community'); ?>

<div class="content top-spacer">

	<?php
		$community_main_heading = get_field('community_main_heading');
		if($community_main_heading){echo "<h1 class=\"blue-heading\">" . $community_main_heading . "</h1>";}
	?>


	<div class="twocol-narrow-left-content">
   		<?php
		
			$community_first_white_paragraph = get_field('community_first_white_paragraph');
			if($community_first_white_paragraph){echo "<p class=\"big-bold-white-paragraph bottom-padded\">" . $community_first_white_paragraph . "</p>";}
		
			$community_additional_blue_paragraphs = get_field('community_additional_blue_paragraphs');
			if($community_additional_blue_paragraphs){
				foreach($community_additional_blue_paragraphs as $cabp){
					echo "<p class=\"small-blue-paragraph bottom-padded\">" . $cabp['paragraph'] . "</p>";
				}				
			}
			
			$community_additional_paragraphs = get_field('community_additional_paragraphs');
			if($community_additional_paragraphs){
				foreach($community_additional_paragraphs as $cap){
					echo "<p class=\"small-blue-paragraph\">" . $cap['paragraph'] . "</p>";
				}	
				echo "<div class=\"spacer\"></div>";
			}	
			
		
			$community_youtube_video_code = get_field('community_youtube_video_code');
			if($community_youtube_video_code){
				echo "<div class=\"community-video\">";
					echo show_youtube_video($community_youtube_video_code);
				echo "</div>";
			}
			
		
		?>
	</div>   
	<div class="twocol-narrow-right-content">

		<div class="community-blog">
			<?php
				$blog_args = array(
					'posts_per_page'			=> 2,
					'post_type'					=> 'post',
					'post_status'				=> 'publish',
					'orderby'					=> 'date',
					'order'						=> 'DESC',
					'category_name'				=> 'blog'				
				);
				$blog = get_posts($blog_args);
				foreach($blog as $b){

					echo "<div class=\"community-blog-item\">";

						echo "<div class=\"community-blog-date\">" . get_the_date( 'jS F Y', $b->ID ) . "</div>";
						echo "<h3><a href=\"" . get_the_permalink($b->ID) . "\">" . $b->post_title . "</a></h3>";
						
						echo "<a class=\"community-image\" href=\"" . get_the_permalink($b->ID) . "\">";
							echo get_the_post_thumbnail($b->ID,'leicestershire-cares-thumb');
						echo "</a>";

						echo "<div class=\"community-text\">";
							echo my_custom_excerpt(get_post_field('post_content', $b->ID), 200);
						echo "<a href=\"" . get_the_permalink($b->ID) . "\">read more</a>";
						echo "</div>";

						echo "<div class=\"clear\"></div>";

					echo "</div>";

				}
			?>
		</div>


		<?php
			$community_leicestershire_cares_link = get_field('community_leicestershire_cares_link');
			if($community_leicestershire_cares_link){
				echo "<a href=\"" . $community_leicestershire_cares_link[0]['url'] . "\" target=\"_blank\" class=\"leicestershire-cares-link\">";
					echo "<img src=\"" . $community_leicestershire_cares_link[0]['image']['sizes']['leicestershire-cares-thumb'] . "\" />";
					echo "<div class=\"leicestershire-cares-link-text\">";
						echo "<p>" . $community_leicestershire_cares_link[0]['text'] . "</p>";
					echo "</div>";
					echo "<div class=\"clear\"></div>";
				echo "</a>";
			}
		?>
	</div>
	<div class="clear"></div>  
</div>           
            
<?php get_footer('community'); ?>