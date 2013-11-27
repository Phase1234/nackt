<?php

	// Register Sidebar areas

	function footer_sidebars()  {

		$args = array(
			'id'            => 'footer-one',
			'name'          => __( 'Footer 1', 'nackt' ),
			'description'   => __( 'First Footer Widget Area', 'nackt' ),
			'class'         => 'col-md-3',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
			'before_widget' => '<aside id="%1$s" class="col-md-3 widget %2$s">',
			'after_widget'  => '</aside>',
		);
		register_sidebar( $args );

		$args = array(
			'id'            => 'footer-two',
			'name'          => __( 'Footer 2', 'nackt' ),
			'description'   => __( 'Second Footer Widget Area', 'nackt' ),
			'class'         => 'col-md-3',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
			'before_widget' => '<aside id="%1$s" class="col-md-3 widget %2$s">',
			'after_widget'  => '</aside>',
		);
		register_sidebar( $args );

		$args = array(
			'id'            => 'footer-three',
			'name'          => __( 'Footer 3', 'nackt' ),
			'description'   => __( 'Third Footer Widget Area', 'nackt' ),
			'class'         => 'col-md-3',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
			'before_widget' => '<aside id="%1$s" class="col-md-3 widget %2$s">',
			'after_widget'  => '</aside>',
		);
		register_sidebar( $args );

		$args = array(
			'id'            => 'footer-four',
			'name'          => __( 'Footer 4', 'nackt' ),
			'description'   => __( 'Fourth Footer Widget Area', 'nackt' ),
			'class'         => 'col-md-3',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
			'before_widget' => '<aside id="%1$s" class="col-md-3 widget %2$s">',
			'after_widget'  => '</aside>',
		);
		register_sidebar( $args );

	}

	// Hook into the 'widgets_init' action
	add_action( 'widgets_init', 'footer_sidebars' );