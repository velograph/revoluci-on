<?php $t =& peTheme(); ?>
<?php list($data,$items,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section class="text-divider <?php echo $data->padding; ?> bg-cover <?php echo $data->typography; ?> section-type-testimonials" id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" <?php echo $style; ?>>

	<?php if ( ! empty( $data->bgimage ) ) : ?>

		<img alt="background" src="<?php echo $data->bgimage; ?>" class="divider-bg" />
		<div class="divider-overlay"></div>

	<?php endif; ?>

	<?php if ( ! empty( $items ) ) : ?>

		<div class="testimonials-slider">
			<ul class="slides text-center">

				<?php foreach( $items as $item ) : ?>

					<li>
						<div class="row divider-content">
							<div class="medium-9 medium-centered columns">

								<?php if ( ! empty( $item->title ) ) : ?>

									<h1>&ldquo;<?php echo $item->title; ?>&rdquo;</h1>

								<?php endif; ?>

								<?php if ( ! empty( $item->content ) ) : ?>

									<p class="lead"><?php echo $item->content; ?></p>

								<?php endif; ?>

								<?php if ( ! empty( $item->image ) ) : ?>

									<img alt="avatar" src="<?php echo $item->image; ?>" />

								<?php endif; ?>

								<?php if ( ! empty( $item->author ) ) : ?>

									<h6 class="alt-h"><?php echo $item->author; ?></h6>

								<?php endif; ?>

							</div>
						</div>
					</li>

				<?php endforeach; ?>
				
			</ul>
		</div>

	<?php endif; ?>

</section>