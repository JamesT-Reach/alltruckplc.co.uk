<?php

/* Template Name: contract hire template */ 

get_header(); ?>

<div class="content top-spacer">
	<div class="content-left">
		<?php
			$contract_hire_main_heading = get_field('contract_hire_main_heading');
			if($contract_hire_main_heading){echo "<h1 class=\"pink-heading\">" . apply_filters("the_content", $contract_hire_main_heading) . "</h1>";}
		
			$contract_hire_first_paragraph = get_field('contract_hire_first_paragraph');
			if($contract_hire_first_paragraph){echo "<p class=\"big-white-paragraph padded-right\">" . $contract_hire_first_paragraph . "</p>";}
		
					
			$contract_hire_main_text_area = get_field('contract_hire_main_text_area');
			if($contract_hire_main_text_area){
				echo "<div class=\"general small-white-paragraph padded-right\">" . $contract_hire_main_text_area . "</div>";				
			}
		
			$contract_hire_list_title = get_field('contract_hire_list_title');
			$contract_hire_list_items = get_field('contract_hire_list_items');
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
            
<?php get_footer('dark'); ?>