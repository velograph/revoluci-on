<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $meta =& $content->meta(); ?>
<?php $t->layout->pageTitle = __("Not Found",'Pixelentity Theme/Plugin'); ?>
<?php get_header(); ?>

<div class="row blog-single">
	<h2 class="text-center"><?php _e("The page you're looking for doesn't exist.",'Pixelentity Theme/Plugin'); ?></h2>
	<br>
	<br>
</div>

<?php get_footer(); ?>