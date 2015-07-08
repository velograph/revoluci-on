<?php $t =& peTheme(); ?>
<?php list($data,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section class="<?php echo $data->padding; ?> bg-cover <?php echo $data->typography; ?> section-type-stats" id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" <?php echo $style; ?>>

	<?php if ( ! empty( $data->stats ) ) : ?>

		<?php $itemscount = count ( $data->stats ); ?>
		<?php $gridclass = 'medium-3'; ?>
		<?php if ( 1 === $itemscount ) $gridclass = 'medium-4 medium-offset-4'; ?>
		<?php if ( 2 === $itemscount ) $gridclass = 'medium-3 no-border'; ?>
		<?php if ( 3 === $itemscount ) $gridclass = 'medium-4'; ?>
		<?php if ( 4 < $itemscount ) $gridclass = 'medium-3 has-many'; ?>

		<div class="row">

			<?php foreach( $data->stats as $stat ) : ?>

				<div class="<?php echo $gridclass; ?> columns stat text-center">

					<?php if ( ! empty( $stat['icon'] ) ) : ?>

						<div class="<?php echo $stat['icon']; ?>"></div>

					<?php endif; ?>

					<?php if ( ! empty( $stat['title'] ) ) : ?>

						<h1><?php echo $stat['title']; ?></h1>

					<?php endif; ?>

					<?php if ( ! empty( $stat['detail'] ) ) : ?>
						
						<span><?php echo $stat['detail']; ?></span>

					<?php endif; ?>

				</div>

			<?php endforeach; ?>

		</div>

	<?php endif; ?>

</section>