<?php get_header(); ?>

<?php
query_posts('showposts=20000');
?>

	<?php if (have_posts()) : ?>
	
		<?php $post = $posts[0]; // Thanks Kubrick for this code ?>
		
		<?php if (is_category()) { ?>				
		<h2><?php _e('Archive for'); ?> <?php echo single_cat_title(); ?></h2>
		
 	  	<?php } elseif (is_day()) { ?>
		<h2><?php _e('Archive for'); ?> <?php the_time('F j, Y'); ?></h2>
		
	 	<?php } elseif (is_month()) { ?>
		<h2><?php _e('Archive for'); ?> <?php the_time('F, Y'); ?></h2>

		<?php } elseif (is_year()) { ?>
		<h2><?php _e('Archive for'); ?> <?php the_time('Y'); ?></h2>

		<?php } ?>
		
		
		<div id="archiveContainer">
		<?php /*
		
		check it out: 
		
		the below bit of code (the $permalink part) will snag the permalink and then point it back to the index page
		This has two benefits. One, it fixes the next/previous problem on a single page by having the archives point to the correct place
		Two, almost more important, it will make stat reading much easier; now, instead of a reader having two possible 'paths' to read,
		they will only have one, via index.
		
		Single.php should redirect to index.php always
		
		*/
		?>

		<?php while (have_posts()) : the_post(); ?>
		
			<div class="archivePost">
					<div class="archiveDate"><?php the_date(); ?>:</div>  

					<?php 
						$permalink = str_replace("?p=", "?p=", get_permalink());	
					?>
					<?php	
					
					?>
				
					<div class="archiveTitle">
						<a href="<?php echo $permalink ?>" rel="bookmark" title="link">
							<?php the_title(); ?>
						</a>
					</div>
				
					

					
<!--					<div class="archiveTitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></div>-->


			
			</div>
				
		<?php endwhile; ?>
		</div>

		
	<?php else : ?>

		<h2><?php _e('Not Found'); ?></h2>

		<p><?php _e('Sorry, but no posts matched your criteria.'); ?></p>
		
		<h3><?php _e('Search'); ?></h3>
		
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>


<?php get_footer(); ?>
