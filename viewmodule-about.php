<?php $t =& peTheme(); ?>
<?php list($data,$items,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section class="<?php echo $data->padding; ?> bg-cover <?php echo $data->typography; ?> section-type-about" id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" <?php echo $style; ?>>

	<div class="row">
		<div class="medium-12 columns text-center">
			<div class="page-title">

				<?php if ( ! empty( $data->title ) ) : ?>

					<h6 class="alt-h"><?php echo $data->title; ?></h6>

				<?php endif; ?>

				<?php if ( ! empty( $data->icon ) ) : ?>

					<div class="medium-4 line"><div class="<?php echo $data->icon; ?>"></div></div>

				<?php endif; ?>

				<?php if ( ! empty( $data->subtitle ) ) : ?>
					
					<h1><?php echo $data->subtitle; ?></h1>

				<?php endif; ?>

			</div>
		</div>
	</div>
	
	<?php if ( ! empty( $data->content ) ) : ?>

		<div class="row">
			<div class="medium-12 columns text-center">
				<?php echo str_replace( '<p>', '<p class="lead">', $data->content ); ?>
			</div>
		</div>

	<?php endif; ?>

	<?php if ( ! empty( $items ) ) : ?>

	<div class="row">

		<?php $itemscount = count ( $items ); ?>
		<?php $gridclass = 'medium-4'; ?>
		<?php if ( 1 === $itemscount ) $gridclass = 'medium-4 medium-offset-4'; ?>

		<?php foreach( $items as $item ) : ?>

			<div class="<?php echo $gridclass; ?> columns text-center">
				<div class="team-member">

					<?php if ( ! empty( $item->image ) ) : ?>

						<img alt="Team Member" src="<?php echo $item->image; ?>" />

					<?php endif; ?>

					<div class="member-details">

						<?php if ( ! empty( $item->name ) ) : ?>

							<h6 class="text-white alt-h"><?php echo $item->name; ?></h6>

						<?php endif; ?>

						<?php if ( ! empty( $item->role ) ) : ?>

							<p class="text-white"><em><?php echo $item->role; ?></em></p>

						<?php endif; ?>

						<?php if ( ! empty( $item->social ) ) : ?>

							<?php foreach( $item->social as $social_icon ) : ?>

								<?php $social_icon = (object) $social_icon; ?>

								<a href="<?php echo $social_icon->url; ?>" target="_blank">
									<div class="icon <?php echo preg_replace( '/\|.*/', '', $social_icon->icon ); ?> text-white"></div>
								</a>

							<?php endforeach; ?>

						<?php endif; ?>

					</div>
				</div>
			</div>
		
		<?php endforeach; ?>

	</div>

	<?php endif; ?>

</section>