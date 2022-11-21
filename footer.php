
<footer>
	
	<div id="footer-contact">
		<div id="footer-contact-box">
			<h2><?php echo get_field('footer_contact_box_intro_text','option'); ?></h2>
			<div id="footer-contact-box-call">
				<h3>Call</h3>
				<?php
					$footer_contact_box_telephone_number = get_field('footer_contact_box_telephone_number','option');
					echo "<a href=\"tel:" . $footer_contact_box_telephone_number . "\">" . $footer_contact_box_telephone_number . "</a>";				
				?>
			</div>
			<div class="clear"></div>
		</div>
		<a id="submit-enquiry" href="<?php echo get_field('footer_contact_box_submit_an_enquiry_link','option'); ?>">Click here to Submit an Enquiry</a>
	</div>
	
	<div id="footer-newsletter">
		<h2><?php echo get_field('footer_newsletter_title','option'); ?></h2>
		<p><?php echo get_field('footer_newsletter_intro_text','option'); ?></p>
		<?php echo do_shortcode('[contact-form-7 id="36" title="Newsletter Signup"]'); ?>
	</div>
	
	<div id="footer-social">
		<h2><?php echo get_field('footer_social_media_title','option'); ?></h2>
		<?php
			$footer_facebook = get_field('footer_social_media_facebook_url','option');
			$footer_linkedin = get_field('footer_social_media_linked_in_url','option');
			$footer_twitter = get_field('footer_social_media_twitter_url','option');
			$footer_youtube = get_field('footer_social_media_youtube_url','option');
		
			if($footer_facebook){
				echo "<a href=\"" . $footer_facebook . "\" target=\"_blank\">";
					echo "<img src=\"" . get_bloginfo('template_url') . "/images/facebook.png\" />";
				echo "</a>";
			}
			if($footer_linkedin){
				echo "<a href=\"" . $footer_linkedin . "\" target=\"_blank\">";
					echo "<img src=\"" . get_bloginfo('template_url') . "/images/linkedin.png\" />";
				echo "</a>";
			}
			if($footer_twitter){
				echo "<a href=\"" . $footer_twitter . "\" target=\"_blank\">";
					echo "<img src=\"" . get_bloginfo('template_url') . "/images/twitter.png\" />";
				echo "</a>";
			}
			if($footer_youtube){
				echo "<a href=\"" . $footer_youtube . "\" target=\"_blank\">";
					echo "<img src=\"" . get_bloginfo('template_url') . "/images/youtube.png\" />";
				echo "</a>";
			}		
		?>	
		<div class="clear"></div>
		
		<a href="<?php echo get_bloginfo('url'); ?>/privacy-policy" style="color: #ffffff; font-size: 11px; margin-top: 30px; width: 100%;">Privacy policy</a>
	</div>
	
	<div id="footer-registration">
		<?php echo get_field('footer_registration_text','option'); ?>
		
	</div>
	
</footer>	
    <div class="sticky-contact-footer">
        <div class="sticky-footer-width">
            <p>Call 
            <?php 
                $footer_contact_box_telephone_number = get_field('footer_contact_box_telephone_number','option');
                echo "<a href=\"tel:" . str_replace(' ','',$footer_contact_box_telephone_number) . "\">" . $footer_contact_box_telephone_number . "</a>";
                
                ?>
            </p>
            
            <a id="sticky-submit-enquiry" href="<?php echo get_field('footer_contact_box_submit_an_enquiry_link','option'); ?>">Click here to Submit an Enquiry</a>
        </div>
    </div>
	
	<?php wp_footer(); ?>
    
    <script>
	
		
	jQuery(document).ready(function ($) {
		
			$(".fancybox").fancybox({
				'transitionIn': 'fade',
				'transitionOut': 'fade',
				'easingIn': 'fade',
				'easingOut': 'fade',
				'nextEffect': 'fade',
				'prevEffect':'fade'
			});
		
			$(".fancybox-iframe").fancybox({
				'width'				: 900,
				'height'			: 506,
				'padding'			: 0,
				'autoScale'     	: true,
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'titleShow' 		: false,
				'type'				: 'iframe',
				helpers : {
				  overlay : {
					  locked : false
				  }
				}
			});
			
			$(".menu-toggle").click(function() {
				$(".nav-menu").slideToggle();
			});
			
			$(".menu-toggle").click(function() {
				$('#nav-icon').toggleClass('open');
			});
			
			var navcontainer = $('.nav-menu');			
			$(window).resize(function(){
            	var width = $(window).width();
            	if (width > 767 && navcontainer.is(':hidden')){
                	navcontainer.removeAttr('style');
            	}
        	});
			
			$('.bxslider').bxSlider({
				'auto': true,
				'pause': 6000,
				'pager': false,
				'speed': 1000,
				'controls': false,
				'mode': 'fade'
			});
			
			$(".vacancy-toggle").click(function() {
				$(".vacancy-hidden").slideToggle();
			});
		
			$(".newsletter-trigger").click(function() {
				$("#footer-newsletter").slideToggle();
			});
		
			$(".vacancies-toggle-container").click(function() {				
				$(this).next('.vacancies-list').slideToggle( function() {
					if($(this).is(':hidden')){
						$(this).prev().children().css('background-image', 'url(<?php echo get_bloginfo('template_url'); ?>/images/bullet-arrow.png)');
					}else{
						$(this).prev().children().css('background-image', 'url(<?php echo get_bloginfo('template_url'); ?>/images/bullet-arrow-down.png)');
					}
				});
			});
			
	});

</script>


</body>
</html>