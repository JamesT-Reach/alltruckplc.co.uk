<?php 
/* Template Name: enquiry template */ 
get_header(); ?>

<div id="wrapper" class="top-spacer"><?php //this div closes in footer ?> 
    <div class="vacancy-content">
    	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<h1 class="white-heading"><?php the_title(); ?></h1>
		<div class="enquiry-form">			
			<div class="pipedriveWebForms" data-pd-webforms="https://pipedrivewebforms.com/form/7fb1bafe768c624d493697dc379a6e0e2156794"><script src="https://cdn.pipedriveassets.com/web-form-assets/webforms.min.js"></script></div>
				<!-- <h2 style="margin: 0 0 16px 0;">Alltruck Leicester</h2>
				<p style="margin: 0 0 1rem 0;">Croft House, Huncote Road, Croft, Leicestershire LE9 3GT</p>
				<ul style="padding: 0 0 0 20px;">
					<li style="margin: 0 0 0.5rem 0;">Tel: <a style="font-weight: bold; color: white; text-decoration: underline;" href="tel:0116 402 1800">0116 402 1800</a></li>
					<li>E: <a style="font-weight: bold; color: white; text-decoration: underline;" href="mailto:enquiries@alltruckplc.co.uk">enquiries@alltruckplc.co.uk</a></li>
				</ul> -->
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
		<div class="spacer"></div>		
	</div>	                       	           	
            
<?php get_footer('customerjourney'); ?>         
          