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

	<!-- Facebook Pixel Code -->

<script>

  !function(f,b,e,v,n,t,s)

  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?

  n.callMethod.apply(n,arguments):n.queue.push(arguments)};

  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';

  n.queue=[];t=b.createElement(e);t.async=!0;

  t.src=v;s=b.getElementsByTagName(e)[0];

  s.parentNode.insertBefore(t,s)}(window, document,'script',

  'https://connect.facebook.net/en_US/fbevents.js');

  fbq('init', '607678456312096');

  fbq('track', 'PageView');

</script>

<noscript><img height="1" width="1" style="display:none"

  src="https://www.facebook.com/tr?id=607678456312096&ev=PageView&noscript=1"

/></noscript>

<!-- End Facebook Pixel Code -->

<!--[if IE 10]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie.css">
<![endif]-->

<?php wp_head(); ?>
</head>

<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'Paul Component Engineering' ); ?></a>

<?php
    global $post;
    $page_slug_name=$post->post_name;
?>

<div id="page" class="hfeed site page-<?php echo $page_slug_name; ?>">

    <div class="covid-19-header">
        <h3>Covid-19 Update: We still have a very healthy stockpile of components on the shelves and a safe method for shipping them.</h3>
    </div>
    <div class="covid-19-container">
        <div class="covid-19-message">
            <p>We’re still receiving your orders, and really appreciate your support, but please be patient as it may take a day or two longer for us to get your order confirmation sent, and orders shipped under the current circumstances. Rest assured we will get your parts to you as fast as we are able to while observing safety protocols!</p>
            <p>Thank you,</p>
            <p>The PAUL Crew</p>
        </div>
    </div>

	<?php get_template_part( 'parts/mobile-header' ); ?>

	<?php get_template_part( 'parts/desktop-header' ); ?>

	<div id="content" class="content-container">
