<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #wrapper, #container div and all content after
 *
 * @package WordPress
 * @subpackage TDFramework
 * @since framework 1.0
 */
?>

	<?php core_theme_hook_after_content(); ?>

    </div><!-- ends here #wrapper -->
    <?php core_theme_hook_after_wrapper(); ?>

</div><!-- ends here #container -->

<?php core_theme_hook_before_footer(); ?>
<footer id="footer" class="footer theme-row clearfix">

	    <?php
		    /**
			 * core_theme_hook_footer_content hook
			 *
			 * @hooked core_theme_copyright - 10
			 * @hooked core_theme_powered 	- 20
			 */
		    core_theme_hook_footer_content();
	    ?>

</footer><!-- ends here #footer -->
<?php
	/**
	 * core_theme_hook_footer_after hook
	 *
	 * @hooked core_theme_to_top 	- 10
	 */
	 core_theme_hook_footer_after();
?>


<?php core_theme_hook_after_container(); ?>

<?php wp_footer(); ?>

</body>
</html>