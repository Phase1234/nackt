<?php

	// Load jQuery
	if ( !function_exists( 'core_mods' ) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script( 'jquery' );
				wp_register_script( 'jquery', ( "//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ), false);
				wp_enqueue_script( 'jquery' );
			}
		}
		add_action( 'wp_enqueue_scripts', 'core_mods' );
	}

	// Scripts & Styles (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function nackt_scripts_styles() {
		global $wp_styles;

		// Load Comments	
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		// Register Scripts
		//wp_register_script('responsive-nav', get_template_directory_uri() . '/assets/js/offcanvas.js', array(), null, true);
		wp_register_script('retina', get_template_directory_uri() . '/assets/js/retina.js', array(), null, true);
		wp_register_script('fitvids', get_template_directory_uri() . '/assets/js/jquery.fitvids.js', array('jquery'), null, true);
		wp_register_script('responsive-nav', get_template_directory_uri() . '/assets/js/responsive-nav.js', array(), null, true);
	
		// Enqueue Scripts
		//wp_enqueue_script('responsive-nav');
		wp_enqueue_script('retina');
		wp_enqueue_script('fitvids');
		wp_enqueue_script('responsive-nav');

		// Modernizr
		// This is an un-minified, complete version of Modernizr. Before you move to production, you should generate a custom build that only has the detects you need.
		// wp_enqueue_script( nackt-modernizr', get_template_directory_uri() . '/assets/js/modernizr-2.6.2.dev.js' );
		
	}
	add_action( 'wp_enqueue_scripts', 'nackt_scripts_styles' );