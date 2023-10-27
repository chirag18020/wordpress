<?php 
/*
 Default Template
 Text Domain:  ecomwp
*/
get_header();
while ( have_posts() ) :
the_post();
?>
<!-- Begin Uren's Breadcrumb Area -->
<div class="breadcrumb-area">
	<div class="container">
		<div class="breadcrumb-content">
			<h2><?php echo get_the_title(); ?></h2>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li class="active"><?php echo get_the_title(); ?></li>
			</ul>
		</div>
	</div>
</div>
<main class="page-content">
	<div class="container-fluid">
		<div class="row">
			<?php the_content(); ?>	
		</div>
	</div>
</main>
<?php endwhile; ?>
<?php get_footer(); ?>