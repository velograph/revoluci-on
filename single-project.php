<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $meta =& $content->meta(); ?>
<?php get_header(); ?>

<?php while ($content->looping() ) : ?>

	<div class="project-body">
		<div class="close-project">
				<div class="medium-12 columns text-center">
					<div class="icon icon_close_alt2"></div>
				</div>
			</div>
		
		<div class="row">
			<div class="medium-12 columns text-center">
				<div class="page-title">
					<h1><?php $content->title(); ?></h1>
					<h6 class="alt-h"><?php 

								$terms = get_the_terms( get_the_id(), 'prj-category' );
								$output = '';

								if ( $terms && ! is_wp_error( $terms ) ) :

									foreach ( $terms as $term ) {
										$output .= $term->name . ' / ';
									}

									$output = substr( $output, 0, -3 );

									echo $output;

								endif;

								?></h6>
				</div>
			</div>
		</div>

		<div class="row project-single">
			<div class="medium-8 columns">

				<?php $format = get_post_format(); ?>

				<?php switch( $format ) :

					case( false ) : ?>

						<div class="project-image">

							<?php $content->img( 800,0 ); ?>

						</div>

					<?php break; ?>

					<?php case( 'gallery' ) : ?>

						<?php $loop = $t->gallery->getSliderLoop( $meta->gallery->id ); ?>

						<?php if ( $loop ): ?>

							<div class="the-slider flexslider">
								<ul class="slides">

									<?php while ( $item = $loop->next() ): ?>

										<li><?php echo $t->image->resizedImg( $item->img, 800, 0 ); ?></li>

									<?php endwhile; ?>

								</ul>
							</div>

						<?php endif; ?>

					<?php break; ?>

					<?php case( 'video' ) : ?>

						<div class="project-video">

							<?php $videoID = $meta->video->id; ?>

							<?php if ( $video = $t->video->getInfo( $videoID ) ): ?>

								<div class="vendor">

									<?php switch( $video->type ): case "youtube": ?>

										<iframe width="800" height="450" src="http://www.youtube.com/embed/<?php echo $video->id; ?>?autohide=1&modestbranding=1&showinfo=0" class="fullwidth-video" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
									
									<?php break; case "vimeo": ?>

										<iframe src="http://player.vimeo.com/video/<?php echo $video->id; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" class="fullwidth-video" width="800" height="450" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
									
									<?php endswitch; ?>

								</div>

							<?php endif; ?>

						</div>

					<?php break; ?>

				<?php endswitch; ?>
			</div>
			
			<div class="medium-4 columns project-text">
				<div class="project-single-content">
					<?php $content->content(); ?>
				</div>
			</div>
		</div>
	</div>

<?php endwhile; ?>

<?php get_footer(); ?>