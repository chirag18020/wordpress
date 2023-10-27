<?php 
/*
 Template Name: API Page Data
 Text Domain:  ecomwp
*/
get_header();

header("Content-Type:application/json");

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