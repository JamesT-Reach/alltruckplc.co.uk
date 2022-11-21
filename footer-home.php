<div id="footer-outer-home">
	<div class="width-container">

		<style>
			.left, .right{
				display: inline-block;
			}

			.right{
				vertical-align: top;
			}
		</style>
	<div class="left">		
		
		<?php
			if(get_field('display_footer_contact_box')){
				echo "<div id=\"footer-contact\">";
					echo "<div id=\"footer-contact-box\">";
						echo "<h2>" . get_field('footer_contact_box_intro_text','option') . "</h2>";
						echo "<div id=\"footer-contact-box-call\">";
							echo "<h3>Call</h3>";					
								$footer_contact_box_telephone_number = get_field('footer_contact_box_telephone_number','option');
								echo "<a href=\"tel:" . str_replace(' ','',$footer_contact_box_telephone_number) . "\">" . $footer_contact_box_telephone_number . "</a>";	
						echo "</div>";
						echo "<div class=\"clear\"></div>";
					echo "</div>";
					echo "<a id=\"submit-enquiry\" href=\"" . get_field('footer_contact_box_submit_an_enquiry_link','option') . "\">click here to <span>Submit an Enquiry</span></a>";
				echo "</div>";
			}
		?>		

	</div>
	<div class="right">	
		<div style="margin-left: 20px; background: url('https://www.aquaidwatercoolers.co.uk/wp-content/uploads/2013/08/8.-Primary-Pink2.png'); width: 208px; height: 77px; font-family: arial,sans-serif; font-size: 9px; color: #ee0bc5; position: relative;"> 
				<div style="width: 130px; position: relative; top: 47px; left: 68px; line-height: 140%;">Our <a style="color: #ee0bc5; text-decoration: none; font-size: 8.7px;" href="http://www.aquaidwatercoolers.co.uk/" target="_blank">Water Dispenser</a> 
						<span style="line-height: 140%;">    is supplied by </span>
				</div> 
		</div>	
	</div>

	</div>	


	<div id="footer-main-strip">
		<footer>
			<div class="footer-left">
				<div id="footer-news-links">
					<?php
						$footer_latest_news_link = get_field('footer_latest_news_link','option');
						$footer_blog_link = get_field('footer_blog_link','option');
						echo "<a href=\"" . get_term_link($footer_latest_news_link) . "\" class=\"footer-news\">Latest news</a>";
						echo "<a href=\"" . get_term_link($footer_blog_link) . "\" class=\"footer-blog\">Blog</a>";	
						
					?>
					<div class="newsletter-trigger">Sign up to our newsletter</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>

				<div id="footer-registration">
					<?php echo get_field('footer_registration_text','option'); ?>
				</div>	
				<div class="clear"></div>
		
				<div id="footer-newsletter">
					<h2><?php echo get_field('footer_newsletter_title','option'); ?></h2>
					<p class="newsletter-intro"><?php echo get_field('footer_newsletter_intro_text','option'); ?></p>
					<?php echo do_shortcode('[contact-form-7 id="36" title="Newsletter Signup"]'); ?>
				</div>		
			</div>

			<div id="footer-social">
				<div id="footer-social-media">
					<span class="social-text"><?php echo get_field('footer_social_media_title','option'); ?></span>
					<?php
						$footer_facebook = get_field('footer_social_media_facebook_url','option');
						$footer_linkedin = get_field('footer_social_media_linked_in_url','option');
						$footer_twitter = get_field('footer_social_media_twitter_url','option');
						$footer_youtube = get_field('footer_social_media_youtube_url','option');

						if($footer_facebook){
							echo "<a href=\"" . $footer_facebook . "\" target=\"_blank\">";
								echo "<img src=\"" . get_bloginfo('template_url') . "/images/facebook-grey.png\" />";
							echo "</a>";
						}
						if($footer_linkedin){
							echo "<a href=\"" . $footer_linkedin . "\" target=\"_blank\">";
								echo "<img src=\"" . get_bloginfo('template_url') . "/images/linkedin-grey.png\" />";
							echo "</a>";
						}
						if($footer_twitter){
							echo "<a href=\"" . $footer_twitter . "\" target=\"_blank\">";
								echo "<img src=\"" . get_bloginfo('template_url') . "/images/twitter-grey.png\" />";
							echo "</a>";
						}
						if($footer_youtube){
							echo "<a href=\"" . $footer_youtube . "\" target=\"_blank\">";
								echo "<img src=\"" . get_bloginfo('template_url') . "/images/youtube-grey.png\" />";
							echo "</a>";
						}		
					?>	
					<div class="clear"></div>
					<a href="<?php echo get_bloginfo('url'); ?>/privacy-policy" style="color: #ffffff; font-size: 11px; margin-top: 17px; width: 100%;">Privacy policy</a>
				</div>
				<div id="investors-in-people">
					<a href="<?php echo get_field('investors_in_people_url','option'); ?>" target="_blank">
						<img src="<?php echo get_bloginfo('template_url'); ?>/images/platinum-logo.jpg" alt="Investors in People Platinum" />
					</a>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</footer>
	</div>
    
    <div class="sticky-contact-footer">
        <div class="sticky-footer-width">
            <p><?php echo get_field('footer_contact_box_intro_text','option'); ?> <strong>Call 
            <?php 
                $footer_contact_box_telephone_number = get_field('footer_contact_box_telephone_number','option');
                echo "<a href=\"tel:" . str_replace(' ','',$footer_contact_box_telephone_number) . "\">" . $footer_contact_box_telephone_number . "</a>";
                
                ?></strong>
            </p>
            
            <a id="sticky-submit-enquiry" href="<?php echo get_field('footer_contact_box_submit_an_enquiry_link','option'); ?>">click here to<br><span>Submit an Enquiry</span></a>
        </div>
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
			
			$('.home-bxslider').bxSlider({
				'auto': true,
				'pause': 6000,
				'pager': true,
				'speed': 1000,
				'controls': false,
				'mode': 'fade'
			});
			
			$('.bxslider-video').bxSlider({
				'auto': false,
				'pager': false,
				'speed': 1000,
				'controls': true,
				'slideWidth': 400,
				'minSlides': 2,
				'maxSlides': 2,
				'moveSlides': 1,
				'slideMargin': 10,
				'infiniteLoop': false
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