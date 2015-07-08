<?php $t =& peTheme(); ?>
<?php list($data,$items,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>
<?php $separator = ( 'yes' === $data->separator ) ? 'separator' : ''; ?>

<section class="team-members padding-<?php echo $data->padding; ?> <?php echo $separator; ?> <?php if ( 'light' === $data->typography ) echo 'dark'; ?> section-type-teammembers" id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" <?php echo $style; ?>>

	<div class="page-header text-center">

		<?php if ( ! empty( $data->subtitle ) ) : ?>

			<h3><?php echo $data->subtitle; ?></h3>

		<?php endif; ?>

		<?php if ( ! empty( $data->title ) ) : ?>

			<h2><?php echo $data->title; ?></h2>

		<?php endif; ?>

	</div>

	<?php $column = 'col-md-12'; ?>
	<?php if ( ! empty( $items ) && 2 === count( $items ) ) $column = 'col-md-8 col-md-offset-2'; ?>
	<?php if ( ! empty( $items ) && 1 === count( $items ) ) $column = 'col-md-4 col-md-offset-4'; ?>

	<div class="container">
		<div class="row">
			<div class="<?php echo $column; ?>">
				<div class="owl-carousel carousel-items">

					<?php foreach ( $items as $item ): ?>

						<div class="item">

							<?php if ( ! empty( $item->image ) ) : ?>

								<img class="display-pic" src="<?php echo $item->image; ?>" alt="<?php _e( 'Team Member' ,'Pixelentity Theme/Plugin'); ?>">

							<?php endif; ?>

							<?php if ( ! empty( $item->name ) ) : ?>

								<h3><?php echo $item->name; ?></h3>

							<?php endif; ?>

							<?php if ( ! empty( $item->role ) ) : ?>

								<h4><?php echo $item->role; ?></h4>

							<?php endif; ?>

							<?php if ( ! empty( $item->content ) ) : ?>

								<p><?php echo $item->content; ?></p>

							<?php endif; ?>
							
							<?php if ( ! empty( $item->social ) ) : ?>

								<?php foreach ( $item->social as $social_icon ) : ?>

									<?php $social_icon = (object) $social_icon; ?>
							
									<a class="icon" href="<?php echo $social_icon->url; ?>" target="_blank"><i class="<?php echo preg_replace( '/\|.*/', '', $social_icon->icon ); ?>"></i></a>

								<?php endforeach; ?>

							<?php endif; ?>

						</div>

					<?php endforeach; ?>

				</div>
			</div>
		</div>
	</div>

	<?php if ( 'light' === $data->overlay ) : ?>
		
		<div class="overlay-bg light"></div>

	<?php elseif ( 'dark' === $data->overlay ) : ?>

		<div class="overlay-bg black"></div>

	<?php endif; ?>

</section>