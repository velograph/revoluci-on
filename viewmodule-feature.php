<?php $t =& peTheme(); ?>
<?php list($data,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section class="content-divider <?php echo $data->padding; ?> bg-cover <?php echo $data->typography; ?> section-type-feature" id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" <?php echo $style; ?>>

	<div class="row">
		<div class="medium-6 columns text-center">
			<div class="pricing-table shrink">

				<?php if ( ! empty( $data->title ) ) : ?>

					<h1><?php echo $data->title; ?></h1>

				<?php endif; ?>

				<div class="line"></div>

				<?php if ( ! empty( $data->features ) ) : ?>

					<ul>

						<?php foreach( $data->features as $feature ) : ?>

							<li><?php echo $feature['feature']; ?></li>

						<?php endforeach; ?>

					</ul>

				<?php endif; ?>

				<?php if ( ! empty( $data->button1_text ) || ! empty( $data->button2_text ) ) : ?>

				<div class="line"></div>
				<div class="medium-12 btn-holder">

					<?php if ( ! empty( $data->button1_text ) && ! empty( $data->button1_link ) ) : ?>

						<a href="<?php echo $data->button1_link; ?>"><div class="btn"><h6 class="alt-h"><?php echo $data->button1_text; ?></h6></div></a>

					<?php endif; ?>

					<?php if ( ! empty( $data->button1_text ) && ! empty( $data->button2_text ) && ! empty( $data->buttons_separator ) ) : ?>

						<span><em><?php echo $data->buttons_separator; ?></em></span>

					<?php endif; ?>

					<?php if ( ! empty( $data->button2_text ) && ! empty( $data->button2_link ) ) : ?>

						<a href="<?php echo $data->button2_link; ?>"><div class="btn"><h6 class="alt-h"><?php echo $data->button2_text; ?></h6></div></a>

					<?php endif; ?>

				</div>

				<?php endif; ?>

			</div>
			
		</div><!--end of pricing table-->
		
		<div class="medium-6 columns text-center">

			<?php if ( ! empty( $data->featured_image ) ) : ?>

				<img alt="<?php _e("Featured Image",'Pixelentity Theme/Plugin'); ?>" src="<?php echo $data->featured_image; ?>" />

			<?php endif; ?>

		</div>
	</div>

</section>