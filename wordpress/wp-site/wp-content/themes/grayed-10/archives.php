<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="content">

<?php include(TEMPLATEPATH."/r_sidebar.php");?>

<div id="contentmiddle">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h3>What I Blog About</h3>
        <p>
        <?php UTW_ShowWeightedTagSetAlphabetical("coloredsizedtagcloud") ?>
        </p>
        <h3>Browse by Month:</h3>
		<ul>
		<?php wp_get_archives('type=monthly'); ?>
		</ul>
	<h3>Browse by Category:</h3>
		<ul>
		<?php wp_list_cats(); ?>
		</ul>
	<?php the_content(__('Read more'));?><div style="clear:both;"></div>
	
	<!--
	<?php trackback_rdf(); ?>
	-->

	<?php endwhile; else: ?>

	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?><br />
	</div>
	
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>