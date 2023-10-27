(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	//Start Insert data script//
	jQuery(document).ready(function () {
		jQuery('#insertcrud').click( function () {
			 jQuery.ajax({
					type: 'POST',
					url: CrudAjax.ajaxurl,
					//data: { action  : 'save_data' },
					data: jQuery('form').serialize() + '&action=save_data',
				success: function(result) {
					console.log(result);
					$('#insert_data')[0].reset();
					jQuery("#feedback").append('<div class="success">'+result+'</div>');
					setTimeout(function() {
						$( ".success" ).slideUp( 1000 );
					}, 2000);
				},
				error: function(xhr, status, error) {
					console.log(error);
					jQuery("#feedback").append('<div class="error">'+error+'</div>');
					setTimeout(function() {
						$( ".error" ).slideUp( 1000 );
					}, 2000);
				}
			});
		});
	});
	//End Insert data script//
	
	//Start Update data script//
	jQuery(document).ready(function () {
		jQuery('#updatecrud').click( function () {
			//e.preventDefault();
			var update_data_nonce_field = jQuery('#update_data_nonce_field').val();
			 jQuery.ajax({
					type: 'POST',
					url: CrudAjax.ajaxurl,
					data: jQuery('form').serialize() + '&action=update_data',
				success: function(result) {
					console.log(update_data_nonce_field);
					jQuery("#feedback").append('<div class="success">'+result+'</div>');
					setTimeout(function() {
						$( ".success" ).slideUp( 1000 );
					}, 2000);
				},
				error: function(xhr, status, error) {
					console.log(error);
					jQuery("#feedback").append('<div class="error">'+error+'</div>');
					setTimeout(function() {
						$( ".error" ).slideUp( 1000 );
					}, 2000);
				}
			});
		});
	});
	//End Update data script//
	
	//Start Delete data script//
	jQuery(document).ready(function () {
		jQuery(".delete-data").click( function (e) {
			e.preventDefault();
			var action_id = $(this).data( "action_id" );
			var dnonce = $(this).data( "_wpnonce" );
			console.log(action_id);
			console.log(dnonce);
			 if (confirm("Are you sure you want to delete this Member?")) {
			 jQuery.ajax({
					type: 'POST',
					url: CrudAjax.ajaxurl,
					data: { 
							action  : 'delete_data',
							nonce: dnonce, 
							action_id: action_id, 
						  },
				success: function(result) {
					console.log(result);
					jQuery("#feedback").append('<div class="success">'+result+'</div>');
					console.log(result);
					setTimeout(function() {
								$( ".success" ).slideUp( 1000 );
							/* 	$(this).parents("tr").animate("fast").animate({ opacity: "hide" }, "slow");
								
								jQuery.ajax({
									type: 'GET',
									url: CrudAjax.ajaxurl,
									data: { 
										action  : 'view_data'
									},
									success: function(response) {
										jQuery('#view-all-data').html(response);
										console.log(response);
									}
								}); */
								
					/* $(this).parents("tr").animate("fast").animate({
						opacity: "hide"
					}, "slow"); */
					
					}, 2000);
				},
				error: function(xhr, status, error) {
					console.log(error);
					jQuery("#feedback").append('<div class="error">'+error+'</div>');
					setTimeout(function() {
						$( ".error" ).slideUp( 1000 );
						$(document).ready(function () {
							$(this).parents("tr").animate("fast").animate({
								opacity: "hide"
							}, "slow");
						});
					}, 2000);
				}
			});
		 } else { 
				return false;
            }
		 //e.preventDefault();
		});
	});
	//End Delete data script//
	
	 
})( jQuery );