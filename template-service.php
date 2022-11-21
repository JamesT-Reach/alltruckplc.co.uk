<?php

/* Template Name: service template */ 

get_header(); ?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

<div class="content top-spacer">
	<div class="content-left">
		<?php
		
			echo "<h1 class=\"pink-heading\">";
				the_title();
			echo "</h1>";
		
			echo "<div class=\"general white\">";
				the_content();
			echo "</div>";
	
			$contract_hire_list_title = get_field('contract_hire_list_title', 28);
			$contract_hire_list_items = get_field('contract_hire_list_items', 28);
			if($contract_hire_list_title || $contract_hire_list_items){
				echo "<div class=\"contract-hire-list-box\">";
					if($contract_hire_list_title){echo "<h2>" . $contract_hire_list_title . "</h2>";}
					if($contract_hire_list_items){
						echo "<ul>";
							foreach($contract_hire_list_items as $chli){
								echo "<li>";
									if($chli['make_it_a_link']){echo "<a href=\"" . $chli['link'] . "\">";}
										echo $chli['list_item'];
									if($chli['make_it_a_link']){echo "</a>";}
								echo "</li>";
							}						
						echo "</ul>";
					}
				echo "</div>";
			}
		
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
</div>      
           
<?php endwhile; ?>
<?php endif; ?>	     
            
<?php get_footer('dark'); ?>