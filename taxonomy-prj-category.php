<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $t->layout->pageTitle = sprintf(__("Category: %s",'Pixelentity Theme/Plugin'),single_cat_title("",false));; ?>
<?php get_header(); ?>

<div class="row blog-single">

	<div class="large-9 columns blog-left">
		<?php $t->content->loop(); ?>
	</div>
	
	<div class="large-3 columns blog-right">
		<?php get_sidebar(); ?>
	</div>

</div>

<?php get_footer(); ?>