<?php 
/*
 Theme Name: Las Bombas
 Version: 1.0
 Text Domain:  lasbombas
*/
get_header();
$breadcrumb = get_field("header", "option");
$image = $breadcrumb['breadcum_image'];
?>
<div class="breadcrumb-section mr-bottom-50" style="background-image: url(<?php if($image){ echo $image['url']; } ?>)">
	<div class="container text-center">
		<h2><?php echo "404"; ?></h2>
	</div>
</div>     
<div class="container text-center mr-bottom-50">
	<div class="row">
		<div class="col-lg-12">
			<?php echo "<h3>Oops... WE'RE SORRY, BUT SOMETHING WENT WRONG. <br> Page Not Found!</h3>"; ?>	
		</div>
	</div>
</div>
<?php get_footer(); ?>