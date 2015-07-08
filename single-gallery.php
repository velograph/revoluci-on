<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $meta =& $content->meta(); ?>
<?php get_header(); ?>

<section class="row section-type-video blog-single">

	<div class="large-12 columns">

		<h2 class="gallery-title"><?php $content->title(); ?></h2>

		<?php if ( ! post_password_required( $post->ID ) ) : ?>

			<?php if ($loop = $t->gallery->getSliderLoop(get_the_id())): ?>
			
				<div class="the-slider flexslider">
					<ul class="slides">

						<?php while ($item =& $loop->next()): ?>

							<li><?php echo $t->image->resizedImg( $item->img, 1280, 0 ); ?></li>

						<?php endwhile; ?>

					</ul>
				</div>

			<?php endif; ?>

		<?php else : ?>

			<?php echo get_the_password_form(); ?>

		<?php endif; ?>

	</div>

</section>

<?php get_footer(); ?>