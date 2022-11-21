<?php
get_header('truck'); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="content top-spacer">

	<?php
		foreach (get_field('trucks') as $truck) {

	    $strippedTitle = str_replace(' ', '', $truck['truck_title']);
	    $cleanTitle = preg_replace('/[^A-Za-z0-9\-]/', '', $strippedTitle);
	?>

	<div id="<?php echo $cleanTitle; ?>" class="truck-container">
		<div class="truck-content-new">
			<div class="twocol-narrow-left-content">
				<h1 class="truck-main-heading"><?php echo $truck['truck_title']; ?></h1>
				<div class="general single-truck-content">
					<?php echo $truck['truck_content']; ?>
				</div>
			</div>
			<div class="twocol-narrow-right-content">
				<?php
					$truck_specification_table_heading = $truck['truck_specification_table_heading'];
					$truck_specification_table_rows = $truck['trucks_specification_table_rows'];
					if($truck_specification_table_heading){echo "<h3 class=\"truck-table-heading\">" . $truck_specification_table_heading . "</h3>";}
					if($truck_specification_table_rows){
						echo "<table class=\"truck-table\">";
							echo "<tbody>";
								foreach($truck_specification_table_rows as $tstr){
									echo "<tr>";
										echo "<td class=\"truck-col1\">" . $tstr['column_1'] . "</td>";
										echo "<td>" . $tstr['column_2'] . "</td>";
									echo "</tr>";
								}
							echo "</tbody>";	
						echo "</table>";
					}
				?>
			</div>
		</div>	
		<div class="clear"></div>
		<div class="truck-image truck-image-new">
			<img src="<?php echo $truck['truck_image']['url']; ?>" alt="<?php echo $truck['truck_image']['alt']; ?>">
		</div>
	</div>

	<?php
		}
	?>


	<div class="truck-content">
		<?php
			echo "<a href=\"/truck-rental/\" class=\"truck-rental-back\">Back to truck rentals</a>";

			$email_address = get_field('footer_contact_box_email_address','option');
			echo "<a href=\"mailto:" . $email_address . "?subject=All Truck website enquiry regarding ";
			the_title();
		    echo "\" class=\"truck-enquiry\">click here to <strong>Submit an Enquiry</strong></a>";
		?>
	</div>
	<div class="clear"></div>
</div>		
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer('light'); ?>