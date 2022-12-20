<?php get_header(); ?>

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

		<?php } elseif (is_author()) { ?>
		<h2><?php _e('Author Archive'); ?></h2>

		<?php } elseif (is_search()) { ?>
		<h2><?php _e('Search Results'); ?></h2>

		<?php } ?>
				
		<?php while (have_posts()) : the_post(); ?>
		<div id="container">
			<div class="post" id="post-<?php the_ID(); ?>">			
				<div class="postentry">
					<?php if (is_search()) { ?>
						<?php the_excerpt() ?>
					<?php } else { ?>
						<?php if($_SERVER['QUERY_STRING'] == "")  { ?>
							<?php //the_content(__('Read the rest of this entry &raquo;')); ?>
							<?php include('mashup_excerpt.php'); ?>	
						<?php  } else { ?>
							<?php the_content(__('Read the rest of this entry &raquo;')); ?>
						<?php } ?>
					<?php 	} ?>
			</div>
		</div>
		<?php endwhile; ?>
		<?php
		
		// what a bloody asshole
		
		?>
		<p><?php posts_nav_link('', __(''), __('<div id="prevarrow"></div>')); ?>
		<?php posts_nav_link(' &#183; ', __(''), __('')); ?>
		<?php posts_nav_link('', __('<div id="nextarrow"></div>'), __('')); ?></p>
		<br/>
		
	<?php else : ?>

		<h2><?php _e('Not Found'); ?></h2>

		<p><?php _e('Sorry, but no posts matched your criteria.'); ?></p>
		
		<h3><?php _e('Search'); ?></h3>
		
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>


<?php get_footer(); ?>
