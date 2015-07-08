<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php get_header(); ?>

<section class="row section-type-video blog-single">

	<div class="large-12 columns">

		<h2 class="video-title"><?php $content->title(); ?></h2>

		<?php if ( ! post_password_required( $post->ID ) ) : ?>

			<div class="post-media clearfix">
				<?php $t->video->output(get_the_id()); ?>
			</div>

		<?php else : ?>

			<?php echo get_the_password_form(); ?>

		<?php endif; ?>

	</div>

</section>

<?php get_footer(); ?>
