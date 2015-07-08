<?php $t =& peTheme(); ?>
<?php list($data,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section class="<?php echo $data->padding; ?> bg-cover <?php echo $data->typography; ?> section-type-quote" id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" <?php echo $style; ?>>

	<?php if ( ! empty( $data->quote ) ) : ?>

		<div class="row">
			<div class="medium-12 columns text-center">
				<h1>&ldquo;<?php echo $data->quote; ?>&rdquo;</h1>

				<?php if ( ! empty( $data->author ) ) : ?>

					<p class="lead"><em>&#8213; <?php echo $data->author; ?></em></p>

				<?php endif; ?>

			</div>
		</div>

	<?php endif; ?>

</section>