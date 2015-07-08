<?php $t =& peTheme(); ?>
<?php list($data,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>
<?php $separator = ( 'yes' === $data->separator ) ? 'separator' : ''; ?>

<section class="cta text-center padding-<?php echo $data->padding; ?> <?php echo $separator; ?> <?php if ( 'light' === $data->typography ) echo 'dark'; ?> section-type-calltoaction" id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" <?php echo $style; ?>>

	<div class="container">

		<div class="row">
			<div class="col-lg-12">

				<?php if ( ! empty( $data->title ) ) : ?>

					<h2><?php echo $data->title; ?></h2>

				<?php endif; ?>

				<?php if ( ! empty( $data->content ) ) : ?>

					<div class="cta-content">

						<?php echo $data->content; ?>

					</div>

				<?php endif; ?>

			</div>
		</div>

	</div>

	<?php if ( 'light' === $data->overlay ) : ?>
		
		<div class="overlay-bg light"></div>

	<?php elseif ( 'dark' === $data->overlay ) : ?>

		<div class="overlay-bg black"></div>

	<?php endif; ?>

</section>