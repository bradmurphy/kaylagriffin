<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( ' | ', true, 'right' ); ?></title>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/fav-icon.png">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.min.css">
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700,400italic' rel='stylesheet' type='text/css'>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins.min.js"></script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >