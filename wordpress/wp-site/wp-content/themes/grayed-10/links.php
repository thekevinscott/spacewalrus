<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>

<div id="content">

<?php include(TEMPLATEPATH."/r_sidebar.php");?>

<div id="contentmiddle">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h1><?php the_title(); ?></h1>
	<?php the_content(__('Read more'));?><div style="clear:both;"></div>
	<?php get_links_list(); ?>
	<!--
	<?php trackback_rdf(); ?>
	-->

	<?php endwhile; else: ?>

	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?><br />
	</div>
	
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>