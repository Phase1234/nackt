<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert">
    <?php _e('Sorry, no results were found.', 'nackt'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <?php kriesi_pagination('', '1'); ?>
  </nav>
<?php endif; ?>
