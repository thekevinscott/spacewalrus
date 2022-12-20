<?php get_header(); ?>

<div id="content">

<?php include(TEMPLATEPATH."/r_sidebar.php");?>

<div id="contentmiddle">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	  <div class="datetime"><?php the_time('M') ?><span><?php the_time('jS') ?></span></div><h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	<p>Posted at <?php the_time(); ?> | Filed Under <?php the_category(', ') ?>&nbsp;<?php edit_post_link('(Edit Post)', '', ''); ?></p>
	<?php the_content(__('Read more'));?><div style="clear:both;"></div>

	<?php
	include("postinfo.php");
	?>
		
	<?php trackback_rdf(); ?>
	
	<?php endwhile; else: ?>

	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
	<?php posts_nav_link(' &#8212; ', __('&laquo; go back'), __('keep looking &raquo;')); ?><br />

	<h1>Comments</h1>
	<?php comments_template(); // Get wp-comments.php template ?>

	</div>
	
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>