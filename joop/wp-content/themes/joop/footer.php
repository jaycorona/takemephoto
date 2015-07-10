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

<?php 

$request 	= substr($_SERVER['REQUEST_URI'], 0, 27);
$servername = $_SERVER['SERVER_NAME'];
$url 		= $_SERVER['REQUEST_URI'];
$domain   	= 'http://'.$servername.$url;


if($request == '/checkout-2/order-received/' ){
//echo $request.'<br>';


$cookie_name = "Cookie";
$cookie_value = "reload";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day


		if(!isset($_COOKIE[$cookie_name])) {
		      echo "Cookie named '" . $cookie_name . "' is not set!";
		      echo '<script type="text/javascript">
						 		location.reload();
					</script>';
		} else {
		      echo "CookieName '" . $cookie_name . "' is set!<br>";
		      echo "Value is: " . $_COOKIE[$cookie_name];
		}

		if($_COOKIE[$cookie_name]){
			setcookie("Cookie","", time()-3600, "/");
			unset ($_COOKIE['Cookie']);			
		}
}


?>
<script>
	document.getElementsByClassName("woocommerce-error").style.color = "red";

</script>
</body>
</html>