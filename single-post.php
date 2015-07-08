<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $meta =& $content->meta(); ?>
<?php get_header(); ?>

<?php if ( $t->options->get( 'blogHeaderBg' ) ) : ?>

	<div class="post-hero text-divider has-parallax pad-large">
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

<div class="row blog-single">

	<div class="large-9 columns blog-left">
		<?php $t->content->loop(); ?>
	</div>
	<div class="large-3 columns blog-right">
		<?php get_sidebar(); ?>
	</div>

</div>

<?php get_footer(); ?>