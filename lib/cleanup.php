<?php
  /**
   * Clean up wp_head()
   *
   * Remove unnecessary <link>'s
   * Remove inline CSS used by Recent Comments widget
   * Remove inline CSS used by posts with galleries
   * Remove self-closing tag and change ''s to "'s on rel_canonical()
   */
  function nackt_head_cleanup() {
    // Originally from http://wpengineer.com/1438/wordpress-header/
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));

    add_filter('use_default_gallery_style', '__return_null');

    if (!class_exists('WPSEO_Frontend')) {
      remove_action('wp_head', 'rel_canonical');
      add_action('wp_head', 'nackt_rel_canonical');
    }
  }

  function nackt_rel_canonical() {
    global $wp_the_query;

    if (!is_singular()) {
      return;
    }

    if (!$id = $wp_the_query->get_queried_object_id()) {
      return;
    }

    $link = get_permalink($id);
    echo "\t<link rel=\"canonical\" href=\"$link\">\n";
  }
  add_action('init', 'nackt_head_cleanup');

  /*
   * Remove the WordPress version from RSS feeds
   */
  add_filter('the_generator', '__return_false');

  /**
   * Manage output of wp_title()
   */
  function nackt_wp_title($title) {
    if (is_feed()) {
      return $title;
    }

    $title .= get_bloginfo('name');

    return $title;
  }
  add_filter('wp_title', 'nackt_wp_title', 10);

  /**
   * Add and remove body_class() classes
   */
  function nackt_body_class($classes) {
    // Add post/page slug
    if (is_single() || is_page() && !is_front_page()) {
      $classes[] = basename(get_permalink());
    }

    // Remove unnecessary classes
    $home_id_class = 'page-id-' . get_option('page_on_front');
    $remove_classes = array(
      'page-template-default',
      $home_id_class
    );
    $classes = array_diff($classes, $remove_classes);

    return $classes;
  }
  add_filter('body_class', 'nackt_body_class');

  /**
   * Wrap embedded media as suggested by Readability
   *
   * @link https://gist.github.com/965956
   * @link http://www.readability.com/publishers/guidelines#publisher
   */
  function nackt_embed_wrap($cache, $url, $attr = '', $post_ID = '') {
    return '<div class="entry-content-asset">' . $cache . '</div>';
  }
  add_filter('embed_oembed_html', 'nackt_embed_wrap', 10, 4);

  /**
   * Remove unnecessary dashboard widgets
   *
   * @link http://www.deluxeblogtips.com/2011/01/remove-dashboard-widgets-in-wordpress.html
   */
  function nackt_remove_dashboard_widgets() {
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
    remove_meta_box('dashboard_primary', 'dashboard', 'normal');
    remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
  }
  add_action('admin_init', 'nackt_remove_dashboard_widgets');

  /**
   * Clean up the_excerpt()
   */

  define('POST_EXCERPT_LENGTH', 40);
  
  function nackt_excerpt_length($length) {
    return POST_EXCERPT_LENGTH;
  }

  function nackt_excerpt_more($more) {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'nackt') . '</a>';
  }
  add_filter('excerpt_length', 'nackt_excerpt_length');
  add_filter('excerpt_more', 'nackt_excerpt_more');

  /**
   * Remove unnecessary self-closing tags
   */
  function nackt_remove_self_closing_tags($input) {
    return str_replace(' />', '>', $input);
  }
  add_filter('get_avatar',          'nackt_remove_self_closing_tags'); // <img />
  add_filter('comment_id_fields',   'nackt_remove_self_closing_tags'); // <input />
  add_filter('post_thumbnail_html', 'nackt_remove_self_closing_tags'); // <img />

  /**
   * Redirects search results from /?s=query to /search/query/, converts %20 to +
   *
   * @link http://txfx.net/wordpress-plugins/nice-search/
   */
  function nackt_nice_search_redirect() {
    global $wp_rewrite;
    if (!isset($wp_rewrite) || !is_object($wp_rewrite) || !$wp_rewrite->using_permalinks()) {
      return;
    }

    $search_base = $wp_rewrite->search_base;
    if (is_search() && !is_admin() && strpos($_SERVER['REQUEST_URI'], "/{$search_base}/") === false) {
      wp_redirect(home_url("/{$search_base}/" . urlencode(get_query_var('s'))));
      exit();
    }
  }
  if (current_theme_supports('nice-search')) {
    add_action('template_redirect', 'nackt_nice_search_redirect');
  }

  /**
   * Tell WordPress to use searchform.php from the templates/ directory
   */
  function nackt_get_search_form($argument) {
    if ($argument === '') {
      locate_template('/templates/searchform.php', true, false);
    }
  }
  add_filter('get_search_form', 'nackt_get_search_form');