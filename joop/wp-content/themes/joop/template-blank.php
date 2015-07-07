<?php
/*
Template Name: Blank Page Template
*/

?>
<link rel="stylesheet" type="text/css" href="<?php echo THEME_URI; ?>/css/blank-page.css" media="screen" />
<?php if (have_posts()) : while (have_posts()) : the_post();?>
<?php the_content(); ?>
<?php endwhile; endif; ?>

<script type="text/javascript">

	jQuery(window).resize(function() {
		ctrMainContent();
	});

	jQuery(document).ready(function () {
		removeHeadFootSide();
		ctrMainContent();
		jQuery('#container').css('display', 'block');

	});
	function removeHeadFootSide() {
		jQuery('#header').remove();
		jQuery('#background-area').remove();
		jQuery('#footer-widget-area').remove();
		jQuery('#breadcrumb').remove();
		jQuery('.theme-sidebar').parent().remove();
		jQuery('#footer-image').remove();
		jQuery('.widget_container').remove();
		jQuery('#footer').remove();
	}

	function ctrMainContent(){
		var windowHeight = jQuery(window).height();
		var maincontentHeight = jQuery('#container').height();
		var margTop = 0;
		if (windowHeight > maincontentHeight){
			margTop = (windowHeight - maincontentHeight)/2;
			jQuery('#container div#wrapper').css('margin-top', margTop + 'px');
		}
	}
</script>
