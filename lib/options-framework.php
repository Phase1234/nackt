<?php
// Options Framework (https://github.com/devinsays/options-framework-plugin)
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/assets/inc/' );
		require_once dirname( __FILE__ ) . '/../assets/inc/options-framework.php';
	}