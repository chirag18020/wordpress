<?php

/**
 * @package    Crude_Operation
 * @subpackage Crude_Operation/admin/partials
 * 
 */
?>
<div class="admin-list-item-container">
<div class="wrap">
	<?php $retrieve_nonce = wp_create_nonce( 'insert_data_nonce_field' ); ?>
	 <!--<form method="post" action="<?php //echo esc_url( admin_url( 'admin.php?page=' . $this->plugin_name . 'insert-item' ) ); ?>">-->
	 <div id="feedback"></div>
	 <form id="insert_data" method="post">
		<input type="hidden" id="insert_data_nonce_field" name="insert_data_nonce_field" value="<?php echo $retrieve_nonce; ?>"/>
		
		<table class="widefat striped">
			<thead>
				<tr>
					<td><h1>Add New Item Here</h1></td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Enter Name</th>
					<td><input type="text" required name="name" id="name" class="name" /></td>
				</tr>
				<tr>
					<th>Enter Email</th>
					<td><input type="text" required name="email" id="email" class="email" /></td>
				</tr>
				<tr>
					<th>Enter Phone</th>
					<td><input type="text" required name="phone" id="phone" class="phone" /></td>
				</tr>
			</tbody>
		</table>
		<?php //settings_fields( 'insert_new_items' );  ?>
		<p class="submit">
			<input type="button" id="insertcrud" class="button button-primary" value="Submit" />
		</p>
	</form>
</div>
</div>
