<?php $t =& peTheme(); ?>
<?php list($data,$items,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section class="<?php echo $data->padding; ?> bg-cover <?php echo $data->typography; ?> section-type-services" id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" <?php echo $style; ?>>

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

			<div class="<?php echo $gridclass; ?> columns offix">

				<div class="service">
					<div class="service-text">

						<?php if ( ! empty( $item->icon ) ) : ?>

						<div class="service-icon">
							<div class="<?php echo $item->icon; ?>"></div>
						</div>

						<?php endif; ?>

						<?php if ( ! empty( $item->title ) ) : ?>

							<h1 class="service-title"><?php echo $item->title; ?></h1>

						<?php endif; ?>

						<?php if ( ! empty( $item->subtitle ) ) : ?>

							<h6 class="service-subtitle alt-h"><?php echo $item->subtitle; ?></h6>

						<?php endif; ?>

						<div class="line"></div>

						<?php if ( ! empty( $item->content ) ) : ?>

							<p><?php echo $item->content; ?></p>

						<?php endif; ?>

					</div>
					<div class="line"></div>

					<?php if ( ! empty( $item->button_text ) && ! empty( $item->button_link ) ) : ?>

						<a href="<?php echo $item->button_link; ?>"><div class="btn"><h6 class="alt-h"><?php echo $item->button_text; ?></h6></div></a>

					<?php endif; ?>
					
				</div>

			</div>
		
		<?php endforeach; ?>

	</div>

	<?php endif; ?>

</section>