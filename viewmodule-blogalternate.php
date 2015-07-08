<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php list($data,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section class="<?php echo $data->padding; ?> bg-cover <?php echo $data->typography; ?> section-type-blog-alternate" id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" <?php echo $style; ?>>

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

	<div class="blog-preview-holder offix">

		<?php while ( $content->looping() ) : ?>

			<?php $hasFeatImage = $content->hasFeatImage(); ?>

			<a class="post-link" href="<?php echo get_permalink(); ?>">
				<div class="post-preview pad-large offix <?php echo $data->columns; ?> left text-center">

					<div class="post-overlay"></div>

					<?php if ( $hasFeatImage ) : ?>

						<img alt="<?php _e( 'Featured image' ,'Pixelentity Theme/Plugin'); ?>" class="post-preview-bg" src="<?php echo $t->image->resizedImgUrl( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ), 1280, 0 ); ?>" />

					<?php endif; ?>

					<div class="post-preview-content">
						<span class="date"><em><?php the_time( 'jS M' ); ?></em></span>
						<h2><?php $content->title(); ?></h2>
						<h6 class="alt-h"><?php _e("Posted by",'Pixelentity Theme/Plugin'); ?>  <?php the_author(); ?> </h6>
						<div class="line"></div>
					</div>

				</div>
			</a>

		<?php endwhile; ?>

	</div>

	<div class="row">
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