<?php $t =& peTheme(); ?>
<?php list($data,$items,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section class="text-divider <?php echo $data->padding; ?> bg-cover <?php echo $data->typography; ?> section-type-pricing" id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" <?php echo $style; ?>>

	<?php if ( ! empty( $data->bgimage ) ) : ?>

		<img alt="background" src="<?php echo $data->bgimage; ?>" class="divider-bg" />
		<div class="divider-overlay"></div>

	<?php endif; ?>

	<?php if ( ! empty( $items ) ) : ?>

		<div class="row divider-content">

			<?php $itemscount = count ( $items ); ?>
			<?php $gridclass = 'medium-4'; ?>
			<?php if ( 1 === $itemscount ) $gridclass = 'medium-4 medium-offset-4'; ?>
			<?php if ( 2 === $itemscount ) $gridclass = 'medium-4'; ?>
			<?php if ( 4 === $itemscount ) $gridclass = 'medium-3'; ?>
			<?php if ( 4 < $itemscount ) $gridclass = 'medium-4 has-many'; ?>

			<?php foreach( $items as $item ) : ?>

				<div class="<?php echo $gridclass; ?> columns text-center">

					<div class="pricing-table <?php if ( ! empty( $item->featured ) && 'no' === $item->featured ) echo 'shrink'; ?>">
						
						<?php if ( ! empty( $item->plan ) ) : ?>

							<h1><?php echo $item->plan; ?></h1>

						<?php endif; ?>

						<?php if ( ! empty( $item->features ) ) : ?>

							<div class="line"></div>
							<ul>

								<?php foreach ( $item->features as $feature ) : ?>

									<li><?php echo $feature['text']; ?></li>

								<?php endforeach; ?>

							</ul>

						<?php endif; ?>

						<div class="line"></div>
						<div class="price">

							<?php if ( ! empty( $item->superscript ) ) : ?>

							<span class="dollar"><?php echo $item->superscript; ?></span>

							<?php endif; ?>

							<?php if ( ! empty( $item->price ) ) : ?>

							<span class="amount"><?php echo $item->price; ?></span>

							<?php endif; ?>

							<?php if ( ! empty( $item->subscript ) ) : ?>

							<span class="terms"><?php echo $item->subscript; ?></span>

							<?php endif; ?>

						</div>

						<?php if ( ! empty( $item->button_text ) && ! empty( $item->button_link ) ) : ?>

							<a href="<?php echo $item->button_link; ?>"><div class="btn"><h6 class="alt-h"><?php echo $item->button_text; ?></h6></div></a>

						<?php endif; ?>

					</div>

				</div>
			
			<?php endforeach; ?>

		</div>

	<?php endif; ?>

	<div class="row divider-content space-top-large">
		<div class="medium-12 columns text-center">

			<?php if ( ! empty( $data->calltoaction ) ) : ?>
			
				<h1><?php echo $data->calltoaction; ?></h1>

			<?php endif; ?>

			<?php if ( ! empty( $data->button_text ) && ! empty( $data->button_url ) ) : ?>

				<a href="<?php echo $data->button_url; ?>"><div class="btn space-top"><h6 class="alt-h"><?php echo $data->button_text; ?></h6></div></a>

			<?php endif; ?>

		</div>
	</div>

</section>