#  HTML5 Reset WordPress Based Theme
#  Changes and Additions to the Theme:

## Clean Up

	1. Corrected stylesheet call in header

	2. Removed CSS reset and re-added into /scss/_reset.scss
		# Added scss file that will compile into styles.css

	4. Removed Modenizer from Head - Commented out in functions.php

	5. Changed call to functions in footer to: 
		<script src="<?php echo get_template_directory_uri(); ?>/assets/js/functions.js"></script>
		# Complies with the Theme Check Plugin

	6. Changed theme_text_domain to nackt

	7. Added Theme Wrapper for less code re-use (http://scribu.net/wordpress/theme-wrappers.html)
		# Loads heirarchy normally and puts it inside base.php
		# Added a folder /templates for better organization and a modular style work environment

## Functions // Plugins

	1. Widget Area in Footer

	2. Auto Activate / Install Plugins (https://github.com/thomasgriffin/TGM-Plugin-Activation)
		# Can require plugins for the theme to work!

	3. lib/kriesi-pagination.php - Houses kriesi pagination
		(http://www.kriesi.at/archives/how-to-build-a-wordpress-post-pagination-without-plugin)

	4. lib/scripts.php - Register/Enqueue All Scripts

	5. lib/theme-setup.php - Adds Theme Support and Registers Nav


## jQuery / Javascript Additions

	1. Added javascript function for responsive naviagation (http://responsive-nav.com/) v1.0.14
		# No dependancys needed

	2. Added retina.js (http://retinajs.com/) - automatically checks for images in the markup with @2x
		# scss version: (https://github.com/michaelsacca/retinajs-for-compass-sass-less)
		# For all scss background images use:
			.logo {
              @include at2x('example', 200px, 100px, .jpg);
            } 
		# Compiles to:
			.logo {
              background-image: url('/images/example.jpg');
            }

            @media all and (-webkit-min-device-pixel-ratio: 1.5) {
              .logo {
                background-image: url('/images/exampe@2x.jpg');
                background-size: 200px 100px;
              }
            }

    3. Added Fitvids (https://github.com/davatron5000/FitVids.js#readme) v1.0
    	# Makes all the following video formats 100% of parent container
    	# Works with Youtube, Vimeo, Blip.tv, Viddler, Kickstarter

    4. Minified version called as rrf.min.js
    	# Used http://javascript-minifier.com/ to minify and combine all used plugs
    		## Responsive-nav, retina.js, and fitvids
    		## register/enqueue commented out, but all files are still included

## Theme Options

	1. Header Meta Area
		# Head ID
		# Google Webmasters //////////// Needs work
		# Author Name
		# Favicon

	2. Appearance
		# Sidebar Position
		# Slider on Homepage
		# Main Background Color - Default to None
		# Main Header Color     - Default to None
		# Main Footer Color     - Default to None

	3. Typography
		# Heading Font - Default ??
		# Body Font    - Default ??
		# Heading Color
		# Main Navigation Color
		# Main Navigation Hover
		# Posts, Pages. and Sidebar Link Color
		# Posts, Pages. and Sidebar Link Hover

		--------Find a way to use default web fonts // Arial // Whatever
		-------- Change Font Size?????????

## Font Icons - Font Awesome (http://fontawesome.io/) v3.1.1

	1. Integrated into theme under _icons
		# All Docs on website, uses <i></i> element
		# Supports Unicode - Good for psudo selectors

## Footer Area - Widgets

	1. Currently being populated with widget areas.
		# Use Text widget for ease of change