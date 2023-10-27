<?php 
/*
 Default Template
 Text Domain:  ecomwp
*/
get_header();
?>

	<div class="container">
		<div class="row">
		<?php while (have_posts()) : the_post(); ?>
			<div class="col-lg-12">
				<?php the_content(); ?>	
			</div>
		<?php endwhile; ?>
		</div>
	</div>

<?php get_footer(); ?>