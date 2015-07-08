<?php $t =& peTheme();?>
<?php $content =& $t->content; ?>
<?php $meta = $t->content->meta(); ?>

<?php $template = is_page() ? $t->content->pageTemplate() : false; ?>

<div id="nav-holder">
	<div id="thenavigation" <?php if ( ! is_page() && ! ( is_singular( 'post' ) && $t->options->get( 'blogHeaderBg' ) ) ) echo 'class="background-grey"' ?>>
		<div class="row">
	
			<div class="medium-5 columns text-center">
				<?php $t->menu->show("main"); ?>
			</div>

			<?php $logo = $t->options->get("logo"); ?>

			<div class="medium-2 columns text-center">
				<a class="smooth-scroll logo-holder" href="<?php echo home_url( '/' ); ?>">
					<?php if ( ! empty( $logo ) ) : ?>

						<?php $t->image->retina($logo); ?>

					<?php else : ?>

						<h2 class="text-logo"><?php echo $t->options->get("siteTitle"); ?></h2>

					<?php endif; ?>
				</a>
			</div>
		
			<div class="medium-5 columns text-center">
				<ul class="menu">
				</ul>
			</div>
		
			<div class="mobile-toggle"><i class="icon icon_menu-square_alt2"></i></div>
		</div>
	</div>
</div>