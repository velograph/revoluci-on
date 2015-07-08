<?php $t =& peTheme(); ?>
<?php $project =& $t->project; ?>
<?php list($data,$bid) = $t->template->data(); ?>
<?php $style = ''; ?>
<?php if ( ! empty( $data->bgcolor ) ) $style .= 'background-color: ' . $data->bgcolor . ';'; ?>
<?php if ( ! empty( $data->bgimage ) ) $style .= 'background-image: url(\'' . $data->bgimage . '\');'; ?>
<?php if ( ! empty( $style ) ) $style = 'style="' . $style . '"'; ?>

<section class="<?php echo $data->padding; ?> bg-cover <?php echo $data->typography; ?> section-type-portfolio" id="section-<?php echo empty($data->name) ? $bid : $data->name; ?>" <?php echo $style; ?>>

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

	<div class="projects-wrapper offix">

		<div class="row">
			<div class="medium-12 columns text-center">
				<ul class="filters">
					<?php $project->filter('',"filter","active"); ?>
				</ul>
			</div>
		</div>

		<?php $content =& $t->content; ?>

		<div class="projects-container" data-container="container<?php echo $bid; ?>">

			<?php while ($content->looping()): ?>

				<?php $meta =& $content->meta(); ?>
				<?php $format = get_post_format(); ?>
				<?php $formatClass = $format ? 'single-' . $format : 'single-image' ; ?>

				<div class="medium-4 <?php $project->filterClasses(); ?> project" data-project-file="<?php echo get_permalink(); ?>">

					<div class="project-image-wrapper">
						<?php $content->img( 800, 600 ); ?>
					</div>
					<div class="project-title text-center">
						<h3><?php $content->title(); ?></h3>
						<p class="lead"><em><?php 

								$terms = get_the_terms( get_the_id(), 'prj-category' );
								$output = '';

								if ( $terms && ! is_wp_error( $terms ) ) :

									foreach ( $terms as $term ) {
										$output .= $term->name . ' / ';
									}

									$output = substr( $output, 0, -3 );

									echo $output;

								endif;

								?></em></p>
					</div>

				</div>

			<?php endwhile; ?>

		</div>

		<div class="ajax-container" data-container="container<?php echo $bid; ?>"></div>

	</div>

	<?php if ($data->pager === "yes"): ?>
		<?php $t->content->pager(); ?>
	<?php endif; ?>

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