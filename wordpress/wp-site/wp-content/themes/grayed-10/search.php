<?php get_header(); ?>

<div id="content">

<?php include(TEMPLATEPATH."/r_sidebar.php");?>

<div id="contentmiddle">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="datetime"><?php the_time('M') ?><span><?php the_time('jS') ?></span></div><h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	<p>Posted on <?php the_time(); ?> | Filed Under <?php the_category(', ') ?></p>
	<?php the_excerpt(__('Read more'));?><div style="clear:both;"></div>
	
	<?php
	include("postinfo.php");
	?>
	
	<!--
	<?php trackback_rdf(); ?>
	-->

	<?php endwhile; else: ?>

	<p><?php _e('Sorry, but you are looking for something that isn't here. You can try searching for other topics again.'); ?></p>
        <?php endif; ?>
	<?php posts_nav_link(' &#8212; ', __('&laquo; go back'), __('keep looking &raquo;')); ?><br />
	</div>
	
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>