<?php include_once(dirname(__FILE__) . '/functions.php'); ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<style type="text/css" media="screen">
		@import url( '/stylesheet.css');
	</style>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php wp_head(); ?>
</head>
<body>
	<a href="/"><div id="banner"></div></a>
	<div id="nav">
		<ul>
			<li id="today-off" title="Today"><a href="/">Today</a></li>
			<li id="random-off" title="Random"><a href="/random.php">Random</a></li>
			<li id="archive-off" title="Archive"><a href="/?m=2007">Archive</a></li>
			<li id="merch-off" title="Merchandise"><a href="/merch.html">Merchandise</a></li>
			<li id="about-off" title="About"><a href="/about.html">About</a></li>
		</ul>
	</div>
