<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <title><?php wp_title(); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- header  -->
<!-- Navbar  -->
<?php $header = get_field("header", "option"); ?>
<header>
	<nav class="navbar navbar-expand-lg navbar-light ">
		<div class="container container-change">
			<div class="wrap-nav-brand"> 
				<a class="navbar-brand" href="<?php echo get_bloginfo( 'url' ); ?>"> <img src="<?php echo $header['header_logo']['url']; ?>" alt="<?php echo $header['header_logo']['title']; ?>"/></a>
			</div>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<?php if (function_exists(menu_header())) { menu_header(); } ?>
				<?php echo do_shortcode('[polylang_langswitcher]'); ?>
			</div>
		</div>
	</nav>
</header>


