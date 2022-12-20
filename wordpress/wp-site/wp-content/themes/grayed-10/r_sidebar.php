<!-- begin r_sidebar -->

	<div id="r_sidebar">
	<ul id="r_sidebarwidgeted">
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
	
	<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
	<div><input type="text" name="s" id="s" />
	<input type="submit" id="searchsubmit" value="Search" /></div></form><br />

        <li>
	<h2>Subscribe</h2>
		<ul>
		<li><a href="feed:<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
            	<li><a href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></li>
		</ul>
	</li>
	
	<li>
	<h2>Recently Written</h2>
		<ul>
		<?php get_archives('postbypost', 10); ?>
		</ul>
	</li>
	
	<li>
 	<h2>Recent Comments</h2>
		<?php if (function_exists('get_recent_comments')) { ?>
                <ul>
                <?php get_recent_comments(); ?>
                </ul>
                <?php } ?> 
	</li>
	

        <li>
        <h2>Monthly Archives</h2>
                <ul>
                <?php wp_get_archives('type=monthly'); ?>
                </ul>
        </li>
 
        <li>
	<h2>Categories</h2>
		<ul>
		<?php wp_list_cats('sort_column=name&hide_empty=0'); ?> 
		</ul>
	</li>

        <li>
        <h2>Links</h2>
                <ul>
                <?php get_links('-1', '<li>', '</li>', '', 0, 'name', 0, 0, -1, 0); ?>
                </ul>
        </li>
		
		<?php endif; ?>
		</ul>
			
</div>

<!-- end r_sidebar -->