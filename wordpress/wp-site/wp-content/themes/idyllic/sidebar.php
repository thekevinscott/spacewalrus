<div id="rightcol">

<!-- menu here 
============================================================ -->

<h2><li><a href="<?php echo get_settings('home'); ?>/">Home</a></li>
<?php wp_list_pages('sort_column=menu_order&depth=1&title_li='); ?>
</h2>
<br/>
<!-- sidebar -->

<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar() ) : else : ?>

<?php global $notfound; ?>
 <?php /* Creates a menu for pages beneath the level of the current page */
  if (is_page() and ($notfound != '1')) {
   $current_page = $post->ID;
   while($current_page) {
    $page_query = $wpdb->get_row("SELECT ID, post_title, post_status, post_parent FROM $wpdb->posts WHERE ID = '$current_page'");
    $current_page = $page_query->post_parent;
   }
   $parent_id = $page_query->ID;
   $parent_title = $page_query->post_title;
 

if ($wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = '$parent_id' AND post_status != 'attachment'")) { ?>


<div class="sb-pagemenu">

<h2><?php echo $parent_title; ?> <?php _e('Subpages:'); ?></h2>
				
     <ul><?php wp_list_pages('sort_column=menu_order&title_li=&child_of='. $parent_id); ?></ul>
   
    <?php if ($parent_id != $post->ID) { ?>
     <a href="<?php echo get_permalink($parent_id); ?>"><?php printf(__('Back to %s'), $parent_title ) ?></a>
    <?php } ?>
   </div>
 <?php } } ?>
 
 <?php if (is_attachment()) { ?>
  <div class="sb-pagemenu">
   <a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php printf(__('Back to \'%s\''), get_the_title($post->post_parent) ) ?></a>
  </div>
<br/><br/>
 <?php } ?>


 
<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="s" id="s" size="13" />	<input type="submit" value="<?php _e('Search'); ?>" /></form>
<br/>

<h2><?php _e('Categories:'); ?></h2>
	<ul>
	<?php wp_list_cats(); ?>
	</ul>
 
<br/>

 
<h2><?php _e('Archives:'); ?> </h2>

 	<ul>
	 <?php wp_get_archives('type=monthly'); ?>
 	</ul>

<br/>



<h2><?php _e('Meta:'); ?> </h2>

 	<ul>
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?></li>
		<li><a href="feed:<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
		<li><a href="feed:<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
		<li><a href="http://validator.w3.org/check/referer" title="<?php _e('This page validates as XHTML 1.0 Transitional'); ?>"><?php _e('Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr>'); ?></a></li>
		<li><a href="http://www.mandarinmusing.com" title="SEO Services and Google Adsense">SEO</a></li>
		<li><a href="http://www.headsetoptions.org" title="WP Themes and Web Design">HSO</a></li>
		<li><a href="http://wordpress.org/" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.'); ?>"><abbr title="WordPress">WP</abbr></a></li>
		<?php wp_meta(); ?>
	</ul>

<br/>
  



<h2>Flickr:</h2>
<div id="flickr">
<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=3&amp;display=random&amp;size=s&amp;layout=x&amp;source=all_tag&amp;tag=art"></script>
</div>	
<br/>

<?php endif; ?>


<!-- end sidebar -->
</div><!-- end right column -->