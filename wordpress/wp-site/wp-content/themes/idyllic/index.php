<?php 
get_header();
?>

<?php get_sidebar(); ?>



<div id="content">


<!-- loop -->

<?php if (have_posts()) :?>
<?php $postCount=0; ?>
<?php while (have_posts()) : the_post();?>
<?php $postCount++;?>


<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>

<h5><?php the_author() ?> on <?php the_time('F jS, Y') ?> | Filed under <?php the_category(', ') ?></h5>

<?php the_content ('Read the rest of this entry &raquo;'); ?>

<h5><?php comments_popup_link('Comment now &#187;', '1 Comment &#187;', '% Comments &#187;', 'commentslink'); ?></h5>

<br/>

<div class="commentsblock">
<?php comments_template(); ?>
</div>
	
<?php endwhile; ?>
		
<?php else : ?>
				
<h1>
Not Found
</h1>

<strong>Sorry, but you are looking for something that isn't here."></strong>

<?php endif; ?>

<!-- end loop -->


<?php get_footer(); ?>