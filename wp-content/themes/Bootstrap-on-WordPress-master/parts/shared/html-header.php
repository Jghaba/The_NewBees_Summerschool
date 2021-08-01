<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>
        <?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?>
    </title>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico"/>
		<?php wp_head(); ?>
    <link rel="stylesheet"  href="<?php if(function_exists("get_p_style")) echo 'http://localhost/wp-content/themes/Bootstrap-on-WordPress-master/css/'.get_p_style().'.css'; ?>">
  </head>
<body <?php body_class(); ?>>

