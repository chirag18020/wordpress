<?php 

function my_post_type_args( $args, $post_type ) {
	if ( 'crudepost' === $post_type ) {
			$args = '/wp/v2/crudepost/' . $post_type->ID;
		}

		return $args;
	}
?>