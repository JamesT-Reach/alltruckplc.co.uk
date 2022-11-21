<div class="news-sidebar">

	<div id="news-sidebar-twitter">
		<a class="twitter-timeline" data-width="280" data-height="400" data-theme="light" data-link-color="#e56db1" href="https://twitter.com/Alltruckplc?ref_src=twsrc%5Etfw">Tweets by Alltruckplc</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
	</div>

	<h3>Recent Posts</h3>
	<?php
	 $rp_args = array(
			  'posts_per_page'		=>	4,
			  'post_type'			=>	'post',
			  'order_by'			=>	'post_date',
			  'order'				=>	'DESC',
			  'post_status'			=>	'publish'
	  );
	  $sidebar_posts = get_posts($rp_args);
	  echo "<ul>";
		foreach($sidebar_posts as $sp){
			echo "<li>";
				echo "<a href=\"" . get_the_permalink($sp->ID) . "\">";
					echo get_the_title($sp->ID);
				echo "</a>";
			echo "</li>";
		}
	  echo "</ul>";
	?>
	<h3>Archives</h3>
	<?php			
		echo "<ul>";
			wp_get_archives( array(
				'type'  => 'monthly'
			) );
		echo "</ul>";
	?>
	<h3>Categories</h3>
	<?php
		echo "<ul>";
			echo "<li><a href=\"/news/\">All Posts</a></li>";
			$c_args = array('title_li' => '', 'orderby' => 'name');      
			wp_list_categories( $c_args  );
		echo "</ul>";
	?>
</div>