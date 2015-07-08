<?php $t =& peTheme(); ?>
<?php list($data,$items,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section class="<?php echo $data->padding; ?> bg-cover text-divider <?php echo $data->typography; ?> section-type-process" id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" <?php echo $style; ?>>

	<?php if ( ! empty( $data->bgimage ) ) : ?>

		<img alt="background" src="<?php echo $data->bgimage; ?>" class="divider-bg" />
		<div class="divider-overlay"></div>

	<?php endif; ?>

	<?php if ( ! empty( $data->title ) ) : ?>

		<div class="row divider-content">
			<div class="medium-12 text-center">
				<h1><?php echo $data->title; ?></h1>
			</div>
		</div>

	<?php endif; ?>

	<?php if ( ! empty( $items ) ) : ?>

		<?php $itemscount = count ( $items ); ?>
		<?php $gridclass = 'medium-4'; ?>
		<?php if ( 1 === $itemscount ) $gridclass = 'medium-4 medium-offset-4'; ?>

		<div class="row divider-content">

			<?php foreach( $items as $item ) : ?>

				<div class="<?php echo $gridclass; ?> columns process-phase">

					<?php if ( ! empty( $item->icon ) ) : ?>

						<div class="phase-icon">
							<div class="<?php echo $item->icon; ?>"></div>
						</div>

					<?php endif; ?>
					
					<div class="phase-text">

						<?php if ( ! empty( $item->title ) ) : ?>

							<h5 class="alt-h"><?php echo $item->title; ?></h5>

						<?php endif; ?>

						<?php if ( ! empty( $item->steps ) ) : ?>

						<ul>

							<?php foreach( $item->steps as $step ) : ?>

								<li><?php echo $step['step']; ?></li>

							<?php endforeach; ?>

						</ul>

						<?php endif; ?>

					</div>
				</div><!--end of process phase-->

			<?php endforeach; ?>

		</div>

	<?php endif; ?>

</section>