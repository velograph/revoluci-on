<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $meta =& $content->meta(); ?>
<?php get_header(); ?>

<div class="row blog-single">

	<?php if ( wp_attachment_is_image( $post->id ) ) : ?>

	<div class="post-media clearfix">
		<?php $img = wp_get_attachment_image_src( $post->id, "full"); ?>
		<?php $content->img( 1140, 0, $img[0] ); ?>
	</div>

	<?php endif; ?>

</div>

<?php get_footer(); ?>