<footer id="footer" class="source-org vcard copyright site-footer">
	<div class="container">
		<div class="row">
			<?php if ( is_active_sidebar( 'footer-one' ) ) : ?><?php dynamic_sidebar( 'footer-one' ); ?><?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-two' ) ) : ?><?php dynamic_sidebar( 'footer-two' ); ?><?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-three' ) ) : ?><?php dynamic_sidebar( 'footer-three' ); ?><?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-four' ) ) : ?> <?php dynamic_sidebar( 'footer-four' ); ?> <?php endif; ?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>


<!-- here comes the javascript -->

<!-- jQuery is called via the WordPress-friendly way via functions.php -->

<!-- this is where we put our custom functions -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/functions.js"></script>
<script>
  var nav = responsiveNav(".nav-collapse", { // Selector
	  animate: true, // Boolean: Use CSS3 transitions, true or false
	  transition: 400, // Integer: Speed of the transition, in milliseconds
	  label: "", // String: Label for the navigation toggle
	  insert: "before", // String: Insert the toggle before or after the navigation
	  customToggle: "", // Selector: Specify the ID of a custom toggle
	  openPos: "relative", // String: Position of the opened nav, relative or static
	  jsClass: "js", // String: 'JS enabled' class which is added to <html> el
	  init: function(){}, // Function: Init callback
	  open: function(){}, // Function: Open callback
	  close: function(){} // Function: Close callback
	});
</script>

<!-- Asynchronous google analytics; this is the official snippet.
	 Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.
	 
<script>

	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-XXXXXX-XX']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();

</script>
-->