<?php $t =& peTheme(); ?>
<?php list($data,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<?php if ( $t->options->get( 'blogHeaderBg' ) ) : ?>

	<div class="post-hero text-divider pad-large">
		<div class="divider-overlay"></div>
		<img alt="<?php _e( 'Header background' ,'Pixelentity Theme/Plugin'); ?>" class="divider-bg" src="<?php echo $t->options->get( 'blogHeaderBg' ); ?>" />
		
		<?php if ( $t->options->get( 'blogHeaderTitle' ) ) : ?>

			<div class="row divider-content">
				<div class="medium-12 columns text-center">
					<h1 class="text-white"><?php echo $t->options->get( 'blogHeaderTitle' ); ?></h1>

					<?php if ( $t->options->get( 'blogHeaderSubtitle' ) ) : ?>

						<p class="lead text-white"><em><?php echo $t->options->get( 'blogHeaderSubtitle' ); ?></em></p>

					<?php endif; ?>

				</div>
			</div>

		<?php endif; ?>
	
	</div>

<?php endif; ?>

<section class="<?php echo $data->padding; ?> bg-cover <?php echo $data->typography; ?> section-type-blog" id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" <?php echo $style; ?>>

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

	<div class="row blog-single">

		<div class="large-9 columns blog-left">
			<?php $t->template->data($data); ?>
			<?php $t->get_template_part("loop"); ?>
		</div>
		<div class="large-3 columns blog-right">
			<?php get_sidebar(); ?>
		</div>

	</div>

</section>