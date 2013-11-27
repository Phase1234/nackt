<?php

	// Theme Setup (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function nackt_setup() {
		load_theme_textdomain( 'nackt', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );	
		add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) );
		add_theme_support( 'post-thumbnails' );
		// Custom Menu
		register_nav_menus( 
			array(
				'primary'   => __( 'Navigation Menu', 'nackt' ),
				'secondary' => __( 'Secondary Navigation Menu', 'nackt' )
			)
		);
	}
	add_action( 'after_setup_theme', 'nackt_setup' );