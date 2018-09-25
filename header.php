<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Paul Component 2018 Update
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!--[if IE 10]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie.css">
<![endif]-->

<?php wp_head(); ?>
</head>

<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'Paul Component Engineering' ); ?></a>

<div id="page" class="hfeed site">

	<?php get_template_part('parts/complete-header'); ?>

	<?php //get_template_part( 'parts/mobile-header' ); ?>

	<?php //get_template_part( 'parts/desktop-header' ); ?>

	<div id="content" class="content-container">
