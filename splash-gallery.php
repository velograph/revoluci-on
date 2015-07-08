<?php $t =& peTheme();?>
<?php $content =& $t->content; ?>
<?php $meta = $t->content->meta(); ?>

<?php if ( ! empty( $meta->splash->gallery ) ) : ?>

	<?php if ( $loop = $t->gallery->getSliderLoop( $meta->splash->gallery, 'ititle','caption' ) ) : ?>

		<section id="<?php $content->slug(); ?>-intro">

			<div id="home-slider" <?php if ( 'fixed' === $meta->splash->type ) echo 'class="fixed-intro"'; ?>>

				<ul class="slides <?php if ( 'simple' === $meta->splash->headlines_type ) echo 'simple-headlines'; ?>">

					<?php while ($slide =& $loop->next()): ?>

						<li class="has-parallax cover-bg">
							<div class="row slide-content text-center">
								<div class="medium-12 medium-centered columns">

									<?php if ( 'simple' === $meta->splash->headlines_type ) : ?>

										<?php if ( ! empty( $slide->caption_title ) || ! empty( $slide->caption_description ) ) : ?>

										<div class="home-title offix">

											<?php if ( ! empty( $slide->caption_title ) ) : ?>
												
												<h3 class="headline"><?php echo mb_substr( $slide->caption_title, 0, -1 ); ?><span class="last-letter"><?php echo mb_substr( $slide->caption_title, -1 ); ?></span></h3>

											<?php endif; ?>

											<?php if ( ! empty( $slide->caption_description ) ) : ?>
											
											<div class="splash-logo">
												<img src="http://www.revolucionrides.com/wp-content/uploads/2014/05/logo.png" alt="revolucion logo" />
											</div>
											
										

											<div class="title-lower">
												<p class="text-white"><?php echo $slide->caption_description; ?></p>
											</div>
											<div class="splash-chain">
												<img src="http://www.revolucionrides.com/wp-content/uploads/2014/05/chain.png" alt="revolucion chain icon" />
											</div>

											<?php endif; ?>

										</div>

										<?php endif; ?>

									<?php else : ?>

										<?php if ( ! empty( $slide->undefined ) ) : ?>

											<img class="headline-logo" alt="logo" src="<?php echo $slide->undefined; ?>" />

										<?php endif; ?>

										<?php if ( ! empty( $slide->caption_title ) || ! empty( $slide->caption_description ) ) : ?>

											<div class="home-title offix">
													<div class="medium-5 title-top left"></div>
													<div class="medium-2 left">&nbsp;</div>
													<div class="medium-5 title-top left"></div>
												<div class="title-upper offix">

													<?php if ( ! empty( $slide->subtitle_left ) ) : ?>

														<h6 class="left alt-h text-white"><?php echo $slide->subtitle_left; ?></h6>

													<?php endif; ?>

													<?php if ( ! empty( $slide->subtitle_right ) ) : ?>

														<h6 class="right alt-h text-white"><?php echo $slide->subtitle_right; ?></h6>

													<?php endif; ?>

												</div>

												<?php if ( ! empty( $slide->caption_title ) ) : ?>

													<?php $headlines = explode( ' ', $slide->caption_title ); ?>

													<h1 class="headline"><?php foreach ( $headlines as $headline ) { echo mb_substr( $headline, 0, -1 ); ?><span class="last-letter"><?php echo mb_substr( $headline, -1 ); ?></span> <?php } ?></h1>

												<?php endif; ?>
												<div class="title-lower">

													<?php if ( ! empty( $slide->caption_description ) ) : ?>

														<p class="text-white"><em><?php echo $slide->caption_description; ?></em></p>

													<?php endif; ?>

												</div>
											</div>

										<?php endif; ?>

									<?php endif; ?>

								</div>
							</div>
							<div class="slide-overlay"></div>
							<img alt="Slider Background" class="slider-bg" src="<?php echo $slide->img; ?>" />
						</li>

					<?php endwhile; ?>

				</ul>

			</div>

		</section>

	<?php else : ?>

		<h3><?php _e( 'The gallery you have selected is empty, please select the gallery that has at least one image in it.' ,'Pixelentity Theme/Plugin'); ?></h3>

	<?php endif; ?>

<?php endif; ?>