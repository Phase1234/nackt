<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 7]><div class="alert"><?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?></div><![endif]-->
	
  <?php get_template_part('templates/header'); ?>

  <div id="wrapper" class="container" role="document">
    <div class="row content">
      <div class="col-xs-12 main" role="main">
        <?php include nackt_template_path(); ?>
      </div><!-- /.main -->
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
