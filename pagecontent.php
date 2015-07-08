<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $meta =& $content->meta(); ?>

<section id="<?php $content->slug(); ?>" class="container section-type-page">
	<div class="row">
		<div class="col-sm-12">

			<h2 class="page-title"><?php $content->title(); ?></h2>
			
			<div class="page-body pe-wp-default">
				<?php $content->content(); ?>
			</div>

		</div>
	</div>
</section>