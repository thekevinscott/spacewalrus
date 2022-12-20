<div class="rightsidebar">

<div id="rightbar">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>

<h2>Recent Discussions</h2>

<?php if (function_exists('get_recent_comments')) { ?>
<ul class="sidemenu">
<?php get_recent_comments(); ?>
</ul>

<?php } ?>   
<br/>


<?php endif; ?>

</div>
</div>
<!-- wrap ends here -->

</div>

