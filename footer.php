<?php $t =& peTheme(); ?>
<?php $layout =& $t->layout; ?>
<?php $content =& $t->content; ?>
<?php $meta =& $content->meta(); ?>

	<section id="contact" class="text-divider bg-cover pad-large">

		<?php if ( $t->options->get( 'footerBackground' ) ) : ?>
			
			<img alt="<?php _e( 'Footer background' ,'Pixelentity Theme/Plugin'); ?>" class="divider-bg" src="<?php echo $t->options->get( 'footerBackground' ); ?>" />
			<div class="divider-overlay"></div>

		<?php endif; ?>
	
		<div class="row divider-content">

			<?php if ( $t->options->get( 'footerAddress' ) ) : ?>

				<div class="medium-4 columns text-center contact-method">

					<?php if ( $t->options->get( 'footerAddressLink' ) ) : ?>

						<a href="<?php echo $t->options->get( 'footerAddressLink' ); ?>">

					<?php endif; ?>

						<div class="icon icon-geolocalizator text-white"></div>

					<?php if ( $t->options->get( 'footerAddressLink' ) ) : ?>

						</a>

					<?php endif; ?>

					<span class="text-white"><em><?php echo $t->options->get( 'footerAddress' ); ?></em></span>
				</div>

			<?php endif; ?>

			<?php if ( $t->options->get( 'footerEmail' ) ) : ?>
			
				<div class="medium-4 columns text-center contact-method">

					<?php if ( $t->options->get( 'footerEmailLink' ) ) : ?>

						<a href="<?php echo $t->options->get( 'footerEmailLink' ); ?>">

					<?php endif; ?>

						<div class="icon icon-mail-open text-white"></div>

					<?php if ( $t->options->get( 'footerEmailLink' ) ) : ?>

						</a>

					<?php endif; ?>

					<span class="text-white"><em><?php echo $t->options->get( 'footerEmail' ); ?></em></span>
				</div>

			<?php endif; ?>
			
			<?php if ( $t->options->get( 'footerPhone' ) ) : ?>

				<div class="medium-4 columns text-center contact-method">

					<?php if ( $t->options->get( 'footerPhoneLink' ) ) : ?>

						<a href="<?php echo $t->options->get( 'footerPhoneLink' ); ?>">

					<?php endif; ?>

						<div class="icon icon-smartphone text-white"></div>

					<?php if ( $t->options->get( 'footerPhoneLink' ) ) : ?>

						</a>

					<?php endif; ?>

					<span class="text-white"><em><?php echo $t->options->get( 'footerPhone' ); ?></em></span>
				</div>

			<?php endif; ?>

		</div>

		<?php if ( $t->options->get( 'contactSubject' ) ) : ?>
		
			<div class="row divider-content">
				<div class="medium-8 medium-centered columns">
				
					<form id="contact-form" class="text-center peThemeContactForm">
					
						<h1 class="text-white"><?php _e( 'Reserve your spot now' ,'Pixelentity Theme/Plugin'); ?></h1>
						<input name="author" id="form-name" type="text" placeholder="<?php _e( 'Name' ,'Pixelentity Theme/Plugin'); ?>" required="required" />
						<input name="email" id="form-email" type="email" placeholder="<?php _e( 'Email' ,'Pixelentity Theme/Plugin'); ?>" required />
						<input name="message" id="form-msg" type="text" placeholder="<?php _e( 'Message' ,'Pixelentity Theme/Plugin'); ?>" required />
						
						<div class="text-right">
							<span id="contactFormSent" class="form-validation text-white"><?php echo $t->options->get("msgOK"); ?></span>
							<span id="contactFormError" class="form-validation text-white"><?php echo $t->options->get("msgKO"); ?></span>
							<div class="btn white-btn clear-btn"><h6 class="alt-h text-white"><?php _e( 'Clear' ,'Pixelentity Theme/Plugin'); ?></h6></div>
							<div id="form-btn" class="btn white-btn"><h6 class="alt-h text-white"><button type="submit"><?php _e( 'Send' ,'Pixelentity Theme/Plugin'); ?></button></h6></div>
						</div>
					</form>
				</div>
			</div>

		<?php endif; ?>
		
		<?php if ( $t->options->get( 'footerSocialLinks' ) ) : ?>

			<?php $social_links = $t->options->get( 'footerSocialLinks' ); ?>

			<div class="row divider-content">
				<div class="medium-12 columns text-center">
					<div class="social-links offix">

						<?php foreach ( $social_links as $social_link ) : ?>

							<a href="<?php echo esc_attr( $social_link['url'] ); ?>"><h3 class="text-white"><?php echo $social_link['name']; ?></h3></a>

						<?php endforeach; ?>

					</div>
				</div>
			</div>

		<?php endif; ?>
		
		<div class="row divider-content">
			<div class="medium-12 columns text-center">
				<span class="copy-text text-white alt-h"><?php echo $t->options->get("footerCopyright"); ?></span>
			</div>
		</div>
	
	</section>

</div><!-- /#main-container -->

<?php $t->footer->wp_footer(); ?>

</body>
</html>