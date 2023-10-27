<?php 
/*** 
* Default page
*
***/
get_header(); 
?>   
<?php 
$breadcrumb = get_field("header", "option");
while ( have_posts() ) { 
	the_post(); 
	$image = $breadcrumb['breadcum_image'];
?>
<div class="breadcrumb-section mr-bottom-50" style="background-image: url(<?php if($image){ echo $image['url']; } ?>)">
	<div class="container text-center">
		<h2><?php echo get_the_title(); ?></h2>
	</div>
</div>     
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<?php the_content(); ?>	
		</div>
	</div>
</div>
<?php } ?>
<?php get_footer(); ?>
   