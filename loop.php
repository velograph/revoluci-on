<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php list($settings) = $t->template->data(); ?>
<?php $pager = empty( $settings->pager ) || $settings->pager === 'yes'; ?>
<?php $isSingle = is_single(); ?>
<?php while ($content->looping() ) : ?>

	<?php $meta =& $content->meta(); ?>
	<?php $link = get_permalink(); ?>
	<?php $type = $content->type(); ?>
	<?php $hasFeatImage = $content->hasFeatImage(); ?>
	<?php $classes = is_sticky() ? 'post post-single sticky' : 'post post-single'; ?>

	<div class="image <?php echo $classes; ?>">
		<div class="post-title">
			<h2>
				<?php if ($isSingle): ?>
				<?php $content->title(); ?>
				<?php else: ?>
				<a href="<?php echo $link ?>"><?php $content->title() ?></a>
				<?php endif; ?>
			</h2>
			<div class="post-meta">

				<span class="post-meta-date">

					<?php if ($isSingle): ?>

						<?php the_time( 'F j, Y' ); ?>

					<?php else: ?>

						<a href="<?php echo $link ?>">

							<?php the_time( 'F j, Y' ); ?>

						</a>

					<?php endif; ?>

				</span>

				<span class="post-meta-author"><?php _e("Posted by",'Pixelentity Theme/Plugin'); ?> <?php the_author_posts_link(); ?></span>

				<span class="post-meta-category"><?php _e("in ",'Pixelentity Theme/Plugin'); ?> <?php $content->category(); ?></span>

			</div>
		</div>
		
		<?php if (!post_password_required($post->ID)): ?>
		<div class="post-media">
			<?php switch($content->format()): case "gallery": // Gallery post ?>
			
			<?php $t->media->w(800); ?>
			<?php $t->media->h(0); ?>
			<?php $t->gallery->output($meta->gallery->id,'GalleryImages'); ?>

			<?php break; case "video": // Video post ?>

			<?php $videoID = $t->content->meta()->video->id; ?>
			<?php if ($video = $t->video->getInfo($videoID)): ?>
			<div class="vendor">
				<?php switch($video->type): case "youtube": ?>
				<iframe width="1280" height="720" src="//www.youtube.com/embed/<?php echo $video->id; ?>?autohide=1&modestbranding=1&showinfo=0" class="fullwidth-video" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				<?php break; case "vimeo": ?>
				<iframe src="//player.vimeo.com/video/<?php echo $video->id; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" class="fullwidth-video" width="1280" height="720" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				<?php endswitch; ?>	
			</div>
			<?php endif; ?>
			<?php break; default: // Standard post ?>
			<?php if ($hasFeatImage): ?>
			<?php $content->img(800,0); ?>
			<?php endif; ?>
			<?php endswitch; ?>
		</div>
		<?php endif; ?>

		
		<div class="post-body pe-wp-default">
			<?php $content->content(); ?>
			<?php $content->linkPages(); ?>
		</div>

		<?php if ($type === "post" && has_tag()): ?>
			<div class="tags">
				<?php the_tags('',' ',''); ?>
			</div>
		<?php endif; ?>
		<?php if ($isSingle && is_singular( 'post' )): ?>

			<?php get_template_part("common","prevnext"); ?>

		<?php endif; ?>
	</div>

	<?php if ($isSingle): ?>
	<?php comments_template(); ?>
	<?php endif; ?>

<?php endwhile; ?>

<?php if ($pager && !$isSingle): ?>
	<?php $t->content->pager(); ?>
<?php endif; ?>
