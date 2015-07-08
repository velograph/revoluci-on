<?php $t =& peTheme(); ?>
<?php list($data,$items,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section class="<?php echo 'pad-large' === $data->padding ? 'pad-normal' : $data->padding; ?> bg-cover <?php echo $data->typography; ?> section-type-logos" id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" <?php echo $style; ?>>

	<?php if ( ! empty( $data->title ) ) : ?>

		<div class="row">
			<div class="medium-12 columns text-center">
				<h2><?php echo $data->title; ?></h2>
			</div>
		</div>

	<?php endif; ?>


	<?php if ( ! empty( $items ) ) : ?>

	<div class="row">

		<?php $itemscount = count ( $items ); ?>
		<?php $gridclass = 'medium-3'; ?>
		<?php if ( 1 === $itemscount ) $gridclass = 'medium-4 medium-offset-4'; ?>
		<?php if ( 3 === $itemscount ) $gridclass = 'medium-4'; ?>

		<?php foreach( $items as $item ) : ?>

			<div class="<?php echo $gridclass; ?> columns text-center client">

				<?php if ( ! empty( $item->link ) ) : ?>

					<a href="<?php echo $item->link; ?>" target="_blank">

				<?php endif; ?>

				<?php if ( ! empty( $item->logo ) ) : ?>

					<img alt="<?php _e( 'Client Logo' ,'Pixelentity Theme/Plugin'); ?>" src="<?php echo $item->logo; ?>" />

				<?php endif; ?>

				<?php if ( ! empty( $item->link ) ) : ?>

					</a>

				<?php endif; ?>

			</div>
		
		<?php endforeach; ?>

	</div>

	<?php endif; ?>

</section>